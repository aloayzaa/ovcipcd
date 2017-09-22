<?php

class bitacora_model extends CI_Model {
    
    private $idUsuario;
    private $tabla;
    private $campo;
    private $tipoOperación;
    private $fecha;
    private $valorAnterior;
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    public function getTabla() {
        return $this->tabla;
    }
    
    public function setTabla($tabla) {
        $this->tabla=$tabla;
    }
    
    public function getCampo() {
        return $this->campo;
    }
    
    public function setCampo($campo) {
        $this->campo=$campo;
    }
    
    public function getTipoOperacion() {
        return $this->tipoOperación;
    }
    
    public function setTipoOperacion($tipoOperacion) {
        $this->tipoOperación = $tipoOperacion;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
    public function getValorAnterior() {
        return $this->valorAnterior;
    }
    
    public function setValorAnterior($valor) {
        $this->valorAnterior = $valor;
    }
    
    function bitacoraIns() {
        $parametros = array($this->getIdUsuario(), 
                            $this->getTabla(),
                            $this->getCampo(),
                            $this->getTipoOperacion(),
                            $this->getFecha(),
                            $this->getValorAnterior());
//        $parametros = array($idSesion, $idPersona, $valor);
        $query = $this->bdcampus->query("CALL USP_CVI_I_Bitacora(?,?,?,?,?,?)", $parametros);
        $this->bdcampus->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
}
?>
