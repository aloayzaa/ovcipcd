<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDatosUsuario.js"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_UpdUsuario').tabs();
    })
</script>
<?php
$hid_upd_usunick = array('name' => 'hid_upd_usunick', 'id' => 'hid_upd_usunick', 'value' => 'juliogerardo', 'type' => 'hidden');
$atributosForm = array('id' => 'frm_upddatos_personales', 'name' => 'frm_upddatos_personales');
echo form_open('actualizacion_usuario/DatosUsuarioIntUpd/' . $nperid . "/", $atributosForm);

$txt_upd_nombre = array('name' => 'txt_upd_nombre', 'id' => 'txt_upd_nombre', 'value' => mb_convert_encoding($nombre, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_apepat = array('name' => 'txt_upd_apepat', 'id' => 'txt_upd_apepat', 'value' => mb_convert_encoding($apepat, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_apemat = array('name' => 'txt_upd_apemat', 'id' => 'txt_upd_apemat', 'value' => mb_convert_encoding($apemat, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_fecnac = array('name' => 'txt_upd_fecnac', 'id' => 'txt_upd_fecnac', 'value' => mb_convert_encoding($fecnac, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_dni = array('name' => 'txt_upd_dni', 'id' => 'txt_upd_dni', 'value' => mb_convert_encoding($dni, "UTF-8"), 'style' => "width: 215px;",'readonly' => true);
$txt_upd_email = array('name' => 'txt_upd_email', 'id' => 'txt_upd_email', 'value' => mb_convert_encoding($email, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_direccion = array('name' => 'txt_upd_direccion', 'id' => 'txt_upd_direccion', 'value' => mb_convert_encoding($direccion, "UTF-8"), "cols" => "190", "rows" => "3", 'style' => "width: 560px; height: 35px;", 'required' => 'required');
$txt_upd_telefono = array('name' => 'txt_upd_telefono', 'id' => 'txt_upd_telefono', 'value' => mb_convert_encoding($telefono, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_upd_celular = array('name' => 'txt_upd_celular', 'id' => 'txt_upd_celular', 'value' => mb_convert_encoding($celular, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required');
$txt_hd_nperid = array('name' => 'txt_hd_nperid', 'id' => 'txt_hd_nperid', 'value' => mb_convert_encoding($nperid, "UTF-8"), 'style' => "width: 215px;", 'required' => 'required','type' => 'hidden');

$cbosexo = array(
    '' => 'Seleccionar',
    '1' => 'MASCULINO',
    '0' => 'FEMENINO',
);
$cboestado_civil = array(
    '' => 'Seleccionar',
    '0' => 'SOLTERO',
    '1' => 'CASADO',
    '2' => 'DIVORCIADO',
    '3' => 'VIUDO',
);
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Personales', 'id="btn_upd_colegiado" class="btn btn-primary"');

?>

<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Actualización de Usuario</i></h3>
                
                            </div>
            <div class="box-content">
                <div id="Tabs_UpdUsuario">
                    <ul>
                        <li><a href="#colegiadol" id="colegiadoDatosPersonales"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/16/user.png"> DatosPersonales</a></li>
                    </ul>
                    <div id="colegiadol">
                        <div style="min-width: 600px;">
                            <?php echo form_input($hid_upd_usunick); ?>
                            <br />
                            <div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    <legend>Datos Personales de Usuario</legend>
    <fieldset>     
        <table>
            <tbody>
                <tr>
                    <td style="width: 150px;text-align:center;vertical-align:top;"><img src="../uploads/ruteo/usuario.png" width="105" height="115"></td>
                    <td style="vertical-align:top;" style="width: 300px;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                               
                                <tr>
                                    <td><b>Nombres</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_nombre); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Paterno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_apepat); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Materno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_apemat); ?></td>
                                </tr>
                                <tr>
                                    <td><b>DNI</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_input($txt_upd_dni); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                   
                </tr>
        </table>
        <table>
            <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td>
                        <label>Sexo:</label>
                    </td>
                    <td class="controls">
                    <?php echo form_dropdown('cbo_upd_col_sexo', $cbosexo, $sexo, 'id="cbo_upd_col_sexo" style="cursor:pointer;"  required="required"'); ?>
                    
                    </td>
                
                    <td>
                        <label>Fecha de Nacimiento:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_upd_fecnac); ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Estado Civil:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_dropdown('cbo_ins_estado_civil', $cboestado_civil, $estadocivil, 'id="cbo_ins_estado_civil" style="cursor:pointer;"  required="required"'); ?>
                    </td>
                 <td>
                        <label>Email:</label>
                    </td>
                    <td class="controls" >
                        <?php echo form_input($txt_upd_email); ?>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Teléfono:</label>
                    </td>
                    <td class="controls" style="width: 248px;"> 
                        <?php echo form_input($txt_upd_telefono); ?>
                    </td>
                
                    <td>
                        <label>Celular:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_celular); ?>
                    </td>
                </tr> 
                
               
        
                <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td colspan="4"> <legend>Datos de Localización</legend></td>    
                </tr>
                  <tr>
                    <td>
                        <label>Dirección:</label>
                    </td>
                    <td class="controls" colspan="3"> 
                        <?php echo form_textarea($txt_upd_direccion); ?>
                    </td>
                 </tr>
                 
                 <tr>
                    <td>
                         
                            <label class="control-label">Departamento:</label>
                    </td>
                    <td>
                            
                            <div class="controls">
                                
                                <select id="Departamentos" name="Departamentos" class="chzn-select" style="width:200px;">
                                   <?php 
                                        foreach($departamentos as $fila){
                                        if($fila->idubigeo == $departamento){
                                          
                ?>
              <option value="<?=$fila->idubigeo?>" selected><?=$fila->cUbiDescripcion?></option>
                <?php
                
                }else{
               ?>
                                   <option value="<?=$fila->idubigeo?>"><?=$fila->cUbiDescripcion?></option>
                                  <?php  
                                        }}
                                    ?>
                                    
                                </select>
                            </div>                                
                        
                    </td>
                     <td>
                         
                            <label class="control-label">Provincia:</label>
                    </td>
                    <td>
                            
                            <div class="controls">
                                <select id="Provincia" name="Provincia" class="chzn-select" style="width:200px;">
                                   <?php 
                                        foreach($provincias as $fila2){
                                        if($fila2->idubigeo == $provincia){
                                          
                ?>
              <option value="<?=$fila2->idubigeo?>" selected><?=$fila2->cUbiDescripcion?></option>
                <?php
                
                }else{
               ?>
                                   <option value="<?=$fila2->idubigeo?>"><?=$fila2->cUbiDescripcion?></option>
                                  <?php  
                                        }}
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
                                        foreach($distritos as $fila3){
                                        if($fila3->idubigeo == $distrito){
                                          
                ?>
              <option value="<?=$fila3->idubigeo?>" selected><?=$fila3->cUbiDescripcion?></option>
                <?php
                
                }else{
               ?>
                                   <option value="<?=$fila3->idubigeo?>"><?=$fila3->cUbiDescripcion?></option>
                                  <?php  
                                        }}
                                    ?>
                                </select>
                            </div>                                
                        
                    </td>
                     <td>
                         
                            <label class="control-label"></label>
                    </td>
                    <td>
                            <div class="controls">
                               
                            </div>                                
                        
                    </td>
                </tr>
                <tr>   
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>  
                     
                        <?php echo form_input($txt_hd_nperid); ?>
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
                                
                        </div>
                    </div>
                    <div id="colegiado2">
                         <div style="min-width: 400px;">
                        <br>
                        <div id="c_frm_prof_upd"></div></div>
                    </div>
                    <div id="colegiado3">
                        <br>
                        <div id="c_qry_emp"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>