 $(function(){ 
   set_Date("txt_ins_col_fecnac");
   $("#txt_upd_col_celular").mask("999-999-999");
   $("#txt_upd_col_telefono").mask("(999)999999");
   soloNumeros("#txt_upd_col_telefono","keypress");
   soloNumeros("#txt_upd_col_celular","keypress");
 });

 $(document).ready(function() {
     
  //llena combo provincias
    $('#Departamentos').change(function(){
        var depid = $('#Departamentos').val();     
        $.post('colegiado/Llena_combosExt', {
             pid:'null',
            idd: depid
        }, function(options){
            $('#Provincia').html(options);
             $('#Distrito').html('<option>Seleccionar</option>');
        });
    });
    
    //llena combo distritos
    $('#Provincia').change(function(){
        var depid = $('#Departamentos').val();
        var pid = $('#Provincia').val();
        $.post('colegiado/Llena_combosExt', {
            pid:pid,
            idd:depid
        }, function(options){
            $('#Distrito').html(options);
        });
    });         

     var recol = $("#txt_upd_col_dni").val();
    
     $("#frm_actualizar_usuarioe").validate({
        
       rules: {
             txt_upd_col_dni: {               
                required: true
                
            },
            txt_upd_col_nombres: {               
                required: true
                
            },
            txt_upd_col_apellidopat: {               
                required: true
                
            },
            txt_upd_col_apellidomat: {               
                required: true
                
            },
                //txt_upd_col_direccion: {               
                    //required: true
                
                //},
                 //txt_ins_col_fecnac: {               
                   // required: true
                
                //},
                 //Departamentos: {               
                    //required: true
                
                //},
                // Provincia: {               
                   // required: true
                
                //},
                 //Distrito: {               
                    //required: true
                
                //},
            
            txt_upd_col_email: {
                    //required: true,
                remote: {
                    url: "colegiado/ValidarEmailExt",
                    type: "post",
                    data: {
                       txt_upd_col_email: function() {
                            return $("#txt_upd_col_email").val();
                        },
                        codigo : recol
                    }
                }
            } 
            
           
        },
        messages: {
            txt_upd_col_email: {                                            
                remote:"* Email ya existe"
            }
        },
        submitHandler: function(form){
                msgLoading("#preLoad");
                $("#btn_upd_colegiado").attr("disabled","disabled");
            $.ajax({
                
                type: "POST",
                url: "colegiado/DatosexternoUsuarioUpd",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        $("#preLoad").html("");
                        $("#c_list_data_empadronado").html("");
                                  $("#c_frm_chc_ins").html("");
                        $("#c_cargar_div").html("");
                        $("cbo_ins_per_tipo").val()==='0';
                  mensaje("Usted ha actualizado sus datos correctamente!","e");
 		  $("#btn_upd_colegiado").removeAttr("disabled","disabled");
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
    });