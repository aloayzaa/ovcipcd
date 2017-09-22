$(function(){ 
    radio('#radio_rev1');
            $('#txt_fnd_rev_criterio').keydown(function(event){
           if (event.keyCode == '13'){ 
               revistaQry();
           }
        });
        
        
        $('#tab_materialultimo').click(function(){
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
//empadronamientoQry();
//     libroQry(); 
limpiar();
  });
  
  function limpiar()


 {

    document.getElementById("list_view_revista").innerHTML="";


 }
   $("#radios_revista").buttonset(); 
   
            $("#btn_fnd_revista").bind('click', function(event){  
//           libroQry();

 if ($("#txt_fnd_rev_criterio").val()=="") {
   alert('!Ingresa la condición de busqueda...!')
            
        }
        else{
//            mensaje("Error inesperado, no se ha podido eliminar a la persona!","e");
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


}
