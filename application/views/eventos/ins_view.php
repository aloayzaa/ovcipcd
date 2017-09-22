
<?php
$atributosForm = array('id' => 'frm_ins_eventos',
    'name' => 'frm_ins_eventos', 
    'class' => 'form-horizontal');
echo form_open('eventos/eventos/eventosIns', $atributosForm);

$txt_ins_eve_titulo = array(
    'name' => 'txt_ins_eve_titulo', 
    'id' => 'txt_ins_eve_titulo', 
    "style" =>"resize:none;width:300px;", 
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Esriba su Titulo', 
    'data-placement' => 'right', 
    'required' => 'required'); 

$txt_ins_eve_descripcion = array(
    'name' => 'txt_ins_eve_descripcion',
    'id' => 'txt_ins_eve_descripcion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 301px;",
    'required' => 'required');


$txt_ins_eve_fecha = array(
    'name' => 'txt_ins_eve_fecha', 
    'id' => 'txt_ins_eve_fecha', 
    'class' => 'cajascalendar',
    'required' => 'required');

$txt_ins_eve_fecha_inicio = array(
    'name' => 'txt_ins_eve_fecha_inicio', 
    'id' => 'txt_ins_eve_fecha_inicio', 
    'class' => 'cajascalendar',
    'required' => 'required');

$txt_ins_eve_cuenta_ingreso = array(
    'name' => 'txt_ins_eve_cuenta_ingreso', 
    'id' => 'txt_ins_eve_cuenta_ingreso', 
    'maxlength' => '500' ,
    "style" => "resize:none;width:120px;", 
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Esriba su Cuenta', 
    'data-placement' => 'right',
    'required' => 'required');

$txt_ins_eve_horas = array(
    'name' => 'txt_ins_eve_horas', 
    'id' => 'txt_ins_eve_horas', 
    'maxlength' => '50' ,
    "style" => "resize:none;width:120px;", 
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Esriba las horas del evento', 
    'data-placement' => 'right',
    'required' => 'required');


$boton = array('name' => 'btn_ins_notempre',
    'type' => 'submit', 
    'value' => 'Registrar Evento', 
    'id="btn_ins_notempre" class="btn btn-primary"');

$nTNotDescripcion['']='Seleccione una Opcion';
$nTNotDescripcion['0']='Evento Externo';
$nTNotDescripcion['100']='Evento CIP';
$nTNotDescripcion['101']='Certificados CIP';
$nTNotDescripcion['102']='Comisión IEPI';
$nTNotDescripcion['103']='Comisión de Seguridad y Salud Ocupacional';
$nTNotDescripcion['104']='Comisión de Supervisores Municipales';
$nTNotDescripcion['105']='Certificados CIP(1-Firma)';
foreach ($TEventos as $evento){
   $nTNotDescripcion[$evento->codcap]=$evento->desccap;
}

?>

<div style="width: 500px"> 
    <legend>Registrar Nuevo Evento CIP-CDLL</legend> 
    <fieldset>
        
         <div class="control-group">
            <label class="control-label" for="txt_ins_eve_titulo">Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_eve_titulo); ?>
            </div>
        </div>
        
         <div class="control-group">
            <label class="control-label" for="txt_ins_eve_descripcion">Descripcion:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_eve_descripcion); ?>
            </div>
        </div>       
        <div class="control-group">
            
            <label class="control-label" for="tipo_evento">Tipo de evento:</label>
            <div class="controls">
                <?php echo form_dropdown('cbo_tevento',$nTNotDescripcion,''
                        ,'id="cbo_tnoticia" class="input-medium tip" 
                            style="width:260px;" required="required" 
                            data-original-title="Selecciona una opcion" data-placement="right"')
                    ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_eve_fecha_inicio">Fecha de Inicio:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_eve_fecha_inicio); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="txt_ins_eve_fecha">Fecha de Termino:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_eve_fecha); ?>
            </div>
        </div>
        
    
        <div class="control-group">
            <label class="control-label" for="txt_ins_eve_cuenta_ingreso">Cuenta Ingreso:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_eve_cuenta_ingreso); ?>
  
                     <input type="checkbox" id="check_cuenta" />
          
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_ins_eve_cuenta_ingreso">Horas:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_eve_horas); ?>
  
                     <input type="checkbox" id="check_horas" />
          
            </div>
        </div>
       
        <div  class="control-group">
            
            
            <div id="resultado_cuenta" class="controls">
            </div>      
        </div>       
            
            
        
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
            <div class="controls" id="proceso"></div>
            
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>