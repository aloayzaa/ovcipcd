<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
?>
<div align="center">
<div class="box-head" style="border-style:solid;border-color: #B7B7B7;width:600px">
    

        <div class="box">
            <div class="box-head tabs">
                <h3>Todas mis multas actuales</h3>
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
                        if ($multas != 1) {
                                $acumm = 0;
                            foreach ($qrymultas as $fila) {
                                $acumm = $acumm + $fila->multelec;
                                ?>
                                <tr>
                                   
                                    <td><?php echo $fila->codelec ?></td>
                                    <td><?php echo $fila->motelec ?></td>
                                    <td>S/. <?php echo $fila->multelec ?></td>

                                </tr>
                           
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Usted no tiene ninguna multa actual</td>
                        </tr>
                        
                    <?php } ?>
                         </tbody>
                            <?php if($multas != 1){?>
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