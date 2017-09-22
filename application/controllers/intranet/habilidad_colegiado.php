<?php

class Habilidad_colegiado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/habilidad_col_model');
        $this->load->model('intranet/cuenta_colegiado_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    
      function index() {
$this->loaders->verificaAcceso('W');
        $this->load_frm_habilidad_colegiado($this->session->userdata('nick'));
    }
     function load_frm_habilidad_colegiado($str) {
        
        $query = $this->habilidad_col_model->habilidadCheck($str);
            $datos['habilidad'] = $this->habilidad_col_model->getHabilidad();
            $datos['codigocip'] = $this->habilidad_col_model->getRegcol();
            $datos['tipoclase'] = $this->habilidad_col_model->getTipoClase();
            $datos['nombre'] = $this->habilidad_col_model->getNombre();
            $datos['apellidopat'] = $this->habilidad_col_model->getApellidopat();
            $datos['apellidomat'] = $this->habilidad_col_model->getApellidomat();
            $datos['lecol'] = $this->habilidad_col_model->getDni();
            $datos['habilidad'] = $this->habilidad_col_model->getHabilidad();
            $datos['fechains'] = $this->habilidad_col_model->getFecinscol();
            $datos['fechaapor'] = $this->habilidad_col_model->getFecaportcol();
            $datos['coltitulo'] = $this->habilidad_col_model->getColtitulo();
            $datos['titulo'] = 'Consulta de Habilidad de Colegiado';
        $this->load->view('intranet/habilidad_colegiado/panel_view', $datos);
     }
     
       function load_ver_multas($str) {       

        $datos['qrymultas'] = $this->habilidad_col_model->chkMultas($str); 
        $datos['multas'] = $this->habilidad_col_model->getNummultas(); 
        $datos['titulo'] = 'Consulta de Habilidad de Colegiado';
        $this->load->view('intranet/habilidad_colegiado/view_multas', $datos);
     }
     
      function load_ver_meses($str,$año) { 
//        $datos['actualaño'] = date("Y");
//        $datos['actualmes'] = date("m");
        $datos['año'] = $año;
        $datos['qrymeses'] = $this->habilidad_col_model->verMeses($str,$año);
//        $datos['qryexo'] = $this->habilidad_col_model->verExo($str,$año);
        $this->load->view('intranet/habilidad_colegiado/view_meses', $datos);
     }
     
       function load_ver_deudas($str) {       
        $query = $this->habilidad_col_model->chkDeudas($str);
        $datos['qrydeudas'] = $query; 
       
        $datos['deudas'] = $this->habilidad_col_model->getNumdeudas();    
        $datos['titulo'] = 'Consulta de Habilidad de Colegiado';
        $this->load->view('intranet/habilidad_colegiado/view_deudas', $datos);
     }
            function ver_info() {
        $this->load->view('intranet/actualizacion_colegiado/ver_info');
    }  
       function load_ver_detalle($cip,$tipoclase,$habilidad) {       
        $data['titulo'] = 'Estado de Cuenta CIP-CDLL';
        $data['habilidad']= $habilidad;
        $data['bandeja'] = $this->cuenta_colegiado_model->cuenta_yearsfix($cip,$tipoclase);
		//var_dump($data['bandeja']);
        $data['deudasaño'] = $this->cuenta_colegiado_model->cuenta_colegiadoqryfix($cip,$tipoclase);
//        if(($habilidad == 2) ||($habilidad == 4)){
//        
//        $this->load->view('intranet/habilidad_colegiado/view_detalle', $data);
//        }else{
//        $data['bandeja'] = array($this->cuenta_colegiado_model->cuenta_colegiadoqry($cip,$tipoclase),  $this->cuenta_colegiado_model->cuenta_colegiadoqrysub($cip,$tipoclase));  
////        $data['exo_col']= $this->cuenta_colegiado_model->exocol_totalqry($cip); 
//        $data['reporte']= $this->cuenta_colegiado_model->pago_totalqry($cip);
        $data['reporte_deuda']= $this->cuenta_colegiado_model->deuda_totalqry($cip,$tipoclase,$habilidad);
        $data['cip']=$cip;
        $data['reporte_multa']= $this->cuenta_colegiado_model->multa_totalqry($cip);
        $data['reporte_deudacol']= $this->cuenta_colegiado_model->deudacol_totalqry($cip);
        $this->load->view('intranet/habilidad_colegiado/view_detalle', $data);
//        }
        
    }
}

?>