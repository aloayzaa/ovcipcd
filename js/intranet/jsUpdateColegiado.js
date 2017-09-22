$(function(){ 
            $("#toogledireccion").toggle(
                function(){
                   $("#nuevadireccion").css("display","block"); 
                   soloNumeros("#txt_upd_col_direccion_no","keypress");
                   soloNumeros("#txt_upd_col_direccion_piso","keypress");
                   soloNumeros("#txt_upd_col_direccion_dpto","keypress");
               
                $("#cbo_tipo_direccion").attr("required", "required");   
                 $("#txt_upd_col_direccion_no").attr("required", "required");
                 $("#txt_upd_col_direccion_dir").attr("required", "required");  
                },
                function(){
                 $("#cbo_tipo_direccion").removeAttr("required", "required");   
                 $("#txt_upd_col_direccion_no").removeAttr("required", "required");
                 $("#txt_upd_col_direccion_dir").removeAttr("required", "required"); 
                    $("#nuevadireccion").css("display","none");
                });
  
});


$(document).ready(function() {
    $('#Departamentos').change(function(){
        var depid = $('#Departamentos').val();     
        $.post('actualizacion_colegiado/Llena_combos', {
             tipo:3,
            id: depid
        }, function(options){
            $('#Provincia').html(options);
            $('#Distrito').html('<option>Seleccionar</option>');
            $('#Zona').html("<option>Seleccionar</option>");
var combo = document.getElementById("Departamentos");
var selected = combo.options[combo.selectedIndex].text;
           document.getElementById('txt_hd_Departamentos').value = selected;
           //$('#cbo_distrito').html(options);
        });
    });
      $('#Provincia').change(function(){
        var depid = $('#Provincia').val();     
        $.post('actualizacion_colegiado/Llena_combos', {
             tipo:2,
            id: depid
        }, function(options){
            $('#Distrito').html(options);
            $('#Zona').html('<option>Seleccionar</option>');
var combo = document.getElementById("Provincia");
var selected = combo.options[combo.selectedIndex].text;
           document.getElementById('txt_hd_Provincia').value = selected;
            //$('#cbo_distrito').html(options);
        });
    });
     $('#Distrito').change(function(){
        var depid = $('#Distrito').val();     
        $.post('actualizacion_colegiado/Llena_combos', {
             tipo:1,
            id: depid
        }, function(options){
            $('#Zona').html(options);
var combo = document.getElementById("Distrito");
var selected = combo.options[combo.selectedIndex].text;
           document.getElementById('txt_hd_Distrito').value = selected;
            //$('#cbo_distrito').html(options);
        });
    });
    var recol = $("#hid_upd_regcol").val();
    
    $("#frm_upddatos_personales").validate({
        
       rules: {
            cbo_upd_col_sexo: {  
                
                required: true
                
            },
            Departamentos: {  
                
                required: true
                
            },
            Distrito: {  
                
                required: true
                
            },
            Provincia: {  
                
                required: true
                
            },
            Zona: {  
                
                required: true
                
            },
            txt_upd_col_emails: {
                required: true,
                remote: {
                    url: "actualizacion_colegiado/ValidarEmail",
                    type: "post",
                    data: {
                       txt_upd_col_emails: function() {
                            return $("#txt_upd_col_emails").val();
                        },
                        codigo : recol
                    }
                }
            }         
        },
        messages: {
            txt_upd_col_emails: {                                            
                remote:"* Email ya existe"
            }
        },
        submitHandler: function(form){
		  msgLoading("#preLoad");
                $("#btn_upd_colegiado").attr("disabled","disabled");

            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/DatosColegiadoIntUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        
                        mensaje("Usted ha actualizado sus datos correctamente!","e");
//			   $("#preLoad").css("display","none");
			   $("#preLoad").html("");
                        $("#btn_upd_colegiado").removeAttr("disabled","disabled");
			   //load_frm_upd_prof_colegiado($("#hid_upd_regcol").val());
msgLoading2("#colegiadol"); 
get_page('actualizacion_colegiado/cargar/','colegiadol'); 
                    }else{
                        alert("Error Inesperando actualizando persona!, vuelva a intentarlo","r");  
                       location.reload(true);  
                    }                    
                },
                error: function(msg){                
                    alert("r","Error Inesperando actualizando la personass!, vuelva a intentarlo");
                       location.reload(true);  
                   
                }
            });
        }
    }); 
    jQuery.validator.addMethod("validarletras",function(value, element) {
        return this.optional(element) || /^[a-zA-Z ñ Ñ ÁÉÍÓÚáéíóú]+$/.test(value); //no importa el error problema de IDE parece es valido en una expresion regular de javascript
    },
    jQuery.format("* Debe ingresar solo letras.")
        );
    jQuery.validator.addMethod("validarletrasnum",function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    },
    jQuery.format("* Debe ingresar solo letras y numeros.")
        );
});





