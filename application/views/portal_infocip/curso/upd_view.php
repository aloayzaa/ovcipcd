<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/curso/jsCursoUpd.js'></script>
<?php
$frm_upd_curso = array('id' => 'frm_upd_curso',
    'name' => 'frm_upd_curso', 
    'class' => 'form-horizontal');

echo form_open('portal_infocip/curso/cursoUpd/'.$idCurso."/", $frm_upd_curso);

$txt_upd_cur_nombre = array('id' => 'txt_upd_cur_nombre',
    'name' => 'txt_upd_cur_nombre',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un nombre',
    'value' => mb_convert_encoding($nombre, 'UTF-8'));

$txt_upd_cur_descripcion = array('id' => 'txt_upd_cur_descripcion',
    'name' => 'txt_upd_cur_descripcion',
    'style' => 'resize:none;width:200px;height:150px',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba una descripción',
    'value' => mb_convert_encoding($descripcion, 'UTF-8'));

//$txt_ins_cur_descuento = array('id' => 'txt_ins_cur_descuento',
//    'name' => 'txt_ins_cur_descuento',
//    'style' => 'resize:none;width:150px;',
//    'class' => 'input-medium input-prepend tip',
//    'data-original-title' => 'Escriba un descuento',
//    'placeholder' => 'Descuento',
//    'value' => mb_convert_encoding($descuento, 'UTF-8'));

$btn_upd_curso = form_submit('btn_upd_curso', 'Actualizar Curso', 'id="btn_upd_curso" class="btn btn-primary"');

$hid_upd_cur_idCurso = form_hidden("hid_upd_cur_idCurso", $idCurso, "hid_upd_cur_idCurso", true);

?>
<fieldset>
    <legend>Datos Curso</legend>
    <div class="control-group">
        <label id="label" class="control-label">Tipo: </label>
        <div class = "controls">
            <select name="cbo_upd_cur_tipo">
                <?php
                    if($tipo == 'CURSO'){
                ?>
                <option value="CURSO" selected>CURSO</option>
                <option value="DIPLOMADO">DIPLOMADO</option>
                <?php
                    }
                    else{
                ?>
                <option value="CURSO">CURSO</option>
                <option value="DIPLOMADO" selected>DIPLOMADO</option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Nombre: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_nombre) ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Descripción: </label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_cur_descripcion) ?>
        </div>
    </div>
    <div class = "controls">
        <?php
                echo $btn_upd_curso;
        ?>
    </div>
    <div class = "controls">
    <?php echo $hid_upd_cur_idCurso;
    ?>
</div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>