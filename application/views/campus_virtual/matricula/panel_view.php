<?php $this->load->view('dashboard/header');?>
<?php
// CREACIÓN DE FORMULARIO DE BUSQUEDA DE COLEGIADO MEDIANTE SU CIP

?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/matricula/jsMatricula.js'></script>
    <div id="Tabs_Matricula" >
        <ul>
            <li><a href="#pr" id="tab_matricularegistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_matriculalistar">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <?php $this->load->view('campus_virtual/matricula/ins_view'); ?>
            </div>
        </div>
        <div id="pl" style="width:100%;">
            <div class="control-group">
                <div class="controls">
                    <legend>Lista de <i>Reservas/Matrículas</i></legend>
                    <label for="cbo_qry_mat_tipo" class="control-label">Seleccione:</label>
                    <?php $matTipo = array(''=>'Seleccione Tipo Matricula','0'=>'Reserva','1'=>'Matricula');
                          echo form_dropdown('cbo_qry_mat_tipo',
                                             $matTipo,
                                             '',
                                             'id="cbo_qry_mat_tipo" 
                                                class="input-medium tip"
                                                style="width:260px;"
                                                required="required"
                                                data-original-title="Selecione un Curso"
                                                data-placement="right"
                                                onchange="filtroTipoMatricula(this)"');
                    ?>
                <span id="preload3"></span>
                </div>
            </div>
            <div id="div_qry1">
                <div id="filtro">
                    <label for="cbo_filtro" class="control-label">Cursos:</label>
                    <?php $idHorario = array('');
                          echo form_dropdown('cbo_filtro',
                                              $idHorario,
                                              '',
                                               'id="cbo_filtro" 
                                                  class="input-medium tip"
                                                  style="width:260px;"
                                                  required="required"
                                                  data-original-title="Selecione Horario"
                                                  data-placement="right"
                                                  onchange="filtro(this)"'); 
                    ?>
                </div>
                <div id="div_qry"></div>
            </div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>