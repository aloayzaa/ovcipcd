$(function(){   
    $('#Tab_Reserva').tabs();  //convierte a tabs 
 
//    $("#tab_reservalistar").bind('click', function(){
        get_page('reserva/load_listar_view_reserva/','div_qry');
   
//    }); 
})


function MaterialDel(nResId,cMatTipo,nMatId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva/MaterialDel/'+nResId+"/"+cMatTipo+"/"+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("se ha devuelto el material correctamente!","e");
               get_page('reserva/load_listar_view_reserva/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}

function MaterialEntregar(nResId){

    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva/MaterialEntregar/'+nResId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("se ha Entregado el material correctamente!","e");
               get_page('reserva/load_listar_view_reserva/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}


function Actualizar(){

                 $("#btn_cargar").html("");
                  $("#Tabs_RegistroNuevo").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
 get_page('reserva/load_listar_view_reserva/','div_qry');
 
}

