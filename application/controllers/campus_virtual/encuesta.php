<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Encuesta extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/encuesta_model');
    }
    
    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Lista de Preguntas';
        $data['curso']=$this->encuesta_model->CursoCbo();
        $data['pregunta']=$this->encuesta_model->PreguntaCheBx();
        $this->load->view('campus_virtual/encuesta/panel_view', $data);
    }
    
    function load_listar_view_encuesta() {
        $this->load->view('campus_virtual/encuesta/qry_view');
    }

    function validarEncuesta( $idCurso) {
        $count = $this->encuesta_model->validarEncuesta($idCurso);
        return $count == 0;
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
    
    function encuestaIns() {
        $this->form_validation->set_rules('txt_ins_pre_enunciado', 'Enunciado', '|trim|required');
        $this->form_validation->set_message('required', 'El campo % es requerido');
        if ($this->form_validation->run() == true) {
            $this->encuesta_model->setEnunciado($this->input->post('txt_ins_pre_enunciado'));
            $this->encuesta_model->setBloque($this->input->post('cbo_ins_pre_bloque'));
            $resul = $this->encuesta_model->encuestaIns();
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
    
    function encuestaQry($criterio=null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array( 'modelo' => 'encuesta_model',
                       'metodo' => 'encuestaQry',
                       'criterios' =>array('criterio' => $criterio),
                                     'pkid' => 'nPreId',
                                     'opciones' => json_encode($opcionesGrid),
                                     'columns' => array('nPreId',
                                                        'cPreEnunciado',
                                                        'opcion'
                                                       ),
                     )
        );
    }

        function encuestaCursosQry($criterio = null) {
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
    
    function popupEditarPregunta($idpregunta) {
        $campos = $this->encuestaGet($idpregunta);
        $campos['idpregunta'] = $idpregunta;
        $this->load->view('campus_virtual/encuesta/upd_view', $campos);
    }
    
    function encuestaGet($idpregunta) {
        $query = $this->encuesta_model->encuestaGet($idpregunta);
        if ($query) {
//            $encuesta['idpregunta'] = $this->encuesta_model->getIdpregunta();
            $encuesta['enunciado'] = $this->encuesta_model->getEnunciado();
            return $encuesta;
        } else {
            return false;
        }
    }

    function encuestaUpd() {
        $this->form_validation->set_rules('txt_upd_pre_enunciado', 'Enunciado', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->encuesta_model->setIdpregunta($this->input->post('hid_upd_pre_idpregunta'));
            $this->encuesta_model->setEnunciado($this->input->post('txt_upd_pre_enunciado'));
            $resul = $this->encuesta_model->encuestaUpd();
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
    
    function preguntaEstado($idPregunta){
        $this->encuesta_model->setIdpregunta($idPregunta);
        $result=$this->encuesta_model->preguntaEstado();
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
     
}
?>
