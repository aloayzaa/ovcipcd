
<?php
$atributosForm = array('id' => 'frm_ins_requisitos',
    'name' => 'frm_ins_requisitos', 
    'class' => 'form-horizontal');
echo form_open('sistram/requisitos/requisitosIns', $atributosForm);


$txt_ins_req_descripcion = array(
    'name' => 'txt_ins_req_descripcion',
    'id' => 'txt_ins_req_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required');

$boton = array('name' => 'btn_ins_requisitos',
    'type' => 'submit', 
    'value' => 'Registrar Requisito', 
    'id'=>'btn_ins_requisitos','class'=>'btn btn-primary');


?>

<div style="width: 500px"> 
    <legend>Registrar Nuevo Requisito</legend> 
    <fieldset>
        
         <div class="control-group">
            <label class="control-label" for="cbo_ins_req_tipo">Tipo Requisito:</label>
            <div class="controls">
                <select id="cbo_ins_req_tipo" name="cbo_ins_req_tipo">
                    <option value="">Seleccion un tipo</option>
                    <option value="Obligatorio">Obligatorio</option>
                    <option value="Opcional">Opcional</option>
                </select>
            </div>
        </div>
        
         <div class="control-group">
            <label class="control-label" for="txt_ins_req_descripcion">Descripción:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_req_descripcion); ?>
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