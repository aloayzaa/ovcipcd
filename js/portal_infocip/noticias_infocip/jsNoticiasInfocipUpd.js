$(document).ready(function() {
    set_Date("txt_upd_noticiasinfocip_fecha");
    NewCKEditor("txt_upd_noticiasinfocip_contenido");
    $("#frm_upd_noticias").validate({
        rules: {
           txt_upd_noticiasinfocip_fecha: {
                required: true
            },
            txt_upd_noticiasinfocip_titulo: {
                required: true
            }             
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "noticias_infocip/NoticiasInfocipUpd",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){  
                       
                        $('.popedit').dialog('close');
                        mensaje("se han actualizado la noticia!","e");
                        $("#txt_upd_noticiasinfocip_fecha").val("");
                        $("#txt_upd_noticiasinfocip_titulo").val("");
                        $("#txt_upd_noticiasinfocip_contenido").val(""); 
                    }else{
                        mensaje("Error Inesperando modificando la noticia!, vuelva a intentarlo","r");                        
                    } 
                              $(document).ready(function() {
    var valor = $("#tipos").val();
        get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
           criterio : valor
        });
    });  
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando la noticia!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 



