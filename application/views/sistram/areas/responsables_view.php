<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = {
            tabla: "ListadoResponsables",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
    });
</script>



<div id="Responsables">
    <legend>
        Historico de Responsables del Área
    </legend>
    <div class="form" style="width: 100%">
        <?php if ($responsables > 0) { ?>
             
            <table id="ListadoResponsables"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Apellidos y Nombres</th>
                        <th>Fecha Inicio</th>
                        
                         <th>Estado</th>
                   </tr>
                </thead>
                <tbody> 
                    <?php foreach ($responsables as $responsables) { ?>
                        
                                <tr >
                                    <td style="width: 380px;text-align: center;"><?php echo $responsables->cNombreEncargado; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $responsables->dFechaInicio; ?></td>
                                   
                                    <td style="width: 380px;text-align: center;"><?php if($responsables->estadoDetalle==0){
                                      echo "Ex-Trabajador";  
                                    }
                                    else{
                                        echo "Actual";
                                    }
                                    ?></td>
                                    

                                </tr>

                    <?php } ?>
                </tbody>
            </table>
                                
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existen responsables de áreas para listar </div>";
        }
        ?>

    </div>  
   
</div>
