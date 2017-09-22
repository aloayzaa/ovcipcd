<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsRevistaUpd.js'></script> 
<?php
$frm_upd_revista = array('id' => 'frm_upd_revista',
    'name' => 'frm_upd_libro', 
    'class' => 'form-horizontal');

echo form_open('biblioteca/material/revistaUpd/'.$nMatId."/", $frm_upd_revista);

    $txt_upd_rev_titulo = array('name' => 'txt_upd_rev_titulo',
    'id' => 'txt_upd_rev_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa su titulo',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($titulo, 'UTF-8'));
    
        $txt_upd_rev_autor = array('name' => 'txt_upd_rev_autor',
    'id' => 'txt_upd_rev_autor', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($autor, 'UTF-8'));
        
        
     $txt_upd_rev_editorial = array('name' => 'txt_upd_rev_editorial',
    'id' => 'txt_upd_rev_editorial', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Editorial',
     'data-placement' => 'right',
      'value' => mb_convert_encoding($editorial, 'UTF-8'));
    
    $txt_upd_rev_edicion = array('name' => 'txt_upd_rev_edicion',
    'id' => 'txt_upd_rev_edicion', 
    'maxlength' => '500',
   "style" => "resize:none;width:100px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Año Edicion',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($edicion, 'UTF-8'));
    
    $txt_upd_rev_resumen = array('name' => 'txt_upd_rev_resumen', 
     'id' => 'txt_upd_rev_resumen', 
     "cols" => "95",
     "rows" => "10", 
      'required' => 'required',
      'value' => mb_convert_encoding($resumen, 'UTF-8')); 
    
      
     $txt_upd_rev_observacion = array('name' => 'txt_upd_rev_observacion',
    'id' => 'txt_upd_rev_observacion', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:100px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Observacion',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($observacion, 'UTF-8'));
    
     $txt_upd_rev_ejemplares = array('name' => 'txt_upd_rev_ejemplares',
    'id' => 'txt_upd_rev_ejemplares', 
    'maxlength' => '500',
 "style" => "resize:none;width:100px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ejemplares',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($ejemplares, 'UTF-8'));

    
     
 
    $boton_upd_revista = array('id' => 'boton_upd_revista',
    'name' => 'boton_upd_revista',
    'type' => 'submit', 
    'value' => 'Actualizar Libro',
    'class' => 'btn btn-primary');
      
    $hid_upd_cur_idRevista = form_hidden("hid_upd_cur_idRevista", $nMatId, "hid_upd_cur_idRevista", true);

?>

    <legend>Datos Revista</legend>
  <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_titulo">Titulo Libro:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_rev_titulo) ?>
        </div>
    </div>   
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_autor">Autor Libro:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_rev_autor) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_editorial">Editorial Libro:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_rev_editorial) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="cbo_upd_rev_edicion">Año Edicion:</label>
        <div class = "controls">

             <select name="cbo_upd_rev_edicion" id="cbo_upd_rev_edicion" >
				<?php
				for($cbo_upd_rev_edicion=(date("Y")); 1980<=$cbo_upd_rev_edicion; $cbo_upd_rev_edicion--) {
				if($edicion==$cbo_upd_rev_edicion){

                                                                         echo "<option value=".$cbo_upd_rev_edicion." selected=".selected.">".$cbo_upd_rev_edicion."</option>";
                                                                         
                                                                         }
                                                                         else{  echo "<option value=".$cbo_upd_rev_edicion.">".$cbo_upd_rev_edicion."</option>";}
						}	
				?>
			</select> 
        </div>
    </div>
    
 <div class="control-group">    
         <label class="control-label" for="cbo_rev_categoria">Categoria:</label>
        <div class = "controls">
            <?php
              $categoria=array(
                "AGRICULTURA Y CIENCIAS BIOLOGICAS","ARTE Y HUMANIDADES","NEGOCIO, ADMINISTRACION Y CONTABILIDAD",
                "INGENIERIA QUIMICA","CIENCIAS DE LA COMPUTACION","ECONOMIA.ECONOMETRIA Y FINANZAS",
                "INGENIERIA","CIENCIAS AMBIENTALES","INDUSTRIAL","CIVIL","MINAS","PUBLICIDAD","OTROS"
                );
            ?>
              <select name="cbo_categoria_upd_rev" id="cbo_categoria_upd_rev" style="width: 340px"> 
                        <?php foreach($categoria as $categoria){ 
                            if($categoriaUpd==$categoria){
                            ?> 
                        <option value="<?php echo $categoria ?>" selected="selected"><?php echo $categoria?></option> 
                        <?php } else{ ?>
                         <option value="<?php echo $categoria ?>"><?php echo $categoria?></option>
                        <?php }}?>
                    </select>
        </div>
    </div> 
    
    
    
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_resumen">Resumen:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_rev_resumen) ?>
        </div>
    </div>
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_rev_observacion) ?>
        </div>
    </div>
    
       <div class="control-group">         
    <label class="control-label" for="txt_upd_rev_ejemplares">Ejemplares:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_rev_ejemplares) ?>
        </div>
    </div>
    
    
    
    
    
    <div class = "controls">
        <?php
                echo   form_submit($boton_upd_revista);
        ?>
    </div>
    <div class = "controls">
    <?php echo $hid_upd_cur_idRevista;
    ?>
</div>
    