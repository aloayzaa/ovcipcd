$(function(){ 
    Dte("txt_ins_ses_fecha");
    Dte("txt_ins_asi_fecha");
    $('#Tabs_DocenteCursos').tabs();  //convierte a tabs 
//    $("#btn_filtro").bind('click', function(){
//        get_page('cursosdocente/load_listar_view_cursosDocente/','div_qryCursos');
//    });
    $("#btn_asistencia").bind('click', function(){
        var idHorario = $('#cbo_cursos').val();
        set_popup("cursosdocente/popupAsistenciaAlumnos/"+idHorario,"Asistencia de Alumnos",520,500,'',''); 
    });
    $("#btn_notas").bind('click', function(){
        var idHorario = $('#cbo_cursos').val();
        set_popup("cursosdocente/popupNotasAlumnos/"+idHorario,"Notas de Alumnos",520,500,'',''); 
    });
    $("#btn_mostrarAlumnos").bind('click', function(){
        var idHorario = cbo_cursos.options[cbo_cursos.selectedIndex].value;
        var nombreCurso = cbo_cursos.options[cbo_cursos.selectedIndex].text;
        get_page('cursosdocente/load_listar_view_alumnosCurso/'+idHorario+'/'+nombreCurso,'div_qryAlumnos');                    
    });
    $("#btn_registrarSesion").bind('click', function(){
        var idHorario = $('#cbo_cursos').val();
        set_popup("sesion/popupInsSesion/"+idHorario,"Nueva Sesion",700,400,'',''); 
    });
    $("#btn_editarSesion").bind('click', function(){
        var idHorario = $('#cbo_cursos').val();
        set_popup("sesion/popupUpdSesion/"+idHorario,"Lista de Sesiones",500,200,'',''); 
    });
    $("#btn_adjuntarMaterial").bind('click', function(){
        var idHorario = $('#cbo_cursos').val();
        set_popup("cursosdocente/popupUploadMaterial/"+idHorario,"Adjuntar Material",400,300,'',''); 
    });
})

function reporteNotasAlumno(valor){
    var idPersona = strstr(valor, '-', true);
    var v = strstr(valor, '-')
    var idHorario = substr(v, 1);
    set_popup("cursosdocente/popupReporteNotasAlumno/"+idPersona+"/"+idHorario,"Reporte de Notas",520,500,'',''); 
}

function reporteAsistenciasAlumno(valor){
    var idPersona = strstr(valor, '-', true);
    var v = strstr(valor, '-')
    var idHorario = substr(v, 1);
    set_popup("cursosdocente/popupReporteAsistenciasAlumno/"+idPersona+"/"+idHorario,"Reporte de Asistencias",520,500,'',''); 
}

function filtro(valor1, valor2){
       var mes = valor1.options[valor1.selectedIndex].value;
       var anio = valor2.options[valor2.selectedIndex].value;
       var fecha = mes + "_" + anio;
       var idPersona = document.getElementById("hid_idPersona").value;
       
       var arreglo = idPersona + "-" + fecha;
       get_page('cursosdocente/load_listar_view_cursosDocente/','div_qryCursos',{
       criterio : arreglo
    });                    
}

function filtroAlumnos(valor){
       var idHorario = valor.options[valor.selectedIndex].value;
       var nombreCurso = valor.options[valor.selectedIndex].text;
       get_page('cursosdocente/load_listar_view_alumnosCurso/'+idHorario+'/'+nombreCurso,'div_qryAlumnos');                    
}

function Dte(cNotFecha, tipo){
    if(tipo=='NA'){//El datepicker 
        var c = new Date();
    
        var year_actual=c.getFullYear();
        var year=year_actual + 20;
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
            yearRange: "1950:"+year+"",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }
    
    
    var f = new Date();
    
    var yearactual=f.getFullYear();
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
        dateFormat: 'yy/mm/dd',
        firstDay: 0,
        yearRange: "1950:"+yearactual+"",
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $("#"+cNotFecha).attr("readonly", true); //inhabilita las cajas de texto
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
