<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/horario/jsHorarioUpd.js'></script>
<?php

$frm_ins_inasistencia = array('id' => 'frm_ins_inasistencia',
    'name' => 'frm_ins_inasistencia',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/horario/inasistenciaIns/', $frm_ins_inasistencia);

echo "<input type='hidden' name='hid_idhorario' id='hid_idhorario' value='" . $idHorario . "'>";

if($sesiones != null){
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#calendarioRecuperacion').datepicker({
	altField: '#txt_ins_ses_fecha',
        dateFormat: "yy/mm/dd",
        minDate: new Date()
    });
  });
</script>

<fieldset>
    <legend>Creacion de nueva sesion de recuperacion</legend>
    <div class="control-group">
        Sesion Justificar: 
        <select name="cbo_sesiones" id="cbo_sesiones" class="input-medium tip" style="width:470px;" required="required" data-original-title="Selecione una Sesion" data-placement="right" onchange="nuevaSesionRecuperacion(this)">
            <option value="">Seleccione Sesion Inactiva para Justificar</option>
            <?php
                foreach ($sesiones as $fila) {
            ?>
            <option value="<?php echo $fila->nSesId ?>_<?php echo $fila->cSesFechaProgramada ?>"><?php echo $fila->cSesFechaProgramada ?></option>
            <?php } ?>
        </select>
    </div>
    <table>
        <tr>
            <td>
                <div id="calendarioRecuperacion"></div>
            </td>
            <td style="padding-left: 10px">
                <div id="sesionRecuperacion"></div>
            </td>
        </tr>
    </table>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen sesiones finalizadas o creadas.</div>";
}
?>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>