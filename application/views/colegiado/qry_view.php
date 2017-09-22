
<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoPersonas",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
              
    });
</script>

<div id="Persona">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($persona > 0) { ?>
             
            <table id="ListadoPersonas"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Razon Social</th>
                        <th>RUC</th>
                        <th>Direccion</th>
                        <th>Celular Empresa</th>
                        <th>Correo Empresa</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($persona as $persona) { ?>
                        
                                <tr >
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->codigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->razon_social; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->ruc; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->direccion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->celular_empresa; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $persona->correo_empresa; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                        <img style="text-align: center; cursor: pointer;" src="../uploads/editar.png" width="25" height="20" onclick="persona_juridica_Upd(<?php echo $persona->codigo;?>);">
                                
                                    </td>

                                </tr>

                    <?php } ?>
                </tbody>
            </table>
                                
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existen Personas para listar </div>";
        }
        ?>

    </div>  
   
</div>
             