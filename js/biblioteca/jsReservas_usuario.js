
$(function(){  
      $('#Tabs_Material').tabs();  //convierte a tabs 
//        get_page('reserva_usuario/load_tabla_tesis_view/','div_qry');

 
//   $('#tab_tesis').click(function(){
//           get_page('reserva_usuario/load_tabla_tesis_view/','div_qry');
//           limpiar1();
//     });
//
//       
//        
//         $('#tab_libro').click(function(){
//          get_page('reserva_usuario/load_tabla_libro_view/','div_qry_libro');
//          limpiar();
//     });
//     
//       $('#tab_revista').click(function(){
//          get_page('reserva_usuario/load_tabla_revista_view/','div_qry_revista');
//          limpiar2();
//     });
      });

//$(document).ready(function(){   
     
//       $('#Tabs_Material').tabs();  //convierte a tabs 
       
        

//});


function UniversidadCbo(){
    $.ajax({
        type: "POST",
        url: "reserva_usuario/UniversidadCbo",
        cache: false,
        success: function(data) {                
            if(data == "vacio"){                            
                $("#mostrar_combo_universidad").html("No se encontraron registros");               
            
            }else {
                $("#mostrar_combo_universidad").html(data); 
                $(".chzn-select").chosen();
                
                // REVALIDA CON COMBO CON BUSQUEDA
                $("#cbo_ins_mat_univer").bind({
                    change: function(){                        
                        $('#cbo_ins_mat_univer').valid();
                    }
                });
            }  
        },
        error: function() { 
            $("#mostrar_combo_universidad").html("Error al cargar la data"); 
        }              
    });   
}
 



 function DisplayOptions(tip){
     if (tip=='l'){
        $("#oplibro").css("display", "block");
        $("#rowcrit").css("visibility", "visible");
        $("#rowcrit2").css("visibility", "visible");
        $("#rowperi").css("visibility", "hidden");
        $("#txtbuscarlib").val("Ingrese un libro");
     }else if(tip=='p'){         
         $("#oplibro").css("display", "none");
         $("#rowcrit").css("visibility", "hidden");
         $("#rowcrit2").css("visibility", "hidden");
         $("#rowperi").css("visibility", "visible");         
     }else {
         $("#oplibro").css("display", "none");
          $("#rowperi").css("visibility", "hidden");
          $("#txtbuscarlib").val("Ingrese un suplemento");
     }
 }

function filtroCapitulo(valor){
//        $("#cbo_capitulo").html("");
                  $("#ContenedorGeneralPendientes").html("");
                msgLoading("#preload");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
       var datos = valor.options[valor.selectedIndex].value;
//                 alert(  $('#cbo_capitulo').val());
var cap=$('#cbo_capitulo').val();
       get_page('reserva_usuario/load_tabla_tesis_view/'+cap+'/'+datos,'div_qry');
       
   
}


function Capitulo(){
    
    document.getElementById("cbo_edicion_libro").style.display="inline";
    $("#cbo_edicion_libro").val([0]);
}




function filtroCapituloLibro(valor){

      $("#ContenedorGeneralPendientes2").html("");
                msgLoading("#preload2");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
       var datos = valor.options[valor.selectedIndex].value;
       get_page('reserva_usuario/load_tabla_libro_view/'+datos,'div_qry_libro');                    
}

function filtroCapituloRevista(valor){
      $("#ContenedorGeneralPendientes3").html("");
                msgLoading("#preload3");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
       var datos = valor.options[valor.selectedIndex].value;
       get_page('reserva_usuario/load_tabla_revista_view/'+datos,'div_qry_revista');                    
}
function leerRevista(nMatId){
    set_popup("reserva_usuario/popupLeerRevista/"+nMatId,"Leer Revista",1152,800,'','');
}


function MaterialDetalle(nMatId){
       
    set_popup("material/popupDetalleTesis/"+nMatId,"Detalle Tesis",650,650,'','');
 
}

function LibroDetalle(nMatId){
 
     set_popup("material/popupDetalleLibro/"+nMatId,"Detalle Libro",650,650,'','');
}


$(document).ready(function(){
        $("#frm_detalle_material").validate({
        rules: {
//            txt_upd_mat_titulo: {
//                required: true
//            }
////            txt_ins_cur_duracion: {
////                required: true
////            },
////            txt_ins_cur_costo: {
////                required: true
////            },
////            txt_ins_cur_descripcion: {
////                required: true
////            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "reserva_usu/reservains",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("Su reserva se agrego correctamente!","e");
                        limpiarForm(form);
                              $('.popedit').dialog('close'); //Cerrar POPUPS DE FORMA AUTOMATICA
//                       get_page('material/load_listar_view_material/','div_qry'); //Refresh qry automatico
// get_page('material/load_list_material/','list_view_material');
                    }else{
                        mensaje("Cuidado este Material ya fue Reservado","a");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});

function limpiar1()


 {

    document.getElementById("div_qry").innerHTML="";


 }
 function limpiar2()


 {

    document.getElementById("div_qry").innerHTML="";


 }
 
 function limpiar()


 {

    document.getElementById("div_qry_libro").innerHTML="";


 }
 
 
 $(document).ready(function(){
        $("#frm_detalle_libro").validate({
        rules: {
//            txt_upd_mat_titulo: {
//                required: true
//            }
////            txt_ins_cur_duracion: {
////                required: true
////            },
////            txt_ins_cur_costo: {
////                required: true
////            },
////            txt_ins_cur_descripcion: {
////                required: true
////            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "reserva_usu/reservainslib",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                       mensaje("Su reserva se agrego correctamente!","e");
                        limpiarForm(form);
                              $('.popedit').dialog('close'); //Cerrar POPUPS DE FORMA AUTOMATICA
//                       get_page('material/load_listar_view_material/','div_qry'); //Refresh qry automatico
// get_page('material/load_list_material/','list_view_material');
                    }else{
                             mensaje("Cuidado este Material ya fue Reservado","a");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    });

});