
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsMaterialUpd.js'></script> 
<?php
$frm_upd_material = array('id' => 'frm_upd_material',
    'name' => 'frm_upd_material', 
    'class' => 'form-horizontal');

echo form_open('biblioteca/material/materialUpd/'.$nMatId."/", $frm_upd_material);

 $txt_upd_mat_titulo = array('name' => 'txt_upd_mat_titulo',
    'id' => 'txt_upd_mat_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Titulo Tesis',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($titulo, 'UTF-8'));
    
    $txt_upd_mat_autor = array('name' => 'txt_upd_mat_autor',
    'id' => 'txt_upd_mat_autor', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right',
      'value' => mb_convert_encoding($autor, 'UTF-8'));
    
     $txt_upd_mat_resumen= array('name' => 'txt_upd_mat_resumen', 
     'id' => 'txt_upd_mat_resumen', 
     "cols" => "95",
     "rows" => "10", 
      'required' => 'required',
      'value' => mb_convert_encoding($resumen, 'UTF-8'));
    
      $txt_upd_mat_observacion = array('name' => 'txt_upd_mat_observacion',
    'id' => 'txt_upd_mat_observacion', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa una Observacion',
     'data-placement' => 'right' ,
     'value' => mb_convert_encoding($observacion, 'UTF-8')  );
      
      $boton_upd = array('id' => 'boton_upd',
    'name' => 'boton_upd',
    'type' => 'submit', 
    'value' => 'Actualizar Material',
    'class' => 'btn btn-primary');
      
    $hid_upd_cur_idMaterial = form_hidden("hid_upd_cur_idMaterial", $nMatId, "hid_upd_cur_idMaterial", true);
    

    $filas[''] = 'Seleccione un Capitulo';
    foreach ($capitulos as $fila) {
    $filas[$fila->codcap] =$fila->desccap;}
    
    $filas2[''] = 'Seleccione una Especialidad';
    foreach ($especialidad as $fila2) {
    $filas2[$fila2->codesp] =$fila2->descesp;}


    
?>

<fieldset>
 <div class="control-group">    
       <label class="control-label" for="txt_upd_mat_titulo">Titulo Tesis:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_mat_titulo) ?>
        </div>
    </div> 
    
    
    <div class="control-group">    
      <label class="control-label" for="$txt_upd_mat_autor">Nombre Autor(es):</label>
        <div class = "controls">
       <?php echo form_textarea( $txt_upd_mat_autor);?>
        </div>
    </div>  

    
<div class="control-group">      
      <label class="control-label" for="capitulos">Capitulo:</label>
        <div class = "controls">
            <?php
            echo form_dropdown('capitulos_upd',$filas,mb_convert_encoding($capitulo, 'UTF-8'),'id="capitulos_upd" class="input-medium tip" style="width:260px;"  required="required"  data-original-title="Selecione capitulo" data-placement="right"') 
            ?>
        </div> 
    </div>   

  <div class="control-group">     
      <label class="control-label" for="tespecialidad">Especialidad:</label>
        <div class = "controls">
            <?php  

            echo form_dropdown('especialidad_upd',$filas2,mb_convert_encoding($especialidades, 'UTF-8'),'id="especialidad_upd" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione especialidad" data-placement="right"'); 
            ?>
        </div>
    </div>   



                    <div class="control-group">  
                        <label class="control-label">Universidad:</label>
                        <div class="controls">
                            <select id="universidad" name="universidad" class="chzn-select" style="width:390px;">
                                <?php
                                foreach ($universidad as $universidad) {

                                    if ($universidad["codinsacad"] == $universidadcod) {
                                        ?>
                                        <option selected value="<?php echo $universidad["codinsacad"] ?>"><?php echo mb_convert_encoding($universidad["razsocinsacad"],"UTF-8") ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $universidad["codinsacad"] ?>"><?php echo mb_convert_encoding($universidad["razsocinsacad"],"UTF-8") ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>                                
                    </div>
             
   <div class="control-group"> 
            <label class="control-label" for="cbo_anos_upd">Año:</label>
        <div class = "controls">
      
             <select name="cbo_anos" id="cbo_anos" >
				<?php
				for($cbo_anos=(date("Y")); 1980<=$cbo_anos; $cbo_anos--) {
				if($ano==$cbo_anos){

                                                                         echo "<option value=".$cbo_anos." selected=".selected.">".$cbo_anos."</option>";
                                                                         
                                                                         }
                                                                         else{  echo "<option value=".$cbo_anos.">".$cbo_anos."</option>";}
						}	
				?>
			</select> 
        </div>
    </div> 


    <div class="control-group">                 
    <label class="control-label" for="$txt_upd_mat_resumen">Resumen:</label>
        <div style="width:540px;" class = "controls">
            <?php echo form_textarea($txt_upd_mat_resumen) ;?>
        </div>
    </div>   
    
<div class="control-group">         
    <label class="control-label" for="$txt_upd_mat_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_mat_observacion) ?>
        </div>
    </div>   
    
    <div class = "controls">
    <?php echo form_input($boton_upd) ?>
</div>
    
    
    <div class = "controls">
    <?php echo $hid_upd_cur_idMaterial;
    ?>
</div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
