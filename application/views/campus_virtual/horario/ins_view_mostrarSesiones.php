<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/horario/jsHorarioTemporal.js'></script>
<?php

$frm_ins_fechasTemporales = array('id' => 'frm_ins_fechasTemporales',
    'name' => 'frm_ins_fechasTemporales',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/horario/insertarSesionesInactivas', $frm_ins_fechasTemporales);

$btn_activarHorario = form_submit('btn_activarHorario', 'Activar Horario', 'id="btn_activarHorario" class="btn btn-primary"');

echo "<input type='hidden' name='hid_idhorario' id='hid_idhorario' value='" . $horario['idHorario'] . "'>";

if($verificar['cantidad'] > 0){
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> El Horario ya fue activado.</div>";
}
else{
?>

<fieldset>
    <legend>Activar Sesiones de Horario</legend>
    <table>
        <tr>
            <td style="width: 150px;"><label id="label" class="control-label" style="font-weight: bolder;">N° de Matriculados: </label></td>
            <td style="width: 300px"><?php echo $horario['matriculados'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px;"><label id="label" class="control-label" style="font-weight: bolder;">Nombre del Curso: </label></td>
            <td style="width: 300px"><?php echo $horario['Curso'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Nombre del Docente: </label></td>
            <td style="width: 300px"><?php echo $horario['Docente'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Fecha de Inicio y Fin: </label></td>
            <td style="width: 300px"><?php echo $horario['fechainicio'].' - '.$horario['fechafin'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Dias: </label></td>
            <td style="width: 300px"><?php echo $horario['dia'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Hora de Inicio y Fin: </label></td>
            <td style="width: 300px"><?php echo $horario['horainicio'].' - '.$horario['horafin'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Ambiente: </label></td>
            <td style="width: 150px"><?php echo $horario['ambiente'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Duración: </label></td>
            <td style="width: 300px"><?php echo $horario['duracion'].' Sesiones' ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Dias Limite: </label></td>
            <td style="width: 300px"><?php echo $horario['diaslimite'] ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Costo: </label></td>
            <td style="width: 300px"><?php echo $horario['costo'] ?></td>
        </tr>
    </table>
    
    <div class = "controls">
        <?php
                echo $btn_activarHorario;
        ?>
    </div>
</fieldset>
<?php 
    }
?>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>