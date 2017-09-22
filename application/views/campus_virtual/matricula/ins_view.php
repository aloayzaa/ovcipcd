<?php

$frm_ins_matricula = array('id' => 'frm_ins_matricula',
    'name' => 'frm_ins_matricula',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/matricula/matriculaIns', $frm_ins_matricula);

$txt_fnd_alu_dni = array('id' => 'txt_fnd_alu_dni',
    'name' => 'txt_fnd_alu_dni',
    'style' => 'resize:none;width:100px;',
    'class' => 'cajassearch',
    'maxlength' => '9',
    'required' => 'required',
    'data-original-title' => 'Escriba un D.N.I.');

$btn_fnd_alu = form_button('btn_fnd_alu', 
    'Buscar', 
    'id="btn_fnd_alu" class="btn btn-primary"');

$btn_ins_matricula = form_submit('btn_ins_matricula', 
    'Registrar Matricula', 
    'id="btn_ins_matricula" class="btn btn-primary"');

$idCurso[''] = 'Seleccione Curso';
//$idCurso['']= date('Y/m/d');
foreach ($curso as $curso) {
    $idCurso[$curso->nCurId] = $curso->cCurNombre;
    }

/*$txt_ins_pag_nroTicket=array('name' => 'txt_ins_pag_nroTicket',
    'id' => 'txt_ins_pag_nroTicket',
    'maxlength' => '11',
    'style' => 'resize:none;width:130px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingrese Nro. de Ticket',
    'data-placement' => 'right');

$txt_ins_pag_monto=array('name' => 'txt_ins_pag_monto',
    'id' => 'txt_ins_pag_monto',
    'maxlength' => '5',
    'style' => 'resize:none;width:80px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Ingrese Monto Cancelado',
    'data-placement' => 'right');*/

$chk_ins_pag_des = array('name' => 'chk_ins_pag_des',
    'id'          => 'chk_ins_pag_des',
    'value'       => 'accept',
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

$txt_obs_mat = array(
              'name'        => 'txt_obs_mat',
              'id'          => 'txt_obs_mat',
              'value'       => '',
              'rows'        => '5',
              'cols'        => '100',
              'style'       => 'width:50%',
            );
?>

<script>
$(document).ready(function(){
    $("#preload2").html("");
})	
</script>

<fieldset>
    <div id="pr">
        <div id="div_ins">
            <div class="content">      
                <div class="row-fluid">
                    <div class="box">
                        <div class="box-head">
                            <h3>Módulo de <i>Matrícula de Alumno</i></h3>
                        </div>
                        <div class="box-content">
                            <div style="min-width: 500px;">
                                <div class="form-horizontal">
                                    <legend>Buscar Persona</legend>                        
                                    <fieldset>    
                                        <div class="control-group">  
                                            <table>
                                                <tr>
                                                    <td style="vertical-align: top;padding-top: 7px;padding-right: 10px;"><label for="txt_fnd_alu_dni">Nro de DNI</label></td>
                                                    <td style="padding-right: 10px;"><?php echo form_input($txt_fnd_alu_dni); ?></td>
                                                    <td><?php echo $btn_fnd_alu; ?></td>
                                                    <td><span id="preload"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="c_list_data_persona" style="margin-top: 10px;"></div>
                                    </fieldset>
                                </div>
                                <div class="form-horizontal">
                                    <div id="div_cur" style="display:none;">
                                        <legend>Cursos Disponibles</legend>                        
                                        <fieldset>    
                                            <div class="control-group">      
                                                <label class="control-label" for="cbo_ins_mat_curso">Curso:</label>
                                                  <div class = "controls">
                                                      <?php echo form_dropdown('cbo_ins_mat_curso',
                                                                                 $idCurso, 
                                                                                 0,
                                                                                  'id="cbo_ins_mat_curso" 
                                                                                    class="input-medium tip"
                                                                                    style="width:260px;"
                                                                                    required="required"
                                                                                    data-original-title="Selecione un Curso"
                                                                                    data-placement="right"
                                                                                    onchange="filtroCurso(this)"'); 
                                                    ?>
                                                  <span id="preload2"></span>
                                                  </div>
                                            </div>
                                            <div class="control-group">      
                                                <label class="control-label" for="cbo_ins_mat_horario">Horario: </label>
                                                  <div class = "controls">
                                                      <?php $idHorario = array('');
                                                            echo form_dropdown('cbo_ins_mat_horario',
                                                                                $idHorario,
                                                                                '',
                                                                                 'id="cbo_ins_mat_horario" 
                                                                                    class="input-medium tip"
                                                                                    style="width:260px;"
                                                                                    required="required"
                                                                                    data-original-title="Selecione Horario"
                                                                                    data-placement="right"
                                                                                    onchange="mostrarTipoPagos(this)"'); 
                                                    ?>
                                                  </div> 
                                            </div>
                                        </fieldset>
                                    </div>
                                    <input type="hidden" name="cbo_ins_tip_mat" id="cbo_ins_tip_mat" >
                                    <div id="div_tip_mat"  style="display:none;" class="control-group">
                                        <legend>Datos de la Matrícula</legend>
                                        <label class="control-label" for="cbo_ins_mat_tipo">Tipo: </label>
                                            <div class = "controls">
                                                                                           
                                            </div>
                                      </div>
                                      <div id="alerta"></div>
                                     
                                      <div id="div_pag"  style="display:none;"  class="control-group">
                                         <!--<div class="control-group">
                                              <label class="control-label" for="txt_ins_pag_nroTicket">Nro. de Ticket:  </label>
                                              <div class="controls">
                                                  <?php echo form_input($txt_ins_pag_nroTicket); ?>
                                              </div>
                                          </div>
                                           <div class="control-group">
                                              <label class="control-label" for="txt_ins_pag_nroTicket">Monto:  </label>
                                              <div class="controls">
                                                  <?php echo form_input($txt_ins_pag_monto); ?>
                                              </div>
                                              <div id="div_mon_can"></div>
                                          </div>-->
                                          
                                        </div>

                                       <div id="div_check_obs" style="display:none;" class="control-group" > 
                                        <div class="control-group">
                                              <label class="control-label" for="chk_ins_pag_des">Descuento:  </label>
                                              <div class="controls">
                                                  <?php echo form_checkbox($chk_ins_pag_des); ?>
                                              </div>
                                          </div>
                                          <div class=" control-group">
                                              <label class="control-label" for="txt_obs_mat">Observación:</label>
                                              <div class="controls">
                                                  <?php echo form_textarea($txt_obs_mat); ?>
                                              </div>
                                          </div>

                                        </div>
                                     
                                        
                                <!-- Cargamos el formulario de Registro CHC o CHCOB --> 
                                <br />
                                <div id="c_frm_chc_ins"></div>
                                <!-- -->
                            </div>
                        </div>
                        <div id="div_btn" style="display:none;" class = "controls">
                            <?php
                                    echo $btn_ins_matricula;

                            ?>
<br>
<div id="preLoad3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>