<?php
class Reserva_adm_model extends CI_Model{
    
    
    private $nResId_adm=''; 
    private $nMatId_adm='';
        private $cMatTipo_adm='';
   
        public function getNResId_adm() {
            return $this->nResId_adm;
        }

        public function setNResId_adm($nResId_adm) {
            $this->nResId_adm = $nResId_adm;
        }

        public function getNMatId_adm() {
            return $this->nMatId_adm;
        }

        public function setNMatId_adm($nMatId_adm) {
            $this->nMatId_adm = $nMatId_adm;
        }

        public function getCMatTipo_adm() {
            return $this->cMatTipo_adm;
        }

        public function setCMatTipo_adm($cMatTipo_adm) {
            $this->cMatTipo_adm = $cMatTipo_adm;
        }

                
  

            
        
      function reserva_adm_qry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_HISTORIAL_RESERVA");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
          function reserva_adm_ext_qry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_HISTORIAL_RESERVAS_ADM_EXT");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
        function MaterialActivar() {
        $parametros = array($this->getNResId_adm(),$this->getCMatTipo_adm(),$this->getNMatId_adm());
  
//        print_r($parametros);
        $query = $this->db_biblioteca->query("CALL USP_RESERVA_ACTIVAR (?,?,?)",$parametros);
      
        if ($query) {
                    return true;
        } else {
            return false;
        }
    }
    

    
}
?>
