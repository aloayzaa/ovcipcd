<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Respuesta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/respuesta_model');
    }

    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Encuesta';
        $data['idPer'] = 6;
        //        $data['idPer'] = $this->session->userdata('IDPer');
        $data['pregunta']=$this->respuesta_model->Preguntalist();
        $this->load->view('campus_virtual/encuesta/panel_view_respuesta', $data);
//        var_dump($data);
    }

}
?>
