<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/matricula/jsAlumnoUpd.js'></script>
<?php

$frm_upd_alumno = array('id' => 'frm_upd_alumno',
    'name' => 'frm_upd_alumno',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/matricula/alumnoUpd/'.$idPersona."/", $frm_upd_alumno);

$txt_upd_alu_nombres = array('id' => 'txt_upd_alu_nombres',
    'name' => 'txt_upd_alu_nombres',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba nombres',
    'placeholder' => 'Nombres',
    'value' => mb_convert_encoding($nombres, 'UTF-8'));

$txt_upd_alu_apellidoPaterno = array('id' => 'txt_upd_alu_apellidoPaterno',
    'name' => 'txt_upd_alu_apellidoPaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido paterno',
    'placeholder' => 'Apellido Paterno',
    'value' => mb_convert_encoding($apellidoPaterno, 'UTF-8'));

$txt_upd_alu_apellidoMaterno = array('id' => 'txt_upd_alu_apellidoMaterno',
    'name' => 'txt_upd_alu_apellidoMaterno',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba apellido materno',
    'placeholder' => 'Apellido Materno',
    'value' => mb_convert_encoding($apellidoMaterno, 'UTF-8'));

$txt_upd_alu_dni = array('id' => 'txt_upd_alu_dni',
    'name' => 'txt_upd_alu_dni',
    'style' => 'resize:none;width:75px;',
    'class' => 'input-medium input-prepend tip',
    'maxlength' => '8',
    'required' => 'required',
    'data-original-title' => 'Escriba un D.N.I.',
    'placeholder' => 'D.N.I.',
    'value' => mb_convert_encoding($dni, 'UTF-8'));

$txt_upd_alu_telefono = array('id' => 'txt_upd_alu_telefono',
    'name' => 'txt_upd_alu_telefono',
    'style' => 'resize:none;width:150px;',
    'class' => 'cajascell',
    'required' => 'required',
    'data-original-title' => 'Escriba un telefono',
    'placeholder' => 'Telefono',
    'value' => mb_convert_encoding($telefono, 'UTF-8'));

$txt_upd_alu_correoElectronico = array('id' => 'txt_upd_alu_correoElectronico',
    'name' => 'txt_upd_alu_correoElectronico',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un correo electronico',
    'placeholder' => 'Correo Electronico',
    'value' => mb_convert_encoding($correoElectronico, 'UTF-8'));

$txt_upd_alu_direccion = array('id' => 'txt_upd_alu_direccion',
    'name' => 'txt_upd_alu_direccion',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba una direccion',
    'placeholder' => 'Direccion',
    'value' => mb_convert_encoding($direccion, 'UTF-8'));

$btn_upd_alu = array('id' => 'btn_upd_alu',
    'name' => 'btn_upd_alu',
    'type' => 'submit', 
    'value' => 'Modificar Alumno',
    'class' => 'btn btn-primary');

$hid_upd_alu_idPersona = form_hidden("hid_upd_alu_idPersona", $idPersona, "hid_upd_alu_idPersona", true);

?>

<fieldset>
    <legend>Datos Alumno</legend>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_dni); ?>
        </div>
    </div>     
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_nombres); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_apellidoPaterno); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_apellidoMaterno); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_telefono); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_correoElectronico); ?>
        </div>
    </div>
    <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_upd_alu_direccion); ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo form_submit($btn_upd_alu);
        ?>
    </div>
</fieldset>
<div class = "controls">
    <?php echo $hid_upd_alu_idPersona;
    ?>
</div>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>