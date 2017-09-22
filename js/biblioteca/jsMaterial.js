$(function(){   
    $('#Tabs_Material').tabs();   
    $('#Tabs_Materiallistar').tabs();
    $('#Tabs_MaterialSinmult').tabs();
       get_page('material/load_listar_view_sinmultimedia/','div_qry');
    radio('#radio_mat1');
         
    $("#tab_materiamultimedia").bind('click', function(){
             $("#Tabs_sinmultes").html("");
                msgLoading("#preload2");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
        get_page('material/load_listar_view_sinmultimedia/','div_qry');
     });
     
     $("#tab_multimedia_lib").bind('click', function(){
          
                  $("#Tabs_sinmultlib").html("");
                msgLoading("#preload4");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
        get_page('material/load_listar_view_sinmultimedia_libro/','div_qry2');
     });
     
     $("#tab_multimedia_rev").bind('click', function(){
              $("#Tabs_sinmultrev").html("");
                msgLoading("#preload3");
                $("#msg_loading").css({
                    display:"inline",
                    'margin-left':'5px'
                });
        get_page('material/load_listar_view_sinmultimedia_revista/','div_qry3');
     });

    // función para realizar la búsqueda presionando ENTER
    $('#txt_fnd_mat_criterio').keydown(function(event){
        if (event.keyCode == '13'){ 
            materialQry();
        }
    });
        
      
                
    // REVALIDA CON COMBO CON BUSQUEDA
    $("#cbo_ins_mat_univer").bind({
        change: function(){                        
            $('#cbo_ins_mat_univer').valid();
        }
    });
               
               
        
    UniversidadCbo();

 
    //TAB MATERIAL TESIS
    $('#tab_materialtesis').click(function(){
 
        $("#txt_fnd_mat_criterio").val("");   
        $("#txt_fnd_mat_criterio").focus();
        radio("#radio_mat1");
        unbindAttr("#txt_fnd_mat_criterio","keypress");
        letrasnumerosguion("#txt_fnd_mat_criterio", "keypress");
        $("label[for='radio_mat1']").addClass("ui-state-active ui-button ui-widget ui-state-default ui-button-text-only");
        $("label[for='radio_mat2']").removeClass("ui-state-active");
        $("label[for='radio_mat3']").removeClass("ui-state-active");
        $("#txt_fnd_mat_criterio").css({
            width:"90"
        });
   
        limpiar();
    });
        
        
        
    // Le coloca el estilo de jquery ui a los radio buttons de empadronamiento
    // Le coloca el estilo de jquery ui a los radio buttons de empadronamiento
    $("#radios_empadronamiento").buttonset(); 
       
       
        
        
    // Realiza la búsqueda con el botón
    $("#btn_fnd_material").bind('click', function(event){  
        if ($("#txt_fnd_mat_criterio").val()=="") {
            alert('!Ingresa la condición de busqueda...!')
            
        }
        else{
            $("#btn_fnd_material").html("");
            $("#list_view_material").html("");
            msgLoading("#preload");
            $("#msg_loading").css({
                display:"inline",
                'margin-left':'5px'
            });
          
            materialQry();
        }          
    });
    
    //funcionnes al momento de hacer clic en los radios de msterial
    
    $('#radio_mat1').click(function(){

        $("#txt_fnd_mat_criterio").hide().fadeIn(250);
        $("#btn_fnd_material").hide().fadeIn(250);
        $("#txt_fnd_mat_criterio").val("");
        $("#txt_fnd_mat_criterio").attr("maxlength", "15");    
        $("#txt_fnd_mat_criterio").css({
            width:"90"
        });

        unbindAttr("#txt_fnd_mat_criterio","keypress");
        letrasnumerosguion("#txt_fnd_mat_criterio","keypress");                            
        limpiar();
    });
        

    $('#radio_mat2').click(function(){
        $("#txt_fnd_mat_criterio").hide().fadeIn(250);
        $("#btn_fnd_material").hide().fadeIn(250);
        $("#txt_fnd_mat_criterio").val("");
        $("#txt_fnd_mat_criterio").attr("maxlength", "50");    
        $("#txt_fnd_mat_criterio").css({
            width:"200"
        });

        unbindAttr("#txt_fnd_mat_criterio","keypress");
        letras("#txt_fnd_mat_criterio","keypress");                            
        limpiar();
    });
       
       
    $('#radio_mat3').click(function(){
        $("#txt_fnd_mat_criterio").hide().fadeIn(250);
        $("#btn_fnd_material").hide().fadeIn(250);
        $("#txt_fnd_mat_criterio").val("");
        $("#txt_fnd_mat_criterio").attr("maxlength", "50");    
        $("#txt_fnd_mat_criterio").css({
            width:"200"
        });

        unbindAttr("#txt_fnd_mat_criterio","keypress");
        letras("#txt_fnd_mat_criterio","keypress");                            
        limpiar();
    });
       
    $('#radio_mat4').click(function(){
                
        txt_fnd_mat_criterio.style.display="none";
        btn_fnd_material.style.display="none";
        materialQry();
                 
        
    });
    
    
     function limpiar()
               {
                       document.getElementById("list_view_material").innerHTML="";
           }
 
     
});

function UniversidadCbo(){
    $.ajax({
        type: "POST",
        url: "material/UniversidadCbo",
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


function UniversidadCbo(){
    $.ajax({
        type: "POST",
        url: "material/UniversidadCbo",
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


function materialQry(){
   
    var codigo;
    var autor;
    var titulo;
    if ($('input:radio[name=rdbmatbus]')[0].checked) {
        codigo=$("#txt_fnd_mat_criterio").val();
        autor='null';
        titulo='null';
            
        get_page('material/load_list_material/','list_view_material', {
            'codigo' : codigo,
            'autor' : autor,
            'titulo' : titulo
            
        });   
    }
    else if($('input:radio[name=rdbmatbus]')[1].checked){
        codigo='null';
        autor=$("#txt_fnd_mat_criterio").val();
        titulo='null';
            
        get_page('material/load_list_material/','list_view_material', {
            'codigo' : codigo,
            'autor' : autor,
            'titulo' : titulo
        }); 
    } 
        
        
    else if ($('input:radio[name=rdbmatbus]')[2].checked) {
        codigo='null';
        autor='null';
        titulo=$("#txt_fnd_mat_criterio").val();
            
        get_page('material/load_list_material/','list_view_material', {
            'codigo' : codigo,
            'autor' : autor,
            'titulo' : titulo
        }); 
            
    }
    else if ($('input:radio[name=rdbmatbus]')[3].checked) {
        codigo='null';
        autor='null';
        titulo="null";
            
        get_page('material/load_list_material/','list_view_material', {
            'codigo' : codigo,
            'autor' : autor,
            'titulo' : titulo
        }); 
            
    }
   }

//COMBO TIPO
    
$(document).ready(function() {

     soloNumeros("#txt_ins_lib_ejemplares","keypress");
    soloNumeros("#txt_ins_rev_ejemplares","keypress");
     $("#txt_ins_mat_titulo").focus();
    $("#cbo_tipos").change(function() {   
        
        var cMatOpcion=($(this).val()); 
        if(cMatOpcion=='0'){
            var contenedor = document.getElementById("div_ins");
            contenedor.style.display = "block";      
            var contenedor = document.getElementById("div_ins2");
            contenedor.style.display = "none";
            var contenedor = document.getElementById("div_ins3");
            contenedor.style.display = "none";
                limpiarFormBli(frm_ins_material);
                     $("#capitulos").val([0]);
                        $("#cbo_anos").val([0]);
                         document.getElementById("especialidad").length=0;
                        $("#txt_ins_mat_resumen").val("");
                        UniversidadCbo();
                           $("#hid_tipo").val("T");
                $("#txt_ins_mat_titulo").focus();
                
                      
            
            return true;
        }else{
            if(cMatOpcion=='1'){
                var contenedor = document.getElementById("div_ins2");
                contenedor.style.display = "block";
                var contenedor = document.getElementById("div_ins");
                contenedor.style.display = "none";
                var contenedor = document.getElementById("div_ins3");
                contenedor.style.display = "none";
                     limpiarFormBli(frm_ins_libro);              
                        $("#txt_ins_lib_resumen").val("");
                         $("#cbo_edicion_libro").val([0]);
                          $("#cbo_categoria_lib").val([0]);
                             $("#hid_tipo2").val("L");
                         $("#txt_ins_lib_titulo").focus();

            }
            else{
                var contenedor = document.getElementById("div_ins2");
                contenedor.style.display = "none";
                var contenedor = document.getElementById("div_ins");
                contenedor.style.display = "none";
                var contenedor = document.getElementById("div_ins3");
                contenedor.style.display = "block";
                    $("#txt_ins_rev_titulo").focus();
                      limpiarFormBli(frm_ins_revista);
                            

                          $("#cbo_edicion_revista").val([0]);
                          $("#cbo_categoria_rev").val([0]);
                          $("#hid_tipo3").val("R");
                           $("#txt_ins_rev_resumen").val("");
            }
          
        }
    });        
});
      

//COMBO
$(document).ready(function() {
      
    $("#capitulos").change(
        function() {
            $("#capitulos option:selected").each(
                function() {
                    capitulos = $('#capitulos').val();
                    $.post("material/llena_especialidades", {
                        capitulos : capitulos
                    },
                    function(data) {
                        $("#especialidad").html(data);
                    });
                });
        })
});
        

        
        
//AUTOCOMPLETAR
$(document).ready(function(){
    function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#log" ).scrollTop( 0 );
    }
    $('#colegiado').autocomplete({	
        source: 'material/ajax',
        select: function( event, ui ) {
            log( ui.item ?
                ui.item.value  :
                "Nothing selected, input was " + this.value );
        }


    });
});
                



function certificadoDel(codcertificados){
    var rdn=Math.random()*11;
    $.post('certificado/certificadoDel/'+codcertificados, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            mensaje("se ha eliminado la persona correctamente!","e");
        }else{
            mensaje("Error inesperado, no se ha podido eliminar a la persona!","e");
        }                        
    });
    return false;
}


// Eventos de radio  ...........
function radio(obj){
    $(obj).attr('checked','checked');
}
    
$(document).ready(function(){
        
        
     $("#cbo_tipos").val([0]);
     $("#capitulos").val([0]);
    $("#cbo_anos").val([0]);
    document.getElementById("especialidad").length=0;
    $("#txt_ins_mat_titulo").val("");   
    $("#txt_ins_mat_autor").val(""); 
    $("#txt_ins_mat_resumen").val(""); 
    $("#txt_ins_mat_observacion").val(""); 
    
    
    NewCKEditor("txt_ins_mat_resumen");
    NewCKEditor("txt_ins_lib_resumen");
    NewCKEditor("txt_ins_rev_resumen");
    $(".chzn-select").chosen();


    $("#frm_ins_material").validate({
        
                rules: {
                   txt_ins_mat_titulo: {                
                        required: true 
                  },
                   txt_ins_mat_autor: {
                        required: true
                  },
                  txt_ins_mat_autor: {
                      required: true               
                 },
                    capitulos: {
                        required: true               
                    },
                    especialidad: {
                        required: true               
                    },
                   cbo_ins_mat_univer: {
                        required: true               
                    },
                   cbo_anos: {
                       required: true               
                    }
                  
            
   
                },
             
        submitHandler: function(form){
                
            $.ajax({
                
                type: "POST",
                url: "material/materialins",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                     
                    if(msg.trim()==1){   
                        
                        mensaje("se ha registrado la Tesisl correctamente!","e");
                      
                          limpiarFormBli(form);
                        $("#capitulos").val([0]);
                        $("#cbo_anos").val([0]);
                         document.getElementById("especialidad").length=0;
                        $("#txt_ins_mat_resumen").val("");
                        $("#hid_tipo").val("T");
                        UniversidadCbo();
                          $("#txt_ins_mat_titulo").focus();
                    }else{
                        mensaje("Error Inesperando registrando el Material!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Material!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});



    
function tesisDel(nMatId){
    var rdn=Math.random()*11;
    $.post('material/tesisDel/'+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            //            
            mensaje("Se ha eliminado la tesis correctamente!","e");
            materialQry();
        }else{
            mensaje("Error inesperado, no se ha podido cambiar el estado del libro!","r");
        }                        
    });
    return false;
}

    function uploadmult(nMatId){
    set_popup("material/popupUploadMult/"+nMatId,"Subir Archivos Multimedia",550,550,'','');
}

    function uploadmultlib(nMatId){
    set_popup("material/popupUpload_libro/"+nMatId,"Subir Archivos Multimedia",500,200,'','');
}


   function uploadmultrev(nMatId){
    set_popup("material/popupUpload_revista/"+nMatId,"Subir Archivos Multimedia",500,200,'','');
}