<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
?>
<div align="center">
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;width:600px">
    

        <div class="box">
            <div class="box-head tabs">
                <h3>Todas mis deudas actuales</h3>
            </div>
            <div class="box-content box-nomargin">
                <table class='table table-striped dataTable dataTable-noheader dataTable-nofooter table-bordered'>
                    <thead>
                        <tr>
                            
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($deudas != 1) {
                                $acumm = 0;
                            foreach ($qrydeudas as $fila) {
                                $acumm = $acumm + $fila->saldodeu;
                                ?>
                                <tr>
                                    
                                    <td><?php echo $fila->coddeuda ?></td>
                                    <td><?php echo $fila->motivdeuda ?></td>
                                    <td>S/. <?php echo $fila->saldodeu ?></td>

                                </tr>
                           
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Usted no tiene ninguna deuda actual</td>
                        </tr>
                        
                    <?php } ?>
                         </tbody>
                            <?php if($deudas != 1){?>
                            <tfoot>
                                <tr>
                                   
                                    <td colspan="2"><div align="right">Total a pagar:</div></td>
                                    <td>S/. <?php echo $acumm ?></td>
                                </tr>
                            </tfoot>
                            <?php } ?>


                </table>
            </div>

        </div>

    </div>
</div>	
</div>
</div>	
</div>
</div>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>