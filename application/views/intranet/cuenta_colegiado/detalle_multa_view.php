    <div class="control-group" >  
<div class="box">
            <div class="box-head tabs">
                <h3 style="color: #000080;">Listado de Multas</h3> 
            </div><br>
            <div class="box-content box-nomargin">
                <div class="tab-content">
                    <div class="tab-pane active" id="nohead">
                        <table class='table table-striped dataTable dataTable-noheader table-bordered'>
                            <thead>
                                <tr>
                                    <th><strong>Nro</strong></th>
                                    <th><strong>Codigo</strong></th>
                                    <th><strong>Descripcion Multa</strong></th>
                                    <th><strong>Monto</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!isset($registros)){
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
                                        foreach($registros as $row): 
                                        ?>
                                    <tr>
                                        <td>
                                            <center><?php echo $cont++;?></center>
                                        </td>
                                        <td>
                                            <?php echo $row["codelec"];?>
                                        </td>
                                        <td>
                                            <?php echo $row["motelec"];?></td>
                                        <td> <?php echo $row["multelec"];?></td>
                                    </tr> 
                                <?php 
                                        endforeach; 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>