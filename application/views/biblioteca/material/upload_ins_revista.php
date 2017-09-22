<!--<link rel="stylesheet" href='<?php echo URL_CSS; ?>css_pretyfoto/prettyPhoto.css'>--> 
<script type="text/javascript" src="<?php echo URL_JS; ?>biblioteca/jsRevinsUpload.js"></script>
<?php
$atributosForm = array('id ' => 'frm_upload_ins_revista', 'name ' => 'frm_upload_ins_revista', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
//$hid_upload_nMatId = array('name' => 'hid_upload_nMatId', 'id' => 'hid_upload_nMatId', 'value' => $nMatId, 'type' => 'hidden');
//$hid_upload_nNotCodigo = form_hidden("hid_upload_nNotCodigo", $nNotCodigo, 'id="hid_upload_nNotCodigo"', true);
$txt_upload_ins_revista = form_upload("txt_upload_ins_revista", "", 'id="txt_upload_ins_revista"');

$btn_upload_ins_revista = form_button('btn_upload_ins_revista', 'Adjuntar Archivo', 'id="btn_upload_ins_revista" class="btn btn-primary"');
$btn_cancel_ins_revista = form_button('btn_cancel_ins_revista', 'Cancelar', 'id="btn_cancel_ins_revista" class="btn btn-primary"');
?>
<br/>
<div style="width: 400px"> 
    <div class="control-group">  

        <!--        <div class="controls">-->
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td id="updFotoEmpadronado" style="width: 30%; vertical-align: top;">
                        <a title="Foto actual" id="fotoempadronado"><img style="max-width:95%;border:6px double #545565;" src="../uploads/cip/prohibido.png" width="100" height="100"></a>
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_ins_revista; ?> </td>
                                </tr>
                                <tr>

                                    <td>

                               
                                         <?php //echo form_input($hid_upload_nNotCodigo); ?>
                                        <?php echo $btn_upload_ins_revista; ?> <span id="sms_upd_empadronamiento"></span><?php echo $btn_cancel_ins_revista; ?>
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
