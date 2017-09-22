<div> 
    <legend><strong>Expediente <?php echo $expediente->nExpedienteCodigo?></strong></legend> 
    <table>
            <tr>
                <td class='controls'><label style="font-weight: bold" for="txt_solicitante">Solicitante:&nbsp;&nbsp;&nbsp;</label>
                </td>
                <td class='controls' > <?php echo form_label(mb_convert_encoding($expediente->solicitante, "UTF-8"),'txt_solicitante'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label style="font-weight: bold" for="txt_tipo_expediente">Tipo Exp:&nbsp;&nbsp;&nbsp;</label> 
                </td>    
                <td>
                    <?php echo form_label(mb_convert_encoding($expediente->cTipexpedienteDescripcion, "UTF-8"),'txt_tipo_expediente'); ?>
                </td>    
            </tr>
             <tr>
                <td>
                     <label style="font-weight: bold" for="txt_tramite">Tramite:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                     <?php echo form_label(mb_convert_encoding($expediente->cTramiteTitulo, "UTF-8"),'txt_tramite'); ?>
                </td>    
            </tr>
             <tr>
                <td>
                    <label style="font-weight: bold" for="txt_asunto">Contenido:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                    <?php echo form_label(mb_convert_encoding($expediente->cExpedienteAsunto, "UTF-8"),'txt_asunto'); ?>
                </td>    
            </tr>
            <?php if($derivadoareas>0){ ?>
            <tr>
                <td>
                    <label style="font-weight: bold" for="txt_asunto">Estado:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                    <table class="table">
                        
                        <tr>
                            <th style="text-align: center;">Area</th>
                            <th style="text-align: center;">Estado</th>
                            <th style="text-align: center;">Comentario</th>
                        </tr>
                     
                        <tbody>
                    <?php  foreach($derivadoareas as $derivado) { 
                        
                        if($derivado->cMovimientoEstado=='En Tramite'){
                            echo '<tr style="background-color: #c09853;">';
                        }
                        else if($derivado->cMovimientoEstado=='Procesado'){
                            echo '<tr style="background-color: #dff0d8;">';
                        }
                       
                                         ?>
                            <td style="text-align: center;">
                                <?php echo $derivado->cDescripcionCargo; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $derivado->cMovimientoEstado; ?>
                            </td>
                            <td >
                                <?php echo $derivado->cMovimientoResumen; ?>
                            </td>
                        </tr>
                         
                        

                      <?php }?>
                        </tbody>
                    </table>    
                </td>    
            </tr>
            <?php } ?>
            
            <tr>
                <td>
                    <label style="font-weight: bold" for="Multimedia">Archivos Adjuntos:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td >
                      <?php  foreach($multimedia as $multi){ ?>
                      <a style="color:white" class="btn btn-info" target="_blank" href="<?php echo base_url().$multi->cMultimediaLink;?>" ><?php echo $multi->cMultimediaDescripcion?></a>
                 
                       <?php } ?>
                      
                </td>    
            </tr>
      <?php
$txt_area_proceso = array(
    'name' => 'txt_area_proceso',
    'id' => 'txt_area_proceso',
    "cols" => "205", 
    "rows" => "5", 
    "placeholder" =>"Resumen del proceso realizado (Opcional)",
    "style"=> "width: 301px;");



?>                  
             <tr>
                <td>
                    <label style="font-weight: bold" for="txt_asunto">Comentario de Proceso:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td> <br>
                     <?php echo form_textarea($txt_area_proceso); ?>
                </td>    
            </tr>
            
    </table>
    
    <!-- <br><table>
            <tr>
                <td>
                    <label style="font-weight: bold" for="txt_asunto">Comentario de Proceso:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                     <?php //echo form_textarea($txt_area_proceso); ?>
                </td>    
            </tr>
    </table>      -->
        <div class="control-group"> 
            <div class="controls">
                <button class="btn btn-success" onclick="procesar_view()">Procesar Expediente</button>
                 <button class="btn btn-warning" onclick="observar_view()">Observar Expediente</button>
                  <button class="btn btn-danger" onclick="faltan_firmas_view()">Faltan Firmas</button>
            </div>
            <div class="controls" id="procesar"></div>
            
        </div>
    </fieldset>        
        
</div>
    