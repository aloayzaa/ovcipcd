<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/curso/jsCursoIns.js'></script>
<?php 
    $atributosForm = array('id' => 'frm_ins_valorizacion', 'name' => 'frm_ins_valorizacion', 'class' => 'form-horizontal');
    echo form_open('portal_infocip/valorizacion/valorizacionIns', $atributosForm);
    $txt_ins_frm_c_ValDesripcionCurso = array('name' => 'txt_ins_frm_c_ValDesripcionCurso', 'id' => 'txt_ins_frm_c_ValDesripcionCurs', 'maxlength' => '500', "style" => "resize:none;width:250px;", 'class' => 'input-medium input-prepend tip', 'required' => 'required', 'data-original-title' => 'Escriba una breve descripcion', 'data-placement' => 'right');
    $txt_ins_frm_c_ValFechaCaducidad = array('name' => 'txt_ins_frm_c_ValFechaCaducidad', 'id' => 'txt_ins_frm_c_ValFechaCaducidad', 'class' => 'cajascalendar', 'required' => 'required', 'data-original-title' => 'Escriba su Fecha de caducidad', 'data-placement' => 'right');
    $boton = array('name' => 'btn_ins_val', 'type' => 'submit', 'value' => 'Publicar', 'id' => 'btn_ins_val','class' => 'btn btn-primary');
    $cCurNombre[''] = 'Seleccione una Opcion';
     foreach ($Curso as $Curso) {
    $cCurNombre[$Curso->cCurNombre]= $Curso->cCurNombre;}
    ?>

<fieldset>
    <legend>Valorizacion de cursos</legend>
         <div class="control-group">   
    <label class="control-label" for="Nombre">Seleccione el curso:</label>
        <div class = "controls">
            <?php echo form_dropdown('cboCurso',$cCurNombre,'','id="cboCurso" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione los cursos" data-placement="right"') ?>
            <input type="button" value="Registrar Curso" name="btn_nuevocurso" id="btn_nuevocurso" class="btn btn-primary"/>
                    
        </div>
    </div>   
    <div class="control-group">                 
    <label class="control-label" for="txt_ins_frm_c_ValDesripcionCurso">Escriba una breve descripcion:</label>
        <div class = "controls">
            <?php echo form_textarea($txt_ins_frm_c_ValDesripcionCurso) ;?>
        </div>
    </div>
      <div class="control-group">    
       <label class="control-label" for="txt_ins_frm_c_ValFechaCaducidad">Elija una fecha de caducidad:</label>
        <div class = "controls">
            <?php echo form_input($txt_ins_frm_c_ValFechaCaducidad) ?>
        </div>
    </div>   
</fieldset>
<div class = "controls">
    <?php echo form_input($boton) ?>
</div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>