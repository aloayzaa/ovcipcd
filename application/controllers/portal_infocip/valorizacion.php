<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Valorizacion extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('portal_infocip/valorizacion_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Valorizacion de cursos';
        //COMBO
        $data['Curso']=$this->valorizacion_model->AsignaturaCbo();
        $this->load->view("portal_infocip/valorizacion/panel_view", $data);                                
    }
    
      function CursoCbo() {
            //COMBO
           $data['Curso']=$this->valorizacion_model->AsignaturaCbo();
            $this->load->view("portal_infocip/valorizacion/panel_view", $data);
                                 
    }

    function load_listar_view_valorizacion() {
        $this->load->view('portal_infocip/valorizacion/qry_view');
    }
    
    function valorizacionQry() {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'valorizacion_model',
                    'metodo' => 'valorizacionQry',
                    'criterios' => '',
                    'pkid' => 'n_ValId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'n_ValId',   
                          'n_ValCodcurso',
                        'c_ValDesripcionCurso',
                        'c_ValFechaCaducidad',  
                        'n_ValVot',
                        'opcion'
                    ),
                )
        );
    }
    
    function valorizacionIns() {

        $this->form_validation->set_rules('txt_ins_frm_c_ValDesripcionCurso', 'Descripcion', '|trim|required');
        $this->form_validation->set_rules('txt_ins_frm_c_ValFechaCaducidad', 'Fecha Caducidad', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {         
        
            $this->valorizacion_model->setC_ValDesripcionCurso($this->input->post('txt_ins_frm_c_ValDesripcionCurso'));
            $this->valorizacion_model->setC_ValFechaCaducidad($this->input->post('txt_ins_frm_c_ValFechaCaducidad'));
            $this->valorizacion_model->setCurso($this->input->post('cboCurso'));
            $resul = $this->valorizacion_model->valorizacionIns();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }

    }
    
        function popupEditarValorizacion($n_ValId) {
        $campos = $this->valorizacionGet($n_ValId);
        $this->load->view('portal_infocip/valorizacion/upd_view', $campos);
    }
    

        function valorizacionGet($n_ValId) {
        $query = $this->valorizacion_model->valorizacionGet($n_ValId);
        if ($query) {
            $valorizacion['n_ValId'] = $this->valorizacion_model->getN_ValId();
            $valorizacion['c_ValDesripcionCurso'] = $this->valorizacion_model->getC_ValDesripcionCurso();
            $valorizacion['c_ValFechaCaducidad'] = $this->valorizacion_model->getC_ValFechaCaducidad();
            return $valorizacion;
        } else {
            return false;
        }
    }
    
    
 function valorizacionUpd() {
        $this->form_validation->set_rules('txt_upd_frm_c_ValDesripcionCurso', 'Descripcion', '|trim|required');
        $this->form_validation->set_rules('txt_upd_frm_c_ValFechaCaducidad', 'Fecha Caducidad', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {

            $this->valorizacion_model->setN_ValId($this->input->post('hid_upd_n_ValId'));
            $this->valorizacion_model->setC_ValFechaCaducidad($this->input->post('txt_upd_frm_c_ValFechaCaducidad'));
            $this->valorizacion_model->setC_ValDesripcionCurso($this->input->post('txt_upd_frm_c_ValDesripcionCurso'));

            $resul = $this->valorizacion_model->valorizacionUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }

        function valorizacionDel($n_ValId) {
        $this->valorizacion_model->setN_ValId($n_ValId);
        $result = $this->valorizacion_model->valorizacionDel();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function popupNuevoCurso() {
        $this->load->view('portal_infocip/curso/ins_view');
    }
    
    
    
}

?>

