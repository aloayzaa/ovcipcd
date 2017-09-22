$(function(){   
    $('#Tab_Reserva_usu').tabs();  //convierte a tabs 
//    $("#tab_reservalistar").bind('click', function(){
        get_page('reserva_usu/load_listar_view_reserva_usu/','div_qry');
//    }); 
})

function FavoritosAdd(nMatId,cMatTipo,nPerId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva_usu/FavoritosAdd/'+nMatId+"/"+cMatTipo+"/"+nPerId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("Se agrego a favoritos correctamente!","e");
//               get_page('reserva/load_listar_view_reserva/','div_qry');
        }else{
            mensaje("Ya se añadio a favoritos anteriormente!","a");
        }                        
    });
//    return false;
    
    }
}

function ReservaCancel(nResId,cMatTipo,nMatId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva_usu/ReservaCancel/'+nResId+"/"+cMatTipo+"/"+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("Su reserva fue cancelada correctamente!","e");
               get_page('reserva_usu/load_listar_view_reserva_usu/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}