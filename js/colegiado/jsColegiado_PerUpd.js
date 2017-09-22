$(document).ready(function() {
    
      soloNumeros("#txt_upd_per_ruc", "keypress");
      soloNumeros("#txt_upd_per_celular", "keypress");
      $("#txt_upd_per_celular").mask('999 999999');
    $("#frm_upd_persona_juridica").validate({
        rules: {     
            RubroUpd: {
                required: true
            },
            txt_upd_per_razon_social: {
                required: true
            },
             txt_upd_per_ruc: {
                required: true
            },
            txt_upd_per_email: {
                required: true
            },
            txt_upd_per_celular: {
                required: true
            },
             txt_upd_per_direcc: {
                required: true
            }
                       
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "colegiado/persona_juridica_Upd",
                data: $(form).serialize(),
                beforeSend:function(){
                   // $("#proceso").html("Procesando...Espere un momento Por Favor");
                    msgLoading("#procesoupd");
                
                },
                success: function(msg){
                     $("#procesoupd").html("");
               
                    if(msg.trim()==1){   
                       //  $("#resultado_cuenta").html("<span class='ui-icon ui-icon-check'></span>");  
                        mensaje("La persona Juridica se ha actualizado correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                          get_page('colegiado/load_listar_view_persona/','qry_persona');
                        
                    }
                    else{
                        mensaje("La persona Juridica   no se ha actualizado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("La persona Juridica  no se ha actualizado correctamente!","r"); 
                     
                }
            });
        }
    }); 
    

       
});






