<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/material/jsMaterial.js'></script>

<?php

$atributosForm = array('id ' => 'frm_ins_material', 'name ' => 'frm_ins_material', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);

$txt_upload_mat = form_upload("txt_upload_mat", "", 'id="txt_upload_mat"');


if($sesiones != null){
?>

<fieldset>
    <legend>Material</legend> 
    <select name="cbo_sesiones" id="cbo_sesiones" class="input-medium tip" style="width:200px;" data-placement="right">
        <option value="">Seleccione Sesion</option>
        <?php
        foreach ($sesiones as $fila) {
            ?>
            <option value="<?php echo $fila->nSesId ?>"><?php echo $fila->cSesTitulo ?></option>
        <?php } ?>
    </select>
    <div style="padding-bottom: 20px;"></div>
    <div class="control-group">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td><?php echo $txt_upload_mat; ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="button" name="btn_uploadMaterial" id="btn_uploadMaterial" value="Adjuntar Archivo" class="btn btn-primary"/>
                        <input type="button" name="btn_cancelMaterial" id="btn_cancelMaterial" value="Cancelar" class="btn btn-primary"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen sesiones para adjuntar material.</div>";
}
?>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>