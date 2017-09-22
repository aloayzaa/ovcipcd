<?php

class Emitidos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
            
        $this->load->model('sistram/emitidos_model');
        $this->load->model('sistram/administrador_model');
        
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        $usuario=$this->session->userdata('tipoclase');
        $nAreaId=$this->session->userdata('IDPer');
        $usuarioId=$this->session->userdata('IDUsu');
               
        $data['AreaNombre']=$usuario;
        $data['titulo']='Expedientes Emitidos';
        $data['nAreaId']=$nAreaId;
        $this->load->view('sistram/emitidos/panel_view',$data);
    }
    function load_listar_view_emitidos($anio){
          $usuario=$this->session->userdata('tipoclase');
        $nAreaId=$this->session->userdata('IDPer');
        $usuarioId=$this->session->userdata('IDUsu');
               
        $data['AreaNombre']=$usuario;
        $data['titulo']='Expedientes Emitidos';
        $data['nAreaId']=$nAreaId;
    
        $data['emitidos']= $this->emitidos_model->expedientesQry($usuarioId,$anio);
        $data['procesados']='';
          $this->load->view('sistram/emitidos/qry_view_emitidos',$data);
    }
      function expedienteDetalle($expediente) {
        $data['expediente'] = $this->administrador_model->expedienteGet($expediente);
        $data['derivadoareas'] = $this->administrador_model->derivadoareas($expediente);
        $data['multimedia'] = $this->administrador_model->expedienteMultimedia($expediente);

        $this->load->view('sistram/emitidos/ver_view', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
    

