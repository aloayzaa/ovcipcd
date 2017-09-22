<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
$atributosForm = array('id' => 'frm_ins_anunciotrabajo', 'name' => 'frm_ins_anunciotrabajo', 'class' => 'form-horizontal');
echo form_open('portal_infocip/anuncio/AnuncioIns', $atributosForm);

$txt_ins_anuncio_fecha = array('name' => 'txt_ins_anuncio_fecha', 'id' => 'txt_ins_anuncio_fecha', 'class' => 'cajascalendar', 'required' => 'required');
$txt_ins_anuncio_titulo = array('name' => 'txt_ins_anuncio_titulo', 'id' => 'txt_ins_anuncio_titulo', 'maxlength' => '500', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_anuncio_sumilla = array('name' => 'txt_ins_anuncio_sumilla', 'id' => 'txt_ins_anuncio_sumilla', 'maxlength' => '500', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Sumilla', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_anuncio_contenido = array('name' => 'txt_ins_anuncio_contenido', 'id' => 'txt_ins_anuncio_contenido', "cols" => "95", "rows" => "10", 'required' => 'required');
$boton = array('name' => 'btn_ins_anuncio', 'type' => 'submit', 'value' => 'Registrar Anuncio', 'id="btn_ins_anuncio" class="btn btn-primary"');
?>

<div style="width: 700px"> 
    <legend>Registrar Nuevo Anuncio</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_anuncio_fecha">
                Fecha caducidad:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_anuncio_fecha); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_anuncio_titulo">
                Nombre del Anuncio:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_anuncio_titulo); ?>
            </div>
        </div>
                 <div class="control-group">   
    <label class="control-label" for="Nombre">Seleccione Portal:</label>
        <div class = "controls">
                 <select name="cbo_ins_tipo_portal" id="cbo_ins_tipo_portal">
                    <option value="INFOCIP" selected>INFOCIP</option>
                    <option value="CIP">PORTAL CIP</option>
            </select>
    </div>    </div> 
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_anuncio_sumilla">
                Link del Anuncio:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_anuncio_sumilla); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_anuncio_contenido"
                   >Contenido:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_anuncio_contenido); ?>
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