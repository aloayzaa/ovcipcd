
<?php $this->load->view('dashboard/header'); ?>
<!--<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>-->
<!--<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>-->
<!--<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>-->
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReservas_usuario.js'></script>

<?php
$txt_ins_mat_titulo = array('name' => 'txt_ins_mat_titulo',
    'id' => 'txt_ins_mat_titulo',
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingresa Titulo Tesis',
    'data-placement' => 'right',
    'placeholder' => 'Ingresa tu palabra clave');


$txt_ins_lib_titulo = array('name' => 'txt_ins_lib_titulo',
    'id' => 'txt_ins_lib_titulo',
    'maxlength' => '500',
    "style" => "resize:none;width:350px;",
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingresa Titulo Libro',
    'data-placement' => 'right',
    'placeholder' => 'Ingresa tu palabra clave');

//    $boton = array('id' => 'btn_ins_mat',
//    'name' => 'btn_ins_mat',
//    'type' => 'submit', 
//    'value' => 'Registrar Tesis',
//    'class' => 'btn btn-primary');
//   $filas[''] = 'Seleccione un Capitulo';
//    foreach ($capitulos as $fila) {
//    $filas[$fila->codcap] =$fila->desccap;}
?>
<script>
   $(document).ready(function(){   
      get_page('reserva_usuario/load_tabla_tesis_view/','div_qry');    
   
  $('#tab_tesis').click(function(){
           get_page('reserva_usuario/load_tabla_tesis_view/','div_qry');
           limpiar1();
     });

         $('#tab_libro').click(function(){
          get_page('reserva_usuario/load_tabla_libro_view/','div_qry_libro');
          limpiar();
     });
     
       $('#tab_revista').click(function(){
          get_page('reserva_usuario/load_tabla_revista_view/','div_qry_revista');
          limpiar2();
     });
      });
</script>
<div class="content"  >      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head" >
                <h3>BIBLIOTECA CENTRAL DEL COLEGIO DE INGENIEROS DEL PERU - LA LIBERTAD</h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Material"  >
                    <ul>
                        <li><a href="#pt" id="tab_tesis"><img src="http://181.65.203.219/ovcipcdll/img/tesis.png">Nuestras Tesis</a></li>
                        <li><a href="#pl" id="tab_libro"><img src="http://181.65.203.219/ovcipcdll/img/libro1.png">Nuestros  Libros</a></li>
                        <li><a href="#pr" id="tab_revista"><img src="http://181.65.203.219/ovcipcdll/img/revista1.png">Nuestras Revistas</a></li>

                    </ul>

                    <div id="pt">

                        <div id="div_qry">
                            
                        </div>



                    </div>

                    <div id="pl">
                        
                        <div id="div_qry_libro"></div>

                    </div>
                    <div id="pr">
                            
                         <div id="div_qry_revista"></div>

                    </div>



                </div>  
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>