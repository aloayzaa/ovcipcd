
$(function(){
    $('#Tabs_Responder').tabs();  //convierte a tabs
})

function insRespuesta(valor){
    var idHorario = document.getElementById("idHor").value;
    var idPersona = document.getElementById("idPer").value;
    var idPregunta = valor.name;
    var valorRes = valor.value;
    if(valor.checked){
       get_page('alumno/insRespuesta/'+idPersona+'/'+valorRes+'/'+idPregunta+'/'+idHorario);
    }
    else{
    }
}

$(document).ready(function(){

        $("#frm_ins_respuesta").validate({
        rules: {
            txt_ins_pre_enunciado: {
                required: true
            }

        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                      mensaje("Error Inesperando registrando la respuesta, vuelva a intentarlo","r");
                    }else{
                        mensaje("Se ha registrado su respuesta correctamente!","e");
                        $('.popedit').dialog('close');
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando registrando la pregunta!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});
