<?php

class Noticias_infocip extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('portal_infocip/noticias_infocip_model');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $data['Curso']= $this->noticias_infocip_model->CursoCbo(); 
        $data['titulo'] = 'Noticias INFOCIP';
        $this->load->view('portal_infocip/noticias_infocip/panel_view', $data);
             
    }

    function load_listar_view_noticias() {
        $data['bandeja'] = $this->noticias_infocip_model->noticias_infocipqry();
        $this->load->view('portal_infocip/noticias_infocip/qry_view',$data);
    }
      function load_listar_view_noticiasMultimedia($nNotCodigo) {
        $data['bandeja'] = $this->noticias_infocip_model->NoticiasMultimediaqry($nNotCodigo);
        $this->load->view('portal_infocip/noticias_infocip/qry_view_1',$data);
    }

    function NoticiasInfocipQry($criterio = null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
            "Vista Previa" => "newwin",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'noticias_infocip_model',
                    'metodo' => 'noticias_infocipqry',
                    'criterios' => array('criterio' => $criterio),
                    'pkid' => 'nNotCodigo',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'nNotCodigo',
                        'cNotTitulo',
                        'cNotSumilla',
                        'cNotFechaInicial',
                        'cNotFechaFinal',
                        'opcion'
                    ),
                )
        );
    }
    
    function NoticiasInfocipIns() {
        $this->form_validation->set_rules('txt_ins_noticiasinfocip_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_ins_noticiasinfocip_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_ins_noticiasinfocip_sumilla', 'Sumilla', 'required|trim');
        //$this->form_validation->set_rules('txt_ins_noticiasinfocip_contenido', 'Contenido', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->noticias_infocip_model->setCNotFechaFinal($this->input->post('txt_ins_noticiasinfocip_fecha'));
            $this->noticias_infocip_model->setCNotTitulo($this->input->post('txt_ins_noticiasinfocip_titulo'));
            $this->noticias_infocip_model->setCNotSumilla($this->input->post('txt_ins_noticiasinfocip_sumilla'));
            $this->noticias_infocip_model->setCNotContenido($this->input->post('txt_ins_noticiasinfocip_contenido'));
            $this->noticias_infocip_model->setCurso($this->input->post('cboCurso'));
            $result = $this->noticias_infocip_model->NoticiasInfocipIns();
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
       
         $campos = $this->NoticiasInfocipGet($nNotCodigo);
         $campos['TMultimedia'] = $this->noticias_infocip_model->get_s_cbo_multimedia();
         $this->load->view('portal_infocip/noticias_infocip/upload_multimedia', $campos);
    }
    
   function popupVistaPrevia($nNotCodigo) {
         $campos = $this->NoticiasInfocipGet($nNotCodigo);
         $this->load->view('portal_infocip/noticias_infocip/vista_previa', $campos);
    }

    function popupNoticiasInfocip($nNotCodigo) {
        $campos = $this->NoticiasInfocipGet($nNotCodigo);
        $this->load->view('portal_infocip/noticias_infocip/upd_view', $campos);
         $data['Curso']=$this->noticias_infocip_model->CursoCbo(); 
    }

    function NoticiasInfocipGet($nNotCodigo = null) {
        $query = $this->noticias_infocip_model->NoticiasInfocipGet($nNotCodigo);
        if ($query) {
            $noticia['nNotCodigo'] = $this->noticias_infocip_model->getNNotCodigo();
            $noticia['cNotFechaFinal'] = $this->noticias_infocip_model->getCNotFechaFinal();
            $noticia['cNotTitulo'] = $this->noticias_infocip_model->getCNotTitulo();
            $noticia['cNotSumilla'] = $this->noticias_infocip_model->getCNotSumilla();
            $noticia['Multimedia'] = $this->noticias_infocip_model->getMultimedia();
            $noticia['cNotContenido'] = $this->noticias_infocip_model->getCNotContenido();
            $noticia['CursoCbo'] = $this->noticias_infocip_model->getCurso();
            return $noticia;
        } else {
            return false;
        }
    }

    function NoticiasInfocipUpd() {
        $this->form_validation->set_rules('hid_upd_nNotCodigo', 'nNotCodigo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_noticiasinfocip_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_upd_noticiasinfocip_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_noticiasinfocip_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_upd_noticiasinfocip_contenido', 'Contenido');

        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->noticias_infocip_model->setNNotCodigo($this->input->post('hid_upd_nNotCodigo'));
            $this->noticias_infocip_model->setCNotFechaFinal($this->input->post('txt_upd_noticiasinfocip_fecha'));
            $this->noticias_infocip_model->setCNotTitulo($this->input->post('txt_upd_noticiasinfocip_titulo'));
            $this->noticias_infocip_model->setCNotSumilla($this->input->post('txt_upd_noticiasinfocip_sumilla'));
            $this->noticias_infocip_model->setCNotContenido($this->input->post('txt_upd_noticiasinfocip_contenido'));
            $result = $this->noticias_infocip_model->NoticiasInfocipUpd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->index();
        }
    }

    function NoticiasInfocipDel($nNotCodigo = null) {
        $this->noticias_infocip_model->setNNotCodigo($nNotCodigo);
        $result = $this->noticias_infocip_model->NoticiasInfocipDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    
     function MultimediaDel($nMultCodigo = null) {
        $this->noticias_infocip_model->setNMultCodigo($nMultCodigo);
        $result = $this->noticias_infocip_model->MultimediaDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function noticiasUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/portal_infocip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "�?", "É", "�?", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->noticias_infocip_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->noticias_infocip_model->setMultimedia($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->noticias_infocip_model->noticiasempresarialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }
        function noticiasUploadPdf() {
        if (!empty($_FILES)) {
            $ruta = "uploads/portal_infocip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "�?", "É", "�?", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->noticias_infocip_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->noticias_infocip_model->setCMultLink($nombreArchivox);
            
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->noticias_infocip_model->noticiasempresarialUploadPdf();
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
