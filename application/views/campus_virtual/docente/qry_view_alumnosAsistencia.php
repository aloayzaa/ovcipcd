<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/asistencia/jsAsistencia.js'></script>
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
                                        <th>Estado</th>  
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
                                                <select id="cbo_estado" name="cbo_estado" style="width: 100px" onchange="actualizarEstado(this, cbo_sesiones)">
                                                    
                                                    <?php if($datos->valorAsistencia == 'AS'){
                                                    ?>
                                                    <option value="<?php echo $datos->id; ?>_AS" selected>ASISTENCIA</option>
                                                    <option value="<?php echo $datos->id; ?>_FA">FALTA</option>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <option value="<?php echo $datos->id; ?>_AS">ASISTENCIA</option>
                                                    <option value="<?php echo $datos->id; ?>_FA" selected>FALTA</option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </td>    
                                        </tr>
                                    <?php 
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