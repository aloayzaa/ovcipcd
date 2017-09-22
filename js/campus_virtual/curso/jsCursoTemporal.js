$(document).ready(function(){
    $("#frm_ins_activarCursoTemporal").validate({
        rules: {
            hid_idCurso: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/activarCursosTemporales",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("Se ha activado el curso correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                        actualizarTemp($('#cbo_tipo_Temporal').val());
                    }else{
                        mensaje("Error Inesperando activando el Curso!, vuelva a intentarlo","r");
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando activando el Curso!, vuelva a intentarlo");                        ;

                }
            });
        }
        
    });
});

function actualizarTemp(valor){
       get_page('curso/load_listar_view_cursosTemporales/','div_qryTemp',{
       criterio : valor
    });                    
}