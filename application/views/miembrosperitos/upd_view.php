<script type="text/javascript" src='<?php echo URL_JS;?>miembrosperitos/jsMiembrosUpd.js'></script>  


<?php $frm_upd_miembros= array('id'=>'frm_upd_miembros',
    'name'=>'frm_upd_miembros',
    'class'=>'form-horizontal'
    );

echo form_open('miembrosperitos/miembrosperitos/miembrosPeritosUpd/'.$nPeritoId."/",$frm_upd_miembros);
  

$txt_upd_miembro_Datos=array('name'=>'txt_upd_miembro_Datos',
    'id'=>'txt_upd_miembro_Datos',
    'style'=>"font-weight:bold; font-size:15px;");

$txt_upd_miembro_Cip=array('name'=>'txt_upd_miembro_Cip',
    'id'=>'txt_upd_miembro_Cip',
    'style'=>"font-weight:bold;text-align:center;font-size:15px;"
    );        
$txt_upd_miembro_Especialidad=array('name'=>'txt_upd_miembro_Especialidad',
    'id'=>'txt_upd_miembro_Especialidad',
    'style'=>"resize:none;width:240px;height:60px;",
    'maxlength' => '80',
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($especialidad, 'UTF-8'));        
$txt_upd_miembro_Adscrito=array('name'=>'txt_upd_miembro_Adscrito',
    'id'=>'txt_upd_miembro_Adscrito',
    'style'=>"resize:none;width:240px;height:60px;",
    'maxlength' => '80',
    'class'=>'input-prepend',
    'value'=>  mb_convert_encoding($adscrito, 'UTF-8'));

$txt_upd_miembro_Direccion=array('name'=>'txt_upd_miembro_Direccion',
    'id'=>'txt_upd_miembro_Direccion',
    'style'=>"resize:none;width:240px;height:60px;",
    'maxlength' => '150',
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($direccion, 'UTF-8'));
$txt_upd_miembro_Contacto=array('name'=>'txt_upd_miembro_Contacto',
    'id'=>'txt_upd_miembro_Contacto',
    'style'=>"resize:none;width:240px;height:70px;",
    'class' => 'input-medium input-prepend tip',
    'maxlength' => '150',
    'required'=>'required',
    'value'=>  mb_convert_encoding($contacto, 'UTF-8'));
$txt_upd_miembro_Email=array('name'=>'txt_upd_miembro_Email',
    'id'=>'txt_upd_miembro_Email',
    'style'=>"resize:none;width:240px;",
    'class' => 'cajasemail email input-medium input-prepend tip',
    'maxlength' => '100',
    'value'=>  mb_convert_encoding($email, 'UTF-8'));
$txt_upd_miembro_Emailsec=array('name'=>'txt_upd_miembro_Emailsec',
    'id'=>'txt_upd_miembro_Emailsec',
    'style'=>"resize:none;width:240px;",
    'class' => 'cajasemail email input-medium input-prepend tip',
    'maxlength' => '100',
    'value'=>  mb_convert_encoding($emailsec, 'UTF-8'));
$hid_udp_id=  form_hidden("hid_udp_id",$nPeritoId,"hid_udp_id",true); 
$btn_upd_miembro = array('id'=>'btn_upd_miembro',
    'name'=>'btn_upd_miembro',
    'type'=>'submit',
    'value'=>'Actualizar Perito',
    'class'=>'btn btn-primary' 
        );      
 ?>
<fieldset>
    <center>
    <table>
        <tr>
            <td><?php echo form_label($Datos,'',$txt_upd_miembro_Datos)?></td>
        </tr> 
        <tr>
            <td> <?php echo form_label($cip,'',$txt_upd_miembro_Cip)?></td>
        </tr>
    </table>
    </center>
    <p> 
    <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Especialidad">Especialidad:</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_miembro_Especialidad)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Adscrito">Adscrito:</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_miembro_Adscrito)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Direccion">Direccion:</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_miembro_Direccion)?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Contacto">Contacto:</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_miembro_Contacto)?>
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Email">Email:</label>
        <div class="controls">
            <?php echo form_input($txt_upd_miembro_Email)?>
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="txt_upd_miembro_Emailsec">Email Sec.:</label>
        <div class="controls">
            <?php echo form_input($txt_upd_miembro_Emailsec)?>
        </div>
    </div>
    <br>
     <div class="controls">
            <?php echo $hid_udp_id?>
        </div>
    <div class="controls">
            <?php echo form_input($btn_upd_miembro)?>
        </div>
</fieldset>

<?php echo form_close();?>
<?php echo validation_errors();?>