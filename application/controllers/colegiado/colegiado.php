<?php

class colegiado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('intranet/ubigeo_model');
        $this->load->model('colegiado/colegiado_model');
        $this->load->model('intranet/actualizacion_col_model');
              $this->load->model('intranet/actualizacion_usue_model');
//        $this->load->model('objeto_model', 'objObjeto'); // menu
    }

    function index() {
$this->loaders->verificaAcceso('W');
        $data['titulo'] = 'Registro de Actualización de Datos Colegiado';
        $this->load->view('colegiado/panel_view', $data);
    }

     function colegiadoData($cip,$tipo) {
        $query = $this->colegiado_model->colegiadoData($cip,$tipo);
        $query1 = $this->colegiado_model->colegiadoFechaUpd($cip);
        if ($query or $query1) {
            $result1['regcol'] = $this->colegiado_model->getRegcol();
            $result2['nombre'] = $this->colegiado_model->getnombre();
            $result3['fechaingreso'] = $this->colegiado_model->getFechaingreso();
                        $result4['tipo'] = $this->colegiado_model->getTipo();
                         $result5['lecol'] = $this->colegiado_model->getlecol();
            $result = "";
            $result .= '<legend>Datos del Colegiado</legend>';
            $result .= '<fieldset>';
            $result .= '<table>';
            $result .= '<tbody>';
            $result.='<tr>';
            if (file_exists(FCPATH . "fotos/" . $result1['regcol'] . ".jpg")) {
                $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="http://www.cip-trujillo.org/ovcipcdll/fotos/' . $result1['regcol'] . '.jpg" style="border-radius: 10px;border: 3px solid #999999;" width="105" height="115"></td>';
            } else {
                $result.='<td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="http://www.cip-trujillo.org/ovcipcdll/fotos/nofoto.jpg"  width="105" height="115"></td>';
            }
           $result.='<td style="vertical-align:top;">';
            $result.='<table cellpadding="2" cellspacing="0">';
            $result.='<tbody>';
            $result.='<tr>';
            $result.='<td><b>Nombres</b></td>';
            $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $result2['nombre'] . '</td>';
            $result.='</tr>';
         if($result4['tipo']=='colegiado'){
                        $result.='<tr>';
        $result.='<td><b>Nro CIP</b></td>';
                    $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $result1['regcol'] . '</td>';
                        $result.='</tr>';
                                                            $result.='<tr>';
                    $result.='<td><b>Nro DNI</b></td>';
                    $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $result5['lecol'] . '</td>';
                $result.='</tr>';
    } else{
          $result.='<tr>';
            $result.='<td><b>Nro DNI</b></td>';
                        $result.='<td><b>:</b></td>';
            $result.='<td style="padding-left:5px;">' . $result1['regcol'] . '</td>';
                        $result.='</tr>';
        }

            $result.='<tr>';
                        if ($result3['fechaingreso'] == '') {
                      if($result4['tipo']=='colegiado'){
                                    $result.='<td><b>Ultima Actualización</b></td>';
            $result.='<td><b>:</b></td>';
                $result.='<td style="padding-left:5px;"><b style="color:blue;">No se ha realizado actualización.</b></td>';
                      }else{
                                    $result.='<td><b>Importante</b></td>';
            $result.='<td><b>:</b></td>';
                $result.='<td style="padding-left:5px;"><b style="color:red;">Usted es un Usuario Externo.</b></td>';
                      }
            } else {
                                                    $result.='<td><b>Ultima Actualización</b></td>';
            $result.='<td><b>:</b></td>';
                $result.='<td style="padding-left:5px;">' . $result3['fechaingreso'] . '</td>';
            }
            $result.='</tr>';
            $result.='<td colspan="3" style="padding-top:10px;">';
            $result.="<div style='padding-bottom:6px;'>Desea actualizar al usuario:</div>";
            $result.="<input type='hidden' name='hid_id_empa_dni' id='hid_id_empa_dni' value='" . $result1['regcol'] . "'>";
             $result.="<input type='hidden' name='hid_id_tipo' id='hid_id_tipo' value='" . $result4['tipo'] . "'>";
            $result.="<input type='submit' name='btnactualizar' id='btnactualizar' value='Mostrar Datos' class='btn btn-primary'>";
            $result.= "</div>";
            $result.='</td>';
            $result.='</tr>';
            $result.='</tbody>';
            $result.='</table>';
            $result.='</td>';
            $result.='</tr>';
            $result.='</tbody>';
            $result .= '</table>';
            $result .= '</fieldset>';
            echo $result;
        } else {
            return false;
        }
    }

    function ValidarEmail() {
        $bDni = $this->actualizacion_col_model->ValidarEmail($this->input->post('txt_upd_col_emails'), $this->input->post('codigo'));
        if ($bDni) {
            echo "true";
        } else {
            echo "false";
        }
    }
     function ValidarEmailExt() {
           $bDni = $this->colegiado_model->ValidarEmailExt($this->input->post('txt_upd_col_email'), $this->input->post('codigo'));
        if ($bDni) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function LLena_combos() {
        $tipo = $this->input->post('tipo');
        $id = $this->input->post('id');
        $result = $this->ubigeo_model->get_s_cbo_tipodocumento($tipo, $id);
        if ($result) {
            ?>
            <option value="">Seleccionar</option>
            <?php
            foreach ($result as $fila) {
                ?>
                <option value="<?php echo $fila->codigo ?>"><?php echo $fila->descrip ?></option>
                <?php
            }
        } else {
            return false;
        }
    }
  function Llena_combosExt()
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
  function load_frm_upd_colegiado() {
     if ($this->input->post('tipo') == 'externo'){
  $query = $this->actualizacion_usue_model->usuarioDataUpdExt($this->input->post('regcol'));
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
            $this->load->view('colegiado/upd_persona_view', $datos);
        } else {
             $this->load->view('colegiado/upd_persona_view', $datos);
        }
       }else{
 $query = $this->actualizacion_col_model->colegiadoDataUpd($this->input->post('regcol'));
       
      if ($query) {
            $datos['regcol'] = $this->actualizacion_col_model->getRegcol();
            $datos['nomcol'] = $this->actualizacion_col_model->getNombre();
            $datos['apecol'] = $this->actualizacion_col_model->getApellidop();
            $datos['apematcol'] = $this->actualizacion_col_model->getApellidom();
            $datos['lecol'] = $this->actualizacion_col_model->getDni();
            $datos['sexcol'] = $this->actualizacion_col_model->getSexcol();
            $datos['colestcivil'] = $this->actualizacion_col_model->getColestcivil();
            $datos['fechanac'] = $this->actualizacion_col_model->getFecnaccol();
            $datos['direcol'] = $this->actualizacion_col_model->get_Direcol();
            $datos['email'] = $this->actualizacion_col_model->getEmail();
            $datos['emailsec'] = $this->actualizacion_col_model->getEmailsec();
            $datos['telcol'] = $this->actualizacion_col_model->getTelcol();
            $datos['celcol'] = $this->actualizacion_col_model->getCelcol();
            $datos['redpm'] = $this->actualizacion_col_model->getRedpm();
            $datos['redpc'] = $this->actualizacion_col_model->getRedpc();
            $datos['celuemp'] = $this->actualizacion_col_model->getCeluemp();
            $datos['codigodepa'] = $this->actualizacion_col_model->getCoddep();
            $datos['codigoprovi'] = $this->actualizacion_col_model->getCodprov();
            $datos['codigodistri'] = $this->actualizacion_col_model->getCoddist();
            $datos['codigozona'] = $this->actualizacion_col_model->getCodzona();
            $datos['departamento'] = $this->ubigeo_model->get_s_cbo_tipodocumento(4, '');
            $datos['provincia'] = $this->ubigeo_model->get_s_cbo_tipodocumento(3, $datos['codigodepa']);
            $datos['distrito'] = $this->ubigeo_model->get_s_cbo_tipodocumento(2, $datos['codigoprovi']);
            $datos['zona'] = $this->ubigeo_model->get_s_cbo_tipodocumento(1, $datos['codigodistri']);
            $datos['titulo'] = 'Actualización de Datos Colegiado';
            //$datos['nickname'] = $this->session->userdata('nick');
            $this->load->view('colegiado/upd_view', $datos);
        } else {
            $this->load->view('colegiado/upd_view');
        }
       }
    }

    //Agregados para modificación de actualización Andre 09-03-2015.
 function popupEditarPersona($nPerId) {
        $parametros = $this->personaGet($nPerId);
        $this->load->view('colegiado/upd_view_exter', $parametros);
    }
      function personaGet($nPerId) {
        $query = $this->colegiado_model->personaGet($nPerId);
        if ($query) {
            $persona['codigo'] = $this->colegiado_model->getnPerId();
            $persona['razon_social'] = $this->colegiado_model->getcPerNombres();
            $persona['ruc'] = $this->colegiado_model->getnruc();
            $persona['direccion'] = $this->colegiado_model->getdirec();
            $persona['RubroUpd'] = $this->colegiado_model->get_s_cbo_rubro();
            $persona['celular_empresa'] = $this->colegiado_model->getcelular();
            $persona['correo_empresa'] = $this->colegiado_model->getemail();
            $persona['nParIdRubro'] = $this->colegiado_model->getnParIdRubro();
            return $persona;
          
        } else {
            return false;
        }
    }
        function load_listar_view_persona() {
        $data['persona'] = $this->colegiado_model->personaQry();
        $this->load->view('colegiado/qry_view', $data);
    }
    function persona_juridica_Upd() {
        $this->form_validation->set_rules('txt_upd_per_razon_social', 'Razon_Social', 'required|trim');
        $this->form_validation->set_rules('txt_upd_per_ruc', 'Ruc', 'required|trim');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->colegiado_model->setnPerId($this->input->post('txt_upd_per_id'));
            $this->colegiado_model->setcPerNombres($this->input->post('txt_upd_per_razon_social'));
            $this->colegiado_model->setnruc($this->input->post('txt_upd_per_ruc'));
            $this->colegiado_model->setdirec($this->input->post('txt_upd_per_direcc'));
            $this->colegiado_model->setemail($this->input->post('txt_upd_per_email'));
            $this->colegiado_model->setcelular($this->input->post('txt_upd_per_celular'));
            $this->colegiado_model->setnParIdRubro($this->input->post('RubroUpd'));


            $result = $this->colegiado_model->persona_juridica_Upd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->index();
        }
    }
       function DatosexternoUsuarioUpd() {
            
            $this->colegiado_model->setDni($this->input->post('txt_upd_col_dni'));
            $this->colegiado_model->setdirec($this->input->post('txt_upd_col_direccion'));
            $this->colegiado_model->setemail($this->input->post('txt_upd_col_email'));
            $this->colegiado_model->setTelefono($this->input->post('txt_upd_col_telefono'));
            $this->colegiado_model->setcelular($this->input->post('txt_upd_col_celular'));
            $this->colegiado_model->setcPerNombres($this->input->post('txt_upd_col_nombres'));
            $this->colegiado_model->setcPerApellidoPaterno($this->input->post('txt_upd_col_apellidopat'));
            $this->colegiado_model->setApellidomat($this->input->post('txt_upd_col_apellidomat'));
            $this->colegiado_model->setFecnac($this->input->post('txt_ins_col_fecnac'));
            $this->colegiado_model->setSexo($this->input->post('cbo_upd_col_sexo'));
            $this->colegiado_model->setEstadocivil($this->input->post('cbo_ins_estado_civil'));
            $this->colegiado_model->setDepartamento($this->input->post('Departamentos'));
            $this->colegiado_model->setProvincia($this->input->post('Provincia'));
            $this->colegiado_model->setDistrito($this->input->post('Distrito'));
            $result = $this->colegiado_model->DatosexternoUsuarioUpd();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
    }
    function DatosColegiadoUpd() {
        $this->actualizacion_col_model->setCodzona($this->input->post('Zona'));
        $this->actualizacion_col_model->setRegcol($this->input->post('hid_upd_regcol'));
        $this->actualizacion_col_model->setEmailsec($this->input->post('txt_upd_col_emails'));
        $this->actualizacion_col_model->setEmail($this->input->post('txt_upd_col_emailp'));
        $this->actualizacion_col_model->setTelcol($this->input->post('txt_upd_col_telefono'));
        $this->actualizacion_col_model->setCelcol($this->input->post('txt_upd_col_celular'));
        $this->actualizacion_col_model->setRedpm($this->input->post('txt_upd_col_celularrpm'));
        $this->actualizacion_col_model->setRedpc($this->input->post('txt_upd_col_celularrpc'));
        $this->actualizacion_col_model->setCeluemp($this->input->post('celuemp'));
        $this->actualizacion_col_model->setSexcol($this->input->post('cbo_upd_col_sexo'));
        $this->actualizacion_col_model->setColestcivil($this->input->post('cbo_ins_estado_civil'));
        //DIRECCION
        $this->actualizacion_col_model->set_Direcol($this->input->post('txt_upd_col_direccion'));
        //
        $this->actualizacion_col_model->setZonaantes($this->input->post('txt_hd_zona'));
        $this->actualizacion_col_model->setDirecolant($this->input->post('txt_hd_direccion'));
        $this->actualizacion_col_model->setEmailsecant($this->input->post('txt_hd_emails'));
        $this->actualizacion_col_model->setCelcolant($this->input->post('txt_hd_celular'));
        $this->actualizacion_col_model->setTelcolant($this->input->post('txt_hd_telefono'));
        $this->actualizacion_col_model->setRedpmant($this->input->post('txt_hd_celularrpm'));
        $this->actualizacion_col_model->setRedpcant($this->input->post('txt_hd_celularrpc'));
        $this->actualizacion_col_model->setCeluempantes($this->input->post('txt_hd_tipocel'));
        $this->actualizacion_col_model->setSexcolantes($this->input->post('txt_hd_sexo'));
        $this->actualizacion_col_model->setColestcivilantes($this->input->post('txt_hd_estadocivil'));

        $this->actualizacion_col_model->setFecnaccol($this->input->post('txt_hd_fecnac'));
        $this->actualizacion_col_model->setNombre($this->input->post('txt_hd_nombre'));
        $this->actualizacion_col_model->setApellidop($this->input->post('txt_hd_apepat'));
        $this->actualizacion_col_model->setApellidom($this->input->post('txt_hd_apemat'));
        $this->actualizacion_col_model->setDni($this->input->post('txt_hd_dni'));
        $this->actualizacion_col_model->setEmailant($this->input->post('txt_hd_emailp'));

        $this->actualizacion_col_model->setDescrdep($this->input->post('txt_hd_Departamentos'));
        $this->actualizacion_col_model->setDescrdist($this->input->post('txt_hd_Distrito'));
        $this->actualizacion_col_model->setDescrprov($this->input->post('txt_hd_Provincia'));
        $this->actualizacion_col_model->setCodzona($this->input->post('Zona'));

        $this->actualizacion_col_model->setIp($this->input->post('ip'));
        $this->actualizacion_col_model->setTipo('Interno');

        $result = $this->actualizacion_col_model->DatosColegiadoIntUpd();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
   
    }

}
?>