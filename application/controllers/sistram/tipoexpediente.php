<?php

class Tipoexpediente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('sistram/tipoexpediente_model');
        
    }

    function index() {
           $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Tipos de Expedientes';
        $this->load->view('sistram/tipoexpediente/panel_view', $data);
    }

    function load_listar_view_tipoexpediente() {
        $data['tipoexpediente'] = $this->tipoexpediente_model->tipoexpedienteQry();
        $this->load->view('sistram/tipoexpediente/qry_view',$data);
    }

    function tipoexpedienteIns() {
               
      
        $this->form_validation->set_rules('txt_ins_texp_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
      
             $this->tipoexpediente_model->setDescripcion($this->input->post('txt_ins_texp_descripcion'));
             
             $result = $this->tipoexpediente_model->tipoexpedienteIns();
                
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
      
    function popupEditarTipoexpediente($nTipexpedienteId){
            $parametros = $this->tipoexpedienteGet($nTipexpedienteId);
            $this->load->view('sistram/tipoexpediente/upd_view',$parametros);
    }
    
    
    function tipoexpedienteGet($nTipexpedienteId) {
        $query = $this->tipoexpediente_model->tipoexpedienteGet($nTipexpedienteId);
        if ($query) {
            $tipoexpediente['nTipexpedienteId'] = $this->tipoexpediente_model->getNTipexpedienteId();
            $tipoexpediente['cTipexpedienteDescripcion'] = $this->tipoexpediente_model->getDescripcion();
                     
            return $tipoexpediente;
            
        } else {
            return false;
        }
    }

    function tipoexpedienteUpd() {
       $this->form_validation->set_rules('txt_upd_texp_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');
        
        if ($this->form_validation->run() == true) {
            $this->tipoexpediente_model->setDescripcion($this->input->post('txt_upd_texp_descripcion'));
             $this->tipoexpediente_model->setNTipexpedienteId($this->input->post('txt_upd_texp_id'));
             
             
             $result = $this->tipoexpediente_model->tipoexpedienteUpd();
                
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

    function tipoexpedienteDel($nTipexpedienteId) {
        $this->tipoexpediente_model->setNTipexpedienteId($nTipexpedienteId);
        $result = $this->tipoexpediente_model->tipoexpedienteDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

   

}
    

