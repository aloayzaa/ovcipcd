
<?php
$atributosForm = array('id' => 'frm_ins_tramite',
    'name' => 'frm_ins_tramite', 
    'class' => 'form-horizontal');
echo form_open('sistram/tramite/tramiteIns', $atributosForm);

$txt_ins_tramite_titulo = array(
    'name' => 'txt_ins_tramite_titulo', 
    'id' => 'txt_ins_tramite_titulo', 
    "style" =>"resize:none;width:300px;", 
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Esriba su Titulo', 
    'data-placement' => 'right', 
    'required' => 'required'); 


$txt_ins_tramite_descripcion = array(
    'name' => 'txt_ins_tramite_descripcion',
    'id' => 'txt_ins_tramite_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 300px;",
    'required' => 'required');


$boton = array('name' => 'btn_ins_tramite',
    'type' => 'submit', 
    'value' => 'Registrar Requisito', 
    'id'=>'btn_ins_tramite', 'class'=>'btn btn-primary');
?>

<div style="width: 500px"> 
    <legend>Registrar Nuevo Tramite</legend> 
    <fieldset>
          <div class="control-group">
            <label class="control-label" for="txt_ins_tramite_titulo">Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_tramite_titulo); ?>
            </div>
         </div>
        
         <div class="control-group">
            <label class="control-label" for="cbo_ins_tramite_requisitos">Requisitos:</label>
            <div class="controls">
                <select class="select" style="width: 310px;" multiple="multiple" id="cbo_ins_tramite_requisitos" name="cbo_ins_tramite_requisitos[]">
                    <?php foreach($requisitos as $requisito){?>
                    <option value="<?php echo $requisito->nRequisitosId;?>"><?php echo $requisito->cRequisitosDescripcion;?></option>
                    
                    <?php }?>
                </select>
            </div>
        </div>
        
         <div class="control-group">
            <label class="control-label" for="txt_ins_tramite_descripcion">Descripción:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_tramite_descripcion); ?>
            </div>
        </div>       
        <div class="control-group">
            <label class="control-label" for="dirigidoa">Dirigido a:</label>
            <div class="controls">
                <select id="cbo_dirigidoa" name="cbo_dirigidoa">
                   
                    <option selected="selected" value="Secretario">Director Secretario</option>
                    <option value="Administrador">Administrador</option>
                </select>
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