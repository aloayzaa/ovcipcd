<script type="text/javascript" src='<?php echo URL_JS;?>peritaje/jspersonajins.js'></script>
<?php
$atributosForm = array('id' => 'frm_ins_empresas', 'name' => 'frm_ins_empresas', 'class' => 'form-horizontal');
echo form_open('peritaje/persona/personajuridicaIns', $atributosForm);


$txt_ins_emp_ruc = array('name' => 'txt_ins_emp_ruc', 'id' => 'txt_ins_emp_ruc', 'style' => 'width:250px', 'maxlength' => '11', 'type' => 'text', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'RUC', 'data-original-title' => 'Esriba su Ruc', 'data-placement' => 'right','required' => 'required');
$txt_ins_emp_razonsocial = array('name' => 'txt_ins_emp_razonsocial', 'id' => 'txt_ins_emp_razonsocial', 'style' => 'width:250px', 'maxlength' => '50', 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Razon Social', 'data-original-title' => 'Esriba su Razon Social', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_emp_telefono = array('name' => 'txt_ins_emp_telefono', 'id' => 'txt_ins_emp_telefono', 'maxlength' => '12', 'class' => 'cajasphone input-medium input-prepend tip', 'data-original-title' => 'Esriba su Telefono', 'data-placement' => 'right');
$txt_ins_emp_fax = array('name' => 'txt_ins_emp_fax', 'id' => 'txt_ins_emp_fax', 'maxlength' => '10','class' => 'cajasfax input-medium input-prepend tip', 'data-original-title' => 'Esriba su Fax', 'data-placement' => 'right');
$txt_ins_emp_email = array('name' => 'txt_ins_emp_email', 'id' => 'txt_ins_emp_email', 'style' => 'width:250px', 'maxlength' => '80', 'class' => 'cajasemail email input-medium input-prepend tip', 'placeholder' => 'Email', 'data-original-title' => 'Esriba su Email', 'data-placement' => 'right');
$txt_ins_emp_direccionfiscal = array('name' => 'txt_ins_emp_direccionfiscal', 'id' => 'txt_ins_emp_direccionfiscal', "cols" => "10", "rows" => "2", 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Direccion Fiscal', 'data-original-title' => 'Esriba su Direccion Fiscal', 'data-placement' => 'right', "style" => "resize:none;width:250px;", 'required' => 'required');
$txt_ins_emp_direccionterminal = array('name' => 'txt_ins_emp_direccionterminal', 'id' => 'txt_ins_emp_direccionterminal', "cols" => "10", "rows" => "2", 'class' => 'input-medium input-prepend tip', 'placeholder' => 'Direccion Terminal', 'data-original-title' => 'Esriba su Direccion Terminal', 'data-placement' => 'right', "style" => "resize:none;width:250px;");
$boton = array('name' => 'btn_ins_emp', 'id'=>'btn_ins_emp' ,'type' => 'submit', 'value' => 'Registrar Empresa',  'class'=>"btn btn-primary");

$nParId[''] = 'Seleccione una Opcion';
foreach ($Rubro as $Rubro) {
    $nParId[$Rubro->nParId] = $Rubro->cParDescripcion;
};
?>

<div style="width: 550px"> 
    <legend>Registrar Empresa Nueva</legend> 
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_ruc">RUC:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_emp_ruc); ?> <span id="preload"> </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cbo_ins_emp_rubro">Rubro:</label>
            <div class="controls">
                <?php echo form_dropdown('cbo_ins_emp_rubro', $nParId, '', 'id="cbo_ins_emp_rubro" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione una Rubro" data-placement="right"'); ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_razonsocial">Razon Social:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_emp_razonsocial); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_telefono">Telefono:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_emp_telefono); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_fax">Fax:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_emp_fax); ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_email">Email:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_emp_email); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_direccionfiscal">Direccion Fiscal:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_emp_direccionfiscal); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_emp_direccionterminal">Direccion Terminal:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_emp_direccionterminal); ?>
            </div>
        </div>
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
        </div> 
    </fieldset>
    <?php echo validation_errors();?>
    <?php echo form_close(); ?>
</div>