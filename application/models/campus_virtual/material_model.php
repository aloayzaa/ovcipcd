<?php

class Material_model extends CI_Model {
    
    private $idMaterial;
    private $idSesion;
    private $tipoMaterial = '';
    private $ubicacion = '';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getIdMaterial() {
        return $this->idMaterial;
    }

    public function setIdMaterial($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    public function getIdSesion() {
        return $this->idSesion;
    }

    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }

    public function getTipoMaterial() {
        return $this->tipoMaterial;
    }

    public function setTipoMaterial($tipoMaterial) {
        $this->tipoMaterial = $tipoMaterial;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }
    
    function materialGet($idSesion) {
       $query = $this->db->query("select mc.nMcuId, mc.nSesId, mc.cMcuTipo, mc.cMcuUbicacion from material_curso mc 
                                 where mc.nSesId = ?", array($idSesion));
        if (count($query) > 0) {
            return $query->result();
        } else {

            return false;
        }
    }

    function materialUpload() {
        $parametros = array($this->getIdSesion(), $this->getTipoMaterial(), $this->getUbicacion());
        $query = $this->db->query("call USP_CVI_I_Material(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function eliminarMaterial($idMaterial){
        $query = $this->db->query("call USP_CVI_D_Material(?)",array($idMaterial));
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
}

?>
