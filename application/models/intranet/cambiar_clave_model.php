<?php

class Cambiar_clave_model extends CI_Model {
    
    private $regcol = '';
    private $pwd = '';
    private $npwd = '';
    
    public function getRegcol() {
        return $this->regcol;
    }

    public function setRegcol($regcol) {
        $this->regcol = $regcol;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function getNpwd() {
        return $this->npwd;
    }

    public function setNpwd($npwd) {
        $this->npwd = $npwd;
    }
    
    function __construct() {
          $this->load->database();
        parent::__construct();

    }
    function ValidarPwd(){
        $param = array($this->getRegcol(),$this->getPwd());
        $query = $this->db->query("Call USP_CIP_CHANGE_PWD(?,?)", $param);
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return true;
            }else{
                return false;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    function UpdPwd(){
        $param = array($this->getRegcol(),$this->getNpwd());
        $query = $this->db->query("Call USP_CIP_CHANGE_PWD_UPD(?,?)", $param);
        $this->db->close();
        if ($query) {
                return true;
            }else{
                return false;
            }

    }
        function ComparaPwd($nueva){
        $param = array($nueva);
        $query = $this->db->query("Select * from usuario where cUsuClave = md5(?)", $param);
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return true;
            }else{
                return false;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }

    }
    
}
?>
