$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaCuenta-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
    var dataTable2 = {
        tabla           : "BandejaPagos-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable2);
})

function verDetalle(regcol){
    set_popupDetalle("cuenta_colegiado/popupVistaDetalle/"+regcol,"Lista de Multas Colegiado",500,300,'','');
}
function verDetalleDeuda(regcol){
    set_popupDetalle("cuenta_colegiado/popupVistaDetalleDeuda/"+regcol,"Detalle Deuda Colegiado",500,300,'','');
}
function verDetPagos(año,mes){
    set_popupDetalle("cuenta_colegiado/popupPagoDetalle/"+año+"/"+mes,"Detalle de Pagos Colegiado",500,250,'','');
}
function set_popupDetalle(url,title,ancho,alto,parametro,func_close){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
    $("body").append("<div id='popupEdicion"+randomnumber+"' class='popedit' title='"+title+"'></div>");           
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

