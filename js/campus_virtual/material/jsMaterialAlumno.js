function mostrarMaterialesAlumno(valor){
    var idSesion = valor.options[valor.selectedIndex].value;
    if(idSesion != ""){
        msgLoading("#preload");
        get_page('alumno/load_listar_view_listaMateriales/'+idSesion,'mostrarMateriales');
    }
    else{
        alert("Seleccione una Sesión valida.");
    }
}

function descargarMaterial(valor){
    window.open("../uploads/campus_virtual/"+valor.id, "Material", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=600, height=600");
//    window.location.href="../uploads/cip/"+valor.id;
}