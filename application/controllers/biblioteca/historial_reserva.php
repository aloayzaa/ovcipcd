<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Historial_reserva extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/historial_reserva_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Historial de Reservas';
         $this->load->view("biblioteca/historial_reserva/panel_view",$data);    

     }
     
     function load_listar_view_historial_reserva() {
        $data['historial'] = $this->historial_reserva_model->historialreservaqry();
        $this->load->view('biblioteca/historial_reserva/qry_view',$data);
    }
     
         function load_listar_view_historial_reserva_ext() {
        $data['historial_ext'] = $this->historial_reserva_model->historialreserva_ext_qry();
        $this->load->view('biblioteca/historial_reserva/qry_view_his_ext',$data);
    }

     
 }



?>

