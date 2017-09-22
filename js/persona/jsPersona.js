$(function(){ 
   set_Date("txt_ins_col_fecnac");
   $("#txt_ins_col_cel").mask("999-999-999");
   $("#txt_ins_col_tel").mask("(999)999999");
   soloNumeros("#txt_ins_col_cel","keypress");
   soloNumeros("#txt_ins_col_tel","keypress");
});
$(document).ready(function() {  
    
    //llena combo provincias
    $('#cbo_departamentos').change(function(){
        var depid = $('#cbo_departamentos').val();     
        $.post('persona/Lleno_combos', {
             pid:'null',
            idd: depid
        }, function(options){
            $('#cbo_provincia').html(options);
            //$('#cbo_distrito').html(options);
        });
    });
    
    //llena combo distritos
    $('#cbo_provincia').change(function(){
        var depid = $('#cbo_departamentos').val();
        var pid = $('#cbo_provincia').val();
        $.post('persona/Lleno_combos', {
            pid:pid,
            idd:depid
        }, function(options){
            $('#cbo_distrito').html(options);
        });
    });
function lookUpUsername(name){
    $.post( 
        'persona/ValidarDni2',
         { txt_ins_col_dni: name },
         function(response) {  
            if (response == 2) {
               mensaje("Este Dni esta siendo utilizado por un Colegiado!","a");
                        
             }
         }  
    );
}
$("#frm_ins_persona").validate({
       rules: {
            txt_ins_col_dni: {  
                
                required: true,
                remote: {
                    
                    url: "persona/ValidarDni",
                    type: "post",
                    data: {
                        
                       txt_ins_col_dni: function() {
                            lookUpUsername($("#txt_ins_col_dni").val())
                            return $("#txt_ins_col_dni").val();
                            

                        }
                    }
                }
            },
            txt_ins_col_nombres: {
                required: true,
                validarletras: true
            },
            txt_ins_col_apellidopat: {
                required: true,
                validarletras: true
            },
            txt_ins_col_apellidomat: {
                required: true,
                validarletras: true
            },
            txt_ins_col_email: {
                required: true,
                remote: {
                    url: "persona/ValidarEmail",
                    type: "post",
                    data: {
                       txt_ins_col_email: function() {
                            return $("#txt_ins_col_email").val();
                        }
                    }
                }
            },
//            txt_ins_col_direc: {
//                required: true
//            }, 
//            txt_ins_col_cel: {
//                required: true
//            }, 
//            txt_ins_col_tel: {
//                required: true
//            }, 
            txt_ins_col_fecnac: {
                // required: true,
                remote: {
                    url: "persona/ValidarFechaNac",
                    type: "post",
                    data: {
                        txt_ins_col_fecnac: function() {
                            return $("#txt_ins_col_fecnac").val();
                        }
                    }
                }
            }, 
             txt_ins_col_usr: {
                required: true,
                validarletrasnum: true,
                maxlength: 12,
                minlength: 6,
                remote: {
                    url: "persona/ValidarUsuario",
                    type: "post",
                    data: {
                       txt_ins_col_usr: function() {
                            return $("#txt_ins_col_usr").val();
                        }
                    }
                }
            },
             txt_ins_col_pwd: {
                required: true
            },
             txt_ins_col_rpwd: {
                required: true,
                equalTo: "#txt_ins_col_pwd"
            },
                    
            cbo_ins_col_sexo: {
                required: true
            },
            cbo_ins_col_estado_civil: {
                required: true
            },
            cbo_departamentos: {
                required: true
            },
            cbo_provincia: {
                required: true
            },
            cbo_distrito: {
                required: true
            }
        },
        messages: {
            txt_ins_col_dni: {                                            
                remote:"* Usted ya esta registrado"
            },

            txt_ins_col_email: {                                            
                remote:"* Email ya existe"
            },
            txt_ins_col_usr: {                                            
                remote:"* Usuario ya existe",
                validarletrasnum:"* Ingrese solo números y letras"
            },
            txt_ins_col_rpwd: {                                            
                remote:"* No coinciden las Contraseñas"
            },
            txt_ins_col_fecnac: {                                            
                remote:"* La fecha debe ser mayor de 5 años"
            }
        },
        submitHandler: function(form){
                msgLoading("#cargando");
            $.ajax({
                
                type: "POST",
                url: "persona/DatosPersonaIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                   
                        mensaje("Se ha registrado correctamente Usuario!","e");
                        limpiarForm(form);
                 document.getElementById('check_email').checked = true;
                    }else{
                        mensaje("Error Inesperando registrando la persona!, vuelva a intentarlo","r");  
                          
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la personass!, vuelva a intentarlo");
                        
                   
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


