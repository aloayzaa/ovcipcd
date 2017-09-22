<script type="text/javascript" src='<?php echo URL_JS;?>peritaje/jspersonains.js'></script>
<?php $atributos = array('id'=>'frm_ins_persona','name'=>'frm_ins_persona','class' => 'form-horizontal') ?>
    <?php echo form_open('peritaje/persona/personaIns',$atributos);

    $txt_ins_per_DNI = array('name' => 'txt_ins_per_DNI', 'id' => 'txt_ins_per_DNI', 'style' => 'width:250px', 'maxlength' => '8', 'type' => 'text', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'DNI', 'data-original-title' => 'Escriba su DNI', 'data-placement' => 'right','required' => 'required');
    $txt_ins_per_apePat = array('name' => 'txt_ins_per_apePat', 'id' => 'txt_ins_per_apePat', 'style' => 'width:250px', 'maxlength' => '80', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Apellido Paterno', 'data-original-title' => 'Escriba su Apellido Paterno', 'data-placement' => 'right', 'required' => 'required');
    $txt_ins_per_apeMat = array('name' => 'txt_ins_per_apeMat', 'id' => 'txt_ins_per_apeMat', 'style' => 'width:250px', 'maxlength' => '80', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Apellido Paterno', 'data-original-title' => 'Escriba su Apellido Materno', 'data-placement' => 'right', 'required' => 'required');
    $txt_ins_per_Nombres = array('name' => 'txt_ins_per_Nombres', 'id' => 'txt_ins_per_Nombres', 'style' => 'width:250px', 'maxlength' => '200', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Nombres', 'data-original-title' => 'Escriba sus Nombres', 'data-placement' => 'right', 'required' => 'required');
    $txt_ins_per_Correo =  array('name' => 'txt_ins_per_Correo', 'id' => 'txt_ins_per_Correo', 'style' => 'width:250px', 'maxlength' => '80', 'class' => 'cajasemail email input-medium input-prepend tip', 'placeholder' => 'Email', 'data-original-title' => 'Escriba su Email', 'data-placement' => 'right');
    $txt_ins_per_Telefono = array('name' => 'txt_ins_per_Telefono', 'id' => 'txt_ins_per_Telefono', 'style' => 'width:250px', 'maxlength' => '15', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Celular', 'data-original-title' => 'Escriba su Celular', 'data-placement' => 'right');
    $boton = array('name' => 'btn_ins_per', 'id'=>'btn_ins_per' ,'type' => 'submit', 'value' => 'Registrar Persona',  'class'=>"btn btn-primary");
?>
<div style="width: 550px"> 
    <legend>Registro Persona Natural</legend>
       <fieldset>
    <div class="control-group">
         <label class="control-label" for="txt_ins_per_DNI">DNI:</label>
         <div class="controls">
          <?php echo form_input($txt_ins_per_DNI); ?> <span id="preload_dni"> </span>
         </div>
    </div>
    
    <div class="control-group">
         <label class="control-label" for="txt_ins_per_apePat">Apellido Paterno:</label>
         <div class="controls">
          <?php echo form_input($txt_ins_per_apePat); ?>
         </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_ins_per_apeMat">Apellido Materno:</label>
        <div class="controls">
        <?php echo form_input($txt_ins_per_apeMat); ?>    
        </div>
    </div>
  <div class="control-group">
     <label class="control-label" for="txt_ins_per_Nombres">Nombres:</label>
     <div class="controls">
     <?php echo form_input($txt_ins_per_Nombres); ?>  
     </div>
  </div>
    <div class="control-group">
        <label class="control-label" for="txt_ins_per_Correo">Email:</label>
        <div class="controls">
        <?php echo form_input($txt_ins_per_Correo); ?> 
        </div>
    </div>
 <div class="control-group">
     <label class="control-label" for="txt_ins_per_Telefono">Celular:</label>
     <div class="controls">
     <?php echo form_input($txt_ins_per_Telefono); ?>
     </div>
 </div>

<div class="control-group">
     <div class="controls">
        <?php echo form_input($boton); ?>
     </div>
 </div>
           
</fieldset>
<?php echo form_close();?>
<?php echo validation_errors();?>


</div>