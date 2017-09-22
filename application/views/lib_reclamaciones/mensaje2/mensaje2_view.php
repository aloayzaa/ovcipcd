<script type="text/javascript" src='<?php echo URL_JS; ?>lib_reclamaciones/jsBuzonEntradaPopUp.js'></script>

<?php
$frm_ins_mensaje= array('id' => 'frm_ins_mensaje',
    'name' => 'frm_ins_mensaje',
    'class' => 'form-horizontal');
echo form_open('lib_reclamaciones/mensaje2/mensajeIns', $frm_ins_mensaje);

$txt_ins_men_cMenMensaje = array
    (
    'name' => 'txt_ins_men_cMenMensaje',
    'id' =>   'txt_ins_men_cMenMensaje', 
     "cols" => "5",
     "rows" => "5", 
     'required' => 'required');


$btn_ins_men = array
    (
    'id' => 'btn_ins_men',
    'name' => 'btn_ins_men',
    'type' => 'submit', 
    'value' => 'Enviar',
    'class' => 'btn btn-primary'); 

$hid_upd_cur_id = form_hidden("hid_upd_cur_id", $nMenIdMensaje, "hid_upd_cur_id", true);?>

    

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
        
        
            <td>Asunto</td>
            <td> <?php echo form_label(mb_convert_encoding($asunto, "UTF-8"),''); ?></td>
        </tr>
        <tr>
            <td>Mensaje</td>
            <td><?php echo form_label(mb_convert_encoding($mensaje, "UTF-8"),''); ?></td>
        </tr>
        
        <div class = "controls">
    <?php echo $hid_upd_cur_id;
    ?>
</div>
        <tr>
            <td>Responder</td>
            <td> 
                
 <?php echo form_textarea($txt_ins_men_cMenMensaje) ?>
  
                
   
                <br> </br>
            <?php echo form_submit($btn_ins_men);?>
                
            </td>
        </tr>
       
         
    </table>
</div>
</body>
</html>
    
</div>
 <?php echo form_close(); ?>