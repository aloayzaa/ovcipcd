<?php

class Decanato_model extends CI_Model {

  
    function __construct() {
       parent::__construct();
        $this->load->database();
     
    }
     function expedientesQry($estado,$anio){
         if($estado=='derivado'){
            $consulta= "and exp.nExpedientePrioridad<>0";
             $porfecha=" and year(exp.cExpedienteFechaRegistro)=".$anio;
         }
         else{
           $consulta= "and exp.nExpedientePrioridad=0"; 
           $porfecha='';
         }
        $query=$this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,exp.nEstadoProveido
,exp.cExpedienteObservacion,exp.cExpedienteEstado,exp.nExpedienteVBUsuario
from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where exp.nEstadoProveido>0 ".$porfecha." and  bPdeEliminado=1 ".$consulta." order by exp.cExpedienteFechaRegistro ");
       
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
    function enviarMesaPartes($expediente){
         $parametros=array($expediente);
        $query=$this->db->query("UPDATE tb_sistram_expediente SET nEstadoProveido= '0' WHERE nExpedienteId=?;",$parametros);
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
       $query=$this->db->query("select * from tb_sistram_notificacion as n inner join tb_sistram_expediente as exp on n.nExpedienteId=exp.nExpedienteId where n.nExpedienteId=? and exp.nExpedientePrioridad=0",$expediente);
       if($query->num_rows()>0){
           return $query->result();
       }     
       else{
           return null;
       }
    }
    function darBajaNotificacion($prioridad,$expediente){
       $parametros=array($prioridad,$expediente);
       $query=$this->db->query("UPDATE tb_sistram_expediente SET nExpedientePrioridad=? WHERE nExpedienteId=?; ",$parametros);
       if($query){
           return true;
       }
       else{
           throw new Exception('error al recuperar datos de la BD');
       }
   }



}

