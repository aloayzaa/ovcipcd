<?php
class Reserva_model extends CI_Model{
    
    
    private $nResId=''; 
    private $nMatId='';
    private $cMatTipo=''; 

        
    public function getNResId() {
        return $this->nResId;
    }

    public function setNResId($nResId) {
        $this->nResId = $nResId;
    }
    
  
    public function getNMatId() {
        return $this->nMatId;
    }

    public function setNMatId($nMatId) {
        $this->nMatId = $nMatId;
    }

    
    public function getCMatTipo() {
        return $this->cMatTipo;
    }

    public function setCMatTipo($cMatTipo) {
        $this->cMatTipo = $cMatTipo;
    }

            
        
      function reservaqry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_RESERVA_AUT");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    

    
        function MaterialDel() {
        $parametros = array($this->getNResId(),$this->getNMatId(),$this->getCMatTipo());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_RESERVA_ELIMINAR (?,?,?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    
    function  MaterialEntregar(){
               $parametros = array($this->getNResId());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_RESERVA_ENTREGAR (?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    

    
}
?>
