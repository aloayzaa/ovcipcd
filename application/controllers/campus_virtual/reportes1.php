<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Reportes1 extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->bdcampus = $this->load->database('bdcampusvirtual', TRUE);
        $this->bdcolegio = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('export');
        $this->load->model('campus_virtual/curso_model');
        $this->load->model('campus_virtual/docente_model');
        $this->load->model('campus_virtual/matricula_model');
        $this->load->model('campus_virtual/reportes1_model');
        $this->load->helper('url');
    }
    
    function index(){
        $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Reportes';
        $this->load->view('campus_virtual/reportes1/panel_view', $data);
    }
    
    //Métodos que migran a docente
    
    function load_listar_view_reportesD() {
        $this->load->view('campus_virtual/reportes1/qry1_view');
    }
    
    function reportesDQry($criterio=null){
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'reportes1_model',
                                                'metodo' => 'reportesDQry',
                                                'criterios' =>array('criterio' => $criterio),
                                                'pkid' => 'nHorId',
                                                'opciones' => json_encode($opcionesGrid),
                                                'columns' => array('nHorId',
                                                                   'Docente',
                                                                   'Curso',
                                                                   'Inicio',
                                                                   'Fin'
                                                                  ),
                                               )
                                         );
    }
    
    // Métodos que migran a curso
    
    function load_listar_view_reportesC() {
        $this->load->view('campus_virtual/reportes1/qry2_view');
    }
    
    function reportesCQry($criterio=null){
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'reportes1_model',
                                                'metodo' => 'reportesCQry',
                                                'criterios' =>array('criterio' => $criterio),
                                                'pkid' => 'nHorId',
                                                'opciones' => json_encode($opcionesGrid),
                                                'columns' => array('nHorId',
                                                                   'Curso',
                                                                   'Docente',
                                                                   'Inicio',
                                                                   'Fin',
                                                                   'COUNT(m.nPerId)'
                                                                  ),
                                               )
                                         );
    }
    
    // Método que migran a matrícula
    
    function load_listar_view_reportesM() {
        $this->load->view('campus_virtual/reportes1/qry3_view');
    }
    
    
    
    function reportesMQry($criterio=null){
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'reportes1_model',
                                                'metodo' => 'reportesMQry',
                                                'criterios' =>array('criterio' => $criterio),
                                                'pkid' => 'nPerId',
                                                'opciones' => json_encode($opcionesGrid),
                                                'columns' => array('nPerId',
                                                                   'Alumno',
                                                                   'Curso',
                                                                   'Correo',
                                                                   'Celular',
                                                                   'Dni',
                                                                   'Fecha_Matricula',
                                                                   'Inicio_Curso'
                                                                  ),
                                               )
                                         );
    }
    
    function buscarPersona($dni) {
        $query = $this->matricula_model->buscarAlumno($dni);
        if ($query) {
            $a = $this->matricula_model->getAlumno();
            $alumno['idPersona'] = $a['id'];
            $alumno['dni'] = $a['dni'];
            $alumno['nombres'] = $a['nombres'];
            $alumno['apellidoPaterno'] = $a['apellidoPaterno'];
            $alumno['apellidoMaterno'] = $a['apellidoMaterno'];
            //$alumno['telefono'] = $a['telefono'];
            $alumno['correoElectronico'] = $a['correoElectronico'];
            $alumno['direccion'] = $a['direccion'];
            $alumno['cip'] = $a['cip'];
            
            $result = "";
            $result .= '<legend>'. $alumno['nombres']. ' ' . $alumno['apellidoPaterno'] . ' ' . $alumno['apellidoMaterno'] .'</legend>';
            $result.="<input type='hidden' name='hid_upd_alu_idPersona' id='hid_upd_alu_idPersona' value='" . $alumno['idPersona'] . "'>";
            
            echo $result;
            
        } else {
            return false;
        }
    }
    
    function load_listar_view_reportesR() {
        $this->load->view('campus_virtual/reportes1/qry4_view');
    }
        function load_listar_view_reportesP() {
          $parametros = $this->input->post('json');
$valor = $parametros['criterio'];
          $data['pagos'] = $this->reportes1_model->ver_pagos($valor);
        $this->load->view('campus_virtual/reportes1/qry_view_pagos',$data);
    }
    
    function reportesRQry($criterio=null){
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'reportes1_model',
                                                'metodo' => 'reportesRQry',
                                                'criterios' =>array('criterio' => $criterio),
                                                'pkid' => 'nPerId',
                                                'opciones' => json_encode($opcionesGrid),
                                                'columns' => array('nPerId',
                                                                   'Alumno',
                                                                   'Curso',
                                                                   'Fechas',
                                                                   'Promedio',
                                                                   'Certificado'
                                                                  ),
                                               )
                                         );
    }
    
function export($data) {
        $fechas = strstr($data, 'n', true);
        $fechaI = strstr($fechas, '_', true);
        $fechaF = str_ireplace("_", "", strstr($fechas, '_'));
        $titulo = "";
        
        $tipo = str_ireplace("n", "", strstr($data, 'n'));
        
        switch($tipo) {
            case 1: $sql = $this->reportes1_model->reportesMQry(array('criterio'=>$fechaI.'_'.$fechaF));
                $titulo = "Reporte de Matriculas del ".$fechaI." al ".$fechaF;
                break;
            case 2: $sql = $this->reportes1_model->reportesDQry(array('criterio'=>$fechaI.'_'.$fechaF));
                $titulo = "Reporte de Docente que laboraban del ".$fechaI." al ".$fechaF;
                break;
            default : $sql = $this->reportes1_model->reportesCQry(array('criterio'=>$fechaI.'_'.$fechaF));
                $titulo = "Reporte de Cursos dictados del ".$fechaI." al ".$fechaF;
                break;
        }

        $tabla = $this->export->to_excel($sql, $titulo);
        $this->load->view('campus_virtual/reportes1/exportar',array("tabla"=>$tabla));
    }
    
  function export1($data) {
        $sql = $this->reportes1_model->reportesPQry(array('criterio'=>$data));
        $curso = $this->reportes1_model->getCursoReporte(array('criterio'=>$data));
        $titulo = "Reporte de Cursos ".$curso['Curso']." dictado del ".$curso['FechaI']." al ".$curso['FechaF']." turno ".$curso['HoraI']."-".$curso['HoraF'];
        
        $tabla = $this->export->to_excel($sql,$titulo);
        $this->load->view('campus_virtual/reportes1/exportar',array("tabla"=>$tabla));
    }

    
    function exportar() {
        $data["tabla"] = $GLOBALS['tabla'];
        echo $GLOBALS['tabla'];
        $this->load->view('campus_virtual/reportes1/exportar',$data);
    }
    
    function load_horario() {
        
        $fechaI = $this->input->post('fechaI');
        $fechaF = $this->input->post('fechaF');
        
            $horario = $this->reportes1_model->HorarioCbo($fechaI,$fechaF);
            
            $idHorario[''] = 'Seleccione Horario';
            //$idCurso['']= date('Y/m/d');
            foreach ($horario as $horario) {
                $idHorario[$horario->nHorId] = $horario->cCurNombre.' - '.
                                               $horario->cHorFechaInicio.' '.
                                               $horario->cHorHoraInicio.' '.
                                               $horario->cHorFechaFin;
                }
                
          echo form_dropdown('cbo_rep_pag_horario',
                             $idHorario,
                             '',
                             'id="cbo_rep_pag_horario" 
                                class="input-medium tip"
                                style="width:260px;"
                                required="required"
                                data-original-title="Selecione Horario"
                                data-placement="right"');
        
    }
    
    function load_listar_view_pagos() {
        $this->load->view('campus_virtual/reportes1/qry5_view');
    }
    
    function reportesPQry($criterio=null){
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        
        echo $this->jqgrid->get_DatosGrid(array('modelo' => 'reportes1_model',
                                                'metodo' => 'reportesPQry',
                                                'criterios' =>array('criterio' => $criterio),
                                                'pkid' => 'nPagId',
                                                'opciones' => json_encode($opcionesGrid),
                                                'columns' => array('nPagId',
                                                                   'Alumno',
                                                                   'Nro_Voucher',
                                                                   'Monto',
                                                                   'Fecha_Pago'
                                                                  ),
                                               )
                                         );
    }
}
?>
