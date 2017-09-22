$(function(){ 
    $('#Tabs_Alumno').tabs();  //convierte a tabs
   filtroCursosAlumno(cbo_filtro_anio); 
})

$(document).ready(function(){
        $("#frm_ins_curso").validate({
        rules: {
            txt_ins_cur_nombre: {                
                required: true 
            },
            txt_ins_cur_duracion: {
                required: true
            },
            txt_ins_cur_costo: {
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
                        limpiarForm(form);
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

function filtroCursosAlumno(valor){
    var anio = valor.options[valor.selectedIndex].value;
    var idPersona = document.getElementById("hid_idPersona").value;

    var cri = idPersona + "-" + anio;
    get_page('alumno/load_listar_view_cursos/','div_qry',{
       criterio : cri
    });                    
}
