<?php

class Movimiento_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function areasderivar($nAreaId) {
        $parametros = array($nAreaId);
        $query = $this->db->query("SELECT * FROM tb_sistram_areas WHERE nAreasId not in(?)  and cAreasEstado=1 order by cAreasDescripcion", $parametros);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function expedienteGet($expediente) {
        $parametros = array($expediente);
        $query = $this->db->query("select exp.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,cExpedienteFolios,exp.nPerId,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as 
solicitante,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo

 from tb_sistram_expediente as exp inner join tb_sistram_tipo_expediente as 
tipoexp on exp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on exp.nTramiteId=tra.nTramiteId 
inner join persona as p on exp.nPerId=p.nPerId
where 
bPdeEliminado=1 and exp.nExpedienteId=?", $parametros);
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
    function movimientoQry($nAreaId, $estado, $anio) {

        /*if ($estado == 'Procesados') {
            $procesados = " and mov.dMovimientoFechaAtencion is not NULL";
            $porfecha = " and year(dMovimientoFechaAtencion)=" . $anio;
        } else {
            $procesados = " and mov.dMovimientoFechaAtencion is NULL";
            $porfecha = " ";
        }*/
         if ($estado == 'Procesados') {
            $procesados = " and mov.dMovimientoFechaAtencion is not NULL and mov.cMovimientoEstado='Procesado'";
            $porfecha = " and year(dMovimientoFechaAtencion)=" . $anio;
        } else {
           $procesados = " and mov.cMovimientoEstado<>'Procesado'";
            
            $porfecha = " ";
        }

        $query1 = $this->db->query("select tmp.nMovimientoId,tmp.nExpedienteId,nExpedienteCodigo,cExpedienteFechaRegistro,
tmp.cExpedienteSumilla,tmp.cExpedienteAsunto,tmp.cExpedienteFolios,tmp.nPerId as solicitanteId,
tmp.nTipo_expedienteId,tmp.nTramiteId,tmp.nAreasIdEmisor,
tmp.areaemisor,tmp.nAreasIdReceptor,tmp.areareceptor,
tmp.dMovimientoFechaRecepcion,
tmp.cMovimientoObservacion,tmp.dMovimientoFechaAtencion,
tmp.cMovimientoEstado,tmp.cMovimientovistoBueno,tipoexp.cTipexpedienteDescripcion,tra.cTramiteTitulo,
concat(p.cPerApellidoPaterno,' ',p.cPerApellidoMaterno,' ',p.cPerNombres) as solicitante
from 
(select mov.nMovimientoId,
mov.nExpedienteId,exp.nExpedienteCodigo,exp.cExpedienteFechaRegistro,
exp.cExpedienteSumilla,exp.cExpedienteAsunto,exp.cExpedienteFolios,
exp.nPerId,exp.nTipo_expedienteId,exp.nTramiteId,
mov.nAreasIdEmisor,a.cDescripcionCargo as areaemisor,a.cAreasEstado as estadoemisor,
mov.nAreasIdReceptor,b.cDescripcionCargo as areareceptor,b.cAreasEstado as estadoreceptor,
mov.dMovimientoFechaRecepcion,mov.cMovimientoObservacion,
mov.dMovimientoFechaAtencion,
mov.cMovimientoEstado,mov.cMovimientovistoBueno from tb_sistram_movimiento as mov
inner join tb_sistram_expediente exp on mov.nExpedienteId=exp.nExpedienteId
inner join tb_sistram_areas a on mov.nAreasIdEmisor=a.nAreasId
inner join tb_sistram_areas b on mov.nAreasIdReceptor=b.nAreasId WHERE mov.nAreasIdReceptor =? " . $procesados . " " . $porfecha . ") tmp inner join tb_sistram_tipo_expediente as tipoexp on tmp.nTipo_expedienteId = tipoexp.nTipexpedienteId
inner join tb_sistram_tramite as tra on tmp.nTramiteId=tra.nTramiteId 
inner join persona as p on tmp.nPerId=p.nPerId order by nExpedienteCodigo desc", $nAreaId);
        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {
            return null;
        }
    }

    function procesarExpediente($movimiento, $resumen) {
        $parametros = array($resumen, $movimiento);
        $query = $this->db->query("update tb_sistram_movimiento set dMovimientoFechaAtencion=now(),"
                . "cMovimientoEstado='Procesado', cMovimientoResumen=? where nMovimientoId=?", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function notificarExpediente($movimiento, $nAreaId, $notificacion) {
        $parametro1 = array($movimiento);
        $query = $this->db->query("select * from tb_sistram_movimiento where nMovimientoId=?", $parametro1);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nExpedienteId = $row->nExpedienteId;
            $nAreaEmisor = $row->nAreasIdReceptor;
            $nAreaReceptor = $row->nAreasIdEmisor;
            $parametro3 = array($nAreaEmisor, $nAreaReceptor, $nExpedienteId, $notificacion);
            $parametro4 = array($nExpedienteId);
            $query2 = $this->db->query("SELECT * FROM tb_sistram_expediente where nExpedienteId=? and bPdeEliminado=1", $parametro4);
            if ($query2->num_rows() > 0) {
                    $this->db->trans_start();
                    $this->db->query("INSERT INTO tb_sistram_notificacion(nNotificacionId,nAreaEmisornotiId,nAreaReceptornotiId,dFechaNotificacion,
                    nExpedienteId,cNotificacion,nExpedientePrioridadnoti)VALUES(NULL,?,?,now(),?,?,1);", $parametro3);
                    $this->db->query("UPDATE tb_sistram_expediente SET nExpedienteDerivado=NULL,cExpedienteEstado='' WHERE nExpedienteId=?;", $parametro4);
                    $this->db->query("DELETE FROM tb_sistram_movimiento WHERE nMovimientoId=?;", $parametro1);
                    $this->db->trans_complete();
                    if ($this->db->trans_status()) {
                        return true;
                    } else {
                        throw new Exception('error al recuperar datos de la BD');
                    }
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function mensajenovisto($nAreaId) {
        $parametros = array($nAreaId);
        $query = $this->db->query("select mov.nMovimientoId,
mov.nExpedienteId,exp.nExpedienteCodigo,
exp.cExpedienteSumilla,
a.cDescripcionCargo as areaemisor,
mov.dMovimientoFechaRecepcion from tb_sistram_movimiento as mov
inner join tb_sistram_expediente exp on mov.nExpedienteId=exp.nExpedienteId
inner join tb_sistram_areas a on mov.nAreasIdEmisor=a.nAreasId
inner join tb_sistram_areas b on mov.nAreasIdReceptor=b.nAreasId WHERE mov.nAreasIdReceptor =? and mov.dMovimientoFechaAtencion is null and cMovimientoVisto=0", $parametros);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function cambiarvisto($nMovimientoId) {
        $parametros = array($nMovimientoId);
        $query = $this->db->query("update tb_sistram_movimiento set cMovimientoVisto=1 where nMovimientoId=?", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function verificar_derivacion($nAreaId, $expediente) {
        $parametros = array($nAreaId, $expediente);
        $query = $this->db->query("select * from tb_sistram_movimiento where nAreasIdEmisor=? and nExpedienteId=?", $parametros);
        if ($query->num_rows()) {
            return false;
        } else {
            return true;
        }
    }

    function notificacionesGet($expediente, $areareceptor) {

        $parametros = array($expediente, $areareceptor);
        $query = $this->db->query("select * from tb_sistram_notificacion as n inner join tb_sistram_expediente as exp on n.nExpedienteId=exp.nExpedienteId where n.nExpedienteId=? and n.nAreaReceptornotiId=?", $parametros);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    function getExpedienteId($movimiento){
        $parametros = array($movimiento);
        $query = $this->db->query("select nExpedienteId from tb_sistram_movimiento where nMovimientoId=?", $parametros);
        if ($query->num_rows()) {
            $row=$query->row();
            $id=$row->nExpedienteId;
            return $id;
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
       //observar expediente
     function observarExpediente($movimiento, $resumen) {
        $parametros = array($resumen, $movimiento);
        $query = $this->db->query("update tb_sistram_movimiento set dMovimientoFechaAtencion=now(),"
                . "cMovimientoEstado='Observado', cMovimientoResumen=? where nMovimientoId=?", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    //faltan involucrados notificacion
      function falta_invExpediente($user, $movimiento, $observacion) {
        $emisor = $this->db->query("select * from tb_sistram_movimiento where nMovimientoId=?", array($movimiento));
            if ($emisor->num_rows() > 0) {
            $row = $emisor->row();
            $nEmisor = $row->nAreasIdEmisor;
            $expedienteID = $row->nExpedienteId;
        }
        $parametros = array($observacion, $user, $expedienteID);
        $query = $this->db->query("UPDATE tb_sistram_movimiento SET cMovimientoEstado='Notificado',dMovimientoFechaAtencion=now(),cMovimientoResumen=? WHERE nAreasIdReceptor=? and nExpedienteId=?;", $parametros);
                       $this->db->query("INSERT INTO tb_sistram_notificacion(nNotificacionId,nAreaEmisornotiId,nAreaReceptornotiId,dFechaNotificacion,
                    nExpedienteId,cNotificacion,nExpedientePrioridadnoti)VALUES(NULL,?,?,now(),?,?,1);", array($user,$nEmisor,$expedienteID,$observacion));
                    $this->db->query("UPDATE tb_sistram_expediente SET nExpedienteDerivado=NULL,cExpedienteEstado='' WHERE nExpedienteId=?;", array($expedienteID));
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }


}
