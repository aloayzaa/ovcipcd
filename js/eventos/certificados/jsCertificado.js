$(function(){   
    $('#Tabs_Certificado').tabs();  //convierte a tabs 
   /* $("#tab_certificadolistar").bind('click', function(){
        get_page('certificado/load_listar_view_certificado/','div_qry');
    });*/
    msgLoadingCbo("#c_cbo_evento_listar");
    cboListarEventos();
    $("#submitButton").bind('click', function(event){    //click en el boton buscar personas                                  
               get_page('certificado/get_Vista/qry_view','div_qry', {
            'criterio' : $('#txt_nombres').val()
            } );
    });  
   
});

$(document).ready(function(){
    set_Date("txt_ins_frm_fecha_emision");     
});
function listarCertificados(){
    msgLoading2("#div_qry");
 
    var evento=$("#cbo_evento_listar").val();
    //alert("hoilaaaaa"+evento);
   $.ajax({
        type: "POST",
        url: "certificados/load_listar_view_certificados/"+evento,
        cache: false,
        success: function (data) {
           $("#div_qry").html(data);
                   
        },
        error: function () {
            $("#c_cbo_evento_listar").html("Error al cargar la data");
        }
    });
}
function cboListarEventos() {
    $.ajax({
        type: "POST",
        url: "certificados/cbo_eventos_usuarios",
        cache: false,
        success: function (data) {
            if (data == "vacio") {
                $("#c_cbo_evento_listar").html("No se encontraron registros");
            } else {
                //$("#c_cbo_evento_listar1").html(data);
                 $("#c_cbo_evento_listar").html(data);
                $("#btn_busca_persona").prop("disabled", false);
                $(".chzn-select").chosen();
            }
        },
        error: function () {
            $("#c_cbo_evento_listar").html("Error al cargar la data");
        }
    });
}