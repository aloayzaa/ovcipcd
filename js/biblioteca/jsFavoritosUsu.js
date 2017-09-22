$(function(){   
    $('#Tab_Favoritos_usu').tabs();  //convierte a tabs 

        get_page('favoritos_usu/load_listar_view_favoritos_usu/','div_qry');

})


function FavoritosDel(nFavId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('favoritos_usu/FavoritosDel/'+nFavId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){

            mensaje("Se elimino correctamente!","e");
            get_page('favoritos_usu/load_listar_view_favoritos_usu/','div_qry');
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });

    
    }
}