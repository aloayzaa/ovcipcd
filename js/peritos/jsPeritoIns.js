
    $(function(){
    MostrarfechaActual("txt_ins_fecha_solicitud","NA");
    MostrarfechaActual("txt_ins_fecha_respuesta","NA");
    
});

$(document).ready(function() {  
    set_Date("txt_ins_fecha_solicitud");
    set_Date("txt_ins_fecha_respuesta");
    $("#frm_ins_solicitud").validate({
        rules: { 
            txt_ins_asunto: {
                required: true
            },
            txt_ins_fecha_solicitud: {
                required: true
            },
            txt_ins_descripcion_peritaje: {
                required: true
            },
            txt_ins_direccion_peritaje: {
                required: true
            },
            txt_ins_fecha_respuesta: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "peritos/Solicitud_Peritaje_Ins",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){    
                        mensaje("se ha registrado la solicitud!","e");
                        $("#txt_ins_asunto").val("");
                        $("#txt_ins_fecha_solicitud").val("");
                        $("#txt_ins_descripcion_peritaje").val(""); 
                        $("#txt_ins_direccion_peritaje").val(""); 
                        $("#txt_ins_fecha_respuesta").val("");
                        $("#frm_ins_solicitud").hide();
                        $("#c_list_data_remitente").hide(); 
                        $("#txt_ins_exp_nrodocumento").val("");
                    }else{
                        mensaje("Error Inesperando registrando la solicitud!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la solicitud!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
})




