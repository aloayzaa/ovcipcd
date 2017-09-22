 <?php

class Cambiar_clave extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/cambiar_clave_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    function index() {
$this->loaders->verificaAcceso('W');
         $datos['titulo'] = 'Modulo de Cambiar Contrasena';
        $this->load->view('intranet/cambiar_clave/panel_view',$datos);
    }
    function ValidarPwd(){
        $this->cambiar_clave_model->setPwd($this->input->post('txt_upd_col_clavebefore'));
        $this->cambiar_clave_model->setRegcol($this->input->post('codigo'));
        
        $query = $this->cambiar_clave_model->ValidarPwd();
         if ($query) {
                echo "true";
            } else {
                echo "false";
            }
    }
    
    function UpdPassword(){
        $this->cambiar_clave_model->setNpwd($this->input->post('txt_upd_col_claveafter'));
        $this->cambiar_clave_model->setRegcol($this->input->post('hid_upd_regcol'));
        
        $query = $this->cambiar_clave_model->UpdPwd();
         if ($query) {
                echo 1;
             } else {
                echo 0;
            }
    }
     function ClavesIguales(){
        $query = $this->cambiar_clave_model->ComparaPwd($this->input->post('txt_upd_col_claveafter'));
       
         if ($query) {
                echo "false";
             } else {
                echo "true";
            }
    }
}
?>
 