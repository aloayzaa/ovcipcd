$(function(){
    //función para darle estilo jquery ui a los tabs
    $('#Tabs_Empadronamiento').tabs();  
    // end función
    
    deshabilitaPegar("#txt_fnd_empa_criterio");
    radio('#radio_emp1');
    
    letras("#txt_fnd_empa_criterio","keypress");
    
    // Carga el combo tipo empadronado y grado de instruccion en el form de registro de empadronados
    
    cboTipoEmpadronadoGet();
    cboGradoInstruccionGet();
    //end combos
   
    // función para realizar la búsqueda presionando ENTER
    
    $('#txt_fnd_empa_criterio').keydown(function(event){
        if (event.keyCode == '13'){ 
            empadronamientoQry();
        }
    });
    
    //end función
    
    // funciones para los tabs al momento de darle click alguno de ellos
    $('#empadronamientoRegistrar').click(function(){ 
        $("#frm_ins_empadronamiento").data('validator').resetForm();         
    });
    
    $('#empadronamientoListar').click(function(){
        $("#txt_fnd_empa_criterio").val("");   
        radio("#radio_emp1");
        unbindAttr("#txt_fnd_empa_criterio","keypress");
        letras("#txt_fnd_empa_criterio","keypress");
        $("label[for='radio_emp1']").addClass("ui-state-active ui-button ui-widget ui-state-default ui-button-text-only");
        $("label[for='radio_emp2']").removeClass("ui-state-active");
        $("label[for='radio_emp3']").removeClass("ui-state-active");
        $("label[for='radio_emp4']").removeClass("ui-state-active");
        $("label[for='radio_emp5']").removeClass("ui-state-active");
        
        $("#txt_fnd_empa_criterio").css({
            width:"410"
        });
              
        //empadronamientoQry();
        empadronamientoQry(); 
    });
    // end funcion clic tabs
    
    // Le coloca el estilo de jquery ui a los radio buttons de empadronamiento
    $("#radios_empadronamiento").buttonset(); 
    // end radio buttons

    // Realiza la búsqueda con el botón
    $("#btn_fnd_empadronamiento").bind('click', function(event){  
        empadronamientoQry();
    });
    // end busqueda button
   
    //funcionnes al momento de hacer clic en los radios de empadronamiento
    
    $('#radio_emp1').click(function(){
        
        $("#txt_fnd_empa_criterio").hide().fadeIn(250);
        $("#btn_fnd_empadronamiento").hide().fadeIn(250);
        $("#txt_fnd_empa_criterio").val("");
        $("#txt_fnd_empa_criterio").attr("maxlength", "50");    
        $("#txt_fnd_empa_criterio").css({
            width:"410"
        });
        
        unbindAttr("#txt_fnd_empa_criterio","keypress");
        letras("#txt_fnd_empa_criterio","keypress");                            

    });
    
    $('#radio_emp2').click(function(){
        $("#txt_fnd_empa_criterio").hide().fadeIn(250);
        $("#btn_fnd_empadronamiento").hide().fadeIn(250);
        $("#txt_fnd_empa_criterio").val("");
        $("#txt_fnd_empa_criterio").attr("maxlength", "8");    
        $("#txt_fnd_empa_criterio").css({
            width:"90"
        });
        
        unbindAttr("#txt_fnd_empa_criterio","keypress");
        soloNumeros("#txt_fnd_empa_criterio","keypress");                            

    });
    
    $('#radio_emp3').click(function(){
        $("#txt_fnd_empa_criterio").hide().fadeIn(250);
        $("#btn_fnd_empadronamiento").hide().fadeIn(250);
        $("#txt_fnd_empa_criterio").val("");
        $("#txt_fnd_empa_criterio").attr("maxlength", "6");    
        $("#txt_fnd_empa_criterio").css({
            width:"75"
        });
        
        unbindAttr("#txt_fnd_empa_criterio","keypress");
        soloNumeros("#txt_fnd_empa_criterio","keypress");
    });
    
    $('#radio_emp4').click(function(){
        $("#txt_fnd_empa_criterio").hide().fadeIn(250);
        $("#btn_fnd_empadronamiento").hide().fadeIn(250);
        $("#txt_fnd_empa_criterio").val("");
        $("#txt_fnd_empa_criterio").attr("maxlength", "15");    
        $("#txt_fnd_empa_criterio").css({
            width:"110"
        });
        
        unbindAttr("#txt_fnd_empa_criterio","keypress");
        formato_doc("#txt_fnd_empa_criterio","keypress");
    });
    
    $('#radio_emp5').click(function(){
        $("#txt_fnd_empa_criterio").hide().fadeIn(250);
        $("#btn_fnd_empadronamiento").hide().fadeIn(250);
        $("#txt_fnd_empa_criterio").val("");
        $("#txt_fnd_empa_criterio").attr("maxlength", "35");    
        $("#txt_fnd_empa_criterio").css({
            width:"200"
        });
        
        unbindAttr("#txt_fnd_empa_criterio","keypress");
    });
    
    // End funciones
    
    // funcion para buscar datos de una persona mediante el dni
    $('#txt_ins_empa_dni').blur(function(){          
        if ($('#txt_ins_empa_dni').val().length==8){                            
            $("#txt_ins_empa_dni").attr("disabled", "disabled");
            msgLoading("#preload");
            $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
            });
            
            timer=setTimeout("get_datos_dni('"+$('#txt_ins_empa_dni').val()+"')",800);
            
        }else{
            get_empadronado_dni('','','','','','','','');
        }
    });
//end funcion dni
});

function empadronamientoQry(){
    var nombre;
    var Dni;
    var codigo;
    var formato;
    var expediente;
    
    if ($('input:radio[name=rdbtipbus]')[0].checked) {
        nombre=$("#txt_fnd_empa_criterio").val();
        Dni='a';
        codigo='a';
        formato='a';
        expediente='a';
        
        if(nombre.length>3){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            }); 
        }
        else if(nombre.length==0){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            });
        }
        
    }
    else if($('input:radio[name=rdbtipbus]')[1].checked){
        nombre='a';
        Dni=$("#txt_fnd_empa_criterio").val();
        codigo='a';
        formato='a';
        expediente='a';
        
        if(Dni.length==8){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            }); 
        }
        else if(Dni.length==0){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            });
        }
    } 
    else if($('input:radio[name=rdbtipbus]')[2].checked){
        nombre='a';
        Dni='a';
        codigo=$("#txt_fnd_empa_criterio").val();
        formato='a';
        expediente='a';
        
        if(codigo.length==6){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            }); 
        }
        else if(codigo.length==0){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            });
        }
    }
    else if($('input:radio[name=rdbtipbus]')[3].checked){
        nombre='a';
        Dni='a';
        codigo='a';
        formato=$("#txt_fnd_empa_criterio").val();
        expediente='a';
        
        if(formato.length>4){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            }); 
        }
        else if(formato.length==0){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            });
        }
    }
    else if($('input:radio[name=rdbtipbus]')[4].checked){
        nombre='a';
        Dni='a';
        codigo='a';
        formato='a';
        expediente=$("#txt_fnd_empa_criterio").val();
        
        if(expediente.length>5){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            }); 
        }
        else if(expediente.length==0){
            get_page('empadronamiento/load_list_empadronamiento','list_view_empadronamiento', {
                'nombre' : nombre,
                'Dni' : Dni,
                'codigo' : codigo,
                'formato' : formato,
                'expediente' : expediente
            });
        }
    }  
}

function get_datos_dni(dni){
    $.ajax({
        type: "POST",
        url: "empadronamiento/empadronadoGetDni",
        cache: false,
        data: {
            dni:dni
        },
        success: function(data) {
            $("#preload").html("");
            $("#txt_ins_empa_dni").removeAttr("disabled");
            if(data==""){
                get_empadronado_dni('','','','','','','','');
            }else{
                eval(data);                       
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function cboGradoInstruccionGet(){
    msgLoading("#mostrar_combo_instruccion");
    $.ajax({
        type: "POST",
        url: "empadronamiento/cboGradoInstruccionGet",
        cache: false,
        success: function(data) {
            $("#mostrar_combo_instruccion").html(data);
        },
        error: function() { 
            alert("error");
        }              
    });
}

function cboTipoEmpadronadoGet(){
    msgLoading("#mostrar_combo_tipoEmpadronado");
    $.ajax({
        type: "POST",
        url: "empadronamiento/cboTipoEmpadronadoGet",
        cache: false,
        success: function(data) {
            $("#mostrar_combo_tipoEmpadronado").html(data);
        },
        error: function() { 
            alert("error");
        }              
    });
}

function get_empadronado_dni(nomb,appat,apmat,telefono,direccion,sexo,fnac,instruccion){
    $('#txt_ins_empa_apepat').val(appat);
    $('#txt_ins_empa_apemat').val(apmat);
    $('#txt_ins_empa_nombres').val(nomb);
    $('#txt_ins_empa_telefono').val(telefono);
    $('#txt_ins_empa_dir').val(direccion);
    $('#cbo_ins_empa_sexo').val(sexo);    
    $('#txt_ins_empa_fecnac').val(fnac);    
    $('#cbo_ins_empa_instruccion').val(instruccion);      
    
    if(nomb!="" && appat!="" && apmat!=""){
        $("#txt_ins_empa_apepat").attr("readonly", "readonly");
        $("#txt_ins_empa_apemat").attr("readonly", "readonly");
        $("#txt_ins_empa_nombres").attr("readonly", "readonly");
    }else{
        $("#txt_ins_empa_apepat").removeAttr("readonly");
        $("#txt_ins_empa_apemat").removeAttr("readonly");
        $("#txt_ins_empa_nombres").removeAttr("readonly");
    }
}

function radio(obj){
    $(obj).attr('checked','checked');
}

function empadronamientoDel(nEmpId){
    $.ajax({
        type: "POST",
        url: "empadronamiento/empadronamientoDel/"+nEmpId,
        cache: false,
        success: function(data) {
            if(data.trim()==1){
                mensaje("Se ha eliminado el empadronado correctamente!","e");
                empadronamientoQry();
            }else{
                mensaje("Error inesperado, no se ha podido eliminar el empadronado!","r");
            }        
        },
        error: function() { 
            alert("error");
        }              
    });
}


