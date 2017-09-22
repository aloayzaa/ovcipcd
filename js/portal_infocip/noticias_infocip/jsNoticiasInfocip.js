
$(function(){  
       
        var contenedor = document.getElementById("div_ins2");
            contenedor.style.display = "none"; 
      
    MostrarfechaActual("txt_ins_noticiasinfocip_fecha","NA");
    $("#btn_fnd_noticiasinfocip").bind('click', function(){                       
        get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
       'criterio':$('#txt_fnd_noticiasinfocip_desc').val()
    }); 
 }); 
     $("#NoticiasInfocipListar").bind('click', function(){                       
      
  }); 

});

$(document).ready(function() {  
    set_Date("txt_ins_noticiasinfocip_fecha");
    NewCKEditor("txt_ins_noticiasinfocip_contenido");
    $("#frm_ins_noticiasinfociptrabajo").validate({
        rules: {     
            txt_ins_noticiasinfocip_fecha: {
                required: true
            },
            txt_ins_noticiasinfocip_titulo: {
                required: true
            },
            txt_ins_noticiasinfocip_sumilla: {
                required: true
            },
            txt_ins_noticiasinfocip_contenido: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "noticias_infocip/NoticiasInfocipIns",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){    
                        mensaje("se ha registrado la noticia correctamente!","e");
                        $("#txt_ins_noticiasinfocip_fecha").val("");
                        $("#txt_ins_noticiasinfocip_titulo").val(""); 
                        $("#txt_ins_noticiasinfocip_sumilla").val(""); 
                        $("#txt_ins_noticiasinfocip_contenido").val("");
                    }else{
                        mensaje("Error Inesperando registrando la noticia!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la noticia!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
}) 
    

function NoticiasInfocipDel(nNotCodigo){
    var rdn=Math.random()*11;
    $.post('noticias_infocip/NoticiasInfocipDel/'+nNotCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
         
            mensaje("se ha eliminado la noticia correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la noticia!","r");
        }                        
    });
      $(document).ready(function() {
    var valor = $("#tipos").val();
        get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
           criterio : valor
        });
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

function filtroTipo(valor){
    var idtipo = valor.options[valor.selectedIndex].value;
   get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
   criterio : idtipo
    });                    
}


//COMBO TIPO
    
$(document).ready(function() {


    $("#cboCurso").change(function() {   
        
        var cMatOpcion=($(this).val()); 
        if(cMatOpcion=='21'){           
            var contenedor = document.getElementById("div_ins2");
            contenedor.style.display = "block";    
                 var contenedor = document.getElementById("div_ins");
            contenedor.style.display = "none";  
            
            return true;
        }else{
            if(cMatOpcion=='18'){
                var contenedor = document.getElementById("div_ins2");
                contenedor.style.display = "none";
                  var contenedor = document.getElementById("div_ins");
                contenedor.style.display = "block";
                
            }
         
            
            if(cMatOpcion=='19'){
                var contenedor = document.getElementById("div_ins2");
                contenedor.style.display = "none";
                  var contenedor = document.getElementById("div_ins");
                contenedor.style.display = "block";
                
            }
        
            if(cMatOpcion=='20'){
                var contenedor = document.getElementById("div_ins2");
                contenedor.style.display = "none";
                  var contenedor = document.getElementById("div_ins");
                contenedor.style.display = "block";
                
            }
           
              }
    });        
});      
        
      
        


    
    
