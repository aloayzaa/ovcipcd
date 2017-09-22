<?php

class Ubigeo_model extends CI_Model {
          
    private $idd = '';
    private $idp = '';
    
    public function getIdd() {
        return $this->idd;
    }

    public function setIdd($idd) {
        $this->idd = $idd;
    }

    public function getIdp() {
        return $this->idp;
    }

    public function setIdp($idp) {
        $this->idp = $idp;
    }
   
   
     function __construct() {
        parent::__construct();
        $this->load->database();
    }
   
    function Datoscivil()
    {
//        $parametros = array($this->getIdd());
        $query = $this->db->query('select * from parametro where nPcaId=2 and nParId <> 6');
      
         if (count($query)>0) {
                return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
function DatosUbigeo()
    {
        $parametros = array($this->getIdd(),$this->getIdp());
        $query = $this->db->query('CALL sp_ubigeo(?,?)',$parametros);
            $this->db->close();
         if ($query->num_rows()>0) {
                return $query->result();
        } else {
            throw new Exception('error al recuperar datos de la BD');
        }
    }
}
    
?>
