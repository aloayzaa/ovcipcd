$(function () {
    
    
    validaNumeros("#txt_nrodni", "keypress");
    $("#AreasListar").bind('click', function () {
        
        msgLoading2("#qry_areas");
        get_page('areas/load_listar_view_areas/', 'qry_areas');
        
    });
   
 });

//funcionnes al momento de hacer clic en los radios de empadronamiento

$(document).ready(function () {
    $("#todos").hide();
    $("#actuales").show();
       $(".chzn-select").chosen();
    $("#frm_registrar_area").validate({
        rules: {
            txt_ins_area_descripcion: {
                required: true
            },
            cbo_usuarios_admin:{
                 required: true
            }
        },
        submitHandler: function (form) {
            msgLoading("#preload_registrar");
            $("#btn_ins_registrar").prop("disabled", true);
            var ID=$("#cbo_usuarios_admin").val();
            var usuario=$("#cbo_usuarios_admin option:selected").text();
            var nombrecargo=$("#txt_ins_nombre_cargo").val();
            var responsable=$("#nombre_usuario").text();
           
            var data={
                ID:ID,
                usuario:usuario,
                nombrecargo:nombrecargo,
                responsable:responsable
            };
            $.ajax({
                type: "POST",
                url: "areas/areasIns",
                data: data,
                success: function (msg) {
                    if (msg.trim()=='1') {
                        mensaje("se ha registrado el área correctamente!", "e");
                        limpiarForm(form);
                        $("#cbo_usuarios_admin option[value='']").attr("selected",true);
                        $("#btn_ins_registrar").prop("disabled", false);
                        $("#preload_registrar").html("");

                    } else if(msg.trim()=='2'){
                         mensaje("El área ya cuenta con el usuario asignado", "a");
                         $("#btn_ins_registrar").prop("disabled", false);
                             $("#preload_registrar").html("");
                    } else if(msg.trim()=='-1'){
                         mensaje("No existe una cuenta de usuario", "a");
                         $("#btn_ins_registrar").prop("disabled", false);
                             $("#preload_registrar").html("");
                    } else {
                     //    alert(msg.trim());
                         $("#preload_registrar").html("");
                          mensaje("Error Inesperando registrando el área!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    mensaje("Error Inesperando registrando la inscripcion!, vuelva a intentarlo","r");

                }
            });
        }
    });

});
function validaNumeros(obj, evt) {
    $(obj).bind(evt, function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
    })
}
function mostrar_usuarios(){
    msgLoading('#nombre_usuario');
    var ID=$('#cbo_usuarios_admin').val();
     $.ajax({
        type: "POST",
        url: "areas/mostrar_nombre_usuario",
        cache: false,
        data: {
            ID: ID
        },
        success: function (data) {
           $('#nombre_usuario').html(data);
        },
        error: function () {

        }
    
     });
}
function responsableIns(nAreasId){
  set_popup("areas/popupAsignarResponsable/"+nAreasId,"Asignar nuevo responsable de área",640,400,'','');   
}

function areasDel(nAreasId){
     bootbox.confirm("<h3>¿Seguro de eliminar el área?</h3>", function(result) {
              if(result===true){
                   var rdn=Math.random()*11;
                    $.post('areas/areasDel/'+nAreasId, {
                        rdn:rdn
                    }, function(data){
                        if(data.trim()==1){
                          get_page('areas/load_listar_view_areas/', 'qry_areas');
                          mensaje("se ha eliminado el área correctamente!","e");

                        }else if(data.trim()==2){
                            mensaje("Imposible de Eliminar,el área es participe de varios expedientes !","r");
                        }                       
                    
                        else{
                            mensaje("Error inesperado, no se ha podido eliminar el área!","r");
                        }                        
                    });
               
               
              }
          });
    
    
}



