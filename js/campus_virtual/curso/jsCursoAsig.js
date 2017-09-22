$(document).ready(function(){
 validaNumeros("#txt_upd_asig_cuenta", "keypress");
    $("#frm_upd_curso_asig").validate({
        rules: {
            txt_upd_asig_cuenta: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoAsig",
                data: $(form).serialize(),
                success: function(msg){
                
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("Cuenta Asignada correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                        actualizar($('#cbo_tipo').val());
                    }else{
                        mensaje("Error Inesperando modificando el curso!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});
function validaNumeros(obj, evt) {
    $(obj).bind(evt, function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
    })
}

function actualizar(valor){
       get_page('curso/load_listar_view_curso/','div_qry',{
       criterio : valor
    });                    
}