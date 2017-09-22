$(function(){ 
    
    soloNumeros("#txt_fnd_doc_dni","keypress");
    
    $("#btn_fnd_doc").bind({
        click: function(){  
            if ($('#txt_fnd_doc_dni').val()){                            
                $("#txt_fnd_doc_dni").attr("disabled", "disabled");
                $("#c_list_data_persona").html("");
                $("#c_frm_chc_ins").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_persona('"+$('#txt_fnd_doc_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
    
    $('#txt_fnd_doc_dni').keydown(function(event){
        if (event.keyCode == '13'){ 
            if ($('#txt_fnd_doc_dni').val().length==8){                            
                $("#txt_fnd_doc_dni").attr("disabled", "disabled");
                $("#c_list_data_persona").html("");
                $("#c_info_registro_chc").html("");
                
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_persona('"+$('#txt_fnd_doc_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
    
    $('#Tabs_Docente').tabs();  //convierte a tabs 
    $("#tab_docentelistar").bind('click', function(){
        get_page('docente/load_listar_view_docente/','div_qry');
    });
})

function get_datos_persona(dni){
    $.ajax({
        type: "POST",
        url: "docente/buscarDocente/"+dni,
        cache: false,
        success: function(data) {
            if(data!=""){
                if($('#hid_upd_doc_tipo').val() == 'DO'){
                    $("#preload").html("");
                    $("#txt_fnd_doc_dni").removeAttr("disabled");
                    msgAviso("#c_list_data_persona", "El DNI ingresado ya pertenece a un Docente.");
                }
                else{
                        $("#preload").html("");
                        $("#txt_fnd_doc_dni").removeAttr("disabled");
                        $("#c_list_data_persona").html(data);
                        $("#c_list_data_persona").hide().fadeIn(250); 
                        $("#radios_tipoemp").buttonset(); 

                        $(function(){
                            $('#btnactualizar').click(function(){
                                load_frm_upd_persona();
                            });
                        });

                        $(function(){
                            $('#btnconfirmar').click(function(){
                                cambiarTipoDocente($("#hid_upd_doc_idPersona").val(),$("#hid_doc_dni").val());
                            });
                        });
                    }
            }
            else{
                $("#preload").html("");
                $("#txt_fnd_doc_dni").removeAttr("disabled");
                msgAviso("#c_list_data_persona");
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function load_frm_upd_persona(){
    $.ajax({
        type: "POST",
        url: "docente/load_frm_upd_persona",
        cache: false,
        data: {
            regcol:$("#hid_doc_dni").val()
        },
        success: function(data) {
            $("#c_frm_chc_ins").html(data);
            $("#c_frm_chc_ins").hide().fadeIn(250);
            $("#c_label_tipoemp").html("Datos Personales");
        },
        error: function() { 
            alert("error");
        }              
    });

}

function cambiarTipoDocente(idPersona,dni){
    var completo = idPersona + "-" + dni;
    $.ajax({
        type: "POST",
        url: "docente/docenteUpdTipo/"+completo,
        cache: false,
        success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){  
                        $("#c_list_data_persona").html("");
                        $("#c_frm_chc_ins").html("");
                        mensaje("se ha registrado el docente correctamente!","e");
                        //limpiarForm(form);
                    }else{
                        mensaje("Error Inesperando registrando el docente!, vuelva a intentarlo","r");                        
                    }                    
                },
        error: function() { 
            alert("error");
        }              
    });

}

$(document).ready(function(){
    
        $("#frm_ins_docente").validate({
        rules: {
            txt_ins_doc_nombres: {                
                required: true 
            },
            txt_ins_doc_apellidoPaterno: {
                required: true
            },
            txt_ins_doc_apellidoMaterno: {
                required: true               
            },
            txt_ins_doc_dni: {
                required: true               
            },
            txt_ins_doc_telefono: {
                required: true               
            },
            txt_ins_doc_correoElectronico: {
                required: true               
            },
            txt_ins_doc_especialidad: {
                required: true               
            },
            txt_ins_doc_referenciaLaboral: {
                required: true
            },
            txt_ins_doc_uploadFoto: {
                required: true
            },
            txt_ins_doc_uploadCurriculum: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "docente/docenteIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado el docente correctamente!","e");
                        limpiarForm(form);
                    }else{
                        mensaje("Error Inesperando registrando el docente!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el docente!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});