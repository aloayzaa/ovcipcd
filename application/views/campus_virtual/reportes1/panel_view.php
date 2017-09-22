<?php $this->load->view('dashboard/header');?>
<?php

$frm_ins_matricula = array('id' => 'frm_ins_matricula',
    'name' => 'frm_ins_matricula',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/matricula/matriculaIns', $frm_ins_matricula);

$txt_fnd_alu_dni = array('id' => 'txt_fnd_alu_dni',
    'name' => 'txt_fnd_alu_dni',
    'style' => 'resize:none;width:100px;',
    'class' => 'cajassearch',
    'maxlength' => '8',
    'required' => 'required',
    'data-original-title' => 'Escriba un D.N.I.');

$btn_fnd_alu = form_button('btn_fnd_alu', 
    'Buscar', 
    'id="btn_fnd_alu" class="btn btn-primary"');

$btn_sel_hor = form_button('btn_sel_hor', 
    'Filtrar', 
    'id="btn_sel_hor" class="btn btn-primary"');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/reportes1/jsReportes1.js'></script>
    <div id="Tabs_Reporte" >
        <ul>
            <li><a href="#pr" id="tab_generalMatrículas">Reportes Generales</a></li>
            <li><a href="#pl" id="tab_generalBusquedas">Record Académico</a></li>
            <li><a href="#pd" id="tab_generalPagos">Reporte de Pagos</a></li>
        </ul>
        <div id="pr">
            <div id="div_rep1">
                <table>
                        <tr>
                            <td>
                                <tr>
                                    <td><legend>Reporte</legend></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cbo_filtro_tipo" class="control-label">Tipo de Reporte:</label>
                                    </td>
                                    <td>
                                        <select id="cbo_filtro_tipo" name="cbo_filtro_tipo" style="width: 120px;" onchange="mostrarDiv('div_qry',false)">
                                            <option value="0" selected>Seleccione</option>
                                            <option value="1">Matrículas</option>
                                            <option value="2">Docentes</option>
                                            <option value="3">Cursos</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><legend>Fechas: </legend></td>
                                </tr>
                                <tr>
                                    <td><label for="from" class="control-label">Desde</label></td>
                                    <td><input type="text" id="from" name="from" /></td>
                                </tr>
                                <tr>
                                    <td><label for="to" class="control-label">hasta</label></td>
                                    <td><input type="text" id="to" name="to" /></td>
                                </tr>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 10px;">
                                <input type="button" value="Filtrar" name="btn_filtro" id="btn_filtro" class="btn btn-primary" onClick="filtro(cbo_filtro_tipo)"/>
                            </td>
                        </tr>
                    </table>
            </div>
            <div id="div_qry">
                
            </div>
            <div id="div_exp"></div>
        </div>
        <div id="pl" style="width:auto;">
            <div class="form-horizontal">
                <fieldset>
                    <div class="control-group">  
                        <table>
                            <tr><legend>Buscar Alumno</legend></tr>
                            <tr>
                                <td style="vertical-align: top;padding-top: 7px;padding-right: 10px;"><label for="txt_fnd_alu_dni">Nro de DNI</label></td>
                                <td style="padding-right: 10px;"><?php echo form_input($txt_fnd_alu_dni); ?></td>
                                <td>   <select id="cbo_tipo_lista" name="cbo_tipo_lista" style="width: 105px;" onchange="mostrarDiv('div_qry',false)">
                                            <option value="1">Académico</option>
                                            <option value="2">Económico</option>
                                        </select></td>
                                <td>&nbsp;&nbsp;<?php echo $btn_fnd_alu; ?></td>
                                <td><span id="preload"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div id="c_list_data_persona" style="margin-top: 10px;"></div>
                </fieldset>
            </div>
            <div id="div_qry1">
            </div>
        </div>
        <div id="pd" style="width:100%">
            <legend>Fechas: </legend>
            <table>
                <tr>
                    <td><label for="from1" class="control-label">Desde</label></td>
                    <td><input type="text" id="from1" name="from1" /></td>
                    <td><label for="to1" class="control-label">hasta</label></td>
                    <td><input type="text" id="to1" name="to1" /></td>
                    <td><?php echo $btn_sel_hor; ?></td>
                </tr>
            </table>
            <div id="div_rep_pagCur" style="display:none;">
                <legend>Cursos: </legend>
                <p><?php $idHorario = array('');
                         echo form_dropdown('cbo_rep_pag_horario',
                                             $idHorario,
                                             '',
                                             'id="cbo_rep_pag_horario" 
                                                class="input-medium tip"
                                                style="width:260px;"
                                                required="required"
                                                data-original-title="Selecione Horario"
                                                data-placement="right"
                                                onchange="cargarGrid(this)"'); 
                   ?>
                </p>
            </div>
            <div id="div_qry2">
                
            </div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>