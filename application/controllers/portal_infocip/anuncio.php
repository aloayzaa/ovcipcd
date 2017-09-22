<?php

class Anuncio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('portal_infocip/anuncio_model');
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Anuncios INFOCIP';
        $this->load->view('portal_infocip/anuncio/panel_view', $data);
             
    }

    function load_listar_view_anuncio() {
        $data['bandeja'] = $this->anuncio_model->anuncioqry();
        $this->load->view('portal_infocip/anuncio/qry_view',$data);
    }
      function load_listar_view_anuncioMultimedia($nNotCodigo) {
        $data['bandeja'] = $this->anuncio_model->AnuncioMultimediaqry($nNotCodigo);
        $this->load->view('portal_infocip/anuncio/qry_view_1',$data);
    }

    function AnuncioQry() {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
            "Vista Previa" => "newwin",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'anuncio_model',
                    'metodo' => 'anuncioqry',
                    'criterios' => '',
                    'pkid' => 'nNotCodigo',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nNotCodigo',
                        'cNotTitulo',
                         'cNotSumilla',
                           'cTipoPortal',
                        'cNotFechaFinal',
                        'opcion'
                    ),
                )
        );
    }
    
    function AnuncioIns() {
        $this->form_validation->set_rules('txt_ins_anuncio_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_ins_anuncio_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_ins_anuncio_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_ins_anuncio_contenido', 'Contenido', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->anuncio_model->setCNotFechaFinal($this->input->post('txt_ins_anuncio_fecha'));
            $this->anuncio_model->setCNotTitulo($this->input->post('txt_ins_anuncio_titulo'));
           $this->anuncio_model->setCNotSumilla($this->input->post('txt_ins_anuncio_sumilla'));
            $this->anuncio_model->setCNotContenido($this->input->post('txt_ins_anuncio_contenido'));
                        $this->anuncio_model->setCTipoPortal($this->input->post('cbo_ins_tipo_portal'));
           
            $result = $this->anuncio_model->AnuncioIns();
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
       
         $campos = $this->AnuncioGet($nNotCodigo);
         $campos['TMultimedia'] = $this->anuncio_model->get_s_cbo_multimedia();
         $this->load->view('portal_infocip/anuncio/upload_multimedia', $campos);
    }
    
   function popupVistaPrevia($nNotCodigo) {
         $campos = $this->AnuncioGet($nNotCodigo);
         $this->load->view('portal_infocip/anuncio/vista_previa', $campos);
    }

   function popupAnuncio($nNotCodigo) {
        $campos = $this->AnuncioGet($nNotCodigo);
        $this->load->view('portal_infocip/anuncio/upd_view', $campos);
    }

    function AnuncioGet($nNotCodigo = null) {
        $query = $this->anuncio_model->AnuncioGet($nNotCodigo);
        if ($query) {
            $noticia['nNotCodigo'] = $this->anuncio_model->getNNotCodigo();
            $noticia['cNotFechaFinal'] = $this->anuncio_model->getCNotFechaFinal();
            $noticia['cNotTitulo'] = $this->anuncio_model->getCNotTitulo();
            $noticia['cNotSumilla'] = $this->anuncio_model->getCNotSumilla();
            $noticia['Multimedia'] = $this->anuncio_model->getMultimedia();
            $noticia['cNotContenido'] = $this->anuncio_model->getCNotContenido();
            $noticia['CursoCbo'] = $this->anuncio_model->getCurso();
            $noticia['cTipoPortal'] = $this->anuncio_model->getCTipoPortal();
            return $noticia;
        } else {
            return false;
        }
    }

    function AnuncioUpd() {
        $this->form_validation->set_rules('hid_upd_nNotCodigo', 'nNotCodigo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_anuncio_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_upd_anuncio_titulo', 'Titulo', 'required|trim');
       $this->form_validation->set_rules('txt_upd_anuncio_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_upd_anuncio_contenido', 'Contenido');

        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->anuncio_model->setNNotCodigo($this->input->post('hid_upd_nNotCodigo'));
            $this->anuncio_model->setCNotFechaFinal($this->input->post('txt_upd_anuncio_fecha'));
            $this->anuncio_model->setCNotTitulo($this->input->post('txt_upd_anuncio_titulo'));
            $this->anuncio_model->setCNotSumilla($this->input->post('txt_upd_anuncio_sumilla'));
            $this->anuncio_model->setCNotContenido($this->input->post('txt_upd_anuncio_contenido'));
              $this->anuncio_model->setCTipoPortal($this->input->post('cbo_upd_anuncio_tipo'));
            $result = $this->anuncio_model->AnuncioUpd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->index();
        }
    }

    function AnuncioDel($nNotCodigo = null) {
        $this->anuncio_model->setNNotCodigo($nNotCodigo);
        $result = $this->anuncio_model->AnuncioDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
     function MultimediaDel($nMultCodigo = null) {
        $this->anuncio_model->setNMultCodigo($nMultCodigo);
        $result = $this->anuncio_model->MultimediaDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function anuncio_trabajoUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/portal_infocip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->anuncio_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->anuncio_model->setMultimedia($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->anuncio_model->noticiasempresarialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }
        function anuncio_trabajoUploadPdf() {
        if (!empty($_FILES)) {
            $ruta = "uploads/portal_infocip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->anuncio_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->anuncio_model->setCMultLink($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->anuncio_model->noticiasempresarialUploadPdf();
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
