<?php

class Sugerencialista_model extends CI_Model {
    
     private $nSugerenciaId = '';
    private $cPerNombre = '';
    private $cPerEmail = '';
    private $cPerSugerencia = '';
   
     
      function __construct() {
        $this->load->database();
    
        parent::__construct();
    }
      
     public function getNSugerenciaId() {
        return $this->nSugerenciaId;
    }

    public function setNSugerenciaId($nSugerenciaId) {
        $this->nSugerenciaId = $nSugerenciaId;
    }

    public function getCPerNombre() {
        return $this->cPerNombre;
    }

    public function setCPerNombre($cPerNombre) {
        $this->cPerNombre = $cPerNombre;
    }

    public function getCPerEmail() {
        return $this->cPerEmail;
    }

    public function setCPerEmail($cPerEmail) {
        $this->cPerEmail = $cPerEmail;
    }

    public function getCPerSugerencia() {
        return $this->cPerSugerencia;
    }

    public function setCPerSugerencia($cPerSugerencia) {
        $this->cPerSugerencia = $cPerSugerencia;
    }
    

//LISTAR
    
    
     function sugerenciaQry() {
        $query = $this->db->query("select * from sugerencia where cSugEstado=1 order by nSugerenciaId desc");
        if ($query->num_rows() > 0) {
            $this->db->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    

       function sugerenciaGet($nSugerenciaId) {
        $query = $this->db->query("SELECT nSugerenciaId,cPerNombre, cPerEmail, cPerSugerencia 
FROM cPerSugerencia c WHERE nSugerenciaId=?", array($nSugerenciaId));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            //Objeto
            $this->setNSugerenciaId($row->nSugerenciaId);
            $this->setCPerNombre($row->cPerNombre);
            $this->setCPerEmail($row->cPerEmail);
            $this->setCPerSugerencia($row->cPerSugerencia);
            return true;
        } else {
            return false;
        }
    }   
         function sugerenciaDel(){
        $parametros= array($this->getNSugerenciaId());
        $query = $this->db->query("call USP_SUGERENCIA_DEL(?)",$parametros);
        if ($query) {
             
            return true;
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
    

    
}

?>
