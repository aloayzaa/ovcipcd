$(document).ready(function(){
        $("#frm_upd_curso").validate({
        rules: {
            $txt_ins_cur_nombre: {
                required: true
            },
            txt_ins_cur_duracion: {
                required: true
            },
            txt_ins_cur_costo: {
                required: true
            },
            txt_ins_cur_descripcion: {
                required: true
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado el curso correctamente!","e");
                        limpiarForm(form);
                        $('.popedit').dialog('close'); 
                        actualizar($('#cbo_tipo').val());
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

function actualizar(valor){
       get_page('curso/load_listar_view_curso/','div_qry',{
       criterio : valor
    });                    
}
function actualizardetalle(valor){
     get_page('curso/load_listar_detalleDiplomado/'+valor,'detalleModulos',{
       criterio : valor
    });                    
}

function editarModulo(id){
    var nombreModulo=$("#detalle"+id).val();
   var nPerIdDoc=$("#cbo_doc"+id).val();
     var idCurso=$('#hid_upd_cur_idCurso').val();
   $.ajax({
                type: "POST",
                url: "curso/moduloUpd/"+id+"/"+nombreModulo+"/"+nPerIdDoc,
                data: nombreModulo,
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado el modulo correctamente!","e");
                        actualizardetalle(idCurso);
                    }else{
                        mensaje("Error Inesperando modificando el modulo!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando modificando el modulo!, vuelva a intentarlo");                        ;

                }
            });
   
    
}
function eliminarModulo(id){
    var agree=confirm("Desea Eliminar el modulo? ");
      var idCurso=$('#hid_upd_cur_idCurso').val();
      if (agree){
         $.ajax({
                type: "POST",
                url: "curso/moduloDel/"+id,
                data: "",
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha eliminado el modulo correctamente!","e");
                         actualizardetalle(idCurso);
                    }else{
                        mensaje("Error Inesperando eliminando el modulo!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando eliminando el modulo!, vuelva a intentarlo");                        ;
                }
            });       
       }
}

function agregarModulo(){
    
     var numeromodulos=$("#nromodulos").val();
    numeromodulos=parseInt(numeromodulos)+1;
     var cad="";
      cad=cad+'<div class="control-group" >\n\
                        <label id="label" class="control-label">Modulo '+numeromodulos+'</label>\n\
                            <div class="controls">'
                             +'<input type="text" id="detalle_nuevo'+numeromodulos+'" name="detalle'+numeromodulos+'">\n\
                           <img style="cursor:pointer" src="../uploads/campus_virtual/aceptar.png"width="40" height="30" onclick="insertar('+numeromodulos+')">\n\
                         </div>\n\
                    </div>';
        $("#formularioagregar").html(cad);
        
}
function insertar(nro){
    var numeromodulos=$("#nromodulos").val();
    numeromodulos=parseInt(numeromodulos)+1;
    var modulo= $('#detalle_nuevo'+nro).val();
    var idCurso=$('#hid_upd_cur_idCurso').val();
     $.ajax({
                type: "POST",
                url: "curso/moduloIns/"+numeromodulos+"/"+modulo+"/"+idCurso,
                data: "",
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha agregado el modulo correctamente!","e");
                        actualizardetalle(idCurso);
                    }else{
                        mensaje("Error Inesperando agregando el modulo!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("Error Inesperando agregando el modulo!, vuelva a intentarlo","r");                        ;

                }
            });   
}