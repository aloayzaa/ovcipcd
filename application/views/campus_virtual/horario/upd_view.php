

<script type="text/javascript" src="<?php echo URL_JS; ?>campus_virtual/horario/jsHorarioUpd.js"></script>

<?php

$frm_upd_horario = array('id' => 'frm_upd_horario',
    'name' => 'frm_upd_horario',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/horario/horarioUpd/', $frm_upd_horario);

$txt_upd_hor_diaslimite = array('id' => 'txt_upd_hor_diaslimite',
    'name' => 'txt_upd_hor_diaslimite',
    'style' => 'resize:none;width:70px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'maxlength' => '1',
    'data-original-title' => 'Escriba el Dia Limite',
    'value' => mb_convert_encoding($horario['diaslimite'], 'UTF-8'));
    
$txt_upd_hor_horainicio = array('id' => 'txt_upd_hor_horainicio',
    'name' => 'txt_upd_hor_horainicio',
    'style' => 'resize:none;width:60px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'readonly' => 'yes',
    'data-original-title' => 'Escriba la Hora de Inicio',
    'value' => mb_convert_encoding($horario['horainicio'], 'UTF-8'));
    
$txt_upd_hor_horafin = array('id' => 'txt_upd_hor_horafin',
    'name' => 'txt_upd_hor_horafin',
    'style' => 'resize:none;width:60px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'readonly' => 'yes',
    'data-original-title' => 'Escriba la Hora de Fin',
    'value' => mb_convert_encoding($horario['horafin'], 'UTF-8'));
    
$txt_upd_hor_costo = array('name' => 'txt_upd_hor_costo', 
    'id' => 'txt_upd_hor_costo', 
    'style' => 'resize:none;width:100px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba el Costo',
    'value' => mb_convert_encoding($horario['costo'], 'UTF-8')); 

$txt_upd_hor_cupoMax = array('id' => 'txt_upd_hor_cupoMax',
    'name' => 'txt_upd_hor_cupoMax',
    'style' => 'resize:none;width:30px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'maxlength' => '2',
    'data-original-title' => 'Escriba el Cupo Máximo de Alumnos',
    'value' => mb_convert_encoding($horario['cupoMax'], 'UTF-8'));

$txt_upd_hor_fechas = array('name' => 'txt_upd_hor_fechas', 
    'id' => 'txt_upd_hor_fechas',
    'class' => 'input-medium input-prepend tip', 
    'style'=>'resize:none;width: 240px',
    'cols' => '34',
    'rows' => '5',
    'readonly' => 'yes'); 

$txt_upd_hor_descuento = array('id' => 'txt_upd_hor_descuento',
    'name' => 'txt_upd_hor_descuento',
    'style' => 'resize:none;width:50px;',
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Escriba un descuento',
    'value' => mb_convert_encoding($horario['descuento'], 'UTF-8'),
    'maxlength' => '2');

$idUsuario[''] = 'Seleccione un Docente';
foreach ($usuario as $fila) {
    $idUsuario[$fila->nPerId] = $fila->Docente;}

$idCurso[''] = 'Seleccione un Curso';
foreach ($curso as $fila) {
    $idCurso[$fila->nCurId] = $fila->cCurNombre;}

$btn_upd_horario = array('id' => 'btn_upd_horario',
    'name' => 'btn_upd_horario',
    'type' => 'submit', 
    'value' => 'Modificar Horario',
    'class' => 'btn btn-primary');

$hid_upd_hor_idHorario = form_hidden("hid_upd_hor_idHorario", $horario['idHorario'], "hid_upd_hor_idHorario", true);

$fec = $horario['fechas'];
$fecSolas = str_replace(",", "", $fec);

?>
<script type="text/javascript">
  $(document).ready(function() {
    var fechasSolas = "<?php echo $fecSolas;?>";
    var longitud = fechasSolas.length;
    var v = 0;
    var arreglo = new Array();
    for(var i = 0; i < longitud; i = i + 10){
        arreglo[v] = substr(fechasSolas, i, 10);
        v = v + 1;
    }
    $('#calendarioUpd').multiDatesPicker({
	altField: '#txt_upd_hor_fechas',
        dateFormat: "yy/mm/dd",
        addDates : arreglo
    });
    $("#clockimgInicioUpd").clockpick({
            valuefield: 'txt_upd_hor_horainicio',
            starthour:8,
            endhour:22,
            minutedivisions:'4',
            military:'True'
    });
    $("#clockimgFinUpd").clockpick({
            valuefield: 'txt_upd_hor_horafin',
            starthour:8,
            endhour:22,
            minutedivisions:'4',
            military:'True'
    });
  });
</script>
<fieldset>
    <legend>Modificacion de Horario</legend>
    <table>
        <tr>
            <td valign="top">
                <div style="text-align: center"><h3>Fechas del Horario</h3></div>
                <div id="calendarioUpd"></div>
<!--                <textarea class="input-medium input-prepend tip" name="txt_upd_hor_fechas" id="txt_upd_hor_fechas" style="resize:none;width: 240px" cols="34" rows="5" readonly="yes"></textarea>-->
                <?php echo form_textarea($txt_upd_hor_fechas);?>
            </td>
            <td valign="top" style="padding-left: 10px">
                 <table>
                    <tr>
                        <td>Curso: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_dropdown('cbo_upd_hor_curso', $idCurso, $horario['idCurso'], 'id="cbo_upd_hor_curso" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Curso" data-placement="right"') ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Docente: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_dropdown('cbo_hor_docente', $idUsuario, $horario['idDocente'], 'id="cbo_hor_docente" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Docente" data-placement="right"') ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hora Inicio: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_input($txt_upd_hor_horainicio) ?>
                                <img style="cursor:pointer;" id="clockimgInicioUpd" height="20" width="20" src="<?php echo base_url() ?>img/clock.png" alt="horaInicioUpd"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hora Fin: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_input($txt_upd_hor_horafin) ?>
                                <img style="cursor:pointer;" id="clockimgFinUpd" height="20" width="20" src="<?php echo base_url() ?>img/clock.png" alt="horaFinUpd"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ambiente: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php $arregloAmbiente = array("Laboratorio 1" => "Laboratorio 1", "Laboratorio 2" => "Laboratorio 2", "Laboratorio 3" => "Laboratorio 3");
                                echo form_dropdown("cbo_upd_hor_ambiente", $arregloAmbiente, $horario['ambiente'], 'id="cbo_upd_hor_ambiente"')
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Dias Limite: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_input($txt_upd_hor_diaslimite) ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Costo: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_input($txt_upd_hor_costo) ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nro. Cuotas: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php $arregloCuotas = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6");
                                echo form_dropdown("cbo_upd_hor_cuotas", $arregloCuotas, $horario['nroCuotas'], 'id="cbo_upd_hor_cuotas"  style="width: 50px"')
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cupos Máximo: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <?php echo form_input($txt_upd_hor_cupoMax) ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Descuento (%): </td>
                        <td>
                            <div style="padding-bottom: 10px"><?php echo form_input($txt_upd_hor_descuento) ?></div>
                        </td>
                    </tr>
                </table>
                <div>
                    <?php echo form_input($btn_upd_horario); 
                          echo $hid_upd_hor_idHorario;
                    ?>
                </div>
            </td>
        </tr>
    </table>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>