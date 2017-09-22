<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersona.js"></script>
<?php
$registroform = array('id' => 'frm_ins_persona', 'name' => 'frm_ins_persona', 'class' => 'form-horizontal');
echo form_open('persona/DatosPersonaIns', $registroform);
$txt_ins_col_dni = array('name' => 'txt_ins_col_dni', 'id' => 'txt_ins_col_dni', "style" => "resize:none;width:160px;", 'required' => 'required','minlength' => '8', 'maxlength' => '8', 'placeholder' => 'DNI', 'class' => 'cajassearch');
$txt_ins_col_nombres = array('name' => 'txt_ins_col_nombres', 'id' => 'txt_ins_col_nombres', 'maxlength' => '50', "style" => "resize:none;width:238px;", 'required' => 'required', 'placeholder' => 'Nombres');
$txt_ins_col_apellidopat = array('name' => 'txt_ins_col_apellidopat', 'id' => 'txt_ins_col_apellidopat', 'maxlength' => '50', "style" => "resize:none;width:238px;", 'required' => 'required', 'placeholder' => 'Apellido Paterno');
$txt_ins_col_apellidomat = array('name' => 'txt_ins_col_apellidomat', 'id' => 'txt_ins_col_apellidomat', 'maxlength' => '50', "style" => "resize:none;width:238px;", 'required' => 'required', 'placeholder' => 'Apellido Materno');
$txt_ins_col_email = array('name' => 'txt_ins_col_email', 'id' => 'txt_ins_col_email', 'maxlength' => '200', "style" => "resize:none;width:238px;", 'class' => 'cajasemail email required', 'required' => 'required', 'placeholder' => 'Email');
$txt_ins_col_direc = array('name' => 'txt_ins_col_direc', 'id' => 'txt_ins_col_direc', 'maxlength' => '200', 'class' => 'cajasdireccion','style' => "width: 500px;", 'placeholder' => 'Direccion');
$txt_ins_col_tel = array('name' => 'txt_ins_col_tel', 'id' => 'txt_ins_col_tel', 'class' => 'cajasphone','minlength' => '9', 'maxlength' => '11', "style" => "resize:none;width:160px;", 'placeholder' => 'Telefono');
$txt_ins_col_cel = array('name' => 'txt_ins_col_cel', 'id' => 'txt_ins_col_cel', 'class' => 'cajascell','minlength' => '9', 'maxlength' => '11', "style" => "resize:none;width:160px;", 'placeholder' => 'Celular');
$txt_ins_col_fecnac = array('name' => 'txt_ins_col_fecnac', 'id' => 'txt_ins_col_fecnac', 'class' => 'cajascalendar',"style" => "resize:none;width:160px;", 'placeholder' => 'Fecha Nacimiento');
$cbosexo = array(
    '' => 'Sexo',
    '1' => 'MASCULINO',
    '0' => 'FEMENINO',
);
$txt_ins_col_usr = array('name' => 'txt_ins_col_usr', 'id' => 'txt_ins_col_usr', 'minlength' => '6', 'maxlength' => '12', "style" => "resize:none;width:238px;", 'class' => 'cajasuser', 'required' => 'required', 'placeholder' => 'Usuario');
$txt_ins_col_pwd = array('name' => 'txt_ins_col_pwd', 'id' => 'txt_ins_col_pwd', 'minlength' => '6','type'=>'password', 'maxlength' => '12', "style" => "resize:none;width:238px;", 'class' => 'cajaspwd', 'required' => 'required', 'placeholder' => 'Contraseña');
$txt_ins_col_rpwd = array('name' => 'txt_ins_col_rpwd', 'id' => 'txt_ins_col_rpwd', 'minlength' => '6','type'=>'password', 'maxlength' => '12', "style" => "resize:none;width:238px;", 'placeholder' => 'Repetir Contraseña', 'required' => 'required', 'class'=>'validate[required,equals[txt_ins_col_pwd]]');
$check_email = array('name'        => 'check_email',
    'id'          => 'check_email',
    'value'       => 'accept',
    'checked'     => TRUE,
    'style'       => 'margin:10px')

?>
   
<div align="center">
		    <form id="validate" class="form-horizontal" action="#">
	            <fieldset>
                     <div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
                                    <div class="box-head">
							<h3>REGISTRO DE USUARIO EXTERNO CIP TRUJILLO</h3>
						</div>
	                    <div class="well">
                                <table style="width: 700px">
                                    <tr>
                                        <td style="width: 100px"></td>
                                        <td style="width: 600px">    <br>
                                <legend style="font-weight:bold;color: #00538b;font-size: 16px;">Datos Personales</legend>
                                     <table>
                                                    <tbody>
       
                                                        <tr style="height:50px;">
                                                            <td style="width:238px;">
                                                               <p>
                                                                    
                                                               <?php echo form_input($txt_ins_col_dni); ?><span id="cargadni"></span>
						      
                                                                </p>
                                                            </td>
                                                            <td style="width:50px;">&nbsp;</td>
                                                            <td style="width:238px;">
                                                                <p>
                                                                 <?php echo form_input($txt_ins_col_nombres); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>
                                                         <tr style="height:50px;">
                                                            <td style="width:238px;">
                                                                <p>
                                                                 <?php echo form_input($txt_ins_col_apellidopat); ?>
                                                                     
                                                                </p>
                                                            </td>
                                                             <td style="width:50px;">&nbsp;</td>
                                                            <td style="width:238px;">
                                                                <p>
                                                                 <?php echo form_input($txt_ins_col_apellidomat); ?>
                                                                     
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr style="height:50px;">
                                                            <td style="width:238px;">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_fecnac); ?><span id="cargafec"></span>
                                                                    
                                                                </p>
                                                            </td>
                                                            <td style="width:50px;">&nbsp;</td>
                                                            <td style="width:238px;">
                                                                <p>
                                                                    <?php echo form_dropdown('cbo_ins_col_sexo', $cbosexo, 'Sexo','id="cbo_ins_col_sexo" style="cursor:pointer;"  class="styled" required="required" '); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr style="height:50px;">
                                                           <td style="width:238px;">
                                                                <p>
                                                                     <select id='cbo_ins_estado_civil' class="styled" name='cbo_ins_estado_civil' required="required">
                                                                        <?php 
                                                                        foreach($estadocivil as $p_ea){
                                                                        ?>
                                                                          <option value="<?php echo $p_ea->nParId?>"><?php echo $p_ea->cParDescripcion?></option>
                                                                        <?php  
                                                                        }
                                                                        ?> 
                                                                          
                                                                    </p>
                                                                    
                                                            </td>
                                                            
                                                            <td style="width:50px;">&nbsp;</td>
                                                            <td style="width:238px;">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_email); ?><span id="cargaemail"></span>
                                                               
                                                                   </p>
                                                            </td>
                                                        </tr>

                                                        <tr style="height:50px;">
                                                            <td style="width:238px;">
                                                                <p>  <?php echo form_input($txt_ins_col_tel); ?>
                                                               
                                                                      </p>
                                                            </td>
                                                            <td style="width:50px;">&nbsp;</td>
                                                            <td style="width:238px;">
                                                                <p>
                                                                    
                                                                    <?php echo form_input($txt_ins_col_cel); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>
                                     </table>
                                </td>
                                        <td style="width: 100px"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px"></td>
                                    <td>
                                     <legend style="font-weight:bold;color: #00538b;font-size: 16px;">Datos de Ubicación</legend>
                                     <table>
                                                        <tr style="height:70px;">                                                                       
                                                           <td style="width:160px;">
                                                                <p>
                                                                    <select id='cbo_departamentos' name='cbo_departamentos' class="cho chzn-done" tabindex="2" required="required">
                                                                        <?php 
                                                                        foreach($departamentos as $fila){
                                                                        ?>
                                                                          <option value="<?php echo $fila->idubigeo?>"><?php echo $fila->cUbiDescripcion?></option>
                                                                        <?php  
                                                                        }
                                                                        ?>
                                                                    </select>
                                                            </p>
                                                            </td>
                                                            
                                                            <td style="width:160px;">
                                                                <p>
                                                                    <select id='cbo_provincia' name='cbo_provincia' class="select" tabindex="2" required="required"> 
                                                                        <option value="">PROVINCIA</option>
                                                                    </select>
                                                                </p>
                                                            </td>
                                                            
                                                           <td style="width:160px;">
                                                                <p>
                                                                   <select id='cbo_distrito' name='cbo_distrito' class="select" tabindex="2" required="required"> 
                                                                       <option value="">DISTRITO</option>
                                                                    </select>
                                                                </p>
                                                            </td>
                                                        </tr>                                         
                                                       <tr style="height:50px;"> 
                                                            <td colspan="3">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_direc); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                     </td>
                                        <td style="width: 100px"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100px"></td>
                                    <td><legend style="font-weight:bold;color: #00538b;font-size: 16px;">Datos de Usuario</legend>
                                     <table>
                                         <tr style="height:50px;" colspan="3">                                                                        
                                                               <td style="width:238px;" colspan="2">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_usr); ?><span id="cargausu"></span>
                                                                    
                                                                </p>
                                                            </td>
															           <td colspan="2">
																	  <label style="font-weight:bold;color: #00538b;font-size: 15px;">Envio de Correo</label>
                                                                <p>
                                                                    <?php echo form_checkbox($check_email); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                        </tr>                                         
                                                        <tr style="height:50px;">
                                                              <td style="width:238px;">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_pwd); ?>
                                                                    
                                                                </p>
                                                            </td>
                                                            <td style="width:50px;">&nbsp;</td>
                                                               <td style="width:238px;">
                                                                <p>
                                                                    <?php echo form_input($txt_ins_col_rpwd); ?>
                                                                     
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:238px;">
                                                               
                                                            </td>
                                                            <td style="width:50px;"></td>
                                                            <td style="width:238px;" align="right">
                                                                <p><button type="submit" class="btn btn-info">Registrar</button>
                                                                <button type="reset" class="btn">Resetear</button></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="height:50px;"></td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                </td>
                                        <td style="width: 100px"></td>
                                </tr>
                                
                                </table>
                                
                                </div>
                                   </div>         
                                </div>
                           
                 	        
                    
	            
                                           </div>                 

<br><br><br>
</div>
                        </fieldset>
				</form>

<?php echo validation_errors(); ?>
<?php echo form_close(); ?>
<?php
//CARGA DEL FOOTER
$this->load->view('dashboard/footer');
?>
