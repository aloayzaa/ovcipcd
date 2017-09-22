<html>
    <style>
        li{
            margin:10px;
        }
         .warning {
                border-color: #fceb77;
                background-color: #fff6bf;
                background-repeat: no-repeat;
                background-position: 12px 10px;
            }
            .info, .warning, .error, .success {
                color: #2b2b2b;
                /*corner*/
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
            }
            .info h4, .warning h4, .error h4, .success h4 {
                font-size: 1em;
                line-height: 1em;
                letter-spacing: -.02em;
                padding: 0;
                margin: 0 0 .3em 0;
            }
             .warning strong, .warning a {
                color: #957210;
            }
            .info, .warning, .error, .success {
                border: 1px solid #ccc;
                display: block;
                height: auto;
                clear: both;
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                padding-left: 38px;
                margin-top: 10;
                margin-right: 0;
                margin-bottom: 10;
                margin-left: 0;
            }
            .info li, .warning li, .error li, .success li {
                padding: 0;
                margin-bottom: .4%;
                font-size: 0.8em;
                line-height: 1.1em;
                vertical-align: top;
            }
            #linea{
                border-left: 1px solid black;
                margin-left: 60px;
            }
            ul{
                list-style-type:square;
            }
        </style>


    <body>
<img style="position:absolute;left:50px" width="80" height="80" src="./uploads/logo_cip.png">
                                                  
 <?php  $var="";if (count($directivo) > 0) {
            ?>
<h3 style="text-align: center;text-decoration: underline">Detalle Expediente: <?php echo $directivo->nExpedienteCodigo ?></h3> 
<br>
<br>
<br>
<table style="padding-left:60px;padding-right: 50px">
    <tr>
        <td style="font-weight: bold">Solicitante: </td>
        <td><?php echo $directivo->solicitante?> </td>
    </tr>
     <tr>
        <td style="font-weight: bold">Sumilla: </td>
        <td><?php echo $directivo->cExpedienteSumilla?> </td>
    </tr>
      <tr>
        <td style="font-weight: bold">Contenido: </td>
        <td><?php echo $directivo->cExpedienteAsunto?> </td>
    </tr>
    <tr>
        <td style="font-weight: bold">Folios: </td>
        <td><?php echo $directivo->cExpedienteFolios?> </td>
    </tr>
    
    
    
</table>
<hr style="background-color: black; height: 0.3px;">
<!-- BEGIN CONTAINER -->
 <!-- BEGIN PAGE CONTAINER-->
    
     <div id="linea">
        
          <ul >
                   
            <?php if($movimientos>0){
                 $i=0; foreach ($movimientos as $movimiento){ ?>
                    <li> 
                    <?php $i++;if($i==1){
                            $fecha_envio=$movimiento->dMovimientoFechaRecepcion;
                            }
                             if($movimiento->dMovimientoFechaAtencion!=NULL){
                                $fecha_movimiento= $movimiento->dMovimientoFechaAtencion;
                            }
                            else {
                           
                                $fecha_movimiento= $movimiento->dMovimientoFechaRecepcion;
                            }
                            
                            ?>
                        
                         <table>
                                      <tr>
                                          <td>
                                              Área: 
                                          </td>
                                          <td style="font-weight: bold">
                                              <?php echo $movimiento->receptor?>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              Fecha : 
                                          </td>
                                          <td style="font-weight: bold">
                                              <?php echo $fecha_movimiento?>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              Estado : 
                                          </td>
                                          <td style="font-weight: bold">
                                              <?php echo $movimiento->cMovimientoEstado;?>
                                          </td>
                                      </tr>
                                        <tr>
                                          <td>
                                              Observación : 
                                          </td>
                                          <td style="font-weight: bold">
                                              <?php echo $movimiento->cMovimientoResumen;?>
                                          </td>
                                      </tr>
                                   
                        </table>  
                       </li>
            
                      
                 <?php } ?>
                     
            <?php } ?>          
           
               <?php if($directivo->nEstadoProveido>0){ ?>
            <li> 
                <table>
                    <tr>
                        <td>
                           Área: 
                        </td>
                        <td style="font-weight: bold">
                          V°B° <?php if($directivo->nEstadoProveido==1){echo "Directivo";}else {echo "Administrador";} ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Fecha : 
                        </td>
                        <td style="font-weight: bold">
                          <?php echo $directivo->cFechaCambio;?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Estado : 
                        </td>
                        <td style="font-weight: bold">
                             <?php if($directivo->cExpedienteEstado == ''){echo "No Procesado";}else {echo $directivo->cExpedienteEstado;}?>
                        </td>
                    </tr>
                     <tr>
                        <td>
                           Observación : 
                        </td>
                        <td style="font-weight: bold">
                        <?php echo $directivo->cExpedienteObservacion;?>
                        </td>
                    </tr>
                </table>   
           
            </li>
               <?php } ?>
            <li> 
                <table>
                    <tr>
                        <td>
                           Área: 
                        </td>
                        <td style="font-weight: bold">
                          Mesa de Partes  
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Fecha de Registro: 
                        </td>
                        <td style="font-weight: bold">
                          <?php echo $directivo->cExpedienteFechaRegistro;?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Estado: 
                        </td>
                        <td style="font-weight: bold">
                          Registrado
                        </td>
                    </tr>
                    
                </table>
            </li>

          </ul>

      <!-- END PAGE -->
    </div>

 <?php }else { ?>
 <br><br><br><br>
    <div class='warning'><h4 class='alert-heading'>Información!</h4>No existen expediente</div>
 
  <?php }?>
    
     <div style="position:fixed;top:990px;left:60px" >
        <h5><b>Colegio de Ingenieros del Perú CD. La Libertad -- Francisco Borja Nro 250 Urb. La Merced - Trujillo</b></h5>
        
     </div>
           
         
 
<!-- END CONTAINER -->
</body>