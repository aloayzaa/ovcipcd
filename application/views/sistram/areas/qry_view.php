<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = {
            tabla: "ListadoAreas",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
    });
</script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/areas/jsAreasAsig.js"></script>

<div id="Areas">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($areas > 0) { ?>
             
            <table id="ListadoAreas"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Usuario</th>
                        <th>Área y/o Cargo</th>
                        <th>Opciones</th>
                   </tr>
                </thead>
                <tbody> 
                    <?php foreach ($areas as $areas) { ?>
                        
                                <tr>
                                    <td style="width: 380px;text-align: center;"><?php echo $areas->nAreasId; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $areas->cAreasDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $areas->cDescripcionCargo; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/agregar.png" width="20" height="20" onclick="responsableIns(<?php echo $areas->nAreasId; ?>);">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="areasDel(<?php echo $areas->nAreasId; ?>);">
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
