<?php
$resp = $estadistica['valores'];
$dividir = $estadistica['numero']*5;
$porcentaje = (100*$resp)/$dividir;

$btn_Grafica = form_submit('btn_Grafica',
    'Grafica',
    'id="btn_Grafica" class="btn btn-primary"');

$btn_Tabla = form_submit('btn_Tabla',
    'Tabla',
    'id="btn_Tabla" class="btn btn-primary"');

$btn_Exportar = form_submit('btn_Exportar',
    'Exporta',
    'id="btn_Exportar" class="btn btn-primary"');

?>

<script type="text/javascript">
function exportarExcel(idHorario){
    window.open('encuestacursos/exportar/' + idHorario, 'formpopup', 'width=400,height=400,resizeable,scrollbars');
    this.target = 'formpopup';
}
</script>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/encuesta/jsEncuestaAsignar.js'></script>
    

<!--<html>-->
<table border="1" bordercolor="#cacaca">
    <tr>
        <td colspan="3" style="padding: 10px 10px 10px 10px; width:7000px; font-size: 24px; background-color: #6d6d6d; color: #ffffff">Asignatura: <?= $horario['Curso']; ?></td>
    </tr>
    <tr>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Numero de alumnos encuestados :  <?php echo $horario['Num']; ?></td>
    </tr>
	<tr>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">El Docente es : <?php  if($porcentaje < 50){echo "Malo";}else{if($porcentaje > 75){echo "Bueno";}else{echo "Regular";}} ?>  (<?php echo round(($porcentaje),2) ?>%)</td>
    </tr>
 
</table>

<div id="Tabla" >
<br>
                <?php
                    echo $tabla;
                ?>
        <br>
		
     <h4>Seleccione para mostrar grafica:</h4> <div class="controls"> 
            <select name="cbo_gra_bloque" id="cbo_gra_bloque" width ="300px;">
                <option value="1" selected>Al Docente</option>
                <option value="2">Al Curso</option>
                <option value="3">A los Materiales </option>
                <option value="4">A la Infraestructura</option>
                <option value="5">A los Servicio Complementarios</option>
            </select>
        </div>
        <div class = "controls" onclick="mostrarGrafica(this)">
        <?php
                echo $btn_Grafica;
        ?>
    </div>
</div>
<input id="idHor" type="text" name="idHor" readonly style="visibility:hidden;" value="<?php echo $horario['ID'];?>">

<div>
    <input class="btn btn-primary" type="button" name="btn_exportar" id="btn_exportar" value="Exportar a Excel" onclick="exportarExcel(<?php echo $horario['ID'];?>)"/>
</div>