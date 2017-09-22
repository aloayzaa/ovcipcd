$(document).ready(function() {  
     $(".chzn-select").chosen();
    $('#Tabs_Movimiento').tabs();  //convierte a tabs 
    $('#MovimientoListar').bind('click', function(){
        msgLoading2("#qry_movimiento");
        get_page('movimiento/load_listar_view_movimiento/','qry_movimiento');
    });
    $('#MovimientoProcesados').bind('click', function(){
        msgLoading2("#qry_procesados");
        var anio=$("#anios").val();
        get_page('movimiento/load_listar_view_procesados/'+anio,'qry_procesados');
    });
});

function loadMensajes(){
    var areaid=$("#hid_area_id").val();
    var data={areaid:areaid};
    $.ajax({
	data:  data,
	url:   "movimiento/mensajenovisto",
        type:  'POST',
	success:  function (response) {
            if(response!=="nohay"){
              $("#mensajes_").html(response); 
               $("#mensajes_").show("slow");
            }
	}
   });

}
function listarporanios(){
        msgLoading2("#qry_procesados");
        var anio=$("#anios").val();
        get_page('movimiento/load_listar_view_procesados/'+anio,'qry_procesados');
    
}
function cambiarvisto(movimientoid){
    
      var data={movimientoid:movimientoid};
    $.ajax({
	data:  data,
	url:   "movimiento/cambiarvisto",
        type:  'POST',
	success:  function (response) {
            if(response=='1'){
             $("#mensaje"+movimientoid).hide("slow");
            }
	}
   });
    
}
function derivarexpediente(){
    var expedienteId=$("#hid_expedienteId").val();
    var areaId=$("#hid_area_id").val();
    var areareceptor=$("#cbo_areas_a_derivar").val();
    var observacion=$("#txt_ins_observacion").val();
    var estado=$("#cbo_estado").val();
    var ultimaderivacion;
     if($("#chk_ultima_derivacion").is(':checked')) {
          ultimaderivacion=1;
     }
     else {
          ultimaderivacion=0;
     }
    
    
    if($("#chk_visto_bueno").is(':checked')) {
         var data={expedienteId:expedienteId,
          areaId:areaId,
          areareceptor:areareceptor,
          observacion:observacion,
          estado:estado,
          ultimaderivacion:ultimaderivacion
          };  
           $.ajax({
                type: "POST",
                url: "movimiento/derivarExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#derivar_cargando");
                },
                success: function(msg){
                     $("#derivar_cargando").html("");
                     if(msg.trim()==1){   
                        mensaje("Se ha derivado el expediente correctamente!","e");
                        $("#div_detalle").hide("slow");
                    
                      }
                     else{
                         mensaje("El expediente no se ha derivado correctamente!","r");                        
                     }                    
                },
                error: function(msg){                
                    mensaje("El expediente no se ha derivado correctamente!","r"); 
                     
                }
            });
    } 
    else {  
       bootbox.alert("Chequear Visto Bueno");
    }
}
function notificar_view(){
      var valor=$("#txt_movimiento").val();
      var notificacion=$("#txt_ins_notificacion").val();
      if(notificacion!==''){
           bootbox.confirm("<h3>¿Seguro que desea notificar el expediente?</h3>", function(result) {
          if(result===true){ 
             var data={valor:valor,notificacion:notificacion};
            $.ajax({
                type: "POST",
                url: "movimiento/notificarExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#notificar");
                },
                success: function(msg){
                     $("#notificar").html("");
                     if(msg.trim()==1){   
                        mensaje("Se ha notificado el expediente correctamente!","e");
                        get_page('movimiento/load_listar_view_movimiento/','qry_movimiento');
   
                      }
                     else{
                         mensaje("El expediente no se ha notificado correctamente!","r");                        
                     }                    
                },
                error: function(msg){                
                    mensaje("El expediente no se ha notificado correctamente!","r"); 
                }
            }); 
          }
          
        });
          
      }
      else {
         bootbox.alert("<h3>Realize una descripción de la notificación</h3>");
      }
}
function procesar_view(){
      bootbox.confirm("<h3>¿Seguro que desea procesar el expediente?</h3>", function(result) {
          if(result===true){ 
            var valor=$("#txt_movimiento").val();
    var resumen=$("#txt_area_proceso").val();
      var data={valor:valor,resumen:resumen};
            $.ajax({
                type: "POST",
                url: "movimiento/procesarExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#procesar");
                },
                success: function(msg){
                     $("#procesar").html("");
                     if(msg.trim()==1){   
                        mensaje("El expediente se ha procesado correctamente!","e");
                         $("#div_detalle").hide("slow");
                        get_page('movimiento/load_listar_view_movimiento/','qry_movimiento');
                                            
                    }
                    else{
                        mensaje("El expediente no se ha procesado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El expediente no se ha procesado correctamente!","r"); 
                     
                }
            });      
          }
      });
    
    
}
function verDetalle(expediente){
  
    var areasnoconsiderar=$("#areasno"+expediente).val();
    $("#div_detalle").hide("slow");
     msgLoading("#detalle_exp");
     var rdn=Math.random()*11;
        $.post('movimiento/expedienteGet/'+expediente,{
            rdn:rdn,
             areasnoconsiderar:areasnoconsiderar
        }, function(data){
             $("#div_detalle").show("slow");
             $("#detalle_exp").html(data);
                                 
        });
}
function documentacionExpediente(expediente){
 
    set_popup("movimiento/expedienteDoc/"+expediente,"Información Detallada",500,300,'','');
    

}
function ocultar(div){
    $(div).hide("slow");
}
function procesarExpediente(expediente,movimiento){
    $("#div_procesar").hide("slow");
     msgLoading("#detalle_procesar");
     var rdn=Math.random()*11;
        $.post('movimiento/verExpediente/'+expediente,{
            rdn:rdn
        }, function(data){
             $("#div_procesar").show("slow");
             data=data+'<input type="hidden" value="'+movimiento+'" id="txt_movimiento" name="txt_movimiento">';
             $("#detalle_procesar").html(data);
           
         
               
        });
}
function verNotificacion(nMovimientoId){
     $("#div_notificar").hide("slow");
     msgLoading("#detalle_notificar");
     var rdn=Math.random()*11;
        $.post('movimiento/verNotificacion/'+nMovimientoId,{
            rdn:rdn
        }, function(data){
             $("#div_notificar").show("slow");
             data=data+'<input type="hidden" value="'+nMovimientoId+'" id="txt_movimiento" name="txt_movimiento">';
             $("#detalle_notificar").html(data);
           
         

                                   
        });
}

// funcion de abrir archivos expediente multimedia.
function abrirMultimediaMov(nExpedienteId){
      $('#tablamultimediamov').html("");
      $.ajax({
        type: "POST",       
        url: "movimiento/popupMultimediaExpediente/"+nExpedienteId,
        cache: false,         
        success: function(data) {      
             $('#tablamultimediamov').html(data);
        },
        error: function() {
            msgError('#tablamultimediamov');         
        }               
    });
    msgLoading('#contenidomodalmov');
    get_page('movimiento/recargar','contenidomodalmov');
    $('div.dz-success').remove();
    $("#hid_expedienteId_mov").val(nExpedienteId);
    $('#c_div_multimedia').modal('show');
    
   
}

function observar_view(){
    var resumen=$("#txt_area_proceso").val();
    if(resumen!==''){
        
   
      bootbox.confirm("<h3>¿Seguro que desea observar el expediente?</h3>", function(result) {
          if(result===true){ 
            var valor=$("#txt_movimiento").val();
          
            var data={valor:valor,resumen:resumen};
            $.ajax({
                type: "POST",
                url: "movimiento/observarExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#procesar");
                },
                success: function(msg){
                     $("#procesar").html("");
                     if(msg.trim()==1){   
                        mensaje("El expediente se ha observado correctamente!","e");
                         $("#div_detalle").hide("slow");
                        get_page('movimiento/load_listar_view_movimiento/','qry_movimiento');
                                            
                    }
                    else{
                        mensaje("El expediente no se ha observado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El expediente no se ha observado correctamente!","r"); 
                     
                }
            });      
          }
      });
     }
    else{
        bootbox.alert("<h3>Ingrese un comentario para observar</h3>")
    }
    
}
function faltan_firmas_view(){
    var resumen=$("#txt_area_proceso").val();
    if(resumen!==''){
        
   
      bootbox.confirm("<h3>¿Seguro que desea notificar el expediente?</h3>", function(result) {
          if(result===true){ 
            var valor=$("#txt_movimiento").val();
              var expedienteID = $("#expedienteID").val();
            var data={valor:valor,resumen:resumen};
            $.ajax({
                type: "POST",
                url: "movimiento/falta_invExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#procesar");
                },
                success: function(msg){
                     $("#procesar").html("");
                     if(msg.trim()==1){   
                        mensaje("El expediente se ha notificado correctamente!","e");
                         $("#div_detalle").hide("slow");
                        get_page('movimiento/load_listar_view_movimiento/','qry_movimiento');
                                            
                    }
                    else{
                        mensaje("El expediente no se ha notificado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El expediente no se ha notificado correctamente!","r"); 
                     
                }
            });      
          }
      });
     }
    else{
        bootbox.alert("<h3>Ingrese las areas que faltan ser involucradas</h3>");
        $("#txt_area_proceso").focus();
    }
    
}