<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoInscripcion",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
    });
    function ver(){
        var idevento = $("#cbo_evento").val();
        window.open('busqueda/exportar/'+idevento,'_blank');
    }
      function exportarpdf(){
      var idevento = $('#cbo_evento').val();              
    window.open('busqueda/exportarpdf/'+idevento,'_blank');                
           
}
</script>

<b><strong><?php  echo mb_strtoupper($capitulo); ?></strong></b>
<?php
$boton = form_button('btn_fnd_exportar', 'Exportar Excel', 'id="btn_fnd_exportar" class="btn btn-primary" onclick="ver();"');
$boton1 = form_button('btn_fnd_exportarpdf', 'Exportar PDF', 'id="btn_fnd_exportarpdf" class="btn btn-danger" onclick="exportarpdf();"');
?>
<table>
    <td style="padding-left:720px"><?php echo $boton; ?></td><br><br>
    <td><?php echo $boton1; ?></td>
</table>
<br>
<div id="inscripciones_actuales">

    <div class="form" style="width: 100%">
        <?php if ($evento > 0) { ?>
            <table id="ListadoInscripcion"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                        <th>Comprobante</th>
                        <th>Tipo de Comprobante</th>
                        <th>Cuenta Ingreso</th>
                          <th>Asistencia</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($evento as $evento) { ?>
                        <?php if ($evento ["COMPROBANTE"] <> '') { ?>
                            <tr style="background-color: #fbb450;">                                  
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CODIGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["DNI"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["NOMBRES"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["FECHA_DE_REGISTRO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["PAGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CUENTA_DE_INGRESO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><h3 style='color:green;'><?php echo $evento ["ASISTENCIA"]; ?></h3></td>
                                <?php
                                if ($evento ["PAGO"]<$monto || $evento ["OBSERVACION"] <> '') {
                                    echo "<td style='width: 380px;text-align: center; cursor: pointer;'><img src='../uploads/ruteo/lupa.png' width='50' height='50' onclick='Observacionpopup(" . "\"" . $evento["CODIGO"] . "\"" . "," . "\"" . str_replace(" ", "_", $evento["CUENTA_DE_INGRESO"]) . "\");' style='padding: 18px;'></td>";
                                } else {

                                    echo "<td style='width: 380px;text-align: center;'><strong><h3 style='color:green; padding: 18px;'>Pagado</h3></strong></td>";
                                }
                                ?>
                                <td style="width: 850px;text-align: center; cursor: pointer;"><img src="../uploads/ruteo/asistencia.png" width="30" height="30" onclick="InscripcionAsistencia(<?php echo $evento ["CODIGO"]; ?>);"><?php echo "<img src='../uploads/ruteo/eliminar.png' width='30' height='30' onclick='InscripcionDel(" . $evento["CODIGO"] . ");' style='padding: 8px;'>" ?></td>

                                                                                            <!--<td style="width: 380px;text-align: center; cursor: pointer;"></td>-->

                            </tr>
                        <?php } else { ?>
                            <tr style="background-color:#FBF7AA;">                                 
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CODIGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["DNI"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["NOMBRES"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["FECHA_DE_REGISTRO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["PAGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CUENTA_DE_INGRESO"]; ?></td>
                             <td style="width: 380px;text-align: center;"><h3 style='color:green;'><?php echo $evento ["ASISTENCIA"]; ?></h3></td>

                                <?php
                                echo "<td style='width: 380px;text-align: center;'><strong><h3 style='color:red; padding:10px;'>No Pagado</h3></strong></td>";
                                ?>
                                <td style="width: 850px;text-align: center; cursor: pointer;"><img src="../uploads/ruteo/asistencia.png" width="30" height="30" onclick="InscripcionAsistencia(<?php echo $evento ["CODIGO"]; ?>);"><?php echo "<img src='../uploads/ruteo/eliminar.png' width='30' height='30' onclick='InscripcionDel(" . $evento["CODIGO"] . ");' style='padding: 8px;'>" ?></td>


                            </tr>
                        <?php } ?>

                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion1!!</h4>No Existen Inscripciones para dicho evento.. </div>";
        }
        ?>

    </div>  
</div>