<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Encuestacursos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/encuesta_model');
        $this->load->model('campus_virtual/horario_model');
        $this->load->model('campus_virtual/graficos_model');
        $this->load->model('campus_virtual/respuesta_model');
    }

    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Realizar Encuesta';
        $data['curso']=$this->encuesta_model->CursoCbo();
        $data['pregunta']=$this->encuesta_model->PreguntaCheBx();
        $this->load->view('campus_virtual/encuesta/panel_view_encuesta', $data);
    }

    function validarEncuesta( $idCurso) {
        $count = $this->encuesta_model->validarEncuesta($idCurso);
        return $count == 0;
    }

    function load_listar_view_reportes() {
        $this->load->view('campus_virtual/encuesta/qry_view_encuesta');
    }

    function load_listar_view_listado() {
        $this->load->view('campus_virtual/encuesta/qry_view_listado');
    }

    function load_cargarhorario() {

        $curso = $this->input->post('idCurso');

        if($this->validarEncuesta($curso) && $curso) {
            $horario = $this->encuesta_model->HorarioCbo($curso);

            $idHorario[''] = 'Seleccione Horario';
            foreach ($horario as $horario) {
                $idHorario[$horario->nHorId] = $horario->cHorDia.' '.
                                               $horario->cHorHoraInicio.' - '.
                                               $horario->cHorHoraFin.' ('.
                                               $horario->cHorFechaInicio.')';
                }

          echo form_dropdown('cbo_ins_enc_horario',
                             $idHorario,
                             '',
                             'id="cbo_ins_enc_horario"
                                class="input-medium tip"
                                style="width:260px;"
                                required="required"
                                data-original-title="Selecione Horario"
                                data-placement="right"');
        }
    }

    function reporteEncuestaQry($criterio = null) {
        $opcionesGrid = array(
            "Mostrar" => "note",
            
);
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'encuesta_model',
                    'metodo' => 'reporteEncuestaQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'ID',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'ID',
                        'Curso',
                        'Docente',
                        'Horario',
                        'opcion'
                    ),
                )
        );
    }

    function listadoEncuestaQry($criterio = null) {
        $opcionesGrid = array(
            "Activar" => "check",
            "Eliminar" => "trash",
);
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'encuesta_model',
                    'metodo' => 'listadoEncuestaQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'ID',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'ID',
                        'Curso',
                        'Docente',
                        'Horario',
                        'opcion'
                    ),
                )
        );
    }

  function popupReporteResultados($idHorario) {
        $data['encuestas']=$this->encuesta_model->damePreguntas($idHorario);
        $data['horario']=$this->encuesta_model->GetDetalle($idHorario);
        $data['estadistica']=$this->encuesta_model->estadisticaDocente($idHorario);
        $data['respuesta']=$this->encuesta_model->valorRespuesta($idHorario);
        //$data['activity_chart']=$this->graficos_model->get_activity($idHorario);
        $data['tabla']=$this->encuesta_model->tablaReporte($idHorario);
        $this->load->view('campus_virtual/encuesta/qry_view_reporte', $data);
    }

    function popupActivarEncuesta($idHorario){
        $data['encuestas']=$this->respuesta_model->damePreguntaCursoActivar($idHorario);
        $this->load->view('campus_virtual/encuesta/ins_view_activar', $data);
    }
  function exportar($idHorario){
        $data['tabla']=$this->encuesta_model->tablaReporte($idHorario);
        $this->load->view('campus_virtual/encuesta/qry_view_exportarencuesta', $data);
    }
    function encuestahorarioIns($idpregunta,$idHorario){
        
            $this->encuesta_model->setIdpregunta($idpregunta);
            $this->encuesta_model->setIdHorario($idHorario);
            $resul = $this->encuesta_model->encuestahorarioIns();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
    }

    function encuestahorarioDel($idpregunta,$idHorario){

            $this->encuesta_model->setIdpregunta($idpregunta);
            $this->encuesta_model->setIdHorario($idHorario);
            $resul = $this->encuesta_model->encuestahorarioDel();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
    }

    function encuestaelim($idHorario){
        $this->encuesta_model->setIdHorario($idHorario);
        $result=$this->encuesta_model->encuestaelim();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }

    function activarencuesta($idHorario){
        $this->encuesta_model->setIdHorario($idHorario);
        $result=$this->encuesta_model->activarencuesta();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
     
}

?>
