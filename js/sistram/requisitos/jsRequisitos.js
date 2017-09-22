$(document).ready(function() {  
       
    $('#Tabs_Requisitos').tabs();  //convierte a tabs 
    var cont=0;
    $('#RequisitosListar').bind('click', function(){
         msgLoading2("#qry_requisitos");
        get_page('requisitos/load_listar_view_requisitos/','qry_requisitos');
        
    });
  
    $("#frm_ins_requisitos").validate({
        rules: {     
            cbo_ins_req_tipo: {
                required: true
            },
            txt_ins_req_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
            $("#btn_ins_requisitos").prop('disabled',true);
            $.ajax({
                type: "POST",
                url: "requisitos/requisitosIns",
                data: $(form).serialize(),
                beforeSend:function(){
                    msgLoading("#proceso");
                
                },
                success: function(msg){
                                $("#btn_ins_requisitos").prop('disabled',false);
                     $("#proceso").html("");
                     $("#resultado_cuenta").html("");
                    if(msg.trim()==1){   
                        mensaje("El Requisito se ha registrado correctamente!","e");
                        limpiarForm(form);
                        
                    }
                    else{
                        mensaje("El Requisito no se ha registrado correctamente!","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("El Requisito no se ha registrado correctamente!","r"); 
                     
                }
            });
        }
    });   
    
});
  
function requisitosUpd(nRequisitosId){
  set_popup("requisitos/popupEditarRequisitos/"+nRequisitosId," Editar Requisitos",640,400,'','');   
}  
  

function requisitosDel(nRequisitosId){
     bootbox.confirm("<h3>¿Seguro que desea eliminar el requisito?</h3>", function(result) {
              if(result===true){
                  var rdn=Math.random()*11;
                    $.post('requisitos/requisitosDel/'+nRequisitosId, {
                        rdn:rdn
                    }, function(data){
                        if(data.trim()==1){
                            get_page('requisitos/load_listar_view_requisitos/','qry_requisitos');
                            mensaje("se ha eliminado el rquisito correctamente!","e");

                        }else{
                            mensaje("Error inesperado, no se ha podido eliminar el requisito!","r");
                        }                        
                    });
                    return false; 
              }
          });    
    
  }
    

    
    
