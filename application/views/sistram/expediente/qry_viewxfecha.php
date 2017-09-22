<script type="text/javascript">
    $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoExpedientesxFecha",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
      

    });
  </script>
 
  <div id="Expedientes">
    <div class="form" style="width: 100%">
        
        <?php  if ($expedientes > 0) {?>
                    
            <table id="ListadoExpedientesxFecha"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Expediente</th>
                        <th>Fecha de Registro</th>
                         <th>Tipo Expediente</th>
                        <th>Sumilla</th>
                        <th>Solicitante</th>
                        <th>Involucrados</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($expedientes as $expediente) { ?>
                            
                                <tr>
                                    <td style="width: 280px;text-align: center;"><?php echo $expediente->nExpedienteCodigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteFechaRegistro; ?></td>
                                    <td style="width: 50px;text-align: center;"><?php echo $expediente->cTipexpedienteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteSumilla; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->solicitante; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                         <?php echo $expediente->involucrados; ?>  
                                    </td>                           
                                </tr>
                              
                                
                    <?php } ?>
                </tbody>
            </table> 
                      
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Información!!</h4>No existen expedientes en las fechas indicadas</div>";
        }
        ?>     
    </div> 
</div>
