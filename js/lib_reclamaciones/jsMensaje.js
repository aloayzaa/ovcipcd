$(function(){   
    $('#Tabs_Mensaje').tabs();  //convierte a tabs 
    $('#tab_Mensajes').tabs(); 
    

   $("#tab_buzonReclamo").bind('click', function(){
        get_page('mensaje/load_listar_reclamo/','div_qry');
    });
     $("#tab_buzonSugerencia").bind('click', function(){
       get_page('mensaje/load_listar_sugerencia/','div_qry1');   });
   
   $("#tab_buzonOpinion").bind('click', function(){
       get_page('mensaje/load_listar_opinion/','div_qry2');   });
  
               
//    }); 
})


$(document).ready(function(){
    
         NewCKEditor("txt_ins_men_cMenMensaje");
        
        $("#frm_ins_mensaje").validate({
        rules: {
           $cbo_ins_men_cMenTipoMensaje:{
            required: true },         
           $txt_ins_men_cDmeEmisor: {                
                required: true },  
//          $txt_ins_men_cDmeOficina:{
//            required: true },
           $cbo_ins_men_cDmeArea: {
                required: true},   
          $cbo_ins_men_cDmeSubArea: {
                required: true} ,
            $txt_ins_men_cMenAsunto: {
                required: true} ,  
            $txt_ins_men_cMenMensaje: {
                required: true}   
   
        },
        
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "mensaje/mensajeIns",
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
     
    
});
  $(document).ready(function() {
      
            $("#cbo_ins_men_cDmeArea").change(
            function() {
                $("#cbo_ins_men_cDmeArea option:selected").each(
                function() {
                    Area = $('#cbo_ins_men_cDmeArea').val();
                    $.post("mensaje/llena_SubArea", {
                        Area: Area
                    },
                    function(data) {
                        $("#cbo_ins_men_cDmeSubArea").html(data);
                    });
                });
            })
        });
        
        
        
        
        function MensajePopup(id){
    
   
    set_popup("mensaje/popupVistaPreviaMensaje/"+id,"Mensaje",550,550,'','');

}
        
        
        
   