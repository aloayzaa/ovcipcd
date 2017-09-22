<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Alumno extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/alumno_model');
        $this->load->model('campus_virtual/horario_model');
        $this->load->model('campus_virtual/sesion_model');
        $this->load->model('campus_virtual/material_model');
        $this->load->model('campus_virtual/respuesta_model');
    }
    
    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Principal Alumno';
//        $data['idPer'] = 1;
        $data['idPer'] = $this->session->userdata('IDPer');
        $this->load->view('campus_virtual/alumno/panel_view', $data);
    }
    
    function load_listar_view_cursos() {
        $this->load->view('campus_virtual/alumno/qry_view');
    }
    
    function load_listar_view_listaMateriales($idSesion) {
        $data['materiales']=$this->material_model->materialGet($idSesion);
        $this->load->view('campus_virtual/alumno/qry_view_descargarMaterial', $data);
    }
    
    function alumnoCursosQry($criterio = null) {
        $opcionesGrid = array(
            "Ver Asistencias" => "clipboard",
            "Ver Notas" => "note",
            "Descargar Material" => "circle-arrow-s",
            "Encuesta" => "document",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'alumno_model',
                    'metodo' => 'alumnoCursosQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'id',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'id',
                        'Docente',
                        'Horario',
                        'opcion'
                    ),
                )
        );
    }
    
    function popupReporteNotas($idHorario){
        $idPersona = $this->session->userdata('IDPer');
        $data['respuesta']=$this->respuesta_model->tieneRespuestas($idPersona,$idHorario);
        $data['notas']=$this->alumno_model->dameNotasAlumno($idPersona, $idHorario);
        $data['horario']=$this->horario_model->horarioGetDetalle($idHorario);
        $this->load->view('campus_virtual/alumno/qry_view_reporteNotas', $data);
    }
    
    function popupReporteAsistencias($idHorario){
        $idPersona = $this->session->userdata('IDPer');
        $data['asistencias']=$this->alumno_model->dameAsistenciasAlumno($idPersona, $idHorario);
        $data['horario']=$this->horario_model->horarioGetDetalle($idHorario);
        $this->load->view('campus_virtual/alumno/qry_view_reporteAsistencias', $data);
    }
    
    function popupListaMateriales($idHorario) {
        $data['sesiones']=$this->sesion_model->sesionesCbo($idHorario);
        $data['material'] = $this->materialGet($idHorario);
        $data['horario'] = $idHorario;
        $this->load->view('campus_virtual/alumno/ins_view_descargarMaterial', $data);
    }
    
    function popupReporteEncuesta($idHorario){
        $idPersona = $this->session->userdata('IDPer');
        $data['encuestas']=$this->respuesta_model->damePreguntaCurso($idPersona, $idHorario);
        $data['horario']=$this->respuesta_model->GetDetalle($idPersona,$idHorario);
        $data['respuesta']=$this->respuesta_model->tieneRespuestas($idPersona,$idHorario);
        $this->load->view('campus_virtual/alumno/ins_view_responder', $data);
    }

    function materialGet($idHorario = null){
        $query = $this->material_model->materialGet($idHorario);
        if ($query) {
            $material['idMaterial'] = $this->material_model->getIdMaterial();
            $material['idSesion'] = $this->material_model->getIdSesion();
            $material['tipoMaterial'] = $this->material_model->getTipoMaterial();
            $material['ubicacion'] = $this->material_model->getUbicacion();
            return $material;
        } else {
            return false;
        }
    }

    function insRespuesta($idpregunta, $valorres, $idHorario, $idpersona) {

            $this->respuesta_model->setIdpregunta($idpregunta);
            $this->respuesta_model->setValor($valorres);
            $this->respuesta_model->setIdHorario($idHorario);
            $this->respuesta_model->setIdpersona($idpersona);
            $resul = $this->respuesta_model->insRespuesta();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
    }
    
}

?>
