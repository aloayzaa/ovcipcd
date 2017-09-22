$(document).ready(function() {
    $("#frm_upd_tramite").validate({
        rules: {     
            txt_upd_tramite_titulo: {
                required: true
            },
            txt_upd_tramite_descripcion:{
                required: true
            }
        },
        submitHandler: function(form){
              $("#btn_upd_tramite").prop('disabled',true);
            $.ajax({
                type: "POST",
                url: "tramite/tramiteUpd",
                data: $(form).serialize(),
                beforeSend:function(){
                    msgLoading("#procesoupd");
                
                },
                success: function(msg){
                              $("#btn_upd_tramite").prop('disabled',false);
                     $("#procesoupd").html("");
               
                    if(msg.trim()==1){   
                        mensaje("El Tramite se ha actualizado correctamente!","e");
                        $('.popedit').dialog('close'); 
                             get_page('tramite/load_listar_view_tramite/','qry_tramite');
     
                    }
                    else{
                        mensaje("El Tramite no se ha actualizado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Requisito no se ha actualizado correctamente!","r"); 
                     
                }
            });
        }
    }); 
});
function requisitotramiteIns(){
    var tramite=$("#txt_upd_tramite_id").val();
    var requisito=$("#cbo_ins_tramite_listarequisitos").val();
     var agree=confirm("Desea Agregar el requisito a este Tramite");
     if (agree){
        var rdn=Math.random()*11;
        $.post('tramite/requisitotramiteIns/'+requisito+'/'+tramite, {
            rdn:rdn
        }, function(data){
            if(data.trim()==1){
                  get_page('tramite/load_listar_view_requisito/'+tramite,'detalle_requisitos');
                mensaje("se ha registrado el requisito correctamente!","e");

            }else{
                mensaje("Error inesperado, no se ha podido eliminar el requisito!","r");
            }                        
        });
        return false;
    }
}
function requisitotramiteDel(nRequisitosId){
    var tramite=$("#txt_upd_tramite_id").val();
      var agree=confirm("Desea Eliminar el requisito de este Tramite");
     if (agree){
        var rdn=Math.random()*11;
        $.post('tramite/requisitotramiteDel/'+nRequisitosId+'/'+tramite, {
            rdn:rdn
        }, function(data){
            if(data.trim()==1){
                  get_page('tramite/load_listar_view_requisito/'+tramite,'detalle_requisitos');
                mensaje("se ha eliminado el requisito correctamente!","e");

            }else{
                mensaje("Error inesperado, no se ha podido eliminar el requisito!","r");
            }                        
        });
        return false;
    }
}
    





