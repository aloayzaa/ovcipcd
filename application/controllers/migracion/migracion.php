<?php

class Migracion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db_bdcolegio = $this->load->database('db_colegiado', TRUE);
        $this->load->helper('form');
        $this->load->library('MY_PHPMailer');
        $this->load->library('form_validation');
        $this->load->model('migracion/migracion_model');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $data['capitulo'] = $this->migracion_model->listar_cbocapitulos();
        $data['titulo'] = 'Operaciones Online Reporte (OV. 2016)';
        $this->load->view('migracion/migracion', $data);
    }

    function reload_migracion() {
        $usuarios = $this->migracion_model->get_listar_migracion();
        $ingresados = $this->migracion_model->get_listar_ingresados();
        foreach ($usuarios as $usuario) {
            $i=0;
            foreach ($ingresados as $ingresado) {
                if($usuario->lecol<>$ingresado->lecol){
                $i++;
                }
            }
            if($i==count($ingresados)){
                                $data[]=$usuario;
            }
        }
        $datos['usuarios'] = $data;
        $this->load->view("migracion/listar_migracion", $datos);
    }

      function dame_deuda_colegiados($cap,$menor,$mayor) {
      $sql['menor'] = $menor;
      $sql['mayor'] = $mayor;
      $sql['capitulo'] = $cap;  
      $sql['usuarios'] = $this->migracion_model->get_listar_colegiados($cap);
      $this->load->view("migracion/listar_deuda_colegiado", $sql);
    }
    function vergrafico($cap,$menor,$mayor){
              $data['menor'] = $menor;
     $data['mayor'] = $mayor; 
        $data['reporte_grafico'] =  $this->migracion_model->get_listar_colegiados($cap);
        $this->load->view('migracion/rep_grafico_view',$data);
        
    }
	   function dame_ingresados() {
        $data['ingresados'] = $this->migracion_model->get_listar_ingresados();
        $this->load->view("migracion/listar_ingresados", $data);
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
            $mail->Subject = "ACTIVACION DE CUENTA CIP-CDLL";
            $mail->AddAddress($this->migracion_model->getEmail(),$this->migracion_model->getNombres());
            $mail->WordWrap = 50;
            $body  = "
                 <table width=700>
<tr>
<td bgcolor=#dc2b19><div align=center ><b><font color=#ffffff face=Arial>Colegio de Ingenieros del Peru - Consejo Departamental de La Libertad<td>
</tr>
<tr>
<td><br><font face=Arial> Bienvenido, <b> Sr(a). ".$this->migracion_model->getNombres()." ".$this->migracion_model->getApellidop()." ".$this->migracion_model->getApellidom()."</b>,
Se le ha creado un acceso a nuestra Oficina Virtual del CIP-CDLL.<br>
<b>Los servicios que brindamos son:</b><br>
* Actualizaci&oacute;n de Datos (Personales, Familiares, Deportes, etc).<br>
* Verificaci&oacute;n de su Estado de Habilidad.<br>
* Detalle Econ&oacute;mico del Pago de sus Aportes.<br><br>
Su cuenta de usuario para el acceso a los servicios que brinda el CIP-CDLL son:</b><br>
</tr>
<tr>
<td><font><div align=center ><b>USUARIO:</b> ".$this->migracion_model->getRegcol()."</td>
</tr>
<tr>
<td><font><div align=center ><b>CLAVE:</b> ".$this->migracion_model->getDni()."</td>
</tr>
<tr>
<td><font><div align=center ><b>TIPO USUARIO:</b> COLEGIADO</td>
</tr>
<tr>
<td><font color='#0174DF' ><div align=center >* Es recomendable cambiar su contrase&ntilde;a cuando realize su primer ingreso.</td>
</tr>
<tr>
<td><font color='#B40404' ><div align=center >Ingresar Oficina Virtual 2014 <a href=http://www.cip-trujillo.org/ovcipcdll/ > Click Aqui</a></td>
</tr>
</table>
<br>
<br>
 <div><table cellpadding=0 cellspacing=0><tbody><tr><td colspan=5 style=font-size:12px>

<tr>
    <td rowspan=5 style=text-align:center;vertical-align:bottom><img src=http://cip-trujillo.org/logo.png width=60></td>
    <td rowspan=5>&nbsp;</td>
    <td rowspan=5 style=text-align:center;vertical-align:bottom><img width=1 height=65></td>
    <td rowspan=5>&nbsp;</td>
    <td style=font-size:14px><b>Colegio de Ingenieros del Per&uacute; CDLL</b></td>
</tr>
<tr>
	<td style=font-size:12px>Telf.: (51) 044-621667<br></td>
</tr>
<tr>
	<td style=font-size:12px>Francisco Borja Nro. 250 Urb. La Merced</td>
</tr>
<tr>
	<td style=font-size:12px>Email: <a href=mailto:informaticacdll@cipcdll.pe target=_blank><span><span class=il>informaticacdll@cipcdll.pe</span></span></a>&nbsp; / &nbsp;<a href=http://www.cip-trujillo.org/ target=_blank>www.cip-trujillo.org</a></td></tr></tbody></table>

</div>";
            $mail->Body = $body;
             $mail->Send();
    }
    function MigracionUsuariosIns($id) { // id= regcol
            $query = $this->migracion_model->getDatosPersonales($id);
            $nombres = $this->migracion_model->getNombres();
            $apellidop= $this->migracion_model->getApellidop();
            $apellidom = $this->migracion_model->getApellidom();
            $dni = $this->migracion_model->getDni();
            $telefono = $this->migracion_model->getTelefono();
            $celular = $this->migracion_model->getCelular();
            $email = $this->migracion_model->getEmail();
            $direccion = $this->migracion_model->getDireccion();
            $parametros = array($nombres,$apellidop,$apellidom,$id,$dni,$telefono,$celular,$email,$direccion);
            $result = $this->migracion_model->MigracionUsuariosIns($parametros);
            if ($result){
                            $this->EnviarEmail();
                echo 1;
                exit;
            }else{
                echo 0;
            }
    }
    function MigracionUsuariosRestantesIns($id){
       
            $query = $this->migracion_model->getDatosPersonales($id);
            $nombres = $this->migracion_model->getNombres();
            $apellidop= $this->migracion_model->getApellidop();
            $apellidom = $this->migracion_model->getApellidom();
            $dni = $this->migracion_model->getDni();
            $telefono = $this->migracion_model->getTelefono();
            $celular = $this->migracion_model->getCelular();
            $email = $this->migracion_model->getEmail();
            $direccion = $this->migracion_model->getDireccion();
            $parametros = array($nombres,$apellidop,$apellidom,$id,$dni,$telefono,$celular,$email,$direccion);
           
            $result = $this->migracion_model->MigracionUsuariosRestantesIns($parametros);
             if ($result){
                            $this->EnviarEmail();
                echo 1;
                exit;
            }else{
                echo 0;
            }
    }

}
