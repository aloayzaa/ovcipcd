
$(function(){  
    MostrarfechaActual("txt_ins_bolsa_fecha","NA");
    $("#btn_fnd_bolsa").bind('click', function(){                       
        get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa',{
       'criterio':$('#txt_fnd_bolsa_desc').val()
    }); 
 }); 
     $("#BolsaTrabajoListar").bind('click', function(){                       
          get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa');
  }); 

});

$(document).ready(function() {  
    set_Date("txt_ins_bolsa_fecha");
    NewCKEditor("txt_ins_bolsa_contenido");
    $("#frm_ins_bolsatrabajo").validate({
        rules: {     
            txt_ins_bolsa_fecha: {
                required: true
            },
            txt_ins_bolsa_titulo: {
                required: true
            },
            txt_ins_bolsa_sumilla: {
                required: true
            },
            txt_ins_bolsa_contenido: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "bolsa_trabajo/BolsaTrabajoIns",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){    
                        mensaje("se ha registrado la bolsa de trabajo correctamente!","e");
                        $("#txt_ins_bolsa_fecha").val("");
                        $("#txt_ins_bolsa_titulo").val(""); 
                        $("#txt_ins_bolsa_sumilla").val(""); 
                        $("#txt_ins_bolsa_contenido").val("");
                    }else{
                        mensaje("Error Inesperando registrando la bolsa de trabajo!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la bolsa de trabajo!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 
    

function BolsaTrabajoDel(nNotCodigo){
    var rdn=Math.random()*11;
    $.post('bolsa_trabajo/BolsaTrabajoDel/'+nNotCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa');
            mensaje("se ha eliminado la bolsa de trabajo correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar bolsa!","r");
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
}

    
    
