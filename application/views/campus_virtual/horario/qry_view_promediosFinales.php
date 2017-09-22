
<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista2",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
function exportarExcel(idHorario){
    window.open('horario/exportarPromediosFinales/' + idHorario, 'formpopup', 'width=400,height=400,resizeable,scrollbars');
    this.target = 'formpopup';
}
</script>
<?php
    if($promedios != null){
?>


<div id="ContenedorGeneralPendientes">
        <div class="content" style="width: 350px">      
            <!-- Contenido en tabs : adanyc-->
            <div class="row-fluid">
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <table id="BandejaPendiente-Lista2"  class="display" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>ALUMNO</th>
                                        <th>PROMEDIO</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                            foreach ($promedios as $datos) {//1
                                        ?>
                                        <tr>
                                            <td style="width: 200px;text-align: center;"> <?php echo $datos->Alumno; ?></td>
                                            <td style="width: 20px;text-align: center;">
                                                <?php  if(strlen($datos->Promedio) == 1){
                                                            echo "0".$datos->Promedio;
                                                       }
                                                       else{
                                                           echo $datos->Promedio;
                                                       } 
                                                ?>
                                            </td>
                                        </tr>
                                    <?php 
                                    } ?>
                                </tbody>
                            </table>

                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

<div>
    <input class="btn btn-primary" type="button" name="btn_exportar" id="btn_exportar" value="Exportar a Excel" onclick="exportarExcel(<?php echo $idHorario;?>)"/>
</div>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> El horario no ha sido activado.</div>";
}
?>