$(document).ready($(function(){
      
      MostrarfechaActual("txt_perito_fecha_fin","NA");

      $('#btn_seleccionar').click(function(){
          $('#datos input[type=checkbox]').attr('checked', true);
      });
      $('#btn_deseleccionador').click(function(){
          $('#datos input[type=checkbox]').attr('checked', false);
      });
  }));
  function refreshrenovacion(){
      
       get_page('miembrosperitos/reload_renovacion/','RenovacionPeritos');
         
  }
 function actualizarplantilla(){
   var contaop = 0;
   var input = document.getElementById('txt_perito_fecha_fin').value;
    
    $(".opciones").each(function() 
    {
        if(this.checked)
        {
            contaop=1;
           
        }
    });
    
    if (contaop==1){
         if(input == ""){
       mensaje("Ingrese la fecha de renovación","a");    
        } 
        else{
           $(".opciones").each(function() 
        {
            if(this.checked)
            {
                nOpCodigo = this.value;
                
               $.post("miembrosperitos/RenovacionPlanilla/"+nOpCodigo+"/"+input); 
            }
        });
        
       mensaje("Se ha renovado el perito/s correctamente!","e"); 
       $("#RenovacionPeritos").css("display", "none");
       refreshrenovacion();  
        }
        
       
    }
    else{
        mensaje("Debes seleccionar por lo menos una opción","a");
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
            dateFormat: 'yy-mm-dd',
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