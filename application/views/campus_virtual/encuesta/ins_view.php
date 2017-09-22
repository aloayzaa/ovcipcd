<?php

$frm_ins_encuesta = array('id' => 'frm_ins_encuesta',
    'name' => 'frm_ins_encuesta',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/encuesta/encuestaIns', $frm_ins_encuesta);

$txt_ins_pre_enunciado = array('id' => 'txt_ins_pre_enunciado',
    'name' => 'txt_ins_pre_enunciado', 'maxlength' => '200',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-placement' => 'right',
    'data-original-title' => 'Escriba la pregunta',
    'placeholder' => 'Pregunta');

$btn_ins_encuesta = form_submit('btn_ins_encuesta',
    'Registrar Pregunta', 
    'id="btn_ins_encuesta" class="btn btn-primary"');

?>

<fieldset>
    <legend>Preguntas de Encuesta</legend>
    <div class="control-group"> 
        <div class="controls"> 
            <select name="cbo_ins_pre_bloque" width ="300px;">
                <option value="1" selected>Al Docente</option>
                <option value="2">Al Curso</option>
                <option value="3">A los Materiales </option>
                <option value="4">A la Infraestructura</option>
                <option value="5">A los Servicio Complementarios</option>
            </select>
        </div>
    </div>
    <div class="control-group"> 
        <div class="controls"> 
            <?php echo form_textarea($txt_ins_pre_enunciado) ?>
        </div>
    </div>
    <br>
    <div class = "controls">
        <?php
                echo $btn_ins_encuesta;
        ?>
    </div>
</fieldset>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
