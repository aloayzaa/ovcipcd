<?php

$frm_ins_mensaje= array('id' => 'frm_ins_mensaje',
    'name' => 'frm_ins_mensaje',
    'class' => 'form-horizontal');
echo form_open('lib_reclamaciones/mensaje/mensajeIns', $frm_ins_mensaje);


$txt_ins_men_cDmeEmisor = array
    (
    'id' => 'txt_ins_men_cDmeEmisor',
    'name' => 'txt_ins_men_cDmeEmisor',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => "disable",
    'placeholder'=>'Nombre',
    'data-original-title' => 'Nombre Completo',
   /// 'readonly'=>'readonly'
    );
$txt_ins_men_cDmeOficina = array('name' => 'txt_ins_men_cDmeOficina',
    'id' => 'txt_ins_men_cDmeOficina');



$txt_ins_men_cMenAsunto= array
    ('id' => 'txt_ins_men_cMenAsunto',
    'name' => 'txt_ins_men_cMenAsunto',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => "disable",
    'placeholder'=>'Asunto',
    'data-original-title' => 'Asunto');
    
$txt_ins_men_cMenMensaje = array
    (
    'name' => 'txt_ins_men_cMenMensaje',
    'id' =>   'txt_ins_men_cMenMensaje', 
     "cols" => "5",
     "rows" => "5", 
     'required' => 'required');

$btn_ins_men = array
    (
    'id' => 'btn_ins_men',
    'name' => 'btn_ins_men',
    'type' => 'submit', 
    'value' => 'Registrar Mensaje',
    'class' => 'btn btn-primary');
 
 $nTpmIdTipoMensaje[''] = ' Seleccione un Tipo ';
  foreach ($TipoMensaje as $TipoMensaje)
 { $nTpmIdTipoMensaje[$TipoMensaje->nTpmIdTipoMensaje] =$TipoMensaje->cTpmTipoMensaje;}

 $filas[''] = ' Seleccione una Area ';
    foreach ($Area as $fila) {
    $filas[$fila->nAreIdArea] =$fila->cAreNombreArea;}

//    $filas2[''] = 'Seleccione un SubArea';
//    foreach ($SubArea as $fila2) {
//    $filas[$fila->nSuaIdSubArea] =$fila->cSuaNombreSubArea;}
//  
 
?>

<fieldset>
    <legend>ENVIO DE MENSAJE</legend>
    
     <div class="control-group">    
        <label class="control-label" for="cbo_ins_men_cMenTipoMensaje">Tipo Mensaje:</label>
        <div class = "controls">
        <?php
        echo form_dropdown('cbo_ins_men_cMenTipoMensaje',$nTpmIdTipoMensaje,
                            'id="cbo_ins_men_cMenTipoMensaje" 
                            class="input-medium tip"
                            style="width:260px;"
                            required="required" 
                            
                            data-placement="right"') ?>
        </div>
       </div>
   
     <div class="control-group">
     <label class="control-label" for="txt_ins_men_cDmeEmisor">Nombre:</label>
     <div class = "controls">
 <?php echo $this->session->userdata('Nombres');?>
     </div>
     </div>
     
   
     <div class="control-group">  
     <label class="control-label" for="txt_ins_men_cDmeOficina">Oficina o Sebe:</label>
     <div class = "controls">
<?php echo form_label("TRUJILLO"); ?>
     </div>
     </div>  
    
   
     
    <hr />
     
       
        <div class="control-group">    
        <label class="control-label" for="cbo_ins_men_cDmeArea">Area:</label>
        <div class = "controls">
        <?php
        
            echo form_dropdown('cbo_ins_men_cDmeArea',
                                     $filas,'',
                                     'id="cbo_ins_men_cDmeArea" 
                                     class="input-medium tip" 
                                     required="required" 
                                     
                                     data-placement="right"')?>
        </div>
       </div>
   
    <div class="control-group">    
        <label class="control-label" for="cbo_ins_men_cDmeSubArea">SubArea:</label>
        <div class = "controls">
            
        <?php
        $SubArea = array('');
        echo form_dropdown('cbo_ins_men_cDmeSubArea',
                                        $SubArea ,
                                         '',
                                           'id="cbo_ins_men_cDmeSubArea" 
                                            class="input-medium tip"    
                                            style="width:260px;"
                                            required="required" 
                                            data-original-title="Selecione SubArea" 
                                            data-placement="right"') ?>
        </div>
       </div>
   
    
    <div class="control-group">  
     <label class="control-label" for="txt_ins_men_cMenAsunto">Asunto:</label>
     <div class = "controls">
      <?php echo form_input($txt_ins_men_cMenAsunto) ?>
     </div>
     </div>  
    
   <div class="control-group"> 
   <label class="control-label" for="txt_ins_men_cMenMensaje">Mensaje:</label>
   <div class = "controls">
   <?php echo form_textarea($txt_ins_men_cMenMensaje) ?>
   </div>
   </div>

       
                                       
   <hr />
   <hr />
   
   <div class="control-group"> 
   <div class = "controls">
   <?php echo form_submit($btn_ins_men);?>
   </div>
   </div>
</fieldset>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
