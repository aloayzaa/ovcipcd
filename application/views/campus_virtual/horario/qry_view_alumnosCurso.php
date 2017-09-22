<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/docente/jsDocenteCursos.js'></script>
<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista2",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})	

</script>
 

<?php 
    if($alumnos != null){
?>
<div id="ContenedorGeneralPendientes">
    <div class="content" style="width: auto;">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                                <table id="BandejaPendiente-Lista2"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Datos Personales</th>
                                            <th>Correo</th>
                                            <th>Opciones</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alumnos as $fila) {//1
                                            $valor1 = $fila->id;
                                            $valor2 = $idHo;
                                            $valor = $valor1."-".$valor2;
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $fila->id; ?></td>
                                                <td style="width: 200px;text-align: center;"><?php echo $fila->datosPersonales; ?></td>
                                                <td style="width: 100px;text-align: center;"><?php echo $fila->CORREO; ?></td>
                                                <?php echo '<td style="text-align:center;vertical-align: middle;cursor:pointer;">
                                                           <img onClick=reporteNotasAlumno("'. $valor .'") title="Reporte de Notas" src="'. base_url() . 'img/examen.png" width="20" height="20"/>
                                                           <img onClick=reporteAsistenciasAlumno("'. $valor .'") title="Reporte de Asistencias" src="'. base_url() . 'img/asistencia.png" width="20" height="20"/>
                                                           </td>'; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                        </div>  
                    </div>
                </div>
        </div>
    </div>
</div>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No existen alumnos registrados en el horario.</div>";
}
?>