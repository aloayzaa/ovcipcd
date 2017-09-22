$(document).ready(function(){
        soloNumeros("#txt_upd_hor_costo","keypress");
        soloNumeros("#txt_upd_hor_diaslimite","keypress");
        soloNumeros("#txt_upd_hor_cupoMax","keypress");
        soloNumeros("#txt_upd_hor_descuento","keypress");
        $("#frm_upd_horario").validate({
        rules: {
            txt_upd_hor_horainicio: {
                required: true
            },
            txt_upd_hor_horafin: {
                required: true               
            },
            cbo_hor_docente: {
                required: true
            },
            cbo_upd_hor_curso: {
                required: true
            },
            txt_upd_hor_diaslimite:{
                required: true
            },
            txt_upd_hor_fechas: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "horario/horarioUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==3){                     
                        mensaje("El Horario que desea modificar se cruza con un Horario Activo!, vuelva a intentarlo","r"); 
                    }else{
                        if(msg.trim()==1){
                           mensaje("Se ha modificado el horario correctamente!","e");
                           limpiarForm(form);
                           $('.popedit').dialog('close'); 
                           var val = cbo_estado.options[cbo_estado.selectedIndex].value;
                           get_page('horario/load_listar_view_horarioActivos/','div_qry',{
                                criterio : val
                           }); 
                        }
                        else{
                            mensaje("Error Inesperado modificando el Horario!, vuelva a intentarlo","r");
                        }
                    }
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando modificando el Horario!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
    $("#frm_ins_inasistencia").validate({
        rules: {
            txt_ins_ses_fecha: {
                required: true
            },
            txt_ins_ses_observacion: {
                required: true               
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "horario/sesionRecuperacionIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                       mensaje("Se ha registrado la sesion de recuperacion correctamente!","e");
                       $('.popedit').dialog('close'); 
                    }
                    else{
                        mensaje("Error Inesperado registrando sesion de recuperacion!, vuelva a intentarlo","r");
                    }
                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperado registrando sesion de recuperacion!, vuelva a intentarlo");                        ;

                }
            });
        }
    });
    
    $("#frm_upd_prorroga").validate({
        rules: {
            txt_upd_hor_fechaProrroga: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "horario/horarioUpdProrroga",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                if(msg.trim()==1){
                   mensaje("Se ha modificado la fecha de prorroga correctamente!","e");
                   $('.popedit').dialog('close');  
                }
                else{
                    mensaje("Error Inesperado modificando la fecha de prorroga!, vuelva a intentarlo","r");
                }
                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperado modificando la fecha de prorroga!, vuelva a intentarlo");                        ;

                }
            });
        }
    });
    
});

function nuevaSesionRecuperacion(valor){
    var cadena = valor.options[valor.selectedIndex].value;
    var idSesion = strstr(cadena, '_', true);
    var v = strstr(cadena, '_')
    var fechaAntes = substr(v, 1);
    var anio = substr(fechaAntes, 6, 4);
    var mes = substr(fechaAntes, 3, 2);
    var dia = substr(fechaAntes, 0, 2);
    var fechaDespues = anio + "-" + mes + "-" +dia;
    
    var concatenado = idSesion + "_" + fechaDespues;
    
    $.ajax({
        type: "POST",
        url: "horario/mostrarSesionRecuperacion/"+concatenado,
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

function strstr (haystack, needle, bool) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: Onno Marsman
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // *     example 1: strstr('Kevin van Zonneveld', 'van');
  // *     returns 1: 'van Zonneveld'
  // *     example 2: strstr('Kevin van Zonneveld', 'van', true);
  // *     returns 2: 'Kevin '
  // *     example 3: strstr('name@example.com', '@');
  // *     returns 3: '@example.com'
  // *     example 4: strstr('name@example.com', '@', true);
  // *     returns 4: 'name'
  var pos = 0;

  haystack += '';
  pos = haystack.indexOf(needle);
  if (pos == -1) {
    return false;
  } else {
    if (bool) {
      return haystack.substr(0, pos);
    } else {
      return haystack.slice(pos);
    }
  }
}