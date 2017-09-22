$(function(){   
   
   
   
        
    $("#frm_upd_miembros").validate({
        rules: {
   
            txt_upd_miembro_Direccion: {
                required: true
            },
             txt_upd_miembro_Contacto: {
                required: true
            },
            txt_upd_miembro_Email: {
                required: true
            },   
            txt_upd_miembro_Especialidad: {
                required: true
            }            
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "miembrosperitos/miembrosPeritosUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha actualizado el perito correctamente!","e");
                        $('.popedit').dialog('close');
                                get_page('miembrosperitos/load_qry_miembros/','ListaMiembros');
                      
                    }else{
                        mensaje("Error Inesperando actualizando el perito!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la persona!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
})   


