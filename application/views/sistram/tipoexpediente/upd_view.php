<script type="text/javascript" src='<?php echo URL_JS;?>sistram/tipoexpediente/jsTipoexpedienteUpd.js'></script>  


<?php
$atributosForm = array('id' => 'frm_upd_tipoexpediente',
    'name' => 'frm_upd_tipoexpediente', 
    'class' => 'form-horizontal');
echo form_open('sistram/tipoexpediente/tipoexpedienteUpd', $atributosForm);


$txt_upd_texp_descripcion = array(
    'name' => 'txt_upd_texp_descripcion',
    'id' => 'txt_upd_texp_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($cTipexpedienteDescripcion, "UTF-8"));

$boton = array('name' => 'btn_upd_notempre',
    'type' => 'submit', 
    'value' => 'Actualizar Tipo', 
    'id="btn_upd_notempre" class="btn btn-primary"');


?>

<div style="width: 500px"> 
    <legend>Editar Tipo de Expediente</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="$txt_upd_texp_descripcion">Descripción:</label>
            <div class="controls">
                <?php echo form_textarea($txt_upd_texp_descripcion); ?>
            </div>
        </div>       
        <input type="hidden" name="txt_upd_texp_id" value="<?php echo $nTipexpedienteId;?>"
            
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="procesoupd"></div>
    </fieldset>        
</div> 
    
    <?php echo form_close(); ?>
</div>