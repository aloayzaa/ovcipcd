<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDatosUsuarioe.js"></script>
<?php
//$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $this->session->userdata('nick'), 'type' => 'hidden');
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $this->session->userdata('nick'), 'type' => 'hidden');
$atributosForm = array('id' => 'frm_actualizar_usuarioe', 'name' => 'frm_actualizar_usuarioe');
echo form_open('actualizacion_colegiado/DatosColegiadoIntUpd/', $atributosForm);
$txt_upd_col_dni = array('name' => 'txt_upd_col_dni', 'id' => 'txt_upd_col_dni', 'value' => mb_convert_encoding($dni, "UTF-8"), 'maxlength' => '8', 'minlength' => '8', "style" => "resize:none;width:214px;", 'required' => 'required','readonly' => true);
$txt_upd_col_nombres = array('name' => 'txt_upd_col_nombres', 'id' => 'txt_upd_col_nombres', 'value' => mb_convert_encoding($nombres, "UTF-8"), "style" => "resize:none;width:214px;", 'required' => 'required');
$txt_upd_col_apellidopat = array('name' => 'txt_upd_col_apellidopat', 'id' => 'txt_upd_col_apellidopat', 'value' => mb_convert_encoding($apellidopat, "UTF-8"), "style" => "resize:none;width:214px;", 'required' => 'required');
$txt_upd_col_apellidomat = array('name' => 'txt_upd_col_apellidomat', 'id' => 'txt_upd_col_apellidomat', 'value' => mb_convert_encoding($apellidomat, "UTF-8"), "style" => "resize:none;width:214px;", 'required' => 'required');

$txt_upd_col_direccion = array('name' => 'txt_upd_col_direccion', 'id' => 'txt_upd_col_direccion', 'value' => mb_convert_encoding($direccion, "UTF-8"), "cols" => "190", "rows" => "3", 'style' => "width: 500px; height: 35px;", 'required' => 'required');
$txt_upd_col_email = array('name' => 'txt_upd_col_email', 'id' => 'txt_upd_col_email', 'value' => mb_convert_encoding($email, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:214px;", 'class' => 'cajasemail', 'type' => 'email');
$txt_upd_col_telefono = array('name' => 'txt_upd_col_telefono', 'id' => 'txt_upd_col_telefono', 'value' => mb_convert_encoding($telefono, "UTF-8"), "style" => "resize:none;width:100px;", 'class' => 'cajasphone', 'required' => 'required');
$txt_upd_col_celular = array('name' => 'txt_upd_col_celular', 'id' => 'txt_upd_col_celular', 'value' => mb_convert_encoding($celular, "UTF-8"),  "style" => "resize:none;width:120px;", 'class' => 'cajascell', 'required' => 'required');
$cbosexo = array(
    '' => 'Seleccionar',
    '0' => 'MASCULINO',
    '1' => 'FEMENINO',
);
$txt_ins_col_fecnac = array('name' => 'txt_ins_col_fecnac', 'id' => 'txt_ins_col_fecnac','value' => mb_convert_encoding($fecnac, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required','readonly' => true);
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Personales', 'id="btn_upd_colegiado" class="btn btn-primary"');
?>

<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Actualización de Usuario Externo</i></h3>
                
                            </div>
            <div class="box-content">
                <div id="Tabs_UpdColegiado">
                   <div id="colegiadol">
                        <div style="min-width: 600px;">
                            <?php echo form_input($hid_upd_regcol); ?>
                            <br />
                            <div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    <legend>Datos Personales</legend>
    <fieldset>     
        
        <table>
             <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td>
                        <label>DNI:</label>
                    </td>
                    <td class="controls">
                    <?php echo form_input($txt_upd_col_dni); ?>
                    </td>
                
                    <td>
                        <label>Nombres:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_upd_col_nombres); ?>
                    </td>
                </tr>
            <tr>
                <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td>
                        <label>Apellido Paterno:</label>
                    </td>
                    <td class="controls">
                    <?php echo form_input($txt_upd_col_apellidopat); ?>
                    </td>
                
                    <td>
                        <label>Apellido Materno:</label>
                    </td>
                    <td class="controls">
                        <?php echo form_input($txt_upd_col_apellidomat); ?>
                    </td>
                </tr>
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
                        <?php echo form_input($txt_ins_col_fecnac); ?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td>
                        <label>Estado Civil:</label>
                    </td>
                    <td class="controls">
                         <select id='cbo_ins_estado_civil' class="styled" name='cbo_ins_estado_civil' required="required">
                                                                        <?php 
                                                                        foreach($estadocivil as $p_ea){
                                                                        if($p_ea->nParId == $ecivil){
                                                                        ?>
                             
                                                                        <option value="<?php echo $p_ea->nParId?>" selected><?php echo $p_ea->cParDescripcion?></option>
                                                                           
                                                                        <?php }else{ ?>
                                                                        <option value="<?php echo $p_ea->nParId?>"><?php echo $p_ea->cParDescripcion?></option>
                                                                        <?php  
                                                                        }
                                                                        }
                                                                        ?> 
                         </td>
                 <td>
                        <label>Email Principal:</label>
                    </td>
                    <td class="controls" >
                        <?php echo form_input($txt_upd_col_email); ?>
                    </td>
                </tr> 
                 <tr>
                    <td colspan="2"> &nbsp;</td>    
                </tr>
                <tr>
                    <td>
                        <label>Celular:</label>
                    </td>
                    <td class="controls" style="width: 248px;"> 
                        <?php echo form_input($txt_upd_col_celular); ?>
                    </td>
                
                    <td>
                        <label>Telefono:</label>
                    </td>
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_telefono); ?>
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
                        <?php echo form_textarea($txt_upd_col_direccion); ?>
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
                                   
            foreach ($departamento as $fila) {    
                if($fila->cUbiIdDepartamento == $coddepartamento){
                ?>
              <option value="<?php echo $fila->cUbiIdDepartamento ?>" selected><?php echo mb_convert_encoding($fila->cUbiDescripcion, "UTF-8") ?></option>
                <?php
                
                }else{
               ?>
              <option value="<?php echo $fila->cUbiIdDepartamento ?>"><?php echo mb_convert_encoding($fila->cUbiDescripcion, "UTF-8") ?></option>
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
                                   
            foreach ($provincia as $fila2) {    
                if($fila2->cUbiIdProvincia == $codprovincia){
                ?>
              <option value="<?php echo $fila2->cUbiIdProvincia ?>" selected><?php echo mb_convert_encoding($fila2->cUbiDescripcion, "UTF-8") ?></option>
                <?php
        
                }else{
               ?>
              <option value="<?php echo $fila2->cUbiIdProvincia ?>"><?php echo mb_convert_encoding($fila2->cUbiDescripcion, "UTF-8") ?></option>
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
                                   
            foreach ($distrito as $fila3) {    
                if($fila3->cUbiIdDistrito == $coddistrito){
                ?>
              <option value="<?php echo $fila3->cUbiIdDistrito ?>" selected><?php echo mb_convert_encoding($fila3->cUbiDescripcion, "UTF-8") ?></option>
                <?php
   
                }else{
               ?>
              <option value="<?php echo $fila3->cUbiIdDistrito ?>"><?php echo mb_convert_encoding($fila3->cUbiDescripcion, "UTF-8") ?></option>
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
                    <td><b><div id="preLoad"></div></b></td>
                    <td>  
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
                        <div id="c_frm_familia_upd"></div>
                    </div>
                     <div id="colegiado4">
                        <br>
                        <div id="c_frm_deporte_upd"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>