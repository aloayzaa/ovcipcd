$(document).ready(function() {

    var recol = $("#hid_upd_regcol").val();
    $("#frm_upddatos_personales").validate({
        
       rules: {

            txt_upd_col_clavebefore: {
                required: true,
                minlength: 6,
                remote: {
                    url: "cambiar_clave/ValidarPwd",
                    type: "post",
                    data: {
                       txt_upd_col_clavebefore: function() {
                         
                            return $("#txt_upd_col_clavebefore").val();
                        },
                        codigo : recol
                    }
                }
            },   
            txt_upd_col_claveafter:{
                required: true,
                minlength: 6,
                 remote: {
                    url: "cambiar_clave/ClavesIguales",
                    type: "post",
                    data: {
                       txt_upd_col_claveafter: function() {
                            return $("#txt_upd_col_claveafter").val();
                        }
                    }
                }
            },
            txt_upd_col_rclaveafter:{
                required: true,
                minlength: 6,
                equalTo: txt_upd_col_claveafter
            }
            
           
        },
        messages: {
            txt_upd_col_clavebefore: {                                            
                remote:"* No es su contraseña actual"
            },
            txt_upd_col_rclaveafter: {                                            
                equalTo:"* Las nuevas contraseñas no coinciden"
            },
             txt_upd_col_claveafter: {                                            
                remote:"* La contraseña actual y nueva no son diferentes"
            }
        },
        submitHandler: function(form){
                messageLoad("#preload");
                $("#btn_upd_cambiarclave").attr("disabled","disabled");
            $.ajax({
                
                type: "POST",
                url: "cambiar_clave/UpdPassword",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        $("#preload").html("");
                        mensaje("Contraseñas cambiadas correctamente!","e");
                         limpiarForm("#frm_upddatos_personales");  
				$("#btn_upd_cambiarclave").removeAttr("disabled","disabled");

                    }else{
                        alert("Error Inesperando actualizando persona!, vuelva a intentarlo","r");  
                          limpiarForm("#frm_upddatos_personales"); 
                    }                    
                },
                error: function(msg){                
                    alert("r","Error Inesperando actualizando la personass!, vuelva a intentarlo");
                        limpiarform();   
                   
                }
            });
        }
    }); 
 
});

function messageLoad(obj,msg){
    if(msg == undefined){
        $(obj).html("<div id='msg_loading' style='color:#000000;font-size:0.75em'><div class='preloader_custom'></div>&nbsp;Cargando...por favor espere.</div>");
    }else{
        $(obj).html("<div id='msg_loading' style='color:#ffffff;font-size:0.75em'><div class='preloader_custom'></div>&nbsp;"+" "+msg+"</div>");
    }
}