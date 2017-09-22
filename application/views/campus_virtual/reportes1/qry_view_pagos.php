<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BuzonPagos",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable2(dataTable);
})  
</script>

<h3> Detalle Economico Infocip </h3>
 <div id="ContenedorGeneralPagos">
     
     <div class="form" style="width:auto;">
       <?php if ($pagos > 0) { ?>
     <table id="BuzonPagos"  class="display" cellpadding="0" cellspacing="0" border="0">
      <thead>
      <tr>
                           <th style="text-align: center;color:#CC0000;">Nro</th>
                                                            <th style="text-align: center;color:#CC0000;">Curso</th>
                                                            <th style="text-align: center;color:#CC0000;">Fecha de Pago</th>
                                                            <th style="text-align: center;color:#CC0000;">Mes</th>
                                                            <th style="text-align: center;color:#CC0000;">Nro Voucher</th>
                                                            <th style="text-align: center;color:#CC0000;">Monto Cancelado</th>
      </tr>
       </thead>
           <tbody>
         <?php 
                  $i = 0;
                  foreach ($pagos as $pagos) {       $i++; ?>
                   <tr>                                  
              <td style="width: 180px;text-align: center;"><?php echo $i; ?></td>
                                                      <td style="width: 380px;text-align: center;"><?php echo $pagos["Curso"]; ?></td>
                                              <td style="width: 380px;text-align: center;"><?php echo $pagos["FechaPago"]; ?></td>                                      
                                             <td style="width: 200px;text-align: center;"><?php echo $pagos["Mes"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $pagos["Voucher"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $pagos["Monto"]; ?></td>
                        </tr>
    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
                  echo " <div class='alert alert-block '>
                                              <h3 class='alert-heading'> Informacion!!! </h3>
                                              No se han registrado pagos en infocip ...GOOOOOOO...
                                              </div>";
        }
        ?>

    </div>  
</div>





