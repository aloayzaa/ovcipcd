$(function(){
    marcar = function(elemento){
        elemento = $(elemento);
        elemento.prop("checked", true);
    }
 
    desmarcar = function(elemento){
        elemento = $(elemento);
        elemento.prop("checked", false);
    }
});
  function refreshlistado(){
     get_page('migracion/reload_migracion/','ListaMigrada'); 
  }
function migracion_usuarios(){
    var contaop = 0;
    var input = document.getElementById('usuarios').value;
    $(".opciones").each(function() 
    {
        if(this.checked)
        {
            contaop=1;
        }
    });
    if (contaop==1){
        if(input == ""){
            mensaje("Seleccionar al menos una opción","a");    
        } 
        else{
            $(".opciones").each(function() 
            {
                if(this.checked)
                {
                    IdUsuario = this.value;
                
                    $.post("migracion/MigracionUsuariosIns/"+IdUsuario); 
                }
            });
        
            mensaje("Se han migrado los usuarios correctamente!","e"); 
              $("#ListaMigrada").html("!Hacer click en el Tab(Migracion)!");
        }
        
       
    }
    else{
        mensaje("Debes seleccionar por lo menos una opción","a");
    }  
}
function migrar_restantes(){
   // alert("migrar restantes");
    var contaop = 0;
    var input = document.getElementById('usuariosIngresados').value;
    $(".opcionesIngresados").each(function() 
    {
        if(this.checked)
        {
            contaop=1;
        }
    });
    if (contaop==1){
        if(input == ""){
            mensaje("Seleccionar al menos una opción","a");    
        } 
        else{
            $(".opcionesIngresados").each(function() 
            {
                if(this.checked)
                {
                    cip = this.value;
                   // alert("persona"+dni);
                    $.post("migracion/MigracionUsuariosRestantesIns/"+cip); 
                }
            });
        
            mensaje("Se han migrado los usuarios correctamente!","e"); 
              $("#ListaMigrada").html("!Hacer click en el Tab(Migracion)!");
        }
        
       
    }
    else{
        mensaje("Debes seleccionar por lo menos una opción","a");
    }
}