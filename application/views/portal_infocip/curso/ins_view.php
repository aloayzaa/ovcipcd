<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/curso/jsCurso.js'></script>

<?php

$frm_ins_curso = array('id' => 'frm_ins_curso',
    'name' => 'frm_ins_curso',
    'class' => 'form-horizontal');
echo form_open('portal_infocip/curso/cursoIns', $frm_ins_curso);

$txt_ins_cur_nombre = array('id' => 'txt_ins_cur_nombre',
    'name' => 'txt_ins_cur_nombre',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un nombre',
    'placeholder' => 'Nombre');

$txt_ins_cur_descripcion = array('id' => 'txt_ins_cur_descripcion',
    'name' => 'txt_ins_cur_descripcion',
    'style' => 'resize:none;width:270px;height:150px',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba una descripción',
    'placeholder' => 'Descripción');

$btn_ins_curso = form_submit('btn_ins_curso', 'Registrar Curso', 'id="btn_ins_curso" class="btn btn-primary"');

?>

<fieldset>
    <legend>Datos Curso</legend>
    <div class="control-group"> 
        <label id="label" class="control-label">Tipo: </label>
        <div class="controls"> 
            <select name="cbo_ins_cur_tipo">
                    <option value="CURSO" selected>CURSO</option>
                    <option value="DIPLOMADO">DIPLOMADO</option>
            </select>
        </div>
    </div>
    <div class="control-group"> 
        <label id="label" class="control-label">Nombre: </label>
        <div class="controls"> 
            <?php echo form_input($txt_ins_cur_nombre) ?>
        </div>
    </div>
    <div class="control-group"> 
        <label id="label" class="control-label">Descripción: </label>
        <div class="controls">
            <?php echo form_textarea($txt_ins_cur_descripcion) ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo $btn_ins_curso;
        ?>
    </div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
