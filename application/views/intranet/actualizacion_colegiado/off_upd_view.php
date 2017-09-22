<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="<?php echo URL_JS ?>intranet/jsDatosColegiadoUpd.js"></script>
<?php
$atributosForm = array('id' => 'frm_upddatos_personales', 'name' => 'frm_upddatos_personales');
echo form_open('actualizacion_colegiado/DatosColegiadoIntUpd/' . $regcol . "/", $atributosForm);
$txt_upd_col_direccion = array('name' => 'txt_upd_col_direccion', 'id' => 'txt_upd_col_direccion', 'value' => mb_convert_encoding($direcol, "UTF-8"), "cols" => "190", "rows" => "3", 'style' => "width: 388px; height: 45px;", 'required' => 'required');
$txt_upd_col_emailp = array('name' => 'txt_upd_col_emailp', 'id' => 'txt_upd_col_emailp', 'value' => mb_convert_encoding($email, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:350px;", 'class' => 'cajasemail');
$txt_upd_col_emails = array('name' => 'txt_upd_col_emails', 'id' => 'txt_upd_col_emails', 'value' => mb_convert_encoding($emailsec, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:350px;", 'class' => 'cajasemail', 'required' => 'required');
$txt_upd_col_telefono = array('name' => 'txt_upd_col_telefono', 'id' => 'txt_upd_col_telefono', 'value' => mb_convert_encoding($telcol, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;", 'class' => 'cajasphone', 'required' => 'required');
$txt_upd_col_celular = array('name' => 'txt_upd_col_celular', 'id' => 'txt_upd_col_celular', 'value' => mb_convert_encoding($celcol, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;", 'class' => 'cajascell', 'required' => 'required');
$txt_upd_col_celularrpm = array('name' => 'txt_upd_col_celularrpm', 'id' => 'txt_upd_col_celularrpm', 'value' => mb_convert_encoding($redpm, "UTF-8"), 'maxlength' => '10', 'minlength' => '6', "style" => "resize:none;width:100px;");
$txt_upd_col_celularrpc = array('name' => 'txt_upd_col_celularrpc', 'id' => 'txt_upd_col_celularrpc', 'value' => mb_convert_encoding($redpc, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;");
$cbosexo = array(
    '' => 'Seleccionar',
    'M' => 'MASCULINO',
    'F' => 'FEMENINO',
);
$cboestado_civil = array(
    '' => 'Seleccionar',
    'S' => 'SOLTERO',
    'C' => 'CASADO',
    'D' => 'DIVORCIADO',
    'V' => 'VIUDO',
);
$txt_ins_col_fecnac = array('name' => 'txt_ins_col_fecnac', 'id' => 'txt_ins_col_fecnac','value' => mb_convert_encoding($fechanac, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required');
$hid_upd_regcol = form_hidden("hid_upd_regcol", $this->session->userdata('nick'), "hid_upd_regcol", true);
//$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' =>  $this->session->userdata('nick'), 'type' => 'hidden');

$txt_upd_regcol = array('name' => 'txt_upd_regcol', 'id' => 'txt_upd_regcol');
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Personales', 'id="btn_upd_colegiado" class="btn btn-primary"');
?>
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    <fieldset>     
        <table>
            <tbody>
                <tr>
                    <td style="padding-right:10px;vertical-align:top;padding-top:5px;"><img src="../uploads/ruteo/usuario.png" width="110" height="108"></td>
                    <td style="vertical-align:top;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><b>Nro CIP</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($regcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nombres</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($nomcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Paterno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apecol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Materno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apematcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>DNI</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($lecol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                      <td>
                        <div class="control-group"  style="margin-left: 25px;">  
                            <label class="control-label">Sello:</label>
                            <div class="controls">
                          <center><a  href='../uploads/ruteo/<?php echo $regcol ; ?>.jpg' target='_blank'><img style='max-width:95%;' src='../uploads/ruteo/<?php echo $regcol; ?>.jpg' width='150' height='50'></a></center>
                            </div>                                
                        </div>
                           <div class="control-group"  style="margin-left: 25px;">  
                            <label class="control-label">Firma:</label>
                            <div class="controls">
                          <center><a  href='../uploads/ruteo/<?php echo $regcol ; ?>.jpg' target='_blank'><img style='max-width:95%;' src='../uploads/ruteo/<?php echo $regcol; ?>.jpg' width='150' height='50'></a></center>
                            </div>                                
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sexo:</label>
                    </td>
                    <td class="controls">
                    <?php echo form_dropdown('cbo_upd_col_sexo', $cbosexo, $sexcol, 'id="cbo_upd_col_sexo" style="cursor:pointer;"  required="required"'); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Fecha de Nacimiento:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_ins_col_fecnac); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Estado Civil:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_dropdown('cbo_ins_estado_civil', $cboestado_civil, $colestcivil, 'id="cbo_ins_estado_civil" style="cursor:pointer;"  required="required"'); ?>
                    </td>
                </tr> 
                                <tr>
                    <td>
                        <label>Dirección:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_textarea($txt_upd_col_direccion); ?>
                    </td>
                    <td>
                        <div class="control-group"  style="margin-left: 25px;">  
                            <label class="control-label">Zona:</label>
                            <div class="controls">
                                <select id="Zona" name="Zona" class="chzn-select" style="width:200px;">
                                    <?php
                                    foreach ($zona as $zona) {

                                        if ($zona["codzona"] == $codzona) {
                                            ?>
                                            <option selected value="<?php echo $zona["codzona"] ?>"><?php echo mb_convert_encoding($zona["descrzona"], "UTF-8") ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $zona["codzona"] ?>"><?php echo mb_convert_encoding($zona["descrzona"], "UTF-8") ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>                                
                        </div>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Email Principal:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_upd_col_emailp); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Email Secundario:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_emails); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Telefono:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_telefono); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Celular:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_upd_col_celular); ?>
                        <?php
                        if ($celuemp == "T") {
                            ?>
                            <input id="movistar" type="radio" name="celuemp" checked value="T" required> Movistar
                            <input id="claro" align ="right" type="radio" name="celuemp" value="CLARO" required> Claro
                            <?php
                        } else if ($celuemp == "CLARO") {
                            ?>
                            <input id="movistar" type="radio" name="celuemp"  value="T" required> Movistar
                            <input id="claro" align ="right" type="radio" checked name="celuemp" value="CLARO" required> Claro
                            <?php
                        } else {
                            ?>
                            <input id="movistar" type="radio" name="celuemp"  value="T" required> Movistar
                            <input id="claro" align ="right" type="radio" name="celuemp" value="CLARO" required> Claro
                            <?php
                        }
                        ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Celular RPM:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_celularrpm); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Celular RPC:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_celularrpc); ?>
                    </td>
                </tr> 
                <tr>   
                    <td>&nbsp;</td>
                    <td>  
                        <?php echo $hid_upd_regcol; ?>
                        <br/>
                        <?php echo $boton; ?> 
                    </td>  
                    <td>

                    </td>
                </tr>    
            </tbody>
        </table>         
    </fieldset><br></div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>