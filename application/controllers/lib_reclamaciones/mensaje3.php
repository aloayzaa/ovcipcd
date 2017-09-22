<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Mensaje3 extends CI_Controller {

  
    function __construct() {
        parent::__construct();
              $this->load->model('lib_reclamaciones/mensaje3_model');
              $this->load->helper('form');
              $this->load->library('form_validation');
              $this->load->helper('url');
              $this->bdlib_reclamaciones=$this->load->database("bdlib_reclamaciones",TRUE);
      
         }
    
    function index()
    {
     
     $this->load->view("lib_reclamaciones/mensaje3/panel_view");
     
    }
    function load_listar_reclamo3() {
        $data['buzon']=$this->mensaje3_model->mensajelistar_reclamo3();
        $this->load->view('lib_reclamaciones/mensaje3/qry_view', $data);
        $data['Areas']=$this->mensaje3_model->AreaCbo();
    }
    
      
    function load_listar_sugerencia3() {
       
        $data['buzonsug'] = $this->mensaje3_model->mensajelistar_sugerencia3();
        $this->load->view('lib_reclamaciones/mensaje3/qry_view_sug',$data);
    }
    
     function load_listar_opinion3() {
       
        $data['buzonopi'] = $this->mensaje3_model->mensajelistar_opiniones3();
        $this->load->view('lib_reclamaciones/mensaje3/qry_view_opi',$data);
    }
    
       
    
    
    


    
    
     function popupVistaPreviaMensaje($nMenIdMensaje ) {
         
         $campos = $this-> MensajeGet($nMenIdMensaje);
         $this->load->view('lib_reclamaciones/mensaje3/mensaje_view', $campos);
    }
    
     function MensajeGet($nMenIdMensaje ) {
         $query = $this->mensaje3_model->MensajeGet($nMenIdMensaje);
        if ($query) {
//            
//            $mensaje['area'] = $this->mensaje_model->getCDmeArea();
            $mensaje['nMenIdMensaje'] = $this->mensaje3_model->getNMenIdMensaje();
            $mensaje['asunto'] = $this->mensaje3_model->getCMenAsunto();
            $mensaje['mensaje'] = $this->mensaje3_model->getCMenMensaje();
           
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
               
               
              
               $resul=$this->mensaje_model->mensajeUpd();
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


