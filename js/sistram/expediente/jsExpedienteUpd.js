
$(document).ready(function () {
    // REVALIDA CON COMBO CON BUSQUEDA
    $("#Tramites").bind({
        change: function(){ 
            $("#Tramites").val();  
            updtMultiRequi($("#hid_upd_TramiteId").val(),$("#hid_upd_nExpedienteId").val(),$("#Tramites option:selected").val());
        }
    });
    updtMultiRequi($("#hid_upd_TramiteId").val(),$("#hid_upd_nExpedienteId").val(),$("#hid_upd_TramiteId").val());
    
    $("#frm_editar_expediente").validate({
        rules: {
            Tramites: {
                required: true
            },
            txt_upd_multimedia_codigo: {
                required: true
            },
            txt_upd_multimedia_fecha: {
                required: true
            },
            txt_upd_multimedia_Asunto: {
                required: true
            },
            txt_upd_multimedia_SolicNombre: {
                required: true
            },
            //txt_upd_multi_SolicApellPaterno: {
              //  required: true
            //},
            //txt_upd_multi_SolicApellMaterno: {
              //  required: true
            //},
            txt_upd_multimedia_Folios: {
                required: true
            }
        },
        submitHandler: function (form) {
            var checkboxValores = "";
    $('input[name="order[]"]:checked').each(function() {
          var input=$(this).val();
          checkboxValores += $(this).val() + ",";
        });
          if(checkboxValores!=""){
             
            msgLoading("#preload_registrarupd");

            $("#btn_upd_registrar").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "expediente/expedienteUpd/"+checkboxValores,
                data: $(form).serialize(),
                success: function (msg) {
                    if (msg.trim() !== '') {
                        mensaje("se ha actualizado el área correctamente!", "e");
                        $('.popedit').dialog('close');
                        get_page('expediente/load_listar_view_mesapartes','c_qry_exp');


                    } else {

                        mensaje("Error Inesperando actualizado el Expediente!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    mensaje("r", "Error Inesperando registrando la inscripcion!, vuelva a intentarlo");

                }
            });
              }
        else {
            alert("Seleccione al menos un registro");
        }
        
        }
    });

});

function detalleRequisitos(){
    for (i=0;i<document.f1.elements.length;i++) 
        if(document.f1.elements[i].type == "checkbox")	
            document.f1.elements[i].checked=1 
 
}

function updtMultiRequi(valor,nExpedienteId,nTramiteId){
    $.ajax({
        type: "POST",
        url: 'expediente/load_listar_view_requisitos/'+valor+'/'+nExpedienteId+'/'+nTramiteId,
        cache: false,
        data: {  
        },
        success: function(data){
            $("#c_qry_requiExp").html(data);               
        },
        error: function(data){ 
            alert(data);
        }        
    }
    )
}







