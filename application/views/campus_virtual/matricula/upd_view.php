<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/matricula/jsMatriculaUpd.js'></script>
<?php
$frm_upd_matricula = array('id' => 'frm_upd_matricula',
    'name' => 'frm_upd_matricula', 
    'class' => 'form-horizontal');

//echo form_open('campus_virtual/matricula/matriculaUpd/'.$idMatricula."/", $frm_upd_matricula);

/*$btn_upd_matricula = form_submit('btn_ins_matricula', 
    'Modificar Matricula', 
    'id="btn_ins_matricula" class="btn btn-warning"');

$btn_act_pago = form_submit('btn_act_pago', 
    'Actualizar Pago', 
    'id="btn_act_pago" class="btn btn-primary"');*/+

$idCurso[''] = 'Seleccione Curso';
//$idCurso['']= date('Y/m/d');
foreach ($cursos as $curso) {

    $idCurso[$curso->nCurId] = $curso->cCurNombre;
    }
    
$idHorario['0'] = 'Seleccione Horario';
//$idCurso['']= date('Y/m/d');
foreach ($horario as $horario) {
    $idHorario[$horario->nHorId] = $horario->cHorDia.' '.
                                   $horario->cHorFechaInicio.' '.
                                   $horario->cHorHoraInicio.' '.
                                   $horario->cHorAmbiente;
    }

$txt_upd_pag_nroTicket=array('name' => 'txt_upd_pag_nroTicket1',
    'id' => 'txt_upd_pag_nroTicket1',
    'maxlength' => '30',
    'style' => 'resize:none;width:260px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingrese Nro. de Ticket',
    'data-placement' => 'right');

$txt_upd_pag_monto=array('name' => 'txt_upd_pag_monto1',
    'id' => 'txt_upd_pag_monto1',
    'maxlength' => '10',
    'style' => 'resize:none;width:260px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingrese Monto Cancelado',
    'data-placement' => 'right');

$hid_upd_mat_idAlumno = form_hidden("hid_upd_hor_idAlumno1", $idAlumno, "hid_upd_hor_idAlumno1", true);

$hid_upd_mat_idHorario = form_hidden("hid_upd_hor_idHorario1", $Hor, "hid_upd_hor_idHorario1", true);

$hid_upd_mat_tipoMat = form_hidden("hid_upd_mat_tipoMat1", $TipoMatricula, "hid_upd_mat_tipoMat1", true);

$chk_ins_pag_des = array('name' => 'chk_ins_pag_des1',
    'id'          => 'chk_ins_pag_des1',
    'value'       => 'accept',
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

$txt_obs_mat1 = array(
              'name'        => 'txt_obs_mat1',
              'id'          => 'txt_obs_mat1',
              'value'       => '',
              'rows'        => '5',
              'cols'        => '100',
              'style'       => 'width:50%',
            );
?>
<fieldset>
    <div class="control-group">
        <label class="control-label">Alumno: <?php echo $persona ?></label>
       
    </div>
    <div class="control-group">
        <table>
            <tr>
                <td>
                    <label class="control-label" for="cbo_upd_mat_curso1">Curso:  </label>
                </td>
                <td>
                    <div class = "controls">
                        <?php 
                            if($evaluarCambio==1){
                                     echo form_dropdown('cbo_upd_mat_curso1',
                                                 $idCurso, 
                                                 $Curso,
                                                  'id="cbo_upd_mat_curso1" 
                                                    class="input-medium tip"
                                                    style="width:260px;"
                                                    required="required"
                                                    data-original-title="Selecione un Curso"
                                                    data-placement="right"
                                                    onchange="filtroCurso1(this)"'); 
                            }
                            else {
                                 echo form_dropdown('cbo_upd_mat_curso1',
                                                 $idCurso, 
                                                 $Curso,
                                                  'id="cbo_upd_mat_curso1" 
                                                    class="input-medium tip"
                                                    style="width:260px;"
                                                    disabled="disabled"
                                                    required="required"
                                                    data-original-title="Selecione un Curso"
                                                    data-placement="right"
                                                    onchange="filtroCurso1(this)"'); 
                            }
                           
                              echo $hid_upd_mat_idAlumno;
                    ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div  class="control-group">
        <table>
            <tr>
                <td>
                    <label class="control-label" for="cbo_upd_mat_horario1">Horario:  </label>  
                </td>
                <td>
                     <div class = "controls">
                     <?php 
                         if($evaluarCambio==1){
                            echo form_dropdown('cbo_upd_mat_horario1',
                                    $idHorario,
                                    $Hor,
                                     'id="cbo_upd_mat_horario1" 
                                        class="input-medium tip"
                                        style="width:260px;"
                                        required="required"
                                        data-original-title="Selecione Horario"
                                        data-placement="right"
                                        onchange="filtroHorario(this)"'); 
                         }
                         else {
                            echo form_dropdown('cbo_upd_mat_horario1',
                                    $idHorario,
                                    $Hor,
                                     'id="cbo_upd_mat_horario1" 
                                        class="input-medium tip"
                                        style="width:260px;"
                                        required="required"
                                        disabled="disabled"
                                        data-original-title="Selecione Horario"
                                        data-placement="right"
                                        onchange="filtroHorario(this)"'); 
                         }
                    ?>  
                    </div>
                </td>

            </tr>
        </table>
        
       
    </div>
    
    <?php
   // echo '<input type="hidden" id="hid_upd_mat_cos1" value="'.$Costo.'" name="hid_upd_mat_cos1">';
    //echo '<input type="hidden" id="hid_upd_mat_pag1" value="'.$Cancelado.'" name="hid_upd_mat_pag1">';  
    ?>
 <!--   <div class="control-group" id="div_pagDif"> -->
<!--        <label class="control-label" for="txt_upd_cos">Costo:  </label>
        <div class = "controls">
            <input type="text" name="fname" id="txt_upd_cos" value="<?php // echo $Costo; ?>" disabled="true">
        </div>
        <label class="control-label">Cancelado:  </label>
        <div class = "controls">
            <label id="label" class="control-label"><?php // echo $Cancelado; ?></label>
        </div>-->
         <!-- 
        <label class="control-label">Saldo:  </label>
        <div class = "controls">
            <label id="label" class="control-label"><?php if($Saldo >= 0) {echo $Saldo;} else {echo '0';} ?></label>
        </div>
		<?php if($Saldo > 0) { ?>
            <label class="control-label">Completar pago:  </label>
            <div class = "controls">
                <input id="chk_com_pag1" type="checkbox" style="margin:10px" value="accept" name="chk_com_pag1" onclick="mostrarPago2()">
            </div>
            
        <?php } else{ ?>  
            <label class="control-label" style="color:red;">&nbsp;&nbsp;&nbsp;!Usted no tiene deuda!</label>

         <?php  } ?>
    </div>
    <?php if($TipoMatricula == 0) {
    ?>
    <div class="control-group">
        <label class="control-label">Tipo Matricula:  </label>
        <div class = "controls">
    <?php
        $matTipo = array('0'=>'Reserva','1'=>'Matricula');
        echo form_dropdown('cbo_upd_tip_mat1',
                           $matTipo, 
                           '0',
                            'id="cbo_upd_tip_mat1" 
                              class="input-medium tip"
                              style="width:260px;"
                              required="required"
                              data-original-title="Selecione un Curso"
                              data-placement="right"
                              onchange="mostrarPago1(this)"'); 
    ?>
        </div>
    </div>
    <?php
    }
    ?> -->

     <div id="pagosCurso" class="control-group">
         <label class="control-label">Monto de Matricula efectuada: <strong> <?php echo $pagosCurso?></strong></label>
    </div>
 
<div id="div_detalle_view">
   <?php $this->load->view('campus_virtual/matricula/detalle_view'); ?>
   
<!--

    <div id="div_pag1" class="control-group" style="display:none;">
        <div class="control-group">
            <label class="control-label" for="txt_upd_pag_nroTicket1">Nro. de Ticket:  </label>
            <div class = "controls">
                <?php echo form_input($txt_upd_pag_nroTicket);
                ?>  
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="txt_upd_pag_nroTicket1">Monto:  </label>
            <div class="controls">
                <?php echo form_input($txt_upd_pag_monto);
                ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="chk_ins_pag_des">Descuento:  </label>
            <div class="controls">
                <?php echo form_checkbox($chk_ins_pag_des); ?>
            </div>
            <div id="div_por_des1"></div>
        </div>
        <div class=" control-group">
            <label class="control-label" for="txt_obs_mat1">Observación:</label>
            <div class="controls">
                <?php echo form_textarea($txt_obs_mat1); ?>
            </div>
        </div>
    </div>

    <div class = "controls">
        <?php
        if($Saldo == 0){
                  echo '<div style="display: none">';
                echo $btn_upd_matricula;
                echo '</div>';
        }
        else{
            echo $btn_upd_matricula;}
 
        ?>
    </div>-->
    
   </div> 
    <div class = "controls">
        <?php echo '<input type="hidden" id="hid_upd_hor_idAlumno1" value="'.$idAlumno.'" name="hid_upd_hor_idAlumno1">';
              echo '<input type="hidden" id="hid_upd_curso" value="'.$Curso.'" name="hid_upd_curso">';
              echo '<input type="hidden" id="hid_upd_hor_idHorario1" value="'.$Hor.'" name="hid_upd_hor_idHorario1">';
              echo '<input type="hidden" id="hid_upd_mat_tipoMat1" value="'.$TipoMatricula.'" name="hid_upd_mat_tipoMat1">';
              echo '<input type="hidden" id="hid_upd_mat_descuento" value="'.$Descuento.'" name="hid_upd_mat_descuento">';
              //echo $hid_upd_mat_tipoMat;
        ?>
    </div>
  
</fieldset>

<?php //echo form_close(); ?>
<?php echo validation_errors(); ?>