<?php

class Areas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('sistram/areas_model');
        $this->load->helper('url');
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Areas';
        $data['usuarios']=$this->areas_model->getUsuariosColegiado();
        $this->load->view('sistram/areas/panel_view', $data);
    }
    function load_listar_view_areas(){
        $data['areas'] = $this->areas_model->areasQry();
        $this->load->view('sistram/areas/qry_view',$data);
    }
    
    function mostrar_nombre_usuario(){
        $ID=$this->input->post('ID');
        $query=$this->areas_model->getUsuario($ID);
        if($query!='false'){
            echo $query;
        }
        else {
           echo 'No existe usuario para esta área'; 
        }
        
    }

    function areasIns() {
         $usuario=$this->input->post('usuario');
         $nombrecargo=$this->input->post('nombrecargo');
         $responsable=$this->input->post('responsable');
         
         $UsuId=$this->areas_model->getUsuId($usuario);
         if($UsuId!=-1){    
              
            if($this->areas_model->validarArea($UsuId)){
                 $this->areas_model->setAreadescripcion($usuario);
                 $this->areas_model->setCargodescripcion($nombrecargo);
                 $this->areas_model->setNUsuId($UsuId);
                 $nareaId = $this->areas_model->areasIns();
                 
                 $result=$this->areas_model->areaencargadoIns($nareaId,$responsable);
                 if($result){
                     echo 1; 
                  }
                else{
                      echo 0;
                } 
                           
            }else {
                echo 2;
            }
        }
        else {
            echo -1;
        }
    }
    

    function areasDel($nAreasId) {
        
        if($this->areas_model->validarmovimientoareas($nAreasId)){
             $this->areas_model->setNAreaId($nAreasId);
               $result=$this->areas_model->areasDel();
               if ($result) {
                   echo 1; //EXITO
               } else {
                   echo 0; //ERROR
               }
        }else {
            echo 2;
        }
    }
    function popupAsignarResponsable($nAreasId){
        $data=$this->areaGet($nAreasId);
        $data['nAreasId']=$nAreasId;
        $data['responsables']=$this->areas_model->responsableQry($nAreasId);
        $data['usuarios']=$this->areas_model->getUsuariosColegiado();
        $this->load->view('sistram/areas/asignar_view',$data);
    }
   
    
    function areaGet($nAreasId){
        $query = $this->areas_model->areaGet($nAreasId);
        if ($query) {
            $area['nAreasId'] = $this->areas_model->getNAreaId();
            $area['cAreasDescripcion'] = $this->areas_model->getAreadescripcion();
            $area['cDescripcionCargo']=$this->areas_model->getDescripcionCargo();
            return $area;
            
        } else {
            return false;
        }
        
    }
      function areasAsig(){
           $nombre= $this->input->post('cbo_usuarios_admin_upd');
           $areaId= $this->input->post('hid_asig_nAreasId');
            
            $result=$this->areas_model->areasAsig($nombre,$areaId);
            
             if($result==1){
                 echo 1; 
              }
              else if($result==2){
                  echo 2;
              }
              else{
                  echo 0;
              } 
    }
   
 
}
