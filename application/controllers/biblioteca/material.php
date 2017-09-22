<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Material extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/material_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->db_biblioteca = $this->load->database("bdbiblioteca", TRUE);
    }

    function index() {

$this->loaders->verificaAcceso('W');
        $data['capitulos'] = $this->material_model->CapituloCbo();
        $data['titulo'] = 'Registro de Material Bibliografico';
        $this->load->view("biblioteca/material/panel_view", $data);
    }

    function UniversidadCbo() {
        $result = $this->material_model->UniversidadCbo();
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }

    function cboUniversidadGet() {
        $result = $this->material_model->get_s_cbo_universidad();
        if ($result) {
            echo $result;
        } else {
            echo "vacio";
        }
    }

    //UPLOAD
    function materialUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/biblioteca/tesis/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->material_model->setNMatId($this->input->post('hid_upload_nMatId'));
            $this->material_model->setMultimedia($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->materialUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    function material_multpdfAbstract() {
        if (!empty($_FILES)) {
            $ruta = "uploads/biblioteca/abstract/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->material_model->setNMatId($this->input->post('hid_upload_nMatId'));
            $this->material_model->setMultimedia($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->material_multpdfAbstract();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    function material_multpdf() {
        if (!empty($_FILES)) {
            $ruta = "uploads/biblioteca/tesis/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
//            $this->material_model->setNMatId($this->input->post('hid_upload_nMatId'));
            $this->material_model->setMultimedia($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->material_multpdf();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    function libroUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->material_model->setNMatIdLibro($this->input->post('hid_upload_nMatId_lib'));
            $this->material_model->setMultimedialibro($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->libroUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    function libroinsUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
//            $this->material_model->setNMatIdLibro($this->input->post('hid_upload_nMatId_lib'));
            $this->material_model->setMultimedialibro($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->libroinsUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    function revistaUpload() {
        if (!empty($_FILES)) {
            $ruta = "uploads/cip/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['Filedata']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $this->material_model->setNMatIdRevista($this->input->post('hid_upload_nMatId_rev'));
            $this->material_model->setMultimediarev($nombreArchivox);

            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $result = $this->material_model->revistaUpload();
                if ($result) {
                    echo 1; //EXITO
                } else {
                    echo 0; //ERROR
                }
            }
        }
    }

    //LOAD DE LIBROS

    function load_list_libro($parametros = null) {
        $this->load->view('biblioteca/material/qry_view_libro', $parametros);
    }

    //LOAD DE TESIS
    function load_list_material($parametros = null) {
        $this->load->view('biblioteca/material/qry_view', $parametros);
    }

    function load_listar_view_MaterialMultimedia($nMatId) {
        $data['bandeja'] = $this->material_model->MaterialMultimediaqry($nMatId);
        $this->load->view('biblioteca/material/qry_view_multimedia', $data);
    }

    //LOAD DE reviasta
    function load_list_revista($parametros = null) {
        $this->load->view('biblioteca/material/qry_view_revista', $parametros);
    }

    function load_listar_view_revistaMultimedia($nMatId) {
        $data['bandeja'] = $this->material_model->revistaMultimediaqry($nMatId);
        $this->load->view('biblioteca/material/qry_view_revista_multimedia', $data);
    }
    
      function load_listar_view_sinmultimedia() {
        $data['sinmultimedia'] = $this->material_model->SinMultimediaqry();
        $this->load->view('biblioteca/material/qry_view_lista_multimedia',$data);
    }
    
     function load_listar_view_sinmultimedia_libro() {
        $data['sinmultimedialib'] = $this->material_model->SinMultimedialibqry();
        $this->load->view('biblioteca/material/qry_view_sinmult_lib',$data);
    }
    
     function load_listar_view_sinmultimedia_revista() {
        $data['sinmultimediarev'] = $this->material_model->SinMultimediarevqry();
        $this->load->view('biblioteca/material/qry_view_sinmult_rev',$data);
    }

    /////////LISTAR TESIS/////////////////////////77777


    function materialQry($codigo = null, $autor = null, $titulo = null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Vista Previa" => "newwin",
            "Eliminar" => "trash",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'material_model',
                    'metodo' => 'materialQry',
                    'criterios' => array(
                        'codigo' => $codigo,
                        'especialidad' => $autor,
                        'titulo' => $titulo),
                    'pkid' => 'nMatId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'cMatTipo', 'cMatcodigo', 'cMatTitulo', 'descesp', 'cMatAutor', 'opcion'
                    ),
                )
        );
    }

    /////////////////LISTAR LIBRO///////////////////////
    function libroQry($titulo = null, $autor = null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Vista Previa" => "newwin",
            "Eliminar" => "trash",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'material_model',
                    'metodo' => 'libroQry',
                    'criterios' => array(
                        'titulo' => $titulo,
                        'autor' => $autor),
                    'pkid' => 'nMatId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'cMatTitulo', 'cMatAutor', 'cMatEditorial', 'cMatEdicion', 'opcion'
                    ),
                )
        );
    }

    /////////////////LISTAR REVISTA///////////////////////
    function revistaQry($titulo = null, $editorial = null, $categoria = null) {
        $opcionesGrid = array(
            "Editar" => "pencil",
            "Vista Previa" => "newwin",
            "Eliminar" => "trash",
            "Multimedia" => "folder-collapsed",
        );
        echo $this->jqgrid->get_DatosGrid(
                array(
                    'modelo' => 'material_model',
                    'metodo' => 'revistaQry',
                    'criterios' => array(
                        'titulo' => $titulo,
                        'editorial' => $editorial,
                        'categoria' => $categoria),
                    'pkid' => 'nMatId',
                    'opciones' => json_encode($opcionesGrid),
                    'columns' => array(
                        'cMatTitulo', 'cMatAutor', 'cMatEditorial', 'cMatEdicion', 'cMatCategoria', 'opcion'
                    ),
                )
        );
    }

    // end listar   

    public function llena_especialidades() {
        $options = "";
        if ($this->input->post('capitulos')) {
            $capitulos = $this->input->post('capitulos');
            $especialidades = $this->material_model->especialidades($capitulos);
            $filas2[''] = 'Selecciona una especialidad';
            foreach ($especialidades as $fila) {
                $filas2[$fila->codesp] = $fila->descesp;
            }
            echo form_dropdown('especialidad', $filas2, '', 'id="especialidad" class="input-medium tip" style="width:260px;" data-original-title="Selecione especialidad" data-placement="right"');
        }
    }

    function materialins() {

        $this->material_model->setTipomat($this->input->post('hid_tipo'));
        $this->material_model->setTipomat2($this->input->post('hid_tipo2'));
        $this->material_model->setTipomat3($this->input->post('hid_tipo3'));
        $this->material_model->setTitulo($this->input->post('txt_ins_mat_titulo'));
        $this->material_model->setAut($this->input->post('txt_ins_mat_autor'));
        $this->material_model->setCapitulo($this->input->post('capitulos'));
        $this->material_model->setEspecialidad($this->input->post('especialidad'));
        $this->material_model->setUniversidad($this->input->post('cbo_ins_mat_univer'));
        $this->material_model->setAno($this->input->post('cbo_anos'));
        $this->material_model->setResumen($this->input->post('txt_ins_mat_resumen'));
        $this->material_model->setObservacion($this->input->post('txt_ins_mat_observacion'));


        $this->material_model->setTitulolib($this->input->post('txt_ins_lib_titulo'));
        $this->material_model->setAutlibro($this->input->post('txt_ins_lib_autor'));
        $this->material_model->setEditoriallib($this->input->post('txt_ins_lib_editorial'));
        $this->material_model->setEdicionlib($this->input->post('cbo_edicion_libro'));
        $this->material_model->setCategorialib($this->input->post('cbo_categoria_lib'));
        $this->material_model->setResumenlib($this->input->post('txt_ins_lib_resumen'));
        $this->material_model->setObservacionlib($this->input->post('txt_ins_lib_observacion'));
        $this->material_model->setEjemplareslib($this->input->post('txt_ins_lib_ejemplares'));

        $this->material_model->setTitulorev($this->input->post('txt_ins_rev_titulo'));
        $this->material_model->setAutrevista($this->input->post('txt_ins_rev_autor'));
        $this->material_model->setEditorialrev($this->input->post('txt_ins_rev_editorial'));
        $this->material_model->setEdicionrev($this->input->post('cbo_edicion_revista'));
        $this->material_model->setCategoriarev($this->input->post('cbo_categoria_rev'));
        $this->material_model->setResumenrev($this->input->post('txt_ins_rev_resumen'));
        $this->material_model->setObservacionrev($this->input->post('txt_ins_rev_observacion'));
        $this->material_model->setEjemplaresrev($this->input->post('txt_ins_rev_ejemplares'));

        $resul = $this->material_model->materialins();
        if ($resul) {
            echo 1;
            exit;
        } else {
            echo 0;
            exit;
        }
       
    }

    function ajax() {
        if ($buscar = $this->input->get('term')) {
//			$this->db_biblioteca->select('regcol, apecol as value');
//			$this->db_biblioteca->like('apecol', $buscar); 
//			$query=$this->db_biblioteca->get('colegiado2');
            $colegiados = $this->material_model->colegiados($buscar);
//                      $query=$this->db_biblioteca->query("select regcol,concat(apecol,' ',apematcol,' ',nomcol)as value

//                                                                                        from colegiado2 where apecol like '%$buscar%'");

            if ($colegiados->num_rows() > 0) {
                foreach ($colegiados->result_array() as $row) {
                    $result[] = $row;
                }
            }
            echo json_encode($result);
        }
    }

    function popupEditarMaterial($nMatId) {
        $campos = $this->materialGet($nMatId);
        $campos['capitulos'] = $this->material_model->CapituloCbo();
        $campos['especialidad'] = $this->material_model->EspecialidadCbo();
        $this->load->view('biblioteca/material/upd_view', $campos);
    }

    function popupVistaPreviaTesis($nMatId) {
        $campos = $this->materialGet($nMatId);
        $this->load->view('biblioteca/material/vista_previa', $campos);
    }

    function popupDetalleTesis($nMatId) {
        $campos = $this->materialGet($nMatId);
        $this->load->view('biblioteca/reserva_usuario/detalle_tesis', $campos);
    }

    function popupDetalleLibro($nMatId) {
        $campos = $this->libroGet($nMatId);
        $this->load->view('biblioteca/reserva_usuario/detalle_libro', $campos);
    }

    function popupUpload($nMatId) {

        $campos = $this->materialGet($nMatId);
        $this->load->view('biblioteca/material/upload_tesis', $campos);
    }
    
     function popupUploadMult($nMatId) {
        $campos = $this->materialGet($nMatId);
        $this->load->view('biblioteca/material/upload_multimedia', $campos);
    }


    function popupUpload_libro($nMatId) {

        $campos = $this->libroGet($nMatId);
        $this->load->view('biblioteca/material/upload_libro', $campos);
    }

    function popupUpload_revista($nMatId) {

        $campos = $this->revistaGet($nMatId);
        $this->load->view('biblioteca/material/upload_revista', $campos);
    }

    function materialGet($nMatId) {
        $query = $this->material_model->materialGet($nMatId);
        if ($query) {

            $material['nMatId'] = $this->material_model->getNMatId();
            $material['tipo'] = $this->material_model->getTipomat();
            $material['titulo'] = $this->material_model->getTitulo();
            $material['autor'] = $this->material_model->getAut();
            $material['capitulo'] = $this->material_model->getCapitulo();
            $material['capituloDescrip'] = $this->material_model->getCapituloDescripcion();
            $material['espDescrip'] = $this->material_model->getEspecialidadDescripcion();
            $material['especialidades'] = $this->material_model->getEspecialidad();
            $material['universidad'] = $this->material_model->get_s_cbo_universidad();
            $material['universidadcod'] = $this->material_model->getUniversidad();
            $material['universidaddesc'] = $this->material_model->getUniversidadDescripcion();
            $material['ano'] = $this->material_model->getAno();
            $material['resumen'] = $this->material_model->getResumen();
            $material['observacion'] = $this->material_model->getObservacion();
            $material['multimedia'] = $this->material_model->getMultimedia();
            $material['multimedialin'] = $this->material_model->getMultlink();
            $material['estado'] = $this->material_model->getEstado_mat();
            return $material;
        } else {
            return false;
        }
    }

    function materialUpd() {
        $this->form_validation->set_rules('txt_upd_mat_titulo', 'Titulo', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->material_model->setTitulo($this->input->post('txt_upd_mat_titulo'));
            $this->material_model->setAut($this->input->post('txt_upd_mat_autor'));
            $this->material_model->setCapitulo($this->input->post('capitulos_upd'));
            $this->material_model->setEspecialidad($this->input->post('especialidad_upd'));
            $this->material_model->setUniversidad($this->input->post('universidad'));
            $this->material_model->setAno($this->input->post('cbo_anos'));
            $this->material_model->setResumen($this->input->post('txt_upd_mat_resumen'));
            $this->material_model->setObservacion($this->input->post('txt_upd_mat_observacion'));
            $this->material_model->setNMatId($this->input->post('hid_upd_cur_idMaterial'));
            $resul = $this->material_model->materialUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }

    ///EDITAR LIBROS //////////////////


    function popupEditarLibro($nMatId) {
        $campos = $this->libroGet($nMatId);
        $this->load->view('biblioteca/material/upd_view_libro', $campos);
    }

    function libroGet($nMatId) {
        $query = $this->material_model->libroGet($nMatId);
        if ($query) {

            $libro['nMatId'] = $this->material_model->getNMatIdLibro();
            $libro['titulo'] = $this->material_model->getTitulolib();
            $libro['autor'] = $this->material_model->getAutlibro();
            $libro['editorial'] = $this->material_model->getEditoriallib();
            $libro['edicion'] = $this->material_model->getEdicionlib();
            $libro['categoriaUpd'] = $this->material_model->getCategorialib();
            $libro['resumen'] = $this->material_model->getResumenlib();
            $libro['observacion'] = $this->material_model->getObservacionlib();
            $libro['ejemplares'] = $this->material_model->getEjemplareslib();
            $libro['multimedialibro'] = $this->material_model->getMultimedialibro();
            $libro['estado'] = $this->material_model->getLibro_est();


            return $libro;
        } else {
            return false;
        }
    }

    function libroUpd() {
        $this->form_validation->set_rules('txt_upd_lib_titulo', 'Titulo', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->material_model->setTitulolib($this->input->post('txt_upd_lib_titulo'));
            $this->material_model->setAutlibro($this->input->post('txt_upd_lib_autor'));
            $this->material_model->setEditoriallib($this->input->post('txt_upd_lib_editorial'));
            $this->material_model->setEdicionlib($this->input->post('cbo_upd_lib_edicion'));


            $this->material_model->setCategorialib($this->input->post('cbo_categoria_upd_lib'));
            $this->material_model->setResumenlib($this->input->post('txt_upd_lib_resumen'));
            $this->material_model->setObservacionlib($this->input->post('txt_upd_lib_observacion'));
            $this->material_model->setEjemplareslib($this->input->post('txt_upd_lib_ejemplares'));


            $this->material_model->setNMatIdLibro($this->input->post('hid_upd_cur_idLibro'));


            $resul = $this->material_model->libroUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }

    function popupVistaPrevia_libro($nMatId) {
        $campos2 = $this->libroGet($nMatId);
        $this->load->view('biblioteca/material/vista_previa_libro', $campos2);
    }

    //ELIMINAR LIBRO///

    function libroDel($nMatId) {
        $this->material_model->setNMatIdLibro($nMatId);
        $result = $this->material_model->libroDel();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    ///EDITAR REVISTA //////////////////


    function popupEditarRevista($nMatId) {
        $campos = $this->revistaGet($nMatId);
        // $campos['cbouniversidad'] = $this->material_model->UniversidadCbo();
        $this->load->view('biblioteca/material/upd_view_revista', $campos);
    }

    function popupVistaPreviaRevista($nMatId) {
        $campos = $this->revistaGet($nMatId);
        $this->load->view('biblioteca/material/vista_previa_revista', $campos);
    }

    function revistaGet($nMatId) {
        $query = $this->material_model->revistaGet($nMatId);
        if ($query) {

            $revista['nMatId'] = $this->material_model->getNMatIdRevista();
            $revista['titulo'] = $this->material_model->getTitulorev();
            $revista['autor'] = $this->material_model->getAutrevista();
            $revista['editorial'] = $this->material_model->getEditorialrev();
            $revista['edicion'] = $this->material_model->getEdicionrev();
            //AGREGADO
            $revista['categoriaUpd'] = $this->material_model->getCategoriarev();
            $revista['resumen'] = $this->material_model->getResumenrev();
            $revista['observacion'] = $this->material_model->getObservacionrev();
            $revista['ejemplares'] = $this->material_model->getEjemplaresrev();
            $revista['multimediarevista'] = $this->material_model->getMultimediarev();


            return $revista;
        } else {
            return false;
        }
    }

    function MultimediaDel($nMatId = null) {
        $this->material_model->setNMultCodigo($nMatId);
        $result = $this->material_model->MultimediaDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    function revistaUpd() {
        $this->form_validation->set_rules('txt_upd_rev_titulo', 'Titulo', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->material_model->setTitulolib($this->input->post('txt_upd_rev_titulo'));
            $this->material_model->setAutlibro($this->input->post('txt_upd_rev_autor'));
            $this->material_model->setEditoriallib($this->input->post('txt_upd_rev_editorial'));
            $this->material_model->setEdicionlib($this->input->post('cbo_upd_rev_edicion'));


            $this->material_model->setCategorialib($this->input->post('cbo_categoria_upd_rev'));
            $this->material_model->setResumenlib($this->input->post('txt_upd_rev_resumen'));
            $this->material_model->setObservacionlib($this->input->post('txt_upd_rev_observacion'));
            $this->material_model->setEjemplareslib($this->input->post('txt_upd_rev_ejemplares'));


            $this->material_model->setNMatIdLibro($this->input->post('hid_upd_cur_idRevista'));


            $resul = $this->material_model->revistaUpd();
            if ($resul) {
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        } else {
            $this->index();
        }
    }

    //ELIMINAR REVISTA///

    function revistaDel($nMatId) {
        $this->material_model->setNMatIdRevista($nMatId);
        $result = $this->material_model->revistaDel();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function tesisDel($nMatId) {
        $this->material_model->setNMatId($nMatId);
        $result = $this->material_model->tesisDel();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

}

?>