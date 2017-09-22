$(document).ready(function(){
        $("#frm_upd_curso").validate({
        rules: {
            $txt_ins_cur_nombre: {
                required: true
            },
            txt_ins_cur_duracion: {
                required: true
            },

            txt_ins_cur_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado el curso correctamente!","e");
                         $('.popedit').dialog('close'); 
                      limpiarForm(form);
                        get_page('curso/load_listar_view_curso/','div_qry');
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

