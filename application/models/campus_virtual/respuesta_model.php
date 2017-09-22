<?php

class Respuesta_model extends CI_Model {

    private $idrespuesta = '';
    private $valor = '';
    private $idpersona = '';
    private $idpregunta = '';
    private $idHorario = '';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getIdrespuesta() {
        return $this->idrespuesta;
    }

    public function setIdrespuesta($idrespuesta) {
        $this->idrespuesta = $idrespuesta;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getIdpersona() {
        return $this->idpersona;
    }

    public function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }

    public function getIdpregunta() {
        return $this->idpregunta;
    }

    public function setIdpregunta($idpregunta) {
        $this->idpregunta = $idpregunta;
    }

    public function getIdHorario() {
        return $this->idHorario;
    }

    public function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

    function GetDetalle($idPersona,$idHorario) {
        $query = $this->db->query("SELECT h.nHorId, c.cCurNombre as Curso, p.nPerId from horario h
        inner join persona p on h.nPerId=p.nPerId
        inner join curso c on h.nCurId=c.nCurId
        where h.nHorId = ?", array($idHorario));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $horario['idHorario'] = $row->nHorId;
            $horario['Curso'] = $row->Curso;
            $horario['idPersona'] = $idPersona;
            return $horario;
        } else {
            return false;
        }
    }

    function insRespuesta(){

        $parametros = array($this->getIdpregunta(), $this->getValor(), $this->getIdHorario(), $this->getIdpersona());
        $query = $this->db->query("call USP_CVI_I_Respuestas(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
               }
    }

    function damePreguntaCurso($idPersona, $idHorario) {
        $query = $this->db->query("SELECT h.nHorId, p.cPreEnunciado, p.nPreId FROM matricula m
                                    INNER JOIN horario h ON m.nHorId = h.nHorId
                                    INNER JOIN pregunta_encuesta e ON m.nHorId = e.nHorId
                                    INNER JOIN pregunta p On e.nPreId = p.nPreId
                                    WHERE e.nEstado = 1 and m.nPerId = ? and h.nHorId = ?", array($idPersona, $idHorario) );
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function damePreguntaCursoActivar($idHorario) {
        $query = $this->db->query("SELECT h.nHorId, p.cPreEnunciado, p.nPreId FROM 
                             horario h 
                                    INNER JOIN pregunta_encuesta e ON h.nHorId = e.nHorId
                                    INNER JOIN pregunta p ON e.nPreId = p.nPreId
                                    WHERE e.nEstado = 0 and h.nHorId = ?", array($idHorario) );
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function tieneRespuestas($idPersona, $idHorario) {
        $query = $this->db->query("SELECT  * FROM respuesta WHERE nPerId = ? and nHorId = ?", array($idPersona, $idHorario) );
        if (count($query) > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>
