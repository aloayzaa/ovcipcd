<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src="<?php echo URL_JS ?>busqueda/jsBusqueda.js"></script>
<script type="text/javascript">

    $(function () {
        $('#Tabs_BusquedaPersona').tabs();
        $("#preload").html("");
        $("#btn_fnd_evento").click(function () {
            $("#cbo_evento").prop("disabled", true);
            msgLoading2("#c_qry_inscripcion");
            //  alert($("#cbo_evento").val());
            get_page('busqueda/listar_inscripciones/' + $("#cbo_evento").val(), 'c_qry_inscripcion');
            $("#cbo_evento").prop("disabled", false);
        });
        
     });
</script>
<?php
$radio_emp1 = array('name' => 'rdbtipbus', 'id' => 'radio_emp1', 'checked' => TRUE);
$radio_emp2 = array('name' => 'rdbtipbus', 'id' => 'radio_emp2');
?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Busqueda Persona</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_BusquedaPersona">
                    <ul>
                        <li><a href="#BusquedaPersonal" id="BusquedaPersonaRegistrar">Nuevo</a></li>
                        <li><a href="#BusquedaPersona2" id="BusquedaPersonaListar">Listado</a></li>
                         <li><a href="#BusquedaPersona3" id="BusquedaPersonaReporte">Reportes</a></li>
                    </ul>
                    <div id="BusquedaPersonal">
                        <div id="RegistrarInscripcion">
                            <?php $this->load->view('busqueda/ins_view'); ?>
                        </div>  
                    </div>
                    <div id="BusquedaPersona2">
                        <table>
                            <tbody>
                                <tr>

                                    <td style="padding-right: 30px">
                                        <?php echo form_radio($radio_emp1) ?> <label for="radio_emp1" style="color: #26a61a"><b>Inscripciones Actuales</b></label>			
                                    </td>
                                    <td style="padding-left: 30px">
                                        <?php echo form_radio($radio_emp2); ?> <label for="radio_emp2" style="color: #26a61a" ><b>Total Incripciones</b></label>
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    
                        <table id="actuales">
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="cbo_evento" name="cbo_evento" style="width:200px;">
                                            <option value="0">Seleccione Evento </option>
                                            <?php
                                            foreach ($evento as $evento) {
                                                ?>
                                                <option value="<?php echo $evento["nEveId"] ?>"><?php echo mb_convert_encoding($evento["cEveTitulo"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>

                                    <td style="padding-bottom: 8px;"><button id="btn_fnd_evento" name="btn_fnd_evento" type="button" class="btn btn-primary">Buscar</button></td>

                                </tr>
                            </tbody>                    
                        </table>
                        <table id="todos">
                            <tbody>
<tr>                                    <td style="padding-bottom: 10px;color:red">Seleccione Evento</td></tr>
                                <tr>
                                     <td style="padding-bottom: 10px;"> <select id="cbo_tipo_evento" name="cbo_tipo_eventos" style="width:140px;">
                                            <option value="2">Capitulos</option>
                                            <option value="100">Evento CIP</option>
                                            <option value="0">Evento Externo </option>
                                          </select>
                                     </td>
                                </tr>
                              
                                <tr>
                                    <td>
                                        <select id="cboFecharegistroAno" name="cboFecharegistroAno" style="width:140px;">
                                            <option value="0">Seleccione Año</option>
                                            <?php
                                            for ($i = 2015; $i <= date("Y")+10; $i++) {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                            ?>
                                        </select> 
                                    </td>
                                    <td>
                                        <select onchange="mostrareventos()" id="cboFecharegistroMes" name="cboFecharegistroMes" style="width:140px;">
                                            <option value="0">Seleccione Mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </td>
                                    <td id="tr_eventos">
                                        
                                    </td>
                            <br>
                            <td style="padding-bottom: 7px;"><button id="btn_fnd_buscar" name="btn_fnd_buscar" type="button" class="btn btn-primary">Buscar</button></td>
                            </tr> 
                            </tbody>                    
                        </table>
                       
                        <div align="center" id="c_qry_inscripcion"></div>
                    </div>
                     <div id="BusquedaPersona3">
                          <table id="todos">
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="cboReporteAnio" name="cboReporteAnio" style="width:140px;">
                                            <option value="0">Seleccione Año</option>
                                            <?php
                                            for ($i = 2015; $i <= date("Y")+10; $i++) {
                                                
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                            ?>
                                        </select> 
                                    </td>
                                    <td>
                                        <select id="cboReporteMes" name="cboReporteMes" style="width:160px;">
                                            <option value="0">Seleccione Mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </td>
                            <br>
                            <td style="padding-bottom: 7px;"><button id="btn_reporte" name="btn_reporte" type="button" class="btn btn-primary">Mostrar</button></td>
                            </tr> 
                            </tbody>                    
                        </table>
                                            
                        <div id="ReporteEstadistico" >
                           
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







