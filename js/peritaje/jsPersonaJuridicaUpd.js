$(function(){   

    
   $("#txt_upd_emp_telefono").mask("999 999999");
   soloNumeros("#txt_upd_emp_fax","keypress");
   
    $("#frm_upd_persona_juridica").validate({
        rules: {
   
             txt_upd_emp_razonsocial: {
                required: true
            },
            txt_upd_emp_direccionfiscal: {
                required: true
            }           
                     
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "persona/personajuridicaUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("Se ha actualizado la persona juridica correctamente.","e");
                        $('.popedit').dialog('close');
                                get_page('persona/load_listar_view_persona_juridica/','div_qry');
                      
                    }else{
                         mensaje("El correo ya ha sido registrado!","a");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la persona juridica, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
})  



