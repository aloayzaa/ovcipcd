<?php

class Busqueda extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('export');
        $this->load->library('html2pdf');
        $this->load->model('general_model', 'objEventos');
        $this->load->model('general_model', 'objPersona');
        $this->load->model('busqueda/busqueda_model');
        $this->load->helper('url');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Pre-Inscripcion';
        $data['evento'] = $this->busqueda_model->listar_Comboinscripcion();
        $this->load->view('busqueda/panel_view', $data);
    }

    function actualizar_fact($evento) {
        //funcion para actualizar las facturas en la inscripcion
        $inscripciones = $this->busqueda_model->obtenerInscripciones($evento);
        $i = 0;
        foreach ($inscripciones as $row) {
            $dni = $row->cInscripcionDni;
            $result = $this->busqueda_model->actualizarInscripcion($dni, $evento);
            $i++;
        }
        if ($i > 1) {
            return 1;
        }
    }

    function listar_inscripciones($evento) {
        if ($evento == 0) {
            
        } else {
            $this->actualizar_fact($evento);
            $data['evento'] = $this->busqueda_model->listar_inscripciones($evento);
            $data['capitulo'] = $this->busqueda_model->listar_capitulo($evento);
            $data['cuenta'] = $this->busqueda_model->dame_evento_cuenta($evento);
            $data['monto'] = $this->busqueda_model->dame_cuenta($data['cuenta']);
            $this->load->view('busqueda/qry_view', $data);
        }
    }
     function exportar_fecha($tipo,$Ano = null, $Mes = null,$evento=null) {
        $consult = $this->busqueda_model->listar_InscripcionesMesFecha($tipo,$Ano,$Mes,$evento);
        $mesn = $this->nombremes($Mes);
        $titulo = "Reporte del mes de " . $mesn . " del " . $Ano;
        $tabla = $this->export->to_excel($consult, $titulo);
        $this->load->view('busqueda/exportar_view', array("tabla" => $tabla));
    }
    function listar_InscripcionesMesFecha($tipo,$Ano = null, $Mes = null,$evento=null) {
       
            $data['xFecha'] = $this->busqueda_model->listar_InscripcionesMesFecha($tipo,$Ano,$Mes,$evento);
            $this->load->view('busqueda/qry_view_xfecha', $data);
  
    }

    function listar_Comboinscripcion() {
        $data['evento'] = $this->busqueda_model->listar_Comboinscripcion();
        $this->load->view('busqueda/qry_view', $data);
    }

    function cbo_eventos_usuarios() {
        $result = $this->objEventos->get_combo_eventos();
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }

    private function createFolder() {
        if (!is_dir("./files")) {
            mkdir("./files", 0777);
            mkdir("./files/pdfs", 0777);
        }
    }

    function exportarpdf($evento) {
        $titulo = 'Reporte de Pre-Inscripcion';
        $sql = $this->busqueda_model->exportarpdf($evento);
        $nombre_evento = $this->busqueda_model->dame_evento($evento);
        $this->createFolder();
        $this->html2pdf->folder('./files/pdfs/');

        $archivo = "Reporte-00" . $evento . ".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'landscape');
        $this->html2pdf->html(utf8_decode($this->load->view('busqueda/exportar_pdf_view', array("evento" => $sql, "nombre" => $nombre_evento, "titulo" => $titulo), true)));
        if ($this->html2pdf->create('save')) {
            $this->show($evento);
            echo $archivo;
        }
    }

    public function show($evento) {
        if (is_dir("./files/pdfs")) {
            $filename = "Reporte-00" . $evento . ".pdf";
            $route = "./files/pdfs/Reporte-00" . $evento . ".pdf";
            if (file_exists("./files/pdfs/" . $filename)) {
                header('Content-type: application/pdf');
                readfile($route);
            }
        }
    }

    function get_persona_dni() {
        $valor = $this->input->post('valor');
        $evento = $this->input->post('eventos');
        if ($this->input->post('valor')) {
            $fila = $this->objPersona->get_persona_dni($valor);
            $tipo = $this->objPersona->getTipo();

            if ($fila) {

                $dni = $this->busqueda_model->get_persona_existe($valor, $evento);

                if ($dni == true) {
                    echo 'existe';
                    exit();
                }
                if ($tipo == '1') {
                    ?>
                    <center>
                        <div class="row-fluid no-margin" style="margin:auto;width:50%;">
                            <div class="span12">
                                <ul class="quicktasks"> 
                                    <li style="width: auto">
                                        <a>
                                            <img alt="" src="<?php echo URL_IMG_DASH; ?>icons/essen/32/user.png"> 
                                            <span class="amount"><b>CIP: <?php echo strtoupper($fila->regcol); ?></b></span>
                                            <span class="description"><i><b><?php echo $fila->datos; ?></b></i></span>
                                            <span class="description"><i><b>DNI: <?php echo $fila->lecol; ?></b></i></span>
                                            <input id="txt_tipo" name="txt_tipo" type="hidden" value="1">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </center>
                    <?php
                } else if ($tipo == '2') {
                    ?>
                    <center>
                        <div class="row-fluid no-margin" style="margin:auto;width:50%;">
                            <div class="span12">
                                <ul class="quicktasks"> 
                                    <li style="width: auto">
                                        <a>
                                            <img alt="" src="<?php echo URL_IMG_DASH; ?>icons/essen/32/user.png"> 
                                            <span class="amount"><b>DNI: <?php echo strtoupper($fila->lecol); ?></b></span>
                                            <span class="description"><i><b><?php echo $fila->datos; ?></b></i></span>
                    <?php
                    if ($fila->cip != '') {
                        echo'<span class="amount"><b>CIP: ' . $fila->cip . '</b></span>';
                        echo '<input id="txt_tipo" name="txt_tipo" type="hidden" value="1">';
                    } else {
                        echo'<span class="amount"><b>CIP: No es colegiado</b></span>';
                        echo '<input id="txt_tipo" name="txt_tipo" type="hidden" value="2">';
                    }
                    ?>
                                            <span class="description"><i><b>CORREO: <?php echo $fila->correo; ?></b></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </center>
                    <?php
                }
            } else {


                $this->load->view('busqueda/ins_new');
            }
        } else {
            echo "vacio";
        }
    }

    function BusquedaIns() {
        $this->form_validation->set_rules('txt_nrodni', 'DNI', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->busqueda_model->setLecol($this->input->post('txt_nrodni'));
            $this->busqueda_model->setNombre($this->input->post('txt_ins_per_nombres'));
            $this->busqueda_model->setApellidoP($this->input->post('txt_ins_per_apellidop'));
            $this->busqueda_model->setApellidoM($this->input->post('txt_ins_per_apellidom'));
            $this->busqueda_model->setTelcol($this->input->post('txt_ins_per_telefono'));
            $this->busqueda_model->setCelcol($this->input->post('txt_ins_per_celular'));
            $this->busqueda_model->setEmail($this->input->post('txt_ins_per_correo'));
            $this->busqueda_model->setNEveId($this->input->post('cbo_evento_listar'));
            $this->busqueda_model->setobservacion($this->input->post('txt_ins_observacion'));
            $this->busqueda_model->setTipo($this->input->post('txt_tipo'));
            //$this->busqueda_model->setTipoCertificado($this->input->post('tipocertificado'));
            if ($this->input->post('tipocertificado') == 'PAR') {
                $this->busqueda_model->setTipoCertificado($this->input->post('tipocertificado'));
            } else if ($this->input->post('tipocertificado') == 'ORG') {
                $this->busqueda_model->setTipoCertificado($this->input->post('tipocertificado'));
            } 
            else if ($this->input->post('tipocertificado') == 'PAN') {
                $this->busqueda_model->setTipoCertificado($this->input->post('tipocertificado'));
            } else {
                $this->busqueda_model->setTipoCertificado($this->input->post('tipocertificado') . "/" . $this->input->post('grado'));
            }

            $result = $this->busqueda_model->BusquedaIns();
            $result = true;
            if ($result) {
                echo 1; //EXITO
            } else {
                echo 0; //ERROR
            }
        } else {
            $this->index();
        }
    }

    function InscripcionDel($nInscripcionId) {
        $this->busqueda_model->setNInscripcionId($nInscripcionId);
        $result = $this->busqueda_model->InscripcionDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function InscripcionAsistencia($nInscripcionId) {
        $parametros['asistencia'] = $nInscripcionId;
        $parametros['valor'] = $this->busqueda_model->dame_asistencia($nInscripcionId);

        $this->load->view('busqueda/asistencia_view', $parametros);
    }

    function popupVistaPreviaObservacion($nInscripcionId, $cuenta_ingreso) {
        $campos = $this->ObservacionGet($nInscripcionId);
        $campos['cuenta_ingreso'] = $this->busqueda_model->cuenta_ingresoGet($cuenta_ingreso);
        $this->load->view('busqueda/observacion_view', $campos);
    }

    function ObservacionGet($nInscripcionId) {
        $query = $this->busqueda_model->ObservacionGet($nInscripcionId);

        if ($query) {
            $observacion['nInscripcionId'] = $this->busqueda_model->getNInscripcionId();
            $observacion['observacion1'] = $this->busqueda_model->getObservacion();
            $observacion['monto'] = $this->busqueda_model->getNInscripcionPago();
            $observacion['comprobante'] = $this->busqueda_model->getCInscripcionTipoComprobante();

            return $observacion;
        } else {
            return false;
        }
    }

    function asistencias($Id, $valor) {
        $result = $this->busqueda_model->asistencias($Id, $valor);
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function exportar($evento) {
        $sql = $this->busqueda_model->listar_inscripciones($evento);
        $r_evento = $this->busqueda_model->traer_evento($evento);
        $titulo = "Reporte del Evento de: " . utf8_decode($r_evento['valor']);
        $tabla = $this->export->to_excel($sql, $titulo);
        $this->load->view('busqueda/exportar_view', array("tabla" => $tabla));
    }

   

    function nombremes($mes) {
        setlocale(LC_TIME, 'spanish');
        $nombre = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
        return $nombre;
    }

    function generarReporte() {
        $mes = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $data['eventos_reporte'] = $this->busqueda_model->generarReporte($anio, $mes);
                if($mes==0){
                  $data['nombresmes']='totales ';   
                }else{
        $data['nombresmes']='del mes de '.$this->nombremes($mes);
                }
        $data['anio']=$anio;
         $data['mes']=$mes;
        $this->load->view('busqueda/reporte_view', $data);
    }
    function vergrafico($anio,$mes){
        $data['eventos_reporte'] = $this->busqueda_model->generarReporte($anio, $mes);
        $this->load->view('busqueda/rep_grafico_view',$data);
        
    }
    function cbo_eventos_mes_anio(){
        $mes = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $tipoevento=$this->input->post('tipoevento');
        
        $data=$this->busqueda_model->get_combo_eventos_fecha($anio,$mes,$tipoevento);
        if($data){
            echo $data;
        }
        else {
            echo "vacio";
        }
    }
}
