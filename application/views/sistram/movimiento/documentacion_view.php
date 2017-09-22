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
            
             <tr>
                <td>
                    <label style="font-weight: bold" for="Multimedia">Archivos Adjuntos:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td >
                      <?php  foreach($multimedia as $multi){ ?>
                    <a style="color:blue" target="_blank" href="<?php echo base_url().$multi->cMultimediaLink;?>" ><?php echo $multi->cMultimediaDescripcion?></a><br>
                      <?php } ?>
                </td>    
            </tr>
    </table>
    
        
    </fieldset>        
        
</div>
    