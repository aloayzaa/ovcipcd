
$(function(){ 
    $('#Tabs_Material').tabs();  //convierte a tabs 
    $("#tab_materiallistar").bind('click', function(){
         get_page('material/load_list_material/','list_view_material');
    });
})

