$(document).ready(function(){
    
    
});

function mostrarDiv(id, bool){
    div=document.getElementById(id);
    if(bool)
        {
            div.style.display="block";
        }
     else
        {
            div.style.display="none";
        }
          
}

function actualizarMatricula(){

 var horAnt = document.getElementById('hid_upd_hor_idHorario1').value;
 var horDesp = cbo_upd_mat_horario1.options[cbo_upd_mat_horario1.selectedIndex].value;
if (($("#cbo_upd_mat_horario1").val()!='0')){
     if(horAnt!=horDesp){
        var idAlumno = document.getElementById('hid_upd_hor_idAlumno1').value;
          
     $.ajax({
                type: "POST",
                url: "matricula/matriculaUpd/"+horAnt+"/"+horDesp+"/"+idAlumno,
                data: "",
                beforeSend: function(){
                     $("#actualizandoMatricula").html("Procesando,espere por favor...");
                },
                success: function(msg){
                    //console.log(msg);
                    $("#actualizandoMatricula").html("");
                    if(msg.trim()==1){
                         mensaje("se ha actualizado la matricula correctamente!","e");
                          $('.popedit').dialog('close'); 
                            get_page('matricula/load_listar_view_matricula2/',
                             'div_qry',
                             {criterio : 1, hor : 0}
                            ); 
                    }
                    else {
                        mensaje("Error . No se puede realizar el proceso!","r");                        ;
                    }
                    //$("#actualizandoMatricula").html(msg);
                                       
                },
                error: function(msg){                
                    mensaje("Error Inesperando registrando el matricula!, vuelva a intentarlo","r");                        

                }
            });

    }
	}else{
    alert('!Seleccione un Horario Por Favor!');
		}

}
function  actualizarPago(){
    var horDesp = cbo_upd_mat_horario1.options[cbo_upd_mat_horario1.selectedIndex].value;
    var idAlumno = document.getElementById('hid_upd_hor_idAlumno1').value;
    
    $.ajax({
                type: "POST",
                url: "matricula/actualizarPago/"+horDesp+"/"+idAlumno,
                data: "",
                beforeSend: function(){
                     $("#actualizandoPago").html("Procesando,espere por favor...");
                },
                success: function(msg){
                    //console.log(msg);
                    $("#actualizandoPago").html("");
                    if(msg.trim()==1){
                         //mensaje("se ha actualizado el pago correctamente!","e");
                          mensaje("se ha actualizado el pago correctamente!","e");
                       //  $("#pagosTesoreria").load('http://192.168.0.200/oficinavirtualcip2013/campus_virtual/matricula/load_recargar_listar_pagos/'+horDesp+'/'+idAlumno);
                       //  $("#pagosCampus").load('http://192.168.0.200/oficinavirtualcip2013/campus_virtual/matricula/load_recargar_listar_pagosCampus/'+horDesp+'/'+idAlumno);
                         
                       $("#div_detalle_view").load('http://www.cip-trujillo.org/ovcipcdll/campus_virtual/matricula/load_listar_view_detalle/'+horDesp+'/'+idAlumno+'/1');

                    }
                    else{
                         mensaje("r","Error Inesperando al actualizar  el pago!, vuelva a intentarlo");                        
             
                    }
                                                 
                },
                error: function(msg){                
                    mensaje("r","Error Inesperando registrando el matricula!, vuelva a intentarlo");                       

                }
            });

}
function filtroHorario(valor){
    var horAnt = document.getElementById('hid_upd_hor_idHorario1').value;
    var horDesp = cbo_upd_mat_horario1.options[cbo_upd_mat_horario1.selectedIndex].value;
    if(horAnt!=horDesp){
         mostrarDiv('div_btn_upd_matricula',true);
    }
    else {
        mostrarDiv('div_btn_upd_matricula',false);
    }
}
//Combo Curso        
function filtroCurso1(valor){
       var idCurso = valor.options[valor.selectedIndex].value;
       var idCursoactual=document.getElementById('hid_upd_curso').value;
              //var idAlumno = $('#hid_upd_hor_idAlumno1').val();
          var idAlumno = document.getElementById('hid_upd_hor_idAlumno1').value;
       $.post('matricula/load_horario2/', 
              {idCurso : idCurso, idAlumno : idAlumno, combo : 'cbo_upd_mat_horario1'},
              function(data){$("#cbo_upd_mat_horario1").html(data);}
             ); 

        $.post('matricula/load_listar_view_detalle/'+idCurso+'/'+idAlumno+'/2', 
              {/*idCurso : idCurso, idAlumno: idAlumno*/},
              function(data){$("#div_detalle_view").html(data);
                    if(idCurso!=idCursoactual){
                           mostrarDiv('div_btn_upd_matricula',true);
                    }else {
                           mostrarDiv('div_btn_upd_matricula',false);
                       }

                }
        );

                       
}


function actualizar1(valor){
    var hor = document.getElementById('cbo_filtro').value;
//            get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
            if(valor == 0) {
                get_page('matricula/load_listar_view_matricula/',
                     'div_qry',
                     {criterio : valor, hor: hor}
                    );
            }
            else {
                get_page('matricula/load_listar_view_matricula2/',
                     'div_qry',
                     {criterio : valor, hor: hor}
                    );
            }                    
}
function mostrarPago2(){
    check = document.getElementById('chk_com_pag1').checked;    
    if(check){
        mostrarDiv('div_pag1',true);
    }
    else{
        mostrarDiv('div_pag1',false);
    }
}

function mostrarPago1(valor){
    var tipPago = valor.options[valor.selectedIndex].value;
    if(tipPago == 0)
        {
            mostrarDiv('div_pag1',false);
        }
    else
        {
            mostrarDiv('div_pag1',true);
        }
}

function pagar() {
    if(document.getElementById("chk_upd_pag").checked) {
            mostrarDiv('div_pag1',true);
        }
    else
        {
            mostrarDiv('div_pag1',false);
        }
}