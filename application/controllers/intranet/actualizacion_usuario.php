<?php

class Actualizacion_usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/actualizacion_usu_model');
        $this->load->model('colegiado/colegiado_model');
        $this->load->model('usuarioexterno/ubigeo_model');
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
    }
    function index() {
        $this->load_frm_usuario('juliogerardo');
    }
     function load_frm_usuario($str) {
        $query = $this->actualizacion_usu_model->usuarioDataUpd($str);
       
        if ($query) {
            
            $datos['nombre'] = $this->actualizacion_usu_model->getNombre();
            $datos['apepat'] = $this->actualizacion_usu_model->getApepat();
            $datos['apemat'] = $this->actualizacion_usu_model->getApemat();
            $datos['fecnac'] = $this->actualizacion_usu_model->getFecnac();
            $datos['sexo'] = $this->actualizacion_usu_model->getSexo();
            $datos['departamento'] = $this->actualizacion_usu_model->getDepartamento();
            $datos['provincia'] = $this->actualizacion_usu_model->getProvincia();
            $datos['distrito'] = $this->actualizacion_usu_model->getDistrito();
            $datos['dni'] = $this->actualizacion_usu_model->getDni();
            $datos['email'] = $this->actualizacion_usu_model->getEmail();
            $datos['direccion'] = $this->actualizacion_usu_model->getDireccion();
            $datos['telefono'] = $this->actualizacion_usu_model->getTelefono();
            $datos['celular'] = $this->actualizacion_usu_model->getCelular();
            $datos['nperid'] = $this->actualizacion_usu_model->getNperid();
            $datos['estadocivil'] = $this->actualizacion_usu_model->getEstadocivil();
            
            $datos['departamentos']= $this->ubigeo_model->DatosUbigeo('','');
            $datos['provincias']= $this->ubigeo_model->DatosUbigeo($this->actualizacion_usu_model->getDepartamento(),'');
            $datos['distritos']= $this->ubigeo_model->DatosUbigeo($this->actualizacion_usu_model->getDepartamento(),$this->actualizacion_usu_model->getProvincia());
            
            $datos['titulo'] = 'Actualización Usuario Externo';
            $this->load->view('intranet/actualizacion_usuario/panel_view', $datos);
        } else {
            $this->load->view('intranet/actualizacion_usuario/panel_view');
        }
    }

        function DatosUsuarioIntUpd() {
 
            $this->actualizacion_usu_model->setNombre($this->input->post('txt_upd_nombre'));
            $this->actualizacion_usu_model->setApepat($this->input->post('txt_upd_apepat'));
            $this->actualizacion_usu_model->setApemat($this->input->post('txt_upd_apemat'));
            $this->actualizacion_usu_model->setCelular($this->input->post('txt_upd_celular'));
            $this->actualizacion_usu_model->setTelefono($this->input->post('txt_upd_telefono'));
            $this->actualizacion_usu_model->setDireccion($this->input->post('txt_upd_direccion'));
            $this->actualizacion_usu_model->setFecnac($this->input->post('txt_upd_fecnac'));
            $this->actualizacion_usu_model->setEmail($this->input->post('txt_upd_email'));
            $this->actualizacion_usu_model->setSexo($this->input->post('cbo_upd_col_sexo'));
            $this->actualizacion_usu_model->setEstadocivil($this->input->post('cbo_ins_estado_civil'));
            $this->actualizacion_usu_model->setDepartamento($this->input->post('Departamentos'));
            $this->actualizacion_usu_model->setProvincia($this->input->post('Provincia'));
            $this->actualizacion_usu_model->setDistrito($this->input->post('Distrito'));
            $this->actualizacion_usu_model->setNperid($this->input->post('txt_hd_nperid'));
            $result = $this->actualizacion_usu_model->DatosUsuarioIntUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }

    }
    
     function Lleno_combos($idd,$pid)
    {
//         $idd = $this->input->post('idd');
//         $pid = $this->input->post('pid');
         $result = $this->ubigeo_model->DatosUbigeo($idd,$pid);
         if($result){
            foreach ($result as $fila) {
            ?>
            <option value="<?=$fila->idubigeo?>"><?=$fila->cUbiDescripcion?></option>
            <?php
            }
        } else {
            return false;
        }
    }
    function ValidarEmail($cod) {
        $bDni = $this->actualizacion_usu_model->ValidarEmail($this->input->post('txt_upd_email'),$cod);
        if ($bDni) {
                echo "true";
            } else {
                echo "false";
            }
    }
     function ValidarFechaNac() {
        $txtfecnac = $this->input->post('txt_upd_fecnac');
        $year_ingresado=explode('/',$txtfecnac);
        $year=$year_ingresado[2];
        $hoy = date('Y');
        $mayor = $hoy - 6; //1993
            if ($year > $mayor) {
                echo "false";
            }
            else{
                echo "true";
            }
    }

}
?>
 