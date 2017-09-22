<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/jsValorizacionUpd.js'></script>

<?php 
    $atributosForm = array('id' => 'frm_upd_valorizacion', 'name' => 'frm_upd_valorizacion', 'class' => 'form-horizontal');
    echo form_open('portal_infocip/valorizacion/valorizacionUpd'.$n_ValId ."/", $atributosForm);   
$txt_upd_frm_c_ValFechaCaducidad = array('name' => 'txt_upd_frm_c_ValFechaCaducidad', 'id' => 'txt_upd_frm_c_ValFechaCaducidad', 'value' => mb_convert_encoding($c_ValFechaCaducidad, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required');
$txt_upd_frm_c_ValDesripcionCurso = array('name' => 'txt_upd_frm_c_ValDesripcionCurso', 'id' => 'txt_upd_frm_c_ValDesripcionCurso', 'value' => mb_convert_encoding($c_ValDesripcionCurso, "UTF-8"),"cols" => "90", "rows" => "4");

$hid_upd_n_ValId = form_hidden("hid_upd_n_ValId", $n_ValId, "hid_upd_n_ValId", true);
$boton = form_submit('btn_upd_emp', 'Actualizar Noticia', 'id="btn_upd_val" class="btn btn-primary"');
    
    ?>

<fieldset>     
    <legend>DATOS DE LA VALORIZACION</legend>
    <table>
        <tbody>
            <tr>
                <td><label>Fecha caducidad:</label></td>
                <td class="controls"> 
                    <?php echo form_input($txt_upd_frm_c_ValFechaCaducidad); ?>
                </td>
            </tr>   
            <tr>
                <td>
                    <label>Contenido:</label>
                </td>
                <td class="controls"> 
                    <?php echo form_textarea($txt_upd_frm_c_ValDesripcionCurso); ?>
                </td>
            </tr> 
            <tr>   
                <td>&nbsp;</td>
                <td>  
                   <?php echo $hid_upd_n_ValId; ?>
                     <br/>
                    <?php echo $boton; ?>             
                </td>               
            </tr>    
        </tbody>
    </table>         
</fieldset>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>