<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Miembrosperitos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db_colegiado = $this->load->database('colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('miembrosperitos/miembrosperitos_model');
    }

    function index() {
$this->loaders->verificaAcceso('W');
    $data['titulo']=  'Registro de Peritos CIP-CDLL';
        $this->load->view("miembrosperitos/panel_view",$data);
    }

    function load_search_view_peritos() {
        $this->load->view("miembrosperitos/ins_miembros_peritos");
    }

    function load_qry_miembros() {
        $this->load->view("miembrosperitos/qry_view");
    }
     function popupVistaPrevia($nPeritoId) {
         $campos = $this->get_datos_miembros($nPeritoId);
         $this->load->view('miembrosperitos/vista_previa', $campos);
    }
    function reload_renovacion(){
        $data['peritos'] = $this->miembrosperitos_model->get_combo_peritos();
        $this->load->view("miembrosperitos/renovacion_peritos",$data);
    }

    function get_datos_colegiado() {
        $regcol = $this->input->post("regcol");
        $data = $this->miembrosperitos_model->get_datos_colegiado($regcol);
        if ($data) {
            $result['Datos'] = $this->miembrosperitos_model->getDatos();
            $result['especialidad'] = $this->miembrosperitos_model->getEspecialidad();
            $result['direccion'] = $this->miembrosperitos_model->getDireccion();
            $result['contacto'] = $this->miembrosperitos_model->getContacto();
            $result['email'] = $this->miembrosperitos_model->getEmail();
            $result['emailsec']=$this->miembrosperitos_model->getEmailsec();
            $result['regcol'] = $this->miembrosperitos_model->getRegcol();

            echo "get_peritos_cip('" . mb_convert_encoding($result['Datos'], "UTF-8") . "','" . $result['especialidad'] . "','" . $result['regcol'] . "','" . $result['direccion'] . "','" . $result['contacto']."','". $result['email'] ."','".$result['emailsec']."');";
        } else {
            echo "1";
        }
    }

    function miembrosIns() {
        $regcol = $this->input->post("txt_perito_NroCip");
        $data = $this->miembrosperitos_model->buscar_peritos($regcol);
       if ($data) {
            $this->miembrosperitos_model->setRegcol($this->input->post('txt_perito_NroCip'));
            $this->miembrosperitos_model->setDatos($this->input->post('txt_perito_datos_ins'));
            $this->miembrosperitos_model->setEspecialidad($this->input->post('txt_perito_especialidad_ins'));
            $this->miembrosperitos_model->setDireccion($this->input->post('txt_perito_direccion_ins'));
            $this->miembrosperitos_model->setContacto($this->input->post('txt_perito_contacto_ins'));
            $this->miembrosperitos_model->setEmail($this->input->post('txt_perito_email_ins'));
            $this->miembrosperitos_model->setEmailsec($this->input->post('txt_perito_emailsec_ins'));
            $this->miembrosperitos_model->setAdscrito($this->input->post('txt_perito_adscrito'));
            $this->miembrosperitos_model->setFechafin($this->input->post('txt_perito_fecha_inscripcionfin'));
            $resul = $this->miembrosperitos_model->miembrosIns();

            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
    }

    function miembrosQry($criterio='') {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Vista Previa" => "newwin",
            "Eliminar" => "trash",);
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'miembrosperitos_model',
                    'metodo' => 'miembrosQry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'nPeritoId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nPeritoId',
                        'nCip',
                        'cPeritoDatos',
                        'cEspecialidad',
                        'cPeritoAdscrito',
                        'cPeritoContacto',
                        'email',
                        'cFechaInscripcion',
                        'fechafin',
                        'cPeritoRenovacion',
                        'opcion'
                    ),
                )
        );
    }
    
     function popupEditar($id){
            $parametros = $this->get_datos_miembros($id);
            $this->load->view('miembrosperitos/upd_view',$parametros);
        }
        
        function get_datos_miembros($id){
            $query = $this->miembrosperitos_model->get_datos_miembros($id);
            if ($query){
                $peritos['nPeritoId']=$this->miembrosperitos_model->getId();
                $peritos['Datos']=$this->miembrosperitos_model->getDatos();
                $peritos['cip']=$this->miembrosperitos_model->getRegcol();
                $peritos['especialidad']=$this->miembrosperitos_model->getEspecialidad();
                $peritos['adscrito']=$this->miembrosperitos_model->getAdscrito();
                $peritos['direccion']=$this->miembrosperitos_model->getDireccion();
                $peritos['contacto']=$this->miembrosperitos_model->getContacto();
                $peritos['email']=$this->miembrosperitos_model->getEmail();
                $peritos['emailsec']=$this->miembrosperitos_model->getEmailsec();
                return $peritos ; 
            }else
                return false;
            
        }
    
         function miembrosPeritosUpd() {
        $this->form_validation->set_rules('txt_upd_miembro_Direccion', 'Direccion', '|trim|required');
        $this->form_validation->set_rules('txt_upd_miembro_Contacto', 'Contacto', '|trim|required');
        $this->form_validation->set_rules('txt_upd_miembro_Email', 'Email', '|trim|required');
        $this->form_validation->set_rules('txt_upd_miembro_Especialidad', 'Especialidad', '|trim|required');
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->miembrosperitos_model->setId($this->input->post('hid_udp_id'));
            $this->miembrosperitos_model->setEspecialidad($this->input->post('txt_upd_miembro_Especialidad'));
            $this->miembrosperitos_model->setAdscrito($this->input->post('txt_upd_miembro_Adscrito'));
            $this->miembrosperitos_model->setDireccion($this->input->post('txt_upd_miembro_Direccion'));
            $this->miembrosperitos_model->setContacto($this->input->post('txt_upd_miembro_Contacto'));
            $this->miembrosperitos_model->setEmail($this->input->post('txt_upd_miembro_Email'));
            $this->miembrosperitos_model->setEmailsec($this->input->post('txt_upd_miembro_Emailsec'));            
            $resul = $this->miembrosperitos_model->miembrosPeritosUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else  {
                $this->index();
            }
        }
        function MiembrosDel($id){
            $this->miembrosperitos_model->setId($id);
            $result = $this->miembrosperitos_model->MiembrosDel();
            if ($result){
                echo 1;
            }else{
                echo 0;
            }
        }

        function RenovacionPlanilla($id,$fechafin){
            $parametros = array($id,$fechafin);
            $result = $this->miembrosperitos_model->RenovacionPlanilla($parametros);
            if ($result){
                echo 1;
                exit;
            }else{
                echo 0;
            }
        }
        
        
}

?>
