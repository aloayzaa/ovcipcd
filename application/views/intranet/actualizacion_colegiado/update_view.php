                    <script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsUpdateColegiado.js"></script>    
<?php
//$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $this->session->userdata('nick'), 'type' => 'hidden');
$hid_upd_regcol = array('name' => 'hid_upd_regcol', 'id' => 'hid_upd_regcol', 'value' => $nickname, 'type' => 'hidden');
$atributosForm = array('id' => 'frm_upddatos_personales', 'name' => 'frm_upddatos_personales');
echo form_open('actualizacion_colegiado/DatosColegiadoIntUpd/' . $regcol . "/", $atributosForm);
//$txt_upd_col_direccion = array('name' => 'txt_upd_col_direccion', 'id' => 'txt_upd_col_direccion', 'value' => mb_convert_encoding($direcol, "UTF-8"), "cols" => "190", "rows" => "3", 'style' => "width: 500px; height: 35px;", 'required' => 'required');
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
    $ip = $_SERVER['REMOTE_ADDR'];
$txt_upd_col_direccion_b = array('name' => 'txt_upd_col_direccion_b', 'id' => 'txt_upd_col_direccion_b', 'value' => mb_convert_encoding($direcol, "UTF-8"), 'style' => "width: 500px;height:24px;", 'readonly' => true);

$txt_upd_col_direccion_dir = array('name' => 'txt_upd_col_direccion_dir', 'id' => 'txt_upd_col_direccion_dir', 'style' => "width: 180px;",'placeholder'=>'Husares de Junin');
$txt_upd_col_direccion_no = array('name' => 'txt_upd_col_direccion_no', 'id' => 'txt_upd_col_direccion_no', 'style' => "width: 50px;",'placeholder'=>'232');
$txt_upd_col_direccion_int = array('name' => 'txt_upd_col_direccion_int', 'id' => 'txt_upd_col_direccion_int', 'style' => "width: 80px;",'placeholder'=>'1');
$txt_upd_col_direccion_mz = array('name' => 'txt_upd_col_direccion_mz', 'id' => 'txt_upd_col_direccion_mz', 'style' => "width: 50px;",'placeholder'=>'I');
$txt_upd_col_direccion_lote = array('name' => 'txt_upd_col_direccion_lote', 'id' => 'txt_upd_col_direccion_lote', 'style' => "width: 50px;",'placeholder'=>'41');
$txt_upd_col_direccion_piso = array('name' => 'txt_upd_col_direccion_piso', 'id' => 'txt_upd_col_direccion_piso', 'style' => "width: 50px;",'placeholder'=>'3er');
$txt_upd_col_direccion_dpto = array('name' => 'txt_upd_col_direccion_dpto', 'id' => 'txt_upd_col_direccion_dpto', 'style' => "width: 50px;",'placeholder'=>'302');
$txt_upd_col_direccion_sector = array('name' => 'txt_upd_col_direccion_sector', 'id' => 'txt_upd_col_direccion_sector', 'style' => "width: 160px;",'placeholder'=>'A');
$txt_upd_col_direccion_etapa = array('name' => 'txt_upd_col_direccion_etapa', 'id' => 'txt_upd_col_direccion_etapa', 'style' => "width: 100px;",'placeholder'=>'3');

$txt_upd_col_emailp = array('name' => 'txt_upd_col_emailp', 'id' => 'txt_upd_col_emailp', 'value' => mb_convert_encoding($email, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:214px;", 'class' => 'cajasemail','readonly' => true);
$txt_upd_col_emails = array('name' => 'txt_upd_col_emails', 'id' => 'txt_upd_col_emails', 'value' => mb_convert_encoding($emailsec, "UTF-8"), 'maxlength' => '200', "style" => "resize:none;width:214px;", 'class' => 'cajasemail', 'required' => 'required');
$txt_upd_col_telefono = array('name' => 'txt_upd_col_telefono', 'id' => 'txt_upd_col_telefono', 'value' => mb_convert_encoding($telcol, "UTF-8"), 'maxlength' => '9', 'minlength' => '9', "style" => "resize:none;width:100px;", 'class' => 'cajasphone', 'required' => 'required');
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

$tipo_direccion = array(
    '' => 'Seleccionar',
    'Jr.' => 'Jr.',
    'Calle' => 'Calle',
    'Av.' => 'Av.',
    'Psj.' => 'Pasaje'
);


$txt_ins_col_fecnac = array('name' => 'txt_ins_col_fecnac', 'id' => 'txt_ins_col_fecnac','value' => mb_convert_encoding($fechanac, "UTF-8"), 'class' => 'cajascalendar', 'required' => 'required','readonly' => true);
$txt_upd_regcol = array('name' => 'txt_upd_regcol', 'id' => 'txt_upd_regcol');
$boton = form_submit('btn_upd_colegiado', 'Actualizar Datos Personales', 'id="btn_upd_colegiado" class="btn btn-primary"');

/// hiddens
$txt_hd_sexo = array('name' => 'txt_hd_sexo', 'id' => 'txt_hd_sexo','type' => 'hidden', 'value' => mb_convert_encoding($sexcol, "UTF-8"));
$txt_hd_estadocivil = array('name' => 'txt_hd_estadocivil', 'id' => 'txt_hd_estadocivil','type' => 'hidden', 'value' => mb_convert_encoding($colestcivil, "UTF-8"));
$txt_hd_emails = array('name' => 'txt_hd_emails', 'id' => 'txt_hd_emails','type' => 'hidden', 'value' => mb_convert_encoding($emailsec, "UTF-8"));
$txt_hd_telefono = array('name' => 'txt_hd_telefono', 'id' => 'txt_hd_telefono','type' => 'hidden', 'value' => mb_convert_encoding($telcol, "UTF-8"));
$txt_hd_celular = array('name' => 'txt_hd_celular', 'id' => 'txt_hd_celular','type' => 'hidden', 'value' => mb_convert_encoding($celcol, "UTF-8"));
$txt_hd_celularrpm = array('name' => 'txt_hd_celularrpm', 'id' => 'txt_hd_celularrpm','type' => 'hidden', 'value' => mb_convert_encoding($redpm, "UTF-8"));
$txt_hd_celularrpc = array('name' => 'txt_hd_celularrpc', 'id' => 'txt_hd_celularrpc','type' => 'hidden', 'value' => mb_convert_encoding($redpc, "UTF-8"));
$txt_hd_tipocel = array('name' => 'txt_hd_tipocel', 'id' => 'txt_hd_tipocel','type' => 'hidden','value' => mb_convert_encoding($celuemp, "UTF-8"));
$txt_hd_direccion = array('name' => 'txt_hd_direccion', 'id' => 'txt_hd_direccion','type' => 'hidden','value' => mb_convert_encoding($direcol, "UTF-8"));
$txt_hd_zona = array('name' => 'txt_hd_zona', 'id' => 'txt_hd_zona','type' => 'hidden','value' => mb_convert_encoding($codigozona, "UTF-8"));

//no editables
$txt_hd_fecnac = array('name' => 'txt_hd_fecnac', 'id' => 'txt_hd_fecnac','type' => 'hidden','value' => mb_convert_encoding($fechanac, "UTF-8"));
$txt_hd_emailp = array('name' => 'txt_hd_emailp', 'id' => 'txt_hd_emailp','type' => 'hidden','value' => mb_convert_encoding($email, "UTF-8"));
$txt_hd_nombre = array('name' => 'txt_hd_nombre', 'id' => 'txt_hd_nombre','type' => 'hidden','value' => mb_convert_encoding($nomcol, "UTF-8"));
$txt_hd_apepat = array('name' => 'txt_hd_apepat', 'id' => 'txt_hd_apepat','type' => 'hidden','value' => mb_convert_encoding($apecol, "UTF-8"));
$txt_hd_apemat = array('name' => 'txt_hd_apemat', 'id' => 'txt_hd_apemat','type' => 'hidden','value' => mb_convert_encoding($apematcol, "UTF-8"));
$txt_hd_dni = array('name' => 'txt_hd_dni', 'id' => 'txt_hd_dni','type' => 'hidden','value' => mb_convert_encoding($lecol, "UTF-8"));
$hip = form_hidden("ip", $ip, "ip", true);

?>
<div style="min-width: 600px;">
                            <?php echo form_input($hid_upd_regcol); ?>
                            <br />
                            <div class="box-head" style="border-style:solid;border-color: #B7B7B7;">
    <legend>Datos Personales</legend>
    <fieldset>     
        <table>
            <tbody>
                <tr>
  			<?php
					if(file_exists(FCPATH."fotos/".$nickname.".jpg")){
				?>
 <td style="width: 150px;text-align:center;vertical-align:top;"><img src="http://www.cip-trujillo.org/ovcipcdll/fotos/<?php echo $nickname ?>.jpg" width="105" height="115"></td>
			 				<?php }else{ ?>	
		 
 			<td style="width: 150px;text-align:center;vertical-align:top;"><img src="http://www.cip-trujillo.org/ovcipcdll/fotos/nofoto.jpg" width="105" height="115"></td>
	
			<?php } ?>

                   
                    <td style="vertical-align:top;" style="width: 300px;">
                        <table cellpadding="2" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><b>Nro CIP</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;color: #2a62bc;"><?php echo form_label(mb_convert_encoding($regcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nombres</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($nomcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Paterno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apecol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Apellido Materno</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($apematcol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                                <tr>
                                    <td><b>DNI</b></td>
                                    <td><b>:</b></td>
                                    <td style="padding-left:5px;"><?php echo form_label(mb_convert_encoding($lecol, "UTF-8"), '', $txt_upd_regcol); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 300px;">
                        <div class="control-group"  style="margin-left: 25px;">  
                            <label class="control-label">Sello:</label>
                            <div class="controls">
                        <?php
					if(file_exists(FCPATH."sellos/".$nickname.".jpg")){
				?>
			  <center><img style='max-width:95%;' src='http://www.cip-trujillo.org/ovcipcdll/sellos/<?php echo $nickname ?>.jpg' width='150' height='50'></center>
				<?php }else{ ?>			 
 			  <center><img style='max-width:95%;' src='http://www.cip-trujillo.org/ovcipcdll/sellos/nosello.jpg' width='150' height='50'></center>		
			<?php } ?>
                            </div>                                
                        </div>
                           <div class="control-group"  style="margin-left: 25px;">  
                            <label class="control-label">Firma:</label>
                            <div class="controls">
			  <?php
					if(file_exists(FCPATH."firmas/".$nickname.".jpg")){
				?>
			 <center><img style='max-width:95%;' src='http://www.cip-trujillo.org/ovcipcdll/firmas/<?php echo $nickname ?>.jpg' width='150' height='50'></center>
				<?php }else{ ?>			 
 			  <center><img style='max-width:95%;' src='http://www.cip-trujillo.org/ovcipcdll/firmas/nofirma.jpg' width='150' height='50'></center>		
			<?php } ?>

                         
                            </div>                                
                        </div>
                    </td>
                </tr>
        </table>
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
                        <label>Email CIP:</label>
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
                        <?php echo form_input($txt_upd_col_celular); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <?php
                        if ($celuemp == "T") {
                            ?>
                            <input id="movistar" type="radio" name="celuemp" checked value="T" required> Movistar
                            <?php
                        } else if ($celuemp == "CLARO") {
                            ?>
                            <input id="movistar" type="radio" name="celuemp"  value="T" required> Movistar
                            <?php
                        } else {
                            ?>
                            <input id="movistar" type="radio" name="celuemp"  value="T" required> Movistar
                            <?php
                        }
                        ?>
                        
                    </td>
                    <td>
                         <?php
                        if ($celuemp == "T") {
                            ?>
                            <input id="claro" align ="right" type="radio" name="celuemp" value="CLARO" required> Claro
                            <?php
                        } else if ($celuemp == "CLARO") {
                            ?>
                            <input id="claro" align ="right" type="radio" checked name="celuemp" value="CLARO" required> Claro
                            <?php
                        } else {
                            ?>
                            <input id="claro" align ="right" type="radio" name="celuemp" value="CLARO" required> Claro
                            <?php
                        }
                        ?>
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
                    <td class="controls"> 
                        <?php echo form_input($txt_upd_col_celularrpc); ?>
                    </td>
                </tr>
        
                <tr>
                    <td colspan="2">&nbsp; </td>    
                </tr>
                <tr>
                    <td colspan="4"> <legend>Datos de Localización</legend></td>    
                </tr>
                <tr>
                                            <td>
                                                <label>Direccion:</label>  
                                            </td>
                                            <td class="controls" colspan="3"> 
                                                <?php echo form_input($txt_upd_col_direccion_b); ?> <img class="btn" id="toogledireccion" src="http://i.imgur.com/qjt9qKC.png" height="23">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="4">
                                                
                                                <div id="nuevadireccion" style="display: none" class="well">
                                                    <table width="100%">
                                        <tr>
                                             <td>
                                                <label>* Tipo Direccion:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                                <?php echo form_dropdown('cbo_tipo_direccion', $tipo_direccion, '', 'id="cbo_tipo_direccion" style="cursor:pointer;width:110px;"' ); ?>
                                                
                                            </td>
                                             <td>
                                                <label>* Descripcion:</label>   
                                            </td>
                                            <td class="controls"> 
                                                <?php echo form_input($txt_upd_col_direccion_dir); ?> 
                                                
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <label>* Nro:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                               <?php echo form_input($txt_upd_col_direccion_no); ?>  
                                            </td>
                                             <td>
                                                <label>Interior:</label>   
                                            </td>
                                            <td class="controls"> 
                                                <?php echo form_input($txt_upd_col_direccion_int); ?> 
                                                
                                            </td>
                                        </tr>
                                           <tr>
                                             <td>
                                                <label>Mz:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                               <?php echo form_input($txt_upd_col_direccion_mz); ?>  
                                            </td>
                                             <td>
                                                <label>Lote:</label>   
                                            </td>
                                            <td class="controls"> 
                                                <?php echo form_input($txt_upd_col_direccion_lote); ?> 
                                                
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <label>Piso:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                               <?php echo form_input($txt_upd_col_direccion_piso); ?>  
                                            </td>
                                             <td>
                                                <label>Dpto:</label>   
                                            </td>
                                            <td class="controls"> 
                                                <?php echo form_input($txt_upd_col_direccion_dpto); ?> 
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                              <td>
                                                <label>Sector:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                               <?php echo form_input($txt_upd_col_direccion_sector); ?>  
                                                
                                                 
                                            </td>
                                             <td>
                                                <label>Etapa:</label>   
                                            </td>
                                            <td class="controls"> 
         
                                               <?php echo form_input($txt_upd_col_direccion_etapa); ?>  
                                                
                                                 
                                            </td>
                                        </tr>

                                    </table><br>
<font color="red">Importante: (*) Campos obligatorios para el ingreso correcto de su direcci&oacute;n.!</font>
                                               </div> 
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
                if($fila->codigo == $codigodepa){
                ?>
              <option value="<?php echo $fila->codigo ?>" selected><?php echo mb_convert_encoding($fila->descrip, "UTF-8") ?></option>
                <?php
                $txt_hd_Departamentos = array('name' => 'txt_hd_Departamentos', 'id' => 'txt_hd_Departamentos','type' => 'hidden','value' => mb_convert_encoding($fila->descrip, "UTF-8"));

                }else{
               ?>
              <option value="<?php echo $fila->codigo ?>"><?php echo mb_convert_encoding($fila->descrip, "UTF-8") ?></option>
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
                if($fila2->codigo == $codigoprovi){
                ?>
              <option value="<?php echo $fila2->codigo ?>" selected><?php echo mb_convert_encoding($fila2->descrip, "UTF-8") ?></option>
                <?php
                $txt_hd_Provincia = array('name' => 'txt_hd_Provincia', 'id' => 'txt_hd_Provincia','type' => 'hidden','value' => mb_convert_encoding($fila2->descrip, "UTF-8"));

                }else{
               ?>
              <option value="<?php echo $fila2->codigo ?>"><?php echo mb_convert_encoding($fila2->descrip, "UTF-8") ?></option>
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
                if($fila3->codigo == $codigodistri){
                ?>
              <option value="<?php echo $fila3->codigo ?>" selected><?php echo mb_convert_encoding($fila3->descrip, "UTF-8") ?></option>
                <?php
                $txt_hd_Distrito = array('name' => 'txt_hd_Distrito', 'id' => 'txt_hd_Distrito','type' => 'hidden','value' => mb_convert_encoding($fila3->descrip, "UTF-8"));

                }else{
               ?>
              <option value="<?php echo $fila3->codigo ?>"><?php echo mb_convert_encoding($fila3->descrip, "UTF-8") ?></option>
              <?php
            }}
                ?>
                                </select>
                            </div>                                
                        
                    </td>
                     <td>
                         
                            <label class="control-label">Zona:</label>
                    </td>
                    <td>
                            <div class="controls">
                                <select id="Zona" name="Zona" class="chzn-select" style="width:200px;">
                                    <?php
                                   
            foreach ($zona as $fila4) {    
                if($fila4->codigo == $codigozona){
                ?>
              <option value="<?php echo $fila4->codigo ?>" selected><?php echo mb_convert_encoding($fila4->descrip, "UTF-8") ?></option>
                <?php
                }else{
               ?>
              <option value="<?php echo $fila4->codigo ?>"><?php echo mb_convert_encoding($fila4->descrip, "UTF-8") ?></option>
              <?php
            }}
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
    </fieldset><br></div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
                                
                        </div>