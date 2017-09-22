$(function () {
    msgLoadingCbo("#c_cbo_evento_listar");
    validaNumeros("#txt_nrodni", "keypress");
    $("#btn_ins_registrar").hide();
    $("#btn_busca_persona").prop("disabled", true);
  /*  $("#btn_fnd_buscar").bind('click', function () {
        if ($("#cboFecharegistroMes").val() == 0) {
            $("#c_qry_inscripcion").html("<div class='alert alert-block'><h4 class='alert-heading'>Informacion1!!</h4>Seleccione Año y  Mes.... </div>");
        }
        else {
            msgLoading2("#c_qry_inscripcion");
            get_page('iepi/listar_InscripcionesMesFecha/' + $("#cboFecharegistroAno").val() + "/" + $("#cboFecharegistroMes").val(), 'c_qry_inscripcion');
        }
    });*/
    cboListarEventos();
    $("#btn_busca_persona").bind({
        click: function () {
            if ($('#txt_nrodni').val().length == 8) {
                $("#txt_nrodni").attr("disabled", "disabled");
                $("#cbo_evento_listar").attr('disabled', true).trigger("liszt:updated");
                $("#info_persona").hide("slow");
                $("#btn_ins_registrar").hide("slow");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display: "inline",
                    'margin-left': '8px'
                });
                timer = setTimeout("get_personaXdni()", 800);
            }
            else {
                $("#txt_nrodni").attr("placeholder", "Requerido");
                $("#txt_nrodni").focus();
            }
        }
    });
 });

//funcionnes al momento de hacer clic en los radios de empadronamiento

$(document).ready(function () {
    $("#todos").hide();
    $("#actuales").show();

    $("#frm_registrar_inscripcion").validate({
        rules: {
            txt_ins_per_nombres: {
                required: true
            },
            txt_ins_per_apellidop: {
                required: true
            },
            txt_ins_per_apellidom: {
                required: true
            }
        },
        submitHandler: function (form) {
             msgLoading("#preload_registrar");
            $("#btn_ins_registrar").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "iepi/IepiIns",
                data: $(form).serialize(),
                success: function (msg) {
                        if (msg.trim() == 1) {
                        mensaje("se ha registrado la inscripcion correctamente!", "e");
                        $("#info_persona").hide("slow");
                        $("#btn_ins_registrar").hide("slow");
                         $("#btn_ins_registrar").prop("disabled", false);
                         $("#txt_nrodni").val("");
                         $("#txt_nota").val("");
                        $("#preload_registrar").html("");

                    } else {
                        $("#btn_ins_registrar").prop("disabled", false);
                        $("#preload_registrar").html("");
                        mensaje("Error Inesperando registrando la inscripcion!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    mensaje("r", "Error Inesperando registrando la inscripcion!, vuelva a intentarlo");

                }
            });
        }
    });

});
function validaNumeros(obj, evt) {
    $(obj).bind(evt, function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
    })
}
// COMBO LISTAR EVENTOS


function InscripcionDel(nInscripcionId){
    var rdn=Math.random()*11;
    $.post('iepi/InscripcionDel/'+nInscripcionId, {
        rdn:rdn,
        nInscripcionId:nInscripcionId
    }, function(data){
        if(data.trim()==1){
           get_page('iepi/listar_inscripciones/' + $("#cbo_evento").val(), 'c_qry_inscripcion');
            mensaje("se ha eliminado el evento correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
    return false;
}

function Observacionpopup(nInscripcionId,cuenta_ingreso){
  set_popup("iepi/popupVistaPreviaObservacion/"+nInscripcionId+"/"+cuenta_ingreso,"Infromación Detallada",320,290,'','');
          
}
function InscripcionAsistencia(nInscripcionId){
    set_popup("iepi/InscripcionAsistencia/"+nInscripcionId,"Asistencia",320,290,'','');
          
}
function asistencias(Id){
   var id_asistencia= $('#id_asistencia').val();
  
    var rdn=Math.random()*11;
    $.post('iepi/asistencias/'+Id+ "/" + id_asistencia, {
        rdn:rdn,
        Id:Id
    }, function(data){
        if(data.trim()==1){
        $('.popedit').dialog('close');    
        mensaje("se ha elimina el evento correctamente!","e");
        
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
    return false;
}

function cboListarEventos() {
    $.ajax({
        type: "POST",
        url: "iepi/cbo_eventos_usuarios",
        cache: false,
        success: function (data) {
            if (data == "vacio") {
                $("#c_cbo_evento_listar").html("No se encontraron registros");
            } else {
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

function get_personaXdni() {
    $.ajax({
        type: "POST",
        url: "iepi/get_persona_dni",
        cache: false,
        data: {
            valor: $("#txt_nrodni").val(),
            eventos: $("#cbo_evento_listar").val()
        },
        success: function (data) {
            $("#preload").html("");
            $("#info_persona").hide("slow");
            $("#btn_ins_registrar").show();
            $("#cbo_evento_listar").removeAttr("disabled");
            $("#txt_nrodni").removeAttr("disabled");
            $("#cbo_evento_listar").attr('disabled', false).trigger("liszt:updated");
            if (data == "vacio") {
                $("#msj_custom").html("<div class=\"alert alert-info\" style=\"background-color:#EED3D7; color:#B94A48; border-color: #EED3D7;\"><strong>Ingresar Un Numero de DNI V&aacute;lido</strong></div>");
                $("#msj_custom").fadeIn(1000);
                $("#msj_custom").fadeOut(5000);
            }
            else if (data == "existe") {
                $("#msj_custom").html("<div class=\"alert alert-info\" style=\"background-color:#EED3D7; color:#B94A48; border-color: #EED3D7;\"><strong>La Persona ya ha sido !REGISTRADA!</strong></div>");
                $("#msj_custom").fadeIn(1000);
                $("#msj_custom").fadeOut(5000);
                $("#txt_nrodni").removeAttr("disabled");
                $("#btn_ins_registrar").hide();
                $("#cbo_evento_listar").attr('disabled', false).trigger("liszt:updated");
            }
            else {
                $("#info_persona").html(data);
                $("#info_persona").show("slow");
                $("#cbo_evento_listar").attr('disabled', false).trigger("liszt:updated");
            }
        },
        error: function () {

        }
    });
}
function MostrarfechaActual(cNotFecha, Todos){
    if(Todos=='ALL'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 0,
            isRTL: false,
            yearRange: '1950:2012',
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }else if(Todos=='NA'){
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 0,
            isRTL: false,
     
            showMonthAfterYear: false,
            yearSuffix: '',
            minDate: new Date()
        });
    }
    var myDate = new Date();
//    $("#"+cNotFecha).datepicker('setDate',myDate);
}


