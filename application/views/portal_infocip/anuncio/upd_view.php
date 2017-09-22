
<script type="text/javascript" src="<?php echo URL_JS ?>portal_infocip/anuncio/jsAnuncioUpd.js"></script>
<?php
$atributosForm = array('id' => 'frm_upd_anuncio_trabajo', 'name' => 'frm_upd_anuncio_trabajo');
echo form_open('portal_infocip/anuncio/AnuncioUpd/' . $nNotCodigo . "/", $atributosForm);

$txt_upd_anuncio_fecha = array('name' => 'txt_upd_anuncio_fecha', 'id' => 'txt_upd_anuncio_fecha', 'value' => mb_convert_encoding($cNotFechaFinal, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required');
$txt_upd_anuncio_titulo = array('name' => 'txt_upd_anuncio_titulo', 'id' => 'txt_upd_anuncio_titulo', 'value' => mb_convert_encoding($cNotTitulo, "UTF-8"),'maxlength' => '500' ,"style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip','data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_upd_anuncio_sumilla = array('name' => 'txt_upd_anuncio_sumilla', 'id' => 'txt_upd_anuncio_sumilla', 'value' => mb_convert_encoding($cNotSumilla, "UTF-8"),"cols" => "190", "rows" => "3",'style'=>"width: 388px; height: 45px;");
$txt_upd_anuncio_tipo = array('name' => 'txt_upd_anuncio_tipo', 'id' => 'txt_upd_anuncio_tipo', 'value' => mb_convert_encoding($cTipoPortal, "UTF-8"),"cols" => "20", "rows" => "3",'style'=>"width: 388px; height: 45px;");
$txt_upd_anuncio_contenido = array('name' => 'txt_upd_anuncio_contenido', 'id' => 'txt_upd_anuncio_contenido', 'value' => mb_convert_encoding($cNotContenido, "UTF-8"),"cols" => "90", "rows" => "4");
$hid_upd_nNotCodigo = form_hidden("hid_upd_nNotCodigo", $nNotCodigo, "hid_upd_nNotCodigo", true);
$boton = form_submit('btn_upd_emp', 'Actualizar Anuncio', 'id="btn_upd_emp" class="btn btn-primary"');
?>
<fieldset>     
    <legend>DATOS DEL ANUNCIO</legend>
    <table>
        <tbody>
            <tr>
                <td><label>Fecha caducidad:</label></td>
                <td class="controls"> 
                    <?php echo form_input($txt_upd_anuncio_fecha); ?>
                </td>
            </tr> 
            <tr>
                <td>
                    <label>Nombre del Anuncio:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_input($txt_upd_anuncio_titulo); ?>
                </td>
            </tr> 
                    <tr>
                <td>
                    <label>Tipo Portal:</label>
                </td>
                <td class="controls"> 
                  <div class = "controls">
            <select name="cbo_upd_anuncio_tipo">
                <?php
                    if($cTipoPortal == 'INFOCIP'){
                ?>
              <option value="INFOCIP" selected>INFOCIP</option>
                    <option value="CIP">PORTAL CIP</option>
                <?php
                    }
                    else{
                ?>
                  <option value="INFOCIP" >INFOCIP</option>
                    <option value="CIP" selected>PORTAL CIP</option>
                <?php
                    }
                ?>
            </select>
        </div>
                </td>
            </tr> 
                 <tr>
                <td>
                    <label>Link del Anuncio:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_textarea($txt_upd_anuncio_sumilla); ?>
                </td>
            </tr> 
            <tr>
                <td>
                    <label>Contenido:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_textarea($txt_upd_anuncio_contenido); ?>
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