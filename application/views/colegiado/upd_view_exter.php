<script type="text/javascript" src='<?php echo URL_JS;?>colegiado/jsColegiado_PerUpd.js'></script>  

    <?php
$atributosForm = array('id' => 'frm_upd_persona_juridica',
    'name' => 'frm_upd_persona_juridica', 
    'class' => 'form-horizontal');
echo form_open('colegiado/persona_juridica_Upd', $atributosForm);


$txt_upd_per_razon_social = array(
    'name' => 'txt_upd_per_razon_social',
    'id' => 'txt_upd_per_razon_social',
    "cols" => "207", 
    "rows" => "1", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($razon_social, "UTF-8"));
$txt_upd_per_ruc = array(
    'name' => 'txt_upd_per_ruc',
    'id' => 'txt_upd_per_ruc',
    'maxlength' => '11',
    "cols" => "200", 
    "rows" => "1", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($ruc, "UTF-8"));
$txt_upd_per_email = array(
    'name' => 'txt_upd_per_email',
    'id' => 'txt_upd_per_email',
    "cols" => "200", 
    "rows" => "1", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($correo_empresa, "UTF-8"));
$txt_upd_per_celular = array(
    'name' => 'txt_upd_per_celular',
    'id' => 'txt_upd_per_celular',
    'maxlength' => '10',
    "cols" => "200", 
    "rows" => "1", 
    "style"=> "width: 301px;",
    'required' => 'required',
    "style" => "resize:none;width:120px;", 'class' => 'cajascell',
    'value'=>mb_convert_encoding($celular_empresa, "UTF-8"));
$txt_upd_per_direcc = array(
    'name' => 'txt_upd_per_direcc',
    'id' => 'txt_upd_per_direcc',
    "cols" => "207", 
    "rows" => "1", 
    "style"=> "width: 301px;",
    'required' => 'required',
    'value'=>mb_convert_encoding($direccion, "UTF-8"));

$boton = array('name' => 'btn_upd_notempre',
    'type' => 'submit', 
    'value' => 'Actualizar Persona', 
    'id="btn_upd_notempre" class="btn btn-primary"');

?>
<div>
<div style="width: 500px"> 
    <legend><strong>Persona Juridica</strong></legend> 
    <fieldset>
                      
         <div class="control-group">
             <label class="control-label" for="txt_upd_per_razon_social"><strong>Razon Social:</strong></label>
            <div class="controls">
                <?php echo form_input($txt_upd_per_razon_social); ?>
            </div>
        </div>   
        <div class="control-group">
            <label class="control-label" for="txt_upd_per_ruc"><strong>RUC:</strong></label>
            <div class="controls">
                <?php echo form_input($txt_upd_per_ruc); ?>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label" for="txt_upd_per_direcc"><strong>Direccion:</strong></label>
            <div class="controls">
                <?php echo form_input($txt_upd_per_direcc); ?>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label" for="txt_upd_per_email"><strong>Correo Contacto:</strong></label>
            <div class="controls">
                <?php echo form_input($txt_upd_per_email); ?>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label" for="txt_upd_per_celular"><strong>Celular Contacto:</strong></label>
            <div class="controls">
                <?php echo form_input($txt_upd_per_celular); ?>
            </div>
        </div> 
        <input type="hidden" name="txt_upd_per_id" value="<?php echo $codigo;?>"
        <div class="control-group">
        <label class="control-label" for="tipo_eventos"><strong>Tipo de Rubro:</strong></label>
        <div class="controls">
            <select id="RubroUpd" name="RubroUpd" class="span3" >
                        <?php
                        foreach ($RubroUpd as $RubroUpd) {

                            if ($RubroUpd["nParId"] == $nParIdRubro) {
                                ?>
                                <option selected value="<?php echo $RubroUpd["nParId"] ?>"><?php echo $RubroUpd["cParDescripcion"] ?></option>
                            <?php } else { ?>

                                <option value="<?php echo $RubroUpd["nParId"] ?>"><?php echo $RubroUpd["cParDescripcion"] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
        </div>
        <br>
        <br>
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="procesoupd"></div>
            
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
  </div>   
</div>               