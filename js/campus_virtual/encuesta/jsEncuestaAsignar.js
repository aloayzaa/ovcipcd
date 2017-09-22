$(function(){
    $('#Tabs_EncuestaAsignar').tabs();  //convierte a tabs 
    $('#tab_listadoencuesta').click(function(){
      limpiar2();
    });
    $('#tab_reportesencuesta').click(function(){
      limpiar();
    });
})


function filtroCursoReporte(valor){
    var idCurso = valor.options[valor.selectedIndex].value;
    $.post('encuestacursos/load_cargarhorarioreporte/',
        {idCurso : idCurso},
        function (data){$("#cbo_qry_enc_horario").html(data);}
    );
}

function filtroCursosEncuestas(valor){
    var anio = valor.options[valor.selectedIndex].value;
//    var idPersona = document.getElementById("hid_idPersona").value;
    var cri = anio;
    get_page('encuesta/load_listar_view_reportes/','div_qry',{
       criterio : cri
    });
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

function filtroCurso(valor){
       var idCurso = valor.options[valor.selectedIndex].value;
       $.post('encuesta/load_cargarhorario/',
              {idCurso : idCurso},
              function(data){$("#cbo_ins_enc_horario").html(data);}
             );
}



function filtroTipoReporte(valor){
    var tipo = valor.options[valor.selectedIndex].value;
       get_page('encuestacursos/load_listar_view_reportes/','div_qry',{
       criterio : tipo

    });
}

function filtroCursosanio(valor){
    var tipo = valor.options[valor.selectedIndex].value;
       get_page('encuestacursos/load_listar_view_listado/','div_qryanio',{
       criterio : tipo
    });
}


function mostrarGrafica(valor) {
    var idHorario = document.getElementById("idHor").value;
     var bloque = cbo_gra_bloque.options[cbo_gra_bloque.selectedIndex].value;
    //alert('Valores '+idHorario+' - '+bloque);
    window.open("../campus_virtual/graficos/popupReporteResultados/"+idHorario+"/"+bloque);
}


function inseli(valor){
    var idHorario = cbo_ins_enc_horario.options[cbo_ins_enc_horario.selectedIndex].value;
    var idpregunta = valor.value;
    
    if(valor.checked){
//        alert('idHorario ins '+idHorario+' - '+idpregunta);
       get_page('encuestacursos/encuestahorarioIns/'+idpregunta+'/'+idHorario);
    }
    else{
//        alert('idHorario del '+idHorario+' - '+idpregunta);
       get_page('encuestacursos/encuestahorarioDel/'+idpregunta+'/'+idHorario);
    }
}

function encuestaelim(idHorario){
    var rdn=Math.random()*11;
    $.post('encuestacursos/encuestaelim/'+idHorario, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado correctamente!","e");          
            actualizar($('#cbo_tipoanio').val());
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la encuesta!","r");
        }                        
    });
    
    return false;
}

function activarencuesta(idHorario){
    var idHorario = document.getElementById("idHor").value;
    var rdn=Math.random()*11;
    $.post('encuestacursos/activarencuesta/'+idHorario, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha activado correctamente!","e");          
            $('.popedit').dialog('close');
            actualizar($('#cbo_tipoanio').val());
        }else{
            mensaje("Error inesperado, no se ha podido activar la encuesta!","r");
        }                        
    });
    
    return false;
}

function boton(){
    mensaje("se ha registrado la encuesta correctamenta!","e");
    window.location.reload();
    div.style.display="none";
       }

function limpiar()
               {
                       document.getElementById("div_qry").innerHTML="";
           }
 
function limpiar2()
               {
                       document.getElementById("div_qryanio").innerHTML="";
           }
 
 function actualizar(valor){
    get_page('encuestacursos/load_listar_view_listado/','div_qryanio',
             {criterio : valor}
            ); 
}