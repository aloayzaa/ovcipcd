$(function(){ 
     $('#Tabs_Actualizacion').tabs();  //convierte a tabs 
    var cont=0;
       $('#cbo_ins_per_tipo').bind('click', function(){
   if ($("#cbo_ins_per_tipo").val() == '0'){
       
         $('#txt_ins_empa_dni').val("");
         $('#tipo_doc').html('<strong>Nro de CIP:</strong>');
         $("#txt_ins_empa_dni").attr("maxlength","6");
    }else{
                 $('#txt_ins_empa_dni').val("");
                $('#tipo_doc').html('<strong>Nro de Dni:</strong>'); 
                $("#txt_ins_empa_dni").attr("maxlength","8");
    }
            }); 
    $('#Listarpersona').bind('click', function(){
         msgLoading2("#qry_persona");
        get_page('colegiado/load_listar_view_persona/','qry_persona');
            }); 
     //soloNumeros("#txt_ins_empa_dni","keypress");
    $("#btn_fnd_empadronados").bind({
        click: function(){  
            if ($('#txt_ins_empa_dni').val()){                            
                $("#txt_ins_empa_dni").attr("disabled", "disabled");
                $("#c_list_data_empadronado").html("");
                $("#c_frm_chc_ins").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_colegiado('"+$('#txt_ins_empa_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
    
    $('#txt_ins_empa_dni').keydown(function(event){
        if (event.keyCode == '13'){ 
            if ($('#txt_ins_empa_dni').val().length==6){                            
                $("#txt_ins_empa_dni").attr("disabled", "disabled");
                $("#c_list_data_empadronado").html("");
                $("#c_info_registro_chc").html("");
                
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
                timer=setTimeout("get_datos_colegiado('"+$('#txt_ins_empa_dni').val()+"')",800);
                $("#c_frm_fnd_expe").hide();
                $("#c_frm_ins_chc").hide();
                $("#c_listado_chc").hide();
            }
        }
    });
});

function get_datos_colegiado(valor){
    if ($("#cbo_ins_per_tipo").val() == '0'){
        var tipo = 'cip';
    }else{
           var tipo = 'dni';
    }
    $.ajax({
        type: "POST",
        url: "colegiado/colegiadoData/"+valor+"/"+tipo,
        cache: false,
        success: function(data) {
            if(data.trim()!=""){
                                    $("#preload").html("");
                $("#txt_ins_empa_dni").removeAttr("disabled");
                $("#c_list_data_empadronado").html(data);
                $("#c_list_data_empadronado").hide().fadeIn(250); 
                $("#radios_tipoemp").buttonset(); 
                
                $(function(){
                    $('#btnactualizar').click(function(){
                    msgLoading2("#c_frm_chc_ins");
                        load_frm_upd_colegiado();
                    });
                });
            }
            else{
                  $("#preload").html("");
                $("#txt_ins_empa_dni").removeAttr("disabled");
                msgAviso("#c_list_data_empadronado");
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}

function load_frm_upd_colegiado(){
    $.ajax({
        type: "POST",
        url: "colegiado/load_frm_upd_colegiado",
        cache: false,
        data: {
            regcol:$("#hid_id_empa_dni").val(),
            tipo:$("#hid_id_tipo").val()
        },
        success: function(data) {
            $("#c_frm_chc_ins").html(data);
            $("#c_frm_chc_ins").hide().fadeIn(250);
            $("#c_label_tipoemp").html('<strong>Datos Personales de Colegiado</strong>');
        },
        error: function() { 
            alert("error");
        }              
    });

}

function persona_juridica_Upd(nPerId){
  set_popup("colegiado/popupEditarPersona/"+nPerId,"Persona",640,400,'','');   
}
