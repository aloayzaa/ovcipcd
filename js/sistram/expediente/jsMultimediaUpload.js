
function MultimediaDel(nMultimediaId){
    
    var rdn=Math.random()*11;
     bootbox.confirm("<h3>¿Seguro de eliminar el archivo multimedia?</h3>", function(result) {
          if(result===true){
                $.post('expediente/MultimediaDel/'+nMultimediaId, {
                rdn:rdn
            }, function(data){
                if(data.trim()==1){
                    var nexpedienteID=$("#hid_expedienteId").val();
                    //updtMultiExpe(nexpedienteID);
                    mensaje("se ha eliminado el archivo correctamente!","e");
                    get_page('expediente/popupMultimediaExpediente/'+nexpedienteID,'tablamultimedia');      


                }else{
                    mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
                }                        
            });
          }
    });
   
}

function updtMultiExpe(nExpedienteId){
    $.ajax({
        type: "POST",
        url: 'expediente/load_listar_view_multimedia/'+nExpedienteId,
        cache: false,
        data: {
            nExpedienteId:nExpedienteId   
        },
             success: function(data){
             $("#c_qry_multExp").html(data);               
                },
                error: function(data){ 
            alert(data);
        }        
}
)}


