
<?php
$atributosForm = array('id' => 'frm_ins_noticiasinfociptrabajo', 'name' => 'frm_ins_noticiasinfociptrabajo', 'class' => 'form-horizontal');
echo form_open('portal_infocip/noticias_infocip/NoticiasInfocipIns', $atributosForm);

$txt_ins_noticiasinfocip_fecha = array('name' => 'txt_ins_noticiasinfocip_fecha', 'id' => 'txt_ins_noticiasinfocip_fecha', 'class' => 'cajascalendar', 'required' => 'required');
$txt_ins_noticiasinfocip_titulo = array('name' => 'txt_ins_noticiasinfocip_titulo', 'id' => 'txt_ins_noticiasinfocip_titulo', 'maxlength' => '500', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Titulo', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_noticiasinfocip_sumilla = array('name' => 'txt_ins_noticiasinfocip_sumilla', 'id' => 'txt_ins_noticiasinfocip_sumilla', 'maxlength' => '500', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Sumilla', 'data-placement' => 'right', 'required' => 'required');
$txt_ins_noticiasinfocip_contenido = array('name' => 'txt_ins_noticiasinfocip_contenido', 'id' => 'txt_ins_noticiasinfocip_contenido', "cols" => "95", "rows" => "10", 'required' => 'required');
$boton = array('name' => 'btn_ins_noticiasinfocip', 'type' => 'submit', 'value' => 'Registrar Noticia', 'id="btn_ins_noticiasinfocip" class="btn btn-primary"');

 $nTNotDescripcion[''] = 'Seleccione una Opcion';
     foreach ($Curso as $Curso) {
    $nTNotDescripcion[$Curso->nTNotCodigo]= $Curso->nTNotDescripcion;}
?>

<div style="width: 700px"> 
    <legend>Registrar Nueva Noticia INFOCIP</legend> 
    <fieldset>
        
     <div class="control-group">   
    <label class="control-label" for="Nombre">Tipo de noticia:</label>
        <div class = "controls">
      <?php echo form_dropdown('cboCurso',$nTNotDescripcion,'','id="cboCurso" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione los cursos" data-placement="right"') ?>
        </div>
    </div>  
        
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_noticiasinfocip_fecha">
                Fecha Final:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_noticiasinfocip_fecha); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_noticiasinfocip_titulo">
                Titulo:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_noticiasinfocip_titulo); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"
                   for="txt_ins_noticiasinfocip_sumilla">
                Sumilla:</label>
            <div class="controls">
                <?php echo form_input($txt_ins_noticiasinfocip_sumilla); ?>
            </div>
        </div>
        <div id="div_ins" class="control-group">
            <label class="control-label"
                   for="txt_ins_noticiasinfocip_contenido"
                   >Contenido:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_noticiasinfocip_contenido); ?>
            </div>
        </div>
        
             <div id="div_ins2" class="control-group">
            <label class="control-label"
                   for="txt_ins_noticiasinfocip_contenido"
                   >Link:</label>
            <div class="controls">
                <?php echo form_textarea($txt_ins_noticiasinfocip_contenido); ?>
            </div>
        </div>
        
        <div class="control-group"> 
            <div class="controls">
                <?php echo form_input($boton); ?>
            </div>
        </div> 
    </fieldset>
    <?php echo form_close(); ?>
</div>