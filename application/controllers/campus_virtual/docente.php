<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');
class Docente extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('bdcampusvirtual', TRUE);
        $this->bdcolegio = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('campus_virtual/docente_model');
    }
    
    function index(){
         $this->loaders->verificaAcceso('W');
      $data['titulo'] = 'Lista de Docentes';
        $this->load->view('campus_virtual/docente/panel_view', $data);
    }
    
    function load_listar_view_docente() {
        $this->load->view('campus_virtual/docente/qry_view');
//        $data['datos'] = $this->docente_model->docenteQry();
//        $this->load->view('campus_virtual/docente/qry_view_2', $data);
    }
    function load_frm_upd_persona() {
        $query = $this->docente_model->buscarDocente($this->input->post('regcol'));
        if ($query) {
            $docente['idPersona'] = $this->docente_model->getIdPersona();
            $docente['dni'] = $this->docente_model->getDni();
            $docente['nombres'] = $this->docente_model->getNombres();
            $docente['apellidoPaterno'] = $this->docente_model->getApellidoPaterno();
            $docente['apellidoMaterno'] = $this->docente_model->getApellidoMaterno();
            $docente['telefono'] = $this->docente_model->getTelefono();
            $docente['correoElectronico'] = $this->docente_model->getCorreoElectronico();
            $docente['direccion'] = $this->docente_model->getDireccion();
            $this->load->view('campus_virtual/docente/upd_view', $docente);
        } else {
            $this->load->view('campus_virtual/docente/upd_view');
        }
    }
    
    function docenteIns() {
        $this->form_validation->set_rules('txt_ins_doc_nombres', 'Nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_apellidoPaterno', 'Apellido Paterno', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_apellidoMaterno', 'Apellido Materno', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_cip', 'C.I.P.', '|trim');
        $this->form_validation->set_rules('txt_ins_doc_dni', 'D.N.I.', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_telefono', 'Telefono', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_correoElectronico', 'Correo Electronico', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_especialidad', 'Especialidad', '|trim|required');
        $this->form_validation->set_rules('txt_ins_doc_referenciaLaboral', 'Referencia Laboral', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->docente_model->setCip($this->input->post('txt_ins_doc_cip'));
            $this->docente_model->setDni($this->input->post('txt_ins_doc_dni'));
            $this->docente_model->setNombres($this->input->post('txt_ins_doc_nombres'));
            $this->docente_model->setApellidoPaterno($this->input->post('txt_ins_doc_apellidoPaterno'));
            $this->docente_model->setApellidoMaterno($this->input->post('txt_ins_doc_apellidoMaterno'));
            $this->docente_model->setTelefono($this->input->post('txt_ins_doc_telefono'));
            $this->docente_model->setCorreoElectronico($this->input->post('txt_ins_doc_correoElectronico'));
            $this->docente_model->setEspecialidad($this->input->post('txt_ins_ins_especialidad'));
            $this->docente_model->setReferenciaLaboral($this->input->post('txt_ins_doc_referenciaLaboral'));
            $resul = $this->docente_model->docenteIns();

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
    
    function docenteQry() {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'docente_model',
                    'metodo' => 'docenteQry',
                    'criterios' => '',
                    'pkid' => 'id',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                         'id',
                        'DatosPersonales',
                        'opcion'
                    ),
                )
        );
    }
    
    function popupEditarDocente($idUsuario) {
        $campos = $this->docenteGet($idUsuario);
        $this->load->view('campus_virtual/docente/upd_view', $campos);
    }
    
    function docenteGet($idPersona) {
        $query = $this->docente_model->buscarDocenteIdPersona($idPersona);
        if ($query) {
            $docente['idPersona'] = $this->docente_model->getIdPersona();
            $docente['dni'] = $this->docente_model->getDni();
            $docente['nombres'] = $this->docente_model->getNombres();
            $docente['apellidoPaterno'] = $this->docente_model->getApellidoPaterno();
            $docente['apellidoMaterno'] = $this->docente_model->getApellidoMaterno();
            $docente['telefono'] = $this->docente_model->getTelefono();
            $docente['correoElectronico'] = $this->docente_model->getCorreoElectronico();
            $docente['direccion'] = $this->docente_model->getDireccion();
            $docente['tipo'] = $this->docente_model->getTipo();
            return $docente;
        } else {
            return false;
        }
    }
    
    function docenteUpdTipo($completo){
        $idPersona = strstr($completo, '-', true);
        $v = strstr($completo, '-');
        $dni = substr($v, 1);
        
        if($idPersona != "nada"){
            $this->docente_model->setIdPersona($idPersona);
            $resul = $this->docente_model->docenteUpdTipo($idPersona);
            $resul3 = $this->docente_model->docentePermisosIns();
        }
        else{
            $resul = $this->docente_model->docenteInsTipo($dni);
            $idPer = $this->docente_model->idPersonaSegunDni($dni);
            $this->docente_model->setIdPersona($idPer);
            $resul3 = $this->docente_model->docentePermisosIns();
        }
        if ($resul && $resul3) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }
    
    function docenteUpd() {
        $this->form_validation->set_rules('txt_upd_doc_nombres', 'Nombres', '|trim|required');
        $this->form_validation->set_rules('txt_upd_doc_apellidoPaterno', 'Apellido Paterno', '|trim|required');
        $this->form_validation->set_rules('txt_upd_doc_apellidoMaterno', 'Apellido Materno', '|trim|required');
        $this->form_validation->set_rules('txt_upd_doc_dni', 'D.N.I.', '|trim|required');
        $this->form_validation->set_rules('txt_upd_doc_telefono', 'Telefono', '|trim|required');
        $this->form_validation->set_rules('txt_upd_doc_correoElectronico', 'Correo Electronico', '|trim|required|valid_email');
        $this->form_validation->set_rules('txt_upd_doc_direccion', 'Direccion', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('valid_email', '<span>El campo correo electr&oacute;nico no es una direcci&oacute;n de e mail valida. </span>'); //Establecemos los mensajes para la regla email
        if ($this->form_validation->run() == true) {
            $this->docente_model->setDni($this->input->post('txt_upd_doc_dni'));
            $this->docente_model->setNombres($this->input->post('txt_upd_doc_nombres'));
            $this->docente_model->setApellidoPaterno($this->input->post('txt_upd_doc_apellidoPaterno'));
            $this->docente_model->setApellidoMaterno($this->input->post('txt_upd_doc_apellidoMaterno'));
            $this->docente_model->setTelefono($this->input->post('txt_upd_doc_telefono'));
            $this->docente_model->setCorreoElectronico($this->input->post('txt_upd_doc_correoElectronico'));
            $this->docente_model->setDireccion($this->input->post('txt_upd_doc_direccion'));
            $this->docente_model->setIdPersona($this->input->post('hid_upd_doc_idPersona'));
            $resul = $this->docente_model->docenteUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            echo 3;
        }
    }
    
    function buscarDocente($dni) {
        $query = $this->docente_model->buscarDocente($dni);
        if ($query) {
            $docente['idPersona'] = $this->docente_model->getIdPersona();
            $docente['dni'] = $this->docente_model->getDni();
            $docente['nombres'] = $this->docente_model->getNombres();
            $docente['apellidoPaterno'] = $this->docente_model->getApellidoPaterno();
            $docente['apellidoMaterno'] = $this->docente_model->getApellidoMaterno();
            $docente['telefono'] = $this->docente_model->getTelefono();
            $docente['correoElectronico'] = $this->docente_model->getCorreoElectronico();
            $docente['direccion'] = $this->docente_model->getDireccion();
            $docente['tipo'] = $this->docente_model->getTipo();
            $docente['cip'] = $this->docente_model->getCip();
            
            $result = "";
            if($docente['tipo'] == 'DO'){
                
                $result = "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> El DNI ya pertenece a un docente.</div>";
            }
            else{
                    $result .= '<legend>Datos de la Persona</legend>';
                    $result .= '<fieldset>';
                    $result .= '<table>';
                    $result .= '<tbody>';
                    $result.='<tr>';
                    $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="../uploads/ruteo/usuario.png" width="110" height="108"></td>';
                    $result.='<td style="vertical-align:top;">';
                    $result.='<table cellpadding="2" cellspacing="0">';
                    $result.='<tbody>';
                    $result.='<tr>';
                    $result.='<td><b>Nombres</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['nombres'] . ' ' . $docente['apellidoPaterno'] . ' ' . $docente['apellidoMaterno'] . '</td>';
                    $result.='</tr>';
                    $result.='<tr>';
                    $result.='<td><b>Nro DNI</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['dni'] . '</td>';
                    $result.='</tr>';
                    $result.='<tr>';
                    $result.='<td><b>Telefono</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['telefono'] . '</td>';
                    $result.='</tr>';
                    $result.='<tr>';
                    $result.='<td><b>Correo Electronico</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['correoElectronico'] . '</td>';
                    $result.='</tr>';
                    $result.='<td><b>Direccion</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['direccion'] . '</td>';
                    $result.='</tr>';
                    $result.='</tr>';
                    $result.='<td><b>C.I.P.</b></td>';
                    $result.='<td><b>:</b></td>';
                    $result.='<td style="padding-left:5px;">' . $docente['cip'] . '</td>';
                    $result.='</tr>';

                    //$result.='<td colspan="3" style="padding-top:10px;">';
                    //$result.="<div style='padding-bottom:6px;'>Desea actualizar a la Persona:</div>";
                    $result.="<input type='hidden' name='hid_doc_dni' id='hid_doc_dni' value='" . $docente['dni'] . "'>";
                    $result.="<input type='hidden' name='hid_upd_doc_idPersona' id='hid_upd_doc_idPersona' value='" . $docente['idPersona'] . "'>";
                    $result.="<input type='hidden' name='hid_upd_doc_tipo' id='hid_upd_doc_tipo' value='" . $docente['tipo'] . "'>";
                    //$result.="<input type='submit' name='btnactualizar' id='btnactualizar' value='Mostrar Datos' class='btn btn-primary'>";

                    //$result.= "</div>";
                    //$result.='</td>';
                    $result.='<td colspan="3" style="padding-top:36px;">';
                    $result.="<input type='submit' name='btnconfirmar' id='btnconfirmar' value='Confirmar Datos' class='btn btn-success'>";
                    $result.='</td>';
                    $result.='</tr>';
                    $result.='</tbody>';
                    $result.='</table>';
                    $result.='</td>';
                    $result.='</tr>';
                    $result.='</tbody>';
                    $result .= '</table>';
                    $result .= '</fieldset>';
                }
            
            echo $result;
            
        } else {
            return false;
        }
    }
    
}

?>
