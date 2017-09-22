<script type="text/javascript" src="<?php echo URL_JS; ?>biblioteca/jsLibUpload.js"></script>
<?php
$atributosForm = array('id ' => 'frm_upload_libro', 'name ' => 'frm_upload_libro', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$hid_upload_nMatId_lib = array('name' => 'hid_upload_nMatId_lib', 'id' => 'hid_upload_nMatId_lib', 'value' => $nMatId, 'type' => 'hidden');
$txt_upload_libro = form_upload("txt_upload_libro", "", 'id="txt_upload_libro"');

$btn_upload_libro = form_button('btn_upload_libro', 'Adjuntar Archivo', 'id="btn_upload_libro" class="btn btn-primary"');
$btn_cancel_libro = form_button('btn_cancel_libro', 'Cancelar', 'id="btn_cancel_libro" class="btn btn-primary"');
?>
<br/>
<div style="width: 400px"> 
    <div class="control-group">  
        <table style="width: 100%;">
            <tbody>
                <tr>            
                     
                    <td id="updFotoEmpadronado" style="width: 30%; vertical-align: top;">
                        <a title="Foto actual" href="../uploads/cip/<?php echo $multimedialibro; ?>" id="fotoempadronado"><img style="max-width:95%;border:6px double #545565;" src="../uploads/cip/<?php echo $multimedialibro; ?>" width="100" height="100"></a>
                    </td>
                    
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_libro; ?> </td>
                                </tr>
                                <tr>

                                    <td>

                               
                                         <?php echo form_input($hid_upload_nMatId_lib); ?>
                                        <?php echo $btn_upload_libro; ?> <?php  echo $btn_cancel_libro; ?>
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