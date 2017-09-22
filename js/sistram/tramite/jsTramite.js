$(document).ready(function() {  
       
    $('#Tabs_Tramite').tabs();  //convierte a tabs 
     $('.select').multipleSelect();  //convierte multiselecto
    var cont=0;
    $('#TramiteListar').bind('click', function(){
        msgLoading2("#qry_tramite");
        get_page('tramite/load_listar_view_tramite/','qry_tramite');
        
    });
  
    $("#frm_ins_tramite").validate({
        rules: {     
            cbo_ins_tramite_requisitos: {
                required: true
            },
            txt_ins_tramite_descripcion: {
                required: true
            },
            txt_ins_tramite_titulo:{
                required: true
            }
        },
        submitHandler: function(form){
            $("#btn_ins_tramite").prop('disabled',true);
            var requisitos=$("#cbo_ins_tramite_requisitos").val();
              if(requisitos!==null){
                 // alert(requisitos);
            $.ajax({
                type: "POST",
                url: "tramite/tramiteIns",
                data: $(form).serialize(),
                beforeSend:function(){
                      msgLoading("#proceso");
                },
                success: function(msg){
                            $("#btn_ins_tramite").prop('disabled',false);
                     $("#proceso").html("");
                     if(msg.trim()==1){   
                        mensaje("El Trámite se ha registrado correctamente!","e");
                        limpiarForm(form);
             
                        
                    }
                    else{
                        mensaje("El Trámite no se ha registrado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Trámite no se ha registrado correctamente!","r"); 
                     
                }
            });
        }else{
                bootbox.alert("<h3>Seleccione al menos un requisito</h3>");
            }
        }
    });   
    
});
  
function tramiteUpd(nTramiteId){
  set_popup("tramite/popupEditarTramite/"+nTramiteId," Editar Tramite",640,500,'','');   
}  
    

function tramiteDel(nTramiteId){
    bootbox.confirm("<h3>¿Seguro que desea eliminar el trámite?</h3>", function(result) {
              if(result===true){
                  var rdn=Math.random()*11;
        $.post('tramite/tramiteDel/'+nTramiteId, {
            rdn:rdn
        }, function(data){
            if(data.trim()==1){
                  get_page('tramite/load_listar_view_tramite/','qry_tramite');
                mensaje("se ha eliminado el tramite correctamente!","e");

            }else{
                mensaje("Error inesperado, no se ha podido eliminar el tramite!","r");
            }                        
        });
        return false; 
              }
          });
    
}
    

    
    
