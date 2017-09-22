<?php

class Timeline_model extends CI_Controller {
  

    public function __construct() {
        parent::__construct();
      
        $this->load->database();
    }
      //qry expediente mesa de partes
         function expedientesGet($expediente){
            
           
        $query=$this->db->query("SELECT exp.nExpedienteId, 
            exp.nExpedienteCodigo, exp.cExpedienteFechaRegistro, 
            exp.cExpedienteSumilla, exp.cExpedienteAsunto, 
            cExpedienteFolios, exp.nPerId,
            CONCAT( p.cPerApellidoPaterno,  ' ', p.cPerApellidoMaterno,  ' ', p.cPerNombres ) AS solicitante, 
            tipoexp.cTipexpedienteDescripcion, tra.cTramiteTitulo, 
            exp.nEstadoProveido, exp.cExpedienteObservacion, 
            exp.cExpedienteEstado, exp.cFechaCambio,exp.nExpedienteDerivado, 
            TIME( exp.cFechaCambio ) AS tiempo, DATE( exp.cFechaCambio ) AS fecha
FROM tb_sistram_expediente AS exp
INNER JOIN tb_sistram_tipo_expediente AS tipoexp ON exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
INNER JOIN tb_sistram_tramite AS tra ON exp.nTramiteId = tra.nTramiteId
INNER JOIN persona AS p ON exp.nPerId = p.nPerId
WHERE bPdeEliminado =1 
AND exp.nExpedienteCodigo =?",$expediente);
       
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
    function detalleMovimiento($expediente){
        $parame=array($expediente);
        $query=$this->db->query("SELECT mov.nMovimientoId, 
            mov.nExpedienteId, 
            mov.nAreasIdEmisor, 
            a.cDescripcionCargo AS emisor,
            mov.nAreasIdReceptor,
            b.cDescripcionCargo AS receptor, 
            mov.dMovimientoFechaRecepcion,
            mov.cMovimientoObservacion, 
            mov.dMovimientoFechaAtencion, 
            mov.cMovimientoEstado,
            mov.cMovimientoResumen
FROM tb_sistram_movimiento AS mov
INNER JOIN tb_sistram_areas AS a ON mov.nAreasIdEmisor = a.nAreasId
INNER JOIN tb_sistram_areas AS b ON mov.nAreasIdReceptor = b.nAreasId
inner join tb_sistram_expediente as exp on mov.nExpedienteId=exp.nExpedienteId
WHERE exp.nExpedienteCodigo =? order by mov.dMovimientoFechaRecepcion desc",$parame);
    
         
        if($query->num_rows()>0){
           return $query->result();
        }
        else {
            return null;
        }
    }
    
}
