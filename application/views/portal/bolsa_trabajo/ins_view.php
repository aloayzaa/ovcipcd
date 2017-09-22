<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$atributosForm = array('id' => 'frm_ins_bolsatrabajo', 'name' => 'frm_ins_bolsatrabajo', 'class' => 'form-horizontal');
echo form_open('portal/bolsa_trabajo/BolsaTrabajoIns', $atributosForm);

$txt_ins_bolsa_fecha = array('name' => 'txt_ins_bolsa_fecha', 'id' => 'txt_ins_bolsa_fecha', 'class' => 'cajascalendar','required' => 'required');
$txt_ins_bolsa_titulo = array('name' => 'txt_ins_bolsa_titulo', 'id' => 'txt_ins_bolsa_titulo', 'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_bolsa_sumilla = array('name' => 'txt_ins_bolsa_sumilla', 'id' => 'txt_ins_bolsa_sumilla', 'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Sumilla', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_bolsa_contenido = array('name' => 'txt_ins_bolsa_contenido', 'id' => 'txt_ins_bolsa_contenido', "cols" => "95", "rows" => "10", 'required' => 'required');
$boton = array('name' => 'btn_ins_bolsa', 'type' => 'submit', 'value' => 'Registrar Bolsa de Trabajo', 'id="btn_ins_bolsa" class="btn btn-primary"');

?>

<div style="width: 700px"> 
    <legend>Registrar Nueva Bolsa de Trabajo</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="txt_ins_bolsa_fecha">Fecha Final:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_bolsa_fecha); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_bolsa_titulo">Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_bolsa_titulo); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_bolsa_sumilla">Sumilla:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_bolsa_sumilla); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_bolsa_contenido">Contenido:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_bolsa_contenido); ?>
            </div>
        </div>
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>