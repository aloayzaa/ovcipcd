//creo que se puede agregar  en js general y llamarse donde se creen tablas
//funcion para ver la opcion de agregarlo a jsgeneral

function InicializarOpcionFila(clase,metodo){
	$("."+clase).each(function(){
		$(this).click(function(){
			var temp = $(this).parent().parent();
			var msg = confirm("¿Esta seguro de realizar la operacion?")
			if (msg) {
				eval(metodo);
			}
		});
	})
}

//Codigo Original 
$(".ui-icon-trash").each(function(){
	$(this).click(function(){
            
		var temp = $(this).parent().parent();
		alert("metodo editar para el la fila con id : "+$(temp).attr("id"));
	});
})
//Editar
$(".ui-icon-pencil").each(function(){
	$(this).click(function(){
		var temp = $(this).parent().parent();
		alert("metodo editar para el la fila con id : "+$(temp).attr("id"));
	});
})