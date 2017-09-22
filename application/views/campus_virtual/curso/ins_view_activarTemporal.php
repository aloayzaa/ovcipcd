<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/curso/jsCursoTemporal.js'></script>
<?php

$frm_ins_activarCursoTemporales = array('id' => 'frm_ins_activarCursoTemporal',
    'name' => 'frm_ins_activarCursoTemporal',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/curso/activarCursosTemporales', $frm_ins_activarCursoTemporales);

$btn_activarCurso = form_submit('btn_activarCurso', 'Activar Curso', 'id="btn_activarCurso" class="btn btn-primary"');

echo "<input type='hidden' name='hid_idCurso' id='hid_idCurso' value='" . $idCurso . "'>";

?>

<fieldset>
    <legend>Activar Curso Temporal</legend>
    <table>
        <tr>
            <td style="width: 150px;"><label id="label" class="control-label" style="font-weight: bolder;">Nombre de la Asignatura: </label></td>
            <td style="width: 300px"><?php echo $nombre ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Tipo: </label></td>
            <td style="width: 300px"><?php echo $tipo ?></td>
        </tr>
        <tr>
            <td style="width: 150px"><label id="label" class="control-label" style="font-weight: bolder;">Descripción: </label></td>
            <td style="width: 300px"><?php echo $descripcion ?></td>
        </tr>
    </table>
    
    <div class = "controls">
        <?php
                echo $btn_activarCurso;
        ?>
    </div>
</fieldset>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>