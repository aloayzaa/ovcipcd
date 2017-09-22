<script type="text/javascript" src='<?php echo URL_JS;?>peritos/jsSolicitudUpd.js'></script>
<?php $frm_upd_solicitud= array('id'=>'frm_upd_solicitud',
    'name'=>'frm_upd_solicitud',
    'class'=>'form-horizontal');                
echo form_open('peritos/peritos/solicitudUpd/'.$nSolId."/",$frm_upd_solicitud);
 
$numero_solicitud=array('name'=>'numero_solicitud',
    'id'=>'numero_solicitud',
    'style'=>"font-weight:bold; font-size:20px;");
$txt_upd_sol_Asunto=array('name'=>'txt_upd_sol_Asunto',
    'id'=>'txt_upd_sol_Asunto',
    'style'=>"width:300px;height:75px;",
    'class'=>'input-prepend',
    'maxlength' => '150',
    'required'=>'required',
    'value'=>  mb_convert_encoding($nSolAsunto, 'UTF-8'));

$txt_upd_sol_FechaEmision=array('name'=>'txt_upd_sol_FechaEmision',
    'id'=>'txt_upd_sol_FechaEmision',
    'style'=>"width:150px",
    'class'=>'cajascalendar',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cSolFechaSolicitud, 'UTF-8')); 

$txt_upd_sol_Descripcion=array('name'=>'txt_upd_sol_Descripcion',
    'id'=>'txt_upd_sol_Descripcion',
    'style'=>"width:300px;height:130px",
    'class'=>'input-prepend',
    'maxlength' => '500',
    'required'=>'required',
    'value'=>  mb_convert_encoding($nSolDescripcionPert, 'UTF-8'));

$txt_upd_sol_Direccion=array('name'=>'txt_upd_sol_Direccion',
    'id'=>'txt_upd_sol_Direccion',
    'style'=>"width:300px;height:130px",
    'class'=>'input-prepend',
    'maxlength' => '200',
    'required'=>'required',
    'value'=>  mb_convert_encoding($nSolDireccionPert, 'UTF-8'));

$txt_upd_sol_FechaRespuesta=array('name'=>'txt_upd_sol_FechaRespuesta',
    'id'=>'txt_upd_sol_FechaRespuesta',
    'style'=>"width:150px;",
    'class'=>'cajascalendar',
    'required'=>'required',
    'value'=>  mb_convert_encoding($cSolFechaRespuesta, 'UTF-8'));

$hid_udp_id=  form_hidden("hid_udp_id",$nSolId,"hid_udp_id",true); 
$btn_upd_sol = array('id'=>'btn_upd_sol',
    'name'=>'btn_upd_sol',
    'type'=>'submit',
    'value'=>'Actualizar Solicitud',
    'class'=>'btn btn-primary' 
        );      
 ?>
<fieldset>
    <center>
    <table>
        <tr>
            <td><h3>SOLICITUD N° </h3></td>
            
        </tr> 
        <tr>
            <td><center><?php echo form_label($nSolId,'',$numero_solicitud)?></center></td>
        </tr>
    </table>
    </center>
    <p>
    <div class="control-group">
        <label class="control-label" for="txt_upd_sol_Asunto">Asunto</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_sol_Asunto)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_sol_FechaEmision">Fecha de Solicitud</label>
        <div class="controls">
            <?php echo form_input($txt_upd_sol_FechaEmision)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_sol_Descripcion">Descripcion de Solicitud</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_sol_Descripcion)?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="txt_upd_sol_Direccion">Direccion de Peritaje</label>
        <div class="controls">
            <?php echo form_textarea($txt_upd_sol_Direccion)?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_upd_per_FechaRespuesta">Fecha Respuesta</label>
        <div class="controls">
            <?php echo form_input($txt_upd_sol_FechaRespuesta)?>
        </div>
    </div>
    <br>
     <div class="controls">
            <?php echo $hid_udp_id?>
        </div>
    <div class="controls">
            <?php echo form_input($btn_upd_sol)?>
        </div>
</fieldset>

<?php echo form_close();?>
<?php echo validation_errors();?>