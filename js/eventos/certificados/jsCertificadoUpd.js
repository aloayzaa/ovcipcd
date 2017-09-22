$(document).ready(function(){
    set_Date("txt_upd_frm_fecha_emision");
        $("#frm_upd_certificado").validate({
        rules: {
            txt_upd_frm_especialidad: {                
                required: true 
            },
            txt_upd_frm_fecha_emision: {
                required: true
            },
            txt_upd_frm_datos_personales: {
                required: true               
            }     
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "certificado/certificadoUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado el certificado correctamente!","e");
                        limpiarForm(form);
                    }else{
                        mensaje("Error Inesperando registrando el certificado!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el certificado!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});
