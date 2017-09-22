<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Graficos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('campus_virtual/graficos_model');
    }

    function index() {
     
      $this->loaders->verificaAcceso('W');
   
    }
function popupReporteResultados($idHorario,$bloque) {
   $data['activity_chart']=$this->graficos_model->get_activity($idHorario,$bloque);
      $this->load->view('campus_virtual/encuesta/prueba',$data);
    } 

}
?>
