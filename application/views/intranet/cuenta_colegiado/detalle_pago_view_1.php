    <div class="control-group" >  
<div class="box">
            <div class="box-head tabs">
                <h3 style="color: #000080;">Listado de Pagos</h3> 
            </div><br>
            <div class="box-content box-nomargin">
                <div class="tab-content">
                    <div class="tab-pane active" id="nohead">
                        <table class='table table-striped dataTable dataTable-noheader table-bordered'>
                            <thead>
                                <tr>
                                    <th><strong>Nro</strong></th>
                                    <th><strong>Codigo</strong></th>
                                    <th><strong>Descripcion</strong></th>
                                    <th><strong>Valor Cuota</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!isset($detalle)){
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <center>
                                                    <i>No se encontraron Registros</i>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    else{
                                        $cont=1;
                                        foreach($detalle as $row): 
                                        ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $cont++;?></center>
                                        </td>
                                        <td>
                                            <?php echo $row["codctaing"];?>
                                        </td>
                                        <td>
                                            <?php echo $row["descctaing"];?></td>
                                        <td> <?php echo $row["valorcuota"];?></td>
                                    </tr> 
                                <?php 
                                        endforeach; 
                                    }
                                ?>
                            </tbody>
                        </table>
                        <br>
                               <?php foreach ($monto as $monto) {
                                            ?>
                         <div> <p style="color: #d90004;font-size: 17px;"><b>Monto Total:</b> <?php echo $monto["monto"];?></p></div>
                                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        </div>