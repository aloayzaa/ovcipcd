<?php

class Actualizacion_usuarioexterno extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/actualizacion_usue_model');
        $this->load->model('colegiado/colegiado_model');
        $this->load->model('intranet/ubigeo_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    function index() {
$this->loaders->verificaAcceso('W');
        $this->load_frm_upd_colegiado($this->session->userdata('nick'));
    }
     function load_frm_upd_colegiado($str) {
        $query = $this->actualizacion_usue_model->usuarioDataUpd($str);  
        if ($query) {       
            $datos['dni'] = $this->actualizacion_usue_model->getDni();
            $datos['apellidopat'] = $this->actualizacion_usue_model->getApellidopat();
            $datos['apellidomat'] = $this->actualizacion_usue_model->getApellidomat();
            $datos['nombres'] = $this->actualizacion_usue_model->getNombres();
            $datos['fecnac'] = $this->actualizacion_usue_model->getFecnac();
            $datos['sexo'] = $this->actualizacion_usue_model->getSexo();
            $datos['ecivil']= $this->actualizacion_usue_model->getEstadocivil();
            $datos['estadocivil']= $this->actualizacion_usue_model->Datoscivil();            
            $datos['email'] = $this->actualizacion_usue_model->getEmail();
            $datos['telefono'] = $this->actualizacion_usue_model->getTelefono();
            $datos['celular'] = $this->actualizacion_usue_model->getCelular();
            $datos['departamento'] = $this->actualizacion_usue_model->getDepartamento();
            $datos['provincia'] = $this->actualizacion_usue_model->getProvincia();
            $datos['distrito'] = $this->actualizacion_usue_model->getDistrito();
            $datos['direccion'] = $this->actualizacion_usue_model->getDireccion();
            $datos['departamento'] = $this->ubigeo_model->ubigeo_usuarioexterno(1,0,0);
            $datos['provincia'] = $this->ubigeo_model->ubigeo_usuarioexterno(2,$this->actualizacion_usue_model->getDepartamento(),0);
            $datos['distrito'] = $this->ubigeo_model->ubigeo_usuarioexterno(3,$this->actualizacion_usue_model->getDepartamento(),$this->actualizacion_usue_model->getProvincia());
            $datos['coddepartamento'] = $this->actualizacion_usue_model->getDepartamento();
            $datos['codprovincia'] = $this->actualizacion_usue_model->getProvincia();
            $datos['coddistrito'] = $this->actualizacion_usue_model->getDistrito();

            $datos['titulo'] = 'Actualización de Datos Usuario Externo';
            $this->load->view('intranet/actualizacion_usuarioe/panel_view', $datos);
        } else {
             $this->load->view('intranet/actualizacion_usuarioe/panel_view', $datos);
        }
    }

    function DatosUsuarioUpd() {
            $this->actualizacion_usue_model->setUsuario($this->input->post('hid_upd_regcol'));
            $this->actualizacion_usue_model->setDireccion($this->input->post('txt_upd_col_direccion'));
            $this->actualizacion_usue_model->setEmail($this->input->post('txt_upd_col_email'));
            $this->actualizacion_usue_model->setTelefono($this->input->post('txt_upd_col_telefono'));
            $this->actualizacion_usue_model->setCelular($this->input->post('txt_upd_col_celular'));
            $this->actualizacion_usue_model->setNombres($this->input->post('txt_upd_col_nombres'));
            $this->actualizacion_usue_model->setApellidopat($this->input->post('txt_upd_col_apellidopat'));
            $this->actualizacion_usue_model->setApellidomat($this->input->post('txt_upd_col_apellidomat'));
            $this->actualizacion_usue_model->setFecnac($this->input->post('txt_ins_col_fecnac'));
            $this->actualizacion_usue_model->setSexo($this->input->post('cbo_upd_col_sexo'));
            $this->actualizacion_usue_model->setEstadocivil($this->input->post('cbo_ins_estado_civil'));
            $this->actualizacion_usue_model->setDepartamento($this->input->post('Departamentos'));
            $this->actualizacion_usue_model->setProvincia($this->input->post('Provincia'));
            $this->actualizacion_usue_model->setDistrito($this->input->post('Distrito'));
            $result = $this->actualizacion_usue_model->DatosColegiadoUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
    }
        function ValidarEmail() {
        $bDni = $this->actualizacion_usue_model->ValidarEmail($this->input->post('txt_upd_col_email'),$this->input->post('codigo'));
        if ($bDni) {
                echo "true";
            } else {
                echo "false";
            }
    }
    
      function Lleno_combos()
    {
         $result = $this->actualizacion_usue_model->DatosUbigeo($this->input->post('idd'),$this->input->post('pid'));
         if($result){
            foreach ($result as $fila) {
            ?>
            <option value="<?php echo $fila->idubigeo?>"><?php echo $fila->cUbiDescripcion?></option>
            <?php
            }
        } else {
            return false;
        }
    }
   
    }
?>