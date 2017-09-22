<script type="text/javascript">
    // - popover
    $(".pover").popover();
    $(".pover").click(function (e) {
        e.preventDefault();
        if ($(this).data('trigger') == "manual") {
            $(this).popover('toggle');
        }
    });
</script>
<script type="text/javascript" src="<?php echo URL_JS ?>colegiado/jsColegiadoUpd.js"></script> 

<?php
header("Content-Type: text/html;charset=utf-8");
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $regcol, 'type' => 'hidden');
$atributosForm = array('id' => 'frm_upd_colegiado', 'name' => 'frm_upd_colegiado');
echo form_open('colegiado/DatosColegiadoUpd/' . $regcol . "/", $atributosForm);
$txt_upd_col_direccion = array('name' => 'txt_upd_col_direccion', 
    'id' => 'txt_upd_col_direccion', 
    'value' => mb_convert_encoding($direcol, "UTF-8"),
    "cols" => "190", "rows" => "3", 
    'style' => "width: 500px; height: 35px;",
    'required' => 'required');


if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else
    $ip = $_SERVER['REMOTE_ADDR'];

$txt_upd_col_emailp = array('name' => 'txt_upd_col_emailp', 'id' => 'txt_upd_col_emailp', 'value' => mb_convert_encoding($email, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:214px;", 'class' => 'cajasemail','readonly' => true);
$txt_upd_col_emails = array('name' => 'txt_upd_col_emails', 'id' => 'txt_upd_col_emails', 'value' => mb_convert_encoding($emailsec, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:214px;", 'class' => 'cajasemail', 'required' => 'required');
$txt_upd_col_telefono = array('name' => 'txt_upd_col_telefono', 'id' => 'txt_upd_col_telefono', 'value' => mb_convert_encoding($telcol, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;", 'class' => 'cajasphone');
$txt_upd_col_celular = array('name' => 'txt_upd_col_celular', 'id' => 'txt_upd_col_celular', 'value' => mb_convert_encoding($celcol, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:120px;", 'class' => 'cajascell', 'required' => 'required');
$txt_upd_col_celularrpm = array('name' => 'txt_upd_col_celularrpm', 'id' => 'txt_upd_col_celularrpm', 'value' => mb_convert_encoding($redpm, "UTF-8"), 'maxlength' => '10', 'minlength' => '6', "style" => "resize:none;width:100px;");
$txt_upd_col_celularrpc = array('name' => 'txt_upd_col_celularrpc', 'id' => 'txt_upd_col_celularrpc', 'value' => mb_convert_encoding($redpc, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;");
$cbosexo = array(
    '' => 'Seleccionar',
    'M' => 'MASCULINO',
    'F' => 'FEMENINO',
);
$cboestado_civil = array(
    '' => 'Seleccionar',
    'S' => 'SOLTERO',
    'C' => 'CASADO',
    'D' => 'DIVORCIADO',
    'V' => 'VIUDO',
);
$operador = array(
    '' => 'Seleccionar',
    'T' => 'MOVISTAR',
    'CLARO' => 'CLARO',
    'NEXTEL' => 'NEXTEL',
    'ENTEL' => 'ENTEL',
);

$tipo_direccion = array(
    '' => 'Seleccionar',
    'Jr.' => 'Jr.',
    'Calle' => 'Calle',
    'Av.' => 'Av.',
    'Psj.' => 'Pasaje'
);

$txt_ins_col_fecnac = array('name' => 'txt_ins_col_fecnac', 'id' => 'txt_ins_col_fecnac', 'value' => mb_convert_encoding($fechanac, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required', 'readonly' => true);
$txt_upd_regcol = array('name' => 'txt_upd_regcol', 'id' => 'txt_upd_regcol');
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Personales', 'id="btn_upd_colegiado" class="btn btn-primary"');

/// hiddens

$txt_hd_sexo = array('name' => 'txt_hd_sexo', 'id' => 'txt_hd_sexo', 'type' => 'hidden', 'value' => mb_convert_encoding($sexcol, "UTF-8"));
$txt_hd_estadocivil = array('name' => 'txt_hd_estadocivil', 'id' => 'txt_hd_estadocivil', 'type' => 'hidden', 'value' => mb_convert_encoding($colestcivil, "UTF-8"));
$txt_hd_emails = array('name' => 'txt_hd_emails', 'id' => 'txt_hd_emails', 'type' => 'hidden', 'value' => mb_convert_encoding($emailsec, "UTF-8"));
$txt_hd_telefono = array('name' => 'txt_hd_telefono', 'id' => 'txt_hd_telefono', 'type' => 'hidden', 'value' => mb_convert_encoding($telcol, "UTF-8"));
$txt_hd_celular = array('name' => 'txt_hd_celular', 'id' => 'txt_hd_celular', 'type' => 'hidden', 'value' => mb_convert_encoding($celcol, "UTF-8"));
$txt_hd_celularrpm = array('name' => 'txt_hd_celularrpm', 'id' => 'txt_hd_celularrpm', 'type' => 'hidden', 'value' => mb_convert_encoding($redpm, "UTF-8"));
$txt_hd_celularrpc = array('name' => 'txt_hd_celularrpc', 'id' => 'txt_hd_celularrpc', 'type' => 'hidden', 'value' => mb_convert_encoding($redpc, "UTF-8"));
$txt_hd_tipocel = array('name' => 'txt_hd_tipocel', 'id' => 'txt_hd_tipocel', 'type' => 'hidden', 'value' => mb_convert_encoding($celuemp, "UTF-8"));
$txt_hd_direccion = array('name' => 'txt_hd_direccion', 'id' => 'txt_hd_direccion', 'type' => 'hidden', 'value' => mb_convert_encoding($direcol, "UTF-8"));
$txt_hd_zona = array('name' => 'txt_hd_zona', 'id' => 'txt_hd_zona', 'type' => 'hidden', 'value' => mb_convert_encoding($codigozona, "UTF-8"));

//no editables
$txt_hd_fecnac = array('name' => 'txt_hd_fecnac', 'id' => 'txt_hd_fecnac', 'type' => 'hidden', 'value' => mb_convert_encoding($fechanac, "UTF-8"));
$txt_hd_emailp = array('name' => 'txt_hd_emailp', 'id' => 'txt_hd_emailp', 'type' => 'hidden', 'value' => mb_convert_encoding($email, "UTF-8"));
$txt_hd_nombre = array('name' => 'txt_hd_nombre', 'id' => 'txt_hd_nombre', 'type' => 'hidden', 'value' => mb_convert_encoding($nomcol, "UTF-8"));
$txt_hd_apepat = array('name' => 'txt_hd_apepat', 'id' => 'txt_hd_apepat', 'type' => 'hidden', 'value' => mb_convert_encoding($apecol, "UTF-8"));
$txt_hd_apemat = array('name' => 'txt_hd_apemat', 'id' => 'txt_hd_apemat', 'type' => 'hidden', 'value' => mb_convert_encoding($apematcol, "UTF-8"));
$txt_hd_dni = array('name' => 'txt_hd_dni', 'id' => 'txt_hd_dni', 'type' => 'hidden', 'value' => mb_convert_encoding($lecol, "UTF-8"));
$hip = form_hidden("ip", $ip, "ip", true);
?>
<div class="content">  
    <div class="row-fluid">
<fieldset>     
    <legend><span id="c_label_tipoemp"></span></legend>
    <div style="border-color: #B7B7B7;"> 
    <table>
        <tr>
            <td colspan="2">&nbsp; </td>    
        </tr>
        <tr>
            <td>
                <label>Sexo:</label>
            </td>
            <td class="controls">
                <?php echo form_dropdown('cbo_upd_col_sexo', $cbosexo, $sexcol, 'id="cbo_upd_col_sexo" style="cursor:pointer;"  required="required"'); ?>

            </td>


            <td>
                <label>Fecha de Nacimiento:</label>
            </td>
            <td class="controls">
                <?php echo form_input($txt_ins_col_fecnac); ?>
            </td>
        </tr>

        <tr>
            <td>
                <label>Estado Civil:</label>
            </td>
            <td class="controls">
                <?php echo form_dropdown('cbo_ins_estado_civil', $cboestado_civil, $colestcivil, 'id="cbo_ins_estado_civil" style="cursor:pointer;"  required="required"'); ?>
            </td>
            <td>
                <label>Email Principal:</label>
            </td>
            <td class="controls" >
                <?php echo form_input($txt_upd_col_emailp); ?>
            </td>
        </tr> 
        <tr>
            <td>
                <label>Email Personal:</label>
            </td>
            <td class="controls" style="width: 248px;"> 
                <?php echo form_input($txt_upd_col_emails); ?>
            </td>

            <td>
                <label>Telefono:</label>
            </td>
            <td class="controls"> 
                <?php echo form_input($txt_upd_col_telefono); ?>
            </td>
        </tr> 
        <tr>
            <td>
                <label>Celular:</label>
            </td>
            <td class="controls">
                <?php echo form_input($txt_upd_col_celular); ?></td>

            <td>
                <?php echo form_dropdown('celuemp', $operador, $celuemp, 'id="celuemp" style="cursor:pointer;"  required="required"'); ?>
            </td>

        </tr> 
        <tr>
            <td>
                <label>Celular RPM:</label>
            </td>
            <td class="controls"> 
                <?php echo form_input($txt_upd_col_celularrpm); ?>
            </td>

            <td>
                <label>Celular RPC:</label>
            </td>
            <td class="controls" style="margin-left:30px"> 
                <?php echo form_input($txt_upd_col_celularrpc); ?>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp; </td>    
        </tr>
        <tr>
            <td colspan="4"> <legend><strong>Datos de Localización</strong></legend></td>    
        </tr>
        <tr>
            <td>
                <label>Dirección:</label>  
            </td>
            <td class="controls" colspan="3" ><a class='pover btn' style="border: none; background-color: none; background-image: none;" data-placement="top" data-title="LEYENDA: ¡Atención:!" data-content="
                                                 <table><tr>
                                     
                                                 <td class='controls'>
                                                 <h4><b style='color:red;'>Jr. =>'Jirón'</b></h4><br>
                                                 <h4><b style='color:red;'>Calle=>'Calle'</b></h4><br>
                                                 <h4><b style='color:red;' >Av.=>'Avenida'</b></h4><br>
                                                 <h4><b style='color:red;'>Psj.=>'Pasaje'</b></h4><br>
                                                 <h4><b style='color:red;'>Lt. =>'Lote'</b></h4><br>
                                                 <h4><b style='color:red;'># => 'Nro'</b></h4>
                                                 </td><td colspan='2'>&nbsp;&nbsp;&nbsp;</td>
                                                 <td class='controls'>
                                                 <h4><b style='color:red;'>Int. =>'Interior'</b></h4><br>
                                                 <h4><b style='color:red;' >Mz. =>'Manzana'</b></h4><br>
                                                 <h4><b style='color:red;'>Piso =>'Piso'</b></h4><br>
                                                 <h4><b style='color:red;'>Dpto.=>'Depart.'</b></h4><br>
                                                 <h4><b style='color:red;'>Sect.=>'Sector'</b></h4><br>
                                                 <h4><b style='color:red;'>Etp. =>'Etapa'</b></h4></td>
                                                 </td><td colspan='1'>&nbsp;&nbsp;&nbsp;</td>
                                                 </tr></table>"><?php echo form_input($txt_upd_col_direccion); ?></a>
            </td>

        </tr>
        <tr> 
            <td>

                <label class="control-label">Departamento:</label>
            </td>
            <td>

                <div class="controls">

                    <select id="Departamentos" name="Departamentos" style="width:200px;">
                        <?php
                        foreach ($departamento as $fila) {
                            if ($fila->codigo == $codigodepa) {
                                ?>
                                <option value="<?php echo $fila->codigo ?>" selected><?php echo mb_convert_encoding($fila->descrip, "UTF-8") ?></option>
                                <?php
                                $txt_hd_Departamentos = array('name' => 'txt_hd_Departamentos', 'id' => 'txt_hd_Departamentos', 'type' => 'hidden', 'value' => mb_convert_encoding($fila->descrip, "UTF-8"));
                            } else {
                                ?>
                                <option value="<?php echo $fila->codigo ?>"><?php echo mb_convert_encoding($fila->descrip, "UTF-8") ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>
                </div>                                

            </td>
            <td>

                <label class="control-label">Provincia:</label>
            </td>
            <td>

                <div class="controls">
                    <select id="Provincia" name="Provincia" style="width:200px;">
                        <?php
                        foreach ($provincia as $fila2) {
                            if ($fila2->codigo == $codigoprovi) {
                                ?>
                                <option value="<?php echo $fila2->codigo ?>" selected><?php echo mb_convert_encoding($fila2->descrip, "UTF-8") ?></option>
                                <?php
                                $txt_hd_Provincia = array('name' => 'txt_hd_Provincia', 'id' => 'txt_hd_Provincia', 'type' => 'hidden', 'value' => mb_convert_encoding($fila2->descrip, "UTF-8"));
                            } else {
                                ?>
                                <option value="<?php echo $fila2->codigo ?>"><?php echo mb_convert_encoding($fila2->descrip, "UTF-8") ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>                                

            </td>
        </tr>
        <tr>
            <td>

                <label class="control-label">Distrito:</label>
            </td>
            <td>
                <div class="controls">
                    <select id="Distrito" name="Distrito" style="width:200px;">
                        <?php
                        foreach ($distrito as $fila3) {
                            if ($fila3->codigo == $codigodistri) {
                                ?>
                                <option value="<?php echo $fila3->codigo ?>" selected><?php echo mb_convert_encoding($fila3->descrip, "UTF-8") ?></option>
                                <?php
                                $txt_hd_Distrito = array('name' => 'txt_hd_Distrito', 'id' => 'txt_hd_Distrito', 'type' => 'hidden', 'value' => mb_convert_encoding($fila3->descrip, "UTF-8"));
                            } else {
                                ?>
                                <option value="<?php echo $fila3->codigo ?>"><?php echo mb_convert_encoding($fila3->descrip, "UTF-8") ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>                                

            </td>
            <td>

                <label class="control-label">Zona:</label>
            </td>
            <td>
                <div class="controls">
                    <select id="Zona" name="Zona" style="width:200px;">
                        <?php
                        foreach ($zona as $fila4) {
                            if ($fila4->codigo == $codigozona) {
                                ?>
                                <option value="<?php echo $fila4->codigo ?>" selected><?php echo mb_convert_encoding($fila4->descrip, "UTF-8") ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $fila4->codigo ?>"><?php echo mb_convert_encoding($fila4->descrip, "UTF-8") ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>                                

            </td>
        </tr>
        <tr>   
            <td><b><div id="preLoad"></div></b></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>  
                <?php echo form_input($hid_upd_regcol); ?>
                <?php echo form_input($txt_hd_sexo); ?>
                <?php echo form_input($txt_hd_estadocivil); ?>
                <?php echo form_input($txt_hd_emails); ?>
                <?php echo form_input($txt_hd_emailp); ?>
                <?php echo form_input($txt_hd_telefono); ?>
                <?php echo form_input($txt_hd_celular); ?>
                <?php echo form_input($txt_hd_celularrpm); ?>
                <?php echo form_input($txt_hd_celularrpc); ?>
                <?php echo form_input($txt_hd_tipocel); ?>
                <?php echo form_input($txt_hd_direccion); ?>
                <?php echo form_input($txt_hd_zona); ?>
                <?php echo form_input($txt_hd_fecnac); ?>
                <?php echo form_input($txt_hd_apepat); ?>
                <?php echo form_input($txt_hd_apemat); ?>
                <?php echo form_input($txt_hd_nombre); ?>
                <?php echo form_input($txt_hd_dni); ?>
                <?php echo form_input($txt_hd_Departamentos); ?>
                <?php echo form_input($txt_hd_Provincia); ?>
                <?php echo form_input($txt_hd_Distrito); ?>
                <?php echo $hip; ?>


                <br/>
                <?php echo $boton; ?> 
            </td>  
            <td>

            </td>
        </tr>   

        </tbody>
    </table> 
  </div>
</fieldset>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
</div>
</div>
                                