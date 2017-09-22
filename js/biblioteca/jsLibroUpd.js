$(document).ready(function(){
    NewCKEditor("txt_upd_lib_resumen");
        $("#frm_upd_libro").validate({
        rules: {
            $txt_upd_lib_titulo: {
                required: true
            },
            $txt_upd_lib_autor: {
                required: true
            },
            $txt_upd_lib_editorial: {
                required: true
            },
            $txt_upd_lib_edicion: {
                required: true
            },
            $txt_upd_lib_resumen: {
                required: true
            },$txt_upd_lib_observacion: {
                required: true
            },$txt_upd_lib_ejemplares: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "material/libroUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado el libro correctamente!","e");
                        limpiarForm(form);
                         $('.popedit').dialog('close');
                          libroQry();

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
