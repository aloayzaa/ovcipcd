$(function(){ 
    MostrarfechaActual("txt_ins_notempre_fecha","NA");
       
    $("#radios_empresa").buttonset(); 
    $("#NoticiasEmpresarialListar").bind('click', function(){                       
        get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
    }); 
    // Realiza la búsqueda con el botón
    $("#btn_fnd_empresas").bind('click', function(){  
        
        var cPerNombres;
        var Ruc;
        var Rubro;

        if ($('input:radio[name=rdbtipbus]')[0].checked) {
            cPerNombres=$("#txt_fnd_emp_desc").val();
            Ruc='a';
            Rubro='a';
        }
        else if($('input:radio[name=rdbtipbus]')[1].checked){
            cPerNombres='a';
            Ruc=$("#txt_fnd_emp_desc").val();
            Rubro='a';
        } 
        else if($('input:radio[name=rdbtipbus]')[2].checked){
            cPerNombres='a';
            Ruc='a';
            Rubro=$("#txt_fnd_emp_desc").val();
        }
        get_page('empresas/load_listar_view_empresa/','c_qry_emp', {
            'cPerNombres' : cPerNombres,
            'Ruc' : Ruc,
            'Rubro' : Rubro
        }); 
    });
    // end busqueda button
    
    //funcionnes al momento de hacer clic en los radios de empadronamiento
    
    $('#radio_emp1').click(function(){
        
        $("#txt_fnd_emp_desc").hide().fadeIn(250);
        $("#btn_fnd_empresas").hide().fadeIn(250);
        $("#txt_fnd_emp_desc").val("");
        $("#txt_fnd_emp_desc").attr("maxlength", "50");    
        $("#txt_fnd_emp_desc").css({
            width:"310"
        });
        
        unbindAttr("#txt_fnd_emp_desc","keypress");
        letras("#txt_fnd_emp_desc","keypress");                            

    });
    
    $('#radio_emp2').click(function(){
        $("#txt_fnd_emp_desc").hide().fadeIn(250);
        $("#btn_fnd_empresas").hide().fadeIn(250);
        $("#txt_fnd_emp_desc").val("");
        $("#txt_fnd_emp_desc").attr("maxlength", "11");    
        $("#txt_fnd_emp_desc").css({
            width:"100"
        });
        unbindAttr("#txt_fnd_emp_desc","keypress");
        soloNumeros("#txt_fnd_emp_desc","keypress");                            

    });
    
    $('#radio_emp3').click(function(){
        $("#txt_fnd_emp_desc").hide().fadeIn(250);
        $("#btn_fnd_empresas").hide().fadeIn(250);
        $("#txt_fnd_emp_desc").val("");
        $("#txt_fnd_emp_desc").attr("maxlength", "50");    
        $("#txt_fnd_emp_desc").css({
            width:"200"
        });
        
        unbindAttr("#txt_fnd_emp_desc","keypress");
        letras("#txt_fnd_emp_desc","keypress");  
    });
// End funciones
   
});


$(document).ready(function() {  
    set_Date("txt_ins_notempre_fecha");
    $(".chzn-select").chosen();
    
    $("#cbo_tnoticia").on("change",mostrarEvento);
    
    NewCKEditor("txt_ins_notempre_contenido");
    $("#frm_ins_noticiasempresarial").validate({
        rules: {     
            txt_ins_notempre_fecha: {
                required: true
            },
            txt_ins_notempre_titulo: {
                required: true
            },
            txt_ins_notempre_sumilla: {
                required: true
            },
            txt_ins_notempre_contenido: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "noticiasempresariales/NoticiasEmpresarialIns",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){    
                        mensaje("se ha registrado la noticia empresarial correctamente!","e");
                        $("#txt_ins_notempre_fecha").val("");
                        $("#txt_ins_notempre_titulo").val(""); 
                        $("#txt_ins_notempre_sumilla").val(""); 
                        $("#txt_ins_notempre_contenido").val("");
                    }else{
                        mensaje("Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la noticia empresarial!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) ;
    
function mostrarEvento(){
      var evento = $("#cbo_tnoticia").val();
     // alert(evento);
     if(evento==17){
        // alert("jajaja");
       // document.getElementById("cbo_ins_notempre_evento").disabled=false;
        
        $("#div_evento").removeClass("ocultardiv");
         // $("#cbo_ins_notempre_evento").attr('disabled', false);
      }
      else{
          $("#div_evento").removeClass("ocultardiv");
          $("#div_evento").addClass("ocultardiv");
       
      }
    
}
    
function NoticiasEmpresarialDel(nNotCodigo){
    var rdn=Math.random()*11;
    $.post('noticiasempresariales/NoticiasEmpresarialDel/'+nNotCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
            mensaje("se ha eliminado la noticia empresarial correctamente!","e");
          
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

    
    
