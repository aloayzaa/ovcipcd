<?php

class Alumno_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
function alumnoCursosQry($criterio = '') {
        $cri = $criterio['criterio'];
        $idPersona = strstr($cri, '-', true);
        $a = strstr($cri, '-');
        $anio = substr($a, 1);
        $query = $this->db->query("select h.nHorId as id, concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Docente, concat(c.cCurNombre, ' > ', h.cHorFechaInicio, ' - ', h.cHorFechaFin, ' > ', h.cHorAmbiente) as Horario from matricula m 
                                  inner join horario h on m.nHorId=h.nHorId 
                                  inner join curso c on h.nCurId=c.nCurId 
                                  inner join persona p on h.nPerId=p.nPerId 
                                  where m.nPerId = ? and h.nHorEstado = 0 and 
                                  insert(h.cHorFechaInicio, 5, 7, '') = ?;", array($idPersona, $anio));
         if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }

    
    function dameNotasAlumno($idPersona, $idHorario){
        $query = $this->db->query("select concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Persona, s.cSesTitulo as Titulo, n.cNotValor as Nota from sesion s 
                                  inner join nota n on s.nSesId = n.nSesId 
                                  inner join persona p on n.nPerId = p.nPerId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where p.nPerId = ? and h.nHorId = ?;", array($idPersona, $idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function dameAsistenciasAlumno($idPersona, $idHorario){
        $query = $this->db->query("select concat(p.cPerApellidoPaterno, ' ', p.cPerApellidoMaterno, ', ', p.cPerNombres) as Persona, s.cSesTitulo as Titulo, DATE_FORMAT(s.cSesFechaProgramada,'%d/%m/%Y') as Fecha, a.cAsiValor as Estado from sesion s 
                                  inner join asistencia a on s.nSesId = a.nSesId 
                                  inner join persona p on a.nPerId = p.nPerId 
                                  inner join horario h on s.nHorId = h.nHorId 
                                  where p.nPerId = ? and h.nHorId = ?;", array($idPersona, $idHorario));
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}

?>
