<?php

class Administrador_model extends CI_Model {

  
    function __construct() {
       parent::__construct();
        $this->load->database();
     
    }
    private $nAreaId;
    private $expedienteId;
    private $areareceptor;
    private $observacion;
    private $estado;
    private $prioridad;
    private $ultimaDerivacion;

    function getUltimaDerivacion() {
        return $this->ultimaDerivacion;
    }

    function setUltimaDerivacion($ultimaDerivacion) {
        $this->ultimaDerivacion = $ultimaDerivacion;
    }

    function getPrioridad() {
        return $this->prioridad;
    }

    function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getExpedienteId() {
        return $this->expedienteId;
    }

    function getAreareceptor() {
        return $this->areareceptor;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setExpedienteId($expedienteId) {
        $this->expedienteId = $expedienteId;
    }

    function setAreareceptor($areareceptor) {
        $this->areareceptor = $areareceptor;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function getNAreaId() {
        return $this->nAreaId;
    }

    function setNAreaId($nAreaId) {
        $this->nAreaId = $nAreaId;
    }

    function actualizarderivacion(){
       $parametros0 = array('Derivado', $this->getExpedienteId());
     
        $query = $this->db->query("UPDATE tb_sistram_expediente SET cExpedienteEstado='Habilitado',cFechaCambio=now(),nExpedienteDerivado=? WHERE nExpedienteId=?;", $parametros0);
         
        if ($query) {
            return true;
        }
        else {
            throw new Exception('error al recuperar datos de la BD');
        }
    
        
    }
    function derivarExpediente() {
            $parametros = array(
                $this->getExpedienteId(),
                $this->getNAreaId(),
                $this->getAreareceptor(),
                $this->getObservacion(),
                $this->getEstado()
            );

            $query = $this->db->query("INSERT INTO tb_sistram_movimiento(
            nMovimientoId,
            nExpedienteId,
            nAreasIdEmisor,
            nAreasIdReceptor,
            dMovimientoFechaRecepcion,
            cMovimientoObservacion,
            dMovimientoFechaAtencion,
            cMovimientoEstado,
            cMovimientovistoBueno,
            cMovimientoVisto)
            VALUES(
            NULL,?,?,?,now(),?,NULL,?,1,0);", $parametros);
            if ($query) {
                return true;
            } else {
                throw new Exception('error al recuperar datos de la BD');
            }
        
    }

    
    
    
    
     function expedientesQry($estado,$anio){
         if($estado=='derivado'){
           $consulta= " exp.nExpedienteDerivado='Derivado'";
             $porfecha=" and year(exp.cExpedienteFechaRegistro)=".$anio;
         }
         else{
           $consulta= "exp.nExpedienteDerivado is null"; 
           $porfecha='';
         }
        $query=$this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,exp.nEstadoProveido
,exp.cExpedienteObservacion,exp.cExpedienteEstado
from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where exp.nEstadoProveido=2 ".$porfecha." and ".$consulta." and bPdeEliminado=1  order by exp.cExpedienteFechaRegistro ");
       
          if ($query) {
            if ($query->num_rows() > 0) {
                return $query->result();
             } else {
                 return null;
            }
         } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
    }
   
    function enviarVB($expediente,$usuario){
        $parametros=array($usuario,$expediente);
        $query=$this->db->query("UPDATE tb_sistram_expediente SET nEstadoProveido= '2',nExpedienteVBUsuario=? WHERE nExpedienteId=?;",$parametros);
        if($query){
            return true;
        }
        else {
            throw new Exception('error al recuperar datos de la BD');
        }

    }
    function enviarMesaPartes($expediente,$observacion){
         $parametros=array($observacion,$expediente);
       
        $query=$this->db->query("UPDATE tb_sistram_expediente SET nEstadoProveido=0,cExpedienteEstado='Observado',cExpedienteObservacion=?,nExpedienteDerivado=NULL WHERE nExpedienteId=?;",$parametros);
        if($query){
            return true;
        }
        else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
    }

    function areasderivar(){
        $query=$this->db->query("SELECT * FROM tb_sistram_areas WHERE cAreasEstado=1 order by cAreasDescripcion");
         if ($query->num_rows() > 0) {
                 return $query->result();
             } else {
                 return null;
            }       
    }
    function areasderivarconexcepcion($areasno){
       
         $areasno = substr($areasno, 0, -1); 
         $query=$this->db->query("SELECT * FROM tb_sistram_areas WHERE cAreasEstado=1 and nAreasId not in(".$areasno.")order by cAreasDescripcion");
         
         if ($query->num_rows() > 0) {
                 return $query->result();
             } else {
                 return null;
            } 
    }

    function expedienteGet($expediente){
        $parametros=array($expediente);
        $query=$this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo

 from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where bPdeEliminado=1 and exp.nExpedienteId=?",$parametros);
          if ($query) {
            if ($query->num_rows() > 0) {
                 return $query->row();
             } else {
                 return null;
            }
         } else {
            throw new Exception('error al recuperar datos de la BD');
        }
        
    }
    function expedienteMultimedia($expediente){
        $parametros=array($expediente);
        $query=$this->db->query("select * from tb_sistram_multimedia where nExpedienteId=? and cMultimediaEstado=1",$parametros);
        if($query){
           return  $query->result();
        }
        else {
             throw new Exception('error al recuperar datos de la BD');  
        }
 
    }
    function expedienteMultimediaunido($expediente){
        $multimedia=$this->expedienteMultimedia($expediente);
        $i=0;$data="";
        foreach ($multimedia as $multi){
            if($i==0){
              $data=$data.$multi->cMultimediaLink;
            }
            else {
               $data=$data.",".$multi->cMultimediaLink;
            }
            $i++;
        }
        return $data;
    }
    function derivadoareas($expediente){
        $parame=array($expediente);
        // echo "expediente ID".$expediente;
        $query=$this->db->query("SELECT * 
FROM tb_sistram_movimiento AS mov
INNER JOIN tb_sistram_areas AS a ON mov.nAreasIdReceptor = a.nAreasId
WHERE mov.nExpedienteId=?",$parame);
    
         
        if($query->num_rows()>0){
           return $query->result();
        }
        else {
            return null;
        }
    }
    function notificacionesGet($expediente){
       $query=$this->db->query("select * from tb_sistram_notificacion as n inner join tb_sistram_expediente as exp on n.nExpedienteId=exp.nExpedienteId where n.nExpedienteId=? ",$expediente);
       if($query->num_rows()>0){
           return $query->result();
       }     
       else{
           return null;
       }
    }
    function darBajaNotificacion($expediente){
       $parametros=array($expediente);
       $query=$this->db->query("UPDATE tb_sistram_expediente SET nExpedienteDerivado='Derivado',cExpedienteEstado='Habilitado' WHERE nExpedienteId=?; ",$parametros);
       if($query){
           return true;
       }
       else{
           throw new Exception('error al recuperar datos de la BD');
       }
   }
   function expedienteMovimientos($expediente){
       $parametros=array($expediente);
       
       $query=$this->db->query("select nAreasIdReceptor from tb_sistram_movimiento where nExpedienteId=?",$parametros);
       if ($query->num_rows() > 0) {
           $cad="";
           foreach($query->result() as $area){
               $cad=$cad.$area->nAreasIdReceptor.",";
           }
           return $cad;
        } 
        else{
            return '';
        }
    }
    function CodigoExpedienteGet($expediente){
       $parametros=array($expediente);
       
       $query=$this->db->query("select nExpedienteCodigo from tb_sistram_expediente where nExpedienteId=?",$parametros);
       if ($query->num_rows() > 0) {
           $row=$query->row();
           $codigo=$row->nExpedienteCodigo;
           return $codigo;
        } 
        else{
            return '';
        } 
    }



}

