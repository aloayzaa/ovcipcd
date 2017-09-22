<?php

class Administrador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
//        $this->load->library('html2pdf');
        $this->load->model('sistram/administrador_model');
        $this->load->model('sistram/expediente_model');
   
    }

    function index() {
             $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Administración';
        $expedientes = $this->administrador_model->expedientesQry('', 0);
        if (count($expedientes) > 0) {
            foreach ($expedientes as $expediente) {
                $expediente->notificaciones = $this->administrador_model->notificacionesGet($expediente->nExpedienteId);
                $expediente->multimedia = $this->administrador_model->expedienteMultimediaunido($expediente->nExpedienteId);
                $movimientos=$this->administrador_model->expedienteMovimientos($expediente->nExpedienteId);
                if($movimientos!=''){
                     $expediente->movimientos=$movimientos;
                }else{
                    $expediente->movimientos='';
                }
            }
        }
        $data['areasnotificacion'] = $this->administrador_model->areasderivar();
        
        $data['expedientes'] = $expedientes;
        $this->load->view('sistram/administrador/panel_view', $data);
    }

    function enviarVB() {
        $expedientes = $this->input->post('expedientes');
        $usuario = $this->input->post('usuario');
        $expedientes = substr($expedientes, 0, -1);
        $idexpedientes = explode(",", $expedientes);
        foreach ($idexpedientes as $v) {
            $result = $this->administrador_model->enviarVB($v, $usuario);
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
        $observacion = $this->input->post('observacion');
        $result = $this->administrador_model->enviarMesaPartes($expediente,$observacion);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function load_listar_view_administrador() {
        // aqui sera con el usuariooo
        $data['titulo'] = 'Administración';
        $expedientes = $this->administrador_model->expedientesQry('', 0);
        if (count($expedientes) > 0) {
            foreach ($expedientes as $expediente) {
                $expediente->notificaciones = $this->administrador_model->notificacionesGet($expediente->nExpedienteId);
                $expediente->multimedia = $this->administrador_model->expedienteMultimediaunido($expediente->nExpedienteId);
                $movimientos=$this->administrador_model->expedienteMovimientos($expediente->nExpedienteId);
                if($movimientos!=''){
                     $expediente->movimientos=$movimientos;
                }else{
                    $expediente->movimientos='';
                }
                
            }
        }
        $data['areasnotificacion'] = $this->administrador_model->areasderivar();

        $data['expedientes'] = $expedientes;
        $this->load->view('sistram/administrador/qry_view', $data);
    }

    function load_listar_view_administrador_derivados($anio) {
        $data['titulo'] = 'Decanato';
        $data['derivados'] = $this->administrador_model->expedientesQry('derivado', $anio);
        $this->load->view('sistram/administrador/qry_view_derivados', $data);
    }

    function derivarExpediente() {

        $areasreceptores = $this->input->post('areareceptor');
        $areasreceptores = substr($areasreceptores, 1, -1);
        $idreceptores = explode(",", $areasreceptores);
        $expedienteId = $this->input->post('expedienteId');
        $areaemisor = $this->input->post('areaId');
        $observacion = $this->input->post('observacion');
        $estado = $this->input->post('estado');
        $this->administrador_model->setExpedienteId($expedienteId);
        
        $result = $this->administrador_model->actualizarderivacion();
        if ($result) {
           foreach ($idreceptores as $v) {
            
            $this->administrador_model->setNAreaId($areaemisor);
            $this->administrador_model->setAreareceptor($v);
            $this->administrador_model->setObservacion($observacion);
            $this->administrador_model->setEstado($estado);
            $result = $this->administrador_model->derivarExpediente();
                if ($result) {
                                       
                    $band = 1;
                } else {
                    $band = 0;
                    break;
                }
            }
            if ($band) {
                $codigo=$this->administrador_model->CodigoExpedienteGet($expedienteId);
                $res=$this->load_generar_cargo($expedienteId,$codigo,'vb');         
                if($res){
                    echo 1; 
                }
                else {
                    echo 0;
                }
               
            } else {
                echo 0;
            }
           
        }else {
            echo -1;
        }

    }
    function load_generar_cargo($expedienteId,$data, $visto) {
        $this->load->library('html2pdf');
        $sql['tabla'] = $this->expediente_model->generar_Expcargo($data);
        $sql['requisitos'] = $this->expediente_model->dame_requisitos($data);
        $sql['movimientos']=$this->expediente_model->movimientosGet($expedienteId);
        $sql['visto'] = $visto;
        $this->createFolder();
        $this->html2pdf->folder('./uploads/sistram/');

        $archivo = "TRAM-" . $data . ".pdf";
        $archivo = $data . ".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'portrait');
        $this->html2pdf->html(utf8_decode($this->load->view('sistram/expediente/generacion_cargo', $sql, true)));
        if ($this->html2pdf->create('save')) {
            return true;
        }
    }
    
    private function createFolder() {
        if (!is_dir("./uploads")) {
            mkdir("./uploads", 0777);
            mkdir("./uploads/sistram", 0777);
        }
    }
    

    function expedienteGet($expediente) {
        $areasno = $this->input->post('areasnoconsiderar');

        $data['expediente'] = $this->administrador_model->expedienteGet($expediente);

        if ($areasno == '') {
            $data['areasderivar'] = $this->administrador_model->areasderivar();
        } else {
            $data['areasderivar'] = $this->administrador_model->areasderivarconexcepcion($areasno);
        }
        $this->load->view('sistram/administrador/detalle_view', $data);
    }

    function expedienteVer($expediente) {
        $data['expediente'] = $this->administrador_model->expedienteGet($expediente);
        $data['derivadoareas'] = $this->administrador_model->derivadoareas($expediente);
        $data['multimedia'] = $this->administrador_model->expedienteMultimedia($expediente);

        $this->load->view('sistram/administrador/ver_view', $data);
    }

    function darBajaNotificacion() {
        $expediente = $this->input->post('expediente');
        //$prioridad = $this->input->post('prioridad');
        $result = $this->administrador_model->darBajaNotificacion($expediente);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
