<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();

        var dataTable = {
            tabla: "ListadoInscripcionxfecha",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
    });
 function ver_xfecha(){
    var evento;
            if($("#cbo_evento_fecha").val()){
                evento=$("#cbo_evento_fecha").val();
            }
            else{
                evento=0;
            }

        //var idano = $("#cboFecharegistroAno").val();
        //var idmes = $("#cboFecharegistroMes").val();
        window.open('busqueda/exportar_fecha/'+$("#cbo_tipo_evento").val() +"/"+ $("#cboFecharegistroAno").val() + "/" + $("#cboFecharegistroMes").val()+"/"+evento,'_blank');
    }
    
</script>  
<?php
$boton = form_button('btn_fnd_exportar', 'Exportar Excel', 'id="btn_fnd_exportar" class="btn btn-danger" onclick="ver_xfecha();"');
?>
<br>
<div id="Total_Inscripciones" >
<table>
    <td style="padding-left: 615px"><?php echo $boton; ?></td>
</table>
    <div class="form" style="width: 85%">
        <?php if ($xFecha> 0) { ?>
            <table id="ListadoInscripcionxfecha"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Correos</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                        <th>Comprobante</th>
                        <th>Cuenta Ingreso</th>
                      
                    </tr>
                </thead>
                <tbody>
                 
                    <?php foreach ($xFecha as $xFecha) { ?>
                        <tr style="background-color:#FBF7AA;">                                  
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["CODIGO"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["DNI"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["NOMBRES"]; ?></td>
                               <td style="width: 380px;text-align: center;"><?php echo $xFecha ["CORREO"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["FECHA_DE_REGISTRO"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["PAGO"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["COMPROBANTE"]; ?></td>
                            <td style="width: 380px;text-align: center;"><?php echo $xFecha ["CUENTA_INGRESO"]; ?></td>

                        </tr>
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