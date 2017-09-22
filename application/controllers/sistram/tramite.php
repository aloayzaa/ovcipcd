<?php

class Tramite extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
               
        $this->load->model('sistram/requisitos_model');
         $this->load->model('sistram/tramite_model');
        
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Tramites';
        $data['requisitos']=$this->requisitos_model->requisitosQry();
        $this->load->view('sistram/tramite/panel_view', $data);
    }

    function load_listar_view_tramite() {
        $data['tramites'] = $this->tramite_model->tramiteQry();
        $this->load->view('sistram/tramite/qry_view',$data);
    }
    function load_listar_view_requisito($nTramiteId){
          $parametros['listadorequisitos']=$this->tramite_model->requisitosagregar($nTramiteId);
          $parametros['requisitos']=$this->tramite_model->RequisitosTramiteGet($nTramiteId);
          $this->load->view('sistram/tramite/requisitos_view',$parametros);
    
    }

    function tramiteIns() {
               
      
        $this->form_validation->set_rules('txt_ins_tramite_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_rules('txt_ins_tramite_titulo', 'Titulo', 'required|trim');
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->tramite_model->setDescripcion($this->input->post('txt_ins_tramite_descripcion'));
            $this->tramite_model->setTitulo($this->input->post('txt_ins_tramite_titulo'));
            $this->tramite_model->setTipoPersona($this->input->post('cbo_dirigidoa'));
            $requisitos=$this->input->post('cbo_ins_tramite_requisitos');
            
           $result = $this->tramite_model->tramiteIns();
            
            foreach($requisitos as $requisito){
                $this->tramite_model->setNTramiteId($result);
                $this->tramite_model->setNrequisitoId($requisito);
                $result1=$this->tramite_model->tramiterequisitoIns(); 
            }
            if($result&&$result1){
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
      
    function popupEditarTramite($nTramiteId){
            $parametros = $this->tramiteGet($nTramiteId);
            $parametros['listadorequisitos']=$this->tramite_model->requisitosagregar($nTramiteId);
            $parametros['requisitos']=$this->tramite_model->RequisitosTramiteGet($nTramiteId);
            $this->load->view('sistram/tramite/upd_view',$parametros);
    }
    
    
    function tramiteGet($nTramiteId) {
        $query = $this->tramite_model->tramiteGet($nTramiteId);
        if ($query) {
            $tramite['nTramiteId'] = $this->tramite_model->getNTramiteId();
            $tramite['cTramiteTitulo'] = $this->tramite_model->getTitulo();
            $tramite['cTramiteDescripcion'] = $this->tramite_model->getDescripcion();
            $tramite['cTramiteTipoPersona']  =$this->tramite_model->getTipoPersona();         
            return $tramite;
            
        } else {
            return false;
        }
    }

    function tramiteUpd() {
       
        $this->form_validation->set_rules('txt_upd_tramite_descripcion', 'Descripcion', 'required|trim');
        $this->form_validation->set_rules('txt_upd_tramite_titulo', 'Titulo', 'required|trim');
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->tramite_model->setDescripcion($this->input->post('txt_upd_tramite_descripcion'));
            $this->tramite_model->setTitulo($this->input->post('txt_upd_tramite_titulo'));
            $this->tramite_model->setNTramiteId($this->input->post('txt_upd_tramite_id'));
            $this->tramite_model->setTipoPersona($this->input->post('cbo_upd_dirigidoa'));
           
            
            
            
           $result = $this->tramite_model->tramiteUpd();
          
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

    function tramiteDel($nTramiteId) {
        $this->tramite_model->setNTramiteId($nTramiteId);
        $result = $this->tramite_model->tramiteDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    function requisitotramiteDel($nRequisitoId,$nTramiteId){
        $this->tramite_model->setNTramiteId($nTramiteId);
        $this->tramite_model->setNrequisitoId($nRequisitoId);
        $result=$this->tramite_model->requisitotramiteDel();
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
   
    }
    function requisitotramiteIns($nRequisitoId,$nTramiteId){
       $this->tramite_model->setNTramiteId($nTramiteId);
        $this->tramite_model->setNrequisitoId($nRequisitoId);
        $result=$this->tramite_model->tramiterequisitoIns();
        if($result){
            echo 1;
        }
        else{
            echo 0;
        } 
    }

   

}
    

