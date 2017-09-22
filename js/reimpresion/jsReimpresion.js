$(document).ready(function() {  
     MostrarfechaActual("fechainicio","ALL");
     MostrarfechaActual("fechafin","ALL");
    
    $('#Tabs_Eventos').tabs();  //convierte a tabs 
   
    /*$('#EventosListar').bind('click', function(){
        cont++;
        if(cont==1){
            msgLoading2("#qry_eventos");
        }
        get_page('reimpresion/load_listar_view_eventos/','qry_certificados');
        
    });*/
    $("#listarCertificados").on("click",listarCertificados);   
    
});
function listarCertificados(){
    //alert("dsakdsakldsakldsakldsa");
    var tipo=$("#tipoCertificado").val();
    var fechainicio=$("#fechainicio").val();
    var fechafin=$("#fechafin").val();
    if(fechainicio=='' && fechafin==''){
        alert("Seleccione Rango de fechas");
    }
    else if (fechainicio=='') {
         alert("Seleccione Fecha Inicial de Rango");
    }
    else if (fechafin=='') {
          alert("Seleccione Fecha Fin de Rango");
    }
    else {
        var data={tipo:tipo,fechainicio:fechainicio,fechafin:fechafin};

        $.ajax({
                    data:  data,
                    url:   'reimpresion/load_listar_view_certificados/',
                    type:  'post',
                    beforeSend: function () {

                         msgLoading2("#qry_certificados");
                    },
                    success:  function (response) {
                        $("#qry_certificados").html(response);
                    },
                    error:function(){
                         mensaje("Se ah generado un error al generar certificado!","r");
                           $("#preload2").html("");
                    }

                 });
    }
    
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
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            isRTL: false,
            yearRange: '2014:2025',
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
            dateFormat: 'dd/mm/yy',
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

    
    
