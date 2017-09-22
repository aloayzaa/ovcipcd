<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/matricula/jsReservaUpd.js'></script>
<?php
$frm_upd_reserva = array('id' => 'frm_upd_reserva', 'name' => 'frm_upd_reserva',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/matricula/reservaUpd/' . $idMatricula . "/", $frm_upd_reserva);

$hid_upd_mat_tipoMat = form_hidden("hid_upd_mat_tipoMat1", $TipoMatricula, "hid_upd_mat_tipoMat1", true);
$chk_ins_pag_des1 = array('name' => 'chk_ins_pag_des1', 'id' => 'chk_ins_pag_des1', 'value' => 'accept', 'checked' => FALSE, 'style' => 'margin:10px',);
$txt_obs_mat1 = array('name' => 'txt_obs_mat1', 'id' => 'txt_obs_mat1', 'value' => '', 'rows' => '5', 'cols' => '100', 'style' => 'width:50%',);
$btn_ins_matricula = form_submit('btn_ins_matricula', 'Registrar Matricula', 'id="btn_ins_matricula" class="btn btn-primary"');
?>
<!--<fieldset>-->
    <table>
        <tbody> 
            <tr>
                <td>
                <center><p style="font-size: medium;"><strong><b>EDICIÓN DEL PROCESO DE RESERVA HA MATRICULA</b></strong></p></center>
                    <br>
                    <div class="control-group">
                        <label class="control-label"><b>Alumno:</b></label>
                        <div class = "controls">
                            <label id="label" class="control-label" style="padding-left: 20px;"><?php echo $persona ?></label>
                        </div>
                        <label class="control-label"><b>Dni:</b></label>
                        <div class = "controls">
                            <label id="label" class="control-label"><?php echo $dni ?></label>
                        </div>
                        <label class="control-label"><b>Monto de Curso:</b></label>
                        <div class = "controls">
                            <label  id="label" class="control-label" ><?php echo $montoCurso ?></label>
                        </div>
                    </div>  
                </td>  
            </tr>

        </tbody> 
    </table>

    <?php
    echo '<input type="hidden" id="idCurso" value="' . $Hor . '" name="idCurso">';
    echo '<input type="hidden" id="dni" value="' . $dni . '" name="dni">';
    echo '<input type="hidden" id="idCursoid" value="' . $Curso . '" name="idCursoid">';
    echo '<input type="hidden" id="idAlumno" value="' . $nPerId . '" name="idAlumno">';

//    echo '<input type="hidden" id="hid_upd_mat_pag1" value="' . $Cancelado . '" name="hid_upd_mat_pag1">';
    ?>
    <div id="mostrar_pagos" class="control-group">
    </div>
    <div id="div_check_obs1"  style="display:none;" class="control-group" > 
        <div class="control-group">
            <label class="control-label" for="chk_ins_pag_des1"><b>Descuento: </b></label>
            <div class="controls"><?php echo form_checkbox($chk_ins_pag_des1); ?>
            </div>
        </div>
        <div class=" control-group">
            <label class="control-label" for="txt_obs_mat1"><b>Observación:</b></label>
            <div class="controls"><?php echo form_textarea($txt_obs_mat1); ?>
            </div>
        </div>
        <center>
            <br>
            <div class=" control-group">
            <?php echo $btn_ins_matricula; ?>
        </div>
        </center>
       
    </div>
    <div class = "controls">
        <?php
        echo '<input type="hidden" id="hid_upd_hor_idAlumno1" value="' . $idAlumno . '" name="hid_upd_hor_idAlumno1">';
        echo '<input type="hidden" id="hid_upd_mat_tipoMat1" value="' . $TipoMatricula . '" name="hid_upd_mat_tipoMat1">';
       ?>
    </div>
</fieldset>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>