$(document).ready(function(){
        $("#frm_upd_encuesta").validate({
        rules: {
            txt_upd_pre_enunciado: {                
                required: true 
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "encuesta/encuestaUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado la pregunta correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                        actualizar($('#cbo_bloque').val());
                    }else{
                        mensaje("Error Inesperando modificando la pregunta!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando en la pregunta!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});

function actualizar(valor){
    get_page('encuesta/load_listar_view_encuesta/','div_qry',
             {criterio : valor}
            ); 
}