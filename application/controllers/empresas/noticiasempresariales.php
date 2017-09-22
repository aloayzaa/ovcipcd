<?php

class Noticiasempresariales extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('empresas/noticiasempresarial_model');
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Noticias Empresariales';
        $data['evento']=$this->noticiasempresarial_model->cargar_combo();
        $data['TNoticias']=$this->noticiasempresarial_model->tipo_noticia();
        $this->load->view('empresas/noticiasempresarial/panel_view', $data);
    }

    function load_listar_view_noticias() {

        $this->load->view('empresas/noticiasempresarial/qry_view');
    }

//    function NoticiasEmpresarialQry($cPerNombres = 'a', $Ruc = 'a', $Rubro = 'a') {
    function NoticiasEmpresarialQry($criterio = null) {
//        $accion = 'b';
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Eliminar" => "trash",
            "Vista Previa" => "newwin",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'noticiasempresarial_model',
                    'metodo' => 'NoticiasEmpresarialQry',
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
    
    function NoticiasEmpresarialIns() {
        $this->form_validation->set_rules('txt_ins_notempre_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_ins_notempre_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_ins_notempre_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_ins_notempre_contenido', 'Contenido', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->noticiasempresarial_model->setCNotFechaFinal($this->input->post('txt_ins_notempre_fecha'));
            $this->noticiasempresarial_model->setCNotTitulo($this->input->post('txt_ins_notempre_titulo'));
            $this->noticiasempresarial_model->setCNotSumilla($this->input->post('txt_ins_notempre_sumilla'));
            $this->noticiasempresarial_model->setCNotContenido($this->input->post('txt_ins_notempre_contenido'));
            $this->noticiasempresarial_model->setNNotPublicacion( $this->input->post('cbo_ins_notempre_evento'));
            $tiponoticia=$this->input->post('cbo_tnoticia');
            if($tiponoticia!=17){
              $this->noticiasempresarial_model->setNNotPublicacion("");  
            }
                       
            $result = $this->noticiasempresarial_model->NoticiasEmpresarialIns($tiponoticia);
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
        $campos = $this->NoticiasEmpresarialGet($nNotCodigo);
        $this->load->view('empresas/noticiasempresarial/upload_multimedia', $campos);
    }

    function popupNoticiasEmpresarial($nNotCodigo) {
        $campos = $this->NoticiasEmpresarialGet($nNotCodigo);

        $this->load->view('empresas/noticiasempresarial/upd_view', $campos);
    }

    function NoticiasEmpresarialGet($nNotCodigo = null) {
        $query = $this->noticiasempresarial_model->NoticiasEmpresarialGet($nNotCodigo);
        if ($query) {
            $noticia['nNotCodigo'] = $this->noticiasempresarial_model->getNNotCodigo();
            $noticia['cNotFechaFinal'] = $this->noticiasempresarial_model->getCNotFechaFinal();
            $noticia['cNotTitulo'] = $this->noticiasempresarial_model->getCNotTitulo();
            $noticia['cNotSumilla'] = $this->noticiasempresarial_model->getCNotSumilla();
            $noticia['Multimedia'] = $this->noticiasempresarial_model->getMultimedia();
            $noticia['cNotContenido'] = $this->noticiasempresarial_model->getCNotContenido();
            return $noticia;
        } else {
            return false;
        }
    }

    function NoticiasEmpresarialUpd() {
        $this->form_validation->set_rules('hid_upd_nNotCodigo', 'nNotCodigo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_notempre_fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('txt_upd_notempre_titulo', 'Titulo', 'required|trim');
        $this->form_validation->set_rules('txt_upd_notempre_sumilla', 'Sumilla', 'required|trim');
        $this->form_validation->set_rules('txt_upd_notempre_contenido', 'Contenido');

        $this->form_validation->set_message('required', 'El %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->noticiasempresarial_model->setNNotCodigo($this->input->post('hid_upd_nNotCodigo'));
            $this->noticiasempresarial_model->setCNotFechaFinal($this->input->post('txt_upd_notempre_fecha'));
            $this->noticiasempresarial_model->setCNotTitulo($this->input->post('txt_upd_notempre_titulo'));
            $this->noticiasempresarial_model->setCNotSumilla($this->input->post('txt_upd_notempre_sumilla'));
            $this->noticiasempresarial_model->setCNotContenido($this->input->post('txt_upd_notempre_contenido'));
            $result = $this->noticiasempresarial_model->NoticiasEmpresarialUpd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->index();
        }
    }

    function NoticiasEmpresarialDel($nNotCodigo = null) {
        $this->noticiasempresarial_model->setNNotCodigo($nNotCodigo);
        $result = $this->noticiasempresarial_model->NoticiasEmpresarialDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function noticiasempresarialUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/',$ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->noticiasempresarial_model->setNNotCodigo($this->input->post('hid_upload_nNotCodigo'));
            $this->noticiasempresarial_model->setMultimedia($nombreArchivox);
          
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->noticiasempresarial_model->noticiasempresarialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

}
    function empadronadoUpdMultimedia() {
        $nNotCodigo = $this->input->post('nNotCodigo');
        $query = $this->noticiasempresarial_model->NoticiasEmpresarialGet($nNotCodigo);
        if ($query) {
            $empadronamiento['nNotCodigo'] = $this->noticiasempresarial_model->getNNotCodigo();
            $empadronamiento['Multimedia'] = $this->noticiasempresarial_model->getMultimedia();
            echo "<script>$(function(){ $('#fotoempadronado').prettyPhoto({overlay_gallery:false});})</script>";
            echo "<a title='Foto actual' href='../uploads/cip/" . $empadronamiento['Multimedia'] . "' id='fotoempadronado'><img src='../uploads/cip/" . $empadronamiento['Multimedia'] . "'  width='100' height='100' /></a>";
            }
    }

