<br>
<br>
    
    <div>
        <h3 style="text-align: center">Reporte de eventos <?php echo $nombresmes." del ".$anio?></h3>
           <?php if($eventos_reporte>0) {?>
       <!-- <button onclick="vergrafico()" style="  margin-bottom: 35px;margin-top: -30px;" class="btn btn-danger" id="btn_grafico">Ver Grafico</button> -->
        <div >
         
            <table border="1" >
                <thead style="padding:5px;color:white;background: #006699">
                    <tr style="padding:1em;">
                    <th style="padding:1em;width:20px;">N°</th>
                    <th style="padding:1em;">Evento</th>
                    <th style="padding:1em;">Capítulo</th>
                    <th style="padding:1em;">Fecha de Evento</th>
                    <th style="padding:1em;">Total de Inscripciones</th>
                    <th style="padding:1em;">Total de Asistentes</th>
                    <th style="padding:1em;">Total de Certificados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalinscripciones=0;$totalasistentes=0;$totalcertificados=0;
                    $i=1;foreach($eventos_reporte as $evento){
                        $url[]="['".$evento->cEveTitulo."', ".$evento->inscripciones."', ".$evento->asistentes."', ".$evento->certificado."]";?>
                    <tr>
                        <td style="padding: 1em;text-align: center"><?php echo $i;?></td>
                        <td style="padding: 1em;"><?php echo $evento->cEveTitulo;?></td>
                          <td style="padding: 1em;"><?php echo $evento->nEveTipoEvento;?></td>
                          <td style="padding: 1em;"><?php echo $evento->cFechaEven;?></td>
                        <?php $porcentajeasistentes=  round($evento->asistentes*100/$evento->inscripciones,1);
                              $porcentajecertificados=round($evento->certificado*100/$evento->inscripciones,1);
                           
                              
                        ?>
                        <td style="padding: 1em;text-align: center"><?php $totalinscripciones=$totalinscripciones+$evento->inscripciones; echo $evento->inscripciones;?></td>
                        <td style="padding: 1em;text-align: center"><?php $totalasistentes=$totalasistentes+$evento->asistentes;echo $evento->asistentes;?> - <?php echo $porcentajeasistentes?>%</td>
                        <td style="padding: 1em;text-align: center"><?php $totalcertificados=$totalcertificados+$evento->certificado;echo $evento->certificado;?> - <?php echo $porcentajecertificados?>%</td>
                    </tr>
                                           
                    <?php $i++;} ?>
                    <tr>
                        <td colspan="3"style="padding: 1em;text-align: right">Total</td>
                        <td style="padding: 1em;text-align: center"><?php  echo $totalinscripciones?></td>
                        <td style="padding: 1em;text-align: center"><?php  echo $totalasistentes?></td>
                        <td style="padding: 1em;text-align: center"><?php  echo $totalcertificados?></td>
                        
                    </tr>
                    
                </tbody>
                
            </table>
            <br>
            <div id="grafico" style="width:auto">
              <center><object type="text/html" data="<?php echo base_url();?>busqueda/busqueda/vergrafico/<?php echo $anio."/".$mes?>" width="800" height="500"> </object></center>
              
            </div>
                   
        </div>
            <?php }else {
                 echo "<div style='text-align:center' class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No se encontraron eventos en esta fecha</div>";
       } ?>
        
    <div id="chart_div" style="width:auto"></div>
    </div>
