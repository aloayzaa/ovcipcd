$(document).ready(function() {
    $("#frm_upd_requisitos").validate({
        rules: {     
            cbo_upd_req_tipo: {
                required: true
            },
            txt_upd_req_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
                        $("#btn_upd_requisitos").prop('disabled',true);
            $.ajax({
                type: "POST",
                url: "requisitos/requisitosUpd",
                data: $(form).serialize(),
                beforeSend:function(){
                    msgLoading("#procesoupd");
                
                },
                success: function(msg){
                          $("#btn_upd_requisitos").prop('disabled',false);
                     $("#procesoupd").html("");
               
                    if(msg.trim()==1){   
                        mensaje("El Requisito se ha actualizado correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                          get_page('requisitos/load_listar_view_requisitos/','qry_requisitos');
                        
                    }
                    else{
                        mensaje("El Requisito no se ha actualizado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Requisito no se ha actualizado correctamente!","r"); 
                     
                }
            });
        }
    }); 
});
    





