 
<script type="text/javascript" src="<?php echo URL_JS ?>empresas/jsNoticiasEmpresarialUpd.js"></script>
<?php
$atributosForm = array('id' => 'frm_upd_noticiasempresarial', 'name' => 'frm_upd_noticiasempresarial');
echo form_open('empresas/noticiasempresariales/NoticiasEmpresarialUpd/' . $nNotCodigo . "/", $atributosForm);

$txt_upd_notempre_fecha = array('name' => 'txt_upd_notempre_fecha', 'id' => 'txt_upd_notempre_fecha', 'value' => mb_convert_encoding($cNotFechaFinal, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required');
$txt_upd_notempre_titulo = array('name' => 'txt_upd_notempre_titulo', 'id' => 'txt_upd_notempre_titulo', 'value' => mb_convert_encoding($cNotTitulo, "UTF-8"),'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_upd_notempre_sumilla = array('name' => 'txt_upd_notempre_sumilla', 'id' => 'txt_upd_notempre_sumilla', 'value' => mb_convert_encoding($cNotSumilla, "UTF-8"),"cols" => "190", "rows" => "3",'style'=>"width: 388px; height: 45px;");
$txt_upd_notempre_contenido = array('name' => 'txt_upd_notempre_contenido', 'id' => 'txt_upd_notempre_contenido', 'value' => mb_convert_encoding($cNotContenido, "UTF-8"),"cols" => "90", "rows" => "4");

$hid_upd_nNotCodigo = form_hidden("hid_upd_nNotCodigo", $nNotCodigo, "hid_upd_nNotCodigo", true);
$boton = form_submit('btn_upd_emp', 'Actualizar Noticia Empresarial', 'id="btn_upd_emp" class="btn btn-primary"');
?>
<fieldset>     
    <legend>DATOS NOTICIAS EMPRESARIALES</legend>
    <table>
        <tbody>
            <tr>
                <td><label>Fecha:</label></td>
                <td class="controls"> 
                    <?php echo form_input($txt_upd_notempre_fecha); ?>
                </td>
            </tr> 
            <tr>
                <td>
                    <label>Titulo:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_input($txt_upd_notempre_titulo); ?>
                </td>
            </tr> 
              <tr>
                <td>
                    <label>Sumilla:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_textarea($txt_upd_notempre_sumilla); ?>
                </td>
            </tr> 
            <tr>
                <td>
                    <label>Contenido:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_textarea($txt_upd_notempre_contenido); ?>
                </td>
            </tr> 
            <tr>   
                <td>&nbsp;</td>
                <td>  
                   <?php echo $hid_upd_nNotCodigo; ?>
                     <br/>
                    <?php echo $boton; ?>             
                </td>               
            </tr>    
        </tbody>
    </table>         
</fieldset>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>