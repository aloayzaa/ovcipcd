<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/notas/jsNotas.js'></script>
<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
    $("#preload").html("");
})	
</script>

<div class="control-group">  
    <div id="ContenedorGeneralPendientes">
        <div class="content" style="width: 450px">      
            <!-- Contenido en tabs : adanyc-->
            <div class="row-fluid">
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Datos Personales</th>
                                        <th>Nota</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   $i = 1;
                                            foreach ($alumnos as $datos) {//1
                                        ?>
                                        <tr>
                                            <td style="width: 10px;text-align: center;"> <?php echo $i; ?></td>
                                            <td style="width: 200px;text-align: left;"><?php echo $datos->datosPersonales; ?></td>
                                            <td style="width: 100px;text-align: center;">
                                                
                                                <?php
                                                    $notas[$datos->id.'_00'] = '00';
                                                    $notas[$datos->id.'_01'] = '01';
                                                    $notas[$datos->id.'_02'] = '02';
                                                    $notas[$datos->id.'_03'] = '03';
                                                    $notas[$datos->id.'_04'] = '04';
                                                    $notas[$datos->id.'_05'] = '05';
                                                    $notas[$datos->id.'_06'] = '06';
                                                    $notas[$datos->id.'_07'] = '07';
                                                    $notas[$datos->id.'_08'] = '08';
                                                    $notas[$datos->id.'_09'] = '09';
                                                    $notas[$datos->id.'_10'] = '10';
                                                    $notas[$datos->id.'_11'] = '11';
                                                    $notas[$datos->id.'_12'] = '12';
                                                    $notas[$datos->id.'_13'] = '13';
                                                    $notas[$datos->id.'_14'] = '14';
                                                    $notas[$datos->id.'_15'] = '15';
                                                    $notas[$datos->id.'_16'] = '16';
                                                    $notas[$datos->id.'_17'] = '17';
                                                    $notas[$datos->id.'_18'] = '18';
                                                    $notas[$datos->id.'_19'] = '19';
                                                    $notas[$datos->id.'_20'] = '20';
                                                    $js = 'id="cbo_nota" style="width: 50px" onchange="actualizarNota(this, cbo_sesiones)"';
                                                    echo form_dropdown('cbo_nota', $notas, $datos->id.'_'.$datos->valorNota, $js);
                                                ?>
                                                
                                            </td>    
                                        </tr>
                                    <?php
                                        $notas = array();
                                        $i = $i + 1;
                                    } ?>
                                </tbody>
                            </table>

                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>