<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Sugerencialista extends CI_Controller {
    
    function __construct() {
        parent::__construct();
     
        $this->load->model('portal_infocip/sugerencialista_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
    }
    
    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Listar Sugerencias'; 
            $this->load->view("portal_infocip/sugerencialista/panel_view", $data);
                                 
    }

    function load_listar_view_sugerencia() {
        $this->load->view('portal_infocip/sugerencialista/qry_view');
    }
    
    function sugerenciaQry() {
        $opcionesGrid = array(
     
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'sugerencialista_model',
                    'metodo' => 'sugerenciaQry',
                    'criterios' => '',
                    'pkid' => 'nSugerenciaId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nSugerenciaId',
                       'cPerNombre',
                        'cPerEmail',
                        'cPerSugerencia',
                        'opcion'
                    ),
                )
        );
    }

    function sugerenciaGet($nSugerenciaId) {
        $query = $this->sugerencialista_model->sugerenciaGet($nSugerenciaId);
        if ($query) {
            $sugerencia['nSugerenciaId'] = $this->sugerencialista_model->getNSugerenciaId();
         $sugerencia['cPerNombre'] = $this->sugerencialista_model->getCPerNombre();
            $sugerencia['cPerEmail'] = $this->sugerencialista_model->getCPerEmail();
            $sugerencia['cPerSugerencia'] = $this->sugerencialista_model->getCPerSugerencia();
            return $sugerencia;
        } else {
            return false;
        }
    }
    
    
        function sugerenciaDel($nSugerenciaId){
        $this->sugerencialista_model->setNSugerenciaId($nSugerenciaId);
        $result=$this->sugerencialista_model->sugerenciaDel();
     
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
    

    
}

?>

