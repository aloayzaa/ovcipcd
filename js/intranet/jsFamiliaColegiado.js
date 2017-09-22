$(function(){ 
   set_DateRaro("txt_upd_fecnac"); 
    $("#btn_upd_cancel").bind('click', function(){                       
       $('.popedit').dialog('close');    
    });
});
function set_DateRaro(cNotFecha){
        var c = new Date();
        var year_actual=c.getFullYear();
        var year=year_actual + 20;
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi�rcoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            yearRange: "1935:"+year+"",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }

$(document).ready(function() {  
    
$("#frm_edit_familiar").validate({
       rules: {

            txt_upd_apematfam: {
                required: true,
                validarletras: true
            },
            txt_upd_apepatfam: {
                required: true,
                validarletras: true
            },
            txt_upd_fecnac: {
                  required: true,
                remote: {
                    url: "actualizacion_colegiado/ValidarFechaNacFam",
                    type: "post",
                    data: {
                        txt_upd_fecnac: function() {
                            return $("#txt_upd_fecnac").val();
                        }
                    }
                }
            },
             txt_upd_nomfam: {
                required: true,
                validarletras: true
            },
             cbo_upd_estado: {
                required: true
            }
 
        },
        messages: {
           txt_upd_fecnac: {                                            
                remote:"* Error fecha mayor que actual"
             }
        },
        submitHandler: function(form){
                msgLoading("#preLoad2");
                $("#btn_upd_Editfamiliar").attr("disabled","disabled");
            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/ActualizarFamiliar/",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){     
                        $('.popedit').dialog('close');
                        mensaje("Se Actualizo los datos del familiar correctamente.!","e");
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                           
                    }else{
                        $('.popedit').dialog('close');
                        mensaje("Error Inesperando al actualizar!, vuelva a intentarlo","r");  
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                    }                    
                },
                error: function(msg){                
                    alert("r","Error Inesperando al actualizar!, vuelva a intentarlo");
                       location.href="http://localhost/colegiaturacip/intranet/actualizacion_colegiado/";
                   
                }
            });
        }
    }); 
    
    $("#frm_add_familiar").validate({
       rules: {

            txt_upd_apematfam: {
                required: true,
                validarletras: true
            },
            txt_upd_apepatfam: {
                required: true,
                validarletras: true
            },
            txt_upd_fecnac: {
                 required: true,
                remote: {
                    url: "actualizacion_colegiado/ValidarFechaNacFam",
                    type: "post",
                    data: {
                        txt_upd_fecnac: function() {
                            return $("#txt_upd_fecnac").val();
                        }
                    }
                }
            },
             txt_upd_nomfam: {
                required: true,
                validarletras: true
            },
             cbo_upd_estado: {
                required: true
            }
 
        },
        messages: {
           txt_upd_fecnac: {                                            
                remote:"* Error fecha mayor que actual"
             }
        },
        submitHandler: function(form){
                msgLoading("#preLoad");
                $("#btn_upd_addfamiliar").attr("disabled","disabled");
            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/AddFamiliar/",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==0){     

                        $('.popedit').dialog('close');
                        mensaje("Se Agrego los datos del familiar correctamente.!","e");
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                           
                    }else if (msg.trim()==1){
                        $('.popedit').dialog('close');
                        mensaje("Usted solo puede tener 1 Esposo(a)!, vuelva a intentarlo","r");  
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                    }else if (msg.trim()==2){
                        $('.popedit').dialog('close');
                        mensaje("Usted solo puede tener un maximo de 5 hijos(as)!!, vuelva a intentarlo","r");  
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                    }                     
                },
                error: function(msg){                
                    alert("r","Error Inesperando al actualizar!, vuelva a intentarlo");
                       location.href="http://localhost/colegiaturacip/intranet/actualizacion_colegiado/";
                   
                }
            });
        }
    }); 
    
        $("#frm_del_familiar").validate({
       rules: {
 
        },
        submitHandler: function(form){
                msgLoading("#cargando");
            $.ajax({
                
                type: "POST",
                url: "actualizacion_colegiado/DelFamiliar/",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){     
                        $('.popedit').dialog('close');
                        mensaje("Se Elimin&oacute; los datos del familiar correctamente.!","e");
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                           
                    }else{
                        $('.popedit').dialog('close');
                        mensaje("Error al eliminar el familiar!, vuelva a intentarlo","r");  
                         load_frm_upd_familia_colegiado($("#hid_upd_regcol").val());
                    }                   
                },
                error: function(msg){                
                    alert("r","Error Inesperando al actualizar!, vuelva a intentarlo");
                       location.href="http://localhost/colegiaturacip/intranet/actualizacion_colegiado/";
                   
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

