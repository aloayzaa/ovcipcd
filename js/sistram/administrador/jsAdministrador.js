$(document).ready(function() {  
    $(".chzn-select").chosen();
    $('#Tabs_Administrador').tabs();  //convierte a tabs 
    $('#AdministradorListar').bind('click', function(){
        msgLoading2("#qry_expedientes");
        get_page('administrador/load_listar_view_administrador/','qry_expedientes');
    });
     $('#DerivadosListar').bind('click', function(){
        msgLoading2("#qry_derivados");
        var anio=$("#listarXanios").val();
        get_page('administrador/load_listar_view_administrador_derivados/'+anio,'qry_derivados');
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
function listarderivadosporanios(){
        msgLoading2("#qry_derivados");
        var anio=$("#listarXanios").val();
        get_page('administrador/load_listar_view_administrador_derivados/'+anio,'qry_derivados');
    
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
   
    var data={
        expedienteId:expedienteId,
        areaId:areaId,
        areareceptor:areasreceptores,
        observacion:observacion,
        estado:estado
    };
    
    if(areasreceptores===','){
      bootbox.alert("<h3>Debe agregar área destino</h3>");
    }
    else {
       derivar(data);
    }
}
function derivar(data){
              var observacion = $("#txt_ins_observacion").val();
    if(observacion!==''){
         bootbox.confirm("<h3>¿Seguro que desea derivar el expediente?</h3>", function(result) {
              if(result===true){ 
                $.ajax({
                type: "POST",
                url: "administrador/derivarExpediente",
                data: data,
                beforeSend:function(){
                    msgLoading("#derivar_cargando");
                },
                success: function(msg){
                    $("#derivar_cargando").html("");
                    if(msg.trim()==1){   
                        mensaje("Se ha derivado el expediente correctamente!","e");
                         $("#div_detalle").hide("slow");
                         get_page('administrador/load_listar_view_administrador/','qry_expedientes');
  
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
}else{
        bootbox.alert("<h3>¡Ingresar una observación para el proceso!</h3><br><h5>e.g. Procesar trámite urgente</h5>"); 
}
}
function expedienteVer(expediente){
    $("#div_detalle_derivados").hide("slow");
     msgLoading("#detalle_exp");
     var rdn=Math.random()*11;
        $.post('administrador/expedienteVer/'+expediente,{
            rdn:rdn
        }, function(data){
             $("#div_detalle_derivados").show("slow");
             $("#detalle_derivados").html(data);
                                 
        });
}
function verDetalle(expediente){
    var areasnoconsiderar=$("#areasno"+expediente).val();
    $("#div_detalle").hide("slow");
     msgLoading("#detalle_exp");
     var rdn=Math.random()*11;
        $.post('administrador/expedienteGet/'+expediente,{
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
          var observacion = $("#txt_ins_observacion").val();
    if(observacion!==''){
     bootbox.confirm("<h3>¿Seguro que desea observar y enviar el expediente a Mesa de Partes?</h3>", function(result) {
          if(result===true){
                var data={expediente:expediente,observacion:observacion};
            $.ajax({
                    type: "POST",
                    url: "administrador/enviarMesaPartes",
                    data: data,
                    success: function(msg){
                        if(msg.trim()==1){   
                            mensaje("Se ha enviado el expediente correctamente!","e");

                            get_page('administrador/load_listar_view_administrador/','qry_expedientes');

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
}else{
        bootbox.alert("<h3>¡Ingresar una observación para el proceso!</h3><br><h5>e.g.(falta documentación)</h5>"); 
}

}
function darBajaNotificacion(expediente){
   //var prioridad=$("#prioridad"+expediente).val();
    bootbox.confirm("<h3>¿Seguro que no desea ver la notificación?</h3>", function(result) {
          if(result===true){
                 var data={expediente:expediente};
     $.ajax({
                type: "POST",
                url: "administrador/darBajaNotificacion",
                data: data,
                success: function(msg){
                       if(msg.trim()==1){   
                        mensaje("Se ha dado de baja la notificacion!","e");
                        $("#div_detalle").hide("slow");
                        get_page('administrador/load_listar_view_administrador/','qry_expedientes');
  
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

  
