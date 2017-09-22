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
        <?php if ($requisitos > 0) { ?>
             
            <table id="ListadoRequisitos"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($requisitos as $requisito) { ?>
                        
                                <tr >
                                    <td style="width: 180px;text-align: center;"><?php echo $requisito->nRequisitosId; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $requisito->cRequisitosDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $requisito->cRequisitosTipo; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/editar.png" width="20" height="20" onclick="requisitosUpd(<?php echo $requisito->nRequisitosId;?>);">
                                         <img style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="requisitosDel(<?php echo $requisito->nRequisitosId; ?>);">
                                    
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
