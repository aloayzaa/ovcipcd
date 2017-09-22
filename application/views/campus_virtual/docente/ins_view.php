<?php

$frm_ins_docente = array('id' => 'frm_ins_docente',
    'name' => 'frm_ins_docente',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/docente/docenteIns', $frm_ins_docente);

$txt_ins_doc_nombres = array('id' => 'txt_ins_doc_nombres',
    'name' => 'txt_ins_doc_nombres',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba nombres',
    'placeholder' => 'Nombres');

$txt_ins_doc_apellidoPaterno = array('id' => 'txt_ins_doc_apellidoPaterno',
    'name' => 'txt_ins_doc_apellidoPaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido paterno',
    'placeholder' => 'Apellido Paterno');

$txt_ins_doc_apellidoMaterno = array('id' => 'txt_ins_doc_apellidoMaterno',
    'name' => 'txt_ins_doc_apellidoMaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido materno',
    'placeholder' => 'Apellido Materno');

$txt_ins_doc_usuario = array('id' => 'txt_ins_doc_usuario',
    'name' => 'txt_ins_doc_usuario',
    'style' => 'resize:none;width:75px;',
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Escriba un Usuario',
    'placeholder' => 'Usuario');

$txt_ins_doc_dni = array('id' => 'txt_ins_doc_dni',
    'name' => 'txt_ins_doc_dni',
    'style' => 'resize:none;width:75px;',
    'class' => 'input-medium input-prepend tip',
    'maxlength' => '8',
    'required' => 'required',
    'data-original-title' => 'Escriba un D.N.I.',
    'placeholder' => 'D.N.I.');

$txt_ins_doc_telefono = array('id' => 'txt_ins_doc_telefono',
    'name' => 'txt_ins_doc_telefono',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un telefono',
    'placeholder' => 'Telefono');

$txt_ins_doc_correoElectronico = array('id' => 'txt_ins_doc_correoElectronico',
    'name' => 'txt_ins_doc_correoElectronico',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un correo electronico',
    'placeholder' => 'Correo Electronico');

$btn_fnd_doc = array('id' => 'btn_fnd_doc',
    'name' => 'btn_fnd_doc',
    'type' => 'submit', 
    'value' => 'Buscar Docente',
    'class' => 'btn btn-primary');

$btn_ins_doc = array('id' => 'btn_ins_doc',
    'name' => 'btn_ins_doc',
    'type' => 'submit', 
    'value' => 'Registrar Docente',
    'class' => 'btn btn-primary');

?>

<fieldset>
    <legend>Datos Docente</legend>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_dni); 
                  echo form_submit($btn_fnd_doc);
            ?>
        </div>
    </div>     
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_nombres); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_apellidoPaterno); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_apellidoMaterno); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_telefono); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_correoElectronico); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_ins_doc_usuario); ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo form_submit($btn_ins_doc);
        ?>
    </div>
</fieldset>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>