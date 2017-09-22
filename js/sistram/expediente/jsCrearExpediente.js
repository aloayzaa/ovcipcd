
$(function(){   
      MostrarfechaActual("txt_fechainicio_expediente","ALL");
    MostrarfechaActual("txt_fechafin_expediente","ALL");
           $("#c_txt_ins_cargo_user").hide();
    limpiarForm("#frm_ins_expediente"); 
    $('#tab').tabs(); 
    $( '#tab' ).tabs('select', 0); // SELECCIONA EL 1ER TAB AL CARGAR EL FORM
    cboTipoDocumento();
    cboTramites();  
    soloNumeros("#txt_ins_exp_nrodocumento","keypress"); // NROS CAJA DNI POR DEFECTO
    soloNumeros("#txt_ins_exp_folio","keypress"); // NROS PARA FOLIO
    soloNumeros("#txt_ins_exp_telefono","keypress"); // NROS PARA FOLIO
    $("#txt_ins_exp_nrodocumento").attr("maxlength","8"); // MAXLENGTH DE DE DNI POR DEFECTO
    $("#txt_ins_exp_nrodocumento").attr("minlength","8"); // MAXLENGTH DE DE DNI POR DEFECTO
    $("#txt_ins_exp_nrodocumento").focus();
    //    mesaPartesXpersona(), // MESA DE PARTES DE LA PERSONA LOGUEADA
    
    // TAB-0 - CREAR UN EXPEDIENTE
    $("#tab_ins_expediente").bind({
        click: function(){   
            $("#frm_ins_expediente").data('validator').resetForm(); // LIMPIAR MSGs ERROR DEL VALIDATE 
            $("#c_tab_upd_expediente").hide();
            $("#c_tab_ins_expedienteParte").hide();
            $("#div_upd_expediente").html("");
            $("#div_parte_expediente").html("");
        }
    }); 
    
    // TAB-1 - BUSCAR UN EXPEDIENTE
    $("#tab_fnd_expediente").bind({
        click: function(){ 
            msgLoading2("#c_qry_exp");
            get_page('expediente/load_listar_view_mesapartes','c_qry_exp');

        }
    }); 
    // TAB-2 - LISTADO EXPEDIENTE POR FECHA
      $("#listarExpedientes").bind({
        click: function(){
            var fechainicio=$("#txt_fechainicio_expediente").val();
            var fechafin=$("#txt_fechafin_expediente").val();
            if(fechainicio===''|| fechafin===''){
                bootbox.alert("<h3>Ingrese rango de fecha correctamente</h3>");
            }
            else{
                if((Date.parse(fechainicio)) > (Date.parse(fechafin))){
                bootbox.alert('<h3>La fecha inicial no puede ser mayor que la fecha final</h3>');
                }
                else{
                   msgLoading2("#c_qry_exp2");
                    $.ajax({
                        type: "POST",
                        url: "expediente/load_listar_view_expedientes_rango",
                        cache: false,
                        data: { 
                            fechainicio: fechainicio,
                            fechafin: fechafin
                        },
                        success: function(data) { 
                            $('#c_qry_exp2').html(data);
                        }             
                    });
                }
            }

        }
    });
    // ACCION BLUR BUSCAR PERSONA POR DOCUMENTO
    $("#txt_ins_exp_nrodocumento").bind({
        blur: function(){   
        var nro_documento = $("#txt_ins_exp_nrodocumento").val().length;  
            if($("#cbo_ins_tipodoc option:selected").text()=="DNI"){
                if(nro_documento===8){
                                     get_personaXdni();
                                 }else if(nro_documento>0){
                  limpiarForm("#frm_ins_expediente"); 
bootbox.alert("<h3>! Importante (El DNI es de 8 digitos)!</h3>");
                                 }

            }
else if ($("#cbo_ins_tipodoc option:selected").text()=="RUC"){
                  if(nro_documento===11){
                get_personaXruc();
                 }else if(nro_documento>0){
                                     // limpiarForm("#frm_ins_expediente"); 
bootbox.alert("<h3>! Importante (El RUC es de 11 digitos)!</h3>");
                                 }
            }
            else if ($("#cbo_ins_tipodoc option:selected").text()=="CARNET DE EXTRANJERIA"){
                  if(nro_documento===9){
                get_personaXcarnet();
                 }else if(nro_documento>0){
                                      //limpiarForm("#frm_ins_expediente"); 
bootbox.alert("<h3>! Importante (El Carnet es de 9 digitos)!</h3>");
                                 }
            } else {
                if (nro_documento === 8) {
                    get_personaXdni();
                } else if (nro_documento > 0) {
                    limpiarForm("#frm_ins_expediente");
                    bootbox.alert("<h3>! Importante (El DNI es de 8 digitos)!</h3>");
                }
 }
        }
    });
});    

// COMBO LISTAR TRAMITES
function cboTramites(){ 
    msgLoading("#c_cbo_ins_exp_tramite");
    $.ajax({
        type: "POST",
        url: "expediente/cboTramites",
        cache: false,
        data: { 
            accion:"tramites"
        },
        success: function(data) {     
            switch (data) {
                case "0":
                    msgError("#c_cbo_ins_exp_tramite");        
                    break;
                case "2":
                    msgAviso("#c_cbo_ins_exp_tramite");
                    break;               
                default:
                    $("#c_cbo_ins_exp_tramite").html(data); 
                    $(".chzn-select").chosen();        
                    
                    // REVALIDA CON COMBO CON BUSQUEDA
                    $("#c_cbo_ins_exp_tramitev").bind({
                        change: function(){ 
                            $("#c_cbo_ins_exp_tramitev").val();  
                            // MODALIDADES POR PROCEDIMIENTO
                            reqXptramite($("#c_cbo_ins_exp_tramitev option:selected").val());
                        // LIMPIA GRILLA DE REQUISITOS                            
                        //$("#c_qry_req").html("");
                        }
                    });  
            }   
        },
        error: function() { 
            msgError("#c_cbo_ins_exp_tramite");        
        }              
    });        
} 

// COMBO LISTAR TIPOS DE DOCUMENTOS
function cboTipoDocumento(){  
    msgLoading("#c_cbo_ins_tipodoc");
    $.ajax({
        type: "POST",
        url: "expediente/cboTipoDocumento",
        cache: false,
        data: { 
            accion:"documentos"
        },
        success: function(data) {
            switch (data) {
                case "0":
                    msgError("#c_cbo_ins_tipodoc");        
                    break;
                case "2":
                    msgAviso("#c_cbo_ins_tipodoc");
                    break;               
                default:
                    $("#c_cbo_ins_tipodoc").html(data);    
                    $(".chzn-select").chosen();
                    
                    // VALIDA NUMEROS O LETRAS                
                    $("#cbo_ins_tipodoc").bind({
                        change: function(){ 
                            var tipodoc = $('#cbo_ins_tipodoc option:selected').text();
                            $("#txt_ins_exp_nrodocumento").val("");
                            $("#txt_ins_exp_nombres").val("");
                            $("#txt_ins_exp_apePat").val("");
                            $("#txt_ins_exp_apeMat").val("");
                            $("#txt_ins_exp_email").val("");
                            $("#txt_ins_exp_telefono").val("");   
                            
                            if ((tipodoc == "DNI") || (tipodoc == "RUC") || (tipodoc == "CARNET DE EXTRANJERIA")){ 
                                soloNumeros("#txt_ins_exp_nrodocumento","keypress");  
                                if (tipodoc == "DNI"){                              
                                    $("#txt_ins_exp_nrodocumento").attr("maxlength","8");                
                                    $("#txt_ins_exp_nrodocumento").attr("minlength","8");                
                                }else if (tipodoc == "RUC"){                               
                                    $("#txt_ins_exp_nrodocumento").attr("maxlength","11");
                                    $("#txt_ins_exp_nrodocumento").attr("minlength","11");
                                } 
                                else if (tipodoc == "CARNET DE EXTRANJERIA"){                               
                                    $("#txt_ins_exp_nrodocumento").attr("maxlength","9");
                                    $("#txt_ins_exp_nrodocumento").attr("minlength","9");
                                }                            
                            }else{                           
                                unbindAttr("#txt_ins_exp_nrodocumento","keypress");
                                $("#txt_ins_exp_nrodocumento").attr("maxlength","8");
                            } 
                            
                            if(tipodoc == "RUC"){ // desactiva validacion de apellidos, email, etc.
                                         $("#txt_ins_exp_nrodocumento").attr("minlength","11");                   
                                $('#c_txt_ins_exp_apePat').hide(); 
                              $("#c_txt_ins_cargo_user").hide(); 
                                $('#c_txt_ins_exp_apeMat').hide();
                                $("#c_txt_ins_exp_email").fadeIn();  
                                $("#c_txt_ins_exp_telefono").fadeIn();  
                            }else if(tipodoc == "CARNET DE EXTRANJERIA"){
                                     $("#txt_ins_exp_nrodocumento").attr("maxlength","9");
                                  $("#c_txt_ins_cargo_user").hide(); 
                                $('#c_txt_ins_exp_apePat').fadeIn();  
                                $('#c_txt_ins_exp_apeMat').fadeIn();
                                $("#c_txt_ins_exp_email").fadeIn();  
                                $("#c_txt_ins_exp_telefono").fadeIn();  
                            }else if(tipodoc == "DNI"){
                                     $("#txt_ins_exp_nrodocumento").attr("maxlength","8");
                                  $("#c_txt_ins_cargo_user").hide(); 
                                $('#c_txt_ins_exp_apePat').fadeIn();  
                                $('#c_txt_ins_exp_apeMat').fadeIn();
                                $("#c_txt_ins_exp_email").fadeIn();  
                                $("#c_txt_ins_exp_telefono").fadeIn();  
                            }
                            else {
                                $("#txt_ins_exp_nrodocumento").attr("minlength","8");  
                                $('#c_txt_ins_exp_apePat').fadeIn();  
                                $('#c_txt_ins_exp_apeMat').fadeIn();
                                $("#c_txt_ins_cargo_user").fadeIn(); 
                                $("#c_txt_ins_exp_email").hide();
                                $("#c_txt_ins_exp_telefono").hide();
                            }
                        }
                    }); 
            } 
        },
        error: function() { 
            msgError("#c_cbo_ins_tipodoc");        
        }              
    });        
} 


// OBTENER PERSONA POR DOCUMENTO (DNI)
function get_personaXdni(){  
    if ($.trim($("#txt_ins_exp_nrodocumento").val())!=""){
        msgLoading("#c_fnd_gif_perXdoc","buscando ...");
    }
    
    $.ajax({
        type: "POST",
        url: "expediente/personaXdniGet",
        cache: false,
        data: { 
            accion:"get_personaXdni",
            txt_ins_exp_nrodocumento: $("#txt_ins_exp_nrodocumento").val()
        },
        success: function(data) {
            switch (data) {
                case "0":
                    $("#txt_ins_exp_apellidos").val("Ha ocurrido un error, vuelva a intentarlo");
                    break;
                case "2":
                    $("#txt_ins_exp_apePat").val("");
                    $("#txt_ins_exp_apeMat").val("");
                    $("#txt_ins_exp_nombres").val("");
                    $("#txt_ins_exp_telefono").val("");
                    $("#txt_ins_exp_email").val("");
                    $("#msg_loading").remove();
                    break;               
                default:
                    var fila = data.split(","); 
                    $("#txt_ins_exp_apePat").val($.trim(fila[0]));
                    $("#txt_ins_exp_apeMat").val($.trim(fila[1]));
                    $("#txt_ins_exp_nombres").val($.trim(fila[2]));                    
                    $("#txt_ins_exp_email").val($.trim(fila[3])); 
                    $("#txt_ins_exp_telefono").val($.trim(fila[4]));
                    $("#msg_loading").remove();
                    
                    // REVALIDA CAMPOS
                    $('#txt_ins_exp_apePat').valid();   
                    $('#txt_ins_exp_apeMat').valid();     
                    $('#txt_ins_exp_nombres').valid();     
                    $('#txt_ins_exp_email').valid();     
                    $('#txt_ins_exp_telefono').valid();     
            } 
        },
        error: function() { 
            $("#txt_ins_exp_apellidos").val("Ha ocurrido un error, vuelva a intentarlo");
        }              
    });        
} 

// OBTENER PERSONA POR CARNET DE EXTRANJERIA
function get_personaXcarnet(){  
    if ($.trim($("#txt_ins_exp_nrodocumento").val())!=""){
        msgLoading("#c_fnd_gif_perXdoc","buscando ...");
    }
    
    $.ajax({
        type: "POST",
        url: "expediente/personaXcarnetGet",
        cache: false,
        data: { 
            accion:"personaXcarnetGet",
            txt_ins_exp_nrodocumento: $("#txt_ins_exp_nrodocumento").val()
        },
        success: function(data) {
            switch (data) {
                case "0":
                    $("#txt_ins_exp_apellidos").val("Ha ocurrido un error, vuelva a intentarlo");
                    break;
                case "2":
                    $("#txt_ins_exp_apePat").val("");
                    $("#txt_ins_exp_apeMat").val("");
                    $("#txt_ins_exp_nombres").val("");
                    $("#txt_ins_exp_telefono").val("");
                    $("#txt_ins_exp_email").val("");
                    $("#msg_loading").remove();
                    break;               
                default:
                    var fila = data.split(","); 
                    $("#txt_ins_exp_apePat").val($.trim(fila[0]));
                    $("#txt_ins_exp_apeMat").val($.trim(fila[1]));
                    $("#txt_ins_exp_nombres").val($.trim(fila[2]));                    
                    $("#txt_ins_exp_email").val($.trim(fila[3])); 
                    $("#txt_ins_exp_telefono").val($.trim(fila[4]));
                    $("#msg_loading").remove();
                    
                    // REVALIDA CAMPOS
                    $('#txt_ins_exp_apePat').valid();   
                    $('#txt_ins_exp_apeMat').valid();     
                    $('#txt_ins_exp_nombres').valid();     
                    $('#txt_ins_exp_email').valid();     
                    $('#txt_ins_exp_telefono').valid();     
            } 
        },
        error: function() { 
            $("#txt_ins_exp_apellidos").val("Ha ocurrido un error, vuelva a intentarlo");
        }              
    });        
} 


// OBTENER PERSONA POR DOCUMENTO (RUC)
function get_personaXruc(){  
    if ($.trim($("#txt_ins_exp_nrodocumento").val())!=""){
        msgLoading("#c_fnd_gif_perXdoc","buscando ...");
    }
    
    $.ajax({
        type: "POST",
        url: "expediente/personaXrucGet",
        cache: false,
        data: { 
            accion:"get_personaXruc",
            txt_ins_exp_nrodocumento: $("#txt_ins_exp_nrodocumento").val()
        },
        success: function(data) {    
            switch (data) {
                case "0":
                    $("#txt_ins_exp_nombres").val("Ha ocurrido un error, vuelva a intentarlo");
                    break;
                case "2":
                    $("#txt_ins_exp_apePat").val("");
                    $("#txt_ins_exp_apeMat").val("");
                    $("#txt_ins_exp_nombres").val("");
                    $("#txt_ins_exp_telefono").val("");
                    $("#txt_ins_exp_email").val("");
                    
                    $("#msg_loading").remove();
                    break;               
                default:
                    var fila = data.split(","); 
                    $("#txt_ins_exp_nombres").val($.trim(fila[0]));
                    $("#txt_ins_exp_email").val($.trim(fila[1]));
                    $("#txt_ins_exp_telefono").val($.trim(fila[2])); 
                    $("#msg_loading").remove();
                    
                    // REVALIDA CAMPOS                  
                    $('#txt_ins_exp_nombres').valid();     
                    $('#txt_ins_exp_email').valid();     
                    $('#txt_ins_exp_telefono').valid();     
            
            } 
        },
        error: function() { 
            $("#txt_ins_exp_nombres").val("Ha ocurrido un error, vuelva a intentarlo");
        }              
    });        
}

/* OBTIENE EL ID DEL TRAMITE PARA DEVOLVER LOS REQUISITOS */
function reqXptramite(nTramiteId) {
   
    $.ajax({
        type: "POST",
        url: "expediente/reqXptramiteGet",
        cache: false,
        data: { 
            accion: "get_nTramiteId",
            nTramiteId: nTramiteId
        },
        success: function(data) { 
            switch (data) {               
                case "0":
                    $("#hid_ins_exp_nModId").val("");         
                    break;
                case "error":
                    $("#hid_ins_exp_nModId").val("");
                    break;               
                default:
                    $("#hid_ins_exp_nModId").val(data); 
                    
                    // RECOGER ID DEL TRAMITE Y CONSTRUYE TABLA REQUISITOS
                    reqXTramiteGet(nTramiteId);
            }  
        }             
    });     
}

// OBTIENE LOS REQUISITOS POR TRAMITE
function reqXTramiteGet(nTramiteId){      
    msgLoading("#c_qry_req");
    $.ajax({
        type: "POST",
        url: "expediente/reqXTramiteGet",
        cache: false,
        data: { 
            accion:"get_reqXtramite",
            nTramiteId: nTramiteId
        },
        success: function(data) {      
            switch (data) {
                case "0":
                    msgError("#c_qry_req");        
                    break;
                case "2":
                    msgAviso("#c_qry_req");
                    break;               
                default:
                    $("#c_qry_req").html(data); 
                    
                    var dataTable = {
                        tabla           : "qry_exp_requisitos", 
                        ordenaPor       : new Array([0, "desc" ]),
                        desactOrdenaEn  : [0],
                        filsXpag        : [50000]
                    };
                    paginaDataTable(dataTable); 
                    
                    $("#qry_exp_requisitos tr td:nth-child(1)").css("text-align","center");                    
            
            }            
        },
        error: function() { 
            msgError("#c_qry_req");  
        }              
    });        
} 

/* INSERTAR EXPEDIENTE */
$(function(){
    $("#frm_ins_expediente").validate({ 
        submitHandler: function(form){
            $("#btn_ins_expediente").prop("disabled",true);
           var tipodoc = $('#cbo_ins_tipodoc').val();
                                var checkboxValores = "";
                            var usr_admin = $('#cbo_usr_admin').val();
              if(tipodoc>3 && usr_admin ==0){
                    bootbox.alert("<p>Selecciona el cargo del administrativo</p>");
             }else{
$('input[name="reqId[]"]:checked').each(function() {
          var input=$(this).val();
          checkboxValores += $(this).val() + ",";
        });
          if(checkboxValores!=""){
            msgLoadSave("#c_btn_ins_expediente_load","#btn_ins_expediente");
            $.ajax({
                type: "POST",
                url: "expediente/crearExpedienteIns",
                data: $(form).serialize(),
                success: function(data){  
                         $("#btn_ins_expediente").prop("disabled",false);                    
                    switch (data) {
                        case "0":
                            mensaje("Ha ocurrido un error, vuelva a intentarlo.","r");
                            break; 
                        default:
                            msgLoadSaveRemove("#btn_ins_expediente");
                            mensaje("Operacion realizada con exito.","e"); 
                            // MUESTRA NRO EXPEDIENTE GENERADO             
                            $("#c_spn_exp_numero").html($.trim(data));
                            $('#c_div_exp_numero').modal('show');
                            
                            // RESTAURANDO FORMULARIO
                            limpiarForm("#frm_ins_expediente");    
                            $("#c_envio_expediente").hide();
                            $("#c_direccion").hide();
                            $("#c_c_cbo_ins_exp_modalidad").hide();
                            $('#cbo_ins_tipodoc option:eq(0)').attr('selected','selected');   
                            $('#cbo_ins_exp_procedimiento').find('option:first-child').prop('selected', true).end().trigger('liszt:updated'); // chosen restaurar
                            $("#c_c_cbo_ins_exp_modalidad").hide();
                            $("#c_qry_req").html("");
                            cboTipoDocumento();
                            $("#txt_ins_exp_nrodocumento").attr("maxlength","8");    
                            $("#txt_ins_exp_nrodocumento").attr("minlength","8");    
                            break;                            
                    }      
                },
                error: function(){                
                    mensaje("Ha ocurrido un error, vuelva a intentarlo.","r");                        
                }
            });
}       
        else {
            alert("Seleccione al menos un requisito");
        }
             }

    },
        rules: {            
            txt_ins_exp_nrodocumento:{
                required:true  
            },
            txt_ins_exp_nombres:{
                required:true  
            }, 
            txt_ins_exp_apePat:{
                required:true,
                lettersonly:true
            },  
            txt_ins_exp_apeMat:{
                required:true,
                lettersonly:true
            },  
            txt_ins_exp_email:{
                email:true
            },
            txt_ins_exp_observaciones:{
                required:true  
            },
            txt_ins_exp_folio:{
                required:true  
            }            
        }

        
    });   

});


// CHECKEA O QUITA CHECK A REQUISITOS
function checkTodos(obj,name) {      
    $( "[name='"+name+"']").attr('checked', $(obj).is(':checked')); 
}

// funcion de editar expediente
function editarExpediente(nExpedienteId){
    set_popup("expediente/popupEditarExpediente/"+nExpedienteId,"Editar Expediente",700,600,'','');   
}
// funcion de abrir archivos expediente multimedia.
function abrirMultimedia(nExpedienteId){
      $('#tablamultimedia').html("");
      $.ajax({
        type: "POST",       
        url: "expediente/popupMultimediaExpediente/"+nExpedienteId,
        cache: false,         
        success: function(data) {      
             $('#tablamultimedia').html(data);
        },
        error: function() {
            msgError('#tablamultimedia');         
        }              
    });
    msgLoading('#contenidomodal');
    get_page('expediente/recargar','contenidomodal');
    $('div.dz-success').remove();
    $("#hid_expedienteId").val(nExpedienteId);
    $('#c_div_exp2').modal('show');
    
   
}
// funcion de abrir archivos expediente multimedia.
function reenviar_decanato(nExpedienteId){
    set_popup("expediente/popupReenviarExpediente/"+nExpedienteId,"Reenviar Expediente",420,300,'','');   
}
// funcion dar de baja expediente.
function darbajaExpediente(nExpedienteId){
    var rdn=Math.random()*11;
     bootbox.confirm("<h3>¿Esta seguro de realizar la operacion?</h3>", function(result) {
          if(result===true){
               $.post('expediente/darbajaExpediente/'+nExpedienteId, {
                rdn:rdn
            }, function(data){
                if(data.trim()==1){
                    mensaje("se ha eliminado el archivo correctamente!","e");
                    msgLoading2("#c_qry_exp");
                    get_page('expediente/load_listar_view_mesapartes','c_qry_exp');
                }else{
                    mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
                }                        
            });
          }
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
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            isRTL: false,
            yearRange: '2014:2025',
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