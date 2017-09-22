$(document).ready(function() {  
    $("#loginForm").validate({
             rules: {     
            user: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "usuario/autenticar",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==0){    
                        alert("goooo");
                     removerMsjeSave("#botonform");
                    $("#loadbtn") .html("");
                    $('#msje').html("Usuario Incorrecto");
                    }else{
                        mensaje("Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 
    
