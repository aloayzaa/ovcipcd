$(document).ready(function() {  
       
    $('#Tabs_TipoExpediente').tabs();  //convierte a tabs 
    var cont=0;
    $('#TipoexpedienteListar').bind('click', function(){
         msgLoading2("#qry_tipoexpediente");
        get_page('tipoexpediente/load_listar_view_tipoexpediente/','qry_tipoexpediente');
        
    });
  
    $("#frm_ins_tipoexpediente").validate({
        rules: {     
            txt_ins_texp_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "tipoexpediente/tipoexpedienteIns",
                data: $(form).serialize(),
                beforeSend:function(){
                    msgLoading("#proceso");
                
                },
                success: function(msg){
                     $("#proceso").html("");
                     if(msg.trim()==1){   
                        mensaje("El Tipo de Expediente se ha registrado correctamente!","e");
                        limpiarForm(form);
                        
                    }
                    else{
                        mensaje("El Tipo de Expediente no se ha registrado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Tipo de Expediente no se ha registrado correctamente!","r"); 
                     
                }
            });
        }
    });   
    
});
  
function tipoexpedienteUpd(nTipexpedienteId){
  set_popup("tipoexpediente/popupEditarTipoexpediente/"+nTipexpedienteId,"Tipo de Expediente",640,400,'','');   
}  
    

function tipoexpedienteDel(nTipexpedienteId){
    bootbox.confirm("<h3>¿Seguro que desea eliminar el tipo de expediente?</h3>", function(result) {
              if(result===true){
                var rdn=Math.random()*11;
                $.post('tipoexpediente/tipoexpedienteDel/'+nTipexpedienteId, {
                    rdn:rdn
                }, function(data){
                    if(data.trim()==1){
                        get_page('tipoexpediente/load_listar_view_tipoexpediente/','qry_tipoexpediente');
                        mensaje("se ha eliminado el tipo de expediente correctamente!","e");

                    }else{
                        mensaje("Error inesperado, no se ha podido eliminar el tipo de expediente!","r");
                    }                        
                });
                return false;
            
            
              }
          });         
    
   
}
    

    
    
