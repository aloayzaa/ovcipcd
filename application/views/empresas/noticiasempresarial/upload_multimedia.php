<link rel="stylesheet" href='<?php echo URL_CSS; ?>css_pretyfoto/prettyPhoto.css'>  

<script type="text/javascript" src="<?php echo URL_JS; ?>empresas/jsNoticiasEmpresarialUploadMultim.js"></script>
<?php
$atributosForm = array('id ' => 'frm_upload_noticiamulti', 'name ' => 'frm_upload_noticiamulti', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$hid_upload_nNotCodigo = array('name' => 'hid_upload_nNotCodigo', 'id' => 'hid_upload_nNotCodigo', 'value' => $nNotCodigo, 'type' => 'hidden');
//$hid_upload_nNotCodigo = form_hidden("hid_upload_nNotCodigo", $nNotCodigo, 'id="hid_upload_nNotCodigo"', true);
$txt_upload_archivo_mult = form_upload("txt_upload_archivo_mult", "", 'id="txt_upload_archivo_mult"');

$boton = form_button('btn_uploadMult_noticia', 'Adjuntar Archivo Multimedia', 'id="btn_uploadMult_noticia" class="btn btn-primary"');
?>
<br/>
<div style="width: 400px"> 
    <div class="control-group">  

        <!--        <div class="controls">-->
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td id="updFotoEmpadronado" style="width: 30%; vertical-align: top;">
                        <a title="Foto actual" href="../uploads/cip/<?php echo $Multimedia; ?>" id="fotoempadronado"><img id="hola" src="../uploads/cip/<?php echo $Multimedia; ?>" width="100" height="100"></a>
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_archivo_mult; ?> </td>
                                </tr>
                                <tr>

                                    <td>

                               
                                         <?php echo form_input($hid_upload_nNotCodigo); ?>
                                        <?php echo $boton; ?> <span id="sms_upd_empadronamiento"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>


            </tbody>
        </table>
    </div>

    <?php echo form_close(); ?>
</div>