<script type="text/javascript" src="<?php echo URL_JS; ?>campus_virtual/horario/jsHorarioUpd.js"></script>
<?php

$frm_upd_prorroga = array('id' => 'frm_upd_prorroga',
    'name' => 'frm_upd_prorroga',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/horario/horarioUpdProrroga/', $frm_upd_prorroga);

$txt_upd_hor_fechaProrroga = array('name' => 'txt_upd_hor_fechaProrroga', 
    'id' => 'txt_upd_hor_fechaProrroga',
    'class' => 'input-medium input-prepend tip', 
    'style'=>'resize:none;width: 110px',
    'readonly' => 'yes'); 

$btn_upd_horarioProrroga = array('id' => 'btn_upd_horarioProrroga',
    'name' => 'btn_upd_horarioProrroga',
    'type' => 'submit', 
    'value' => 'Modificar Fecha',
    'class' => 'btn btn-primary');

$hid_upd_hor_idHorario = form_hidden("hid_upd_hor_idHorario", $idHorario, "hid_upd_hor_idHorario", true);

$fechaHoy = $fechaHoy;
$fechaFin = $horario['fechafin'];
$nuevaFechaFin = $horario['fechaSumada'];
if($fechaHoy > $nuevaFechaFin){

?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#calendarioProrroga').datepicker({
	altField: '#txt_upd_hor_fechaProrroga',
        dateFormat: "yy/mm/dd",
        minDate: new Date()
    });
  });
</script>

<fieldset>
    <legend>Modificacion de Fecha de Prorroga</legend>
    <table>
        <tr>
            <td valign="top">
                <div id="calendarioProrroga"></div>
            </td>
            <td valign="top" style="padding-left: 10px">
                <table>
                    <tr>
                        <td>
                            Fecha Limite: 
                        </td>
                        <td style="padding-left: 10px">
                            <?php echo form_input($txt_upd_hor_fechaProrroga);?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-left: 10px; padding-top: 10px;">
                            <?php echo form_input($btn_upd_horarioProrroga); 
                                  echo $hid_upd_hor_idHorario;
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</fieldset>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> El Horario aun no finaliza.</div>";
}
?>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>