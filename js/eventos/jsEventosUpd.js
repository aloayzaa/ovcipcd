$(document).ready(function() {
   
    set_Date("txt_upd_eve_fecha","NA");
    set_Date("txt_upd_eve_fecha_inicio","NA");
    
    $("#check_upd_cuenta").on("click",checar1);
   $("#check_upd_horas").on("click",checarHoras1);
    
    $("#frm_upd_eventos").validate({
        rules: {
           txt_upd_eve_titulo: {
                required: true
            },
            txt_upd_eve_descripcion: {
                required: true
            },
            txt_upd_eve_fecha: {
                required: true
            },
            cbo_tevento:{
                required: true
            }
                  
        },
        submitHandler: function(form){
            $("#proceso_actualizar").html("");
            $.ajax({
                type: "POST",
                url: "eventos/eventosUpd",
                data: $(form).serialize(),
                beforeSend:function(){
                    $("#proceso_actualizar").html("Procesando...Espere un momento Por Favor");
                },                    
                success: function(msg){
                    $("#proceso_actualizar").html("");
                    if(msg.trim()==1){  
                        get_page('eventos/load_listar_view_eventos/','qry_eventos');
                        $('.popedit').dialog('close');
                        mensaje("se han actualizado los datos correctamente!","e");
                       
                    }
                    else{
                        mensaje("La cuenta de ingreso ya existe para otro evento","a");                            
                    }                    
                },
                error: function(msg){                
                  
                   mensaje("La cuenta de ingreso ya existe para otro evento.Vuelva a intentarlo","a"); 
                }
            });
        }
    });   
    
});
function checar1(){
    var valor;
    if($("#check_upd_cuenta").is(':checked')) {
            // alert("holaaa");
      $('#txt_upd_eve_cuenta').val('Sin Cuenta');
       document.getElementById('txt_upd_eve_cuenta').readOnly = true;
              
        }
      else {
            $('#txt_upd_eve_cuenta').val('');
        document.getElementById('txt_upd_eve_cuenta').readOnly = false;
      
              }  
  
}    
function checarHoras1(){
    var valor;
    if($("#check_upd_horas").is(':checked')) {
            // alert("holaaa");
      $('#txt_upd_eve_horas').val('Sin Hora');
       document.getElementById('txt_upd_eve_horas').readOnly = true;
              
        }
      else {
            $('#txt_upd_eve_horas').val('');
        document.getElementById('txt_upd_eve_horas').readOnly = false;
      
              }  
  
}




