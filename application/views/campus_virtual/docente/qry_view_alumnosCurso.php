<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista2",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})	
function exportar(){
      var horario = $('#cbo_cursos').val(); 
        $.ajax({
                type: "POST",
                url: "cursosdocente/load_listar_alumnos/"+horario,
                data:'',
                success: function(msg){
                     
window.open('http://www.cip-trujillo.org/ovcipcdll/files/pdfs/'+msg,'_blank')                
                },
                error: function(msg){                
                    mensaje("r","Error!, vuelva a intentarlo");  

                }
            });     
}
function enviar_correo(){
      var horario = $('#cbo_cursos').val(); 
        $.ajax({
                type: "POST",
                url: "cursosdocente/EnviarEmail/"+horario,
                data:'',
                success: function(msg){
                     
alert('Mensaje de correo enviado');            
                },
                error: function(msg){                
                    mensaje("r","Error!, vuelva a intentarlo");  

                }
            });     
}
</script>

<legend><?php echo $nombreCurso; ?> - Lista de Alumnos</legend>   

<?php 
    if($alumnos != null){
?>
<div id="ContenedorGeneralPendientes">
    <div class="content" style="width: auto;">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">
<input type="button" class="btn btn-success" id="btn_listaralumnos" name="btn_listaralumnos" value="Reporte Alumnos" onClick="exportar()" style="width: 130px;">
                                         <?php 
$fecha_actual = date("Y/m/d");
if ($fecha_actual >= $fecha_fin){ ?>
     <input type="button" class="btn btn-info" id="btn_enviarcorreo" name="btn_enviarcorreo" value="Enviar Correo" onClick="enviar_correo()" style="width: 130px;">
<?php }?>

                           <br>    <br>
                            <div class='alert alert-danger' style="width:540px;">
                                              <h4 class='alert-heading'> Importante!!! </h4>
                                              El reporte final será enviado al correo <b style="color:#35C1F0;">infocipcdll@cip.org.pe</b> al finalizar el curso...
                                              </div>
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