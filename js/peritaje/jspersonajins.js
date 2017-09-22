/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
 
   soloNumeros("#txt_ins_emp_ruc","keypress");
   $("#txt_ins_emp_telefono").mask("999 999999");
   soloNumeros("#txt_ins_emp_fax","keypress");
   
       $('#txt_ins_emp_ruc').blur(function(){          
        if ($('#txt_ins_emp_ruc').val().length==11){ 
            $("#txt_ins_emp_ruc").attr("disabled", "disabled");
            
           msgLoading("#preload");
           $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
                
            });
            
            timer=setTimeout("get_datos_ruc('"+$('#txt_ins_emp_ruc').val()+"')",800);
            
        }else{
          get_persona_ruc('');
        }
    });
   
$("#frm_ins_empresas").validate({
        rules: {
   
            txt_ins_emp_ruc: {
                required: true,
                digits:true,
                minlength:11
            },
            txt_ins_emp_razonsocial: {
                required: true
            },
            txt_ins_emp_direccionfiscal: {
                required: true
            },
            txt_ins_emp_email: {
                required: true,
                maxlength:80
            } 
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "persona/personajuridicaIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado la persona correctamente!","e");
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
function get_persona_ruc(nParId,cPerNombres,Tel,Fax,Email,DirF,DirT){
    $('#cbo_ins_emp_rubro').val(nParId);
    $('#txt_ins_emp_razonsocial').val(cPerNombres);
    $('#txt_ins_emp_telefono').val(Tel);
    $('#txt_ins_emp_fax').val(Fax);
    $('#txt_ins_emp_email').val(Email);
    $('#txt_ins_emp_direccionfiscal').val(DirF);    
    $('#txt_ins_emp_direccionterminal').val(DirT);    
       
    if(cPerNombres!="" && nParId!="" && Tel!="" && Fax!="" && Email!="" && DirF !="" && DirT!=""){
        $('#cbo_ins_emp_rubro').attr("readonly", "readonly");
        $("#txt_ins_emp_razonsocial").attr("readonly", "readonly");
        $("#txt_ins_emp_telefono").attr("readonly", "readonly");
        $("#txt_ins_emp_fax").attr("readonly", "readonly");
        $("#txt_ins_emp_email").attr("readonly", "readonly");
        $("#txt_ins_emp_direccionfiscal").attr("readonly", "readonly");
        $("#txt_ins_emp_direccionterminal").attr("readonly", "readonly");
         

                  
        
    }else{
         $('#cbo_ins_emp_rubro').removeAttr("readonly");
        $("#txt_ins_emp_razonsocial").removeAttr("readonly");
        $("#txt_ins_emp_telefono").removeAttr("readonly");
        $("#txt_ins_emp_fax").removeAttr("readonly");
        $("#txt_ins_emp_email").removeAttr("readonly");
        $("#txt_ins_emp_direccionfiscal").removeAttr("readonly");
        $("#txt_ins_emp_direccionterminal").removeAttr("readonly");
    }
}

function get_datos_ruc(ruc){
    $.ajax({
        type: "POST",
        url: "persona/get_datos_ruc",
        cache: false,
        data: {
            ruc:ruc
        },
        success: function(data) {
            $("#preload").html("");
            $("#txt_ins_emp_ruc").removeAttr("disabled");
              $("#btn_ins_emp").attr("disabled", "disabled");
            if(data==""){
                get_persona_ruc('','','','','','','');
                   $("#btn_ins_emp").removeAttr("disabled");
                
            }else{
                eval(data); 
                
            }
        },
        error: function() { 
            alert("error");
        }              
    });
}