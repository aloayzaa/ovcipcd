/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   soloNumeros("#txt_ins_per_DNI","keypress");
   $("#txt_ins_per_Telefono").mask("999 999999");
   soloLetras("#txt_ins_per_apePat","keypress");
   soloLetras("#txt_ins_per_apeMat","keypress");
   soloLetras("#txt_ins_per_Nombres","keypress");
   
                         

   
 
      $('#txt_ins_per_DNI').blur(function(){          
        if ($('#txt_ins_per_DNI').val().length==8){ 
            $("#txt_ins_per_DNI").attr("disabled", "disabled");
            
           msgLoading("#preload_dni");
           $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
                
            });
            
            timer=setTimeout("get_datos_dni('"+$('#txt_ins_per_DNI').val()+"')",800);
            
        }else{
          get_persona_dni('');
        }
    });
  
        


$("#frm_ins_persona").validate({
        rules: {
   
            txt_ins_per_DNI: {
                required: true,
                digits:true,
                minlength:8             
            },
            txt_ins_per_apePat: {
                required: true
            },
             txt_ins_per_apeMat: {
                required: true
            },
            txt_ins_per_Nombres: {
                required: true
            },   
            txt_ins_per_Telefono: {
                required: false,
                minlength:10
            },
             txt_ins_per_Correo: {
                required: true,
                maxlength:80
            } 
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "persona/personaIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("Se ha registrado la persona correctamente!","e");
                        limpiarForm(form);
                    }else{
                        mensaje("El correo ya ha sido registrado!","a");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando la persona!, vuelva a intentarlo");                        ;

                }
            });
        }
    });
    });
    function get_persona_dni(cPerApellidoPaterno,cPerApellidoMaterno,cPerNombres,Email,Tel){
    $('#txt_ins_per_apePat').val(cPerApellidoPaterno);
    $('#txt_ins_per_apeMat').val(cPerApellidoMaterno);
    $('#txt_ins_per_Nombres').val(cPerNombres);
    $('#txt_ins_per_Correo').val(Email);
    $('#txt_ins_per_Telefono').val(Tel);
           
    if(cPerApellidoPaterno!="" && cPerApellidoMaterno!="" && cPerNombres!="" && Email!="" &&  Tel!=""&& Email!=""){
        $('#txt_ins_per_apePat').attr("readonly", "readonly");
        $('#txt_ins_per_apeMat').attr("readonly", "readonly");
        $("#txt_ins_per_Nombres").attr("readonly", "readonly");
        $("#txt_ins_per_Correo").attr("readonly", "readonly");
        $("#txt_ins_emp_telefono").attr("readonly", "readonly");
          
    }else{
        $('#txt_ins_per_apePat').removeAttr("readonly");
        $('#txt_ins_per_apeMat').removeAttr("readonly");
        $("#txt_ins_per_Nombres").removeAttr("readonly");
        $("#txt_ins_per_Correo").removeAttr("readonly");
        $("#txt_ins_emp_telefono").removeAttr("readonly");
        
    }
}
function get_datos_dni(dni){
    $.ajax({
        type: "POST",
        url: "persona/get_datos_dni",
        cache: false,
        data: {
            dni:dni
        },
        success: function(data) {
            $("#preload_dni").html("");
            $("#txt_ins_per_DNI").removeAttr("disabled");
              $("#btn_ins_per").attr("disabled", "disabled");
            if(data==""){
                get_persona_dni('','','','','');
                   $("#btn_ins_per").removeAttr("disabled");
                
            }else{
                eval(data); 
                
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}
