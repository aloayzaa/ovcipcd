$(function(){ 
    
    //soloNumeros("#txt_fnd_alu_dni","keypress");
    soloNumeros("#txt_ins_pag_monto","keypress");
    
    $("#btn_fnd_alu").bind({
        click: function(){ 

            if ($('#txt_fnd_alu_dni').val()){
                mostrarDiv('div_cur',false);
                mostrarDiv('div_pag',false);
                mostrarDiv('div_tip_mat',false);
                mostrarDiv('div_btn',false); 
                mostrarDiv('div_check_obs',false);


                $("#txt_fnd_alu_dni").attr("disabled", "disabled");
                $("#c_list_data_persona").html("");
                $("#c_frm_chc_ins").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_persona('"+$('#txt_fnd_alu_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
                
                $.post('matricula/load_curso/', 
                        {idCurso : ''},
                        function(data){$("#cbo_ins_mat_curso").html(data);}
                       );
                
                $.post('matricula/load_horario/', 
                        {idCurso : ''},
                        function(data){$("#cbo_ins_mat_horario").html(data);}
                       );
            }
        }
    });
    
    $('#txt_ins_pag_nroTicket').keydown(function(event){
        if (event.keyCode == '13'){ 
            if ($('#txt_fnd_alu_dni').val().length==12){                            
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
    
    $('#Tabs_Matricula').tabs();  //convierte a tabs 
})

$(document).ready(function(){
    
        $("#frm_ins_matricula").validate({
        rules: {
            txt_fnd_alu_dni: {                
                required: true,
                minlength: 8,
                maxlength: 9
            },
            txt_ins_pag_monto: {
                required: true               
            },
            cbo_ins_mat_horario: {
                required: true
            },
            cbo_ins_tip_mat: {
                required: true
            }
        },
        submitHandler: function(form){
           // alert($("#txt_ins_pag_nroTicket").val()+"  "+$("#txt_ins_pag_monto").val())
     msgLoading("#preLoad3");
                $("#btn_ins_matricula").attr("disabled","disabled");
            $.ajax({
                type: "POST",
                url: "matricula/matriculaIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                     $("#alerta").html("");
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado el matricula correctamente!","e");
                        limpiarFormCampus(form);
                          $("#btn_ins_matricula").removeAttr("disabled");
                             $("#preLoad3").html("");
                    }else if(msg.trim()==3) {
                            mensaje("Los cupos están completos","a");
                            limpiarFormCampus(form);
                        }
                        else if(msg.trim()==4) {
                            mensaje("No se pueden realizar reservas en horario empezado!","a");
                              $("#btn_ins_matricula").removeAttr("disabled");
                               $("#preLoad").html("");
                                  $("#preLoad3").html("");
                        } else if(msg.trim()==2) {
                                mensaje("Monto Insuficiente","a");
                            }
                            else {
                                $("#btn_ins_matricula").removeAttr("disabled");
                                $("#preLoad").html("");
                                mensaje("Error Inesperando registrando el matricula!, vuelva a intentarlo","r");
                            }                  
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el matricula!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});

function filtroCurso(valor){
       $("#alerta").html("");
       mostrarDiv('div_btn',false);
       mostrarDiv('div_pag',false);
       mostrarDiv('div_check_obs',false);
       
       
       var idCurso = valor.options[valor.selectedIndex].value;
       $.post('matricula/load_horario/', 
              {idCurso : idCurso, idAlumno : $('#hid_upd_alu_idPersona').val(), combo : 'cbo_ins_mat_horario'},
              function(data){$("#cbo_ins_mat_horario").html(data);}
             );
}      

function filtroTipoMatricula(valor){

    var idtipo = valor.options[valor.selectedIndex].value;
    //alert("holaaaaa"+idtipo);
    $.post('matricula/load_cursosH/', 
              {criterio: idtipo},
              function(data){$("#cbo_filtro").html(data);}
             );
                
    if(idtipo == 0) {
        get_page('matricula/load_listar_view_matricula/',
             'div_qry',
             {criterio : idtipo, hor: 0}
            );
    }
    else {
        get_page('matricula/load_listar_view_matricula2/',
             'div_qry',
             {criterio : idtipo, hor : 0}
            );
    }
}

function get_datos_persona(dni){
    $.ajax({
        type: "POST",
        url: "matricula/buscarAlumno/"+dni,
        cache: false,
        success: function(data) {
            if(data!=""){
                $("#preload").html("");
                $("#txt_fnd_alu_dni").removeAttr("disabled");
                $("#c_list_data_persona").html(data);
                $("#c_list_data_persona").hide().fadeIn(250); 
                $("#radios_tipoemp").buttonset(); 
                mostrarDiv('div_cur',true);
            }
            else{
                $("#preload").html("");
                $("#txt_fnd_alu_dni").removeAttr("disabled");
                msgAviso("#c_list_data_persona");
                mostrarDiv('div_cur',false);
                mostrarDiv('div_pag',false);
                mostrarDiv('div_tip_mat',false);
                mostrarDiv('div_btn',false);
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function mostrarTipoPagos(valor){
   // var idHorario = valor.options[valor.selectedIndex].value;
    /*$.post('matricula/load_descuento_horario/', 
            {idHorario : idHorario, tip : 0},
            function(data){$("#div_mon_can").html(data);}
           );*/
    //  var idCurso = valor.options[valor.selectedIndex].value;
       $("#alerta").html("");
       mostrarDiv('div_btn',false);
       mostrarDiv('div_pag',false);
       mostrarDiv('div_check_obs',false);
    $.post('matricula/mostrar_pagos/', 
            {idCurso : $('#cbo_ins_mat_curso').val(), idAlumno : $('#txt_fnd_alu_dni').val()},
            function(data){$("#div_pag").html(data);
                if(data=='no'){

                    $("#alerta").html('<div class="alert alert-block">No se ha realizado pago!</div>');
                    mensaje("No se ha efectuado ningun pago de esta persona!","a"); 
                    $("#btn_ins_matricula").val("Reservar Matricula");
                     mostrarDiv('div_btn',true);
                      mostrarDiv('div_check_obs',false);
                    // $("#cbo_ins_tip_mat").val(0);
                   // $('select[name=cbo_ins_tip_mat]').val(0);
                   var aux= 0;
             
                  document.getElementById("cbo_ins_tip_mat").value=aux;
                     

                }else{
                    mostrarDiv('div_btn',true);
                    mostrarDiv('div_pag',true);
                    mostrarDiv('div_check_obs',true);
                    $("#btn_ins_matricula").val("Registrar Matricula");
                   // $("#cbo_ins_tip_mat").val(1);
                  // $('select[name=cbo_ins_tip_mat]').val(1);
                    var aux= 1;
                    var observacion= $('#txt_ins_pag_observacion').val();
                    var dato = observacion.split('_').join(' ');
                  document.getElementById("cbo_ins_tip_mat").value=aux;
                  document.getElementById("txt_obs_mat").value=dato;
                }

            }
           );
    //mostrarDiv('div_tip_mat',true);
   
}

function mostrarPago(valor){
    var tipPago = valor.options[valor.selectedIndex].value;
    if(tipPago == 0)
        {
            mostrarDiv('div_pag',false);
        }
    else
        {
            mostrarDiv('div_pag',true);
        }
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

function limpiarFormCampus(obj) {
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
        
        mostrarDiv('c_list_data_persona',false);
        mostrarDiv('div_cur',false);
        mostrarDiv('div_pag',false);
        mostrarDiv('div_tip_mat',false);
        mostrarDiv('div_btn',false);
        mostrarDiv('div_check_obs',false);
    });
}

function matriculaDel(idAlumno, idHorario){
    var rdn=Math.random()*11;
    var idtipo = document.getElementById('cbo_qry_mat_tipo').value;
    var hor = document.getElementById('cbo_filtro').value;
    $.post('matricula/matriculaDel/'+idAlumno+'/'+idHorario, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
            if(idtipo == 0) {
                get_page('matricula/load_listar_view_matricula/',
                     'div_qry',
                     {criterio : idtipo, hor: hor}
                    );
            }
            else {
                get_page('matricula/load_listar_view_matricula2/',
                     'div_qry',
                     {criterio : idtipo, hor: hor}
                    );
            }
        }else{
            if(data.trim()==2) {
                mensaje("No se puede eliminar matr�cula de un curso comenzado!","a");
            }
            else {
                mensaje("Error inesperado, no se ha podido cambiar estado de curso!","r");
            }
        }                        
    });
    return false;
}

function initEvtUpd(url,title,alto,ancho,func_close){              
    $(".ui-icon-pencil").each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            var n = $(fila).attr('id').indexOf(",");
            var idAlumno = $(fila).attr('id').substring(0, n);
            var idHorario = $(fila).attr('id').substring(n+1);
            var fn = url+idAlumno+"/"+idHorario;
            set_popup(fn,title,alto,ancho,'',func_close);                                                  
        })
    });
}
function filtro(valor){
    var hor = valor.options[valor.selectedIndex].value;
    var idtipo = document.getElementById('cbo_qry_mat_tipo').value;
    
    if(idtipo == 0) {
        get_page('matricula/load_listar_view_matricula/',
             'div_qry',
             {criterio : idtipo, hor: hor}
            );
    }
    else {
        get_page('matricula/load_listar_view_matricula2/',
             'div_qry',
             {criterio : idtipo, hor: hor}
            );
    }
}