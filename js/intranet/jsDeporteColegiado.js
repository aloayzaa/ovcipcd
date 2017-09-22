$(function(){ 
    $("#btn_upd_cancel").bind('click', function(){                       
       $('.popedit').dialog('close');    
    });
});
$(document).ready(function() {  
    
    var recol = $("#hid_upd_regcol").val();
    
$("#frm_add_deportes").validate({
       rules: {

             cbo_upd_dominio: {
                required: true
            },
             cbo_deportes: {
                required: true,
                remote: {
                    url: "actualizacion_colegiado/DeporteRepetido",
                    type: "post",
                    data: {
                       cbo_deportes: function() {
                            return $("#cbo_deportes").val();
                        },
                        codigo : recol
                    }
                }
                
            },
             cbo_upd_seleccion: {
                required: true
            }
 
        },
        messages: {
             cbo_deportes: {                                            
                remote:"* Ya registro ese deporte"
            }
        },
        submitHandler: function(form){
                msgLoading("#cargando");
            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/AddDeporte/",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){     
                        $('.popedit').dialog('close');
                        mensaje("Se agrego un deporte satisfactoriamente.!","e");
                         load_frm_upd_deporte_colegiado($("#hid_upd_regcol").val());
                           
                    }else{
                        $('.popedit').dialog('close');
                        mensaje("Error Inesperando al actualizar!, vuelva a intentarlo","r");  
                         load_frm_upd_deporte_colegiado($("#hid_upd_regcol").val());
                    }                    
                },
                error: function(msg){                
                    alert("r","Error Inesperando al actualizar!, vuelva a intentarlo");
                       location.href="http://localhost/colegiaturacip/intranet/actualizacion_colegiado/";
                   
                }
            });
        }
    }); 
    
    $("#frm_del_deporte").validate({
       rules: {
      
 
        },
        messages: {

        },
        submitHandler: function(form){
                msgLoading("#cargando");
            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/DelDeporte/",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){     
                        $('.popedit').dialog('close');
                        mensaje("Se elimino deporte satisfactoriamente.!","e");
                         load_frm_upd_deporte_colegiado($("#hid_upd_regcol").val());
                           
                    }else{
                        $('.popedit').dialog('close');
                        mensaje("Error Inesperando al actualizar!, vuelva a intentarlo","r");  
                         load_frm_upd_deporte_colegiado($("#hid_upd_regcol").val());
                    }                    
                },
                error: function(msg){                
                    alert("r","Error Inesperando al actualizar!, vuelva a intentarlo");
                       location.href="http://localhost/colegiaturacip/intranet/actualizacion_colegiado/";
                   
                }
            });
        }
    }); 
    
    jQuery.validator.addMethod("validarletras",function(value, element) {
        return this.optional(element) || /^[a-zA-Z ñ Ñ ÁÉÍÓÚáéíóú]+$/.test(value); //no importa el error problema de IDE parece es valido en una expresion regular de javascript
    },
    jQuery.format("* Debe ingresar solo letras.")
        );
    jQuery.validator.addMethod("validarletrasnum",function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    },
    jQuery.format("* Debe ingresar solo letras y numeros.")
        );
});

