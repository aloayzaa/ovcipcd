<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/areas/jsAreas.js"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

    $(function () {
        $('#Tabs_Areas').tabs();
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
                <h3>Modulo de Areas</h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Areas">
                    <ul>
                        <li><a href="#Areasl" id="AreasRegistrar">Nuevo</a></li>
                        <li><a href="#Areas2" id="AreasListar">Listado</a></li>
                    </ul>
                    <div id="Areasl">
                        <div id="RegistrarArea">
                            <?php $this->load->view('sistram/areas/ins_view'); ?>
                        </div>  
                    </div>
                    <div id="Areas2">
                                                         
                       <div align="center" id="qry_areas" style="width: auto">
                      
                        </div>
                    </div>
                    
                         
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







