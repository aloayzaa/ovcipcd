<?php 

$this->load->view('dashboard/header');
$idPersona = $idPer;

    
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/docente/jsDocenteCursos.js'></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
    <div id="Tabs_DocenteCursos" >
        <ul>
            <li><a href="#pl" id="tab_alumnoscursolistar">Horarios Activos</a></li>
            <li><a href="#pr" id="tab_docentecursoslistar">Historial de Horarios Asignados</a></li>
        </ul>
        <div id="pr">
              <div class="control-group">
                <div class = "controls">
                    <?php
                        if($curso != null){
                    ?>
                    <legend>Lista de Horarios Asignados</legend>  
                    <table>
                        <tr>
                            <td>
                                <select id="cbo_filtro_mes" name="cbo_filtro_mes" style="width: 120px;">
                                    <option value="01" selected>Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                                   <select id="cbo_filtro_anio" name="cbo_filtro_anio" style="width:80px;">
                                            <option value="0">Seleccione Año</option>
                                            <?php
                                            for ($i = 2015; $i <= date("Y"); $i++) {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                            ?>
                                        </select> 
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 10px;">
                                <input type="button" value="Filtrar" name="btn_filtro" id="btn_filtro" class="btn btn-primary" onClick="filtro(cbo_filtro_mes,cbo_filtro_anio)"/>
                                <input type="hidden" value="<?php echo $idPersona; ?>" name="hid_idPersona" id="hid_idPersona"/>
                            </td>
                        </tr>
                    </table>
                    <?php
                        }
                        else{
                            echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No tiene actualmente un curso activo.</div>";
                        }
                    ?>
                </div>
            </div>
            <div id="div_qryCursos"></div>
        </div>
        <div id="pl">
            <div class="control-group">                 
                <div class = "controls">
                    <?php
                        if($curso != null){
                    ?>
                    <table>
                        <tr>
                            <td>
                                <select name="cbo_cursos" id="cbo_cursos" onchange="filtroAlumnos(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Curso" data-placement="right">
                                    <?php
                                    foreach ($curso as $id => $valor) {
                                        ?>
                                        <option value="<?php echo $id ?>"><?php echo $valor ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 10px;">
                                <input style="width: 130px;" type="button" value="Tomar Asistencia" name="btn_asistencia" id="btn_asistencia" class="btn btn-primary"/>
                                <input style="width: 130px;" type="button" value="Gestionar Notas" name="btn_notas" id="btn_notas" class="btn btn-primary" />
                                <input style="width: 130px;" type="button" value="Mostrar Alumnos" name="btn_mostrarAlumnos" id="btn_mostrarAlumnos" class="btn btn-primary" />
                                <input type="hidden" value="<?php echo $idPersona; ?>" name="hid_idPersona" id="hid_idPersona"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 10px;">
                                <input style="width: 130px;" type="button" value="Registrar Sesión" name="btn_registrarSesion" id="btn_registrarSesion" class="btn btn-primary"/>
                                <input style="width: 130px;" type="button" value="Editar Sesión" name="btn_editarSesion" id="btn_editarSesion" class="btn btn-primary" />
                                <input style="width: 130px;" type="button" value="Adjuntar Material" name="btn_adjuntarMaterial" id="btn_adjuntarMaterial" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
                    <?php
                        }
                        else{
                            echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No tiene actualmente un curso activo.</div>";
                        }
                    ?>
                </div>
            </div>
            <div id="div_qryAlumnos"></div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>