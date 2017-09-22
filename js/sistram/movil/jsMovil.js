function aprobarExpediente(){
    var pagina="http://localhost/oficinavirtual/sistram/movil";
    var expedienteID=$("#expedienteID").val();
    alert("saksad"+expedienteID);
    var data={expediente:expedienteID};
    $.ajax({
	data:  data,
	url:   "movil/aprobarExpediente",
        type:  'POST',
        beforeSend: function (){
            $("#body").addClass("ui-loading");
          
        },
	success:  function (data) {
          
            $("#body").removeClass("ui-loading"); 
         
           
	}
   });
}
function mostrarObservacion(){
   if( $('#observacion').is(":visible") ){
    $("#observacion").hide("slow");
   }else{
    $("#observacion").show("slow");
    }
}
function mostrarRechazado(){
     if( $('#observacion_rechazado').is(":visible") ){
    $("#observacion_rechazado").hide("slow");
   }else{
    $("#observacion_rechazado").show("slow");
    }
}
function observarExpediente(){
    
     var pagina="http://localhost/oficinavirtual/sistram/movil";
    var expedienteID=$("#expedienteID").val();
    var observacion=$("#txt_observacion").val();
     var data={expediente:expedienteID,
               observacion:observacion};
    $.ajax({
	data:  data,
	url:   "movil/observarExpediente",
        type:  'POST',
        beforeSend: function (){
            $("#body").addClass("ui-loading");
          
        },
	success:  function (data) {
           
	}
   });
    
}
function rechazarExpediente(){
    
     var pagina="http://localhost/oficinavirtual/sistram/movil";
    var expedienteID=$("#expedienteID").val();
    var observacion=$("#txt_observacion_rechazado").val();
     var data={expediente:expedienteID,
               observacion:observacion};
    $.ajax({
	data:  data,
	url:   "movil/rechazarExpediente",
        type:  'POST',
        beforeSend: function (){
            $("#body").addClass("ui-loading");
          
        },
	success:  function (data) {
           
	}
   });
    
}
