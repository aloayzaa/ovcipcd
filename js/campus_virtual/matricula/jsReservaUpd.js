$(document).ready(function () {
        msgLoadinginfo("#mostrar_pagos");
    if ($("#chk_ins_pag_des1").val() == 'accept') {
        var aux = 1;
        document.getElementById("chk_ins_pag_des1").value = aux;
    }
    $.post('matricula/mostrar_pagos/',
            {idCurso: $('#idCursoid').val(), idAlumno: $('#dni').val()},
    function (data) {
        $("#mostrar_pagos").html(data);
        if (data == 'no') {
            $("#mostrar_pagos").html('<div class="alert alert-block">No se ha realizado pago!</div>');
        } else {
                     var observacion= $('#txt_ins_pag_observacion').val();
                    var dato = observacion.split('_').join(' ');
                  document.getElementById("txt_obs_mat1").value=dato;
            mostrarDivreserva('div_check_obs1', true);
            mostrarDivreserva('mostrar_pagos', true);
        }
    }
    );
    $("#frm_upd_reserva").validate({
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "matricula/reservaUpd",
                data: $(form).serialize(),
                success: function (msg) {
                    if (msg.trim() == 1) {
                        mensaje(" Se registro Correctamente!", "e");
                        get_page('matricula/load_listar_view_matricula/',
                                'div_qry',
                                {criterio: 0, hor: 0}
                        );
                        $('.popedit').dialog('close');
                    } else {
                        mensaje("Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    mensaje("r", "Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo");

                }
            });
        }
    });
});
function mostrarDivreserva(id, bool) {
    div = document.getElementById(id);
    if (bool)
    {
        div.style.display = "block";
    }
    else
    {
        div.style.display = "none";
    }
}

