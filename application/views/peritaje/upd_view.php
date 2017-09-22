<script type="text/javascript" src='<?php echo URL_JS;?>peritaje/jsPersonaUpd.js'></script>  


<?php $frm_upd_persona= array('id'=>'frm_upd_persona',
    'name'=>'frm_upd_persona',
    'class'=>'form-horizontal');                
echo form_open('persona/persona/personaUpd/'.$nPerId."/",$frm_upd_persona);
  

$txt_upd_per_Dni=array('name'=>'txt_upd_per_Dni',
    'id'=>'txt_upd_per_Dni',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'readonly'=>"true",
    'value'=>  mb_convert_encoding($DNI, 'UTF-8'));
$txt_upd_per_apePat=array('name'=>'txt_upd_per_apePat',
    'id'=>'txt_upd_per_apePat',
    'style'=>"resize:none;width:200px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cPerApellidoPaterno, 'UTF-8'));        
$txt_upd_per_apeMat=array('name'=>'txt_upd_per_apeMat',
    'id'=>'txt_upd_per_apeMat',
    'style'=>"resize:none;width:200px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cPerApellidoMaterno, 'UTF-8'));        
$txt_upd_per_Nombres=array('name'=>'txt_upd_per_Nombres',
    'id'=>'txt_upd_per_Nombres',
    'style'=>"resize:none;width:200px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cPerNombres, 'UTF-8'));

$txt_upd_per_Correo=array('name'=>'txt_upd_per_Correo',
    'id'=>'txt_upd_per_Correo',
    'style'=>"resize:none;width:200px;",
    'required'=>'required',
    'class' => 'cajasemail email input-medium input-prepend tip',
    'value'=>  mb_convert_encoding($Email, 'UTF-8'));
$txt_upd_per_Telefono=array('name'=>'txt_upd_per_Telefono',
    'id'=>'txt_upd_per_Telefono',
    'style'=>"resize:none;width:150px;",
    'minlength'=>'8',
    'maxlength'=>'9',
    'class' => 'input-medium input-prepend tip',
    'value'=>  mb_convert_encoding($Tel, 'UTF-8'));
$txt_upd_per_Celular=array('name'=>'txt_upd_per_Celular',
    'id'=>'txt_upd_per_Celular',
    'style'=>"resize:none;width:150px;",
    'class' => 'input-medium input-prepend tip',
    'minlength'=>'9',
    'maxlength'=>'9',
    'required'=>'required',
    'value'=>  mb_convert_encoding($Cel, 'UTF-8'));
$hid_udp_id=  form_hidden("hid_udp_id",$nPerId,"hid_udp_id",true); 
$btn_upd_per = array('id'=>'btn_upd_per',
    'name'=>'btn_upd_per',
    'type'=>'submit',
    'value'=>'Actualizar Persona Natural',
    'class'=>'btn btn-primary' 
        );      
 ?>
<fieldset>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_Dni">Dni</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_Dni)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_apePat">Apellido Paterno</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_apePat)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_apeMat">Apellido Materno</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_apeMat)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_Nombres">Nombres</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_Nombres)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_Correo">Correo</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_Correo)?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="txt_upd_per_Telefono">Telefono</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_Telefono)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_Celular">Celular</label>
        <div class="controls">
            <?php echo form_input($txt_upd_per_Celular)?>
        </div>
    </div>
    <br>
     <div class="controls">
            <?php echo $hid_udp_id?>
        </div>
    <div class="controls">
            <?php echo form_input($btn_upd_per)?>
        </div>
</fieldset>

<?php echo form_close();?>
<?php echo validation_errors();?>