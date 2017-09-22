<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->db_colegiado = $this->load->database('db_colegiado', TRUE);
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('usuario_model', 'objUsuario');
        $this->load->model('usuario_model');
    }

    function login() {
        $data['title'] = 'Login Usuario';
        $this->load->view("usuario/login",$data);
    }

    function logout() {
        $this->session->sess_destroy();
        redirect("usuario/login");
    }

    function autenticar() {
        $this->form_validation->set_rules('user', 'Nick', 'required|trim');
        $this->form_validation->set_rules('pw', 'Contrase�a', 'required|trim|md5');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $user = $this->loaders->FiltrarTexto($this->input->post('user'));
            $pass = $this->loaders->FiltrarTexto($this->input->post('pw'));
            $tipo = ($this->input->post('cbo_usu_tipo'));


            $user = substr($user, 1, strlen($user) - 2);
            $pass = substr($pass, 1, strlen($pass) - 2);
            $data = array('user' => $user, 'pw' => $pass,'cbo_usu_tipo' => $tipo);
            $login  = $this->usuario_model->autenticarz($data);
            if ($login) {
                $data = array(
                    'esta_logeado' => true,
                    'nick' => $this->usuario_model->get_cUsuNick(),
                    'Nombres' => $this->usuario_model->getNombres(),
//                    'Nombres' => $this->usuario_model->getPerApellidoPaterno() . ' ' . $this->usuario_model->getPerApellidoMaterno() . ', ' . $this->usuario_model->getPerNombres(),
                    'IDUsu' => $this->usuario_model->get_nUsuId(),
					'nUsuTipo' => $this->usuario_model->get_nUsuTipo(),
                    'tipoclase' => $this->usuario_model->getTipoclase(),
                   'usutipo' => $tipo,
                    'IDPer' => $this->usuario_model->getPerId()
                );
                $this->session->set_userdata($data);
                redirect('dashboard/index');
                 // echo 0;
            } else {  //echo 0;
                $this->login();
                
            }
        } else { //echo 0;
            $this->login();
             
        }
    }


}

