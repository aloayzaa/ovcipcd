<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/encuesta/jsEncuestaUpd.js'></script>
<?php
$frm_upd_encuesta = array('id' => 'frm_upd_encuesta',
    'name' => 'frm_upd_encuesta', 
    'class' => 'form-horizontal');

echo form_open('campus_virtual/encuesta/enunciadoUpd/'.$idpregunta."/", $frm_upd_encuesta);

$txt_upd_pre_enunciado = array('id' => 'txt_upd_pre_enunciado',
    'name' => 'txt_upd_pre_enunciado',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba La pregunta',
    'placeholder' => 'Pregunta',
    'value' => mb_convert_encoding($enunciado, 'UTF-8'));  

$btn_upd_encuesta = form_submit('btn_upd_encuesta',
    'Actualizar Pregunta', 
    'id="btn_upd_encuesta" class="btn btn-primary"');

$hid_upd_pre_idpregunta = form_hidden("hid_upd_pre_idpregunta", $idpregunta, "hid_upd_pre_idpregunta", true);

?>
<fieldset>
    <legend>Datos pregunta</legend>

    <div class="control-group">
        <div class = "controls">
            <?php echo form_textarea($txt_upd_pre_enunciado) ?>
        </div>
    </div>
    
    <div class = "controls">
        <?php
                echo $btn_upd_encuesta;
        ?>
    </div>
    <div class = "controls">
    <?php echo $hid_upd_pre_idpregunta;
    ?>
</div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>