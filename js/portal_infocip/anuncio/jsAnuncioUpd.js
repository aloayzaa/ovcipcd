$(document).ready(function() {
    set_Date("txt_upd_anuncio_fecha");
    NewCKEditor("txt_upd_anuncio_contenido");
    $("#frm_upd_anuncio_trabajo").validate({
        rules: {
           txt_upd_anuncio_fecha: {
                required: true
            },
            txt_upd_anuncio_titulo: {
                required: true
            }             
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "anuncio/AnuncioUpd",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){  
                        get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio');
                        $('.popedit').dialog('close');
                        mensaje("se han actualizado el Anuncio!","e");
                        $("#txt_upd_anuncio_fecha").val("");
                        $("#txt_upd_anuncio_titulo").val("");
                        $("#txt_upd_anuncio_contenido").val(""); 
                    }else{
                        mensaje("Error Inesperando modificando el Anuncio!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando el Anuncio!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 



