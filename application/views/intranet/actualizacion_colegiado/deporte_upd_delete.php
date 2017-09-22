<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDeporteColegiado.js"></script>
<?php
$atributosForm = array('id' => 'frm_del_deporte', 'name' => 'frm_del_deporte');
echo form_open('actualizacion_colegiado/ElminarFamiliar/', $atributosForm);
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $regcol, 'type' => 'hidden');
$hid_upd_coddep =  array('name' => 'hid_upd_coddep', 'id' => 'hid_upd_coddep', 'value' => $coddep, 'type' => 'hidden');
$aceptar = form_submit('btn_upd_delfamiliar', 'Eliminar', 'id="btn_upd_delfamiliar" class="btn btn-primary"');
$cancel = form_button('btn_upd_cancel', 'Cancelar', 'id="btn_upd_cancel" class="btn btn-primary"');
?>
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    
    <fieldset>     
        <table>
            <tbody>
                <tr>
             <td style="vertical-align:top;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b></b></td>
                                    <td><b>&nbsp;</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>¿Desea eliminar el siguiente deporte?</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"> </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </td>
                </tr> 

                <tr>   
                    <td>&nbsp;</td>
                    <td>  
                        <?php echo form_input($hid_upd_regcol); ?>
                        <?php echo form_input($hid_upd_coddep); ?>
                        <br/>
                        <?php echo $aceptar; ?> <?php echo $cancel; ?> 
                    </td>  
                    <td>

                    </td>
                </tr>    
            </tbody>
        </table>         
    </fieldset><br></div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>