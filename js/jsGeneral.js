function initEvtDel(funcion){ 
    $(".ui-icon-trash").on("click",function(e){
        e.preventDefault();
        var fila = $(this).parents('tr');
        var fn =""+funcion+"("+$(fila).attr('id')+")"; 
        confirmar("Confirmar","¿Seguro que desea retirar el registro seleccionado?",fn);
    });
}

function initEvtUpd(url,title,alto,ancho,func_close){              
    $(".ui-icon-pencil").each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            set_popup(url+$(fila).attr('id'),title,alto,ancho,'',func_close);                                                  
        })
    });
}
///Prue///////////

function initEvtOpcId2(clase_icono,funcion,parametros){ 

    $(".ui-icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            var idObj = $(fila).attr('id'); 
            var param;
            if (parametros != undefined && parametros != '') {
                param = parametros+","+idObj;              
            }else{
                param = idObj;
            }
            if (funcion != undefined && funcion != '') {
                var fn =""+funcion+"("+param+")";                 
                eval(fn);
            }else{
                console.log("La Funcion No Se Encuentra Definida");
            }            
        })
    });    
}
function msgbox(title,msg,tipo,funcion){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
    $(function() {              
        if (tipo == 'confirmar') {
            var imagen = "<img src='images/ico_alerta.png' width='14' height='14'>"
                    
            //creamos la etiqueta div
            $( "body" ).append( "<div id='message"+randomnumber+"' title='"+title+"'>"+imagen+"<p>"+msg+"</p></div>");
                    
            $( "#message"+randomnumber ).dialog({
                modal: true,
                draggable: false,                
                buttons: {
                    Si: function() {
                        eval(funcion);
                        $( this ).dialog( "close" );
                    },
                    No: function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    $("#message"+randomnumber).remove();
                }
            });
                    
        }else{
            if (tipo == 'error') {
                var imagen = "<img src='images/error.png' width='14' height='14'>"
            }
            if (tipo == 'alerta') {
                var imagen = "<img src='images/ok.png' width='14' height='14'>"
            }
                    
            //creamos la etiqueta div
            $( "body" ).append( "<div id='message"+randomnumber+"' title='"+title+"'>"+imagen+"<p>"+msg+"</p></div>");
                    
            $( "#message"+randomnumber ).dialog({
                modal: true,
                draggable: false,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    $("#message"+randomnumber).remove();
                }
            });
        }
                

    });
}
function verifica_clave(){
    $.post('index/cambiar_clave',function(data){
            if(data=="1"){
                msgbox("Oficina Virtual","!URGENTE� Para mayor seguridad, debe cambiar su contrase�a.","confirmar","show_popupCambiarClave()");
                setTimeout("verifica_clave()",30000);
            }
        });   
   }
function initEvtOpc(clase_icono,funcion){    
    $(".ui-icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            eval(funcion);
        })
    });    
}

function initEvtOpcId(clase_icono,funcion,parametros){ 
    /*
*@parametros : solo aceptara datos con formato Objeto Json
*@parametros : devolvera un objeto json (por el momento)
*/   
    $(".ui-icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            var idObj = $(fila).attr('id'); 
            var param;
            if (parametros != undefined && parametros != '') {
                param = new Object(parametros);
                param.cx = idObj;               
            }else{
                param = idObj;
            }
            if (funcion != undefined && funcion != '') {
                var fn =""+funcion+"("+param+")";                 
                eval(fn);
            }else{
                console.log("La Funcion No Se Encuentra Definida");
            }            
        })
    });    
}
/*Funcion para obtener datos seleccionados con check*/
function initEvtChk(){
    var i=0;
    var checks=new Array();
    $("input[type='checkbox']:checked").each(function(){
        checks[i]= this.id.substring(9);
        i++;
    });
    return checks;
}
//Inicializar Evento Con Opcion Popup Con Envio Id Como Parametro
function initEvtOpcPopupId(clase_icono,url,title,alto,ancho,func_close){
    $(".ui-icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            set_popup(url+$(fila).attr('id'),title,alto,ancho,'',func_close); 
        })
    });    
}

function confirmar(title,msg,funcion){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));   
    $(".msgdlg" ).dialog( "destroy" );    
    $("body").append( "<div id='messageconfirma"+randomnumber+"' class='msgdlg' title='"+title+"'>"+msg+"</div>");
    if (funcion != undefined && funcion != '') {
        $("#messageconfirma"+randomnumber).dialog(
        {
            autoOpen: true,
            draggable: false,  
            height: 200,
            modal: true,
            position: 'center',
            resizable: false,            
            width: 300,
            buttons: {
                'Si': function() {
                    try{
                        eval(funcion);
                        $(this).dialog( 'close' );
                    }catch(er){
                        console.log(er);
                    }
                },
                'No': function() {
                    $(this).dialog( 'close' );
                }
            },
            close: function() {
                $(this).dialog('destroy').remove();
                $("#messageconfirma"+randomnumber).remove();
            }
        }
        );    
    }
}

function mensaje(msg,tip){
    if (tip=='e'){
        $.jGrowl(msg, {
            header:'¡EXITO!', 
            theme: 'mexito'
        });
    }
    else if (tip=='r') {
        $.jGrowl(msg, {
            header:'¡ERROR INESPERADO!', 
            theme: 'merror'
        });    
    } else if (tip=='a'){    
        $.jGrowl(msg, {
            header:'¡CUIDADO!', 
            theme: 'malerta'
        });
    }    
}

function get_Busqueda(Url,div_name,accion,Parametros) {
    $(function(){        
        $('#'+Objcaja).keydown(function(event){
            if (event.keyCode == "13"){ 
                $.post(Url+Parametros, {        
                    accion:accion
                }, function(data){                     
                    $('#'+div_name).html(data);
                });
                
            }
        });    
    });        
}

function get_page(Url,div_name,parametro){
    var Rdn=(Math.floor(Math.random()*11));  
    $.post(Url, {
        Rdn:Rdn,        
        json:parametro    
    }, function(data){ 
        data = data.trim();  
        $('#'+div_name).html(data);       

    });
}

var y=0;
function set_popup(url,title,ancho,alto,parametro,func_close){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
 
    //    $(".popedit" ).remove();
    //    $(".popedit" ).dialog( "destroy" ); 
    $("body").append("<div id='popupEdicion"+randomnumber+"' class='popedit' title='"+title+"'><div id='cuerpo'></div></div>");           
    msgPreloaderPopup("#cuerpo");
$("#popupEdicion"+randomnumber).dialog({          
        autoOpen:false,      
        position: 1, //0=TOP        
        width:ancho,
        Height:'auto',
        minHeight:alto,
        resizable: false,
        modal:true ,
        open: function(event,ui){
            get_page(url,this.id,parametro);
        },
        close: function(){      
            eval(func_close);
            $(this).dialog('destroy').remove();                        
            
        }     
    });    
    $("#popupEdicion"+randomnumber).dialog('open');
    //return $("#popupEdicion"+randomnumber);
}
function msgPreloaderPopup(obj,msg){
    if(msg == undefined){
        $(obj).html("<div align=center><br><bR><br><img src=http://i.imgur.com/MT7hiIV.gif ><br>Cargando...</div>");
    }
}

function msgLoadinginfo(obj, msg) {
    if (msg == undefined) {
        $(obj).html("<center><div><img src='../images/preload_info.gif'><br>Cargando...</div></center>");
    }
}
function set_Date(cNotFecha, tipo){
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
            dateFormat: 'dd/mm/yy',
            yearRange: "1935:"+year+"",
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
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        yearRange: "1935:"+yearactual+"",
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $("#"+cNotFecha).attr("readonly", true); //inhabilita las cajas de texto
}

function ValidarRangoFechas(cNotFechaInicial, cNotFechaFinal, dateFormat){
    var formatoFecha = dateFormat == undefined ? "dd/mm/yy" : dateFormat;
    var dates = $( "#"+cNotFechaInicial+", #"+cNotFechaFinal+"" ).datepicker({
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
        dateFormat: formatoFecha,
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        yearRange:'1970:2050',
        onSelect: function( selectedDate ) {
            var option = this.id == ""+cNotFechaInicial+"" ? "minDate" : "maxDate",
            instance = $( this ).data( "datepicker" ),
            date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            dates.not( this ).datepicker( "option", option, date );
        }
    });
    $("#"+cNotFechaInicial).attr("readonly", true); 
    $("#"+cNotFechaFinal).attr("readonly", true); 
    var myDate = new Date();
    $("#"+cNotFechaInicial).datepicker('setDate',myDate);
}

function hasEventListener(element, eventName, namespace) {
    var returnValue = false;
    var events = $(element).data("events");
    if (events) {
        $.each(events, function (index, value) {
            if (index == eventName) {
                if (namespace) {
                    $.each(value, function (index, value) {
                        if (value.namespace == namespace) {
                            returnValue = true;
                            return false;
                        }
                    });
                }
                else {
                    returnValue = true;
                    return false;
                }
            }
        });
    }
    return returnValue;
}

/* CREADOR DE DATA-TABLES - CONSTRUYE UNA GRILLA PAGINADA */
function paginaDataTable(dataTable) {
    // definiciones por defecto  
    dataTable["ordenaPor"] = (dataTable["ordenaPor"] != undefined) ? dataTable["ordenaPor"] : [[0,"desc"]]; 
    dataTable["desactOrdenaEn"] = (dataTable["desactOrdenaEn"] != undefined) ? dataTable["desactOrdenaEn"] : [];
    dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
    dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
    
    // funcionalidad js           
    $("#"+dataTable["tabla"]+"").dataTable({
        "bJQueryUI"             :     dataTable["JQueryUI"],
        "sPaginationType"       :     "full_numbers",
        "iDisplayLength"        :     dataTable["filsXpag"],
        "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix"      :     "",
            "sInfoThousands"    :     ",",
            "sLengthMenu"       :     "Mostrar _MENU_ registros",
            "sLoadingRecords"   :     "Cargando...",
            "sProcessing"       :     "Procesando...",
            "sSearch"           :     "Buscar:",
            "sZeroRecords"      :     "No se encontraron resultados",
            "oPaginate"         :     {
                "sFirst"        :     "Primero",
                "sLast"         :     "Último",
                "sNext"         :     "Siguiente",
                "sPrevious"     :     "Anterior"
            },
            "oAria"             : {
                "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                "sSortDescending"   :     ": activar para Ordendar Descendentemente"
            }
        },
        "aoColumnDefs"          :       [{            
            "aTargets"          :       dataTable["desactOrdenaEn"], // desactivar ordenamiento en cols... 
            "bSortable"         :       false     
        }],    
        "aaSorting"             :       dataTable["ordenaPor"]  
    });
}


function paginaDataTable2(dataTable) {
    // definiciones por defecto  
    dataTable["ordenaPor"] = (dataTable["ordenaPor"] != undefined) ? dataTable["ordenaPor"] : [[0,"desc"]]; 
    dataTable["desactOrdenaEn"] = (dataTable["desactOrdenaEn"] != undefined) ? dataTable["desactOrdenaEn"] : [];
    dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
    dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
    
    // funcionalidad js           
     $("#"+dataTable["tabla"]+"").dataTable({
        "bJQueryUI"             :     dataTable["JQueryUI"],
        "sPaginationType"       :     "full_numbers",
        "iDisplayLength"        :     dataTable["filsXpag"],
            dom: 'T<"clear">lfrtip',
         "tableTools": {
            "sSwfPath": "http://www.cip-trujillo.org/ovcipcdll/swf/copy_csv_xls_pdf.swf",
            "aButtons": ["xls", "pdf", "copy", "print"]
        },   "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix"      :     "",
            "sInfoThousands"    :     ",",
            "sLengthMenu"       :     "Mostrar _MENU_ registros",
            "sLoadingRecords"   :     "Cargando...",
            "sProcessing"       :     "Procesando...",
            "sSearch"           :     "Buscar:",
            "sZeroRecords"      :     "No se encontraron resultados",
            "oPaginate"         :     {
                "sFirst"        :     "Primero",
                "sLast"         :     "Último",
                "sNext"         :     "Siguiente",
                "sPrevious"     :     "Anterior"
            },
            "oAria"             : {
                "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                "sSortDescending"   :     ": activar para Ordendar Descendentemente"
            }
        },
        "aoColumnDefs"          :       [{            
            "aTargets"          :       dataTable["desactOrdenaEn"], // desactivar ordenamiento en cols... 
            "bSortable"         :       false     
        }],    
        "aaSorting"             :       dataTable["ordenaPor"]  
    });
}

/* CREA AUTOCOMPLETE - en evaluacion*/
function creaAutocomplete(autocomplete){
    $("#"+autocomplete["value"]+"").autocomplete({
        source: autocomplete["url"],
        minLength: 3,
        select: function(event, ui){            
            $("#"+autocomplete["id"]+"").val(ui.item.id);
            if (autocomplete["funcion"] != undefined) eval (autocomplete["funcion"]);                  
        }
    }); 
} 

/* LIMPIA UN FORMULARIO */
function limpiarForm(obj) {
    // enaviar asi: limpiarForm('#miForm');
    $(':input', $(obj)).each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase();      
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'hidden')
            this.value = '';       
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = 0; //-1
    });
}


function limpiarFormBli(obj) {
    // enaviar asi: limpiarForm('#miForm');
    $(':input', $(obj)).each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase();      
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'hidden')
            this.value = '';       
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
    });
}

/* MASCARAS */
function mascaraCelular(obj){
    $(obj).mask("999-999-999");
}
function msgLoadingCbo(obj, msg) {
    if (msg == undefined) {
        $(obj).html("<div align=center style=width:150px;height:20px;><img src='../images/loading.gif'><br>Cargando...</div>");
    }
}
/* MENSAJERIA */
function msgLoading(obj,msg){
    if(msg == undefined){
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><div class='gif_loading'></div>&nbsp;Cargando ... por favor espere.</div>");
    }else{
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><div class='gif_loading'></div>&nbsp;"+" "+msg+"</div>");
    }
}
function msgLoading2(obj, msg) {
    if (msg == undefined) {
        $(obj).html("<center><div align=center style=width:700px;height:400px;><br><br><br><br><br><img src=http://i.imgur.com/5ZNKENQ.gif ><br>Cargando...</div></center");
    }
}
function msgAviso(obj,msg){ 
    if(msg == undefined){
        $(obj).html("<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> No se encontraron registros.</div>");
    }else{
        $(obj).html("<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> "+msg+"</div>");
    }
}

// mensaje de informacion con opcion de cerrarlo desde una X
function msgInfo(obj,msg){ 
    if(msg == undefined){
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><a href="#" data-dismiss="alert" class="close">×</a><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>No se encontraron registros.</div></div>');
    }else{
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><a href="#" data-dismiss="alert" class="close">×</a><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>'+msg+'</div></div>');
    }
}

function msgError(obj,msg){ 
    if(msg == undefined){
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> Ha ocurrido un error, vuelva a intentarlo.</div>");
    }else{
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> "+msg+"</div>");
    }
}

function msgAlerta(obj,msg){ 
    $(obj).html("<div id='msg_alert' class='alert alert-alert'><span class='ui-icon ui-icon-info' style='float: left; margin-right: .3em;'></span> <strong>¡Cuidado! ... </strong> "+msg+"</div>");
}

function msgLoadSave(obj,btn){ //preload al costado del boton
    $(btn).attr("disabled", "true");
    $(obj).html("<div id='msg_saving' style='display:inline;'><img src='../img/loading.gif'/></div>");
}

function msgLoadSaveRemove(btn){
    $("#msg_saving").remove()
    $(btn).removeAttr("disabled");
}

function initEvtClosePopup(objCerrar,ObjPopup){
    $(objCerrar).click(function(){
        $(ObjPopup).dialog("close");   
    })    
}

function deshabilitaPegar(obj){
    $(obj).keydown(function(event) {
        var teclasNoPermitidas = new Array('c', 'x', 'v');
        var keyCode = (event.keyCode) ? event.keyCode : event.which;
        var esCtrl;
        esCtrl = event.ctrlKey
        if (esCtrl) {
            for (i = 0; i < teclasNoPermitidas.length; i++) {
                if (teclasNoPermitidas[i] == String.fromCharCode(keyCode).toLowerCase()) {                    
                    return false;              
                }
            }
        }
        return true;
    });
    
    $(obj).bind('contextmenu', function(e){
        return false;
    }); 
}

function ValidaCKEditor(IdTextArea){
    CKEDITOR.instances[IdTextArea].updateElement();
}


function NewCKEditor(IdTextArea){
    //CKEditor
    var instance = CKEDITOR.instances[IdTextArea];
    if (instance) {
        CKEDITOR.remove(CKEDITOR.instances[IdTextArea]);
    }
    $( '#'+IdTextArea ).ckeditor({
        toolbar : 'Full'//CKEditorBasic sirve para poner la barra de botones en basica
    });
//CKEditor
}

function ClearCKEditor(IdTextArea){
    var editor = CKEDITOR.instances[IdTextArea];
    if (editor) {
        editor.destroy(true);
    }
    //    CKEDITOR.replace(IdTextArea);
    NewCKEditor(IdTextArea)
}


function MostrarOcultarCapas(ObjOcultar,ObjMostrar,fnOcultar,fnMostrar){
    $(ObjOcultar).hide('slide',100,function(){
        $(".tooltip").removeClass("in");
        $(".tooltip").addClass("out");        
        eval(fnOcultar);
    });
    $(ObjMostrar).show('slide',1000,function(){
        $(".tooltip").removeClass("in");
        $(".tooltip").addClass("out");
        eval(fnOcultar)
    });        
}
/*
@Authors : jvinceso
@Descripcion : Limpia Input's Deseleciona Checks y Radios de Formulario Sin Afectar a los Botones y Campos Ocultos 
@Use : cleanForm('#IdFormulario');
*/
function cleanForm(objForm){
    $(':input',objForm)
     .not(':button, :submit, :reset, :hidden')
     .val('')
     .removeAttr('checked')
     .removeAttr('selected');    
}
