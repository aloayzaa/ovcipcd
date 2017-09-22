$(document).ready(function () {
       $(".chzn-select").chosen();
    $("#frm_asignar_responsable").validate({
        rules: {
            txt_upd_area_descripcion: {
                required: true
            }
        },
        submitHandler: function (form) {
                     
             msgLoading("#preload_registrarasig");
            $.ajax({
                type: "POST",
                url: "areas/areasAsig",
                data: $(form).serialize(),
                success: function (msg) {
                        if (msg.trim() == 1) {
                        mensaje("se ha asignado responsable correctamente!", "e");
                          limpiarForm(form);
                        
                         $("#preload_registrarasig").html("");
                             $('.popedit').dialog('close'); 
                      //  get_page('areas/load_listar_view_areas/', 'qry_areas');

                    }else if(msg.trim() == 2){
                            $("#preload_registrarasig").html("<br><div class='alert alert-info'><strong>El Nombre pertenece al responsable actual.</strong></div>");
                         
                          //  mensaje("El DNI pertenece al actual responsable, vuelva a intentarlo", "a");
                    } 
                    else {
                        $("#preload_registrarasig").html("");
                        mensaje("Error Inesperando registrando la asignación de responsable!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    mensaje("Error Inesperando registrando la asignación de responsable!, vuelva a intentarlo","r");

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

function mostrar_usuarios_upd(){
    msgLoading('#nombre_usuario_upd');
    var ID=$('#cbo_usuarios_admin_upd').val();
     $.ajax({
        type: "POST",
        url: "areas/mostrar_nombre_usuario",
        cache: false,
        data: {
            ID: ID
        },
        success: function (data) {
           $('#nombre_usuario_upd').html(data);
           $('#div_btn_asig').show();
        },
        error: function () {

        }
    
     });
}



