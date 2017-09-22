$(document).ready(function(){
    
    MostrarfechaActual("txt_perito_fecha_inscripcionfin","NA");

    soloNumeros("#txt_perito_NroCip","keypress");
    soloLetras("#txt_perito_adscrito","keypress");
    
    $('#btn_asig_per').click(function(){
                          $("#btn_asig_per").attr("disabled", "disabled");
                     });
                     
    $('#btn_search_per').click(function(){ 
        
        if ($('#txt_perito_NroCip').val()){ 
            $("#txt_perito_NroCip").attr("disabled", "disabled");
            
            msgLoading("#preload_regcol");
            $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
                
            });
            timer=setTimeout("get_datos_colegiado('"+$('#txt_perito_NroCip').val()+"')",800);
             $("#Datos_Perito").hide(); 
             $("#mensaje").html("");
        }else{
            get_datos_colegiado('');
            
        }
    });
    
    
    $("#frm_ins_miembros").validate({
        rules: {
            $txt_perito_adscrito: {
                required: false,
                maxlength:80
            }  
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "miembrosperitos/miembrosIns",
                data: $(form).serialize(),
                success: function(msg){
                     
                    if(msg.trim()==1){                     
                        mensaje("Se ha registrado el perito correctamente!","e");
                        $("#btn_asig_per").removeAttr("disabled");
                        get_page('miembrosperitos/load_search_view_peritos/','BuscarPeritos');
                    }else{
                        mensaje("Este perito ya ha sido registrado!","a");  
                        $("#btn_asig_per").removeAttr("disabled");
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el perito!, vuelva a intentarlo");                        ;

                }
            });
        }
    });
    
    
});
function get_peritos_cip(Datos,especialidad,regcol,direccion,contacto,email,emailsec){
    $('#txt_nombre_completo').text(Datos);
    $('#txt_perito_Especialidad').text('Especialidad: '+especialidad);
    $('#txt_perito_codigo').text('Nro de CIP-CDLL: '+regcol);
    $('#txt_perito_datos_ins').val(Datos);
    $('#txt_perito_especialidad_ins').val(especialidad);
    $('#txt_perito_direccion_ins').val(direccion);
    $('#txt_perito_contacto_ins').val(contacto);
    $('#txt_perito_email_ins').val(email);
    $('#txt_perito_emailsec_ins').val(emailsec); 
}


function get_datos_colegiado(regcol){
    $.ajax({
        type: "POST",
       url: "miembrosperitos/get_datos_colegiado",
        cache: false,
        data: {
            regcol:regcol
        },
        success: function(data) {
            $("#preload_regcol").html("");
            $("#txt_perito_NroCip").removeAttr("disabled");
              
            if(data=="1"){
            msgAviso('#mensaje');
              
            }else{
                eval(data); 
                $("#Datos_Perito").css("display", "block");
                $("#img_adscrito").toggle(
                function(){
                  $("#Adscrito").show();  
                },
                function(){
                   $("#Adscrito").hide();
                }
            );
                
                
               
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function MiembrosDel(nPeritoId){
    var rdn=Math.random()*11;
    $.post('miembrosperitos/MiembrosDel/'+nPeritoId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado el perito correctamente.","e");
            get_page('miembrosperitos/load_qry_miembros/','ListaMiembros');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar el perito!","r");
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
    


