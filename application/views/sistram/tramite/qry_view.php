<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoRequisitos",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
              
    });
</script>

<div id="Requisitos">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($tramites > 0) { ?>
             
            <table id="ListadoRequisitos"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Derivado a:</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($tramites as $tramite) { ?>
                        
                                <tr >
                                    <td style="width: 200px;text-align: center;"><?php echo $tramite->nTramiteId; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $tramite->cTramiteTitulo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $tramite->cTramiteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $tramite->cTramiteTipoPersona; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/editar.png" width="20" height="20" onclick="tramiteUpd(<?php echo  $tramite->nTramiteId;?>);">
                                         <img style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="tramiteDel(<?php echo  $tramite->nTramiteId; ?>);">
                                    
                                    </td>

                                </tr>

                    <?php } ?>
                </tbody>
            </table>
                                
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existen Tramites para listar </div>";
        }
        ?>

    </div>  
   
</div>
