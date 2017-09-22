<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoTipoexpediente",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
              
    });
</script>

<div id="Tipoexpediente">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($tipoexpediente > 0) { ?>
             
            <table id="ListadoTipoexpediente"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($tipoexpediente as $tipoexpediente) { ?>
                        
                                <tr >
                                    <td style="width: 380px;text-align: center;"><?php echo $tipoexpediente->nTipexpedienteId; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $tipoexpediente->cTipexpedienteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/editar.png" width="20" height="20" onclick="tipoexpedienteUpd(<?php echo $tipoexpediente->nTipexpedienteId;?>);">
                                         <img style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="tipoexpedienteDel(<?php echo $tipoexpediente->nTipexpedienteId; ?>);">
                                    
                                    </td>

                                </tr>

                    <?php } ?>
                </tbody>
            </table>
                                
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existen Requisitos para listar </div>";
        }
        ?>

    </div>  
   
</div>
