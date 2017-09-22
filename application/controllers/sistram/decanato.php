<?php

class Decanato extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('sistram/decanato_model');
        $this->load->model('sistram/movimiento_model');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Decanato';
        $expedientes = $this->decanato_model->expedientesQry('', 0);
        if (count($expedientes) > 0) {
            foreach ($expedientes as $expediente) {
                $expediente->notificaciones = $this->decanato_model->notificacionesGet($expediente->nExpedienteId);
                $expediente->multimedia = $this->decanato_model->expedienteMultimediaunido($expediente->nExpedienteId);
            }
        }
        $data['areasnotificacion'] = $this->decanato_model->areasderivar();

        $data['expedientes'] = $expedientes;
        $this->load->view('sistram/decanato/panel_view', $data);
    }

    function enviarVB() {
        $expedientes = $this->input->post('expedientes');
        $usuario = $this->input->post('usuario');
        $expedientes = substr($expedientes, 0, -1);
        $idexpedientes = explode(",", $expedientes);
        foreach ($idexpedientes as $v) {
            $result = $this->decanato_model->enviarVB($v, $usuario);
            if ($result) {
                $band = 1;
            } else {
                $band = 0;
                break;
            }
        }
        if ($band == 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function enviarMesaPartes() {
        $expediente = $this->input->post('expediente');
        $result = $this->decanato_model->enviarMesaPartes($expediente);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function load_listar_view_decanato() {
        // aqui sera con el usuariooo
        $data['titulo'] = 'Decanato';
        $expedientes = $this->decanato_model->expedientesQry('', 0);
        if (count($expedientes) > 0) {
            foreach ($expedientes as $expediente) {
                $expediente->notificaciones = $this->decanato_model->notificacionesGet($expediente->nExpedienteId);
                $expediente->multimedia = $this->decanato_model->expedienteMultimediaunido($expediente->nExpedienteId);
            }
        }
        $data['areasnotificacion'] = $this->decanato_model->areasderivar();

        $data['expedientes'] = $expedientes;
        $this->load->view('sistram/decanato/qry_view', $data);
    }

    function load_listar_view_decanato_derivados($anio) {
        $data['titulo'] = 'Decanato';
        $data['derivados'] = $this->decanato_model->expedientesQry('derivado', $anio);
        $this->load->view('sistram/decanato/qry_view_derivados', $data);
    }

    function derivarExpediente() {

        $areasreceptores = $this->input->post('areareceptor');
        $areasreceptores = substr($areasreceptores, 1, -1);
        $idreceptores = explode(",", $areasreceptores);
        $expedienteId = $this->input->post('expedienteId');
        $areaemisor = $this->input->post('areaId');
        $observacion = $this->input->post('observacion');
        $estado = $this->input->post('estado');
        $prioridad = $this->input->post('prioridad');
        foreach ($idreceptores as $v) {
            $this->movimiento_model->setExpedienteId($expedienteId);
            $this->movimiento_model->setNAreaId($areaemisor);
            $this->movimiento_model->setAreareceptor($v);
            $this->movimiento_model->setObservacion($observacion);
            $this->movimiento_model->setEstado($estado);
            $this->movimiento_model->setPrioridad($prioridad);
            $result = $this->movimiento_model->derivarExpediente(1);
            if ($result) {
                $band = 1;
            } else {
                $band = 0;
                break;
            }
        }
        if ($band) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function expedienteGet($expediente) {
        $areasno = $this->input->post('areasnoconsiderar');

        $data['expediente'] = $this->decanato_model->expedienteGet($expediente);

        if ($areasno == '') {
            $data['areasderivar'] = $this->decanato_model->areasderivar();
        } else {
            $data['areasderivar'] = $this->decanato_model->areasderivarconexcepcion($areasno);
        }
        $this->load->view('sistram/decanato/detalle_view', $data);
    }

    function expedienteVer($expediente) {
        $data['expediente'] = $this->decanato_model->expedienteGet($expediente);
        $data['derivadoareas'] = $this->decanato_model->derivadoareas($expediente);
        $data['multimedia'] = $this->decanato_model->expedienteMultimedia($expediente);

        $this->load->view('sistram/decanato/ver_view', $data);
    }

    function darBajaNotificacion() {
        $expediente = $this->input->post('expediente');
        $prioridad = $this->input->post('prioridad');
        $result = $this->decanato_model->darBajaNotificacion($prioridad, $expediente);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
