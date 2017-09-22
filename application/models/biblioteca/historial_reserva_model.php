<?php
class Historial_reserva_model extends CI_Model{
    
      function __construct() {
             parent::__construct();
                $this->load->database();        
    }
    
    
     function historialreservaqry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_HISTORIAL_RESERVA");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    
         function historialreserva_ext_qry() {
//        $parametros = array('criterio');
        $query = $this->db_biblioteca->query("call USP_HISTORIAL_RESERVA_EXT");
        if ($query->num_rows() > 0) {
            $this->db_biblioteca->close();
            return $query->result_array();
        } else {
            return null;
        }
    }
}
?>
