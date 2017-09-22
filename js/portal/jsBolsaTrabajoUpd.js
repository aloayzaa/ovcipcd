$(document).ready(function() {
    set_Date("txt_upd_bolsa_fecha");
    NewCKEditor("txt_upd_bolsa_contenido");
    $("#frm_upd_bolsa_trabajo").validate({
        rules: {
           txt_upd_bolsa_fecha: {
                required: true
            },
            txt_upd_bolsa_titulo: {
                required: true
            }             
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "bolsa_trabajo/BolsaTrabajoUpd",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){  
                        get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa');
                        $('.popedit').dialog('close');
                        mensaje("se han actualizado la Bolsa de Trabajo!","e");
                        $("#txt_upd_bolsa_fecha").val("");
                        $("#txt_upd_bolsa_titulo").val("");
                        $("#txt_upd_bolsa_contenido").val(""); 
                    }else{
                        mensaje("Error Inesperando modificando la Bolsa de Trabajo!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando la Bolsa de Trabajo!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 



