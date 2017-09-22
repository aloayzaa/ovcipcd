$(document).ready(function() {
//            LlenaDepartamentos();
             // $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
//                $("#Zona").bind({
//                    change: function(){                        
//                        $('#Zona').valid();
//                    }
//                });
    set_Date("txt_ins_col_fecnac");
    $("#frm_DatosColegiadoUpd").validate({
        rules: {
//            txt_upd_col_direccion: {
//                required: true
//            }                                                                
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "actualizacion_colegiado/DatosColegiadoIntUpd",
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){ 
                        $("#c_list_data_empadronado").html("");
                        $("#c_frm_datos_upd").html("");
                        mensaje("se han actualizado los datos correctamente!","e");
                          }else if (msg.trim()==3){
                        mensaje("Cuidado!, El campo correo electronico no es una dirección de email válida.","a");                                                
                    }else{                    
                        mensaje("Error Inesperando modificando los datos del colegiado!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){          
                   mensaje("r","Error Inesperando modificando los datos del colegiado!, vuelva a intentarlo");                       
                     
                }
            });
        }
    });   
    
     //llena combo provincias
    $('#Departamentos').change(function(){
        var depid = $('#Departamentos').val();     
        $.post('Lleno_combos', {
             tipo:3,
            id: depid
        }, function(options){
            $('#Provincia').html(options);
            //$('#cbo_distrito').html(options);
        });
    });
});
//   function LlenaDepartamentos(){
//         $.post('actualizacion_colegiado/Lleno_combos', {
//             tipo: 1,
//             id: null
//        }, function(options){
//            $('#Provincia').html(options);
//            //$('#cbo_distrito').html(options);
//        });
//        
//   }
//function cboZonaGet(){
//    $.ajax({
//        type: "POST",
//         url: "actualizacion_colegiado/cboZonaGet",
//        cache: false,
//        success: function(data) {                
//            if(data == "vacio"){                            
//                $("#mostrar_combo_zona").html("No se encontraron registros");               
//            
//            }else {
//                $("#mostrar_combo_zona").html(data); 
//                $(".chzn-select").chosen();
//                
//                // REVALIDA CON COMBO CON BUSQUEDA
//                $("#cbo_zona_colegiado").bind({
//                    change: function(){                        
//                        $('#cbo_zona_colegiado').valid();
//                    }
//                });
//            }  
//        },
//        error: function() { 
//            $("#mostrar_combo_zona").html("Error al cargar la data"); 
//        }              
//    });   
//}

    



