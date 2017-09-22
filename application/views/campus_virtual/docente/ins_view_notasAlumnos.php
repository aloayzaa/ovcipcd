<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/notas/jsNotas.js'></script>
<?php

$frm_ins_notas = array('id' => 'frm_ins_notas',
    'name' => 'frm_ins_notas',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/cursosdocente/notaIns/', $frm_ins_notas);

$btn_ins_cerrar = form_button('btn_ins_cerrar',
    'Cerrar', 
    'id="btn_ins_cerrar" class="btn btn-primary"');

if($sesiones != null){
?>

<fieldset>
    <legend>Notas</legend>
    <div class="control-group">   
        <select name="cbo_sesiones" id="cbo_sesiones" class="input-medium tip" style="width:470px;" data-placement="right" onchange="filtroNotaSesion(this)">
            <option value="">Seleccione Sesion</option>
            <?php
                foreach ($sesiones as $fila) {
            ?>
            <option value="<?php echo $fila->nSesId ?>_<?php echo $idHorario ?>"><?php echo $fila->cSesTitulo ?></option>
            <?php } ?>
        </select>
    </div>
    <span id="preload"></span><div id="tabla"></div>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen sesiones.</div>";
}
?>
<br>
<div class = "controls" onclick="cerrar()">
       <?php
                echo $btn_ins_cerrar;
        ?>
    </div>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>