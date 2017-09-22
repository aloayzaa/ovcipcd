$(document).ready(function() {  
    MostrarfechaActual("txt_ins_eve_fecha","NA");
     MostrarfechaActual("txt_ins_eve_fecha_inicio","NA");
    
    $('#Tabs_Eventos').tabs();  //convierte a tabs 
    var cont=0;
    $('#EventosListar').bind('click', function(){
        cont++;
        if(cont==1){
            msgLoading2("#qry_eventos");
        }
        get_page('eventos/load_listar_view_eventos/','qry_eventos');
        
    });
   $("#check_cuenta").on("click",checar);
   $("#check_horas").on("click",checarHoras);
     
    $("#frm_ins_eventos").validate({
        rules: {     
            txt_ins_eve_titulo: {
                required: true
            },
            txt_ins_eve_descripcion: {
                required: true
            },
            txt_ins_eve_fecha: {
                required: true
            },
            txt_ins_eve_fecha_inicio: {
                required: true
            },
            txt_ins_eve_cuenta_ingreso:{
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "eventos/eventosIns",
                data: $(form).serialize(),
                beforeSend:function(){
                    $("#proceso").html("Procesando...Espere un momento Por Favor");
                
                },
                success: function(msg){
                     $("#proceso").html("");
                     $("#resultado_cuenta").html("");
                    if(msg.trim()==1){   
                       //  $("#resultado_cuenta").html("<span class='ui-icon ui-icon-check'></span>");  
                        mensaje("se ha registrado el evento correctamente!","e");
                        limpiarForm(form);
                        
                    }
                    else if(msg.trim()==2){
                          mensaje("La cuenta de ingreso no existe","a");
                    }
                    else{
                        mensaje("La cuenta de ingreso ya existe para otro evento","a");                        
                    }                    
                },
                error: function(msg){                
                   mensaje("La cuenta de ingreso ya existe para otro evento.Vuelva a intentarlo","a"); 
                     
                }
            });
        }
    });   
    
});
  
function checar(){
    var valor;
    if($("#check_cuenta").is(':checked')) {
            // alert("holaaa");
      $('#txt_ins_eve_cuenta_ingreso').val('Sin Cuenta');
       document.getElementById('txt_ins_eve_cuenta_ingreso').readOnly = true;
              
        }
      else {
            $('#txt_ins_eve_cuenta_ingreso').val('');
        document.getElementById('txt_ins_eve_cuenta_ingreso').readOnly = false;
      
              }  
  
}    
function checarHoras(){
    var valor;
    if($("#check_horas").is(':checked')) {
            // alert("holaaa");
      $('#txt_ins_eve_horas').val('Sin Horas');
       document.getElementById('txt_ins_eve_horas').readOnly = true;
              
        }
      else {
            $('#txt_ins_eve_horas').val('');
        document.getElementById('txt_ins_eve_horas').readOnly = false;
      
              }  
  
}
function eventosDel(nNotCodigo){
    var rdn=Math.random()*11;
    $.post('eventos/eventosDel/'+nNotCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            get_page('eventos/load_listar_view_eventos/','qry_eventos');
            mensaje("se ha eliminado el evento correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
    return false;
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
            dateFormat: 'dd/mm/yy',
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

    
    
