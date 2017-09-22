<?php

class Reimpresion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
             $this->db=$this->load->database('bdcampusvirtual',TRUE);
        $this->load->model('reimpresion/reimpresion_model','',TRUE);
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Modulo de Certificados Emitidos';
       // $data['TEventos']=$this->eventos_model->getCapitulos();
        $this->load->view('reimpresion/panel_view', $data);
    }

    function load_listar_view_certificados() {
        $tipo= $this->input->post('tipo');
        $fechainicio=$this->input->post('fechainicio');
        $fechafin=$this->input->post('fechafin');
        $data['certificados']=$this->reimpresion_model->certificadosQry($tipo,$fechainicio,$fechafin);
        $this->load->view('reimpresion/qry_view',$data);
    }


}
    

