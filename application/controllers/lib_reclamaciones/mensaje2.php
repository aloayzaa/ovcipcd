<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Mensaje2 extends CI_Controller {

  
    function __construct() {
        parent::__construct();
              $this->load->model('lib_reclamaciones/mensaje2_model');
              $this->load->helper('form');
              $this->load->library('form_validation');
              $this->load->helper('url');
              $this->bdlib_reclamaciones=$this->load->database("bdlib_reclamaciones",TRUE);
      
         }
    
    function index()
    {
     
     $this->load->view("lib_reclamaciones/mensaje2/panel_view");

    }
    function load_listar_reclamo2() {
        $data['buzon']=$this->mensaje2_model->mensajelistar_reclamo();
        $this->load->view('lib_reclamaciones/mensaje2/qry_view', $data);
    }
      
    function load_listar_sugerencia2() {
       
        $data['buzonsug'] = $this->mensaje2_model->mensajelistar_sugerencia();
        $this->load->view('lib_reclamaciones/mensaje2/qry_view_sug',$data);
    }
    
     function load_listar_opinion2() {
       
        $data['buzonopi'] = $this->mensaje2_model->mensajelistar_opiniones();
        $this->load->view('lib_reclamaciones/mensaje2/qry_view_opi',$data);
    }
     function mensajeIns() {
//       $this->form_validation->set_rules('hid_upd_cur_id', 'nMenIdMensaje', '|trim|required');
        $this->form_validation->set_rules('txt_ins_men_cMenMensaje', 'Mensaje', '|trim|required');
       $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            
            $this->mensaje2_model->setNMenIdMensaje($this->input->post('hid_upd_cur_id'));
              $this->mensaje2_model->setCMenMensaje($this->input->post('txt_ins_men_cMenMensaje'));
              $this->mensaje2_model->setdMenFecha( date("d-m-y h:i:s"));
              $resul = $this->mensaje2_model->mensajeIns();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }
    
       
    
    
    


    
    
     function popupVistaPreviaMensaje($nMenIdMensaje ) {
         
         $campos = $this-> MensajeGet($nMenIdMensaje);
         $this->load->view('lib_reclamaciones/mensaje2/mensaje2_view', $campos);
    }
    
     function MensajeGet($nMenIdMensaje ) {
         $query = $this->mensaje2_model->MensajeGet($nMenIdMensaje);
        if ($query) {
//            
//            $mensaje['area'] = $this->mensaje_model->getCDmeArea();
            $mensaje['nMenIdMensaje'] = $this->mensaje2_model->getNMenIdMensaje();
            $mensaje['asunto'] = $this->mensaje2_model->getCMenAsunto();
            $mensaje['mensaje'] = $this->mensaje2_model->getCMenMensaje();
           
            return $mensaje;
        } else {
            return false;
        }
    }
    
    function mensajeUpd() {
//        $this->form_validation->set_rules('txt_upd_rec_nombre', 'nombre', '|trim|required');
//    $this->form_validation->set_rules('txt_upd_rec_area', 'area', '|trim|required');
//    $this->form_validation->set_rules('txt_upd_rec_subarea', 'subarea', '|trim|required');
  $this->form_validation->set_rules('txt_upd_rec_asunto', 'asunto', '|trim|required');
   $this->form_validation->set_rules('txt_upd_rec_mensaje', 'mensaje', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
//                $this->mensaje_model->setNMenIdMensaje($this->input->post('txt_upd_rec_nombre'));
//               $this->mensaje_model->setCDmeArea($this->input->post('txt_upd_rec_area'));
//               $this->mensaje_model->setCDmeSubArea($this->input->post('txt_upd_rec_subarea'));
               $this->mensaje_model->setCMenAsunto($this->input->post('txt_upd_rec_asunto'));
               $this->mensaje_model->setCMenMensaje($this->input->post('txt_upd_rec_mensaje'));
               $this->mensaje_model->setdMenFecha( date("d-m-y h:i:s"));
               
               
              
               $resul=$this->mensaje2_model->mensajeUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    } 
    
     
    }
    
    


?>
