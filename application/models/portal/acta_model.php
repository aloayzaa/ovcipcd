<?php

//CODIGO AUTOGENERADO - renzo
//Fecha:11-09-2012 13:44:48
class acta_model extends CI_Model {

    //atributos 
    private $ActID = '';
    private $ActPromedio = '';
    private $MatID = '';
    private $ParIdSede = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct($nactID = null) {
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }
    public function getActID() {
        return $this->ActID;
    }

    public function setActID($ActID) {
        $this->ActID = $ActID;
    }

        public function getActPromedio() {
        return $this->ActPromedio;
    }

    public function setActPromedio($ActPromedio) {
        $this->ActPromedio = $ActPromedio;
    }

    public function getMatID() {
        return $this->MatID;
    }

    public function setMatID($MatID) {
        $this->MatID = $MatID;
    }

    public function getParIdSede() {
        return $this->ParIdSede;
    }

    public function setParIdSede($ParIdSede) {
        $this->ParIdSede = $ParIdSede;
    }

       

    function actaIns() {
        $parametros = array($this->getActPromedio(), $this->getMatID(), $this->getParIdSede());
        $query = $this->db->query("CALL USP_GEN_I_acta(?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function actaUpd() {
        $parametros = array($this->getActPromedio(), $this->getMatID(), $this->getParIdSede(),$this->getActID());
//        print_r($parametros);
//        exit();
        $query = $this->db->query("CALL USP_GEN_U_acta (?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

    function actaDel($Parameters) {
        $parametros = array($Parameters);
        $query = $this->db->query("CALL USP_GEN_D_acta (?)", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function get_procedimiento() {
        $parametros = array('L-A-G', '');
        $query = $this->db->query("CALL USP_S_MATRICULA_acta (?,?),$parametros");

        if ($query->num_rows() > 0) {
            // if (count($query)>0){
            return $query->result();
        } else {
            return null;
        }
    }

    function personaQry() {
//        $parametros = array('L-A-G', '');
//        print_r($Parametros);
        $query = $this->db->query("CALL USP_GEN_S_PERSONA_CI ()");

        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }

    function actaGet($nactID) {
        $query = $this->db->query("SELECT * FROM acta WHERE nActID=? AND cactEstado='H'", array($nactID));
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setActPromedio($row->nActPromedio);
                $this->setMatID($row->nMatID);
                $this->setParIdSede($row->nParIdSede);
                
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }

}

?>