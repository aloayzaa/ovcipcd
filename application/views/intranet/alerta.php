<?php

class Alerta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/migration_col_model');
        $this->db_bdcolegio = $this->load->database('colegio', TRUE);
    }
    
    function index(){
        $this->load->view('intranet/alerta/panel_view');
    }
     function load_migration() {
        $query = $this->migration_col_model->LoadMigration($this->input->post('hid_upd_regcol'));
        if ($query) {
        echo 1;
        }else{
        echo 0;
        }
     }
    
}
?>
