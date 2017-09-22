<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/alumno/jsAlumnoRespuesta.js'></script>    
<?php
if($encuestas != null){
if($respuesta == null){

$frm_ins_respuesta = array('id' => 'frm_ins_respuesta',
    'name' => 'frm_ins_respuesta',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/alumno/respuestaIns', $frm_ins_respuesta);

$radio_ins_valor= array('id' => 'radio_ins_valor',
    'name' => 'radio_ins_valor',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escoja Alternativa',
    'placeholder' => 'Alternativa');

$btn_ins_respuesta = form_submit('btn_ins_respuesta',
    'Acepta',
    'id="btn_ins_encuesta" class="btn btn-primary"');

$idPersona = $horario['idPersona'];
$idHorario = $horario['idHorario'];
?>
<table border="1" bordercolor="#cacaca">
    <tr>
        <td colspan="3" style="padding: 10px 10px 10px 10px; width: 600px; font-size: 24px; background-color: #6d6d6d; color: #ffffff">Asignatura: <?php echo $horario['Curso']; ?></td>
    </tr>
</table>
<fieldset>
    <div class="alert alert-info">
	<strong>Nota !</strong> Conteste las respuestas seleccionando una opción donde <strong>1</strong> es muy malo y <strong>5</strong> es muy bueno
    </div>
    <table style="width: 550px;" >
        <thead>
                <tr>
                    <th style="width: 400px;">Pregunta</th>
                    <th>Opcion</th>
                </tr>
                <tr>
                    <th style="width: 460px;"></th>
                    <th>1 2 3 4 5</th>
                </tr>
        </thead>
        <tbody>
        <?php foreach ($encuestas as $encuestas){?><tr>

            <td>
                  <?php
                    echo $encuestas->cPreEnunciado;
                    
                  ?>
            </td>
            <td>
        
                <input  name="<?php echo $encuestas->nPreId;?>" type="radio" value="1" onclick="insRespuesta(this)">
                <input  name="<?php echo $encuestas->nPreId;?>" type="radio" value="2" onclick="insRespuesta(this)">
                <input  name="<?php echo $encuestas->nPreId;?>" type="radio" value="3" onclick="insRespuesta(this)">
                <input  name="<?php echo $encuestas->nPreId;?>" type="radio" value="4" onclick="insRespuesta(this)">
                <input  name="<?php echo $encuestas->nPreId;?>" type="radio" value="5" onclick="insRespuesta(this)">
              
            </td>
        </tr><?php }
        ?>
        <input id="idHor" type="text" name="idHor" readonly style="visibility:hidden;"value="<?php echo $idHorario;?>">
        <input id="idPer" type="text" name="idPer" readonly style="visibility:hidden;" value="<?php echo $idPersona;?>">
        </tbody>
    </table>
    <br>

<!--    <div class = "controls" onclick="cerrarPopUp()">-->
    <div class = "controls" >
        <?php
                echo $btn_ins_respuesta;
        ?>
    </div>
</fieldset>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> Ya Respondistes.</div>";
}}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No hay encuesta para este curso.</div>";
}
?>
<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>


