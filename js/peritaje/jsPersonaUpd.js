$(function(){   
   
   soloNumeros("#txt_upd_per_Telefono","keypress");
   soloNumeros("#txt_upd_per_Celular","keypress");
   soloLetras("#txt_upd_per_apePat","keypress");
   soloLetras("#txt_upd_per_apeMat","keypress");
   soloLetras("#txt_upd_per_Nombres","keypress");
   
        
    $("#frm_upd_persona").validate({
        rules: {
   
            txt_upd_per_apePat: {
                required: true
            },
             txt_upd_per_apeMat: {
                required: true
            },
            txt_upd_per_Nombres: {
                required: true
            },   
            txt_upd_per_Telefono: {
                required: false,
                minlength:8,
                maxlength:9
            }, 
            txt_upd_per_Celular: {
                required: true,
                minlength:9,
                maxlength:9
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "persona/personaUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha actualizado la persona correctamente!","e");
                        $('.popedit').dialog('close');
                                get_page('persona/load_listar_view_persona/','div_qry');
                      
                    }else{
                        mensaje("El correo ya ha sido registrado!","a");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la persona!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
})   

