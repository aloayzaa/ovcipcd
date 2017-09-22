$(function(){ 
    radio('#radio_rev1');
            $('#txt_fnd_rev_criterio').keydown(function(event){
           if (event.keyCode == '13'){ 
               revistaQry();
           }
        });
        
        
        $('#tab_materialrevista').click(function(){
        $("#txt_fnd_rev_criterio").val("");   
        $("#txt_fnd_rev_criterio").focus();
        radio("#radio_rev1");
        unbindAttr("#txt_fnd_rev_criterio","keypress");
        letras("#txt_fnd_rev_criterio","keypress");
        $("label[for='radio_rev1']").addClass("ui-state-active ui-button ui-widget ui-state-default ui-button-text-only");
        $("label[for='radio_rev2']").removeClass("ui-state-active");
        $("label[for='radio_rev3']").removeClass("ui-state-active");
        $("#txt_fnd_rev_criterio").css({
                 width:"200"
          });

limpiar();
  });
  
  function limpiar()


 {

    document.getElementById("list_view_revista").innerHTML="";


 }
   $("#radios_revista").buttonset(); 
   
            $("#btn_fnd_revista").bind('click', function(event){  


 if ($("#txt_fnd_rev_criterio").val()=="") {
   alert('!Ingresa la condición de busqueda...!')
            
        }
        else{

              revistaQry(); 
        }  
         
       });
       
       
        //funciones al momento de hacer cik en radio libro
       $('#radio_rev1').click(function(){

            $("#txt_fnd_rev_criterio").hide().fadeIn(250);
            $("#btn_fnd_revista").hide().fadeIn(250);
            $("#txt_fnd_rev_criterio").val("");
            $("#txt_fnd_rev_criterio").attr("maxlength", "50");    
            $("#txt_fnd_rev_criterio").css({
                width:"200"
            });

            unbindAttr("#txt_fnd_rev_criterio","keypress");
            letras("#txt_fnd_rev_criterio","keypress");      
            limpiar();

        });
        
            $('#radio_rev2').click(function(){

            $("#txt_fnd_rev_criterio").hide().fadeIn(250);
            $("#btn_fnd_revista").hide().fadeIn(250);
            $("#txt_fnd_rev_criterio").val("");
            $("#txt_fnd_rev_criterio").attr("maxlength", "50");    
            $("#txt_fnd_rev_criterio").css({
                width:"200"
            });

            unbindAttr("#txt_fnd_rev_criterio","keypress");
            letras("#txt_fnd_rev_criterio","keypress");     
            limpiar();

        });
        
         $('#radio_rev3').click(function(){

            $("#txt_fnd_rev_criterio").hide().fadeIn(250);
            $("#btn_fnd_revista").hide().fadeIn(250);
            $("#txt_fnd_rev_criterio").val("");
            $("#txt_fnd_rev_criterio").attr("maxlength", "50");    
            $("#txt_fnd_rev_criterio").css({
                width:"200"
            });

            unbindAttr("#txt_fnd_rev_criterio","keypress");
            letras("#txt_fnd_rev_criterio","keypress");           
            limpiar();

        });
        
         $('#radio_rev4').click(function(){
txt_fnd_rev_criterio.style.display="none";
            btn_fnd_revista.style.display="none";
               revistaQry();                       

        });
    
    
});
function radio(obj){
    $(obj).attr('checked','checked');
}

function revistaQry(){
    
     var titulo;
     var editorial;
     var categoria;
    
        if ($('input:radio[name=rdbrevbus]')[0].checked) {
            titulo=$("#txt_fnd_rev_criterio").val();
            editorial='null';
            categoria='null';
     get_page('material/load_list_revista/','list_view_revista', {
                     'titulo' : titulo,
                     'editorial' : editorial,
                     'categoria' : categoria
                 }); 
            
        }
        else if($('input:radio[name=rdbrevbus]')[1].checked){
           titulo='null';
            editorial=$("#txt_fnd_rev_criterio").val();
            categoria='null';
            
                     get_page('material/load_list_revista/','list_view_revista', {
                     'titulo' : titulo,
                     'editorial' : editorial,
                     'categoria' : categoria
                 }); 
        }
        
        
                else if($('input:radio[name=rdbrevbus]')[2].checked){
           titulo='null';
            editorial='null';
            categoria=$("#txt_fnd_rev_criterio").val();
            
                     get_page('material/load_list_revista/','list_view_revista', {
                     'titulo' : titulo,
                     'editorial' : editorial,
                     'categoria' : categoria
                 }); 
        }
        
        if($('input:radio[name=rdbrevbus]')[3].checked){
           titulo='null';
            editorial='null';
            categoria='null';
            
                     get_page('material/load_list_revista/','list_view_revista', {
                     'titulo' : titulo,
                     'editorial' : editorial,
                     'categoria' : categoria
                 }); 
        }


}

function revistaDel(nMatId){
    var rdn=Math.random()*11;
    $.post('material/revistaDel/'+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
//            
            mensaje("Se ha eliminado la revista correctamente!","e");
              
                        revistaQry();
    
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la revista!","r");
        }                        
    });
    return false;
}


$(document).ready(function(){
        
    
     $("#cbo_tipos").val([0]);
     $("#cbo_edicion_revista").val([0]);
    $("#cbo_categoria_rev").val([0]);
    document.getElementById("especialidad").length=0;
    $("#txt_ins_rev_titulo").val("");   
    $("#txt_ins_rev_autor").val(""); 
    $("#txt_ins_rev_editorial").val(""); 
    $("#txt_ins_rev_ejemplares").val(""); 
    $("#txt_ins_lib_resumen").val("");
    $("#txt_ins_lib_observacion").val("");
    
    
    
    NewCKEditor("txt_ins_rev_resumen");
    
$("#frm_ins_revista").validate({
        
                rules: {
                 txt_ins_rev_titulo: {                
                    required: true 
                  },
                  txt_ins_rev_autor: {
                    required: true
                   },
                    txt_ins_rev_editorial: {
                       required: true               
                    },
                   txt_ins_rev_ejemplares: {
                        required: true               
                    },
                    cbo_edicion_revista: {
                      required: true               
                    },
                cbo_categoria_rev: {
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
                        
                        mensaje("Se ha registrado la Revista correctamente!","e");
                      
                      
                          limpiarFormBli(form);
                            

                          $("#cbo_edicion_revista").val([0]);
                          $("#cbo_categoria_rev").val([0]);
                       
                           $("#txt_ins_rev_resumen").val("");
                                   $("#txt_ins_rev_titulo").focus();
                             $("#hid_tipo3").val("R");
                   
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