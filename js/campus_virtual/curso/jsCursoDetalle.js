$(document).ready(function(){
    
         $(".chzn-select").chosen();
    
        MostrarfechaActual("txt_upd_cur_fecha_inicio","NA");
        MostrarfechaActual("txt_upd_cur_fecha_fin","NA");
        
        
        $("#frm_upd_curso").validate({
        rules: {
            $txt_ins_cur_nombre: {
                required: true
            },
            txt_upd_cur_fecha_inicio: {
                required: true
            },
            txt_upd_cur_fecha_fin: {
                required: true
            },
            txt_upd_cur_horas: {
                required: true
            }          
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoDet",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha guardado detalles del curso correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                        actualizar($('#cbo_tipo').val());
                    }else{
                        mensaje("Error Inesperando guardando detalles del curso!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando guardadno detalles del curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});

function actualizar(valor){
       get_page('curso/load_listar_view_curso/','div_qry',{
       criterio : valor
    });                    
}





