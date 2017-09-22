
$(function(){   
    $('#Tabs_Mensaje').tabs();  //convierte a tabs 
    $('#tab_Mensajes').tabs(); 
    

   $("#tab_buzonReclamo").bind('click', function(){
        get_page('mensaje2/load_listar_reclamo2/','div_qry');
    });
     $("#tab_buzonSugerencia").bind('click', function(){
       get_page('mensaje2/load_listar_sugerencia2/','div_qry1');   });
   
   $("#tab_buzonOpinion").bind('click', function(){
       get_page('mensaje2/load_listar_opinion2/','div_qry2');   });
  
               
//    }); 

})



 function MensajePopup(id){
    
  
    set_popup("mensaje2/popupVistaPreviaMensaje/"+id,"Mensaje",550,550,'','');
   
   
        

}
        