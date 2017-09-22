$(function(){ 
msgLoading2("#colegiadol");                      
get_page('actualizacion_colegiado/cargar/','colegiadol');
    $("#colegiadoDatosProfesionales").bind('click', function(){ 
	 msgLoading2("#c_frm_prof_upd");                      
        //load_frm_upd_prof_colegiado($("#hid_upd_regcol").val());
       load_frm_upd_prof_colegiado();
    });
    $("#colegiadoDatosFamilia").bind('click', function(){    
	msgLoading2("#c_frm_familia_upd");                   
        load_frm_upd_familia_colegiado();        
    });
     $("#colegiadoDatosDeporte").bind('click', function(){     
	msgLoading2("#c_frm_deporte_upd");                  
        load_frm_upd_deporte_colegiado();        
    });
});

function msgLoading2(obj,msg){
    if(msg == undefined){
        $(obj).html("<div align=center style=width:700px;height:400px;><br><br><br><br><br><img src=http://i.imgur.com/5ZNKENQ.gif ><br>Cargando...</div>");
    }
}
function msgPreloaderPopup(obj,msg){
    if(msg == undefined){
        $(obj).html("<div align=center><br><bR><br><img src=http://i.imgur.com/MT7hiIV.gif ><br>Cargando...</div>");
    }
}

function load_frm_upd_prof_colegiado(){
    $.ajax({
        type: "POST",
        url: 'actualizacion_colegiado/load_frm_upd_prof_colegiado/',
        cache: false,
        data: {
        },
        success: function(data) {
            $("#c_frm_prof_upd").html(data);
            $("#c_frm_prof_upd").hide().fadeIn(250);
        },
        error: function() { 
            alert("error");
        }              
    });

}

function load_frm_upd_familia_colegiado(){
    $.ajax({
        type: "POST",
        url: 'actualizacion_colegiado/load_frm_upd_familia_colegiado/',
        cache: false,
        data: {
        },
        success: function(data) {
            $("#c_frm_familia_upd").html(data);
            $("#c_frm_familia_upd").hide().fadeIn(250);
        },
        error: function() { 
            alert("error");
        }              
    });

}
function load_frm_upd_deporte_colegiado(){
    $.ajax({
        type: "POST",
        url: 'actualizacion_colegiado/load_frm_upd_deporte_colegiado/',
        cache: false,
        data: {
        },
        success: function(data) {
            $("#c_frm_deporte_upd").html(data);
            $("#c_frm_deporte_upd").hide().fadeIn(250);
        },
        error: function() { 
            alert("error");
        }              
    });

}
function MostrarFamiliar(idfam,regcole){
   set_popupDetalle("actualizacion_colegiado/MostrarFamiliar/"+idfam+"/"+$("#hid_upd_regcol").val(),"Editar Familiar",610,374,'','');
}
//function AgregarFamiliar(regcol){
  //  set_popupDetalle("actualizacion_colegiado/AgregarFamiliar/"+regcol,"Agregar Familiar",610,374,'','');
//}
function AgregarFamiliar(regcol){
    set_popupDetalle("actualizacion_colegiado/AgregarFamiliar/"+$("#hid_upd_regcol").val(),"Agregar Familiar",610,374,'','');
}
function EliminarFamiliar(idfam){
   set_popupDetalle("actualizacion_colegiado/EliminarFamiliar/"+idfam+"/"+$("#hid_upd_regcol").val(),"Eliminar Familiar",610,175,'','');
}
function AgregarDeporte(regcol){
    set_popupDetalle("actualizacion_colegiado/AgregarDeporte/"+$("#hid_upd_regcol").val(),"Agregar Deporte",610,250,'','');
}
function MostrarDeporte(iddep){
    set_popupDetalle("actualizacion_colegiado/MostrarDeporte/"+iddep+"/"+$("#hid_upd_regcol").val(),"Eliminar Deporte",610,175,'','');
}

function set_popupDetalle(url,title,ancho,alto,parametro,func_close){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
     
    $("body").append("<div id='popupEdicion"+randomnumber+"' class='popedit' title='"+title+"'><div id=cuerpo></div>");           
    msgPreloaderPopup("#cuerpo");
    $("#popupEdicion"+randomnumber).dialog({          
        autoOpen:false,      
        position: 'top', //0=TOP        
        width:ancho,
        Height:'auto',
        minHeight:alto,
        resizable: false,
        modal:true ,
        open: function(event,ui){
            get_page(url,this.id,parametro);
        },
        close: function(){      
            eval(func_close);
            $(this).dialog('destroy').remove();                        
            
        }     
    });    
    $("#popupEdicion"+randomnumber).dialog('open');
}