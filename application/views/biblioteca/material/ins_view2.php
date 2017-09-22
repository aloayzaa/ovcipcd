<?php 

   $frm_ins_libro = array('id' => 'frm_ins_libro',
    'name' => 'frm_ins_libro', 
    'class' => 'form-horizontal');
    echo form_open('biblioteca/material/materialins', $frm_ins_libro);

    
    $txt_ins_lib_titulo = array('name' => 'txt_ins_lib_titulo',
    'id' => 'txt_ins_lib_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Titulo Libro',
     'data-placement' => 'right');

    $txt_ins_lib_autor = array('name' => 'txt_ins_lib_autor',
    'id' => 'txt_ins_lib_autor', 
   'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right');
    
    $txt_ins_lib_editorial = array('name' => 'txt_ins_lib_editorial',
    'id' => 'txt_ins_lib_editorial', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Editorial',
     'data-placement' => 'right');
    
        
     $txt_ins_lib_resumen = array('name' => 'txt_ins_lib_resumen',
    'id' => 'txt_ins_lib_resumen', 
   "cols" => "95",
     "rows" => "10");
      
     $txt_ins_lib_observacion = array('name' => 'txt_ins_lib_observacion',
    'id' => 'txt_ins_lib_observacion', 
    'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'data-original-title' => 'Ingresa observacion',
     'data-placement' => 'right');
    
     $txt_ins_lib_ejemplares = array('name' => 'txt_ins_lib_ejemplares',
    'id' => 'txt_ins_lib_ejemplares', 
    'maxlength' => '500',
    "style" => "resize:none;width:100px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Numero Ejemplares',
     'data-placement' => 'right');
      $val='L';
      
     $hid_tipo2 = array('name' => 'hid_tipo2', 'id' => 'hid_tipo2', 'value' => $val, 'type' => 'hidden');

   $boton2 = array('id' => 'btn_ins_mate',
    'name' => 'btn_ins_mate',
    'type' => 'submit', 
    'value' => 'Registrar Libro',
    'class' => 'btn btn-primary');
   
 
    
?>
<div id="libro">
    <!--<fieldset>-->
       <div class="control-group">         
    <label class="control-label" for="txt_ins_lib_titulo">Titulo Libro:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_lib_titulo) ?>
        </div>
    </div>   
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_lib_autor">Autor :</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_lib_autor) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_lib_editorial">Editorial :</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_lib_editorial) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="cbo_edicion_libro">Año Edicion:</label>
        <div class = "controls">
       
              <select name="cbo_edicion_libro" id="cbo_edicion_libro" >
				<?php
				for($cbo_edicion_libro=(date("Y")); 1980<=$cbo_edicion_libro; $cbo_edicion_libro--) {
				echo "<option value=".$cbo_edicion_libro.">".$cbo_edicion_libro."</option>";
						}	
				?>
			</select> 
        </div>
    </div>
    
 <div class="control-group">    
         <label class="control-label" for="cbo_lib_categoria">Categoria:</label>
        <div class = "controls">
             <?php
           
            $categoria=array(
                "VARIOS","AGRICOLA","AGROINDUSTRIAL",
                "AGRONOMOS","AMBIENTAL","CIVIL",
                "ELECTRONICA","GEOLOGOS","INDUSTRIAL","MECANICA","MINAS, METALURICA",
                "PESQUERO","QUIMICOS","SANITARIA","SISTEMAS","ZOOTECNIA"
                );
 
            ?>
               <select name="cbo_categoria_lib" id="cbo_categoria_lib" required="required"> 
                        <?php foreach($categoria as $categoria){ ?> 
                        <option value="<?php  echo $categoria?>"><?php echo $categoria ?></option> 
                        <?php } ?> 
                    </select>
        </div>
    </div> 
    
    

       <div class="control-group">         
    <label class="control-label" for="$txt_ins_lib_resumen">Resumen:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_lib_resumen) ?>
        </div>
    </div>
    
     <div class="control-group">         
         <label class="control-label" for="$txt_ins_lib_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_lib_observacion) ?>
        </div>
    </div>
    
      <div class="control-group">         
         <label class="control-label" for="$txt_ins_lib_ejemplares">Ejemplares:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_lib_ejemplares) ?>
              <?php echo form_input($hid_tipo2); ?>
        </div>
    </div>
   
    
    <div class = "controls">
      
    <?php echo form_input($boton2) ?>
</div>
</div>



<?php echo form_close(); ?>
<?php echo validation_errors(); ?>