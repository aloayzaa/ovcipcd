$(document).ready(function() {
    set_Date("txt_upd_notempre_fecha");
    NewCKEditor("txt_upd_notempre_contenido");
    $("#frm_upd_noticiasempresarial").validate({
        rules: {
           txt_upd_notempre_fecha: {
                required: true
            },
            txt_upd_notempre_titulo: {
                required: true
            }
//            txt_upd_notempre_contenido: {
//                required: true
//            }                 
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "noticiasempresariales/NoticiasEmpresarialUpd",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){  
                        get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
                        $('.popedit').dialog('close');
                        mensaje("se han actualizado los datos correctamente!","e");
                        $("#txt_upd_notempre_fecha").val("");
                        $("#txt_upd_notempre_titulo").val("");
//                        $("#txt_upd_notempre_contenido").val(""); 
                    }else{
                        mensaje("Error Inesperando modificando la noticia empresarial!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando la noticia empresarial!, vuelva a intentarlo");                       
                }
            });
        }
    });   
    
}) 



