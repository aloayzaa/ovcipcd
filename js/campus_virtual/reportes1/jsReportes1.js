$(function() {
    $('#Tabs_Reporte').tabs();
    
//    $( "#from" ).datepicker({ dateFormat: "yy/mm/dd" });
    $( "#from1" ).datepicker({ dateFormat: "yy/mm/dd" });
//    $( "#to" ).datepicker({ dateFormat: "yy/mm/dd" });
    $( "#to1" ).datepicker({ dateFormat: "yy/mm/dd" });
    
    $( "#from" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
    
    $( "#from1" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#to1" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    
    $( "#to1" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#from1" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
    
     $( "#cbo_filtro_tipo" ).change(function() {
        $( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd");
        $( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd");
    });
    
    soloNumeros("#txt_fnd_alu_dni","keypress");
    
    $("#btn_fnd_alu").bind({
        click: function(){  
            if ($('#txt_fnd_alu_dni').val()){                            
                $("#txt_fnd_alu_dni").attr("disabled", "disabled");
                $("#c_list_data_persona").html("");
                $("#c_frm_chc_ins").html("");
                mostrarDiv('div_qry1',false);
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_persona('"+$('#txt_fnd_alu_dni').val()+"','"+$('#cbo_tipo_lista').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
    
    $("#btn_exp_excel").bind({
        click: function(){  
            if ($('#from').val() && $('#to').val()){                            
               timer=setTimeout("get_datos_persona('"+$('#txt_fnd_alu_dni').val()+"')",800);
                $.post('reportes1/export/', 
                        {idCurso : ''},
                        function(data){$("#cbo_ins_mat_horario").html(data);}
                       );
            }
        }
    });
    
    $("#btn_sel_hor").bind({
        click: function() {
            mostrarDiv('div_rep_pagCur',false);
            if ($('#from1').val() && $('#to1').val()) {
                $.post('reportes1/load_horario/', 
                    {fechaI : $('#from1').val(), fechaF : $('#to1').val()},
                    function(data){$("#cbo_rep_pag_horario").html(data);}
                   );
                mostrarDiv('div_rep_pagCur',true);
            }
        }
    });
    
    $('#txt_fnd_alu_dni').keydown(function(event){
        if (event.keyCode == '13'){ 
            if ($('#txt_fnd_alu_dni').val().length==8){                            
                $("#txt_fnd_alu_dni").attr("disabled", "disabled");
                $("#c_list_data_persona").html("");
                $("#c_info_registro_chc").html("");
                
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_persona('"+$('#txt_fnd_alu_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
});
            
$(document).ready(function(){
});

function reporte(){
    var value = $('#rdb_type').val();
    get_page('reportes1/load_listar_view_reportes2/',
             'div_qry',
             {criterio : value}
            );
}

function filtro(valor1){
       var tipo = valor1.options[valor1.selectedIndex].value;
       var fechas = new Array();
       var fecha = $('#from').val();
       fecha.replace("/", "-");
       fecha.replace("/", "-");
       fechas[0]= fecha;
       var fecha1 = $('#to').val();
       fecha1.replace("/", "-");
       fecha1.replace("/", "-");
       fechas[1] = fecha1;
       
       if(tipo == 0 || fechas[0] == '' || fechas[1] == '') {
           if(tipo == 0) {
               alert("Seleccione Tipo de Reporte");
           }
           else {
               alert("Seleccione Rango de Fechas Válido");
           }
       }
       else {if(tipo == 1) {
                get_page('reportes1/load_listar_view_reportesM/',
                         'div_qry',
                         {criterio : fechas}
                        );
            }
            else {
                if(tipo == 2) {
                     get_page('reportes1/load_listar_view_reportesD/',
                              'div_qry',
                              {criterio : fechas}
                             );
                 }
                 else {
                     get_page('reportes1/load_listar_view_reportesC/',
                              'div_qry',
                              {criterio : fechas}
                             );
                 }
            }
            mostrarDiv('div_qry',true);
       }
}

function get_datos_persona(dni,tipo){
    $.ajax({
        type: "POST",
        url: "reportes1/buscarPersona/"+dni,
        cache: false,
        success: function(data) {
            if(data!=""){
                $("#preload").html("");
                $("#txt_fnd_alu_dni").removeAttr("disabled");
                $("#c_list_data_persona").html(data);
                $("#c_list_data_persona").hide().fadeIn(250); 
                $("#radios_tipoemp").buttonset(); 
                    $("#div_qry1").html("");
                 if (tipo==1){
                get_page('reportes1/load_listar_view_reportesR/',
                    'div_qry1',
                    {criterio : $('#hid_upd_alu_idPersona').val()}
                   );
                 }else{
                          get_page('reportes1/load_listar_view_reportesP/',
                    'div_qry1',
                    {criterio : $('#hid_upd_alu_idPersona').val()}
                   );
                 }
                mostrarDiv('div_qry1',true);
            }
            else{
                $("#preload").html("");
                $("#txt_fnd_alu_dni").removeAttr("disabled");
                msgAviso("#c_list_data_persona");
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function exportar(){
       var fechas = new Array();
       var fecha = $('#from').val();
       fecha.replace("/", "-");
       fecha.replace("/", "-");
       fechas[0]= fecha;
       var fecha1 = $('#to').val();
       fecha1.replace("/", "-");
       fecha1.replace("/", "-");
       fechas[1] = fecha1;
       fechas[2]= $('#cbo_filtro_tipo').val();
                   
       window.open('reportes1/export/'+fechas[0]+'_'+fechas[1]+'n'+fechas[2],'_blank')
}

function exportar1(){
       var horario = $('#cbo_rep_pag_horario').val();
                          
       window.open('reportes1/export1/'+horario,'_blank')
}

function cargarGrid(valor) {
    var idHorario = valor.options[valor.selectedIndex].value;
    get_page('reportes1/load_listar_view_pagos/',
             'div_qry2',
             {criterio : idHorario}
            );
}

function mostrarDiv(id, bool){
    div=document.getElementById(id);
    if(bool)
        {
            div.style.display="block";
        }
     else
        {
            div.style.display="none";
        }
}