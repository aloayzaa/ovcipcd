$(document).ready(function() {  
    $(".chzn-select").chosen();
    $('#Tabs_Decanato').tabs();  //convierte a tabs 
    
    var anio=$("#listadeanios").val();
    get_page('historico/load_listar_view_historico/'+anio,'qry_historico');
    
    
  
    $('#HistoricoListar').bind('click', function(){
        msgLoading2("#qry_historico");
        var anio=$("#listadeanios").val();
        get_page('historico/load_listar_view_historico/'+anio,'qry_historico');
    });
    
});

function listaremitidosporanios(){
         msgLoading2("#qry_historico");
        var anio=$("#listadeanios").val();
        get_page('historico/load_listar_view_historico/'+anio,'qry_historico');
  
}
function expedienteDetalle(expediente){
    /*$("#div_detalle_emitidos").hide("slow");
      var rdn=Math.random()*11;
        $.post('historico/expedienteDetalle/'+expediente,{
            rdn:rdn
        }, function(data){
             $("#div_detalle_emitidos").show("slow");
             $("#detalle_emitidos").html(data);
                                 
        });*/
    set_popup("historico/expedienteDetalle/"+expediente,"Información Detallada",620,480,'','');
   
}


















function evaluarprioridad(){
    var i=0;
      $('#js-tabla tr').each(function () {
        i++;
       
    });
 
    if($("#chk_prioridad").is(':checked')) {
        if(i>2){
         $("#derivar_exp").prop("disabled", true);
         $("#msj_custom").html("<div class=\"alert alert-info\" style=\"background-color:#EED3D7; color:#B94A48; border-color: #EED3D7;\"><strong>El expediente se debe enviar a una sola área.<br>Elimine áreas Por Favor</strong></div>");
         $("#msj_custom").fadeIn(1000);
         $("#msj_custom").fadeOut(10000);
        }
        else {
             $("#msj_custom").html("<div class=\"alert alert-info\" style=\"background-color:#EED3D7; color:#B94A48; border-color: #EED3D7;\"><strong>El expediente tendrá otros V°B°</strong></div>");
         $("#msj_custom").fadeIn(1000);
         $("#msj_custom").fadeOut(10000);
          $("#chk_multiple").prop("disabled", true);
        }
    }
    else {
          $("#derivar_exp").prop("disabled", false);
           $("#chk_multiple").prop("disabled", false);
         
    }
}
function derivarexp(){
    var expedienteId=$("#hid_expedienteId").val();
    var areaId=$("#hid_area_id").val();
    var areasreceptores="";
    
    
    $('#js-tabla tr').each(function () {
        var pk = $(this).find("td").eq(0).html();
        areasreceptores=areasreceptores+pk+",";
       
    });
   var observacion=$("#txt_ins_observacion").val();
    var estado=$("#cbo_estado").val();
    var prioridad;
    if($("#chk_prioridad").is(':checked')) {
       prioridad=1;
    }
    else {
       prioridad=-1;
    }
    var data={
        expedienteId:expedienteId,
        areaId:areaId,
        areareceptor:areasreceptores,
        observacion:observacion,
        estado:estado,
        prioridad:prioridad
    };
    
    if(areasreceptores===','){
     
      bootbox.alert("<h3>Debe agregar área destino</h3>");
   
    }
    else {
        if(prioridad===1){
            if(observacion===''){
               bootbox.alert("<h3>Ingrese Descripción y/o Observación</h3>"); 
               
            }
            else {
                derivar(data);
            }
        }
        else{
            derivar(data);
        }
         
        
     }
}
function derivar(data){
         bootbox.confirm("<h3>¿Seguro que desea derivar el expediente?</h3>", function(result) {
              if(result===true){ 
                $.ajax({
                type: "POST",
                url: "decanato/derivarExpediente",
                data: data,
                beforeSend:function(){
                      msgLoading("#derivar_cargando");
                },
                success: function(msg){
                     $("#derivar_cargando").html("");
                     if(msg.trim()==1){   
                        mensaje("Se ha derivado el expediente correctamente!","e");
                         $("#div_detalle").hide("slow");
                             get_page('decanato/load_listar_view_decanato/','qry_expedientes');
  
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
         }); 
}

function verDetalle(expediente){
    var areasnoconsiderar=$("#areasno"+expediente).val();
    $("#div_detalle").hide("slow");
     msgLoading("#detalle_exp");
     var rdn=Math.random()*11;
        $.post('decanato/expedienteGet/'+expediente,{
            rdn:rdn,
            areasnoconsiderar:areasnoconsiderar
        }, function(data){
             $("#div_detalle").show("slow");
             $("#detalle_exp").html(data);
            if(data!=2){
                  // mensaje("Detalle mostrado correctamente!","e");

            }else{
                mensaje("Error inesperado, no se pudo listar el expediente!","r");
            }                        
        });
}
function ocultar(div){
    $(div).hide("slow");
}
function enviarMesaPartes(expediente){
     bootbox.confirm("<h3>¿Seguro que desea enviar el expediente a Mesa de Partes?</h3>", function(result) {
          if(result===true){
                var data={expediente:expediente};
            $.ajax({
                    type: "POST",
                    url: "decanato/enviarMesaPartes",
                    data: data,
                    success: function(msg){
                        if(msg.trim()==1){   
                            mensaje("Se ha enviado el expediente correctamente!","e");

                            get_page('decanato/load_listar_view_decanato/','qry_expedientes');

                        }
                         else{
                             mensaje("No se ah enviado el expediente correctamente!","r");                        
                         }                    
                    },
                    error: function(msg){                
                        mensaje("No se ah enviado el expediente correctamente!","r"); 
                    }
                });
   
          }
      });

}
function darBajaNotificacion(expediente){
   var prioridad=$("#prioridad"+expediente).val();
   
       bootbox.confirm("<h3>¿Seguro que no desea ver la notificación?</h3>", function(result) {
          if(result===true){
                 var data={expediente:expediente,prioridad:prioridad};
     $.ajax({
                type: "POST",
                url: "decanato/darBajaNotificacion",
                data: data,
                success: function(msg){
                       if(msg.trim()==1){   
                        mensaje("Se ha dado de baja la notificacion!","e");
                        $("#div_detalle").hide("slow");
                        get_page('decanato/load_listar_view_decanato/','qry_expedientes');
  
                    }
                     else{
                         mensaje("La notificacion no se ha dado de baja!","r");                        
                     }                    
                },
                error: function(msg){                
                    mensaje("La notificacion no se ha dado de baja!","r"); 
                }
            });
          }
      });
}

  
