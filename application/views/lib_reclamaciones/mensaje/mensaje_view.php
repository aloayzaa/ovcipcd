<?php
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
        
        <td>Enviado</td>
        <tr>
            <td>Asunto</td>
            <td> <?php echo form_label(mb_convert_encoding($asunto, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Mensaje</td>
            <td><?php echo form_label(mb_convert_encoding($mensaje1, "UTF-8"),''); ?></td>
        </tr>
        
         
    </table>
</div>
    
    <br> </br>
    
<div id="contenedor">
    <table id="miTabla">
        
        <td>Respuesta</td>
        
        <tr>
            <td>Mensaje</td>
            <td> <?php echo form_label(mb_convert_encoding($mensajeRes, "UTF-8"),''); ?></td>
        </tr>
        
        
         
    </table>
</div>
    
    
</body>
</html>
    
</div>
 <?php echo form_close(); ?>