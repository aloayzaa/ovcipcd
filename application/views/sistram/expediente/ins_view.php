<?php echo form_open('', array('id' => 'frm_ins_expediente', 'name' => 'frm_ins_expediente', 'class' => 'form-horizontal')) ?>
<legend style="text-align: right;border-bottom: none;padding-bottom: 0;margin-bottom: 0;font-size: 14px;color: brown"><b>Srta Alexia Rocha.</b> Usted est&aacute; trabajado en: <b style="color:green;">Oficina Virtual</b></legend>
<legend>Datos del solicitante</legend>
<fieldset>    
    <div class="control-group">  
        <label class="control-label" for="cbo_ins_tipodoc">Tipo documento</label>
        <div class="controls">
            <div id="c_cbo_ins_tipodoc"></div>
        </div>                                
    </div>
    <div class="control-group">  
        <label class="control-label" for="txt_ins_exp_nrodocumento">N&uacute;mero documento</label>
        <div class="controls">           
        </div> 
        <div class="controls">            
            <?php echo form_input(array('name' => 'txt_ins_exp_nrodocumento', 'id' => 'txt_ins_exp_nrodocumento', 'type' => 'text', 'required' => 'required', 'class' => 'input-default cajassearch', 'style' => 'float:left', 'maxlength' => '50')); ?>
            <div id="c_fnd_gif_perXdoc" class="div-inline"></div>
        </div>
    </div> 
       <div class="control-group" id="c_txt_ins_cargo_user">  
        <label class="control-label" for="txt_ins_cargo_user">Selecciones Cargo</label>
        <div class="controls">           
        </div> 
        <div class="controls">            
              <select  name="cbo_usr_admin" id="cbo_usr_admin" class="chzn-select" >
                                        <option value="0" selected>Seleccione Area</option>

                                        <?php foreach($usuarios as $usuario){?>
                                        <option value="<?php echo $usuario->nUsuId ;?>"><?php echo $usuario->cDescripcionCargo; ?></option>
                                        <?php  } ?>
                                    </select> 
        </div>
    </div> 
    <div class="control-group">  
        <label class="control-label" for="txt_ins_exp_nombres">Nombres o Raz. Social</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_nombres', 'id' => 'txt_ins_exp_nombres', 'type' => 'text', 'required' => 'required', 'class' => 'span9 input-medium', 'maxlength' => '500')); ?>
        </div>                                
    </div>
    <div class="control-group" id="c_txt_ins_exp_apePat">  
        <label class="control-label" for="txt_ins_exp_apePat">Apellido Paterno</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_apePat', 'id' => 'txt_ins_exp_apePat', 'type' => 'text', 'required' => 'required', 'class' => 'span6 input-default', 'maxlength' => '50')); ?>
        </div>                                
    </div>
    <div class="control-group" id="c_txt_ins_exp_apeMat">  
        <label class="control-label" for="txt_ins_exp_apeMat">Apellido Materno</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_apeMat', 'id' => 'txt_ins_exp_apeMat', 'type' => 'text', 'required' => 'required', 'class' => 'span6 input-default', 'maxlength' => '50')); ?>
        </div>                                
    </div>
    <div class="control-group" id="c_txt_ins_exp_email">  
        <label class="control-label" for="txt_ins_exp_email">Email</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_email', 'id' => 'txt_ins_exp_email', 'type' => 'text', 'class' => 'span6 input-medium', 'maxlength' => '50')); ?>
        </div>                                
    </div>
    <div class="control-group" id="c_txt_ins_exp_telefono">  
        <label class="control-label" for="txt_ins_exp_telefono">Tel&eacute;fono celular</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_telefono', 'id' => 'txt_ins_exp_telefono', 'type' => 'text', 'class' => 'input-small', 'maxlength' => '10')); ?>
        </div>                                
    </div>
</fieldset>
<legend>Trámites y sus requisitos</legend>
<fieldset>
    <div class="control-group">  
        <label class="control-label" for="txt_ins_exp_procedimiento">Trámite</label>
        <div class="controls">
            <div id="c_cbo_ins_exp_tramite"></div>           
        </div>
<script type="text/javascript">
function ShowSelected()
{
/* Para obtener el texto */
var combo = document.getElementById("c_cbo_ins_exp_tramitev");
var selected = combo.options[combo.selectedIndex].text;
  $("#hid_ins_exp_sumilla").val(selected);   
}
</script>
<input id="hid_ins_exp_sumilla" name="hid_ins_exp_sumilla" value="" type="hidden"/>
        <?php //echo form_hidden('hid_ins_exp_nAreId', '', 'hid_ins_exp_nAreId'); ?>
    </div> 
   <!-- <div class="control-group" id="c_c_cbo_ins_exp_modalidad" style="display: none">  
        <label class="control-label" for="txt_ins_exp_modalidad">Modalidad</label>
        <div class="controls">
            <div id="c_cbo_ins_exp_modalidad"></div>           
        </div>  
        <?php //echo form_hidden('hid_ins_exp_nModId', '', 'hid_ins_exp_nModId'); ?>
    </div>-->

    <div id="c_qry_req" style="width: 100%"></div> <!-- query de requisitos -->
</fieldset>
<br/>
<legend>Observaciones y folios</legend>
<fieldset>
    <div class="control-group">  
        <label class="control-label" for="txt_ins_exp_observaciones">Asunto(Opcional)</label>
        <div class="controls">                                        
            <textarea rows="6" class="span9 input-square" id="txt_ins_exp_observaciones" name="txt_ins_exp_observaciones" required="true" style="width: 100%"></textarea>
        </div>                                
    </div>
    <div class="control-group">  
        <label class="control-label" for="txt_ins_exp_folio">Folio</label>
        <div class="controls">
            <?php echo form_input(array('name' => 'txt_ins_exp_folio', 'id' => 'txt_ins_exp_folio', 'type' => 'text', 'required' => 'required', 'class' => 'input-medium', 'maxlength' => '3','style'=>'width:80px;')); ?>
        </div>                                
    </div>  
    <br>
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_button(array('name' => 'btn_ins_expediente', 'id' => 'btn_ins_expediente', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Registrar expediente')); ?>
                <span id="c_btn_ins_expediente_load"></span>
            </div>
        </div> 
        <br><br><br>
</fieldset>

<?php echo form_close(); ?>