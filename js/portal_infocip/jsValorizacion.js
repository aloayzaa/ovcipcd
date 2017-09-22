$(function(){
     MostrarfechaActual("txt_ins_frm_c_ValFechaCaducidad","NA");
    $('#Tabs_Valorizacion').tabs();  //convierte a tabs 
    $("#tab_valorizacionlistado").bind('click', function(){
       get_page('valorizacion/load_listar_view_valorizacion/','div_qry');
    });
    $("#submitButton").bind('click', function(event){    //click en el boton buscar personas                                  
        get_page('valorizacion/get_Vista/qry_view','div_qry', {
            'criterio' : $('#txt_nombres').val()
            } );
    }); 
    //POPUP
      $("#btn_nuevocurso").bind({
        click: function(){
            
            set_popup("valorizacion/popupNuevoCurso/","Registrar curso",500,500,'',''); ;
            
        }
        
    }); 
    
})
function CursoCbo(){
    $.ajax({
        type: "POST",
         url: "valorizacion/CursoCbo",
        cache: false,
        success: function() {                
        },
        error: function() { 
        }              
    });   
}

$(document).ready(function(){
//    NewCKEditor("txt_ins_frm_c_ValDesripcionCurso");
    set_Date("txt_ins_frm_c_ValFechaCaducidad"); 
   
    
        $("#frm_ins_valorizacion").validate({
        rules: {
            txt_ins_frm_c_ValDesripcionCurso: {                
                required: true 
            //lettersonly: true
            },
            txt_ins_frm_c_ValFechaCaducidad: {
                required: true
            }          
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "valorizacion/valorizacionIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado la valorizacion correctamente!","e");
                           $("#txt_ins_frm_c_ValFechaCaducidad").val("");
                        limpiarForm(form);
                    }else{
                        mensaje("Error Inesperando registrando la valorizacion!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la valorizacion!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});
function valorizacionDel(n_ValId){
    var rdn=Math.random()*11;
    $.post('valorizacion/valorizacionDel/'+n_ValId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            get_page('valorizacion/load_listar_view_valorizacion/','div_qry');
            mensaje("se ha eliminadola valorizacion correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la valorizacion!","r");
        }                        
    });
    return false;
}

function MostrarfechaActual(txt_ins_frm_c_ValFechaCaducidad, Todos){
    if(Todos=='ALL'){
        $("#"+txt_ins_frm_c_ValFechaCaducidad).datepicker({
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
        $("#"+txt_ins_frm_c_ValFechaCaducidad).datepicker({
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
   //$("#"+c_ValFechaCaducidad).datepicker('setDate',myDate);
}

