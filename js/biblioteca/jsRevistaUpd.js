$(document).ready(function(){
    NewCKEditor("txt_upd_rev_resumen");
        $("#frm_upd_revista").validate({
        rules: {
            $txt_upd_rev_titulo: {
                required: true
            },
            $txt_upd_rev_autor: {
                required: true
            },
            $txt_upd_rev_editorial: {
                required: true
            },
            $txt_upd_rev_edicion: {
                required: true
            },
             $txt_upd_rev_resumen: {
                required: true
            },
             $txt_upd_rev_observacion: {
                required: true
            },
             $txt_upd_rev_ejemplares: {
                required: true
            }
            
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "material/revistaUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado el curso correctamente!","e");
                        limpiarForm(form);
                         $('.popedit').dialog('close');
                        revistaQry();
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


