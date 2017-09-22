$(function(){ 
    $('#Tabs_Encuesta').tabs();  
})

function filtroCurso(valor){
       var idCurso = valor.options[valor.selectedIndex].value;
       $.post('encuesta/load_cargarhorario/',
              {idCurso : idCurso},
              function(data){$("#cbo_ins_enc_horario").html(data);}
             );
}

function mostrarDiv(id, bool){
    div=document.getElementById(id);
    if(bool)
        {
            div.style.display="block";
        }
     else
        {
            div.style.display="none";
        }
}

function mostrarCheckBox(){
    mostrarDiv('div_checkbox',true);
}

function filtroTipoBloque(valor){
    var idbloque = valor.options[valor.selectedIndex].value;
    get_page('encuesta/load_listar_view_encuesta/','div_qry',
             {criterio : idbloque}
            ); 
}

function mostrarGrafica(valor) {
    var idHorario = document.getElementById("idHor").value;
    window.open("../campus_virtual/graficos/popupReporteResultados/"+idHorario);
}

function preguntaEstado(idPregunta){
    var rdn=Math.random()*11;
    $.post('encuesta/preguntaEstado/'+idPregunta, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado correctamente!","e");          
            actualizar($('#cbo_bloque').val());
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la pregunta!","r");
        }                        
    });
    
    return false;
}

function actualizar(valor){
    get_page('encuesta/load_listar_view_encuesta/','div_qry',
             {criterio : valor}
            ); 
}

function filtroTipoReporte(valor){
    var tipo = valor.options[valor.selectedIndex].value;
       get_page('encuestacursos/load_listar_view_reportes/','div_qry',{
       criterio : tipo
    });
}
$(document).ready(function(){
    
        $("#frm_ins_encuesta").validate({
        rules: {
            txt_ins_pre_enunciado: {                
                required: true 
            }
                     
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "encuesta/encuestaIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                      mensaje("Se ha registrado la pregunta correctamente","e"); 
                limpiarForm(form);           
                    }else{
                        mensaje("Error Inesperando registrando en la Pregunta, vuelva a intentarlo!","r");              
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la pregunta!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});


