<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Sesion extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->bdcampus = $this->load->database('bdcampusvirtual', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/sesion_model');
        $this->load->model('campus_virtual/nota_model');
        $this->load->model('campus_virtual/docente_model');
    }
    
    function load_listar_view_sesiones($criterio=null) {
        $data['idHorario'] = $criterio;
        $data['sesiones']=$this->sesion_model->sesionesCbo($criterio);
        $this->load->view('campus_virtual/sesion/qry_view_actualizarSesion', $data);
    }
    
    function sesionIns() {
        $this->form_validation->set_rules('txt_ins_ses_titulo', 'Titulo', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->sesion_model->setIdSesion($this->input->post('hid_idSesion'));
            $this->sesion_model->setTitulo($this->input->post('txt_ins_ses_titulo'));
            $this->sesion_model->setValor($this->input->post('hid_valor'));
            $resul = $this->sesion_model->sesionIns();
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
    
    function sesionUpd() {
        $this->form_validation->set_rules('txt_upd_tituloSesion', 'Titulo de Sesión', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $valor = $this->input->post('cbo_sesiones');
            $idSesion = strstr($valor, '_', true);
            if($this->input->post('hid_cantidad') == 0){
                if(!$this->input->post('chk_upd_ses_nota')){
                    //insert
                    $arreglo = $this->sesion_model->alumnosHorario($this->input->post('hid_idhorario'));
                    if($arreglo != null){
                        $can = count($arreglo);
                        for($j = 0; $j < $can; $j = $j + 1){
                            $this->nota_model->setIdPersona($arreglo[$j]);
                            $this->nota_model->setIdSesion($idSesion);
                            $this->nota_model->setFecha($this->input->post('hid_fecha'));
                            $this->nota_model->setValor("00");
                            $this->nota_model->notaIns();
                        }
                    }
                }
            }
            else{
                if($this->input->post('chk_upd_ses_nota')){
                    //delete
                    $this->nota_model->notaDel($idSesion);
                }
            }
            $this->sesion_model->setIdSesion($idSesion);
            $this->sesion_model->setTitulo($this->input->post('txt_upd_tituloSesion'));
            $resul = $this->sesion_model->sesionUpd();
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
    
 function popupInsSesion($criterio=null) {
        $data['idHorario'] = $criterio;
        $data['sesiones']=$this->sesion_model->sesionesTemporales($criterio);
        $data['verificar'] = $this->sesion_model->verificarSesionesActivas($criterio);
        $data['alumnos']=$this->docente_model->alumnosCurso($criterio);
        $data['fechaHoy']=$this->sesion_model->fechaHoy();
        $this->load->view('campus_virtual/sesion/ins_view', $data);
    }
    function popupUpdSesion($criterio=null) {
        $data['idHorario'] = $criterio;
        $data['sesiones']=$this->sesion_model->sesionesCbo($criterio);
        $this->load->view('campus_virtual/sesion/upd_view', $data);
    }
    
    function mostrarSesion($concatenado) {
        $idSesion = strstr($concatenado, '-', true);
        $c = strstr($concatenado, '-');
        $cadena = substr($c, 1);
        $idHorario = strstr($cadena, '_', true);
        $f = strstr($cadena, '_');
        $fe = substr($f, 1);
        $fecha = str_replace("-", "/", $fe);
        $anio = substr($fecha, 6, 4);
        $mes = substr($fecha, 3, 2);
        $dia = substr($fecha, 0, 2);
        $fechaIns = $anio."/".$mes."/".$dia;
        
        if ($concatenado != null) {
            $result = "";
            $result .= '<legend>Datos Sesion</legend>';
            $result .= '<fieldset>';
            $result .= '<table>';
            $result .= '<tr>';
            $result .= '<td style="padding-bottom: 10px" colspan="2">';
            $result .= '<label><input type="checkbox" name="chk_ins_ses_nota" id="chk_ins_ses_nota" onclick="cambiarValor()"/> No se colocaran notas</label>';
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '<tr>';
            $result .= '<td style="padding-bottom: 10px">';
            $result .= '<label>Titulo de la Sesion: </label>';
            $result .= '</td>';
            $result .= '<td style="padding-bottom: 10px">';
            $result .= '<input type="text" name="txt_ins_ses_titulo" id="txt_ins_ses_titulo" style="resize:none;width:250px; class="input-medium input-prepend tip" required="required" data-original-title="Escriba Nombre de Sesion" placeholder="Nombre de Sesion"/>';
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '<tr>';
            $result .= '<td style="padding-bottom: 10px">';
            $result .= '<label>Fecha de la Sesion: </label>';
            $result .= '</td>';
            $result .= '<td style="padding-bottom: 10px">';
            $result .= $fecha;
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '<tr>';
            $result .= '<td style="padding-bottom: 10px">';
            $result.="<input type='submit' name='btn_ins_ses' id='btn_ins_ses' value='Registrar Sesion' class='btn btn-primary'>";
            $result .= '</td>';
            $result .= '<td style="padding-bottom: 10px">';
            $result.="<input type='button' name='btn_cerrar' id='btn_cerrar' value='Cancelar' onclick='cerrarPopUp()' class='btn btn-primary'>";
            $result .= '</td>';
            $result .= '</tr>';
            $result .= '</table>';
            $result.="<input type='hidden' name='hid_fecha' id='hid_fecha' value='" . $fechaIns . "'>";
            $result.="<input type='hidden' name='hid_idSesion' id='hid_idSesion' value='" . $idSesion . "'>";
            $result.="<input type='hidden' name='hid_valor' id='hid_valor' value='0'>";
            $result .= '</fieldset>'; 
            
            echo $result;
            
        } else {
            return false;
        }
    }
    
    function editarSesion($idSesion){
        $cantidad = $this->sesion_model->verificarTieneNotas($idSesion);
        $query = $this->sesion_model->sesionGet($idSesion);
        if ($query) {
            $sesion['idSesion'] = $this->sesion_model->getIdSesion();
            $sesion['titulo'] = $this->sesion_model->getTitulo();
            $sesion['fecha'] = $this->sesion_model->getFecha();
            
            $result = "";
            $result .= '<div class="control-group">';
            $result .= '<label class="control-label">Titulo de Sesión: </label>';
            $result .= '<div class="controls">';
            $result .= '<input type="text" id="txt_upd_tituloSesion" name="txt_upd_tituloSesion" value="'.$sesion['titulo'].'"/>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<div class="control-group">';
            $result .= '<div class="controls">';
            if($cantidad == 0){
                $result .= '<label><input type="checkbox" name="chk_upd_ses_nota" id="chk_upd_ses_nota" checked/> No se colocaran notas</label>';
            }
            else{
                $result .= '<label><input type="checkbox" name="chk_upd_ses_nota" id="chk_upd_ses_nota"/> No se colocaran notas</label>';
            }
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<div class="controls">';
            $result .= '<input type="submit" name="btn_upd_sesion" id="btn_upd_sesion" value="Modificar" class="btn btn-primary"/>';
            $result .= '</div>';
            $result.="<input type='hidden' name='hid_cantidad' id='hid_cantidad' value='" . $cantidad . "'>";
            $result.="<input type='hidden' name='hid_fecha' id='hid_fecha' value='" . $sesion['fecha'] . "'>";
            
            echo $result;
            
        } else {
            echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> Seleccione una sesión valida.</div>";
        }
    }
    
}

?>