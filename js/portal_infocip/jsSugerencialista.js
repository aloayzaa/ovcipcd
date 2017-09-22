$(function(){   
    $('#Tabs_Sugerencias').tabs();  //convierte a tabs 
    $("#tab_sugerencialistar").bind('click', function(){
        get_page('sugerencialista/load_listar_view_sugerencia/','div_qry');
    });
    $("#submitButton").bind('click', function(event){                                  
        get_page('sugerencialista/get_Vista/qry_view','div_qry', {
            'criterio' : $('#txt_nombres').val()
            } );
    });  
})

$(document).ready(function(){
   
   
        $("#frm_ins_sugerencia").validate({
        rules: {
            txt_ins_frm_nombre: {                
                required: true 
        
            },
            txt_ins_frm_email: {
                required: true
            },
            txt_ins_frm_sugerencia: {
                required: true               
            }          
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "sugerencialista/sugerenciaIns",
                data: $(form).serialize(),
                success: function(msg){
                   
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado la sugerencia correctamente!","e");
                        limpiarForm(form);
                    }else{
                        mensaje("Error Inesperando registrando la sugerencia!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la sugerencia!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});
function sugerenciaDel(nSugerenciaId){
    var rdn=Math.random()*11;
    $.post('sugerencialista/sugerenciaDel/'+nSugerenciaId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
     get_page('sugerencialista/load_listar_view_sugerencia/','div_qry');
            mensaje("se ha eliminado la sugerencia correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la sugerencia!","r");
        }                        
    });
    return false;
}