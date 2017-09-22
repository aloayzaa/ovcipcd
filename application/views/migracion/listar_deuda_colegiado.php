
<script type="text/javascript">
    $(document).ready(function () {
        var dataTable = {
            tabla: "ListadoDetalleEconomico",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
    });
</script>

<div id="Detalle">
    <br>
    <div class="form" style="width: 900px;">
        <?php if ($usuarios > 0) { ?>
             
            <table id="ListadoDetalleEconomico"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                      <th>Nro</th>
                        <th>CIP</th>
                        <th>Nombres</th>
                        <th>Fecha Aporte</th>
                        <th>Ult. FcehaPago</th>
                        <th>Cuota</th>
                         <th>Multa</th>
                         <th>Total</th>
                   </tr>
                </thead>
                <tbody> 
                    <?php 
                                $contador = 0;
                        $t_cuotas = 0;
                  $a = $menor;
$b = $mayor;
 $cont = 1;
                    foreach ($usuarios as $posicion) 
                    if((($posicion[4]+$posicion[5])>=$a && ($posicion[4]+$posicion[5])<=$b)){ 
                      $total= ($posicion[4]+$posicion[5]); 
                      $fecha=date("d-m-Y",strtotime($posicion[6])); 

                      ?>
                                <tr>
                                   <td style="text-align: center;"><?php echo $cont++; ?></td>
                                    <td style="text-align: center;width:10%"><?php echo $posicion[0]; ?></td>
                                    <td style="text-align: center;"><?php echo $posicion[1]; ?></td>
                                    <td style="text-align: center;"><?php echo $fecha; ?></td>
                                    <td style="text-align: center;"><?php echo $posicion[2].'-'.$posicion[3]; ?></td>
                                       <td style="text-align: center;"><?php echo $posicion[4]; ?></td>
                                           <td style="text-align: center;"><?php echo $posicion[5]; ?></td>
                                             <td style="text-align: center;"><?php echo $total; ?></td>
                                </tr>

                    <?php          $cuotas = $posicion[4] + $posicion[5];
                            $t_cuotas = $t_cuotas + $cuotas;
                            $contador++;} ?>
                </tbody>
            </table><br>
                        <b>Deuda Total X Filtro:</b>  <b style="color:red;">S/. <?php echo number_format($t_cuotas,2); ?></b>
            <div id="grafico" style="width:auto">
              <center><object type="text/html" data="<?php echo base_url();?>migracion/migracion/vergrafico/<?php echo $capitulo."/".$a."/".$b?>" width="800" height="500"> </object></center>
            </div>               
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No Existe deuda para listar </div>";
        }
        ?>

    </div>  
   
</div>
