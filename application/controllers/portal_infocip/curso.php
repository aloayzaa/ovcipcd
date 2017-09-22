<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Curso extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('portal_infocip/curso_model');
    }
    
    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Lista de Cursos';
        $this->load->view('portal_infocip/curso/panel_view', $data);
    }
    
    function load_listar_view_curso() {
        $this->load->view('portal_infocip/curso/qry_view');
    }
    
    function cursoIns() {
        $this->form_validation->set_rules('txt_ins_cur_nombre', 'Nombre', '|trim|required');
        $this->form_validation->set_rules('txt_ins_cur_descripcion', 'Descripción', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->curso_model->setNombre($this->input->post('txt_ins_cur_nombre'));
            $this->curso_model->setTipo($this->input->post('cbo_ins_cur_tipo'));
            $this->curso_model->setDescripcion($this->input->post('txt_ins_cur_descripcion'));
            $resul = $this->curso_model->cursoIns();
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
    
    function cursoQry() {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'curso_model',
                    'metodo' => 'cursoQry',
                    'criterios' => '',
                    'pkid' => 'nCurId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nCurId',
                        'cCurNombre',
                        'cCurDescripcion',
                        'cCurTipo',
                        'opcion'
                    ),
                )
        );
    }

    function popupEditarCurso($idCurso) {
        $campos = $this->cursoGet($idCurso);
        $this->load->view('portal_infocip/curso/upd_view', $campos);
    }

    function cursoGet($idCurso) {
        $query = $this->curso_model->cursoGet($idCurso);
        if ($query) {
            $curso['idCurso'] = $this->curso_model->getIdCurso();
            $curso['nombre'] = $this->curso_model->getNombre();
            $curso['tipo'] = $this->curso_model->getTipo();
            $curso['descripcion'] = $this->curso_model->getDescripcion();
           // $curso['descuento'] = $this->curso_model->getDescuento();
            return $curso;
        } else {
            return false;
        }
    }

    function cursoUpd() {
        $this->form_validation->set_rules('txt_upd_cur_nombre', 'Nombre', '|trim|required');
        $this->form_validation->set_rules('txt_upd_cur_descripcion', 'Descripción', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->curso_model->setNombre($this->input->post('txt_upd_cur_nombre'));
            $this->curso_model->setTipo($this->input->post('cbo_upd_cur_tipo'));
            $this->curso_model->setDescripcion($this->input->post('txt_upd_cur_descripcion'));
             $this->curso_model->setIdCurso($this->input->post('hid_upd_cur_idCurso'));
            $resul = $this->curso_model->cursoUpd();
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
    
    function cursoEstado($idCurso){
        $this->curso_model->setIdCurso($idCurso);
        $result=$this->curso_model->cursoEstado();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
    
}

?>
