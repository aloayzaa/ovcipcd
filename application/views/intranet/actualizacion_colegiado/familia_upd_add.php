<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsFamiliaColegiado.js"></script>
<?php
$atributosForm = array('id' => 'frm_add_familiar', 'name' => 'frm_add_familiar');
echo form_open('actualizacion_colegiado/AgregarFamiliar/', $atributosForm);
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $regcol, 'type' => 'hidden');

$txt_upd_apepatfam = array('name' => 'txt_upd_apepatfam', 'id' => 'txt_upd_apepatfam', 'maxlength' => '200', "style" => "resize:none;width:214px;");
$txt_upd_apematfam = array('name' => 'txt_upd_apematfam', 'id' => 'txt_upd_apematfam', 'maxlength' => '200', "style" => "resize:none;width:214px;");
$txt_upd_nomfam = array('name' => 'txt_upd_nomfam', 'id' => 'txt_upd_nomfam', 'maxlength' => '200', "style" => "resize:none;width:214px;");
$txt_upd_fecnac = array('name' => 'txt_upd_fecnac', 'id' => 'txt_upd_fecnac', 'class' => 'cajascalendar', 'required' => 'required','readonly' => true);

$cboparentesco = array(
    '' => 'Seleccionar',
    'E' => 'ESPOSO(A)',
    'H' => 'HIJO(A)',
);

$cboestadovf = array(
    '' => 'Seleccionar',
    'V' => 'VIVO',
    'F' => 'FALLECIDO'
);
$boton = form_submit('btn_upd_addfamiliar', 'Agregar Familiar', 'id="btn_upd_addfamiliar" class="btn btn-primary"');
?>
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    
    <fieldset>     
        <table>
            <tbody>
                <tr>
             <td style="vertical-align:top;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b></b></td>
                                    <td><b>&nbsp;</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Apellido Paterno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"> <?php echo form_input($txt_upd_apepatfam); ?></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Apellido Materno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_input($txt_upd_apematfam); ?></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Nombres</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_input($txt_upd_nomfam); ?></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Fecha Nacimiento</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_input($txt_upd_fecnac); ?></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Parentesco</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"> <?php echo form_dropdown('cbo_upd_parentesco', $cboparentesco, '', 'id="cbo_upd_parentesco" style="cursor:pointer;"  required="required"'); ?></td>
                                </tr>
                                 <tr>
                                     <td style="width:20px;"></td>
                                    <td><b>Estado</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_dropdown('cbo_upd_estado', $cboestadovf, '', 'id="cbo_upd_estado" style="cursor:pointer;"  required="required"'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> 

                <tr>   
                    <td><b><div id="preLoad"></div></b></td>
                    <td>  
                        <?php echo form_input($hid_upd_regcol); ?>
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