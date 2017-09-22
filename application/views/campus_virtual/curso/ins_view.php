<?php

$frm_ins_curso = array('id' => 'frm_ins_curso',
    'name' => 'frm_ins_curso',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/curso/cursoIns', $frm_ins_curso);

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
    'data-original-title' => 'Escriba una descripción',
    'placeholder' => 'Descripción');

$btn_ins_curso = form_submit('btn_ins_curso', 'Registrar Asignatura', 'id="btn_ins_curso" class="btn btn-primary"');

?>

<fieldset>
    <legend>Datos Asignatura</legend>
    <div class="control-group"> 
        <label id="label" class="control-label">Tipo: </label>
        <div class="controls"> 
            <select name="cbo_ins_cur_tipo" id='cbo_ins_cur_tipo' onchange="cbo_tipo_ins()">
                    <option value="CURSO" selected>CURSO</option>
                    <option value="DIPLOMADO">DIPLOMADO</option>
                    <option value="CURSO-IEPI">CURSO-IEPI</option>
                    <option value="DIPLOMADO-IEPI">DIPLOMADO-IEPI</option>
            </select>
         
        </div>
    </div>
    <div class="control-group" id="div_cantidadmodulos">
        
    </div>
    <div id="div_detallemodulo">
        
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


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>