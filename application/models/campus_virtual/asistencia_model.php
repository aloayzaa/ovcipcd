<?php

class Asistencia_model extends CI_Model {
    
    private $idSesion;
    private $idPersona;
    private $fecha = '';
    private $valor = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getIdSesion() {
        return $this->idSesion;
    }

    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    function actualizarEstadoAsistencia(){
        $parametros = array($this->getIdSesion(), $this->getIdPersona(), $this->getValor());
        $query = $this->db->query("call USP_CVI_U_Asistencia(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function asistenciaIns() {
        $parametros = array($this->getIdSesion(), $this->getIdPersona(), $this->getFecha(), $this->getValor());
        $query = $this->db->query("call USP_CVI_I_Asistencia(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
		echo '2';
        }
    }
}

?>
