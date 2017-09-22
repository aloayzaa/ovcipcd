$(document).ready(function() {
    var solicitud = $('#numerosolicitud').val();
    
        $('#btn_ins_asignacion').click(function(){
                          $("#btn_ins_asignacion").attr("disabled", "disabled");
                     });
                     
       $(".chzn-select").chosen();             
      
        get_page('peritos/mostrar_lista_asignacion/'+solicitud,'tabla_asignacion')
         
         
                     
         $("#Perito").change(
        function() {
            $("#Perito option:selected").each(
                function() {
                    combo = $('#Perito').val();                    
                })
        });
                          
        $("#frm_ins_asignacion").validate({
            
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "peritos/Asignacion_peritos_ins",
                data: $(form).serialize(),
                success: function(msg){
                   
                    
                    if(msg.trim()==1){
                        
                        mensaje("Se ha asignado el perito a la solicitud!","e");
                        get_page('peritos/mostrar_lista_asignacion/'+solicitud,'tabla_asignacion')
                        $("#btn_ins_asignacion").removeAttr("disabled");                          
                    }else{
                        mensaje("Este perito ya ha sido asignado!","a");
                        $("#btn_ins_asignacion").removeAttr("disabled");
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la solicitud!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });
    
    
    
     });
     
function RemoverPerito(nSdelId){
    var solicitud = $('#numerosolicitud').val();
    var rdn=Math.random()*11;
    var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('peritos/RemoverPerito/'+nSdelId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha removido el perito!","e");
            get_page('peritos/mostrar_lista_asignacion/'+solicitud,'tabla_asignacion')
        }else{
            mensaje("Error inesperado, no se ha podido remover el perito!","r");
        }                        
    });
//    return false;
    
    }
}

 