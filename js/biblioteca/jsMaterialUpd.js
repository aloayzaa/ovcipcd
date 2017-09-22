$(document).ready(function() {

NewCKEditor("txt_upd_mat_resumen");
                    
                            $("#capitulos_upd").change(
            function() {
                $("#capitulos_upd option:selected").each(
                function() {
                    capitulos = $('#capitulos_upd').val();
                    $.post("material/llena_especialidades", {
                        capitulos : capitulos
                    },
                    function(data) {
                        $("#especialidad_upd").html(data);
                    });
                });
            })


          $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
                $("#universidad").bind({
                    change: function(){                        
                        $('#universidad').valid();
                    }
                });   
})
        
        function UniversidadCbo(){
    $.ajax({
        type: "POST",
         url: "material/cboUniversidadGet",
        cache: false,
        success: function(data) {                
            if(data == "vacio"){                            
                $("#mostrar_combo_uni").html("No se encontraron registros");               
            
            }else {
                $("#mostrar_combo_uni").html(data); 
                $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
                $("#cbo_upd_mat_univer").bind({
                    change: function(){                        
                        $('#cbo_upd_mat_univer').valid();
                    }
                });
            }  
        },
        error: function() { 
            $("#mostrar_combo_uni").html("Error al cargar la data"); 
        }              
    });   
}

//UPDATE
$(document).ready(function(){
        $("#frm_upd_material").validate({
        rules: {
            txt_upd_mat_titulo: {
                required: true
            }

        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "material/materialUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("Se ha modificado el material correctamente!","e");
                        limpiarForm(form);
                              $('.popedit').dialog('close'); //Cerrar POPUPS DE FORMA AUTOMATICA
                   
                        materialQry();
                    }else{
                        mensaje("Error Inesperando modificando el curso!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});
