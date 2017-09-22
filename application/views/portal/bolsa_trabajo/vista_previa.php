<?php
$atributosForm = array('id ' => 'frm_vista_previa', 'name ' => 'frm_vista_previa', 'class' => 'form-horizontal');
echo form_open('portal/bolsa_trabajo/BolsaTrabajoGet/' . $nNotCodigo . "/", $atributosForm);
$txt_upd_bolsa_fecha = array('name' => 'txt_upd_bolsa_fecha', 'id' => 'txt_upd_bolsa_fecha',"style" => "text-align: left;font-size: 12px; font-weight: bold;");
$txt_upd_bolsa_titulo = array('name' => 'cNotTitulo', 'id' => 'cNotTitulo',"style" => "text-align: center;font-size: 20px; font-weight: bold;color: #003399;");
$txt_upd_bolsa_sumilla = array('name' => 'txt_upd_bolsa_sumilla', 'id' => 'txt_upd_bolsa_sumilla');
$txt_upd_bolsa_contenido = array('name' => 'txt_upd_bolsa_contenido', 'id' => 'txt_upd_bolsa_contenido');
?>

<div class="contenedor">
    <div class="cajasbig">
        <label class='description'>
            <?php echo form_label(mb_convert_encoding($cNotTitulo, "UTF-8"),'',$txt_upd_bolsa_titulo); ?>
        </label>
    </div>
    <br>
    <div class="cajasbig" >
        <label class='description' >
            <?php echo form_label(mb_convert_encoding($cNotSumilla, "UTF-8"),'',$txt_upd_bolsa_sumilla); ?>
        </label>
    </div>
    <div class="cajasbig" >
        <label class='description' >
            <?php echo form_label(mb_convert_encoding($cNotContenido, "UTF-8"),'',$txt_upd_bolsa_contenido); ?>
        </label>
    </div>
    <div class="cajasbig" style="border-top-style: groove; border-top-color: #000080; border-top-width: 2px;">
        <label class='description'>
             <?php echo form_label(mb_convert_encoding($cNotFechaFinal, "UTF-8"),'',$txt_upd_bolsa_fecha); ?>
        </label>
    </div>
</div>

 <?php echo form_close(); ?>