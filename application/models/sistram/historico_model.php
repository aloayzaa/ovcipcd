<?php

class Historico_model extends CI_Model {

  
    function __construct() {
       parent::__construct();
        $this->load->database();
     
    }
     function expedientesQry($anio){
         $parametros=array($anio);
             
        $query=$this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,exp.nEstadoProveido
,exp.cExpedienteObservacion,exp.cExpedienteEstado
from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where exp.nEstadoProveido>0  and year(exp.cExpedienteFechaRegistro)=? and  bPdeEliminado=1 order by exp.cExpedienteFechaRegistro desc",$parametros);
       
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
function expedienteEstado($expediente){
        $parametros=array($expediente);
        $query=$this->db->query("select count(*) as movimientos  from tb_sistram_movimiento where nExpedienteId=?",$parametros);
        $query2=$this->db->query("select count(*) as procesados from tb_sistram_movimiento where nExpedienteId=? and cMovimientoEstado='Procesado'",$parametros);
        $query3=$this->db->query("select nExpedienteDerivado from tb_sistram_expediente where nExpedienteId=?",$parametros);
        $query4=$this->db->query("select count(*) as observado from tb_sistram_movimiento where nExpedienteId=? and cMovimientoEstado='Observado'",$parametros);
        
        if($query&& $query2 && $query3&& $query4){
            $row=$query->row();
            $movimientos=$row->movimientos;
            $row2=$query2->row();
            $procesados=$row2->procesados;
            $row3=$query3->row();
            $derivado=$row3->nExpedienteDerivado;
            $row4=$query4->row();
            $observado=$row4->observado;
            if($observado==0){
                if($derivado=='Derivado'){
                    if($movimientos!=$procesados){
                        return 'EnTramite';
                    }else{
                        return 'Terminado';
                    }
                }
                else {
                    return 'SinVB';
                }
            }
            else{
                return 'Observado';
            }
            
            
           
        }
        
    }
}

