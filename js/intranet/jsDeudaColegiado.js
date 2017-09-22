$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaDeuda-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTableDetalle(dataTable);
})
function paginaDataTableDetalle(dataTable) {
    // definiciones por defecto  
    dataTable["ordenaPor"] = (dataTable["ordenaPor"] != undefined) ? dataTable["ordenaPor"] : [[0,"desc"]]; 
    dataTable["desactOrdenaEn"] = (dataTable["desactOrdenaEn"] != undefined) ? dataTable["desactOrdenaEn"] : [];
    dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
    dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
    
    // funcionalidad js           
    $("#"+dataTable["tabla"]+"").dataTable({
        "bJQueryUI"             :     dataTable["JQueryUI"],
        "sPaginationType"       :     "full_numbers",
        "iDisplayLength"        :     dataTable["filsXpag"],
        "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix"      :     "",
            "sInfoThousands"    :     ",",
            "sLengthMenu"       :     "Mostrar _MENU_ registros",
            "sLoadingRecords"   :     "Cargando...",
            "sProcessing"       :     "Procesando...",
            "sSearch"           :     "Buscar:",
            "sZeroRecords"      :     "No se encontraron resultados",
            "oPaginate"         :     {
                "sFirst"        :     "Primero",
                "sLast"         :     "Último",
                "sNext"         :     "Siguiente",
                "sPrevious"     :     "Anterior"
            },
            "oAria"             : {
                "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                "sSortDescending"   :     ": activar para Ordendar Descendentemente"
            }
        },
        "aoColumnDefs"          :       [{            
            "aTargets"          :       dataTable["desactOrdenaEn"], // desactivar ordenamiento en cols... 
            "bSortable"         :       false     
        }],    
        "aaSorting"             :       dataTable["ordenaPor"]  
    });
}
