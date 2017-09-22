<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Reserva extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/reserva_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Reservas';
         $this->load->view("biblioteca/reserva/panel_view",$data);    
//         $data['titulo'] = 'Historial Reservas';
//         $this->load->view("biblioteca/reserva/panel_view2",$data);
     }
     
     function load_listar_view_reserva() {
        $data['reservas'] = $this->reserva_model->reservaqry();
        $this->load->view('biblioteca/reserva/qry_view',$data);
    }
    
  
     
     function MaterialDel($nResId = null,$cMatTipo=null,$nMatId=null) {
        $this->reserva_model->setNResId($nResId);
            $this->reserva_model->setCMatTipo($cMatTipo);
        $this->reserva_model->setNMatId($nMatId);
        $result = $this->reserva_model->MaterialDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
    function MaterialEntregar($nResId=null){
            $this->reserva_model->setNResId($nResId);
        $result = $this->reserva_model->MaterialEntregar();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
     
 }



?>
