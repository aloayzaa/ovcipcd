<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Favoritos_usu extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/favoritos_usu_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Mis Favoritos';
         $this->load->view("biblioteca/favoritos_usu/panel_view",$data);    
     }
     
     function load_listar_view_favoritos_usu() {
         $iduser=  $this->session->userdata('nick');
             $tipouser=  $this->session->userdata('nUsuTipo');
        $data['favoritos'] = $this->favoritos_usu_model->favoritos_usuqry($iduser,$tipouser);
        $this->load->view('biblioteca/favoritos_usu/qry_view',$data);
    }
    
    
     
     function FavoritosDel($nFavId = nulll) {
        $this->favoritos_usu_model->setNFavId($nFavId);
        
        $result = $this->favoritos_usu_model->FavoritosDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
     
 }



?>
