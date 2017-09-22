$(document).ready(function(){
   
        $("#frm_ins_mensaje").validate({
        rules: {
           
            $txt_ins_men_cMenMensaje: {
                required: true}   
   
        },
        
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "mensaje2/mensajeIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("El Mensajes registrado  correctamente!","e");
                            $('.popedit').dialog('close');
                        limpiarForm(form);                        
                        
                    }else{
                        mensaje("Error Inesperando registrando el Mensaje!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Mensaje!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
}); 