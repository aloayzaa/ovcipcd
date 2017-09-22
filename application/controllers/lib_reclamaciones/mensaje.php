<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Mensaje extends CI_Controller {

  
    function __construct() {
        parent::__construct();
              $this->load->model('lib_reclamaciones/mensaje_model');
              $this->load->helper('form');
              $this->load->library('form_validation');
              $this->load->helper('url');
              $this->bdlib_reclamaciones=$this->load->database("bdlib_reclamaciones",TRUE);
      
         }
    
    function index()
    {
     $data['TipoMensaje']=$this->mensaje_model->TipoMensajeCbo();
     $data['Area']=$this->mensaje_model->AreaCbo();
     $this->load->view("lib_reclamaciones/mensaje/panel_view",$data);

    }
    function load_listar_reclamo() {
        $data['buzon']=$this->mensaje_model->mensajelistar_reclamo();
        $this->load->view('lib_reclamaciones/mensaje/qry_view', $data);
    }
      
    function load_listar_sugerencia() {
       
        $data['buzonsug'] = $this->mensaje_model->mensajelistar_sugerencia();
        $this->load->view('lib_reclamaciones/mensaje/qry_view_sug',$data);
    }
    
     function load_listar_opinion() {
       
        $data['buzonopi'] = $this->mensaje_model->mensajelistar_opiniones();
        $this->load->view('lib_reclamaciones/mensaje/qry_view_opi',$data);
    }
    
       
    public function llena_SubArea()
    {
        $options = "";
        if($this->input->post('Area'))
        {
            $Area = $this->input->post('Area');
            $SubArea = $this->mensaje_model->SubArea($Area);
             $filas2[''] = 'Selecciona una SubArea';
            foreach($SubArea as $fila)
            {
                   $filas2[$fila->nSuaIdSubArea] =$fila->cSuaNombreSubArea;
            }
          echo form_dropdown('cbo_ins_men_cDmeSubArea',$filas2,'',
                  'id="cbo_ins_men_cDmeSubArea" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione especialidad" data-placement="right"');
        }
    }
    
    
 function setDMenFecha($dMenFecha) {
         $this->dMenFecha = $dMenFecha;
         
     }

    
    function mensajeIns() {
        $this->form_validation->set_rules('cbo_ins_men_cMenTipoMensaje', 'TipoMensaje','|trim|required');
//        $this->form_validation->set_rules('txt_ins_men_cDmeEmisor', 'Nombre', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_men_cDmeArea', 'Area', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_men_cDmeSubArea', 'SubArea', '|trim|required');
        $this->form_validation->set_rules('txt_ins_men_cMenAsunto', 'Asunto', '|trim|required');
        $this->form_validation->set_rules('txt_ins_men_cMenMensaje', 'Mensaje', '|trim|required');
       
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
              $this->mensaje_model->setCMenTipoMensaje($this->input->post('cbo_ins_men_cMenTipoMensaje'));
//              $this->mensaje_model->setCDmeEmisor($this->input->post('IDPer'));
//            $this->mensaje_model->setCDmeOficina($this->input->post('txt_ins_men_cDmeOficina'));
              $this->mensaje_model->setCDmeArea($this->input->post('cbo_ins_men_cDmeArea'));
              $this->mensaje_model->setCDmeSubArea($this->input->post('cbo_ins_men_cDmeSubArea'));
              $this->mensaje_model->setCMenAsunto($this->input->post('txt_ins_men_cMenAsunto'));
              $this->mensaje_model->setCMenMensaje($this->input->post('txt_ins_men_cMenMensaje'));
//              $this->mensaje_model->setdMenFecha( date("d-m-y h:i:s"));
              $resul = $this->mensaje_model->mensajeIns();
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
         $this->load->view('lib_reclamaciones/mensaje/mensaje_view', $campos);
    }
    
     function MensajeGet($nMenIdMensaje ) {
         $query = $this->mensaje_model->MensajeGet($nMenIdMensaje);
        if ($query) {
//            
//            $mensaje['area'] = $this->mensaje_model->getCDmeArea();
            $mensaje['nMenIdMensaje'] = $this->mensaje_model->getNMenIdMensaje();
            $mensaje['asunto'] = $this->mensaje_model->getCMenAsunto();
            $mensaje['mensaje1'] = $this->mensaje_model->getCMenMensaje();
           $mensaje['mensajeRes'] = $this->mensaje_model->getCBuzonMensaje();
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
