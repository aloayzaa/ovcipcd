<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>prettify.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery-ui.multidatespicker.js"></script>

<link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery.clockpick.1.2.9.css" type="text/css">
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery-ui-1.8.8.custom.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.clockpick.1.2.9.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.clockpick.1.2.9.min.js"></script>
<?php

$frm_ins_horario = array('id' => 'frm_ins_horario',
    'name' => 'frm_ins_horario',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/horario/horarioIns', $frm_ins_horario);

$txt_ins_hor_diaslimite = array('id' => 'txt_ins_hor_diaslimite',
    'name' => 'txt_ins_hor_diaslimite',
    'style' => 'resize:none;width:70px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'maxlength' => '1',
    'data-original-title' => 'Escriba el Dia Limite');

$txt_ins_hor_horainicio = array('id' => 'txt_ins_hor_horainicio',
    'name' => 'txt_ins_hor_horainicio',
    'style' => 'resize:none;width:60px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'readonly' => 'yes',
    'data-original-title' => 'Escriba la Hora de Inicio');

$txt_ins_hor_horafin = array('id' => 'txt_ins_hor_horafin',
    'name' => 'txt_ins_hor_horafin',
    'style' => 'resize:none;width:60px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'readonly' => 'yes',
    'data-original-title' => 'Escriba la Hora de Fin');
    
$txt_ins_hor_costo = array('id' => 'txt_ins_hor_costo',
    'name' => 'txt_ins_hor_costo',
    'style' => 'resize:none;width:100px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escriba el Costo');

$txt_ins_hor_cupoMax = array('id' => 'txt_ins_hor_cupoMax',
    'name' => 'txt_ins_hor_cupoMax',
    'style' => 'resize:none;width:30px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'maxlength' => '2',
    'data-original-title' => 'Escriba el Cupo Máximo de Alumnos');

$txt_ins_hor_descuento = array('id' => 'txt_ins_hor_descuento',
    'name' => 'txt_ins_hor_descuento',
    'style' => 'resize:none;width:50px;',
    'class' => 'input-medium input-prepend tip',
    'data-original-title' => 'Escriba un descuento',
    'maxlength' => '2');

$btn_ins_hor = array('id' => 'btn_ins_hor',
    'name' => 'btn_ins_hor',
    'type' => 'submit', 
    'value' => 'Registrar Horario',
    'class' => 'btn btn-primary');

$idUsuario[''] = 'Seleccione un Docente';
foreach ($usuario as $usuario) {
    $idUsuario[$usuario->nPerId] = $usuario->Docente;}

$idCurso[''] = 'Seleccione un Curso';
foreach ($curso as $curso) {
    $idCurso[$curso->nCurId] = $curso->cCurNombre;}

function formatoFechas($fechas){
    $var = str_replace(",", "", $fechas);
    $longitud = strlen($var);
    $v = 0;
    for($i = 0; $i < $longitud; $i = $i + 10){
        $fechaAntes = substr($var, $i, 10);
        $anio = substr($fechaAntes, 0, 4);
        $mes = substr($fechaAntes, 5, 2);
        $dia = substr($fechaAntes, 8, 2);
        $arreglo[$v] = $dia.'-'.$mes.'-'.$anio;
        $v++;
    } 
    $longitud2 = count($arreglo);
    $nuevasFechas = '';
    for($j = 0; $j < $longitud2; $j = $j + 1){
        if($nuevasFechas == ''){
            $nuevasFechas = $arreglo[$j];
        }
        else{
            $nuevasFechas = $nuevasFechas.','.$arreglo[$j];
        }
    }
    return $nuevasFechas;
}    
   
    
?>
<script type="text/javascript">
  $(document).ready(function() {
    var dataTable = {
        tabla           : "BandejaPendiente-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);    
    $('#calendario').multiDatesPicker({
        altField: '#txt_ins_hor_fechas',
        dateFormat: "yy/mm/dd",

    });
    $("#clockimgInicio").clockpick({
            valuefield: 'txt_ins_hor_horainicio',
            starthour:8,
            endhour:22,
            minutedivisions:'4',
            military:'True'
    });
    $("#clockimgFin").clockpick({
            valuefield: 'txt_ins_hor_horafin',
            starthour:8,
            endhour:22,
            minutedivisions:'4',
            military:'True'
    });
  });
</script>
<fieldset>
    <legend>Creacion de Horario</legend>
    <!-- <div id="dataTableHorariosActivos">
        <div id="ContenedorGeneralPendientes">
            <div class="content" style="width: 900px">
                <div class="row-fluid">
                    <div class="box-content">
                        <div id="Tabs_RegistroNuevo">
                            <div class="form" style="width: 100%">
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Asignatura</th>
                                            <th>Fecha Inicio-Fin</th>
                                            <th>Ambiente</th>
                                            <th>Hora Inicio-Fin</th>
                                            <th>Dias Semana</th>
                                            <th>Fechas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($horarios as $horarios) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->Asignatura; ?></td>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->FechaInicio.' - '.$horarios->FechaFin; ?></td>
                                                <td style="width: 50px;text-align: center;"> <?php echo $horarios->Ambiente; ?></td>
                                                <td style="width: 40px;text-align: center;"> <?php echo $horarios->horaInicio.' - '.$horarios->horaFin; ?></td>
                                                <td style="width: 100px;text-align: center;"> <?php echo $horarios->Dias; ?></td>
                                                <td style="width: 100px;text-align: center;"> <?php echo formatoFechas($horarios->Fechas); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div> -->
    
    <table>
        <tr>
            <td valign="top">
                <div style="text-align: center"><h3>Fechas del Horario</h3></div>
                <div id="calendario"></div>
                <textarea class="input-medium input-prepend tip" name="txt_ins_hor_fechas" id="txt_ins_hor_fechas" style="resize:none;width: 240px" cols="34" rows="5" readonly="yes"></textarea>
            </td>
            <td valign="top" style="padding-left: 10px">
                <table>
                    <tr>
                        <td>Curso: </td>
                        <td>
                            <div style="padding-bottom: 5px"><?php echo form_dropdown('cbo_ins_hor_curso',$idCurso, 'id="cbo_ins_hor_curso" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Curso" data-placement="right"') ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Docente: </td>
                        <td><div id="mostrarComboDocentes"></div></td>
                    </tr>
                    <tr>
                        <td>Hora Inicio: </td>
                        <td>
                            <div style="padding-bottom: 5px"><?php echo form_input($txt_ins_hor_horainicio) ?>
                                 <img style="cursor:pointer;" id="clockimgInicio" height="20" width="20" src="<?php echo base_url()?>img/clock.png" alt="horaInicio"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hora Fin: </td>
                        <td>
                            <div style="padding-bottom: 5px"><?php echo form_input($txt_ins_hor_horafin) ?>
                                 <img style="cursor:pointer;" id="clockimgFin" height="20" width="20" src="<?php echo base_url()?>img/clock.png" alt="horaFin"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ambiente: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <select name="cbo_ins_hor_ambiente" id="cbo_ins_hor_ambiente">
                                    <option value="Laboratorio 1">Laboratorio 1</option>
                                    <option value="Laboratorio 2">Laboratorio 2</option>
                                    <option value="Laboratorio 3">Laboratorio 3</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Dias Limite: </td>
                        <td>
                            <div style="padding-bottom: 5px"><?php echo form_input($txt_ins_hor_diaslimite) ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Costo: </td>
                        <td>
                            <div style="padding-bottom: 5px"><?php echo form_input($txt_ins_hor_costo) ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nro. Cuotas: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <select name="cbo_ins_hor_cuotas" id="cbo_ins_hor_cuotas" style="width: 50px">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nro. Modulos: </td>
                        <td>
                            <div style="padding-bottom: 5px">
                                <select name="cbo_ins_hor_modulos" id="cbo_ins_hor_modulos" style="width: 50px">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cupos Máximo: </td>
                        <td>
                            <div style="padding-bottom: 10px"><?php echo form_input($txt_ins_hor_cupoMax) ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><input id="check" type="checkbox" name="chkBox" value="ON" onclick="checkBox()"/> Descuento (%): </td>
                        <td>
                            <div id="DIV" style="padding-bottom: 10px"><?php echo form_input($txt_ins_hor_descuento) ?></div>
                        </td>
                    </tr>
                </table>
                <div style="padding-top: 10px">
                    <?php echo form_input($btn_ins_hor); ?>
                </div>
            </td>
        </tr>
    </table>
    
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>