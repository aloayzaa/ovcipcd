<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/sesion/jsSesionUpd.js'></script>
<?php

$frm_upd_sesiones = array('id' => 'frm_upd_sesion',
    'name' => 'frm_upd_sesion',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/sesion/sesionUpd/', $frm_upd_sesiones);

if($sesiones != null){
?>

<fieldset>
    <legend>Actualizar Titulo de Sesión</legend>
    <div class="control-group">   
        <select name="cbo_sesiones" id="cbo_sesiones" class="input-medium tip" style="width:470px;" required="required" data-original-title="Selecione una Sesion" data-placement="right" onchange="mostrarEditarSesion(this)">
            <option value="">Seleccione Sesion</option>
            <?php
                foreach ($sesiones as $fila) {
            ?>
            <option value="<?php echo $fila->nSesId ?>_<?php echo $fila->cSesTitulo ?>"><?php echo $fila->cSesTitulo ?></option>
            <?php } ?>
        </select>
    </div> 
    <input type="hidden" id="hid_idhorario" name="hid_idhorario" value="<?php echo $idHorario;?>"/>
    <div id="editarMostrar"></div>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen sesiones.</div>";
}
?>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>