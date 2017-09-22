<script type="text/javascript" src="<?php echo URL_JS; ?>biblioteca/jsTesisUpload.js"></script>
<?php
$atributosForm = array('id ' => 'frm_upload_tesis', 'name ' => 'frm_upload_tesis', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$hid_upload_nMatId = array('name' => 'hid_upload_nMatId', 'id' => 'hid_upload_nMatId', 'value' => $nMatId, 'type' => 'hidden');
$txt_upload_tesis = form_upload("txt_upload_tesis", "", 'id="txt_upload_tesis"');
$txt_upload_abstract = form_upload("txt_upload_abstract", "", 'id="txt_upload_abstract"');

$btn_upload = form_button('btn_upload', 'Adjuntar Archivo', 'id="btn_upload" class="btn btn-primary"');
$btn_cancel = form_button('btn_cancel', 'Cancelar', 'id="btn_cancel" class="btn btn-primary"');
$cTipoMult=array("Tesis ","Abstract");
?>
<br/>
<div style="width: 300px"> 
    <div class="control-group">  
        <center><table style="width: 100%;position:relative;margin-left:100px;">
            <tbody>
                   <tr>
                <div class="controls">
                    <label>Tipo Multimedia:</label>
                    <?php echo form_dropdown('cTipoMult', $cTipoMult, '', 'id="cTipoMult" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Tipo" data-placement="right"'); ?>
                </div>
                </tr>
                <br>
                <tr>
          
                    <td style="vertical-align: top;">
                     <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_tesis; ?> </td>
                                </tr>
                                  <tr id="Abstract" style="display:none;">
                                    <td><?php echo $txt_upload_abstract; ?> </td>
                                </tr>
                                <tr>

                                    <td>
                                         <?php echo form_input($hid_upload_nMatId); ?>
                                        <?php echo $btn_upload; ?> <?php  echo $btn_cancel; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
            
                </tr>


            </tbody>
        </table></center>
    </div>
        <br>
    <div align="center" id="c_qry_mult" style="margin-left: 100px;position: relative;"></div>
    <?php echo form_close(); ?>
</div>