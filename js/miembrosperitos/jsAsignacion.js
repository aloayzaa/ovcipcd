$(function(){

$('#Tabs_Miembros').tabs();
get_page('miembrosperitos/load_search_view_peritos/','BuscarPeritos');

 $("#MiembrosListado").bind({
        click: function(){ 
            get_page('miembrosperitos/load_qry_miembros/','ListaMiembros');
        }
        });


 
});

