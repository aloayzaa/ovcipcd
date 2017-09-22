<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReservas_usuario.js'></script>

<link rel="stylesheet" href="<?php echo  base_url() ?>ui/timepick/jquery.clockpick.1.2.9.css" type="text/css">
<script src="<?php echo  base_url() ?>ui/timepick/jquery.clockpick.1.2.9.js" type="text/javascript"></script>
<script>
  MostrarfechaActualLol("txt_det_fecha_lib","NA");
  function MostrarfechaActualLol(cNotFecha, Todos){
    if(Todos=='ALL'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
            dayNamesShort: ['Dom','Lun','Mar','MiÃ©','Juv','Vie','SÃ¡b'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','SÃ¡'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
            yearRange: '1950:2012',
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }else if(Todos=='NA'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
            dayNamesShort: ['Dom','Lun','Mar','MiÃ©','Juv','Vie','SÃ¡b'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','SÃ¡'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 0,
            isRTL: false,
     
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: new Date(),
            maxDate: 3
        });
    }
    var myDate = new Date();
//    $("#"+cNotFecha).datepicker('setDate',myDate);
}
</script>
<?php
  $tipouser=  $this->session->userdata('nUsuTipo');
   $iduser=  $this->session->userdata('nick');
$atributosForm = array('id ' => 'frm_detalle_libro', 'name ' => 'frm_detalle_libro', 'class' => 'form-horizontal');
echo form_open('biblioteca/reserva_usu/reservainslib/' . $nMatId . "/", $atributosForm);


      
      $txt_det_fecha_lib = array('name' => 'txt_det_fecha_lib', 
          'id' => 'txt_det_fecha_lib', 
          'class' => 'cajascalendar',
          'required' => 'required',
          'data-original-title' => 'Escriba su Fecha de caducidad',
          'data-placement' => 'right');
      
      $txt_ins_horafin = array('id' => 'txthora',
    'name' => 'txthora',
    'style' => 'resize:none;width:60px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'readonly' => 'yes',
    'placeholder'=>'Hora Fin',
    'data-original-title' => 'Escriba la Hora de Inicio');
      
          $txt_ins_res_ape= array('name' => 'txt_ins_res_ape_lib',
    'id' => 'txt_ins_res_ape_lib', 
    'maxlength' => '500',
    "style" => "resize:none;width:183px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Apellido',
     'data-placement' => 'left');  
     
      
      $txt_ins_res_name = array('name' => 'txt_ins_res_name_lib',
    'id' => 'txt_ins_res_name_lib', 
    'maxlength' => '500',
    "style" => "resize:none;width:183px;",
     'class' => 'input-medium input-prepend tip',
     'required' => 'required',
     'data-original-title' => 'Ingresa Nombre',
     'data-placement' => 'left');
      
      $boton_reservar = array('id' => 'btn_reservar',
    'name' => 'btn_reservar',
    'type' => 'submit', 
    'value' => 'Reservar Ahora',
    'class' => 'btn btn-success');
      
      
    $hid_lib_idMaterial = form_hidden("hid_lib_idMaterial", $nMatId, "hid_lib_idMaterial", true);
    

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>zebra css</title>
<script type="text/javascript">
    $(document).ready(function() {
        $("#clockimg").clockpick({
            valuefield: 'txthora',
            starthour:8,
            endhour:21,
            minutedivisions:'3',
            military:'True'
        });
    });
</script>
<style type="text/css">
#contenedor {
     width:500px;
	 margin:0 auto;
	 padding-top:20px;
}
#miTabla{
	border-collapse:collapse;
	width:100%;
}
#miTabla td{
	padding:6px;
}
#miTabla tr:nth-child(odd) {
   background-color: #DDD;
   color:#777
}

#miTabla tr:nth-child(even) {
   background-color: #666;
   color:#FFF;
}
</style>
</head>
<body>
<div id="contenedor">
    <table id="miTabla">
         <tr>
            <td>Titulo</td>
            <td> <?php echo form_label(mb_convert_encoding($titulo, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><?php echo form_label(mb_convert_encoding($autor, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Editorial</td>
            <td>  <?php echo form_label(mb_convert_encoding($editorial, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Edicion</td>
            <td><?php echo form_label(mb_convert_encoding($edicion, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td><?php echo form_label(mb_convert_encoding($categoriaUpd, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Resumen</td>
            <td><?php echo form_label(mb_convert_encoding($resumen, "UTF-8"),''); ?></td>
        </tr>
         <tr>
            <td>Observacion</td>
            <td> <?php echo form_label(mb_convert_encoding($observacion, "UTF-8"),''); ?></td>
        </tr>
         <tr>
            <td>Ejemplares</td>
            <td><?php echo form_label(mb_convert_encoding($ejemplares, "UTF-8"),''); ?></td>
        </tr>
       <?php echo form_label(mb_convert_encoding($hid_lib_idMaterial, "UTF-8"),''); ?>
    </table>
</div>
</body>
</html>
<p></p><br>

    
<!--<div class="alert alert-block alert-danger">
    <a class="close" href="#" data-dismiss="alert"> Alerta!!!</a>
    <h4 class="alert-heading"> Alerta!!! </h4>
En estos momentos la Tesis se encuentra Reservada...							
</div>-->

<?php 
 
if($estado == 'R'){
    ?>

<div class="alert alert-block alert-danger">
    <!--<a class="close" href="#" data-dismiss="alert"> Alerta!!!</a>-->
    <h4 class="alert-heading"> Alerta!!! </h4>
En estos momentos la Tesis se encuentra Reservada...							
</div>

       <?php  } else{?>
    

  <div class="control-group">                 
            <label class="control-label" for="txt_det_fecha">Fecha:</label>
            <?php echo form_input($txt_det_fecha_lib) ;             
                         echo form_input($txt_ins_horafin) ;         
            ?>   
            <img style='text-align:center;vertical-align: middle;cursor:pointer;'  id="clockimg" height="20" width="20" src="<?php echo base_url()?>img/clock.png" alt="hora"/>
            
            
    </div>

<?php  if($tipouser=='2' && $iduser=='Admin'){ ?>
<script>UniversidadCbo();</script>    
 <label class="control-label" for="txt_ins_res_ape">Apellidos: </label>
<?php
      echo form_input($txt_ins_res_ape) ; 
    ?>
     <br></br>
       <label class="control-label" for="txt_ins_res_nombre">Nombres: </label>
     <?php    echo form_input($txt_ins_res_name) ; ?>
     
  

       <br></br>
       <div class="control-group">  
                        <label class="control-label">Universidad:</label>
            <div class="controls">
                <div id="mostrar_combo_universidad"></div>
            </div>                                                        
   </div>
           <?php }?>
     <br><p></p>

    <div class = "controls">
    <?php echo form_input($boton_reservar) ?>
</div> 


<?php }?>

 <?php echo form_close(); ?>
