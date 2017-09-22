<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/curso/jsCursoAsig.js'></script>
<?php
$frm_upd_curso_asig = array('id' => 'frm_upd_curso_asig',
    'name' => 'frm_upd_curso_asig', 
    'class' => 'form-horizontal');

echo form_open('campus_virtual/curso/cursoUpd/'.$idCurso."/", $frm_upd_curso_asig);

$txt_upd_cur_nombre = array('id' => 'txt_upd_cur_nombre',
    'name' => 'txt_upd_cur_nombre',
    'style' => 'resize:none;width:220px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un nombre',
    'readonly'=>'true',
    'value' => mb_convert_encoding($nombre, 'UTF-8'));

$txt_upd_asig_cuenta = array('id' => 'txt_upd_asig_cuenta',
    'name' => 'txt_upd_asig_cuenta',
    'style' => 'resize:none;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba una cuenta',
    'value' => mb_convert_encoding($cuenta, 'UTF-8'));
       
$btn_upd_asig_cuenta = form_submit('btn_upd_asig_cuenta', 'Asignar Cuenta', 'id="btn_upd_asig_cuenta" class="btn btn-primary"');
$hid_upd_cur_idCurso = form_hidden("hid_upd_cur_idCurso", $idCurso, "hid_upd_cur_idCurso", true);

?>
<fieldset>
    <legend>Datos Curso</legend>
    <div class="control-group">
        <label id="label" class="control-label">Nombre: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_nombre) ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Cuenta Ingreso: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_asig_cuenta) ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo $btn_upd_asig_cuenta;
        ?>
    </div>
    <div class = "controls">
    <?php echo $hid_upd_cur_idCurso;
    ?>
</div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>