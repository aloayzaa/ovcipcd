
<?php 

    $frm_ins_material = array('id' => 'frm_ins_material',
    'name' => 'frm_ins_materialbibl', 
    'class' => 'form-horizontal');
    echo form_open('biblioteca/material/materialins', $frm_ins_material);
     
    $txt_ins_mat_titulo = array('name' => 'txt_ins_mat_titulo',
    'id' => 'txt_ins_mat_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Titulo Tesis',
     'data-placement' => 'right');
    
       $txt_ins_mat_autor = array('name' => 'txt_ins_mat_autor',
    'id' => 'txt_ins_mat_autor', 
    'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right');
   
    
     $txt_ins_mat_resumen= array('name' => 'txt_ins_mat_resumen', 
     'id' => 'txt_ins_mat_resumen', 
     "cols" => "95",
     "rows" => "10");
    
      $txt_ins_mat_observacion = array('name' => 'txt_ins_mat_observacion',
    'id' => 'txt_ins_mat_observacion', 
  'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'data-original-title' => 'Ingresar observacion',
     'data-placement' => 'right');
      
      $hid_tipo = array('name' => 'hid_tipo', 'id' => 'hid_tipo', 'value' => 'T', 'type' => 'hidden');


   $boton = array('id' => 'btn_ins_mat',
    'name' => 'btn_ins_mat',
    'type' => 'submit', 
    'value' => 'Registrar Tesis',
    'class' => 'btn btn-primary');
    

    $filas[''] = 'Seleccione un Capitulo';
    foreach ($capitulos as $fila) {
    $filas[$fila->codcap] =$fila->desccap;}
    
?>

<div id="Tesis">

  <div class="control-group">    
       <label class="control-label" for="txt_ins_mat_titulo">Titulo Tesis:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_mat_titulo) ?>
        </div>
    </div>   
    
  <div class="control-group">    
      <label class="control-label" for="txt_ins_mat_autor">Nombre Autor(es):</label>
        <div class = "controls">
       <?php echo form_textarea( $txt_ins_mat_autor);?>
        </div>
    </div>   
    
    
   
  <div class="control-group">      
      <label class="control-label" for="capitulos">Capitulo:</label>
        <div class = "controls">
            <?php
            echo form_dropdown('capitulos',$filas,'','id="capitulos" class="input-medium tip" style="width:260px;" data-original-title="Selecione capitulo" data-placement="right" ') 
            ?>
        </div> 
    </div>   
    
  <div class="control-group">     
      <label class="control-label" for="tespecialidad">Especialidad:</label>
        <div class = "controls">
            <?php  
             $especialidad = array('');
            echo form_dropdown('especialidad',$especialidad,'','id="especialidad" class="input-medium tip" style="width:260px;" data-original-title="Selecione especialidad" data-placement="right"'); 
            ?>
        </div>
    </div>   
    
  <div class="control-group">  
                        <label class="control-label">Universidad:</label>
            <div class="controls">
                <div id="mostrar_combo_universidad"></div>
            </div>                                                        
   </div>
    
        <div class="control-group"> 
            <label class="control-label" for="cbo_anos">Año:</label>
        <div class = "controls">
     
             <select name="cbo_anos" id="cbo_anos" >
				<?php
				for($cbo_anos=(date("Y")); 1980<=$cbo_anos; $cbo_anos--) {
				echo "<option value=".$cbo_anos.">".$cbo_anos."</option>";
						}	
				?>
			</select> 
        </div>
    </div> 
   
<div class="control-group">                 
    <label class="control-label" for="txt_ins_mat_resumen">Resumen:</label>
        <div style="width:540px;" class = "controls">
            <?php echo form_textarea($txt_ins_mat_resumen) ;?>
        </div>
    </div>   
    
<div class="control-group">         
    <label class="control-label" for="txt_ins_mat_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_mat_observacion) ?>
            <?php echo form_input($hid_tipo); ?>
        </div>
    </div>   



<p></p>

<div class = "controls">
    <?php echo form_input($boton) ?>
</div>


</div>


<?php echo form_close(); ?>
<?php echo validation_errors(); ?>