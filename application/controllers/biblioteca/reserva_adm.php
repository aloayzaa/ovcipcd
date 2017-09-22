<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Reserva_adm extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/reserva_adm_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Reservas Administrador';
         $this->load->view("biblioteca/reserva_adm/panel_view",$data);    
     }
     
     function load_listar_view_reserva_adm() {
        $data['historial_adm'] = $this->reserva_adm_model->reserva_adm_qry();
        $this->load->view('biblioteca/reserva_adm/qry_view',$data);
    }
     
        function load_listar_view_reserva_admExternos() {
        $data['historial_adm_ext'] = $this->reserva_adm_model->reserva_adm_ext_qry();
        $this->load->view('biblioteca/reserva_adm/qry_view_ext',$data);
    }
    
     function MaterialActivar($nResId = null,$cMatTipo=null,$nMatId=null) {
        $this->reserva_adm_model->setNResId_adm($nResId);
          $this->reserva_adm_model->setNMatId_adm($cMatTipo);
        $this->reserva_adm_model->setCMatTipo_adm($nMatId);
        $result = $this->reserva_adm_model->MaterialActivar();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
     
 }



?>
