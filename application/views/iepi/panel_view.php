<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src="<?php echo URL_JS ?>iepi/jsIepi.js"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

    $(function () {
        $('#Tabs_BusquedaPersona').tabs();
        $("#preload").html("");
        $("#btn_fnd_evento").click(function () {
            $("#cbo_evento").prop("disabled", true);
            msgLoading2("#c_qry_inscripcion");
            //  alert($("#cbo_evento").val());
            get_page('iepi/listar_inscripciones/' + $("#cbo_evento").val(), 'c_qry_inscripcion');
            $("#cbo_evento").prop("disabled", false);
        });
        $("#btn_fnd_diplomado").click(function () {
            $("#cbo_diplomado").prop("disabled", true);
            msgLoading2("#c_qry_diplomado");
            //  alert($("#cbo_evento").val());
            get_page('iepi/listar_inscripciones/' + $("#cbo_diplomado").val(), 'c_qry_diplomado');
            $("#cbo_diplomado").prop("disabled", false);
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
                <h3>Módulo de <i>Inscripcion IEPI</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_BusquedaPersona">
                    <ul>
                        <li><a href="#BusquedaPersonal" id="BusquedaPersonaRegistrar">Nuevo</a></li>
                        <li><a href="#BusquedaPersona2" id="BusquedaPersonaListar">Cursos</a></li>
                        <li><a href="#BusquedaPersona3" id="BusquedaPersonaListar">Diplomado</a></li>
                    </ul>
                    <div id="BusquedaPersonal">
                        <div id="RegistrarInscripcion">
                            <?php $this->load->view('iepi/ins_view'); ?>
                        </div>  
                    </div>
                    <div id="BusquedaPersona2">
                                                               
                        <table id="actuales">
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="cbo_evento"  class="chzn-select" name="cbo_evento" style="width:300px;">
                                            <option value="0">Seleccione Curso </option>
                                            <?php
                                            foreach ($curso as $curso) {
                                                ?>
                                                <option value="<?php echo $curso["nCurId"] ?>"><?php echo mb_convert_encoding($curso["cCurNombre"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>

                                    <td style="padding-bottom: 8px;"><button id="btn_fnd_evento" name="btn_fnd_evento" type="button" class="btn btn-primary">Buscar</button></td>

                                </tr>
                            </tbody>                    
                        </table>
                       
                       
                        <div align="center" id="c_qry_inscripcion"></div>
                    </div>
                    <div id="BusquedaPersona3">
                        <table id="actuales">
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="cbo_diplomado"  class="chzn-select" name="cbo_diplomado" style="width:300px;">
                                            <option value="0">Seleccione Diplomado </option>
                                            <?php
                                            foreach ($diplomado as $diplomado) {
                                                ?>
                                                <option value="<?php echo $diplomado["nCurId"] ?>"><?php echo mb_convert_encoding($diplomado["cCurNombre"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </td>

                                    <td style="padding-bottom: 8px;"><button id="btn_fnd_diplomado" name="btn_fnd_diplomado" type="button" class="btn btn-primary">Buscar</button></td>

                                </tr>
                            </tbody>                    
                        </table>
                          <div align="center" id="c_qry_diplomado"></div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







