<script type="text/javascript" src='<?php echo URL_JS;?>peritaje/jsPersonaJuridicaUpd.js'></script>  


<?php $frm_upd_persona_juridica= array('id'=>'frm_upd_persona_juridica',
    'name'=>'frm_upd_persona_juridica',
    'class'=>'form-horizontal');                
echo form_open('peritaje/persona/personajuridicaUpd/'.$nPerId."/",$frm_upd_persona_juridica);
   
$txt_upd_emp_Ruc=array('name'=>'txt_upd_emp_Ruc',
    'id'=>'txt_upd_emp_Ruc',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'readonly'=>"true",
    'value'=>  mb_convert_encoding($Ruc, 'UTF-8'));        
$txt_upd_emp_razonsocial=array('name'=>'txt_upd_emp_razonsocial',
    'id'=>'txt_upd_emp_razonsocial',
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cPerNombres, 'UTF-8')); 
$txt_upd_emp_telefono=array('name'=>'txt_upd_emp_telefono',
    'id'=>'txt_upd_emp_telefono',
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($Tel, 'UTF-8'));
$txt_upd_emp_fax=array('name'=>'txt_upd_emp_fax',
    'id'=>'txt_upd_emp_fax',
    'class'=>'input-prepend',
    'minlength'=>'10',
    'maxlength'=>'10',
    'value'=>  mb_convert_encoding($Fax, 'UTF-8'));
$txt_upd_emp_email=array('name'=>'txt_upd_emp_email',
    'id'=>'txt_upd_emp_email',
    'style'=>"resize:none;width:210px;",
    'class' => 'cajasemail email input-medium input-prepend tip',
    'required'=>'required',
    'value'=>  mb_convert_encoding($Email, 'UTF-8'));
$txt_upd_emp_direccionfiscal=array('name'=>'txt_upd_emp_direccionfiscal',
    'id'=>'txt_upd_emp_direccionfiscal',
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($DirF, 'UTF-8'));
$txt_upd_emp_direccionterminal=array('name'=>'txt_upd_emp_direccionterminal',
    'id'=>'$txt_upd_emp_direccionterminal',
    'class'=>'input-prepend',
    'value'=>  mb_convert_encoding($DirT, 'UTF-8'));


$hid_udp_id_personajuridica=  form_hidden("hid_udp_id_personajuridica",$nPerId,"hid_udp_id_personajuridica",true); 
$btn_upd_per_juridica = array('id'=>'btn_upd_per_juridica',
    'name'=>'btn_upd_per_juridica',
    'type'=>'submit',
    'value'=>'Actualizar Persona Juridica',
    'class'=>'btn btn-primary' 
        );   

 ?>
<fieldset>
    <table>    
    <div class="control-group">
        <label class="control-label" for="txt_upd_emp_Ruc">Ruc</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_Ruc)?>
           </div> 
    </div>
        
    <div class="control-group">
        <label class="control-label">Rubro</label>
        &nbsp&nbsp&nbsp&nbsp&nbsp<select id="RubroUpd" name="RubroUpd" class="span3">
            <?php
            foreach ($RubroUpd as $RubroUpd){
                if($RubroUpd->nParId == $Rubro){
                    ?>
            <option selected value="<?php echo $RubroUpd->nParId ?>"><?php echo $RubroUpd->cParDescripcion ?></option>
            <?php } else {?>
            
            <option value ="<?php echo $RubroUpd->nParId ?>"><?php echo $RubroUpd->cParDescripcion?></option>
            <?php    
            }
            }
            ?>
        </select>
        </div>
  
   <div class="control-group">
        <label class="control-label" for="txt_upd_emp_razonsocial">Razon Social</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_razonsocial)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_emp_telefono">Telefono</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_telefono)?>
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="txt_upd_emp_fax">Fax</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_fax)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_emp_email">Email</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_email)?>
        </div>
    </div>
           
   <div class="control-group">
        <label class="control-label" for="txt_upd_emp_direccionfiscal">Direccion Fiscal</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_direccionfiscal)?>
        
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_emp_direccionterminal">Direccion Terminal</label>
        <div class="controls">
            <?php echo form_input($txt_upd_emp_direccionterminal)?>
        </div>
    </div>
    </table>
    <br>
     <div class="controls">
            <?php echo $hid_udp_id_personajuridica?>
        </div>
    <div class="controls">
            <?php echo form_input($btn_upd_per_juridica)?>
        </div>
</fieldset>

<?php echo form_close();?>
<?php echo validation_errors();?>