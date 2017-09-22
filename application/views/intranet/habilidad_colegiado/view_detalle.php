<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
                            <?php 
                             if(($habilidad ==2) || ($habilidad ==4)){
                             ?>
                              <table  class="display" cellpadding="0" cellspacing="0" border="0">
                                  
                                    <tbody>
                <tr>
                    <td colspan='3' style="text-align: center;color:purple;"><strong><font size="2">Colegiado Usted se encuentra en proceso de fraccionamiento, es por ello que posee una deuda pendiente. </strong></td>
                                </tr>
                             </table><?php 
                             
                             }
                       

                            if ($bandeja > 0) {
                                
                                for($x=0;$x<count($bandeja);$x++){
                                    for($i=0;$i<count($deudasaño);$i++){
                                    if($bandeja[$x]['año'] == $deudasaño[$i]['año']){
                                        $bandeja[$x]['cuenta'] = $deudasaño[$i]['cuenta'];
                                    }
                                }
                                }
                              
                                ?>
                                <table id="BandejaCuenta-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                      <thead>
                                        <tr>
                                            <th style="text-align: center;">Año</th><!--Estado-->
                                            <th style="text-align: center;">Deuda</th>
                                            <th style="text-align: center;">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       foreach($bandeja as $bandeja){
                                      ?>
                                        <tr>
                                                <td style="text-align: center;"><?php echo $bandeja["año"]; ?></td><!--Estado-->
                                            <td style="text-align: center;"><?php if($bandeja["cuenta"] > 0){echo "<font color=red> S/. ".$bandeja["cuenta"]."</font>";}else{ echo "S/. ".$bandeja["cuenta"].".00";} ?></td>
                                                <td style="text-align: center;" class="tip" data-toogle="toltip" data-title="Ver detalle" onclick="mostrar_meses(<?php echo $bandeja["año"]; ?>);"><a href="#"> <img title='Ver detalle' src='<?php echo base_url(); ?>img/tramint/ver.png' width='20' height='20'> </A></td>
                                            
                                                
                                                
                                            </tr>
                                        <?php 
                                       }
                                                         ?>

                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "No se encontraron registros";
                            }
                            ?>

                        </div>      </div> 
                    <br>
                    <br>
                  
                                <table  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Detalle</th><!--Estado-->
                                            <th style="text-align: center;">Monto</th>
                                            <th style="text-align: center;">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                    <?php 
                        ?>

                        <?php foreach ($reporte_deuda as $reporte_deuda) {
                            if($reporte_deuda["Deuda"] == NULL){
                                $reporte_deuda["Deuda"] = 0;
                            }
                                if($reporte_deuda["Deuda"] < 0){
                                    $reporte_deuda["Deuda"] = 0;
                                }
                            ?>
                            <td style="text-align: center;">Deuda de Cuotas: </td><td style="text-align: center;">S/.<?php echo $reporte_deuda["Deuda"]; ?>.00</td>
                            <td></td>
                                </tr>
                               
                        <?php $cuota1 = $reporte_deuda["Deuda"];  }
                        
                        foreach ($reporte_multa as $reporte_multa) {?>
                    <tr>
                        <td style="text-align: center;">Monto Multa: </td>
                                <?php
                                if ($reporte_multa['multa'] == null) {
                                    ?>
                                    <td style="text-align: center;">S/.0.00</td>
                                    <td style="text-align: center;"><button id="verdeudas"class="btn btn-danger" onclick="ver_multas('<?php echo $cip; ?>');"><span> Ver Multas</span></button></td>
                                    <?php
                                 $multa1 = 0;
                                } else {
                                    $multa1 = $reporte_multa["multa"];
                                    ?>

                                    <td style="text-align: center;">S/.<?php echo $reporte_multa["multa"]; ?>.00 </td><td style="text-align: center;"><button id="verdeudas"class="btn btn-danger" onclick="ver_multas('<?php echo $cip; ?>');"><span> Ver Multas</span></button></td>

                                    <?php
                                } }
                                ?>
                    </tr>
                    <tr>

                        <?php foreach ($reporte_deudacol as $reporte_deudacol) {
                            if($reporte_deudacol["saldo"] != NULL){
                            ?>
                            <td style="text-align: center;">Monto Deudas: </td><td style="text-align: center;">S/.<?php echo $reporte_deudacol["saldo"]; ?>.00</td>
                            <td style="text-align: center;"><button id="verdeudas"class="btn btn-danger" onclick="ver_deudas('<?php echo $cip; ?>');"><span> Ver Deudas</span></button></td>
                            <?php 
                            $deuda1 = $reporte_deudacol["saldo"];
                            }else{ 
                            $deuda1 = 0;
                            ?>
                            <td style="text-align: center;">Monto Deudas: </td><td style="text-align: center;">S/. 0.00</td>
                            <td style="text-align: center;"><button id="verdeudas"class="btn btn-danger" onclick="ver_deudas('<?php echo $cip; ?>');"><span> Ver Deudas</span></button></td>    
                            <?php } ?>
                                </tr>
                        <?php }
                        
                        $total1 = $cuota1 + $deuda1 + $multa1;
                        ?>
                                <tr>
                                    <td style="text-align: center;background-color: #F2F5A9;"><strong>Total a Pagar: </strong></td>
                                    <?php if( $total1 > 0){ ?>
                                    
                                     <td style="text-align: center;color:red;background-color: #F2F5A9;"><strong>S/. <?php echo $total1; ?>.00 </strong></td>
                                     <td style="background-color: #F2F5A9;"></td>
                                </tr>    
                                <tr>
                                    <td colspan='3' style="text-align: center;color:red;"><strong><font size="4">IMPORTA: Colegiado debe arreglar sus Pagos <a href="#" onclick="MostrarNota();return false;" ><img src="http://www.cip-trujillo.org/ver_aqui.png"></a></strong></td>
                                </tr>
                </table>
                                    <?php }else{?>
                     <td style="text-align: center;color:green;background-color: #F2F5A9;"><strong>S/. <?php echo $total1; ?>.00</strong> </td>
                                     <td style="background-color: #F2F5A9;"></td>
                                </tr>    
                                <tr>
                                    <td colspan='3' style="text-align: center;color:green;"><strong><font size="4">Colegiado esta al d&iacute;a en sus Pagos</strong></td>
                                </tr>
                </table>
                                    <?php }?>
                        
                                                                 
                             <?php
                             
//                                    }
                                    ?>
                </div>
            </div>
        </div>
    </div>
</div>