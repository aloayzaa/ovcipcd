<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsCuentaColegiado.js" charset=UTF-8"></script>

<div id="ContenedorGeneralCuenta">
    <div class="content">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Detalle Económico <i>Colegiado CIP-CDLL</i></h3>
                </div>
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <h3>Detalle de Cuenta CIP-CDLL</h3>
                            <?php if ($bandeja > 0) { ?>
                                <table id="BandejaCuenta-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Año</th><!--Estado-->
                                            <th>MONTO TOTAL CUOTAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bandeja as $bandeja) {//1
                                            ?>
                                            <tr>
                                                 <td style="width: 10px;text-align: center;"><?php echo $bandeja["año"]; ?></td>
                                                <td style="width: 10px;text-align: center;"><?php echo $bandeja["valor"]; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "No se encontraron registros";
                            }
                            ?>

                        </div>      </div> 
                        <br>
                        <!------------------------------------------------------------------------------------------->
                        <div id="Tabs_RegistroNuevo2">
                        <h3>Detalle de Pagos CIP-CDLL</h3>
                        <div class="form" style="width: 100%">
                            <?php if ($bandeja2 > 0) { ?>
                                <table id="BandejaPagos-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th><!--Estado-->
                                            <th>AÑO</th>
                                            <th>MES</th>
                                            <th>FECHA PAGO</th>
                                            <th>CUOTA</th>
                                            <th>DESCUENTO</th>
                                            <th>Monto Pagado</th>
                                            <th>Estado</th>
                                            <th>Otros</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bandeja2 as $bandeja2) {//1
                                            ?>
                                            <tr>
                                                <td><?php echo $bandeja2["codcuota"]; ?></td>
                                                <td><?php echo $bandeja2["año"]; ?></td>
                                                <td><?php echo $bandeja2["NombreMes"]; ?></td>
                                                <td><?php echo $bandeja2["fechapago"]; ?></td>
                                                <td><?php echo $bandeja2["vPagos"]; ?></td>
                                                <td><?php echo $bandeja2["descuento"]; ?></td>
                                                <td><?php echo $bandeja2["TotalPago"]; ?></td>
                                                    <?php  if ($bandeja2['estado'] == 'P') {
                                              echo " <td>Pagado</td>";
                                              } else {
                                              echo " <td>Deuda</td>";
                                                   } ?>
                                                <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Ver detalle' src='" . base_url() . "img/tramint/ver.png' width='20' height='20' onClick=verDetPagos(" . "\"" . $bandeja2["año"] . "\"" . "," . "\"" . $bandeja2["mes"] . "\"" . ")></td>"; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php
                            } else {
                                echo "No tiene ningun pago realizado al CIP-CDLL.";
                            }
                            ?>
              </div>
                        </div>  
                        <br>
                                  <?php foreach ($reporte as $reporte) {
                                            ?>
                            <h3>Pagos Total Cuotas: <i>S/.<?php echo $reporte["Pagos"]; ?></i></h3>
                                        <?php } ?>
                        <!------------------------------------------------------------------------->
                                                <?php foreach ($reporte_deuda as $reporte_deuda) {
                                            ?>
                        <h3>Monto Deuda: <i>S/.<?php echo $reporte_deuda["Deuda"]; ?></i>
                         - <i><?php echo $reporte_deuda["Mensaje"]; ?></i>
                        </h3>
                               <?php  echo "<div style='cursor:pointer;'><img title='Ver Deuda' src='" . base_url() . "img/boton_ver_detalle.png' width='80' height='30' onClick=verDetalleDeuda(" . "\"" . $reporte_deuda["regcol"] . "\")>";  ?>                                       
                                        <?php } ?>

                        <!-------------------------------------------------------------------------->
                                                           <?php foreach ($reporte_multa as $reporte_multa) {
                                            ?>
                        <br>
                        <h3>Monto Multa: <i>
                                     <?php  if ($reporte_multa['multa'] == null) {
                                              echo "S/.0";
                                              } else {
                                                echo"S/.";
                                                echo $reporte_multa["multa"];
//                                               echo "&nbsp&nbsp&nbsp";
                                                echo"<br>";
                                               echo "<div style='cursor:pointer;'><img title='Ver Detalle' src='" . base_url() . "img/boton_ver_detalle.png' width='80' height='30' onClick=verDetalle(" . "\"" . $reporte_multa["regcol"] . "\")>"; 
                                                echo "</div>";   
                                               } ?>
                            </i>
                        </h3>
                                        <?php } ?>
      
                </div>
            </div>
        </div>
    </div>
    </div>


<?php $this->load->view('dashboard/footer'); ?>



