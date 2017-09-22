<div class="row-fluid">
        <div class="box">
            <div class="box-head tabs">
                <h3>Archivos Multimedia</h3>
            </div>
            <div class="box-content box-nomargin">

                    <?php if ($bandeja > 0) { ?>
                        <center><table class='table table-striped dataTable dataTable-noheader dataTable-nofooter table-bordered'>

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                     <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bandeja as $bandeja) {//1
                                    ?>
                                    <tr>
                                        <td style="width: 10px;text-align: center;"> <?php echo $bandeja["nMatMultID"]; ?></td>
                                        <?php
                                        if ($bandeja['cTipoMult'] == 'T') {
                                            echo " <td style='width: 10px;text-align: center;'><center><a  title='Foto actual' target='_blank' href='../uploads/biblioteca/tesis/" . $bandeja["cMatLink"] . "' class='fancybox'><img style='max-width:95%;' src='../uploads/biblioteca/tesis/" . $bandeja["cMatMultimedia"] . "' width='80' height='50'></a></center></td>";
                                        } else {
                                            echo " <td style='width: 10px;text-align: center;'><center><a  target='_blank'  href='../uploads/biblioteca/abstract/" . $bandeja["cMatLink"] . "' target='_blank'><img style='max-width:95%;' src='../uploads/biblioteca/abstract/" . $bandeja["cMatMultimedia"] . "' width='80' height='50'></a></center></td>";
                                        }
                                        ?>
                                               <?php
                                        if ($bandeja['cTipoMult'] == 'T') {
                                            echo " <td style='width: 10px;text-align: center;'><center><p><strong>TESIS</strong></p></center></td>";
                                        } else {
                                            echo " <td style='width: 10px;text-align: center;'><center><p><strong>ABSTRACT</strong></p></center></td>";
                                        }
                                        ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table></center>
                        <?php
                    } else {
                        echo "No se encontraron registros";
                    }
                    ?>


            </div>
        </div>  
    </div>