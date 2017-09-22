<?php

class Verificar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/habilidad_col_model');
        $this->load->model('intranet/cuenta_colegiado_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
     function habilidad($str='') {
	   if ($str==''){
         show_404();
      }else{
        $query = $this->habilidad_col_model->habilidadCheck($str);
        $datos['habilidad'] = $this->habilidad_col_model->getHabilidad();
        $this->load->view('verificar/habilidad', $datos);
     }}
     

}

?>
