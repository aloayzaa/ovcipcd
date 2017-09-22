$(function(){ 
    $('#Tabs_Horario').tabs();  //convierte a tabs
    $("#tab_horariolistar").bind('click', function(){
        document.getElementById('div_qry').innerHTML = "";
        document.getElementById('cbo_estado').value = "";
    });
})

$(document).ready(function(){
        soloNumeros("#txt_ins_hor_costo","keypress");
        soloNumeros("#txt_ins_hor_diaslimite","keypress");
        soloNumeros("#txt_ins_hor_cupoMax","keypress");
        soloNumeros("#txt_ins_hor_descuento","keypress");
        checkBox();
        DocentesCbo();
        $("#frm_ins_horario").validate({
        rules: {
            txt_ins_hor_horainicio: {
                required: true
            },
            txt_ins_hor_horafin: {
                required: true               
            },
            txt_ins_hor_ambiente: {
                required: true
            },
            cbo_ins_hor_docente: {
                required: true
            },
            cbo_ins_hor_curso: {
                required: true
            },
            txt_ins_hor_diaslimite:{
                required: true
            },
            txt_ins_hor_costo:{
                required: true
            },
            txt_ins_hor_cupoMax:{
                required: true
            },
            txt_ins_hor_fechas:{
                required: true
            }
        
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "horario/horarioIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==4){
                        mensaje("Ingrese una hora de inicio y fin valida!","r"); 
                    }
                    else{
                        if(msg.trim()==3){                     
                            mensaje("El Horario que desea registrar se cruza con un Horario Activo!, vuelva a intentarlo","r"); 
                        }else{
                                if(msg.trim()==1){
                                mensaje("Se ha registrado el horario correctamente!","e");
                                limpiarForm(form);
                                ocultardiv('DIV');
                                get_page('horario/load_qry_view_horariosActivos/','dataTableHorariosActivos');
                                DocentesCbo();
                                }
                                else{
                                    mensaje("Error Inesperado registrando el Horario!, vuelva a intentarlo","r");
                                }
                            }
                        }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperado!, vuelva a intentarlo");                        

                }
            });
        }
        
    }); 
});

function DocentesCbo(){
    $.ajax({
        type: "POST",
         url: "horario/docentesCbo",
        cache: false,
        success: function(data) {                
            if(data == "vacio"){                            
                $("#mostrarComboDocentes").html("No se encontraron registros");               
            
            }else {
                $("#mostrarComboDocentes").html(data); 
                $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
                $("#cbo_hor_docente").bind({
                    change: function(){                        
                        $('#cbo_hor_docente').valid();
                    }
                });
            }  
        },
        error: function() { 
            $("#mostrarComboDocentes").html("Error al cargar la data"); 
        }              
    });   
}

function horarioDel(idhorario){
    var rdn=Math.random()*11;
    $.post('horario/horarioDel/'+idhorario, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("Se ha eliminado el horario correctamente!","e");
            var val = cbo_estado.options[cbo_estado.selectedIndex].value;
            get_page('horario/load_listar_view_horario/','div_qry',{
                 criterio : val
            });
          
        }else{
            mensaje("Error inesperado, no se ha podido eliminar el horario!","r");
        }                        
    });
    return false;
}

function mostrardiv(id) {
div = document.getElementById(id);
document.getElementById('txt_ins_hor_descuento').textContent='0';
div.style.display ='block';

}

function ocultardiv(id) {
div = document.getElementById(id);
document.getElementById('txt_ins_hor_descuento').value='0';
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

function filtroEstado(valor){
    var val = valor.options[valor.selectedIndex].value;
    if(val != ""){
        if(val == 1){
            get_page('horario/load_listar_view_horarioActivos/','div_qry',{
            criterio : val
            }); 
        }
        else{
            get_page('horario/load_listar_view_horario/','div_qry',{
            criterio : val
            }); 
        }
    }
    else{
        alert("Seleccione un Estado valido.");
    }
}

function nuevaSesionRecuperacion(valor){
    var fechaAntes = valor.options[valor.selectedIndex].value;
    
    var anio = substr(fechaAntes, 6, 4);
    var mes = substr(fechaAntes, 3, 2);
    var dia = substr(fechaAntes, 0, 2);
    var fechaDespues = anio + "/" + mes + "/" +dia;
    
    $.ajax({
        type: "POST",
        url: "horario/mostrarSesionRecuperacion/"+fechaDespues,
        cache: false,
        success: function(data) {
            if(data!=""){
               $("#sesionRecuperacion").html(data);
               $("#sesionRecuperacion").hide().fadeIn(250);   
            }
            else{
                msgAviso("#sesionRecuperacion");
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function substr (str, start, len) {
  // Returns part of a string
  //
  // version: 909.322
  // discuss at: http://phpjs.org/functions/substr
  // +     original by: Martijn Wieringa
  // +     bugfixed by: T.Wild
  // +      tweaked by: Onno Marsman
  // +      revised by: Theriault
  // +      improved by: Brett Zamir (http://brett-zamir.me)
  // %    note 1: Handles rare Unicode characters if 'unicode.semantics' ini (PHP6) is set to 'on'
  // *       example 1: substr('abcdef', 0, -1);
  // *       returns 1: 'abcde'
  // *       example 2: substr(2, 0, -6);
  // *       returns 2: false
  // *       example 3: ini_set('unicode.semantics',  'on');
  // *       example 3: substr('a\uD801\uDC00', 0, -1);
  // *       returns 3: 'a'
  // *       example 4: ini_set('unicode.semantics',  'on');
  // *       example 4: substr('a\uD801\uDC00', 0, 2);
  // *       returns 4: 'a\uD801\uDC00'
  // *       example 5: ini_set('unicode.semantics',  'on');
  // *       example 5: substr('a\uD801\uDC00', -1, 1);
  // *       returns 5: '\uD801\uDC00'
  // *       example 6: ini_set('unicode.semantics',  'on');
  // *       example 6: substr('a\uD801\uDC00z\uD801\uDC00', -3, 2);
  // *       returns 6: '\uD801\uDC00z'
  // *       example 7: ini_set('unicode.semantics',  'on');
  // *       example 7: substr('a\uD801\uDC00z\uD801\uDC00', -3, -1)
  // *       returns 7: '\uD801\uDC00z'
  // Add: (?) Use unicode.runtime_encoding (e.g., with string wrapped in "binary" or "Binary" class) to
  // allow access of binary (see file_get_contents()) by: charCodeAt(x) & 0xFF (see https://developer.mozilla.org/En/Using_XMLHttpRequest ) or require conversion first?
  var i = 0,
    allBMP = true,
    es = 0,
    el = 0,
    se = 0,
    ret = '';
  str += '';
  var end = str.length;

  // BEGIN REDUNDANT
  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};
  // END REDUNDANT
  switch ((this.php_js.ini['unicode.semantics'] && this.php_js.ini['unicode.semantics'].local_value.toLowerCase())) {
  case 'on':
    // Full-blown Unicode including non-Basic-Multilingual-Plane characters
    // strlen()
    for (i = 0; i < str.length; i++) {
      if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
        allBMP = false;
        break;
      }
    }

    if (!allBMP) {
      if (start < 0) {
        for (i = end - 1, es = (start += end); i >= es; i--) {
          if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
            start--;
            es--;
          }
        }
      } else {
        var surrogatePairs = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;
        while ((surrogatePairs.exec(str)) != null) {
          var li = surrogatePairs.lastIndex;
          if (li - 2 < start) {
            start++;
          } else {
            break;
          }
        }
      }

      if (start >= end || start < 0) {
        return false;
      }
      if (len < 0) {
        for (i = end - 1, el = (end += len); i >= el; i--) {
          if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
            end--;
            el--;
          }
        }
        if (start > end) {
          return false;
        }
        return str.slice(start, end);
      } else {
        se = start + len;
        for (i = start; i < se; i++) {
          ret += str.charAt(i);
          if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
            se++; // Go one further, since one of the "characters" is part of a surrogate pair
          }
        }
        return ret;
      }
      break;
    }
    // Fall-through
  case 'off':
    // assumes there are no non-BMP characters;
    //    if there may be such characters, then it is best to turn it on (critical in true XHTML/XML)
  default:
    if (start < 0) {
      start += end;
    }
    end = typeof len === 'undefined' ? end : (len < 0 ? len + end : len + start);
    // PHP returns false if start does not fall within the string.
    // PHP returns false if the calculated end comes before the calculated start.
    // PHP returns an empty string if start and end are the same.
    // Otherwise, PHP returns the portion of the string from start to end.
    return start >= str.length || start < 0 || start > end ? !1 : str.slice(start, end);
  }
  return undefined; // Please Netbeans
}