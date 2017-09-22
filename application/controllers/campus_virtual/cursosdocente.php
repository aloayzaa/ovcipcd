<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Cursosdocente extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('html2pdf');
        $this->load->library('MY_PHPMailer');
        $this->load->model('campus_virtual/docente_model');
        $this->load->model('campus_virtual/horario_model');
        $this->load->model('campus_virtual/sesion_model');
        $this->load->model('campus_virtual/asistencia_model');
        $this->load->model('campus_virtual/nota_model');
        $this->load->model('campus_virtual/material_model');
          $this->load->helper('url');
    }
    
    function index(){
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Docente';
//        $data['curso']=$this->docente_model->cursosCbo(2);
//        $data['idPer'] = 2;
        $data['curso']=$this->docente_model->cursosCbo($this->session->userdata('IDPer'));
        $data['idPer'] = $this->session->userdata('IDPer');
        $this->load->view('campus_virtual/docente/panel_view_cursosDocente', $data);
    }

    function load_listar_view_cursosDocente() {        
        $this->load->view('campus_virtual/docente/qry_view_cursosDocente');
    }
    
    function load_listar_view_alumnosCurso($idHorario, $nombreCurso) {
        $data['alumnos']=$this->docente_model->alumnosCurso($idHorario);
        $data['fecha_fin']=$this->docente_model->dame_fechaFin($idHorario);
        $data['idHo']=$idHorario;
        $nombreCurso = str_replace("%C3%91", "Ñ", $nombreCurso);
        $nombreCurso = str_replace("%20", " ", $nombreCurso);
        $nombreCurso = str_replace("%3E", ">", $nombreCurso);
        $data['nombreCurso']=mb_strtoupper($nombreCurso);
        $this->load->view('campus_virtual/docente/qry_view_alumnosCurso', $data);
    }
      function  EnviarEmail($idHorario){
               $query= $this->docente_model->dame_curso($idHorario);
                     if ($query) {
            $curso =  utf8_decode($this->docente_model->getCurso());
           $docente = utf8_decode($this->docente_model->getDocente());
        } 
        $this->load_listar_alumnos($idHorario);
               $archivo= $curso."_"."CURSO-00".$idHorario .".pdf";
 $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->IsHTML(true);
            $mail->Host = "mail.cipcdll.pe"; //Estableix GMAIL com el servidor SMTP.
            $mail->SMTPAuth= true; //Habilita la autenticaciÃ³ SMPT.
            $mail->SMTPSecure="tls"; //Estableix el prefix del servidor.
            $mail->Port = 25 ; //Estableix el port SMTP.
            $mail->Username="informaticacdll@cipcdll.pe"; //Username de la conte de correo que s'utilitza com a servei d'enviament.
            $mail->Password="informaticacdll2014"; //contrasenya del compte.
            $mail->From = "informaticacdll@cipcdll.pe";
            $mail->FromName = "INFOCIP CIP-CDLL";
            $mail->Subject = "Reporte de Notas Curso: ".$curso."";
            $mail->AddAddress("infocipcdll@cip.org.pe","Infocip");
            $mail->AddCC("jefesistemascdll@cip.org.pe");
            $mail->WordWrap = 50;
            $mail->AddAttachment("/var/www/html/ovcipcdll/files/pdfs/".$archivo."");      // attachment
           $body  = "
                 <table width=700>
<tr>
<td bgcolor=#dc2b19><div align=center ><b><font color=#ffffff face=Arial>Colegio de Ingenieros del Peru - Consejo Departamental de La Libertad<td>
</tr>
<tr>
<td><br><font face=Arial> Estimada, <b> Ing. Milagritos Rojales Alfaro</b>,
se esta reportando las notas finales del curso de <b>".$curso.".</b><br>
</tr>
<tr>
<td><font><div align=center><strong>Atte. Ing. ".$docente."</strong></td>
</tr>
<br>
<tr>
<td><font><div align=center >Para usar los servicios, ingresar a nuestra Oficina Virtual <a href=http://www.cip-trujillo.org/ovcipcdll/ > Click Aqui</a></td>
</tr>
</table>";
            $mail->Body = $body;
             $mail->Send();
    }
    function load_listar_view_alumnosAsistencia($criterio, $idHorario) {
        $data['alumnos']=$this->docente_model->alumnosAsistencia($criterio,$idHorario);
        $this->load->view('campus_virtual/docente/qry_view_alumnosAsistencia', $data);
    }
    
    function load_listar_view_alumnosNota($criterio, $idHorario) {
        $data['alumnos']=$this->docente_model->alumnosNota($criterio,$idHorario);
        $this->load->view('campus_virtual/docente/qry_view_alumnosNota', $data);
    }
    
    function load_listar_view_listaMateriales($idSesion) {
        $data['materiales']=$this->material_model->materialGet($idSesion);
        $this->load->view('campus_virtual/docente/qry_view_descargarMaterial', $data);
    }
    private function createFolder()
    {
        if(!is_dir("./files"))
        {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }
    }
      function load_listar_alumnos($data) {
        $sql = $this->docente_model->reporteListaQry($data);
        $query= $this->docente_model->dame_curso($data);
        if ($query) {
            $ncurso = $this->docente_model->getCurso();
                   $docente = $this->docente_model->getDocente();
                   $hinicio = $this->docente_model->getHinicio();
                   $hfin = $this->docente_model->getHfin();
        } 
        $this->createFolder();
        $this->html2pdf->folder('./files/pdfs/');

        $archivo= $ncurso."_"."CURSO-00".$data .".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'landscape');
        //$this->load->view('campus_virtual/docente/lista_alumnos_final', array("tabla"=>$sql));
        $this->html2pdf->html(utf8_decode($this->load->view('campus_virtual/docente/lista_alumnos_final', array("tabla"=>$sql,"curso"=>$ncurso,"docente"=>$docente,"inicio"=>$hinicio,"fin"=>$hfin),true)));

        if($this->html2pdf->create('save'))
        {
            //$this->show();
echo $archivo;
        }
    }
    function cursosDocente($criterio = null){
        $opcionesGrid = array(
            "Descargar Material" => "circle-arrow-s",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'docente_model',
                    'metodo' => 'cursosDocente',
                    'criterios' =>array('criterio' => $criterio),
                    'pkid' => 'id',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'id',
                        'Nombre',
                        'Horario',
                        'FechaInicio',
                        'FechaFin',
                        'opcion'
                    ),
                )
        );
    }
    
    function alumnosCurso($criterio=null){
        $opcionesGrid = array(
            "Reporte de Notas" => "note",
            "Reporte de Asistencias" => "clipboard",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'docente_model',
                    'metodo' => 'alumnosCurso',
                    'criterios' =>array('idHor' => $criterio),
                    'pkid' => 'id',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'id',
                        'datosPersonales',
                        'DNI',
                        'opcion'
                    ),
                )
        );
    }
    
    function popupAsistenciaAlumnos($criterio=null) {
        $data['sesiones']=$this->sesion_model->sesionesCbo($criterio);
        $data['idHorario']=$criterio;
        $this->load->view('campus_virtual/docente/ins_view_asistenciaAlumnos', $data);
    }
    
    function popupNotasAlumnos($criterio=null) {
        $data['sesiones']=$this->sesion_model->sesionesCbo($criterio);
        $data['idHorario']=$criterio;
        $this->load->view('campus_virtual/docente/ins_view_notasAlumnos', $data);
    }
    
    function popupUploadMaterial($idHorario) {
        $data['sesiones']=$this->sesion_model->sesionesCbo($idHorario);
        $data['horario'] = $idHorario;
        $this->load->view('campus_virtual/docente/ins_view_material', $data);
    }
    
    function popupListaMateriales($idHorario) {
        $data['sesiones']=$this->sesion_model->sesionesCbo($idHorario);
        $data['material'] = $this->materialGet($idHorario);
        $data['horario'] = $idHorario;
        $this->load->view('campus_virtual/docente/ins_view_descargarMaterial', $data);
    }
    
    function popupReporteNotasAlumno($idPersona, $idHorario){
        $data['notas']=$this->docente_model->dameNotasAlumno($idPersona, $idHorario);
        $this->load->view('campus_virtual/docente/qry_view_reporteNotasAlumno', $data);
    }
    
    function popupReporteAsistenciasAlumno($idPersona, $idHorario){
        $data['asistencias']=$this->docente_model->dameAsistenciasAlumno($idPersona, $idHorario);
        $this->load->view('campus_virtual/docente/qry_view_reporteAsistenciasAlumno', $data);
    }
    
    function actualizarEstadoAsistencia($idSesion, $idPersona, $valor){
        $this->asistencia_model->setIdSesion($idSesion);
        $this->asistencia_model->setIdPersona($idPersona);
        $this->asistencia_model->setValor($valor);
        $resul = $this->asistencia_model->actualizarEstadoAsistencia();
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }
    
    function actualizarNotaAlumno($idSesion, $idPersona, $valor){
        $this->nota_model->setIdSesion($idSesion);
        $this->nota_model->setIdPersona($idPersona);
        $this->nota_model->setValor($valor);
        $resul = $this->nota_model->actualizarNotaAlumno();
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
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
    
    function materialUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/campus_virtual/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $tipoArchivo = strstr($nombreArchivox, '.');
            $this->material_model->setIdSesion($this->input->post('hid_upload_idSesion'));
            $this->material_model->setTipoMaterial($tipoArchivo);
            $this->material_model->setUbicacion($nombreArchivox);
          
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->materialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }
    
    function eliminarMaterial($idMaterial){
        $result=$this->material_model->eliminarMaterial($idMaterial);
        if($result){
            echo 1;
        }
        else{
            echo 0 ;
        }
    }
    
}

?>