<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/docente/jsDocenteUpd.js'></script>
<?php

$frm_upd_docente = array('id' => 'frm_upd_docente',
    'name' => 'frm_upd_docente',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/docente/docenteUpd/'.$idPersona."/", $frm_upd_docente);

$txt_upd_doc_nombres = array('id' => 'txt_upd_doc_nombres',
    'name' => 'txt_upd_doc_nombres',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba nombres',
    'placeholder' => 'Nombres',
    'value' => mb_convert_encoding($nombres, 'UTF-8'));

$txt_upd_doc_apellidoPaterno = array('id' => 'txt_upd_doc_apellidoPaterno',
    'name' => 'txt_upd_doc_apellidoPaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido paterno',
    'placeholder' => 'Apellido Paterno',
    'value' => mb_convert_encoding($apellidoPaterno, 'UTF-8'));

$txt_upd_doc_apellidoMaterno = array('id' => 'txt_upd_doc_apellidoMaterno',
    'name' => 'txt_upd_doc_apellidoMaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido materno',
    'placeholder' => 'Apellido Materno',
    'value' => mb_convert_encoding($apellidoMaterno, 'UTF-8'));

$txt_upd_doc_dni = array('id' => 'txt_upd_doc_dni',
    'name' => 'txt_upd_doc_dni',
    'style' => 'resize:none;width:75px;',
    'class' => 'input-medium input-prepend tip',
    'maxlength' => '8',
    'required' => 'required',
    'readonly' => 'yes',
    'data-original-title' => 'Escriba un D.N.I.',
    'placeholder' => 'D.N.I.',
    'value' => mb_convert_encoding($dni, 'UTF-8'));

$txt_upd_doc_telefono = array('id' => 'txt_upd_doc_telefono',
    'name' => 'txt_upd_doc_telefono',
    'style' => 'resize:none;width:150px;',
    'class' => 'cajascell',
    'required' => 'required',
    'data-original-title' => 'Escriba un telefono',
    'placeholder' => 'Telefono',
    'value' => mb_convert_encoding($telefono, 'UTF-8'));

$txt_upd_doc_correoElectronico = array('id' => 'txt_upd_doc_correoElectronico',
    'name' => 'txt_upd_doc_correoElectronico',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un correo electronico',
    'placeholder' => 'Correo Electronico',
    'value' => mb_convert_encoding($correoElectronico, 'UTF-8'));

$txt_upd_doc_direccion = array('id' => 'txt_upd_doc_direccion',
    'name' => 'txt_upd_doc_direccion',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba una direccion',
    'placeholder' => 'Direccion',
    'value' => mb_convert_encoding($direccion, 'UTF-8'));

$btn_upd_doc = array('id' => 'btn_upd_doc',
    'name' => 'btn_upd_doc',
    'type' => 'submit', 
    'value' => 'Modificar Docente',
    'class' => 'btn btn-primary');

$hid_upd_doc_idPersona = form_hidden("hid_upd_doc_idPersona", $idPersona, "hid_upd_doc_idPersona", true);

?>

<fieldset>
    <legend>Datos Docente</legend>
    <div class="control-group">   
        <label id="label" class="control-label">DNI: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_dni); ?>
        </div>
    </div>     
    <div class="control-group">   
        <label id="label" class="control-label">Nombres: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_nombres); ?>
        </div>
    </div>
    <div class="control-group">    
        <label id="label" class="control-label">Apellido Paterno: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_apellidoPaterno); ?>
        </div>
    </div>
    <div class="control-group">  
        <label id="label" class="control-label">Apellido Materno: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_apellidoMaterno); ?>
        </div>
    </div>
    <div class="control-group">   
        <label id="label" class="control-label">Telefono: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_telefono); ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Correo Electronico: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_correoElectronico); ?>
        </div>
    </div>
    <div class="control-group">   
        <label id="label" class="control-label">Dirección: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_doc_direccion); ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo form_submit($btn_upd_doc);
        ?>
    </div>
</fieldset>
<div class = "controls">
    <?php echo $hid_upd_doc_idPersona;
    ?>
</div>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>