$(document).ready(function(){
    $("#frm_ins_fechasTemporales").validate({
        rules: {
            hid_idhorario: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "horario/insertarSesionesInactivas",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("Se ha activado el horario correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                    }else{
                        mensaje("Error Inesperando activando el Horario!, vuelva a intentarlo","r");
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando activando el Horario!, vuelva a intentarlo");

                }
            });
        }
        
    });
});