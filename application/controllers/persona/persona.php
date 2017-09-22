<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Persona extends CI_Controller {

    function __construct() {
        parent::__construct();
       	$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('message');
        $this->db_colegiado = $this->load->database('colegiado', TRUE);
        $this->load->library('MY_PHPMailer');
        $this->load->model('persona_model');
        $this->load->model('ubigeo_model');
    }

    public function index() {
        $this->loaders->verificaAcceso('W');
        $data['estadocivil']= $this->ubigeo_model->Datoscivil();
        $data['departamentos']= $this->ubigeo_model->DatosUbigeo();
        $data['titulo'] = 'Registro Usuario Externo CIP';
        $this->load->view("persona/panel_view", $data);
    }

 
    function DatosPersonaIns() {
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_ins_col_dni', 'DNI', '|trim|required|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('txt_ins_col_nombres', 'Nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_col_apellidopat', 'Apellido Materno', '|trim|required');
        $this->form_validation->set_rules('txt_ins_col_apellidomat', 'Apellido Materno', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_direc', 'direccion', '|trim|valid_email');
        $this->form_validation->set_rules('txt_ins_col_email', 'Email', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_tel', 'telefono', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_cel', 'celular', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_fecnac', 'fecnac', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_sexo', 'sexo', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_col_estado_civil', 'estadocivil', '|trim|required');
//        $this->form_validation->set_rules('cbo_departamentos', 'departamentos', '|trim|required');
//        $this->form_validation->set_rules('cbo_provincia', 'provincia', '|trim|required');
//        $this->form_validation->set_rules('cbo_distrito', 'distrito', '|trim|required');
        $this->form_validation->set_message('required', 'El %s es requerido');
 //       $this->form_validation->set_message('valid_email', '<span>El campo correo electr&oacute;nico no es una direcci&oacute;n de e mail valida. </span>'); //Establecemos los mensajes para la regla email
        if ($this->form_validation->run() == true) {
            $this->persona_model->setDni($this->input->post('txt_ins_col_dni'));
            $this->persona_model->setNombres($this->input->post('txt_ins_col_nombres'));
            $this->persona_model->setApellidoPat($this->input->post('txt_ins_col_apellidopat'));
            $this->persona_model->setApellidoMat($this->input->post('txt_ins_col_apellidomat'));
            $this->persona_model->setDirec($this->input->post('txt_ins_col_direc'));
            $this->persona_model->setEmail($this->input->post('txt_ins_col_email'));
            $this->persona_model->setTel($this->input->post('txt_ins_col_tel'));
            $this->persona_model->setCel($this->input->post('txt_ins_col_cel'));
            $this->persona_model->setFechaNac($this->input->post('txt_ins_col_fecnac'));
            $this->persona_model->setSex($this->input->post('cbo_ins_col_sexo'));
            $this->persona_model->setEstadoCivil($this->input->post('cbo_ins_col_estado_civil'));
            $this->persona_model->setDepartamento($this->input->post('cbo_departamentos'));
            $this->persona_model->setProvincia($this->input->post('cbo_provincia'));
            $this->persona_model->setDistrito($this->input->post('cbo_distrito'));
			$this->persona_model->setUsuario($this->input->post('txt_ins_col_usr'));
			$this->persona_model->setPassword($this->input->post('txt_ins_col_pwd'));
			$verificar = $this->input->post('check_email');
			$result = $this->persona_model->DatosPersonaNuevoIns();
			         if ($verificar == 'accept') {
                $this->EnviarEmail();
            } 
	           if ($result) {
                echo 1;
            } else {
                echo 0; //ERROR
            }
        } else {
           $this->index();
        }

    }
  function  EnviarEmail(){
 $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->IsHTML(true);
            $mail->Host = "mail.cipcdll.pe"; //Estableix GMAIL com el servidor SMTP.
            $mail->SMTPAuth= true; //Habilita la autenticació SMPT.
            $mail->SMTPSecure="tls"; //Estableix el prefix del servidor.
            $mail->Port = 25 ; //Estableix el port SMTP.
            $mail->Username="informaticacdll@cipcdll.pe"; //Username de la conte de correo que s'utilitza com a servei d'enviament.
            $mail->Password="informaticacdll2014"; //contrasenya del compte.
            $mail->From = "informaticacdll@cipcdll.pe";
            $mail->FromName = "SISTEMAS CIP-CDLL";
            $mail->Subject = "INGRESO A OFICINA VIRTUAL CIP-CDLL";
            $mail->AddAddress($this->persona_model->getEmail(),$this->persona_model->getNombres());
            $mail->WordWrap = 50;
           $body  = "
                 <table width=700>
<tr>
<td bgcolor=#dc2b19><div align=center ><b><font color=#ffffff face=Arial>Colegio de Ingenieros del Peru - Consejo Departamental de La Libertad<td>
</tr>
<tr>
<td><br><font face=Arial> Bienvenido, <b> Sr(a). ".utf8_decode($this->persona_model->getNombres())." ".utf8_decode($this->persona_model->getApellidoPat())." ".utf8_decode($this->persona_model->getApellidoMat())."</b>,
Su cuenta de usuario para el acceso a los servicios que brinda el CIP-DLL son:</b><br>
</tr>
<tr>
<td><font><div align=center >Usuario: ".utf8_decode($this->persona_model->getUsuario())."</td>
</tr>
<tr>
<td><font><div align=center >Clave: ".$this->persona_model->getPassword()."</td>
</tr>
<tr>
<td><font><div align=center >Tipo:<strong>Externo</strong></td>
</tr>
<tr>
<td><font><div align=center >Para usar los servicios, ingresar a nuestra Oficina Virtual <a href=http://www.cip-trujillo.org/ovcipcdll/ > Click Aqui</a></td>
</tr>
</table>
 <div><table cellpadding=0 cellspacing=0><tbody><tr><td colspan=5 style=font-size:12px>

<tr>
    <td rowspan=5 style=text-align:center;vertical-align:bottom><img src=http://cip-trujillo.org/logo.png width=60></td>
    <td rowspan=5>&nbsp;</td>
    <td rowspan=5 style=text-align:center;vertical-align:bottom><img width=1 height=65></td>
    <td rowspan=5>&nbsp;</td>
    <td style=font-size:12px><b>Colegio de Ingenieros del Peru </b></td>
</tr>
<tr>
	<td style=font-size:10px>Telf.: (51) 044-621667 <br></td>
</tr>
<tr>
	<td style=font-size:10px>Francisco Borja Nro. 250 Urb. La Merced</td>
</tr>
<tr>
	<td style=font-size:10px>Email: <a href=mailto:infocipcdll@cip.org.pe target=_blank><span><span class=il>infocipcdll@cip.org.pe</span></span></a>&nbsp; / &nbsp;<a href=http://www.cip-trujillo.org/ target=_blank>www.cip-trujillo.org</a></td></tr></tbody></table>

</div>";
            $mail->Body = $body;
             $mail->Send();
    }
    function ValidarUsuario() {
        $bUsuario = $this->persona_model->ValidarUsuario($this->input->post('txt_ins_col_usr'));
        if ($bUsuario) {
                echo "false";
            } else {
                echo "true"; //ERROR
            }
    }
    function ValidarDni() {
        $bDni = $this->persona_model->ValidarDni($this->input->post('txt_ins_col_dni'));
        if ($bDni == 1) {
                echo "false";
            } 
        elseif ($bDni == 2){
                echo "false";
        }else {
                echo "true"; 
            }
    }
    function ValidarDni2() {
        $bDni = $this->persona_model->ValidarDni($this->input->post('txt_ins_col_dni'));
        if ($bDni == 2){
                echo 2
            ;
        }
    }
    function ValidarEmail() {
        $bDni = $this->persona_model->ValidarEmail($this->input->post('txt_ins_col_email'));
        if ($bDni) {
                echo "false";
            } else {
                echo "true"; //ERROR
            }
    }
    function ValidarFechaNac() {
        $txtfecnac = $this->input->post('txt_ins_col_fecnac');
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
    function activarusuario($str) {
        $this->persona_model->ActivarUsuario($str);
        $this->index();
    }

    function Lleno_combos()
    {
         $this->ubigeo_model->setIdd($this->input->post('idd'));
         $this->ubigeo_model->setIdp($this->input->post('pid'));
         $result = $this->ubigeo_model->DatosUbigeo();
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

