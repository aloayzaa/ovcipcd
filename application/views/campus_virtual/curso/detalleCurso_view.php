<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/curso/jsCursoDetalle.js'></script>
<?php
$frm_upd_curso = array('id' => 'frm_upd_curso',
    'name' => 'frm_upd_curso', 
    'class' => 'form-horizontal');

echo form_open('campus_virtual/curso/cursoUpd/'.$idCurso."/", $frm_upd_curso);


$txt_upd_cur_nombre = array('id' => 'txt_upd_cur_nombre',
    'name' => 'txt_upd_cur_nombre',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba un nombre',
    'readonly' => 'readonly',
    'value' => mb_convert_encoding($nombre, 'UTF-8'));

if($detalle!=""){
    $txt_upd_cur_fecha_inicio = array('id' => 'txt_upd_cur_fecha_inicio',
    'name' => 'txt_upd_cur_fecha_inicio',
    'style' => 'resize:none;width:250px;',
    'class' => 'cajascalendar',
    'required' => 'required',
    'data-original-title' => 'Fecha inicio',
    'value' => mb_convert_encoding($detalle->cFechaInicio, 'UTF-8'));
    
    $txt_upd_cur_fecha_fin = array('id' => 'txt_upd_cur_fecha_fin',
    'name' => 'txt_upd_cur_fecha_fin',
    'style' => 'resize:none;width:250px;',
    'class' => 'cajascalendar',
    'required' => 'required',
    'data-original-title' => 'Fecha Fin',
    'value' => mb_convert_encoding($detalle->cFechaFin, 'UTF-8'));
            
        
$txt_upd_cur_horas = array('id' => 'txt_upd_cur_horas',
    'name' => 'txt_upd_cur_horas',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Horas Academicas',
    'value' => mb_convert_encoding($detalle->cHoras, 'UTF-8'));
}
else {
      $txt_upd_cur_fecha_inicio = array('id' => 'txt_upd_cur_fecha_inicio',
    'name' => 'txt_upd_cur_fecha_inicio',
    'style' => 'resize:none;width:250px;',
    'class' => 'cajascalendar',
    'required' => 'required',
    'data-original-title' => 'Fecha inicio');
      
    $txt_upd_cur_fecha_fin = array('id' => 'txt_upd_cur_fecha_fin',
    'name' => 'txt_upd_cur_fecha_fin',
    'style' => 'resize:none;width:250px;',
    'class' => 'cajascalendar',
    'required' => 'required',
    'data-original-title' => 'Fecha inicio');

$txt_upd_cur_horas = array('id' => 'txt_upd_cur_horas',
    'name' => 'txt_upd_cur_horas',
    'style' => 'resize:none;width:150px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Horas Academicas');  
}

$btn_upd_curso = form_submit('btn_upd_curso', 'Actualizar Curso', 'id="btn_upd_curso" class="btn btn-primary"');

$hid_upd_cur_idCurso = form_hidden("hid_upd_cur_idCurso", $idCurso, "hid_upd_cur_idCurso", true);
?>
<fieldset>
    <legend>Datos Curso</legend>
    <div class="control-group">
        <label id="label" class="control-label">Tipo: </label>
        <div class = "controls">
            <?php echo $tipo ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Nombre: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_nombre) ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Fecha Inicio: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_fecha_inicio) ?>
        </div>
    </div>
    <div class="control-group">
        <label id="label" class="control-label">Fecha Fin: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_fecha_fin) ?>
        </div>
    </div>
     <div class="control-group">
        <label id="label" class="control-label">Horas Academicas: </label>
        <div class = "controls">
            <?php echo form_input($txt_upd_cur_horas) ?>
        </div>
    </div>
  <?php if(count($docentes)>0){?>
    <div class="control-group">
        <label id="label" class="control-label">Docente: </label>
        <div class = "controls">
           
             <select class="chzn-select" name="cbo_hor_docente" id="cbo_hor_docente" required="true">
                  <option value="">Seleccione un Docente</option>
                   <?php foreach ($docentes as $docente) {
                        if($docente->nPerId==$detalle->nPerId){ ?>
                              <option value="<?php echo $docente->nPerId ?>" selected><?php echo $docente->Docente ?></option>   
                  <?php }else{ ?>
                               <option value="<?php echo $docente->nPerId ?>"><?php echo $docente->Docente?></option>   
                  <?php } ?>
                   <?php }?>
            </select>
        </div>
    </div>
          <?php } ?>
   
    <div class = "controls">
        <?php
                echo $btn_upd_curso;
        ?>
    </div>
    <br>
    <br>
<?php echo form_close(); ?>  
    
     
   <div class = "controls">
       <input type="hidden" name="hid_upd_cur_idCurso" id="hid_upd_cur_idCurso" value="<?php echo $idCurso?>"> 
   </div>   
        
</fieldset>


<?php echo validation_errors(); ?>