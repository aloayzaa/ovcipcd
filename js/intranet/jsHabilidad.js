$(function(){  

    $("#colegiadodetalle").bind('click', function(){        
        msgLoading2("#c_get_detalle");
        load_ver_detalle($("#hid_upd_regcol").val(),$("#hid_upd_tipoclase").val(),$("#hid_upd_habilidad").val());      
     
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

function ver_multas(regcol){
    
    set_popupDetalle("habilidad_colegiado/load_ver_multas/"+regcol,"Ver multas del Colegiados",800,300,'','');
}

function ver_deudas(regcol){
    
    set_popupDetalle("habilidad_colegiado/load_ver_deudas/"+regcol,"Ver deudas del Colegiados",800,300,'','');
}

function mostrar_meses(ano){
    
    set_popupDetalle("habilidad_colegiado/load_ver_meses/"+$("#hid_upd_regcol").val()+"/"+ano,"Cuota por Año",800,300,'','');
}

function load_ver_detalle(regcol,tipoclase,habilidad){
    $.ajax({
        type: "POST",
        url: 'habilidad_colegiado/load_ver_detalle/'+regcol+'/'+tipoclase+'/'+habilidad,
        cache: false,
        data: {
            regcol:regcol
        },
        success: function(data) {
            $("#c_get_detalle").html(data);
            $("#c_get_detalle").hide().fadeIn(250);
        },
        error: function() { 
            alert("error");
        }              
    });

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
