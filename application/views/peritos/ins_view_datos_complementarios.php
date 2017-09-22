
<script type="text/javascript" src="<?php echo URL_JS; ?>peritos/jsPeritoIns.js"></script> 
<?php $atributos = array('id'=>'frm_ins_solicitud','name'=>'frm_ins_solicitud','class' => 'form-horizontal') ?>
    <?php echo form_open('peritos/peritos/Solicitud_Peritaje_Ins',$atributos);

    
    $txt_ins_asunto = array('name' => 'txt_ins_asunto', 'id' => 'txt_ins_asunto', 'style' => 'width:300px;height:75px', 'maxlength' => '150', 'type' => 'text', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Asunto de Solicitud', 'data-original-title' => 'Escriba el asunto de Solicitud', 'data-placement' => 'right','required' => 'required');
    $txt_ins_fecha_solicitud  = array('name' => 'txt_ins_fecha_solicitud', 'id' => 'txt_ins_fecha_solicitud', 'style' => 'width:150px', 'class' => 'cajascalendar','placeholder' => 'Fecha Solicitud', 'data-original-title' => 'Seleccione la fecha','required' => 'required','readonly'=>true);
    $txt_ins_descripcion_peritaje  = array('name' => 'txt_ins_descripcion_peritaje', 'id' => 'txt_ins_descripcion_peritaje', 'style' => 'width:300px;height:130px', 'maxlength' => '500', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Descripción de Solicitud', 'data-original-title' => 'Escriba la Descripción', 'data-placement' => 'right', 'required' => 'required');
    $txt_ins_direccion_peritaje  = array('name' => 'txt_ins_direccion_peritaje', 'id' => 'txt_ins_direccion_peritaje', 'style' => 'width:300px;height:130px', 'maxlength' => '200', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Dirección del Peritaje', 'data-original-title' => 'Escriba la Dirección', 'data-placement' => 'right', 'required' => 'required');
    $txt_ins_fecha_respuesta =  array('name' => 'txt_ins_fecha_respuesta', 'id' => 'txt_ins_fecha_respuesta', 'style' => 'width:150px','class' => 'cajascalendar', 'placeholder' => 'Fecha Respuesta', 'data-original-title' => 'Seleccione la fecha', 'data-placement' => 'right','readonly'=>true);

    $nPerId = form_hidden("nPerId", $ID, "nPerId", true);
    $boton = array('name' => 'btn_ins_solicitud', 'id'=>'btn_ins_solicitud' ,'type' => 'submit', 'value' => 'Registrar Solicitud',  'class'=>"btn btn-primary");
    
    ?>
<div style="width: 550px"> 
    <br>
    <legend>Registro de Solicitud</legend>
       <fieldset>
    <div class="control-group">
        <h3><label class="control-label">N° de Solicitud:</label></h3>
         
         <h3>&nbsp&nbsp&nbsp&nbsp<?php echo($nsolicitud)?></h3>
            <?php echo $nPerId; ?>
         
    </div>
           
    <div class="control-group">  
            <label class="control-label" for="txt_ins_asunto">Asunto:</label>
                <div class="controls">
                    <?php echo form_textarea($txt_ins_asunto); ?>  
                </div>
            </div>
    <div class="control-group">
         <label class="control-label" for="txt_ins_fecha_solicitud">Fecha de Solicitud:</label>
         <div class="controls">
          <?php echo form_input($txt_ins_fecha_solicitud); ?>
         </div>
    </div>
           
    <div class="control-group">
        <label class="control-label" for="txt_ins_descripcion_peritaje">Descripción de Solicitud:</label>
        <div class="controls">
        <?php echo form_textarea($txt_ins_descripcion_peritaje); ?>    
        </div>
    </div>
  <div class="control-group">
     <label class="control-label" for="txt_ins_direccion_peritaje">Dirección de Peritaje:</label>
     <div class="controls">
     <?php echo form_textarea($txt_ins_direccion_peritaje); ?>  
     </div>
  </div>
    <div class="control-group">
        <label class="control-label" for="txt_ins_fecha_respuesta">Fecha de Respuesta:</label>
        <div class="controls">
        <?php echo form_input($txt_ins_fecha_respuesta); ?> 
        </div>
    </div>
     
       

    </div>
 
<div class="control-group">
     <div class="controls">
        <center><?php echo form_input($boton); ?></center>
     </div>
 </div>
           
</fieldset>
<?php echo form_close();?>
<?php echo validation_errors();?>


</div>