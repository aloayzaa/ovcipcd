<?php
$atributosForm = array('id ' => 'frm_vista_previa', 'name ' => 'frm_vista_previa', 'class' => 'form-horizontal');
echo form_open('biblioteca/material/materialGet/' . $nMatId . "/", $atributosForm);

$txt_upd_mat_titulo = array('name' => 'txt_upd_mat_titulo',
    'id' => 'txt_upd_mat_titulo',
   "style" => "text-align: center;font-size: 20px; font-weight: bold;color: #003399;"
   );
    
    $txt_upd_mat_autor = array('name' => 'txt_upd_mat_autor',
    'id' => 'txt_upd_mat_autor', 
     "style" => "text-align: left;font-size: 15px; font-weight: bold;"
  );
    
     $txt_upd_mat_resumen= array('name' => 'txt_upd_mat_resumen', 
     'id' => 'txt_upd_mat_resumen', 
     );
    
      $txt_upd_mat_observacion = array('name' => 'txt_upd_mat_observacion',
    'id' => 'txt_upd_mat_observacion', 
   );
      
      
    $hid_upd_cur_idMaterial = form_hidden("hid_upd_cur_idMaterial", $nMatId, "hid_upd_cur_idMaterial", true);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

 <?php echo form_close(); ?>

