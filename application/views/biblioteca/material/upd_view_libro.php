<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsLibroUpd.js'></script> 
<?php
$frm_upd_libro = array('id' => 'frm_upd_libro',
    'name' => 'frm_upd_libro', 
    'class' => 'form-horizontal');

echo form_open('biblioteca/material/libroUpd/'.$nMatId."/", $frm_upd_libro);

    $txt_upd_lib_titulo = array('name' => 'txt_upd_lib_titulo',
    'id' => 'txt_upd_lib_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa su titulo',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($titulo, 'UTF-8'));
    
        $txt_upd_lib_autor = array('name' => 'txt_upd_lib_autor',
    'id' => 'txt_upd_lib_autor', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($autor, 'UTF-8'));
        
        
     $txt_upd_lib_editorial = array('name' => 'txt_upd_lib_editorial',
    'id' => 'txt_upd_lib_editorial', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Editorial',
     'data-placement' => 'right',
      'value' => mb_convert_encoding($editorial, 'UTF-8'));
    
    $txt_upd_lib_edicion = array('name' => 'txt_upd_lib_edicion',
    'id' => 'txt_upd_lib_edicion', 
    'maxlength' => '500',
   "style" => "resize:none;width:100px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Año Edicion',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($edicion, 'UTF-8'));
    
    $txt_upd_lib_resumen = array('name' => 'txt_upd_lib_resumen', 
     'id' => 'txt_upd_lib_resumen', 
     "cols" => "95",
     "rows" => "10", 
      'required' => 'required',
      'value' => mb_convert_encoding($resumen, 'UTF-8'));
    
      
     $txt_upd_lib_observacion = array('name' => 'txt_upd_lib_observacion',
    'id' => 'txt_upd_lib_observacion', 
    'maxlength' => '500',
   "style" => "resize:none;width:350px;height:100px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Observacion',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($observacion, 'UTF-8'));
    
     $txt_upd_lib_ejemplares = array('name' => 'txt_upd_lib_ejemplares',
    'id' => 'txt_upd_lib_ejemplares', 
    'maxlength' => '500',
 "style" => "resize:none;width:100px;height:25px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ejemplares',
     'data-placement' => 'right',
     'value' => mb_convert_encoding($ejemplares, 'UTF-8'));

    
     
 
    $boton_upd_libro = array('id' => 'boton_upd_libro',
    'name' => 'boton_upd_libro',
    'type' => 'submit', 
    'value' => 'Actualizar Libro',
    'class' => 'btn btn-primary');
      
    $hid_upd_cur_idLibro = form_hidden("hid_upd_cur_idLibro", $nMatId, "hid_upd_cur_idLibro", true);
    



?>
<fieldset>
    <legend>Datos Libro</legend>
  <div class="control-group">         
    <label class="control-label" for="txt_upd_lib_titulo">Titulo Libro:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_lib_titulo) ?>
        </div>
    </div>   
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_lib_autor">Autor Libro:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_lib_autor) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_lib_editorial">Editorial Libro:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_lib_editorial) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="cbo_upd_lib_edicion">Año Edicion:</label>
        <div class = "controls">
 
            <select name="cbo_upd_lib_edicion" id="cbo_upd_lib_edicion" >
				<?php
				for($cbo_upd_lib_edicion=(date("Y")); 1980<=$cbo_upd_lib_edicion; $cbo_upd_lib_edicion--) {
				if($edicion==$cbo_upd_lib_edicion){

                                                                         echo "<option value=".$cbo_upd_lib_edicion." selected=".selected.">".$cbo_upd_lib_edicion."</option>";
                                                                         
                                                                         }
                                                                         else{  echo "<option value=".$cbo_upd_lib_edicion.">".$cbo_upd_lib_edicion."</option>";}
						}	
				?>
			</select> 
        </div>
    </div>
    
 <div class="control-group">    
         <label class="control-label" for="cbo_categoria_upd_lib">Categoria:</label>
        <div class = "controls">
            <?php
            $categoria=array(
                "VARIOS","AGRICOLA","AGROINDUSTRIAL",
                "AGRONOMOS","AMBIENTAL","CIVIL",
                "ELECTRONICA","GEOLOGOS","INDUSTRIAL","MECANICA","MINAS, METALURICA",
                "PESQUERO","QUIMICOS","SANITARIA","SISTEMAS","ZOOTECNIA"
                );

            ?>
            <select name="cbo_categoria_upd_lib" id="cbo_categoria_upd_lib"> 
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
    <label class="control-label" for="txt_upd_lib_resumen">Resumen:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_upd_lib_resumen) ?>
        </div>
    </div>
    
    <div class="control-group">         
    <label class="control-label" for="txt_upd_lib_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_lib_observacion) ?>
        </div>
    </div>
    
       <div class="control-group">         
    <label class="control-label" for="txt_upd_lib_ejemplares">Ejemplares:</label>
        <div class = "controls">
            <?php echo form_input($txt_upd_lib_ejemplares) ?>
        </div>
    </div>
    
    
    
    
    
    <div class = "controls">
        <?php
                echo   form_submit($boton_upd_libro);
        ?>
    </div>
    <div class = "controls">
    <?php echo $hid_upd_cur_idLibro;
    ?>
</div>
    </fieldset>