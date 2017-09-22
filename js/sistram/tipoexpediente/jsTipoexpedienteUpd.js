$(document).ready(function() {
    $("#frm_upd_tipoexpediente").validate({
        rules: {     
            txt_upd_texp_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "tipoexpediente/tipoexpedienteUpd",
                data: $(form).serialize(),
                beforeSend:function(){
                    msgLoading("#procesoupd");
                
                },
                success: function(msg){
                     $("#procesoupd").html("");
               
                    if(msg.trim()==1){   
                        mensaje("El Tipo de expediente se ha actualizado correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                         get_page('tipoexpediente/load_listar_view_tipoexpediente/','qry_tipoexpediente');
                        
                    }
                    else{
                        mensaje("El Tipo de expediente no se ha actualizado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Tipo de expediente no se ha actualizado correctamente!","r"); 
                     
                }
            });
        }
    }); 
});
    





