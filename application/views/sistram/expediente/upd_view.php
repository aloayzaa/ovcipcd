<script type="text/javascript" src='<?php echo URL_JS; ?>sistram/expediente/jsExpedienteUpd.js'></script>  
<?php
$atributosForm = array(
    'id' => 'frm_editar_expediente',
    'name' => 'frm_editar_expediente',
    'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$boton = form_submit('btn_upd_registrar', 'Modificar', 'id="btn_upd_registrar" class="btn btn-primary"');

$txt_upd_multimedia_codigo = array(
    'name' => 'txt_upd_multimedia_codigo',
    'id' => 'txt_upd_multimedia_codigo',
    "style" => "width: 301px;",
    "required" => 'required',
    'readonly' => true,
    "value" => mb_convert_encoding($codigo, "UTF-8"));

$txt_upd_multimedia_Sumilla = array(
    'name' => 'txt_upd_multimedia_Sumilla',
    'id' => 'txt_upd_multimedia_Sumilla',
    "cols" => "205",
    "rows" => "2",
    "style" => "width: 301px;",
    "required" => 'required',
    "value" => mb_convert_encoding($Sumilla, "UTF-8"));

$txt_upd_multimedia_SolicNombre = array(
    'name' => 'txt_upd_multimedia_SolicNombre',
    'id' => 'txt_upd_multimedia_SolicNombre',
    "style" => "width: 301px;",
    "required" => 'required',
    "value" => mb_convert_encoding($Nombres, "UTF-8"));

$txt_upd_multi_SolicApellPaterno = array(
    'name' => 'txt_upd_multi_SolicApellPaterno',
    'id' => 'txt_upd_multi_SolicApellPaterno',
    "style" => "width: 301px;",
    //"required" => 'required',
    "value" => mb_convert_encoding($ApellidoPeterno, "UTF-8"));

$txt_upd_multi_SolicApellMaterno = array(
    'name' => 'txt_upd_multi_SolicApellMaterno',
    'id' => 'txt_upd_multi_SolicApellMaterno ',
    "style" => "width: 301px;",
    //"required" => 'required',
    "value" => mb_convert_encoding($ApellidoMaterno, "UTF-8"));


$txt_upd_multimedia_fecha = array(
    'name' => 'txt_upd_multimedia_fecha',
    'id' => 'txt_upd_multimedia_fecha',
    'value' => mb_convert_encoding($Fecha_Registro, "UTF-8"),
    'class' => 'cajascalendar',
    "style" => "width: 170px;",
    'required' => 'required',
    'readonly' => true);
$txt_upd_multimedia_Folios = array(
    'name' => 'txt_upd_multimedia_Folios',
    'id' => 'txt_upd_multimedia_Folios',
    "style" => "width: 80px;",
    "required" => 'required',
    "value" => mb_convert_encoding($Folios, "UTF-8"));
?>

<div class="row-fluid">
    <div class="span12">
        <div class="box">

            <div class="box-content box-nomargin">
                <br>
                <legend><strong>Modicar Datos del Expediente</strong></legend> 

                <input type="hidden" value="<?php echo $nExpedienteId; ?>" name="hid_upd_nExpedienteId" id="hid_upd_nExpedienteId">
                <input type="hidden" value="<?php echo $nTramiteId; ?>" name="hid_upd_TramiteId" id="hid_upd_TramiteId">
                <div class="control-group">
                    <label class="control-label" for="txt_upd_multimedia_codigo"><strong>Numero de Expediente:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multimedia_codigo); ?>
                    </div>
                </div>            

                <div class="control-group">
                    <label class="control-label" for="txt_upd_multimedia_Sumilla"><strong>Sumilla:</strong></label>
                    <div class="controls">
                        <?php echo form_textarea($txt_upd_multimedia_Sumilla); ?>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="txt_upd_multimedia_SolicNombre"><strong>Nombres:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multimedia_SolicNombre); ?>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="txt_upd_multi_SolicApellPaterno"><strong>Apellidos Paterno:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multi_SolicApellPaterno); ?>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="txt_upd_multi_SolicApellMaterno"><strong>Apellido Materno:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multi_SolicApellMaterno); ?>
                    </div>
                </div> 

                <div class="control-group">
                    <label class="control-label" for="txt_upd_multimedia_fecha"><strong>Fecha de Rgistro:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multimedia_fecha); ?>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="txt_upd_multimedia_Folios"><strong>Folios:</strong></label>
                    <div class="controls">
                        <?php echo form_input($txt_upd_multimedia_Folios); ?>
                    </div>
                </div> 

                <div id="msj_customupd" class="box-content" style="display:none;">
                </div> 
                <legend>Actualizar  Requisitos</legend>
            <div class="control-group">
        <label class="control-label"><strong>Tramite:</strong></label>
                <div class="control-group">  
                         <select id="Tramites" name="Tramites" class="span3" >
                        <?php
                        foreach ($Tramites  as $Tramites) {

                            if ($Tramites["nTramiteId"] == $nTramiteId) {
                                ?>
                                <option selected value="<?php echo $Tramites["nTramiteId"] ?>"><?php echo $Tramites["cTramiteTitulo"] ?></option>
                            <?php } else { ?>

                                <option value="<?php echo $Tramites["nTramiteId"] ?>"><?php echo $Tramites["cTramiteTitulo"] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
        
              
                <div align="center" id="c_qry_requiExp"></div>
        <br>
        <br>
                  <div id="info_personaupd" name="info_personaupd"> 
                </div>
                <div class="control-group">  
                    <div class="controls">
                        <?php echo $boton; ?>
                        <div id="preload_registrarupd" >

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>