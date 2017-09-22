
$(function(){  
    MostrarfechaActual("txt_ins_anuncio_fecha","NA");
    $("#btn_fnd_anuncio").bind('click', function(){                       
        get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio',{
       'criterio':$('#txt_fnd_anuncio_desc').val()
    }); 
 }); 
     $("#AnuncioListar").bind('click', function(){                       
          get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio');
  }); 

});

$(document).ready(function() {  
    set_Date("txt_ins_anuncio_fecha");
    NewCKEditor("txt_ins_anuncio_contenido");
    $("#frm_ins_anunciotrabajo").validate({
        rules: {     
            txt_ins_anuncio_fecha: {
                required: true
            },
            txt_ins_anuncio_titulo: {
                required: true
            },
                txt_ins_anuncio_sumilla: {
                required: true
            },
            txt_ins_anuncio_contenido: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "anuncio/AnuncioIns",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){    
                        mensaje("se ha registrado el anuncio correctamente!","e");
                        $("#txt_ins_anuncio_fecha").val("");
                        $("#txt_ins_anuncio_titulo").val("");         
                        $("#txt_ins_anuncio_sumilla").val(""); 
                        $("#txt_ins_anuncio_contenido").val("");
                    }else{
                        mensaje("Error Inesperando registrando el anuncio!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el anuncio!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 
    

function AnuncioDel(nNotCodigo){
    var rdn=Math.random()*11;
    $.post('anuncio/AnuncioDel/'+nNotCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio');
            mensaje("se ha eliminado el anuncio correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar anuncio!","r");
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

    
    
