<?php

$txt_ins_observacion = array(
    'name' => 'txt_ins_observacion',
    'id' => 'txt_ins_observacion',
    "cols" => "205", 
    "rows" => "5", 
    "style"=> "width: 501px;resize:none",
    'required' => 'required');

$boton = array('name' => 'btn_upd_notempre',
    'type' => 'submit', 
    'value' => 'Derivar Expediente', 
    'id="btn_upd_notempre" class="btn btn-primary"');

?>
<div > 
    <legend><strong>Expediente <?php echo $expediente->nExpedienteCodigo?></strong></legend> 
    <input type="hidden" value="<?php echo $expediente->nExpedienteId?>" id="hid_expedienteId">
      <table>
             <tr class="alto">
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
            <tr >
                <td>
                     <label style="font-weight: bold" for="txt_tramite">Tramite:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                     <?php echo form_label(mb_convert_encoding($expediente->cTramiteTitulo, "UTF-8"),'txt_tramite'); ?>
                </td>    
            </tr>
            <tr >
                <td>
                    <label style="font-weight: bold" for="txt_asunto">Contenido:&nbsp;&nbsp;&nbsp;</label>
                </td>    
                <td>
                     <p style="text-align: justify; width: 90%"> <?php echo (mb_convert_encoding($expediente->cExpedienteAsunto, "UTF-8")); ?> </p>
                </td>    
            </tr>
            <tr >
                <td>
                    <label style="font-weight: bold" for="cbo_areas_a_derivar">Área a derivar:</label> 
                </td>
                <td>  
                    <select id="cbo_areas_a_derivar">
                        <?php foreach($areasderivar as $area) {  ?>
                        <option value="<?php echo $area->nAreasId;?>"><?php echo $area->cDescripcionCargo;?></option>

                        <?php } ?> 
                    </select>                    
                </td>
                
            </tr>
             <tr >
                <td>
                    <label style="font-weight: bold" for="cbo_estado">Estado: </label> 
                </td>
                <td> 
                    <input id="cbo_estado" type="text" value="En Tramite" disabled /> 
                                    
                </td>
                
            </tr>
            <tr >
                <td>
                    <label style="font-weight: bold" for="cbo_estado">Observación: </label> 
                </td>
                <td>  
                    <?php echo form_textarea($txt_ins_observacion); ?>
                         
                </td>
                
            </tr>
            <tr >
                <td>
                    <label style="font-weight: bold" for="cbo_estado">Visto Bueno: </label> 
                </td>
                <td>  
                    <input type="checkbox" id="chk_visto_bueno">
                </td>
                
            </tr>
            
            <tr >
                <td>
                    <label style="font-weight: bold" for="chk_ultima_derivacion">Ultima derivación: </label> 
                </td>
                <td>  
                    <input type="checkbox" id="chk_ultima_derivacion">
                </td>
                
            </tr>
            
      </table>    
                  
        
        <br><br>
        
        <div class="control-group"> 
            <div class="controls">
                 <button class="btn btn-primary" onclick="derivarexpediente()">Derivar Expediente</button>
            </div>
            <div class="controls" id="derivar_cargando"></div>
            
        </div>
    
        
</div>
    