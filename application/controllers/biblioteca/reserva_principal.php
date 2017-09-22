<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Reserva_principal extends CI_Controller {
    function __construct() {
        parent::__construct();
       // $this->_Esta_logeado(); 
    }

    public function index() {
$this->loaders->verificaAcceso('W');
        $data['main_content'] = 'biblioteca/panel_view_principal';
        $data['titulo'] = 'Panel Principal de Biblioteca';
        
        $this->load->view('biblioteca/template',$data);
    }
    
       function mostrar() {
        
        redirect("biblioteca/reserva_usuario");
    }

//    function _Esta_logeado() {
//        $esta_logeado = $this->session->userdata('esta_logeado');
//        $nPerID = $this->session->userdata('nPerID');
//        if ($esta_logeado != true OR $nPerID = '') {
//            redirect('usuario/login');
//        }
//    } 
}
