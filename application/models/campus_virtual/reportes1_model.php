<?php

class Reportes1_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function reportesCQry($criterio='') {
        $fechaI = str_ireplace("-", "/", strstr($criterio['criterio'], '_', true));
        $fechaF = str_ireplace("_", "", str_ireplace("-", "/", strstr($criterio['criterio'], '_')));
        $query = $this->db->query("CALL USP_CVI_S_ReporteCursos(?,?)",
                                        array($fechaI,$fechaF));
        
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function reportesDQry($criterio='') {

        $fechaI = str_ireplace("-", "/", strstr($criterio['criterio'], '_', true));
        $fechaF = $fechaF = str_ireplace("_", "", str_ireplace("-", "/", strstr($criterio['criterio'], '_')));
        $query = $this->db->query("CALL USP_CVI_S_ReporteDocentes(?,?)",
                                        array($fechaI,$fechaF));
        
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
	function getCursoReporte($criterio='') {
        $query = $this->db->query("SELECT c.cCurNombre AS Curso, 
                                          h.cHorFechaInicio AS Fecha_Inicio, 
                                          h.cHorFechaFin AS Fecha_Fin, 
                                          h.cHorHoraInicio As Hora_Inicio,
                                          h.cHorHoraFin AS Hora_Fin
                                   FROM horario AS h
                                   INNER JOIN curso AS c ON h.nCurId = c.nCurId
                                   WHERE h.nHorId = ?",
                                   $criterio['criterio']);
        $this->db->close();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $resp = array("Curso"=>$row->Curso,
                          "FechaI"=>$row->Fecha_Inicio,
                          "FechaF"=>$row->Fecha_Fin,
                          "HoraI" =>$row->Hora_Inicio,
                          "HoraF"=>$row->Hora_Fin);
            return $resp;
        } else {
            return null;
        }
    }
    
    function reportesMQry($criterio='') {
        $fechaI = str_ireplace("-", "/", strstr($criterio['criterio'], '_', true));
        $fechaF = str_ireplace("_", "", str_ireplace("-", "/", strstr($criterio['criterio'], '_')));
        $query = $this->db->query("CALL USP_CVI_S_ReporteMatriculas(?,?)",
                                        array($fechaI,$fechaF));
        
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function reportesRQry($criterio='') {
        $query = $this->db->query("CALL USP_CVI_S_RecordAcademico(?)",
                                        $criterio['criterio']);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
        function ver_pagos($valor) {
     $parametro = array($valor);
               $this->db->query("SET lc_time_names = 'es_UY';");
        $query = $this->db->query("SELECT c.cCurNombre as Curso,p.cPagFecha as FechaPago,DATE_FORMAT(p.cPagFecha,'%M') as Mes,p.nPagNumeroVoucher as Voucher,p.nPagAcuenta as Monto
FROM matricula as m
 INNER JOIN horario as h
 INNER JOIN curso as c
 inner join pago as p
WHERE m.nHorId = h.nHorId
  AND h.nCurId = c.nCurId
  AND p.nPerId=m.nPerId and p.nHorId = m.nHorId
  AND p.nPerId=?
  AND m.nMatTipo = 1
  AND m.nMatEstado = 1
  AND h.nHorEstado = 0
  AND c.nCurEstado = 1
ORDER BY p.cPagFecha asc",$parametro);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function reportesPQry($criterio='') {
        $query = $this->db->query("CALL USP_CVI_S_ReportePagos(?)",
                                        $criterio['criterio']);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function HorarioCbo($fechaI,$fechaF){
        
        $query = $this->db->query("SELECT h.nHorId, c.cCurNombre, h.cHorFechaInicio, h.cHorDia, h.cHorHoraInicio, cHorAmbiente, h.cHorFechaFin
                                        FROM curso AS c
                                          INNER JOIN horario AS h ON h.nCurId=c.nCurId
                                        WHERE h.nHorEstado =0 and h.cHorFechaInicio BETWEEN '".$fechaI."' AND '".$fechaF."';");
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }
}

?>
