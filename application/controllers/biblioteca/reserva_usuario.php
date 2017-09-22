<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
 class Reserva_usuario extends CI_Controller{
     
     function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/reservas_usuario_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca=$this->load->database("bdbiblioteca",TRUE);
        
    } 
     
     function index(){
         $this->loaders->verificaAcceso('W');
         $data['titulo'] = 'Reservas';
         $data['capitulos']=$this->reservas_usuario_model->CapituloCbo();
//         $data['capitulos']=$this->reservas_usuario_model->CapituloCbo();
         $this->load->view("biblioteca/reserva_usuario/panel_view",$data);    
//         $data['titulo'] = 'Historial Reservas';
//         $this->load->view("biblioteca/reserva/panel_view2",$data);
     }
     
//      function load_list_tesis() {
//         $data['tesis']=$this->reservas_usuario_model->listar_tesis();
//         $this->load->view('biblioteca/reserva_usuario/qry_view', $data);
//         }
  function load_tabla_tesis_view($cap=null,$datos=null) {
              $data['capitulos']=$this->reservas_usuario_model->CapituloCbo();
              $this->reservas_usuario_model->setCap($cap);
            $this->reservas_usuario_model->setAno($datos);
   
        $data['tesis']=$this->reservas_usuario_model->tesisQry();
        $this->load->view('biblioteca/reserva_usuario/qry_view',$data);
    }

    
     function load_tabla_libro_view($criterio1=null) {
        $data['libro']=$this->reservas_usuario_model->libroQry($criterio1);
        $this->load->view('biblioteca/reserva_usuario/qry_view_libro',$data);
    }
    
     function load_tabla_revista_view($criterio1=null) {
        $data['revista']=$this->reservas_usuario_model->revistaQry($criterio1);
        $this->load->view('biblioteca/reserva_usuario/qry_view_revista',$data);
    }
    
         function leerrevista($nMatId) {
        $data['bandeja'] = $this->reservas_usuario_model->revistaMultimediaqry($nMatId);
        $this->load->view('biblioteca/reserva_usuario/qry_view_revista_multimedia',$data);
    } 
    
    function estadistica()
    {
        $data['ver']=$this->reservas_usuario_model->estaQry();
        
         $this->load->view('dashboard/template',$data);        
    }
    
    function listaUltimaTesis(){
        $data['ver1']=$this->reservas_usuario_model->ultimaTesisQry();
        
         $this->load->view('dashboard/template',$data);  
    }
    
      function listaUltimaRyL(){
        $data['ver2']=$this->reservas_usuario_model->ultimaRyLQry();
        
         $this->load->view('dashboard/template',$data);  
    }
    
      function listaUltimaReservas(){
        $data['ver3']=$this->reservas_usuario_model->ultimaReserva();
        
         $this->load->view('dashboard/template',$data);  
    }
    
    
 }



?>