<?php
$atributosForm = array('id ' => 'frm_mensaje_view', 'name ' => 'frm_mensaje_view', 'class' => 'form-horizontal');
echo form_open('lib_reclamaciones/mensaje/MensajeGet/' . $nMenIdMensaje . "/", $atributosForm);

//$txt_upd_rec_nombre = array('name' => 'txt_upd_rec_nombre',
//    'id' => 'txt_upd_rec_nombre',
//   "style" => "text-align: center;font-size: 20px; font-weight: bold;color: #003399;"
//   );
    
//    $txt_upd_rec_area = array('name' => 'txt_upd_rec_area',
//    'id' => 'txt_upd_rec_area', 
//     "style" => "text-align: left;font-size: 15px; font-weight: bold;"
//  );
//    
//     $txt_upd_rec_subarea= array('name' => 'txt_upd_rec_subarea', 
//     'id' => 'txt_upd_rec_subarea', 
//     );
    
      $txt_upd_rec_asunto = array('name' => 'txt_upd_rec_asunto',
    'id' => 'txt_upd_rec_asunto', 
   );
      
        $txt_upd_rec_mensaje = array('name' => 'txt_upd_rec_mensaje',
    'id' => 'txt_upd_rec_mensaje', 
   );
      
    $hid_upd_rec_nMenIdMensaje = form_hidden("hid_upd_rec_nMenIdMensaje", $nMenIdMensaje, "hid_upd_rec_nMenIdMensaje", true);

?>

<!--<div class="contenedor">
    <div class="cajasbig">
        <label class='description'>
            <?php echo form_label(mb_convert_encoding($nombre, "UTF-8"),'',$txt_upd_rec_nombre); ?>
        </label>
    </div>
    <br>
    <div class="cajasbig" >
        <label class='description' >
            Autor:<?php echo form_label(mb_convert_encoding($area, "UTF-8"),'',$txt_upd_rec_area); ?>
        </label>
    </div>
    <br>
  <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
            Editorial:
             <?php echo form_label(mb_convert_encoding($subarea, "UTF-8"),''); ?>
        </label>
    </div>
    <br>-->
<div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
Asunto:
     <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
          
             <?php echo form_label(mb_convert_encoding($asunto, "UTF-8"),''); ?>
        </label>
    </div>
    
       <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
            Mensaje:
            <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
             <?php echo form_label(mb_convert_encoding($mensaje, "UTF-8"),''); ?>
        </label>
    </div>
    
     
    
    
</div>
 <?php echo form_close(); ?>