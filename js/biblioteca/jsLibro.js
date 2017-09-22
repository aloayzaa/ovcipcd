$(function(){ 
    radio('#radio_lib1');
            $('#txt_fnd_lib_criterio').keydown(function(event){
           if (event.keyCode == '13'){ 
               libroQry();
           }
        });
        
        
        $('#tab_materiallibro').click(function(){
        $("#txt_fnd_lib_criterio").val("");   
        $("#txt_fnd_lib_criterio").focus();
        radio("#radio_lib1");
        unbindAttr("#txt_fnd_lib_criterio","keypress");
        letras("#txt_fnd_lib_criterio","keypress");
        $("label[for='radio_lib1']").addClass("ui-state-active ui-button ui-widget ui-state-default ui-button-text-only");
        $("label[for='radio_lib2']").removeClass("ui-state-active");
        $("#txt_fnd_lib_criterio").css({
                 width:"200"
          });

limpiar();
  });
  
  function limpiar()


 {

    document.getElementById("list_view_libro").innerHTML="";


 }
   $("#radios_libro").buttonset(); 
   
            $("#btn_fnd_libro").bind('click', function(event){  

 if ($("#txt_fnd_lib_criterio").val()=="") {
   alert('!Ingresa la condición de busqueda...!')
            
        }
        else{

             libroQry();
        }  


       });
       
       
        //funciones al momento de hacer cik en radio libro
       $('#radio_lib1').click(function(){

            $("#txt_fnd_lib_criterio").hide().fadeIn(250);
            $("#btn_fnd_libro").hide().fadeIn(250);
            $("#txt_fnd_lib_criterio").val("");
            $("#txt_fnd_lib_criterio").attr("maxlength", "50");    
            $("#txt_fnd_lib_criterio").css({
                width:"200"
            });

            unbindAttr("#txt_fnd_lib_criterio","keypress");
            letras("#txt_fnd_lib_criterio","keypress");
            limpiar();

        });
        
            $('#radio_lib2').click(function(){

            $("#txt_fnd_lib_criterio").hide().fadeIn(250);
            $("#btn_fnd_libro").hide().fadeIn(250);
            $("#txt_fnd_lib_criterio").val("");
            $("#txt_fnd_lib_criterio").attr("maxlength", "50");    
            $("#txt_fnd_lib_criterio").css({
                width:"200"
            });

            unbindAttr("#txt_fnd_lib_criterio","keypress");
            letras("#txt_fnd_lib_criterio","keypress"); 
            limpiar();

        });
        
        $('#radio_lib3').click(function(){

           txt_fnd_lib_criterio.style.display="none";
            btn_fnd_libro.style.display="none";
            libroQry();


        });
    
    
});

function limpiar()


{

    document.getElementById("list_view_libro").innerHTML="";


}
function libroQry(){
    
     var titulo;
     var autor;
    
        if ($('input:radio[name=rdblibbus]')[0].checked) {
            titulo=$("#txt_fnd_lib_criterio").val();
            autor='null';
            
     get_page('material/load_list_libro/','list_view_libro', {
                     'titulo' : titulo,
                     'autor' : autor
                 }); 
            
        }
         else if($('input:radio[name=rdblibbus]')[1].checked){
            titulo='null';
            autor=$("#txt_fnd_lib_criterio").val();
            
                get_page('material/load_list_libro/','list_view_libro', {
                     'titulo' : titulo,
                     'autor' : autor
                 }); 
        }
        
        else if ($('input:radio[name=rdblibbus]')[2].checked) {
            titulo='null';
            autor='null';
            
     get_page('material/load_list_libro/','list_view_libro', {
                     'titulo' : titulo,
                     'autor' : autor
                 }); 
            
        }

}

// Eventos de radio  ...........
function radio(obj){
    $(obj).attr('checked','checked');
}


function libroDel(nMatId){
    var rdn=Math.random()*11;
    $.post('material/libroDel/'+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            
            mensaje("Se ha eliminado el libro correctamente!","e");
           libroQry();
        }else{
            mensaje("Error inesperado, no se ha podido eliminar el libro!","r");
        }                        
    });
    return false;
}

$(document).ready(function(){
        
   
   
   $("#cbo_tipos").val([0]);
     $("#cbo_categoria_lib").val([0]);
    $("#cbo_edicion_libro").val([0]);
    document.getElementById("especialidad").length=0;
    $("#txt_ins_lib_titulo").val("");   
    $("#txt_ins_lib_autor").val(""); 
    $("#txt_ins_lib_editorial").val(""); 
    $("#txt_ins_lib_ejemplares").val(""); 
    $("#txt_ins_lib_resumen").val("");
    $("#txt_ins_lib_observacion").val("");
    
    NewCKEditor("txt_ins_lib_resumen");
   
   
$("#frm_ins_libro").validate({
        
                rules: {
                   txt_ins_lib_titulo: {                
                        required: true 
                    },
                    txt_ins_lib_autor: {
                        required: true
                    },
                   txt_ins_lib_editorial: {
                        required: true               
                    },
                    txt_ins_lib_ejemplares: {
                        required: true               
                    },
                   cbo_edicion_libro: {
                        required: true               
                    },
                   cbo_categoria_lib: {
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
                        
                        mensaje("Se ha registrado el Libro correctamente!","e");
                      
                 
                          limpiarFormBli(form);
                            
                        $("#txt_ins_lib_resumen").val("");
             
                         $("#cbo_edicion_libro").val([0]);
                          $("#cbo_categoria_lib").val([0]);
                              $("#txt_ins_lib_titulo").focus();
                          $("#hid_tipo2").val("L");

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

