<?php

class Pagosinfocip extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
       //      $this->db=$this->load->database('bdcampusvirtual',TRUE);
        $this->load->model('pagosinfocip/pagosinfocip_model','',TRUE);
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Modulo de Pagos en el CIP-CDLL';
       // $data['TEventos']=$this->eventos_model->getCapitulos();
        $this->load->view('pagosinfocip/panel_view', $data);
    }

    function load_listar_view_pagos() {
        $cuenta_ingreso= $this->input->post('cuenta_ingreso');
        $fechainicio=$this->input->post('fechainicio');
        $fechafin=$this->input->post('fechafin');
        $data['pagos']=$this->pagosinfocip_model->pagosQry($cuenta_ingreso,$fechainicio,$fechafin);
        $this->load->view('pagosinfocip/qry_view',$data);
    }


}
    

