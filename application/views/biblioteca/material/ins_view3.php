<?php 

   $frm_ins_revista = array('id' => 'frm_ins_revista',
    'name' => 'frm_ins_revista', 
    'class' => 'form-horizontal');
    echo form_open('biblioteca/material/materialins', $frm_ins_revista);
     
    
    
     $txt_ins_rev_titulo = array('name' => 'txt_ins_rev_titulo',
    'id' => 'txt_ins_rev_titulo', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Titulo Revista',
     'data-placement' => 'right');
    
 
    $txt_ins_rev_autor = array('name' => 'txt_ins_rev_autor',
    'id' => 'txt_ins_rev_autor', 
    'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Autor(es)',
     'data-placement' => 'right');
    
     $txt_ins_rev_editorial = array('name' => 'txt_ins_rev_editorial',
    'id' => 'txt_ins_rev_editorial', 
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Editorial',
     'data-placement' => 'right');
     
 
    
     $txt_ins_rev_resumen = array('name' => 'txt_ins_rev_resumen',
    'id' => 'txt_ins_rev_resumen', 
    "cols" => "95",
     "rows" => "10", 
      'required' => 'required');
     
     $txt_ins_rev_observacion = array('name' => 'txt_ins_rev_observacion',
    'id' => 'txt_ins_rev_observacion', 
    'maxlength' => '300',
   "style" => "resize:none;width:350px;height:50px;",
     'class' => 'input-medium input-prepend tip',
     'data-original-title' => 'Ingresar observacion',
     'data-placement' => 'right');
     
     $txt_ins_rev_ejemplares = array('name' => 'txt_ins_rev_ejemplares',
    'id' => 'txt_ins_rev_ejemplares', 
    'maxlength' => '500',
    "style" => "resize:none;width:100px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Numero de Ejemplares',
     'data-placement' => 'right');
     
     
     $hid_tipo3 = array('name' => 'hid_tipo3', 'id' => 'hid_tipo3', 'value' => 'R', 'type' => 'hidden');
   
   
   $boton3 = array('id' => 'btn_ins_mate2',
    'name' => 'btn_ins_mate2',
    'type' => 'submit', 
    'value' => 'Registrar Revista',
    'class' => 'btn btn-primary');
    
?>

<div id="revista" >
  
       <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_titulo">Titulo Revista:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_rev_titulo) ?>
        </div>
    </div>   
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_autor">Autor:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_rev_autor) ?>
        </div>
    </div>  
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_editorial">Editorial:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_rev_editorial) ?>
        </div>
    </div> 
    
    <div class="control-group">         
    <label class="control-label" for="cbo_edicion_revista">Año Edicion:</label>
        <div class = "controls">
          
              <select name="cbo_edicion_revista" id="cbo_edicion_revista" >
				<?php
				for($cbo_edicion_revista=(date("Y")); 1980<=$cbo_edicion_revista; $cbo_edicion_revista--) {
				echo "<option value=".$cbo_edicion_revista.">".$cbo_edicion_revista."</option>";
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
               "AGRICULTURA Y CIENCIAS BIOLOGICAS","ARTE Y HUMANIDADES","NEGOCIO, ADMINISTRACION Y CONTABILIDAD",
                "INGENIERIA QUIMICA","CIENCIAS DE LA COMPUTACION","ECONOMIA.ECONOMETRIA Y FINANZAS",
                "INGENIERIA","CIENCIAS AMBIENTALES","INDUSTRIAL","CIVIL","MINAS","PUBLICIDAD","OTROS"
                );

            ?>
               <select name="cbo_categoria_rev" id="cbo_categoria_rev" style="width: 340px"> 
                        <?php foreach($categoria as $categoria){ ?> 
                        <option value="<?php  echo $categoria?>"><?php echo $categoria ?></option> 
                        <?php } ?> 
                    </select>
        </div>
    </div>
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_resumen">Resumen:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_rev_resumen) ?>
        </div>
    </div> 
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_observacion">Observacion:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_rev_observacion) ?>
        </div>
    </div> 
    
    <div class="control-group">         
    <label class="control-label" for="txt_ins_rev_ejemplares">Ejemplares:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_rev_ejemplares) ?>
            <?php echo form_input($hid_tipo3); ?>
            
        </div>
    </div> 

    <div class = "controls">
    <?php echo form_input($boton3) ?>
</div>
</div>


<?php echo form_close(); ?>
<?php echo validation_errors(); ?>