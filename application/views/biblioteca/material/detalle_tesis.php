
<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReservas_usuario.js'></script>


<?php

?>
<?php
$atributosForm = array('id ' => 'frm_vista_previa', 'name ' => 'frm_vista_previa', 'class' => 'form-horizontal');
echo form_open('biblioteca/material/materialGet/' . $nMatId . "/", $atributosForm);

$txt_upd_mat_titulo = array('name' => 'txt_upd_mat_titulo',
    'id' => 'txt_upd_mat_titulo',
 "style" => "text-align: left;font-size: 15px; font-weight: bold;"
   );
    
    $txt_upd_mat_autor = array('name' => 'txt_upd_mat_autor',
    'id' => 'txt_upd_mat_autor', 
     "style" => "text-align: left;font-size: 15px; font-weight: bold;"
  );
    
     $txt_upd_mat_resumen= array('name' => 'txt_upd_mat_resumen', 
     'id' => 'txt_upd_mat_resumen', 
          "style" => "text-align: left;font-size: 15px; font-weight: bold;"
     );
    
      $txt_upd_mat_observacion = array('name' => 'txt_upd_mat_observacion',
    'id' => 'txt_upd_mat_observacion', 
           "style" => "text-align: left;font-size: 15px; font-weight: bold;"
   );
      
      $txt_det_fecha = array('name' => 'txt_det_fecha', 
          'id' => 'txt_det_fecha', 
          'class' => 'cajascalendar',
          'required' => 'required',
          'data-original-title' => 'Escriba su Fecha de caducidad',
          'data-placement' => 'right');
      
      $boton_reservar = array('id' => 'btn_reservar',
    'name' => 'btn_reservar',
    'type' => 'submit', 
    'value' => 'Reservar Ahora',
    'class' => 'btn btn-success');
      
      
    $hid_upd_cur_idMaterial = form_hidden("hid_upd_cur_idMaterial", $nMatId, "hid_upd_cur_idMaterial", true);
    

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>zebra css</title>
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
            <td>Capitulo</td>
            <td>  <?php echo form_label(mb_convert_encoding($capituloDescrip, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td><?php echo form_label(mb_convert_encoding($espDescrip, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Universidad</td>
            <td><?php echo form_label(mb_convert_encoding($universidaddesc, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Año</td>
            <td><?php echo form_label(mb_convert_encoding($ano, "UTF-8"),''); ?></td>
        </tr>
         <tr>
            <td>Resumen</td>
            <td> <?php echo form_label(mb_convert_encoding($resumen, "UTF-8"),''); ?></td>
        </tr>
         <tr>
            <td>Observacion</td>
            <td><?php echo form_label(mb_convert_encoding($observacion, "UTF-8"),''); ?></td>
        </tr>
    </table>
</div>
</body>
</html>
<p></p><br>

<?php 
 
if($estado == 'R'){
    ?>

<div class="alert alert-block alert-danger">
    <h4 class="alert-heading"> Alerta!!! </h4>
En estos momentos la Tesis se encuentra Reservada...							
</div>

       <?php  } else{?>
    
<div class="controls"><input id="timepicker" class="timepicker" type="text" name="timepicker"></input></div>
 <div class="control-group">                 
        <div class = "controls">
            <?php echo form_input($txt_det_fecha) ?>
        </div>
    </div>
    <div class = "controls">
    <?php echo form_input($boton_reservar) ?>
</div>
<?php }?>


 <?php echo form_close(); ?>



 