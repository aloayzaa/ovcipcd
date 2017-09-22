$(function(){   
    $('#Tabs_Mensaje').tabs();  //convierte a tabs 
    $('#tab_Mensajes').tabs(); 
    

   $("#tab_buzonReclamo").bind('click', function(){
        get_page('mensaje3/load_listar_reclamo3/','div_qry');
    });
     $("#tab_buzonSugerencia").bind('click', function(){
       get_page('mensaje3/load_listar_sugerencia3/','div_qry1');   });
   
   $("#tab_buzonOpinion").bind('click', function(){
       get_page('mensaje3/load_listar_opinion3/','div_qry2');   });
  
               
//    }); 

})



 function MensajePopup(id){
    
  
    set_popup("mensaje3/popupVistaPreviaMensaje/"+id,"Mensaje",550,550,'','');
   
   
        $("#frm_ins_mensaje").validate({
        rules: {
           
            $txt_ins_men_cMenMensaje: {
                required: true}   
   
        },
        
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "mensaje3/mensajeIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("El Mensajes registrado  correctamente!","e");
                        limpiarForm(form);
                        
                    }else{
                        mensaje("Error Inesperando registrando el Mensaje!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el Mensaje!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
         

}
        