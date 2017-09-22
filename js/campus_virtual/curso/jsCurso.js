$(function(){ 
    $('#Tabs_Curso').tabs(); 
    $("#tab_cursolistar").bind('click', function(){
        document.getElementById('div_qry').innerHTML = "";
        document.getElementById('cbo_tipo').value = "";
    });
    $("#tab_cursotemporales").bind('click', function(){
        document.getElementById('div_qryTemp').innerHTML = "";
        document.getElementById('cbo_tipo_Temporal').value = "";
    });
})

$(document).ready(function(){
    

        $("#frm_ins_curso").validate({
        rules: {
            txt_ins_cur_nombre: {                
                required: true 
            },
            txt_ins_cur_duracion: {
                required: true
            }         
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado el curso correctamente!","e");
                        limpiarForm(form);
                        $("#div_cantidadmodulos").html("");
                        $("#div_detallemodulo").html("");
                    }else{
                        mensaje("Error Inesperando registrando el curso!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});


function cursoEstado(idcurso){
    var rdn=Math.random()*11;
    $.post('curso/cursoEstado/'+idcurso, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
            mensaje("Se ha cambiado de estado al curso correctamente!","e");
            var tipo = cbo_tipo.options[cbo_tipo.selectedIndex].value;
            get_page('curso/load_listar_view_curso/','div_qry',{
                criterio : tipo
            }); 
          
        }else{
            mensaje("Error inesperado, no se ha podido cambiar estado de curso!","r");
        }                        
    });
    return false;
}

function mostrardiv(id) {
div = document.getElementById(id);
document.getElementById('txt_ins_cur_descuento').textContent='0';
div.style.display ='block';

}

function ocultardiv(id) {
div = document.getElementById(id);
document.getElementById('txt_ins_cur_descuento').value='0';
div.style.display='none';
}

function checkBox(){
    check=document.getElementById('check').checked;    
    if(check){
        mostrardiv('DIV');
//        document.getElementById('label').textContent=document.getElementById('check').show()+'Ocultar Ingreso de Descuento:';
    }
    else{
        ocultardiv('DIV');
//        document.getElementById('label').textContent=document.getElementById('check').show()+'Mostrar Ingreso de Descuento:';
    }
} 

function cbo_tipo_ins(){
    var tipo = $("#cbo_ins_cur_tipo").val();
    if( tipo=='DIPLOMADO'|| tipo=='DIPLOMADO-IEPI'){
        $("#div_cantidadmodulos").html('<label id="label" class="control-label">N° Modulos: </label>  \n\
                                        <div class="controls"> \n\
                                            <input onkeyup="mostrarmodulodetalle()" type="text" id="cantidad_modulo" name="cantidad_modulo" class="input-medium input-prepend tip">\n\
                                        \n\
                                         </div>')
    }
    else{
         $("#div_cantidadmodulos").html("");
          $("#div_detallemodulo").html("");
    }

}
function mostrarmodulodetalle(){
   
    var cantidad=$("#cantidad_modulo").val();

        var cad="";
        var i=1;
        for(i=1;i<=cantidad;i++){
            cad=cad+'<div class="control-group" >\n\
                        <label id="label" class="control-label">Modulo '+i+'</label>\n\
                            <div class="controls">'
                             +'<input type="text" id="detalle'+i+'" name="detalle'+i+'">\n\
                            </div>\n\
                    </div>';
   
               
        }
        $("#div_detallemodulo").html(cad);
  
  
    
}


function filtroTipo(valor){
    var tipo = valor.options[valor.selectedIndex].value;
       get_page('curso/load_listar_view_curso/','div_qry',{
       criterio : tipo
    });                    
}
function filtroTipoTemporal(valor){
    var tipo = valor.options[valor.selectedIndex].value;
       get_page('curso/load_listar_view_cursosTemporales/','div_qryTemp',{
       criterio : tipo
    });                    
}

function initEvtAsig(url,title,alto,ancho,func_close){              
    $(".ui-icon-wrench").each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            set_popup(url+$(fila).attr('id'),title,alto,ancho,'',func_close);                                                  
        })
    });
}
function initEvtDet(url,title,alto,ancho,func_close){              
    $(".ui-icon-copy").each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            set_popup(url+$(fila).attr('id'),title,alto,ancho,'',func_close);                                                  
        })
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
