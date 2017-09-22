function actualizarPagos(){

    var monto = $('#txt_ins_pag_nuevoMonto').val();
    var voucher = $('#txt_ins_pag_voucher').val();
    var idHorario = $('#idHorario').val();
    var idPersona = $('#idPersona').val();

    $.ajax({
        type: "POST",
        url: "matricula/nuevoPago/"+monto+"/"+idHorario+"/"+idPersona+"/"+voucher,
        success: function(data){
            $("#listaPagos").html("");
            $("#listaPagos").html(data);
        }
    });

}