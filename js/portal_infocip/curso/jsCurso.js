
$(document).ready(function(){
    
        $("#frm_ins_curso").validate({
        rules: {
            txt_ins_cur_nombre: {                
                required: true 
            },
            txt_ins_cur_duracion: {
                required: true
            },

            txt_ins_cur_descripcion: {
                required: true
            }          
        },
        submitHandler: function(form){
            $.ajax({
                type: "POST",
                url: "curso/cursoIns",
                data: $(form).serialize(),
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){                     
                        mensaje("se ha registrado el curso correctamente!","e");
                       $('.popedit').dialog('close'); 
                       limpiarForm(form);
                       //CursoCbo(); 
                       //Refresh
                           location.reload(true);
                    }else{
                        mensaje("Error Inesperando registrando el curso!, vuelva a intentarlo","r");                        
                    }                    
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el curso!, vuelva a intentarlo");                        ;

                }
            });
        }
    }); 
    
});


function cursoEstado(idcurso){
    var rdn=Math.random()*11;
    $.post('curso/cursoEstado/'+idcurso, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
get_page('curso/load_listar_view_curso/','div_qry');  
            mensaje("Se ha cambiado de estado al curso correctamente!","e");
          
        }else{
            mensaje("Error inesperado, no se ha podido cambiar estado de curso!","r");
        }                        
    });
    return false;
}
