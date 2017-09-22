<?php

class Historico extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('sistram/historico_model');
        $this->load->model('sistram/administrador_model');
        
    }

    function index() {
            $this->loaders->verificaAcceso('W');
        $data['titulo']='Historial de Expedientes';
        $this->load->view('sistram/historico/panel_view',$data);
    }
    function load_listar_view_historico($anio){
      
         $historicos=  $this->historico_model->expedientesQry($anio);
         
         if (count($historicos) > 0) {
         foreach($historicos as $historico){
             $historico->estado=$this->historico_model->expedienteEstado($historico->nExpedienteId);
                       
            }
         }

         $data['historicos']= $historicos;
         $this->load->view('sistram/historico/qry_view_historico',$data);
    }
      function expedienteDetalle($expediente) {
        $data['expediente'] = $this->administrador_model->expedienteGet($expediente);
        $data['derivadoareas'] = $this->administrador_model->derivadoareas($expediente);
        $data['multimedia'] = $this->administrador_model->expedienteMultimedia($expediente);

        $this->load->view('sistram/historico/ver_view', $data);
    }
   
}
    

