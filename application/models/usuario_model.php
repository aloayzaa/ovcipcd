<?php

class Usuario_model extends CI_Model {

    //DECLARACION DE VARIABLES
    private $nUsuId = '';
    private $cUsuNick = '';
    private $cUsuClave = '';
    private $bUsuEstado = '';
    private $nUsuTipo = '';
    private $PerId = '';
    private $PerApellidoPaterno = '';
    private $PerApellidoMaterno = '';
    private $PerNombres = '';
    private $nombres = '';
    private $tipoclase = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct($id = null) {
        parent::__construct();
        $this->load->database();
        if ($id != null) {
            $this->get_ObjUsuario($id);
        }
    }

    //FUNCIONES SET
    function set_nUsuId($nUsuId) {
        $this->nUsuId = $nUsuId;
    }

    function set_cUsuNick($cUsuNick) {
        $this->cUsuNick = $cUsuNick;
    }

    function set_cUsuClave($cUsuClave) {
        $this->cUsuClave = $cUsuClave;
    }

    function set_bUsuEstado($bUsuEstado) {
        $this->bUsuEstado = $bUsuEstado;
    }

    function set_nUsuTipo($nUsuTipo) {
        $this->nUsuTipo = $nUsuTipo;
    }

    public function setPerId($PerId) {
        $this->PerId = $PerId;
    }

    public function setPerApellidoPaterno($PerApellidoPaterno) {
        $this->PerApellidoPaterno = $PerApellidoPaterno;
    }

    public function setPerApellidoMaterno($PerApellidoMaterno) {
        $this->PerApellidoMaterno = $PerApellidoMaterno;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    public function setTipoclase($tipoclase) {
        $this->tipoclase = $tipoclase;
    }

    
    
    
    //FUNCIONES GET
    function get_nUsuId() {
        return $this->nUsuId;
    }

    function get_cUsuNick() {
        return $this->cUsuNick;
    }

    function get_cUsuClave() {
        return $this->cUsuClave;
    }

    function get_bUsuEstado() {
        return $this->bUsuEstado;
    }

    function get_nUsuTipo() {
        return $this->nUsuTipo;
    }

    public function getPerId() {
        return $this->PerId;
    }

    public function getPerApellidoPaterno() {
        return $this->PerApellidoPaterno;
    }

    public function getPerApellidoMaterno() {
        return $this->PerApellidoMaterno;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }
        public function getNombres() {
        return $this->nombres;
    }
    public function getTipoclase() {
        return $this->tipoclase;
    }


    function autenticarz($data) {
        $query = $this->db->query("CALL USP_GEN_S_VALIDA_USUARIO2(?,?,?)", $data);
//             print_r($query);exit();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->set_nUsuId($row->nUsuId);
            $this->set_cUsuNick($row->cUsuNick);                              
            $this->set_bUsuEstado($row->bUsuEstado);
            $this->set_nUsuTipo($row->nUsuTipo);
            $this->setTipoclase($row->tipoclase);
            $this->setPerId($row->nPerId);
          
//            $this->setPerApellidoPaterno($row->cPerApellidoPaterno);
//            $this->setPerApellidoMaterno($row->cPerApellidoMaterno);
//            $this->setPerNombres($row->cPerNombres);
            
            $this->setNombres($row->nombres);

            return true;
        } else {
//                 $this->set_cUsuNick($cUsuNick);
//                $this->set_cUsuClave($cUsuClave);  
            return false;
        }
    }

}



