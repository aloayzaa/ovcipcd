 $(function(){ 
   set_Date("txt_upd_fecnac");
   $("#txt_upd_celular").mask("999-999-999");
   $("#txt_upd_telefono").mask("(999)999999");
   soloNumeros("#txt_upd_telefono","keypress");
   soloNumeros("#txt_upd_celular","keypress");
 });
$(document).ready(function() {  
    //llena combo provincias
    $('#Departamentos').change(function(){
        var depid = $('#Departamentos').val(); 
         var pid = null;
        $.post('Lleno_combos/'+depid+'/'+pid,
        function(options){
            $('#Provincia').html(options);
            $('#Distrito').html('<option>DISTRITO</option>');
        });
    });
    
    //llena combo distritos
    $('#Provincia').change(function(){
        var depid = $('#Departamentos').val();
        var pid = $('#Provincia').val();
        $.post('Lleno_combos/'+depid+'/'+pid,
        function(options){
            $('#Distrito').html(options);
        });
    });
   
   
     $("#frm_upddatos_personales").validate({
        
       rules: {
            cbo_upd_col_sexo: {  
                
                required: true
                
            },
            txt_upd_email: {
                required: true,
                remote: {
                    url: "ValidarEmail/"+$("#txt_hd_nperid").val(),
                    type: "post",
                    data: {
                       txt_upd_email: function() {
                            return $("#txt_upd_email").val();
                        }
                        
                }}
            },    
            txt_upd_fecnac: {
                required: true,
                remote: {
                    url: "ValidarFechaNac",
                    type: "post",
                    data: {
                        txt_upd_fecnac: function() {
                            return $("#txt_upd_fecnac").val();
                        }
                    }
                }
            }, 
           
        },
        messages: {
            txt_upd_email: {                                            
                remote:"* Email ya esta siendo usado"
            },
            txt_upd_fecnac: {                                            
                remote:"* La fecha debe ser mayor de 5 años"
            }
        },
        submitHandler: function(form){
                msgLoading("#preload");
            $.ajax({
                
                type: "POST",
                url: "DatosUsuarioIntUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                   
                        alert("Usted ha actualizado sus datos correctamente!","e");
                         location.reload(true);     
                    }else{
                        alert("Error Inesperando actualizando usuario!, vuelva a intentarlo","r");  
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
    


