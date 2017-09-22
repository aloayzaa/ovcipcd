<?php

class Personajuridica_model extends CI_Model{
    
  
    private $Ruc ='';
    private $Rubro='';
    private $Rz='';
    private $Tel='';
    private $Fax='';
    private $Email='';
    private $DirF='';
    private $DirT='';
    private $Id='';
    
    function __construct() {
        $this->load->database();
        parent::__construct();
    }
        
    public function getRuc() {
        return $this->Ruc;
    }

    public function setRuc($Ruc) {
        $this->Ruc = $Ruc;
    }

    public function getRubro() {
        return $this->Rubro;
    }

    public function setRubro($Rubro) {
        $this->Rubro = $Rubro;
    }

    public function getRz() {
        return $this->Rz;
    }

    public function setRz($Rz) {
        $this->Rz = $Rz;
    }

    public function getTel() {
        return $this->Tel;
    }

    public function setTel($Tel) {
        $this->Tel = $Tel;
    }

    public function getFax() {
        return $this->Fax;
    }

    public function setFax($Fax) {
        $this->Fax = $Fax;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function getDirF() {
        return $this->DirF;
    }

    public function setDirF($DirF) {
        $this->DirF = $DirF;
    }

    public function getDirT() {
        return $this->DirT;
    }

    public function setDirT($DirT) {
        $this->DirT = $DirT;
    }

    public function getId() {
        return $this->Id;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

              
    
    function personajuridicaIns() {
        $parametro = array($this->getRuc(),  $this->getRubro(),  $this->getRz(),  $this->getTel(),
        $this->getFax(),  $this->getEmail(),  $this->getDirF(),  $this->getDirT());
        $query = $this->db->query("call USP_PERIT_INSERTAR_PERSONAJURIDICA(?,?,?,?,?,?,?,?)", $parametro);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
    
    function personajuridicaQry($busqueda='') {
        $query = $this->db->query("call USP_PERIT_LISTAR_PERSONAJURIDICA(?)",$busqueda);
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }
    
    function get_s_cbo_rubro(){
        $query = $this->db->query("select nParId,cParDescripcion from parametro where bParEliminado='0' and  nPcaId=353          
 order by cParDescripcion");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result();
        } else {
            return null;
        }
    }


    function personajuridicaDel() {
        $parametros = array($this->getId());
        $query = $this->db->query("call USP_PERIT_DEL_PERSONA(?)", $parametros);
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    function personajuridicaUpd(){
    $parametros =array($this->getId(),
            $this->getRz(),
            $this->getRubro(),
            $this->getTel(),
            $this->getFax(),
            $this->getEmail(),
            $this->getDirF(),
            $this->getDirT(),
        );
    $query = $this->db->query("call USP_PERIT_UPD_PERSONAJURIDICA(?,?,?,?,?,?,?,?)",$parametros);
       $this->db->close();
        if ($query) {
            return true;
        } else {
            throw new Exception('error al recuperar data');
        }
    }
    function personajuridicaGet($id) {
       // $parametros = $this->getId();
        $query = $this->db->query("call USP_PERIT_S_PERSONA(?)",$id);
               $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->setId($row->nPerId);
                $this->setRuc($row->Ruc);
                $this->setRubro($row->nParId);
                $this->setRz($row->cPerNombres);
                $this->setTel($row->Tel);
                $this->setFax($row->Fax);
                $this->setEmail($row->Email);
                $this->setDirF($row->DirF);
                $this->setDirT($row->DirT);
                return true;
            }
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    
    
    function get_datos_ruc($ruc) {
       $query = $this->db->query("call USP_PERIT_S_RUC(?)",$ruc);
               $this->db->close();
        if ($query->num_rows()> 0) {
            $row = $query->row();
            $this->setRz($row->cPerNombres);
            $this->setRubro($row->nParId);
            $this->setTel($row->Tel);
            $this->setFax($row->Fax);
            $this->setDirT($row->DirT);
            $this->setDirF($row->DirF);
            $this->setEmail($row->Email);
            return true;
        } else {
            return null;
        }
    }

}

?>
