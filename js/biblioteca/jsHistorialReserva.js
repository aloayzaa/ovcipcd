$(function(){   
    $('#Tab_HistorialReserva').tabs();  //convierte a tabs 

        get_page('historial_reserva/load_listar_view_historial_reserva/','div_qry');
         get_page('historial_reserva/load_listar_view_historial_reserva_ext/','div_qry2');
})
