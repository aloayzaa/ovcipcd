<?php

$txt_ins_observacion = array(
    'name' => 'txt_ins_observacion',
    'id' => 'txt_ins_observacion',
    "cols" => "500", 
    "rows" => "5", 
    "style"=> "width: 500px;resize:none;",
    'required' => 'required');

$boton = array('name' => 'btn_upd_notempre',
    'type' => 'submit', 
    'value' => 'Derivar Expediente', 
    'id="btn_upd_notempre" class="btn btn-primary"');

?>

<script type="text/javascript">

function agregar(){
    
   var areaagregada=$("#cbo_areas_a_derivar").val();
   var areatext=$("#cbo_areas_a_derivar option:selected").text();
   if(areatext!==''){
      
       $("#js-tabla tr:last").after("<tr id='tabla"+areaagregada+"'><td style='display:none'>"+areaagregada+"</td><td>"+areatext+"</td><td>  <img id='img' style='text-align: center; cursor: pointer;' src='../uploads/eliminar.png' width='20' height='20' onclick='eliminarTabla("+areaagregada+")'></td></tr>");
   $("#cbo_areas_a_derivar").find("option[value='"+areaagregada+"']").remove(); 
  
   }else{
    bootbox.alert("<h3>Ya no existen áreas</h3>");
   
   }

}
function eliminarTabla(area){
     var areaagregada=$("#tabla"+area).find("td").eq(0).html();
     var areatext= $("#tabla"+area).find("td").eq(1).html();
    
    $('#cbo_areas_a_derivar').append('<option value="'+areaagregada+'">'+areatext+'</option>');
    $("#tabla"+area).remove();
 
}
</script>
<style>
    .alto{
        
    }
</style>
<div > 
    <legend><strong>Expediente <?php echo $expediente->nExpedienteCodigo?></strong></legend> 
    <input type="hidden" value="<?php echo $expediente->nExpedienteId?>" id="hid_expedienteId">
    
    <fieldset>
        <table>
             <tr >
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
            </tr >
    
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
                    <label style="font-weight: bold" for="txt_asunto">Área(s) a derivar:</label> 
                </td>
                <td>  
                        <select id="cbo_areas_a_derivar">
                            <?php foreach($areasderivar as $area) {  ?>
                            <option value="<?php echo $area->nAreasId;?>"><?php echo $area->cDescripcionCargo;?></option>

                            <?php } ?> 
                        </select>
                      <button  style="margin-top: -7px;" id="btn_agregar" class="btn btn-primary" onclick="agregar()">Agregar</button>
                      
                      <table id="js-tabla">
                         <tbody>
                             <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                             </tr>  
                          </tbody>
                     </table>
                    
                </td>
                
            </tr>
     
            <tr >
                <td>
                      <label style="font-weight: bold" for="txt_estado">Estado</label>
                </td>
                <td>
                    <input id="cbo_estado" type="text" value="En Tramite" disabled /> 
                 
                </td>
                
            </tr>
  
            <tr >
                <td>
                      <label style="font-weight: bold" for="txt_ins_observacion">Observación:</label>
                </td>
                <td>
                             <?php echo form_textarea($txt_ins_observacion); ?>
                </td>
                
            </tr>
           
        </table>
            
            
        <br><br>
        
        <div class="control-group"> 
            <div class="controls">
                 <button id="derivar_exp" class="btn btn-primary" onclick="derivarexp()">Derivar Expediente</button>
                  <button id="obs_exp" class="btn btn-danger" onclick="enviarMesaPartes(<?php echo $expediente->nExpedienteId?>)">Observar Expediente</button>
            </div>
            <div class="controls" id="derivar_cargando"></div>
            
        </div>
        <div id="msj_custom"></div>
    </fieldset>    
        
</div>
    