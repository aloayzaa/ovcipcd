
<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsMaterial.js'></script>   
 <script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsLibro.js'></script>   
  <script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsRevista.js'></script>
   

<?php


//nombre tesisi auor
$radio_mat1 = array('name' => 'rdbmatbus', 'id' => 'radio_mat1', 'value' => 'codigo', 'checked' =>  'checked');
$radio_mat2 = array('name' => 'rdbmatbus', 'id' => 'radio_mat2', 'value' => 'autor');
$radio_mat3 = array('name' => 'rdbmatbus', 'id' => 'radio_mat3', 'value' => 'titulo');
$radio_mat4 = array('name' => 'rdbmatbus', 'id' => 'radio_mat4', 'value' => 'ultimo');
$txt_fnd_mat_criterio = array('name' => 'txt_fnd_mat_criterio', 'id' => 'txt_fnd_mat_criterio', 'maxlength' => '10', 'class' => 'input-medium tip',"style" => "width:90px;");
$boton = form_submit('btn_fnd_material', 'Buscar', 'id="btn_fnd_material" class="btn btn-primary"');
$botonultimo = form_submit('btn_fnd_material1', 'Buscar Ultimas', 'id="btn_fnd_material1" class="btn btn-primary"');



 $radio_lib1 = array('name' => 'rdblibbus', 'id' => 'radio_lib1', 'value' => 'titulo', 'checked' =>  'checked');
$radio_lib2 = array('name' => 'rdblibbus', 'id' => 'radio_lib2', 'value' => 'autor');
$radio_lib3 = array('name' => 'rdblibbus', 'id' => 'radio_lib3', 'value' => 'ultimo');
$txt_fnd_lib_criterio = array('name' => 'txt_fnd_lib_criterio', 'id' => 'txt_fnd_lib_criterio', 'maxlength' => '50', 'class' => 'input-medium tip', "style" => "width:200px;");
$boton1 = form_submit('btn_fnd_libro', 'Buscar', 'id="btn_fnd_libro" class="btn btn-primary"');


$radio_rev1 = array('name' => 'rdbrevbus', 'id' => 'radio_rev1', 'value' => 'titulo', 'chcked' =>  'checked');
$radio_rev2 = array('name' => 'rdbrevbus', 'id' => 'radio_rev2', 'value' => 'editorial');
$radio_rev3 = array('name' => 'rdbrevbus', 'id' => 'radio_rev3', 'value' => 'categoria');
$radio_rev4 = array('name' => 'rdbrevbus', 'id' => 'radio_rev4', 'value' => 'ultimo');
$txt_fnd_rev_criterio = array('name' => 'txt_fnd_rev_criterio', 'id' => 'txt_fnd_rev_criterio', 'maxlength' => '50', 'class' => 'input-medium tip', "style" => "width:200px;");
$boton2 = form_submit('btn_fnd_revista', 'Buscar', 'id="btn_fnd_revista" class="btn btn-primary"');


?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de Material Bibliografico</h3>
            </div>
            <div class="box-content">
                
    <div id="Tabs_Material" >
        <ul>
            <li><a href="#pr" id="tab_certificadoregistraar">Nuevo Material Bibliografico</a></li>
            <li><a href="#pl" id="tab_materiallistar">Listado Material Bibliografico</a></li>
              <li><a href="#pls" id="tab_materialsinmult">Listado Material Sin Multimedia</a></li>
        </ul>
  
        
        
        <div id="pr">
                 <!--COMBO SELECCION--> 
         <div class="control-group" style="margin-left: 110px;position: relative;margin-top: 20px;">    
             <div class = "controls">
            <?php
            $tipos=array("Tesis","Libro","Revista");
            echo ' Tipo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo form_dropdown('cbo_tipos',$tipos,'','id="cbo_tipos" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione Tipo" data-placement="right"') 
            ?>
        </div>
    </div> 
        <!--COMBO SELECCION--> 
            <div id="div_ins">
                <?php $this->load->view('biblioteca/material/ins_view'); ?>
            </div>
            <div id="div_ins2" style="display:none;">
                <?php $this->load->view('biblioteca/material/ins_view2'); ?>
            </div>
            <div id="div_ins3" style="display:none;">
                <?php $this->load->view('biblioteca/material/ins_view3'); ?>
            </div>
        </div>
        
        <div id="pl" >
            <div id="Tabs_Materiallistar" >
                
            <ul>
              <li><a href="#pl1" id="tab_materialtesis"><img src="http://181.65.203.219/ovcipcdll/img/tesis.png">Listado de Tesis</a></li>
              <li><a href="#pl2" id="tab_materiallibro"><img src="http://181.65.203.219/ovcipcdll/img/libro2.png">Listado de Libros</a></li>
              <li><a href="#pl3" id="tab_materialrevista"><img src="http://181.65.203.219/ovcipcdll/img/revista1.png">Listado de Revistas</a></li>
              
              
           </ul>
                
                <div id="pl1" >
                  <table>
                            <tbody>
                                <tr>
                                    <td>
            
                    <div id="radios_empadronamiento" class="controls">
                                            <?php echo form_radio($radio_mat1); ?> <label for="radio_mat1">Codigo</label>			
                                            <?php echo form_radio($radio_mat2); ?> <label for="radio_mat2">Autor</label>
                                            <?php echo form_radio($radio_mat3); ?> <label for="radio_mat3">Titulo</label>
                                            <?php echo form_radio($radio_mat4); ?> <label for="radio_mat4">Ultimas 20 </label>
                                            
                     </div> 
                                         </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_mat_criterio); ?>  </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><?php echo $boton; ?></td>
                                                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                 <div id="list_view_material"></div>
           
                 </div>
               <!--libro-->
                <div id="pl2">
                    
                    <table>
                            <tbody>
                                <tr>
                                    <td>
            
                                   <div id="radios_libro" class="controls">
                                            <?php echo form_radio($radio_lib1); ?> <label for="radio_lib1">Titulo</label>			
                                            <?php echo form_radio($radio_lib2); ?> <label for="radio_lib2">Autor</label>
                                            <?php echo form_radio($radio_lib3); ?> <label for="radio_lib3">Ultimas 20</label>     
                                    </div> 
                                         </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_lib_criterio); ?>  </td>
                                                    
                                                    <td style="padding-bottom: 6px;"><?php echo $boton1; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    <div id="list_view_libro"></div>
                    
               
           
                </div>
              <div id="pl3">
                    
                     <table>
                            <tbody>
                                <tr>
                                    <td>
            
                                   <div id="radios_revista" class="controls">
                                            <?php echo form_radio($radio_rev1); ?> <label for="radio_rev1">Titulo</label>			
                                            <?php echo form_radio($radio_rev2); ?> <label for="radio_rev2">Editorial</label> 
                                            <?php echo form_radio($radio_rev3); ?> <label for="radio_rev3">Categoria</label>  
                                            <?php echo form_radio($radio_rev4); ?> <label for="radio_rev4">Ultimas 20</label>  
                                    </div> 
                                    
                                         </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_rev_criterio); ?>  </td>
                                                    
                                                    <td style="padding-bottom: 6px;"><?php echo $boton2; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                   <div id="list_view_revista"></div> 
                </div>
               
            </div> 
         
        </div>
        
        <div id="pls">
            <div id="Tabs_MaterialSinmult" >
                <ul>
              
               <li><a href="#pls4" id="tab_materiamultimedia"><img src="http://181.65.203.219/ovcipcdll/img/list2.png">Sin Multimedia Tesis</a></li>
              <li><a href="#pls2" id="tab_multimedia_lib"><img src="http://181.65.203.219/ovcipcdll/img/list2.png">Sin Multimedia Libro</a></li>
              <li><a href="#pls3" id="tab_multimedia_rev"><img src="http://181.65.203.219/ovcipcdll/img/list2.png">Sin Multimedia Revista</a></li>
              
              
           </ul>
                
                       <div id="pls4">
                                                              <div id="div_qry"></div>
                        </div>
                        <div id="pls2">
                                                              <div id="div_qry2"></div>
                        </div>
                        <div id="pls3">
                                                              <div id="div_qry3"></div>
                        </div>
                
            </div>
        </div>
        
    </div>  
            </div>
        </div>
    </div>
</div>



<?php $this->load->view('dashboard/footer');?>


