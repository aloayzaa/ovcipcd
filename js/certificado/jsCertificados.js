$(function(){   
    $('#Tabs_Certificado').tabs();  //convierte a tabs 
    $(".chzn-select").chosen();
   /* $("#tab_certificadolistar").bind('click', function(){
        get_page('certificado/load_listar_view_certificado/','div_qry');
    });*/
    
     $("#busqueda_certificado").prop("disabled", true);
       $("#busqueda_certificadop").prop("disabled", true);
    $("#submitButton").bind('click', function(event){    //click en el boton buscar personas                                  
        get_page('certificado/get_Vista/qry_view','div_qry', {
            'criterio' : $('#txt_nombres').val()
            } );
    });  
   
});

$(document).ready(function(){
    set_Date("txt_ins_frm_fecha_emision");     
 
});
function listartipocursos(){
    var tipocurso=$("#tipocurso").val();
    if(tipocurso=='DIPLOMADO'||tipocurso=='CURSO'){
         cboListarCursos(tipocurso);
    }
    else {
         $("#c_cbo_horario_listar").html("");
        $("#c_cbo_evento_listar").html("");
        alert("Seleccione Tipo de Curso");
    }
   
    
}
function generarCertificadoDocente(){
   
     var horario=$("#cbo_horario_listar").val();
     var grado=$("#grado").val();
     var data={grado:grado};
       //alert("hoilaaaaa"+evento);
        $.ajax({
                data:  data,
                url:   'certificados/generarCertificadoDocente/'+horario,
                type:  'post',
                beforeSend: function () {
                   // $("#preload2").html("Procesando Espere Por favor....");
                      msgLoading("#preload2");
                },
                success:  function (response) {
                    $("#preload2").html("");
                     mensaje("Certificados generados correctamente!","e");
                     var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+response+'.pdf');
                     win.focus();  
                     
                },
                error:function(){
                     mensaje("Se ah generado un error al generar certificado!","r");
                       $("#preload2").html("");
                }
        
             });
}
function generarDiplomaDocente(){
   
     var horario=$("#cbo_horario_listar_dip").val();
     var grado=$("#grado1").val();
      var data={grado:grado};
       //alert("hoilaaaaa"+evento);
        $.ajax({
                data:  data,
                url:   'certificados/generarDiplomaDocente/'+horario,
                type:  'post',
                beforeSend: function () {
                   // $("#preload2").html("Procesando Espere Por favor....");
                      msgLoading("#preload3");
                },
                success:  function (response) {
                  
                    $("#preload3").html("");
                      mensaje("Certificados generados correctamente!","e");
                     var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+response+'.pdf');
                     win.focus();
                    
                },
                error:function(){
                     mensaje("Se ah generado un error al generar certificado!","r");
                       $("#preload2").html("");
                }
        
             });
}
function listarCertificados(){
    
   if($("#tipoCertificado").val()=='alumno'){
       $("#div_qry").html("");
       var horario=$("#cbo_horario_listar").val();

        $.ajax({
        type: "POST",
        url: "certificados/load_listar_view_certificados/"+horario,
        cache: false,
        beforeSend:function(){
           msgLoading2("#div_qry");  
        },
        success: function (data) {
           $("#div_qry").html(data);
                   
        },
        error: function () {
            $("#c_cbo_evento_listar").html("Error al cargar la data");
        }
        });
   }
   else {
        $("#div_qry").html("");
       var horario=$("#cbo_horario_listar").val();
       //alert("hoilaaaaa"+evento);
        $.ajax({
        type: "POST",
        url: "certificados/load_listar_view_certificados_docente/"+horario,
        cache: false,
        beforeSend:function(){
           msgLoading2("#div_qry");  
        },
        success: function (data) {
           $("#div_qry").html(data);
                   
        },
        error: function () {
            $("#c_cbo_evento_listar").html("Error al cargar la data");
        }
        });
   }
   
}
function listarDiplomas(){
     $("#div_qry").html("");
       var horario=$("#cbo_horario_listar_dip").val();
       //alert("hoilaaaaa"+evento);
       if(horario==0){
           alert("Seleccione un horario");
       }else {
           if($("#tipolistadoDip").val()=='alumno'){
                  
               msgLoading2("#div_qry_dip");  
               $.ajax({
               type: "POST",
               url: "certificados/load_listar_view_diplomas/"+horario,
               cache: false,
               success: function (data) {
                  $("#div_qry_dip").html(data);
               },
               error: function () {
                   $("#div_qry_dip").html("Error al cargar la data");
               }
               }); 
           }
           else {
                msgLoading2("#div_qry_dip");  
               $.ajax({
               type: "POST",
               url: "certificados/load_listar_view_diplomas_docente/"+horario,
               cache: false,
               success: function (data) {
                  $("#div_qry_dip").html(data);
               },
               error: function () {
                   $("#div_qry_dip").html("Error al cargar la data");
               }
               });  
           }
           
       
        
    }
}
function cboListarCursos(tipocurso) {

    $.ajax({
        type: "POST",
        url: "certificados/cbo_cursos_usuarios/"+tipocurso,
        cache: false,
        beforeSend: function (){
            $("#c_cbo_evento_listar").html("Procesando... Espere Por Favor");
        },
        success: function (data) {
            if (data == "vacio") {
                $("#c_cbo_evento_listar").html("No se encontraron registros");
            } else {
                //$("#c_cbo_evento_listar1").html(data);
                 $("#c_cbo_evento_listar").html(data);
                 $(".chzn-select").chosen();
            }
        },
        error: function () {
            $("#c_cbo_evento_listar").html("Error al cargar la data");
        }
    });
}
function listarHorario(){
     var curso=$("#cbo_curso_listar").val();
     $.ajax({
        type: "POST",
        url: "certificados/cbo_horario/"+curso,
        cache: false,
        beforeSend: function(){
            // $("#c_cbo_horario_listar").html("Procesando... Espere Por Favor");
                msgLoadingCbo("#c_cbo_horario_listar");
        },
        success: function (data) {
            if (data == "vacio") {
                $("#c_cbo_horario_listar").html("No se encontraron registros");
            } else {
                //$("#c_cbo_evento_listar1").html(data);
                 $("#c_cbo_horario_listar").html(data);
                $("#busqueda_certificado").prop("disabled", false);
                $(".chzn-select").chosen();
            }
        },
        error: function () {
            $("#c_cbo_horario_listar").html("Error al cargar la data");
        }
    });
}
function listarHorarioDip(){
     var diplomado=$("#cbo_diplomado_listar").val();
     
     $.ajax({
        type: "POST",
        url: "certificados/cbo_horario_dip/"+diplomado,
        cache: false,
        beforeSend: function(){
            
            // $("#c_cbo_listar_dip").html("Procesando... Espere Por Favor");
             msgLoadingCbo("#c_cbo_listar_dip");
       
        },
        success: function (data) {
            if (data == "vacio") {
                $("#c_cbo_listar_dip").html("No se encontraron registros");
            } else {
                $("#c_cbo_listar_dip").html(data);
                $("#busqueda_certificadop").prop("disabled", false);
                $(".chzn-select").chosen();
            }
        },
        error: function () {
            $("#c_cbo_horario_listar").html("Error al cargar la data");
        }
    });
    
 
}