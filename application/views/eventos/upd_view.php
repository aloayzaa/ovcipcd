<script type="text/javascript" src='<?php echo URL_JS;?>eventos/jsEventosUpd.js'></script>  


<?php $frm_upd_eventos= array('id'=>'frm_upd_eventos',
    'name'=>'frm_upd_noticias',
    'class'=>'form-horizontal');                
echo form_open('noticias/noticias/noticiasUpd/'.$nEveId."/",$frm_upd_eventos);
   
$txt_upd_eve_titulo=array('name'=>'txt_upd_eve_titulo',
    'id'=>'txt_upd_eve_titulo',
    'style'=>"resize:none;width:200px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cEveTitulo, 'UTF-8'));    

$txt_upd_eve_descripcion=array('name'=>'txt_upd_eve_descripcion',
    'id'=>'txt_upd_not_contenido',
    'class'=>'input-prepend',
    'required'=>'required',
    'cols' => "180", 
    'rows' => "5", 
    'value'=>  mb_convert_encoding($cEveDescripcion, 'UTF-8'));

$txt_upd_eve_fecha=array('name'=>'txt_upd_eve_fecha',
    'id'=>'txt_upd_eve_fecha',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cFechaEven, 'UTF-8'));

$txt_upd_eve_fecha_inicio=array('name'=>'txt_upd_eve_fecha_inicio',
    'id'=>'txt_upd_eve_fecha_inicio',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cFechaEvenInicio, 'UTF-8'));

if($cEveCuentaIngreso!=NULL){
    $txt_upd_eve_cuenta=array('name'=>'txt_upd_eve_cuenta',
    'id'=>'txt_upd_eve_cuenta',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cEveCuentaIngreso, 'UTF-8'));
}
else {
    $txt_upd_eve_cuenta=array('name'=>'txt_upd_eve_cuenta',
    'id'=>'txt_upd_eve_cuenta',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'readonly'=>'true',    
    'value'=>  mb_convert_encoding('Sin Cuenta', 'UTF-8'));
}
if($horas!=0){
     $txt_upd_eve_horas=array('name'=>'txt_upd_eve_horas',
    'id'=>'txt_upd_eve_horas',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding($horas, 'UTF-8'));    
}
else {
     $txt_upd_eve_horas=array('name'=>'txt_upd_eve_horas',
    'id'=>'txt_upd_eve_horas',
    'style'=>"resize:none;width:100px;",
    'class'=>'input-prepend',
    'required'=>'required',
    'value'=>  mb_convert_encoding('Sin Hora', 'UTF-8'));  
}

$hid_udp_nEveId=  form_hidden("hid_udp_nEveId",$nEveId,"hid_udp_nEveId",true); 
$btn_upd_eve = array('id'=>'btn_upd_eve',
    'name'=>'btn_upd_eve',
    'type'=>'submit',
    'value'=>'Actualizar Evento',
    'class'=>'btn btn-primary' 
        ); 

$nTipoEve['']='Seleccione una Opcion';
if($nEveTipoEvento!=0){
    foreach ($tipoevento as $tipoevento){
        if($nEveTipoEvento==$tipoevento->codcap){
            $nTNotDescripcionSelect=$tipoevento->codcap;
        }
        $nTipoEve[$tipoevento->codcap]=$tipoevento->desccap;
    }
}
?>
<fieldset>
    <legend>Datos de Registro</legend>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_eve_titulo">Titulo</label>
        <div class="controls">
            <?php echo form_input($txt_upd_eve_titulo)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_not_contenido">Contenido</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_eve_descripcion)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tipo_eventos">Tipo de Evento</label>
        <div class="controls">
            <?php if($nEveTipoEvento!=0){
                if($nEveTipoEvento==100){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='100'>Evento CIP</option>";
                      echo "</select>";
                }else   if($nEveTipoEvento==101){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='101'>Certificado CIP</option>";
                      echo "</select>";}
else   if($nEveTipoEvento==102){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='102'>Constancia CIP</option>";
                      echo "</select>";}
                      else   if($nEveTipoEvento==103){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='103'>Constancia CIP</option>";
                      echo "</select>";}
                      else   if($nEveTipoEvento==104){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='104'>Constancia CIP</option>";
                      echo "</select>";}
                      else   if($nEveTipoEvento==105){
                      echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='105'>Certificado CIP</option>";
                      echo "</select>";}
                      else{
                echo form_dropdown('cbo_tevento',$nTipoEve,$nTNotDescripcionSelect
                    ,'id="cbo_tnoticia" class="input-medium tip" 
                        style="width:200px;" required="required" 
            data-original-title="Selecciona una opcion" data-placement="right"');}
            }
              else {
                     echo "<select id='cbo_tevento' name='cbo_tevento' style='width:200px;'>";
                      echo"<option value='0'>Evento Externo</option>";
                      echo "</select>";
              }
                ?>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="txt_upd_eve_fecha">Fecha Inicio: </label>
        <div class="controls">
            <?php echo form_input($txt_upd_eve_fecha_inicio)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_eve_fecha">Fecha Fin: </label>
        <div class="controls">
            <?php echo form_input($txt_upd_eve_fecha)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_eve_cuenta">Cuenta Ingreso: </label>
        <div class="controls">
            <?php echo form_input($txt_upd_eve_cuenta)?>
              <input type="checkbox" id="check_upd_cuenta" />
        </div>
    </div>
     
    <div class="control-group">
        <label class="control-label" for="txt_upd_eve_horas">Horas: </label>
        <div class="controls">
            <?php echo form_input($txt_upd_eve_horas)?>
            <input type="checkbox" id="check_upd_horas" />
        </div>
    </div>
    <div  class="control-group">
            <div id="resultado" class="controls">
            </div>      
    </div>

    <br>
        <div class="controls">
            <?php echo $hid_udp_nEveId?>
        </div>
        <div class="controls">
            <?php echo form_input($btn_upd_eve)?> 
        </div>
        <div class="controls" id="proceso_actualizar"></div>
</fieldset>

<?php echo form_close();?>
<?php echo validation_errors();?>