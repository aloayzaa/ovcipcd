$(function(){   

       $('#Tab_Reserva_adm').tabs();

          get_page('reserva_adm/load_listar_view_reserva_adm/','div_qry');
  get_page('reserva_adm/load_listar_view_reserva_admExternos/','div_qry2');
})


function MaterialActivar(nResId,cMatTipo,nMatId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva_adm/MaterialActivar/'+nResId+"/"+cMatTipo+"/"+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("Se activo la Reserva correctamente!","e");
            get_page('reserva_adm/load_listar_view_reserva_adm/','div_qry');
         
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}

function MaterialActivarext(nResId,cMatTipo,nMatId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('reserva_adm/MaterialActivar/'+nResId+"/"+cMatTipo+"/"+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("Se activo la Reserva correctamente!","e");
        
             get_page('reserva_adm/load_listar_view_reserva_admExternos/','div_qry2');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}

function Actualizar(){

                 $("#btn_cargar").html("");
                  $("#Tabs_Reserva_Adm").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
  get_page('reserva_adm/load_listar_view_reserva_adm/','div_qry');
 
}


function Actualizarext(){

                 $("#btn_cargar").html("");
                  $("#Tabs_Reserva_Ext_Adm").html("");
                msgLoading("#preload2");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
     get_page('reserva_adm/load_listar_view_reserva_admExternos/','div_qry2');
 
}
