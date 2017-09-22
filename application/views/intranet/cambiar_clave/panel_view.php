<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsCambiarClave.js"></script>
<?php
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' =>  $this->session->userdata('nick'), 'type' => 'hidden');
$atributosForm = array('id' => 'frm_upddatos_personales', 'name' => 'frm_upddatos_personales');
echo form_open('actualizacion_colegiado/DatosColegiadoIntUpd/', $atributosForm);
$txt_upd_col_clavebefore = array('name' => 'txt_upd_col_clavebefore', 'type'=>'password', 'class'=>'cajaskey','id' => 'txt_upd_col_clavebefore', 'maxlength' => '200', 'style' => "resize:none;width:214px;", 'required' => 'required');
$txt_upd_col_claveafter = array('name' => 'txt_upd_col_claveafter','type'=>'password', 'class'=>'cajaskey','id' => 'txt_upd_col_claveafter', 'maxlength' => '200', "style" => "resize:none;width:214px;", 'required' => 'required');
$txt_upd_col_rclaveafter = array('name' => 'txt_upd_col_rclaveafter','type'=>'password', 'class'=>'cajaskey','id' => 'txt_upd_col_rclaveafter', 'maxlength' => '200', "style" => "resize:none;width:214px;", 'required' => 'required');
$boton = form_submit('btn_upd_cambiarclave', 'Cambiar Contraseña', 'id="btn_upd_cambiarclave" class="btn btn-primary"');
?>

<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Cambio de Contraseña</i></h3>
                
                            </div>
            <div class="box-content">
                <div id="Tabs_UpdColegiado">
                   
                    <div id="colegiadol">
                        <div style="min-width: 400px;">
                            <?php echo form_input($hid_upd_regcol); ?>
                            <br />
                            
    
    <fieldset>     
        <table>
            <tbody>
                <tr>
                    <td style="width: 50px;text-align:center;vertical-align:top;"></td>
                    
                    <td style="vertical-align:top;" style="width: 500px;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><b>Contraseña Actual:</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_input($txt_upd_col_clavebefore); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nueva Contraseña</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_col_claveafter); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Repetir Nueva Contraseña</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_col_rclaveafter); ?></td>
                                </tr>
                                <tr>
                                     <td><b><div id="preload"></div></b></td>
                                    <td><b></b></td>
                                    <td > <?php echo $boton; ?></td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </td>
                   
                </tr>
        </table>
              
    </fieldset><br>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
                                
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>