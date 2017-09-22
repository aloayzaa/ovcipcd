<?php
$atributosForm = array('id ' => 'frm_vista_previa', 'name ' => 'frm_vista_previa', 'class' => 'form-horizontal');
echo form_open('portal_infocip/noticias_infocip/NoticiasInfocipGet/' . $nNotCodigo . "/", $atributosForm);
$txt_upd_noticiasinfocip_fecha = array('name' => 'txt_upd_noticiasinfocip_fecha', 'id' => 'txt_upd_noticiasinfocip_fecha',"style" => "text-align: left;font-size: 12px; font-weight: bold;");
$txt_upd_noticiasinfocip_titulo = array('name' => 'cNotTitulo', 'id' => 'cNotTitulo',"style" => "text-align: center;font-size: 20px; font-weight: bold;color: #003399;");
$txt_upd_noticiasinfocip_sumilla = array('name' => 'txt_upd_noticiasinfocip_sumilla', 'id' => 'txt_upd_noticiasinfocip_sumilla');
$txt_upd_noticiasinfocip_contenido = array('name' => 'txt_upd_noticiasinfocip_contenido', 'id' => 'txt_upd_noticiasinfocip_contenido');
?>

<div class="contenedor">
    <div class="cajasbig">
        <label class='description'>
            <?php echo form_label(mb_convert_encoding($cNotTitulo, "UTF-8"),'',$txt_upd_noticiasinfocip_titulo); ?>
        </label>
    </div>
    <br>
    <div class="cajasbig" >
        <label class='description' >
            <?php echo form_label(mb_convert_encoding($cNotSumilla, "UTF-8"),'',$txt_upd_noticiasinfocip_sumilla); ?>
        </label>
    </div>
    <div class="cajasbig" >
        <label class='description' >
            <?php echo form_label(mb_convert_encoding($cNotContenido, "UTF-8"),'',$txt_upd_noticiasinfocip_contenido); ?>
        </label>
    </div>
    <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
             <?php echo form_label(mb_convert_encoding($cNotFechaFinal, "UTF-8"),'',$txt_upd_noticiasinfocip_fecha); ?>
        </label>
    </div>
</div>

 <?php echo form_close(); ?>
