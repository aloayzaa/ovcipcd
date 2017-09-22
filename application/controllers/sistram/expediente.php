<?php

class Expediente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
//        $this->load->library('message');
        $this->load->library('form_validation');
//        $this->load->library('html2pdf');
        $this->load->model('sistram/expediente_model');
        $this->load->model('portal/bolsa_trabajo_model');
//                $this->load->library('MY_PHPMailer');

                
              
    }
    function recargar(){
        $this->load->view('sistram/expediente/upload_view');
    }
    
    function index() {
        $this->loaders->verificaAcceso('W');
        $data['usuarios']=$this->expediente_model->getUsuariosCargo();
        $data['main_content'] = 'sistram/expediente/panel_view';
        $data['titulo'] = 'SISTRAM: Creación de Expedientes';
        $this->load->view('dashboard/template', $data);
    }

    function load_listar_view_mesapartes() {
        $data['titulo'] = 'Mesa de Partes';
        $expedientes = $this->expediente_model->expedientesQry();
        $data['expedientes'] = $expedientes;
        $this->load->view('sistram/expediente/qry_view', $data);
    }

    //funcion enviar a Administrador o director secretario
    function enviarAdmin() {
        $cadena="";
        $expedientes = $this->input->post('expedientes');
        $expedientes = substr($expedientes, 0, -1);
        $idexpedientes = explode(",", $expedientes);
        $usuario = $this->input->post('usuario');
        foreach ($idexpedientes as $v) {
            if($this->expediente_model->verificarenvio($v,$usuario)){
               $result = $this->expediente_model->enviarAdmin($v,$usuario);
                if ($result) {
                    $band = 1;
                } else {
                    $band = 0;
                    break;
                } 
            }else {
                $band=-1;
               $cadena=$cadena."".$this->expediente_model->getExpGenerado().","; 
            }
        }
        if ($band == 1) {
            echo 1;
        } else if ($band == 0){
            echo 0;
        }else {
            echo $cadena;
        }
    }

    //funcion reenviar a Administrador o director secretario
    function reenviarAdmin() {
        $idexpedientes = $this->input->post('expedientes');
        $observacion = $this->input->post('observacion');
        $usuarioAdmin = $this->input->post('usuarioreenviar');
        if($usuarioAdmin==1){
            
            $usuario="Secretario";
        }
        else{
            $usuario="Administrador";
        }
        if($this->expediente_model->verificarenvio($idexpedientes,$usuario)){
            $result = $this->expediente_model->reenviarAdmin($usuarioAdmin,$observacion, $idexpedientes);
            if ($result) {
                echo 1;
            } else {
                echo 0;
            } 
        }else{
            echo -1;
        }
    }

    // COMBO DE TIPOS DE DOCUMENTOS
    function cboTipoDocumento() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $query = $this->expediente_model->cboTipoDocumento($accion);

            if ($query) {
                $atributos = 'id="cbo_ins_tipodoc" name="cbo_ins_tipodoc" class="chzn-select" style="width:220px"';
                $data = toArrayNumerico($query);
                $result = "";
                $result .= "<select " . $atributos . ">";
                $result .= "<optgroup label='DOCUMENTOS IDENTIDAD'>";
                foreach ($data as $fila) {
                    if ($fila[1] == "DNI" || $fila[1] == "RUC" || $fila[1] =="CARNET DE EXTRANJERIA") {
                        $result .= "<option value=$fila[0]>" . utf8_encode($fila[1]) . "</option>";
                    }
                }
                $result .= "</optgroup>";
                $result .= "<optgroup label='OTROS DOCUMENTOS'>";
                foreach ($data as $fila) {
                    if ($fila[1] != "DNI" && $fila[1] != "RUC" && $fila[1] != "CARNET DE EXTRANJERIA") {
                        $result .= "<option value=$fila[0]>" . utf8_encode($fila[1]) . "</option>";
                    }
                }
                $result .= "</optgroup>";
                $result .= "</select>";

                echo $result;
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }

    // COMBO DE TRAMITES
    function cboTramites() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $result = $this->expediente_model->cboTramites($accion);

            if ($result) {
                echo $result;
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }

    // OBTIENE EL ID DEL TRAMITE PARA DEVOLVER LOS REQUISITOS
    function reqXptramiteGet() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $nTramiteId = $this->input->post('nTramiteId');
            $fila = $this->expediente_model->reqXptramiteGet($accion, $nTramiteId);

            if ($fila) {
                echo $this->expediente_model->getNTramieId();
            } else {
                echo "0";
            }
        } else {
            echo "error";
        }
    }

    // OBTIENE LOS REQUISITOS POR TRAMITE
    function reqXTramiteGet() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $nTramiteId = $this->input->post('nTramiteId');
            $query = $this->expediente_model->reqXTramiteGet($accion, $nTramiteId);

            if ($query) {
                $header['chk-req'] = "<input type='checkbox' id='chk-req' onclick='checkTodos(\"#chk-req\",\"reqId[]\")'/>";
                $header['nRequisitosId'] = "nRequisitosId";
                $header['cRequisitosDescripcion'] = "Descripci&oacute;n del requisito";
                $atributos = 'id="qry_exp_requisitos" name="qry_exp_requisitos" width="100%" cellpadding="0" cellspacing="0" border="0"';

                $array = toArrayNumerico($query);
                $result = "";
                $result .= '<table  ' . $atributos . '>';
                $result .= '<thead>';
                $result .='<tr>';
                foreach ($header as $title => $valor) {
                    $result .='<th>' . $valor . '</th>';
                }
                $result .='</tr>';
                $result .= '</thead>';
                $result .= '<tbody>';
                foreach ($array as $fila => $row) {
                    $result.='<tr>';
                    $result .= "<td><input type='checkbox' value='" . $row[0] . "' name='reqId[]'/></td>";
                    foreach ($row as $key => $value) {
                        $campo = $value;
                        $result.='<td>';
                        if ($campo == null) {
                            $result.='&nbsp;';
                        } else {
                            $result.=htmlspecialchars($campo);
                        }
                        $result.='</td>';
                    }
                    $result.='</tr>';
                    unset($row);
                }
                $result.='</tbody>';
                $result .= '</table>';

                echo $result;
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }

    // OBTIENE DATOS DE UNA PERSONA POR NRO. DE DOCUMENTO (DNI)
    function personaXdniGet() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $txt_ins_exp_nrodocumento = $this->input->post('txt_ins_exp_nrodocumento');
            $fila = $this->expediente_model->personaXdniGet($accion, $txt_ins_exp_nrodocumento);

            if ($fila) {
                echo $this->expediente_model->getPerApellidoPaterno() . "," .
                $this->expediente_model->getPerApellidoMaterno() . "," .
                $this->expediente_model->getPerNombres() . "," .
                $this->expediente_model->getPerEmail() . "," .
                $this->expediente_model->getPerTelefono();
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }


    // OBTIENE DATOS DE UNA PERSONA POR CARNET DE EXTRANJERIA
    function personaXcarnetGet() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $txt_ins_exp_nrodocumento = $this->input->post('txt_ins_exp_nrodocumento');
            $fila = $this->expediente_model->personaXcarnetGet($accion, $txt_ins_exp_nrodocumento);

            if ($fila) {
                echo $this->expediente_model->getPerApellidoPaterno() . "," .
                $this->expediente_model->getPerApellidoMaterno() . "," .
                $this->expediente_model->getPerNombres() . "," .
                $this->expediente_model->getPerEmail() . "," .
                $this->expediente_model->getPerTelefono();
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }

    // OBTIENE DATOS DE UNA PERSONA POR NRO. DE DOCUMENTO (RUC)
    function personaXrucGet() {
        if ($this->input->post('accion')) {
            $accion = $this->input->post('accion');
            $txt_ins_exp_nrodocumento = $this->input->post('txt_ins_exp_nrodocumento');
            $fila = $this->expediente_model->personaXrucGet($accion, $txt_ins_exp_nrodocumento);

            if ($fila) {
                echo $this->expediente_model->getPerNombres() . "," .
                $this->expediente_model->getPerEmail() . "," .
                $this->expediente_model->getPerTelefono();
            } else {
                echo "2";
            }
        } else {
            echo "0";
        }
    }

    private function createFolder() {
        if (!is_dir("./uploads")) {
            mkdir("./uploads", 0777);
            mkdir("./uploads/sistram", 0777);
        }
    }
    // GENERAR CARGO CON APLICACION WEN (BOTON-Ver Vargo)
    function load_generar_cargo($data, $visto) {
        $this->load->library('html2pdf');
        $sql['tabla'] = $this->expediente_model->generar_Expcargo($data);
        $sql['requisitos'] = $this->expediente_model->dame_requisitos($data);
        $sql['movimientos']='';
        $sql['visto'] = $visto;
        $this->createFolder();
        $this->html2pdf->folder('./uploads/sistram/');

        $archivo = "TRAM-" . $data . ".pdf";
        $archivo = $data . ".pdf";
        $this->html2pdf->filename($archivo);
        $this->load->library('html2pdf');
        $this->html2pdf->paper('a4', 'portrait');
        $this->html2pdf->html(utf8_decode($this->load->view('sistram/expediente/generacion_cargo', $sql, true)));
        if ($this->html2pdf->create('save')) {
            echo $archivo;
        }
    }
     // GENERAR CARGO AUTOMATICO
    function load_generar_cargo_auto($data, $visto) {
        $this->load->library('html2pdf');
        $sql['tabla'] = $this->expediente_model->generar_Expcargo($data);
        $sql['requisitos'] = $this->expediente_model->dame_requisitos($data);
        $sql['movimientos']='';
        $sql['visto'] = $visto;
        $this->createFolder();
       
        $this->html2pdf->folder('./uploads/sistram/');

        $archivo = "TRAM-" . $data . ".pdf";
        $archivo = $data . ".pdf";
        $this->html2pdf->filename($archivo);

        $this->html2pdf->paper('a4', 'portrait');
        $this->html2pdf->html(utf8_decode($this->load->view('sistram/expediente/generacion_cargo', $sql, true)));
        $this->html2pdf->create('save');
    }
    // CREAR EXPEDIENTE (INSERT)
    function crearExpedienteIns() {
        $this->load->library('message');
        $this->form_validation->set_rules('txt_ins_exp_nrodocumento', 'numero documento', 'required|trim');
        $this->form_validation->set_rules('txt_ins_exp_nombres', 'nombres', 'required|trim');
        $this->form_validation->set_rules('txt_ins_exp_observaciones', 'observaciones', 'required|trim');
        $this->form_validation->set_rules('txt_ins_exp_folio', 'folio', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == TRUE) {
            $this->expediente_model->setDocIdentidad($this->input->post('txt_ins_exp_nrodocumento'));
            $this->expediente_model->setPerNombres($this->input->post('txt_ins_exp_nombres'));
            // SI APELLIDO PATERNO ES NULL
            if ($this->input->post('txt_ins_exp_apePat') == null) {
                $this->expediente_model->setPerApellidoPaterno(null);
            } else {
                $this->expediente_model->setPerApellidoPaterno($this->input->post('txt_ins_exp_apePat'));
            }
            // SI APELLIDO MATERNO ES NULL
            if ($this->input->post('txt_ins_exp_apeMat') == null) {
                $this->expediente_model->setPerApellidoMaterno(null);
            } else {
                $this->expediente_model->setPerApellidoMaterno($this->input->post('txt_ins_exp_apeMat'));
            }
            $this->expediente_model->setPerEmail($this->input->post('txt_ins_exp_email'));
            $this->expediente_model->setPerTelefono($this->input->post('txt_ins_exp_telefono'));
            $this->expediente_model->setNTramiteId($this->input->post('c_cbo_ins_exp_tramitev'));
            $this->expediente_model->setCExpedienteSumilla($this->input->post('hid_ins_exp_sumilla'));
            // SI ID PROCEDIMIENTO-MODALIDAD ES NULL
          
            $this->expediente_model->setCExpedienteAsunto($this->input->post('txt_ins_exp_observaciones'));
            $this->expediente_model->setEdeNumeroFolios($this->input->post('txt_ins_exp_folio'));
            $this->expediente_model->setIdSolicitante($this->input->post('cbo_usr_admin'));
            // SI COMBO TRABAJADORES ES NULL
            
            $this->expediente_model->setTipoDocumento($this->input->post('cbo_ins_tipodoc')); // tipo documento
            // REQUISITOS
            $source = "";
            if (!$this->input->post('reqId')) {
                $this->expediente_model->setReqId(null);
            } else {
                $req_array = $this->input->post('reqId');
                foreach ($req_array as $one_req) {
                    $source .= $one_req . ",";
                }
                $req = substr($source, 0, -1);
                $this->expediente_model->setReqId($req);
            }

            $result = $this->expediente_model->crearExpedienteIns();

            if ($result) {
                 $this->EnviarEmail();
                $expGenerado = $this->expediente_model->getExpGenerado();
                $this->load_generar_cargo_auto($expGenerado,'sb');
                echo $expGenerado;
            } else {
                echo "0";
            }
        }
    }
//funcion de enviar email de confirmación a solicitante
       function  EnviarEmail(){
     $this->load->library('MY_PHPMailer');
 $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->IsHTML(true);
            $mail->Host = "mail.cipcdll.pe"; //Estableix GMAIL com el servidor SMTP.
            $mail->SMTPAuth= true; //Habilita la autenticació SMPT.
            $mail->SMTPSecure="tls"; //Estableix el prefix del servidor.
            $mail->Port = 25 ; //Estableix el port SMTP.
            $mail->Username="cipcdll@cipcdll.pe"; //Username de la conte de correo que s'utilitza com a servei d'enviament.
            $mail->Password="cipcdll2014"; //contrasenya del compte.
            $mail->From = "cipcdll@cipcdll.pe";
            $mail->FromName = "Mesa de Partes del CIP-CDLL";
            $mail->Subject = "".$this->expediente_model->getPerNombres().", tu tramite ha sido registrado (Expediente no. ".$this->expediente_model->getExpGenerado().")";
            $mail->AddAddress($this->expediente_model->getPerEmail(),$this->expediente_model->getPerNombres());
            $mail->WordWrap = 50;
            $body  = "<div style='width:740px;'>
<meta charset='utf-8'>
        <img height='90px' src='http://www.cip-trujillo.org/logo.jpg'>
        <p  style='font-family:arial;text-align:left;font-weight:bold;color:#005c84;margin-left:60px;'>Sr(a). ".$this->expediente_model->getPerNombres()." ".$this->expediente_model->getPerApellidoPaterno()." ".$this->expediente_model->getPerApellidoMaterno()."</p>
        <p  style='font-family:arial;text-align:left;font-size:14px;margin-left:60px;'>Su expediente ingresado en <b>Mesa de Partes</b> se ha registrado con &eacute;xito</p>
        <center>
        <table style='font-size:14px;font-family:arial;'>
            <tr>
                <td> <p style='background:#088A4B;padding-top:10px;padding-right:10px;padding-left:10px;padding-bottom:5px;border:1px solid #d6d6d6;color:white;
     font-weight:bold;'>C&oacute;digo Generado</p></td>
                <td> <p style='background:#F8F8F8;
     padding-top:10px;
     padding-right:10px;
     padding-left:10px;
     padding-bottom:5px;
     border:1px solid #d6d6d6; 
     color:#005c84;
     font-weight:bold;'> ".$this->expediente_model->getExpGenerado()." </p></td>
            </tr>
            <tr>
                <td> <p style='background:#045FB4;
     padding-top:10px;
     padding-right:10px;
     padding-left:10px;
     padding-bottom:5px;
     border:1px solid #d6d6d6; 
     color:white;
     font-weight:bold;'>Documento de Identidad</p> </td>
                <td> <p  style='background:#F8F8F8;padding-top:10px;padding-right:10px;padding-left:10px;
     padding-bottom:5px;
     border:1px solid #d6d6d6; 
     color:#005c84;
     font-weight:bold;'> ".$this->expediente_model->getDocIdentidad()."</p></td>
            </tr>

        </table>
        </center>
        <br>
        <table  style='margin-left:60px;' border='0' cellpadding='0' cellspacing='0' width='600px'>
         <tbody>
           <tr>
             <td style='border:1px solid #d8dfe0;padding:9px 10px'>
                <table align='left' border='0' cellpadding='0' cellspacing='0' width='69%'>
                <tbody>
                   <tr>
                     <td>
                       <table border='0' cellpadding='0' cellspacing='0'>
                          <tbody>
                             <tr>
                               <td style='padding-bottom:10px'><img alt='' border='0' height='39' src='https://ci6.googleusercontent.com/proxy/4P2Fe7Gg7zHDL5x87fx2bevoYLTpdPDhPzHhoypFu9RoC9rbPFIAu-wVQHpzSGGPFqLDNscCH3Y0lRZq5jnyCNugdPye5yvn03OnWXRSjj8xBHt0tIak-pIaaEqH_BNtJQ=s0-d-e1-ft#http://servicios.movistar.com.pe/mailing/recibo_digital/banco/img_r9_c3.jpg' style='vertical-align:bottom' width='47' class='CToWUd'>
                               </td>
                             </tr>
                          </tbody>
                        </table>
                      </td>
                      <td>
                        <table border='0' cellpadding='0' cellspacing='0'>
                          <tbody>
                            <tr> 
                              <td style='color:#005c84;font-family:Arial,Helvetica,sans-serif;font-size:12px'>Puede dar seguimiento a su expediente, consultando en <a href='http://www.cip-trujillo.org/consultar.php' target='_blank'>www.cip-trujillo.org/consultar</a> o dando click al icono de la derecha
                              </td>
                            </tr>
                          </tbody>
                        </table>
                       </td>
                    </tr>
                </tbody>
                </table>
                <table align='left' border='0' cellpadding='0' cellspacing='0'>
                       <tbody>
                          <tr>
                             <td>
                                <a href='http://www.cip-trujillo.org/consultar.php' target='_blank'>
                                  <img alt='' border='0' src='http://www.cip-trujillo.org/ovcipcdll/uploads/sistram.png' style='vertical-align:bottom' width='150' height='50'>
                                </a>
                             </td>
                           </tr>
                        </tbody>
                </table>
             </td></tr></tbody>
        </table>
        <br>
        
        
        <table border='0' cellpadding='0' cellspacing='0' style='border: 0; border-collapse: collapse;margin-left:60px;' width='100%'>
    <tbody>
        <tr>
            <td>
            <table border='0' cellpadding='0' cellspacing='0' style='border: 0; border-collapse: collapse' width='100%'>
                <tbody>
                    <tr><!-- AVATAR -->
                        <td align='left' valign='top'>&nbsp;</td>
                        <td width='10'>&nbsp;</td>
                        <!-- END AVATAR --><!-- FIELDS -->
                        <td align='left' valign='top' width='100%'>
                        <table border='0' cellpadding='0' cellspacing='0' style='border: 0; border-collapse: collapse'>
                            <tbody>
                                <tr>
                                    <td align='left' class='field-cell' style='' valign='middle'><strong><span style='font-size:14px;font-family:arial'><span class='field-cell-text field-first-name'>Informes</span>&nbsp;<span class='field-cell-text field-last-name'>CIP-CDLL</span></span></strong></td>
                                </tr>
                                <tr>
                                    <td align='left' valign='middle'><span style='font-size:14px;font-family:arial'>Tel&eacute;fono: (044)608395</span></td>
                                </tr>
                                <tr>
                                    
                                                <td align='left' class='field-cell text-right' style='text-align: right;' valign='middle'><span style='font-size:14px;font-family:arial'><a href='mailto:informescdll@cip.org.pe' style='outline: none; cursor: pointer; display: inline-block;'>informescdll@cip.org.pe</a></span></td>
                                    
                                    
                                    
                                </tr>
                                <tr>
                                    <td class='row row-socialicons' style='padding: 15px 0'>
                                    <table border='0' cellpadding='0' cellspacing='0' class='socialicons-container' style='border: 0; border-collapse: collapse'>
                                        <tbody>
                                            <tr>
                                                <td align='left' valign='middle' width='19'><span style='font-size:20px;'><a href='http://www.facebook.com/CipLaLibertad' style='outline: none; cursor: pointer; display: inline-block;' target='_blank'><font color='#222222'><img alt='facebook' height='16' src='https://s3.amazonaws.com/static.brandmymail.com/v0.0.29/img/social_icons/16/facebook_16.png' style='vertical-align: middle; border: none' width='16' /></font></a></span></td>
                                                <td align='left' valign='middle' width='19'><span style='font-size:20px;'><a href='https://twitter.com/cipcdll' style='outline: none; cursor: pointer; display: inline-block;' target='_blank'><font color='#222222'><img alt='twitter' height='16' src='https://s3.amazonaws.com/static.brandmymail.com/v0.0.29/img/social_icons/16/twitter_16.png' style='vertical-align: middle; border: none' width='16' /></font></a></span></td>
                                                <td align='left' valign='middle' width='19'><span style='font-size:20px;'><a href='http://www.youtube.com/profile?user=CIPLALIBERTAD' style='outline: none; cursor: pointer; display: inline-block;' target='_blank'><font color='#222222'><img alt='youtube' height='16' src='https://s3.amazonaws.com/static.brandmymail.com/v0.0.29/img/social_icons/16/youtube_16.png' style='vertical-align: middle; border: none' width='16' /></font></a></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            </td>
        </tr>
    </tbody>
</table></div>";
            $mail->Body = $body;
             $mail->Send();
    }

    // funcion de abrir popup_editar
    function popupEditarExpediente($nExpedienteId) {
        $parametros = $this->expedienteGet($nExpedienteId);
        $this->load->view('sistram/expediente/upd_view', $parametros);
    }

    // funcion de abrir popup_multimedia
    function popupMultimediaExpediente($nExpedienteId) {
        $parametros['bandeja']=$this->expediente_model->ExpMultimediaqry($nExpedienteId);
        $this->load->view('sistram/expediente/qry_view_mult', $parametros);
    }

    // funcion de abrir popup_reenviarexpediente
    function popupReenviarExpediente($nExpedienteId) {
        $parametros = $this->expedienteGet($nExpedienteId);
        $this->load->view('sistram/expediente/reenviarexp_view', $parametros);
    }

    //funcion expedienteGet (devuelve los datos del expediente)
    function expedienteGet($nExpedienteId) {
        $query = $this->expediente_model->expedienteGet($nExpedienteId);
        if ($query) {

            $expediente['nExpedienteId'] = $this->expediente_model->getIdExpediente();
            $expediente['codigo'] = $this->expediente_model->getExpGenerado();
            $expediente['Sumilla'] = $this->expediente_model->getCExpedienteSumilla();
            $expediente['Nombres'] = $this->expediente_model->getPerNombres();
            $expediente['ApellidoPeterno'] = $this->expediente_model->getPerApellidoPaterno();
            $expediente['ApellidoMaterno'] = $this->expediente_model->getPerApellidoMaterno();
            $expediente['Fecha_Registro'] = $this->expediente_model->getCExpedienteFechaRegistro();
            $expediente['Folios'] = $this->expediente_model->getEdeNumeroFolios();
            $expediente['Tramites'] = $this->expediente_model->cboTramiteUpd();
            $expediente['nTramiteId'] = $this->expediente_model->getNTramiteId();

            return $expediente;
        } else {
            return false;
        }
    }

    //funcion de actualizacion de expediente
    function expedienteUpd($valores) {
        $valores = substr($valores, 0, -1);
        $id_requisitos = explode(",", $valores);
        $this->expediente_model->setReqId($id_requisitos);
        $this->expediente_model->setIdExpediente($this->input->post('hid_upd_nExpedienteId'));
        $this->expediente_model->setCExpedienteSumilla($this->input->post('txt_upd_multimedia_Sumilla'));
        $this->expediente_model->setPerNombres($this->input->post('txt_upd_multimedia_SolicNombre'));
        $this->expediente_model->setPerApellidoPaterno($this->input->post('txt_upd_multi_SolicApellPaterno'));
        $this->expediente_model->setPerApellidoMaterno($this->input->post('txt_upd_multi_SolicApellMaterno'));
        $this->expediente_model->setEdeNumeroFolios($this->input->post('txt_upd_multimedia_Folios'));
        $this->expediente_model->setNTramiteId($this->input->post('Tramites'));
        $codigo = $this->expediente_model->dame_codigo($this->input->post('hid_upd_nExpedienteId'));
        $visto = 'sb';
        $result = $this->expediente_model->expedienteUpd();
                $this->load_generar_cargo($codigo, $visto);
        if ($result) {
            echo 1;
        } else {
            echo '';
        }
    }
    //Funcion DropZone
    function upload($expedienteID)
    { 
        
	if (!empty($_FILES))
	{
            $ruta = "uploads/sistram/adjuntos/";
            $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
            $nombreArchivox = $_FILES['file']['name'];
            $nombreArchivox = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz')) . "_" . $_FILES['file']['name'];
            $nombreArchivox = str_replace($limpiador, '', $nombreArchivox);
            $rutamasArchivo = str_replace('//', '/', $ruta) . utf8_decode($nombreArchivox);
            $tempFile = $_FILES['file']['tmp_name'];
            if (move_uploaded_file($tempFile, $rutamasArchivo)) {
                $this->expediente_model->setHdIdExpediente($expedienteID);
                $this->expediente_model->setCmultLink($rutamasArchivo);
                $query = $this->expediente_model->expedienteGet($expedienteID);
                if ($query) {
                    $expediente['Sumilla'] = $this->expediente_model->getCExpedienteSumilla();
                    $sumilla = $expediente['Sumilla'];
                }
                  $result = $this->expediente_model->expedienteUploadPdf($_FILES['file']['name']);
              
                 // $query=$this->expediente_model->insertarMultimedia('Sumilla1',$rutamasArchivo,1);
                   if($result){
                     echo 1;
                   } else {
                    echo 0; //ERROR
                   }
                }
                else{
                   echo 'error';
                }
        }
    }

    //funcion listar archivos multimedia segun expediente
    function load_listar_view_multimedia($nExpedienteId) {
        $data['bandeja'] = $this->expediente_model->ExpMultimediaqry($nExpedienteId);
        $this->load->view('sistram/expediente/qry_view_mult', $data);
    }

    function load_listar_view_requisitos($valor, $nExpedienteId, $nTramiteId) {
        $data['nTramiteIdGet'] = $valor;
        $data['requisitos'] = $this->expediente_model->ExpRequisitosqry($nTramiteId);
        $data['requisitosXTramite'] = $this->expediente_model->RequisitosXTramiteqry($nExpedienteId);
        $this->load->view('sistram/expediente/qry_view_requi', $data);
    }

    //funcion eliminar expediente multimedia
    function MultimediaDel($nMultCodigo = null) {
        $this->expediente_model->setNMultCodigo($nMultCodigo);
        $result = $this->expediente_model->MultimediaDel();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }

    //funcion eliminar expediente multimedia
    function darbajaExpediente($nExpedienteId = null) {
        $this->expediente_model->setIdExpediente($nExpedienteId);
        $result = $this->expediente_model->darbajaExpediente();
        if ($result) {
            echo 1; //EXITO
        } else {
            echo 0; //ERROR
        }
    }
    function load_listar_view_expedientes_rango(){
        $fechainicio=$this->input->post('fechainicio');
        $fechafin=$this->input->post('fechafin');
        $expedientes=$this->expediente_model->expedienteQueryxfecha($fechainicio,$fechafin);
        if (count($expedientes) > 0) {
            foreach ($expedientes as $expediente) {
                $movimientos=$this->expediente_model->movimientosGet($expediente->nExpedienteId);
                if(count($movimientos)>0){
                    $involucrados='';
                     foreach ($movimientos as $movimiento){
                         $involucrados=$involucrados.$movimiento->cDescripcionCargo.", ";
                     }
                     $expediente->involucrados=  substr($involucrados,0,-2);
                }else{
                    $expediente->involucrados='Aún no hay involucrados';
                }
            }
        }
        $data['expedientes']=$expedientes;     
        
        
        $this->load->view('sistram/expediente/qry_viewxfecha',$data);
    }

}

?>
