<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<div id="ContenedorGeneralCuenta">
    <div class="content">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Maya de Cuotas por Año <i>Colegiado CIP-CDLL</i></h3>
                </div>
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <h3>Detalle de Cuenta CIP-CDLL</h3>
                            <table id="BandejaCuenta-Lista"  style="width: 100%" class="display" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Año</th><!--Estado-->
                                        <th style="text-align: center;">Ene</th>
                                        <th style="text-align: center;">Feb</th>
                                        <th style="text-align: center;">Mar</th>
                                        <th style="text-align: center;">Abr</th>
                                        <th style="text-align: center;">May</th>
                                        <th style="text-align: center;">Jun</th>
                                        <th style="text-align: center;">Jul</th>
                                        <th style="text-align: center;">Ago</th>
                                        <th style="text-align: center;">Set</th>
                                        <th style="text-align: center;">Oct</th>
                                        <th style="text-align: center;">Nov</th>
                                        <th style="text-align: center;">Dic</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 10px;text-align: center;background-color: gray;"><font color="white"><strong><?php echo $año; ?></strong></font></td>
                                        <?php
                                        $añoactual = date('Y');
                                        $mesactual = date('m');

                                        $contador = 0;
                                        $mesnum = 0;
                                        foreach ($qrymeses as $qrymeses) {
                                            $mesnum ++;
                                            if ($qrymeses->Pago > 0) {
                                                if ($qrymeses->Exo > 0) {
                                                     $conta = 0;
                                                    ?>
                                                    <td style="width: 10px;text-align: center;background-color: yellow">s/.<?php echo $qrymeses->Exo ?>.00</td> 
                                                    <?php
                                                } else {
                                                     $conta = 0;
                                                    ?>

                                                    <td style="width: 10px;text-align: center;background-color: greenyellow">s/.<?php echo $qrymeses->Valor ?></td> 


                                                    <?php
                                                }
                                            } else {

                                                if ($qrymeses->Valor > 0) {
                                                    
                                                    if ($añoactual == $año) {
                                                        if ($mesactual >= $mesnum) {
                                                            $conta=$qrymeses->Valor;
                                                            ?>
                                                            <td style="width: 10px;text-align: center;background-color: red;">s/.<?php echo $qrymeses->Valor ?></td> 

                                                            <?php } else {
                                                                 $conta = 0;
                                                            ?>
                                                            <td style = "width: 10px;text-align: center;"> - </td>
                                                            <?php
                                                        }
                                                    } else {
                                                        $conta=$qrymeses->Valor;
                                                        ?>
                                                        <td style="width: 10px;text-align: center;background-color: red;">s/.<?php echo $qrymeses->Valor ?></td> 

                                                    <?php }
                                                }else {
                                                    $conta = 0;
                                                        ?>
                                                        <td style="width: 10px;text-align: center;"> - </td> 
                                                        
                                                        <?php
                                            }
                                            
                                                
                                                
                                            }
                                            $contador = $contador + $conta;
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <p align="center">En el año <strong> <?php echo $año ?> </strong>usted tiene una deuda de <strong>S/. <?php echo $contador ?>. </strong></p>

                        </div>      </div> 
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>