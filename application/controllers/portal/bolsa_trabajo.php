<?php

class Bolsa_trabajo extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->db->cache_delete($this->router->fetch_class(), $this->router->fetch_method());
//        $this->db->simple_query('SET NAMES \'utf-8\'');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('portal/bolsa_trabajo_model');
    }

    function index() {
 $this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Bolsa de Trabajo CIP-CDLL';
        $this->load->view('portal/bolsa_trabajo/panel_view', $data);
    }

    function load_listar_view_bolsa() {
        $data['bandeja'] = $this->bolsa_trabajo_model->bolsa_trabajoqry();
        $this->load->view('portal/bolsa_trabajo/qry_view',$data);
    }
      function load_listar_view_bolsaMultimedia($nNotCodigo) {
        $data['bandeja'] = $this->bolsa_trabajo_model->BolsaMultimediaqry($nNotCodigo);
        $this->load->view('portal/bolsa_trabajo/qry_view_1',$data);
    }

    function BolsaTrabajoQry($criterio = null) {
//        if (!isset($criterio)) {
//            $criterio = '';
//        }
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
            "Vista Previa" => "newwin",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'bolsa_trabajo_model',
                    'metodo' => 'bolsa_trabajoqry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'nNotCodigo',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nNotCodigo',
                        'cNotTitulo',
                        'cNotSumilla',
                        'cNotFechaFinal',
                        'opcion'
                    ),
                )
        );
    }
    
    function BolsaTrabajoIns() {
        $this->form_validation->set_rules('txt_ins_bolsa_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_ins_bolsa_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_ins_bolsa_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_ins_bolsa_contenido', 'Contenido', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->bolsa_trabajo_model->setCNotFechaFinal($this->input->post('txt_ins_bolsa_fecha'));
            $this->bolsa_trabajo_model->setCNotTitulo($this->input->post('txt_ins_bolsa_titulo'));
            $this->bolsa_trabajo_model->setCNotSumilla($this->input->post('txt_ins_bolsa_sumilla'));
            $this->bolsa_trabajo_model->setCNotContenido($this->input->post('txt_ins_bolsa_contenido'));
            $result = $this->bolsa_trabajo_model->BolsaTrabajoIns();
            if ($result) {
                echo 1; //EXITO
            } else {
                echo 0; //ERROR
            }
        } else {
            $this->index();
        }
    }

    function popupUpload($nNotCodigo) {
       
         $campos = $this->BolsaTrabajoGet($nNotCodigo);
         $campos['TMultimedia'] = $this->bolsa_trabajo_model->get_s_cbo_multimedia();
         $this->load->view('portal/bolsa_trabajo/upload_multimedia', $campos);
    }
    
   function popupVistaPrevia($nNotCodigo) {
         $campos = $this->BolsaTrabajoGet($nNotCodigo);
         $this->load->view('portal/bolsa_trabajo/vista_previa', $campos);
    }

    function popupBolsaTrabajo($nNotCodigo) {
        $campos = $this->BolsaTrabajoGet($nNotCodigo);
        $this->load->view('portal/bolsa_trabajo/upd_view', $campos);
    }

    function BolsaTrabajoGet($nNotCodigo = null) {
        $query = $this->bolsa_trabajo_model->BolsaTrabajoGet($nNotCodigo);
        if ($query) {
            $noticia['nNotCodigo'] = $this->bolsa_trabajo_model->getNNotCodigo();
            $noticia['cNotFechaFinal'] = $this->bolsa_trabajo_model->getCNotFechaFinal();
            $noticia['cNotTitulo'] = $this->bolsa_trabajo_model->getCNotTitulo();
            $noticia['cNotSumilla'] = $this->bolsa_trabajo_model->getCNotSumilla();
            $noticia['Multimedia'] = $this->bolsa_trabajo_model->getMultimedia();
            $noticia['cNotContenido'] = $this->bolsa_trabajo_model->getCNotContenido();
            return $noticia;
        } else {
            return false;
        }
    }

    function BolsaTrabajoUpd() {
        $this->form_validation->set_rules('hid_upd_nNotCodigo', 'nNotCodigo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_bolsa_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_upd_bolsa_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_bolsa_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_upd_bolsa_contenido', 'Contenido');

        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->bolsa_trabajo_model->setNNotCodigo($this->input->post('hid_upd_nNotCodigo'));
            $this->bolsa_trabajo_model->setCNotFechaFinal($this->input->post('txt_upd_bolsa_fecha'));
            $this->bolsa_trabajo_model->setCNotTitulo($this->input->post('txt_upd_bolsa_titulo'));
            $this->bolsa_trabajo_model->setCNotSumilla($this->input->post('txt_upd_bolsa_sumilla'));
            $this->bolsa_trabajo_model->setCNotContenido($this->input->post('txt_upd_bolsa_contenido'));
            $result = $this->bolsa_trabajo_model->BolsaTrabajoUpd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->index();
        }
    }

    function BolsaTrabajoDel($nNotCodigo = null) {
        $this->bolsa_trabajo_model->setNNotCodigo($nNotCodigo);
        $result = $this->bolsa_trabajo_model->BolsaTrabajoDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
     function MultimediaDel($nMultCodigo = null) {
        $this->bolsa_trabajo_model->setNMultCodigo($nMultCodigo);
        $result = $this->bolsa_trabajo_model->MultimediaDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function bolsa_trabajoUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
//            $nombreArchivox = md5(mt_rand(2147483647, 4294967294)) . "_" . $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->bolsa_trabajo_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->bolsa_trabajo_model->setMultimedia($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->bolsa_trabajo_model->noticiasempresarialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }
        function bolsa_trabajoUploadPdf() {
        if (!empty($_FILES)) {
            $ruta = "uploads/files/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
//            $nombreArchivox = md5(mt_rand(2147483647, 4294967294)) . "_" . $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->bolsa_trabajo_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->bolsa_trabajo_model->setCMultLink($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->bolsa_trabajo_model->noticiasempresarialUploadPdf();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

}
?>
