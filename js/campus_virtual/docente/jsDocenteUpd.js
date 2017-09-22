$(document).ready(function(){
    
    soloNumeros("#txt_upd_doc_dni","keypress");
    soloNumeros("#txt_upd_doc_telefono","keypress");
    
        $("#frm_upd_docente").validate({
        rules: {
            txt_ins_doc_nombres: {                
                required: true 
            },
            txt_ins_doc_apellidoPaterno: {
                required: true
            },
            txt_ins_doc_apellidoMaterno: {
                required: true               
            },
            txt_ins_doc_dni: {
                required: true               
            },
            txt_ins_doc_telefono: {
                required: true               
            },
            txt_ins_doc_correoElectronico: {
                required: true               
            },
            txt_ins_doc_direccion: {
                required: true               
            }         
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "docente/docenteUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){   
                        $("#c_list_data_persona").html("");
                        $("#c_frm_chc_ins").html("");
                        mensaje("se ha modificado el docente correctamente!","e");
                        limpiarForm(form);
                        get_page('docente/load_listar_view_docente/','div_qry');
                        $('.popedit').dialog('close'); 
                    }else {   mensaje("Error Inesperando modificando el docente!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando el docente!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});