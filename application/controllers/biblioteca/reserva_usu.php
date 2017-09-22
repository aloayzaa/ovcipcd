<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Reserva_usu extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/reserva_usu_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Mis Reservas';
         $this->load->view("biblioteca/reserva_usu/panel_view",$data);    
//         $data['titulo'] = 'Historial Reservas';
//         $this->load->view("biblioteca/reserva/panel_view2",$data);
     }
     
     function load_listar_view_reserva_usu() {
         $iduser=  $this->session->userdata('nick');
           $tipouser=  $this->session->userdata('nUsuTipo');
        $data['reservas'] = $this->reserva_usu_model->reserva_usuqry($iduser,$tipouser);
        $this->load->view('biblioteca/reserva_usu/qry_view',$data);
    }
    
    
     
     function FavoritosAdd($nMatId = null,$cMatTipo=null,$nPerId=null) {
        
           $tipouser=  $this->session->userdata('nUsuTipo');
        $this->reserva_usu_model->setNMatId($nMatId);
        $this->reserva_usu_model->setCMatTipo($cMatTipo);
        $this->reserva_usu_model->setNPerId($nPerId);
        $result = $this->reserva_usu_model->FavoritosAdd($tipouser);
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
       function ReservaCancel($nResId = null,$cMatTipo=null,$nMatId=null) {
        $this->reserva_usu_model->setNResId($nResId);
        $this->reserva_usu_model->setCMatTipo($cMatTipo);
        $this->reserva_usu_model->setNMatId($nMatId);
        $result = $this->reserva_usu_model->ReservaCancel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
    
       function reservains(){
         $iduser=  $this->session->userdata('nick');//colegiado
         $id=  $this->session->userdata('IDUsu');//administrativo
          $tipouser=  $this->session->userdata('nUsuTipo');
        $this->reserva_usu_model->setFechafin($this->input->post('txt_det_fecha'));
         $this->reserva_usu_model->setHora($this->input->post('txthora'));
            $this->reserva_usu_model->setCApe($this->input->post('txt_ins_res_ape'));
               $this->reserva_usu_model->setNombres($this->input->post('txt_ins_res_name'));
                  $this->reserva_usu_model->setUniversidad($this->input->post('cbo_ins_mat_univer'));
         $this->reserva_usu_model->setNMatId($this->input->post('hid_mat_idMaterial'));
         
              $resul = $this->reserva_usu_model->reservains($iduser,$tipouser,$id);
            
            if ($resul) {
                echo 1;
                exit;
                
            } else {
                echo 0;
                exit;
            }
    }
    
      function reservainslib(){
         $iduser=  $this->session->userdata('nick');
             $id=  $this->session->userdata('IDUsu');//administrativo
          $tipouser=  $this->session->userdata('nUsuTipo');
        $this->reserva_usu_model->setFechafin($this->input->post('txt_det_fecha_lib'));
         $this->reserva_usu_model->setHora($this->input->post('txthora'));
          $this->reserva_usu_model->setCApe($this->input->post('txt_ins_res_ape_lib'));
               $this->reserva_usu_model->setNombres($this->input->post('txt_ins_res_name_lib'));
                  $this->reserva_usu_model->setUniversidad($this->input->post('cbo_ins_mat_univer'));
         $this->reserva_usu_model->setNMatId($this->input->post('hid_lib_idMaterial'));
         
              $resul = $this->reserva_usu_model->reservainslib($iduser,$tipouser,$id);
            
            if ($resul) {
                echo 1;
                exit;
                
            } else {
                echo 0;
                exit;
            }
    }
     
 }
 
 



?>
