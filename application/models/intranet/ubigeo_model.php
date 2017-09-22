<?php

class Ubigeo_model extends CI_Model {
    
        private $tipo = '';
        private $codigo= '';
 
        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        
        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        
  
      //CONSTRUCTOR DE LA CLASE
    function __construct() {
          $this->load->database();
        parent::__construct();
//        if ($nPerId != null) {
//            $this->get_Persona($nPerId);
//        }
    }
    
    
    public function get_s_cbo_tipodocumento($str,$id) {
        $parametros = array($str,$id);
        $query = $this->db_bdcolegio->query("CALL UDP_GET_UBIGEO (?,?)",$parametros);
        $this->db_bdcolegio->close();
     if (count($query) > 0) {
             return $query->result();
        } else {
            return null;
        }
    }
     public function ubigeo_usuarioexterno($str,$depa,$prov) {
        $parametros = array($str,$depa,$prov);
        $query = $this->db->query("CALL GET_UBIGEO_USUARIOE(?,?,?)",$parametros);
        $this->db->close();
     if (count($query) > 0) {
             return $query->result();
        } else {
            return null;
        }
    }
   
}
    
?>
