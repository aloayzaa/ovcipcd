<script type="text/javascript" src='<?php echo URL_JS;?>sistram/tramite/jsTramiteUpd.js'></script>  


<?php
$atributosForm = array('id' => 'frm_upd_tramite',
    'name' => 'frm_upd_tramite', 
    'class' => 'form-horizontal');
echo form_open('sistram/requisitos/requisitosUpd', $atributosForm);

$txt_upd_tramite_titulo = array(
    'name' => 'txt_upd_tramite_titulo', 
    'id' => 'txt_upd_tramite_titulo', 
    "style" =>"resize:none;width:300px;", 
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Esriba su Titulo', 
    'data-placement' => 'right', 
    'required' => 'required',
     'value'=>mb_convert_encoding($cTramiteTitulo, "UTF-8"));

$txt_upd_tramite_descripcion = array(
    'name' => 'txt_upd_tramite_descripcion',
    'id' => 'txt_upd_tramite_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 300px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($cTramiteDescripcion, "UTF-8"));

$boton = array('name' => 'btn_upd_tramite',
    'type' => 'submit', 
    'value' => 'Actualizar Requisito', 
    'id'=>'btn_upd_tramite', 'class'=>'btn btn-primary');


?>

<div style="width: 500px"> 
    <legend>Editar Requisito</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="txt_upd_tramite_titulo">Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_upd_tramite_titulo); ?>
            </div>
         </div>
                
         <div class="control-group">
            <label class="control-label" for="txt_upd_tramite_descripcion">Descripción:</label>
            <div  class="controls">
                <?php echo form_textarea($txt_upd_tramite_descripcion); ?>
            </div>
        </div>
        
     
        <div id="detalle_requisitos">
                   <?php $this->load->view('sistram/tramite/requisitos_view'); ?>
          
        </div>
            
       
        
        <input type="hidden" id="txt_upd_tramite_id" name="txt_upd_tramite_id" value="<?php echo $nTramiteId;?>">
        
        <div class="control-group"> 
        <label class="control-label" for="cbo_upd_dirigidoa">Dirigido a:</label>
            <div class="controls">
                <select id="cbo_upd_dirigidoa" name="cbo_upd_dirigidoa">
                    <?php if($cTramiteTipoPersona == 'Secretario'){ ?>
                    <option selected="selected" value="Secretario">Director Secretario</option>
                    <option value="Administrador">Administrador</option>
                  
                    <?php }else {?>
                     <option  value="Secretario">Director Secretario</option>
                     <option selected="selected" value="Administrador">Administrador</option>
                   <?php }?> 
                </select>
            </div>
        </div>
        
        
        <div class="control-group">
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="procesoupd"></div>
        </div>
          
       
    </fieldset>
</div> 
<?php echo form_close(); ?>
