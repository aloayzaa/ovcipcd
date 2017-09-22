<?php

class Requisitos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('eventos/eventos_model','',TRUE);
        $this->load->model('sistram/requisitos_model');
        
    }

    function index() {
           $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Requisitos';
        $this->load->view('sistram/requisitos/panel_view', $data);
    }

    function load_listar_view_requisitos() {
        $data['requisitos'] = $this->requisitos_model->requisitosQry();
        $this->load->view('sistram/requisitos/qry_view',$data);
    }

    function requisitosIns() {
               
      
        $this->form_validation->set_rules('txt_ins_req_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->requisitos_model->setTipoRequisito($this->input->post('cbo_ins_req_tipo'));
             $this->requisitos_model->setDescripcion($this->input->post('txt_ins_req_descripcion'));
             
             $result = $this->requisitos_model->RequisitosIns();
                
              if($result){
                 echo 1; 
              }
              else{
                  echo 0;
              } 
            }
           
         else {
            $this->index();
        }
    }
      
    function popupEditarRequisitos($nInscripcionId){
            $parametros = $this->requisitosGet($nInscripcionId);
            $this->load->view('sistram/requisitos/upd_view',$parametros);
    }
    
    
    function requisitosGet($nInscripcionId) {
        $query = $this->requisitos_model->requisitosGet($nInscripcionId);
        if ($query) {
            $requisito['nRequisitosId'] = $this->requisitos_model->getNRequisitosId();
            $requisito['cRequisitosDescripcion'] = $this->requisitos_model->getDescripcion();
            $requisito['cRequisitosTipo'] = $this->requisitos_model->getTipoRequisito();
                       
            return $requisito;
            
        } else {
            return false;
        }
    }

    function requisitosUpd() {
          $this->form_validation->set_rules('txt_upd_req_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->requisitos_model->setTipoRequisito($this->input->post('cbo_upd_req_tipo'));
             $this->requisitos_model->setDescripcion($this->input->post('txt_upd_req_descripcion'));
             $this->requisitos_model->setNRequisitosId($this->input->post('txt_upd_req_id'));
             
             
             $result = $this->requisitos_model->RequisitosUpd();
                
              if($result){
                 echo 1; 
              }
              else{
                  echo 0;
              } 
            }
           
         else {
            $this->index();
        }
    }

    function requisitosDel($nRequisitosId) {
        $this->requisitos_model->setNRequisitosId($nRequisitosId);
        $result = $this->requisitos_model->requisitosDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

   

}
    

