<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="<?php echo URL_JS ?>intranet/jsDatosColegiadoUpd.js"></script>
<?php
$atributosForm = array('id' => 'frm_upddatos_residencia', 'name' => 'frm_upddatos_residencia');
echo form_open('actualizacion_colegiado/DatosColegiadoIntUpd/' . $regcol . "/", $atributosForm);
$txt_upd_regcol = array('name' => 'txt_upd_regcol', 'id' => 'txt_upd_regcol');
$hid_upd_regcol = form_hidden("hid_upd_regcol", $this->session->userdata('nick'), "hid_upd_regcol", true);
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Colegiado', 'id="btn_upd_colegiado" class="btn btn-primary"');
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
                                    <td><b>Universidad</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($razsocinsacad, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Capitulo</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($desccap, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Fecha de Inscripción</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($fecinscol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Fecha de Titulo</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($fectitcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nro. Rectoral</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($nrectoral, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                            </tbody>
                        </table>
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