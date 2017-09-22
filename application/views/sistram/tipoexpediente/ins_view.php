
<?php
$atributosForm = array('id' => 'frm_ins_tipoexpediente',
    'name' => 'frm_ins_tipoexpediente', 
    'class' => 'form-horizontal');
echo form_open('sistram/tipoexpediente/tipoexpedienteIns', $atributosForm);


$txt_ins_texp_descripcion = array(
    'name' => 'txt_ins_texp_descripcion',
    'id' => 'txt_ins_texp_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required');

$boton = array('name' => 'btn_ins_notempre',
    'type' => 'submit', 
    'value' => 'Registrar Tipo', 
    'id="btn_ins_notempre" class="btn btn-primary"');


?>

<div style="width: 500px"> 
    <legend>Registrar Nuevo Tipo de Expediente</legend> 
    <fieldset>
        
               
         <div class="control-group">
            <label class="control-label" for="txt_ins_texp_descripcion">Descripción:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_texp_descripcion); ?>
            </div>
        </div>       
      
       
        
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="proceso"></div>
            
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>