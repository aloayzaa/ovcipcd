<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDeporteColegiado.js"></script>
<?php
$atributosForm = array('id' => 'frm_del_deporte', 'name' => 'frm_del_deporte');
echo form_open('actualizacion_colegiado/AgregarDeportes/', $atributosForm);
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $regcol, 'type' => 'hidden');
$hid_upd_coddep = array('name' => 'hid_upd_coddep', 'id' => 'hid_upd_coddep', 'value' => $regcol, 'type' => 'hidden');


$boton = form_submit('btn_upd_addfamiliar', 'Editar Deporte', 'id="btn_upd_addfamiliar" class="btn btn-primary"');
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
                                    <td><b>Deporte:</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;">
                                    <select id='cbo_deportes' name='cbo_deportes' class="select" tabindex="2" required="required">
                                         <?php 
                                                                        foreach($lista as $filas){
                                                                            if($filas->coddep == $coddep){
                                                                               ?> 
                                                                             <option value="<?php echo $filas->coddep ?>" selected><?php echo $filas->descdep ?></option>
                                                                           
                                                                                <?php
                                                                            }else{
                                                                        ?>
                                                                          <option value="<?php echo $filas->coddep ?>"><?php echo $filas->descdep ?></option>
                                                                        <?php  
                                                                        }}
                                                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><b>Nivel Dominio:</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"> <?php echo form_dropdown('cbo_upd_dominio', $cbodominio, $dominio, 'id="cbo_upd_dominio" style="cursor:pointer;"  required="required"'); ?></td>
                                </tr>
                                 <tr>
                                     <td style="width:20px;"></td>
                                    <td><b>Pertenece Seleccion:</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_dropdown('cbo_upd_seleccion', $cboseleccion, $seleccion, 'id="cbo_upd_seleccion" style="cursor:pointer;"  required="required"'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr> 

                <tr>   
                    <td>&nbsp;</td>
                    <td>  
                        <?php echo form_input($hid_upd_regcol); ?>
                        <br/>
                        <?php echo $boton; ?> 
                    </td>  
                    <td>

                    </td>
                </tr>    
            </tbody>
        </table>         
    </fieldset><br></div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>