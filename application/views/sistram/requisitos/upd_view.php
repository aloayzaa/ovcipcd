<script type="text/javascript" src='<?php echo URL_JS;?>sistram/requisitos/jsRequisitosUpd.js'></script>  


<?php
$atributosForm = array('id' => 'frm_upd_requisitos',
    'name' => 'frm_upd_requisitos', 
    'class' => 'form-horizontal');
echo form_open('sistram/requisitos/requisitosUpd', $atributosForm);


$txt_upd_req_descripcion = array(
    'name' => 'txt_upd_req_descripcion',
    'id' => 'txt_upd_req_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($cRequisitosDescripcion, "UTF-8"));

$boton = array('name' => 'btn_upd_requisitos',
    'type' => 'submit', 
    'value' => 'Actualizar Requisito', 
    'id'=>'btn_upd_requisitos', 'class'=>'btn btn-primary');


?>

<div style="width: 500px"> 
    <legend>Editar Requisito</legend> 
    <fieldset>
        
         <div class="control-group">
            <label class="control-label" for="cbo_upd_req_tipo">Tipo Requisito:</label>
            <div class="controls">
                <select id="cbo_upd_req_tipo" name="cbo_upd_req_tipo">
                    <option value="">Seleccion un tipo</option>
                    <?php if($cRequisitosTipo=='Opcional'){?>
                       <option value="Obligatorio">Obligatorio</option>
                       <option value="Opcional" selected>Opcional</option>
                    <?php } else {?>  
                       <option value="Obligatorio" selected>Obligatorio</option>
                       <option value="Opcional">Opcional</option>
                       <?php }?> 
                </select>
            </div>
        </div>
        
         <div class="control-group">
            <label class="control-label" for="txt_upd_req_descripcion">Descripción:</label>
            <div class="controls">
                <?php echo form_textarea($txt_upd_req_descripcion); ?>
            </div>
        </div>       
        <input type="hidden" name="txt_upd_req_id" value="<?php echo $nRequisitosId;?>"
            
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="procesoupd"></div>
            
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>