<?php

class actualizacion_colegiado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db_colegiado = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/actualizacion_col_model');
        $this->load->model('colegiado/colegiado_model');
    }
    function index() {
        $data['titulo'] = 'Actualización de Datos Colegiado';
        $this->load->view('intranet/actualizacion_colegiado/panel_view', $data);
    }

     function load_frm_upd_colegiado() {
        $query = $this->actualizacion_col_model->colegiadoDataUpd($this->input->post('regcol'));
        if ($query) {
            $datos['zona'] = $this->colegiado_model->get_s_cbo_tipodocumento();
            $datos['regcol'] = $this->actualizacion_col_model->getRegcol();
            $datos['nomcol'] = $this->actualizacion_col_model->getNombre();
            $datos['apecol'] = $this->actualizacion_col_model->getApellidop();
            $datos['apematcol'] = $this->actualizacion_col_model->getApellidom();
            $datos['lecol'] = $this->actualizacion_col_model->getDni();
            $datos['sexcol'] = $this->actualizacion_col_model->getSexcol();
            $datos['colestcivil'] = $this->actualizacion_col_model->getColestcivil();
            $datos['fechanac'] = $this->actualizacion_col_model->getFecnaccol();
            $datos['direcol'] = $this->actualizacion_col_model->get_Direcol();
            $datos['email'] = $this->actualizacion_col_model->getEmail();
            $datos['emailsec'] = $this->actualizacion_col_model->getEmailsec();
            $datos['telcol'] = $this->actualizacion_col_model->getTelcol();
            $datos['celcol'] = $this->actualizacion_col_model->getCelcol();
            $datos['redpm'] = $this->actualizacion_col_model->getRedpm();
            $datos['redpc'] = $this->actualizacion_col_model->getRedpc();
            $datos['celuemp'] = $this->actualizacion_col_model->getCeluemp();
            $datos['codzona'] = $this->actualizacion_col_model->getCodzona();
            $datos['descrzona'] = $this->actualizacion_col_model->getDescrzona();
            $this->load->view('intranet/actualizacion_colegiado/upd_view', $datos);
        } else {
            $this->load->view('intranet/actualizacion_colegiado/upd_view');
        }
    }

         function load_frm_upd_prof_colegiado() {
        $query = $this->actualizacion_col_model->colegiadoDataProfUpd($this->input->post('regcol'));
        if ($query) {
            $datos['regcol'] = $this->actualizacion_col_model->getRegcol();
            $datos['razsocinsacad'] = $this->actualizacion_col_model->getRazsocinsacad();
            $datos['desccap'] = $this->actualizacion_col_model->getDesccap();
            $datos['fecinscol'] = $this->actualizacion_col_model->getFecinscol();
            $datos['fectitcol'] = $this->actualizacion_col_model->getFectitcol();
            $datos['nrectoral'] = $this->actualizacion_col_model->getNrectoral();

            $this->load->view('intranet/actualizacion_colegiado/prof_upd_view', $datos);
        } else {
            $this->load->view('intranet/actualizacion_colegiado/prof_upd_view');
        }
    }

        function DatosColegiadoIntUpd() {

        $this->form_validation->set_rules('hid_upd_regcol', 'regcol', 'required|trim');
        $this->form_validation->set_rules('txt_upd_col_direccion', 'direcol', 'required|trim');
        $this->form_validation->set_rules('txt_upd_col_emailp', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('txt_upd_col_emails', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('celuemp', 'Radio button', 'required');
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('valid_email', '<span>El campo correo electr&oacute;nico no es una direcci&oacute;n de e mail valida. </span>'); //Establecemos los mensajes para la regla email

        if ($this->form_validation->run() == true) {
            $this->actualizacion_col_model->setCodzona($this->input->post('Zona'));
            $this->actualizacion_col_model->setDescrzona($this->input->post('Zona'));
            $this->actualizacion_col_model->setZonaantes($this->input->post('txt_upd_col_zonaantes'));
            $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
            $this->actualizacion_col_model->setDirecol($this->input->post('txt_upd_col_direccion'));
            $this->actualizacion_col_model->setDirecolant($this->input->post('txt_upd_col_direccionantes'));
            $this->actualizacion_col_model->setEmail($this->input->post('txt_upd_col_emailp'));
            $this->actualizacion_col_model->setEmailant($this->input->post('txt_upd_col_emailpantes'));
            $this->actualizacion_col_model->setEmailsec($this->input->post('txt_upd_col_emails'));
            $this->actualizacion_col_model->setEmailsecant($this->input->post('txt_upd_col_emailsantes'));
            $this->actualizacion_col_model->setTelcol($this->input->post('txt_upd_col_telefono'));
            $this->actualizacion_col_model->setTelcolant($this->input->post('txt_upd_col_telefonoantes'));
            $this->actualizacion_col_model->setCelcol($this->input->post('txt_upd_col_celular'));
            $this->actualizacion_col_model->setCelcolant($this->input->post('txt_upd_col_celularantes'));
            $this->actualizacion_col_model->setRedpm($this->input->post('txt_upd_col_celularrpm'));
            $this->actualizacion_col_model->setRedpmant($this->input->post('txt_upd_col_celularpmantes'));
            $this->actualizacion_col_model->setRedpc($this->input->post('txt_upd_col_celularrpc'));
            $this->actualizacion_col_model->setRedpcant($this->input->post('txt_upd_col_celularpcantes'));
            $this->actualizacion_col_model->setCeluemp($this->input->post('celuemp'));
            $this->actualizacion_col_model->setIp($this->input->post('ip'));

            $result = $this->actualizacion_col_model->DatosColegiadoIntUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            //errores de form_validation desde el evento mostrado
            echo 3;
        }
    }
}
?>
