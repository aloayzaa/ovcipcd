<legend>Pagos en el @CIP-CDLL</legend>
<script type="text/javascript">
     $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoPagos",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
         
      });
</script>
 <?php  if(count($pagos) > 0){ ?>
 <table id="ListadoPagos"  class="display" cellpadding="0" cellspacing="0" border="0">
   
                <thead>
                    <tr>
                        <th>Comprobante</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                          <th>Descripcion</th>
                        <th>Monto</th>
                        <th>Fecha de Pago</th>

                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($pagos as $pagos) { ?>
                        
                            <tr>  
                                <td style="width: auto;text-align: center;"><?php echo $pagos ["codbol"]; ?></td>
                                <td style="width: 180px;text-align: center;"><?php echo $pagos ["regcol"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $pagos ["nombbol"]; ?></td>
                                       <td style="width: auto;text-align: center;"><?php echo $pagos ["descripcion"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $pagos ["preciobol"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $pagos ["fecpagobol"]; ?></td>
                               
                            </tr>
                    <?php } ?>
                </tbody>
</table>
 <?php }else { ?>
    <div class='alert alert-block'><h4 class='alert-heading'>Información</h4>No existen ningun Pago en dicha cuenta de ingreso</div>
 <?php }