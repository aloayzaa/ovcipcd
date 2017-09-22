$(function(){     
    $("#fotoempadronado").prettyPhoto({
        overlay_gallery:false
    });    
    $("#btn_cancelMaterial").bind({
        click: function(){                        
            $('#txt_upload_mat').uploadify('cancel','*');
        }
    });
    
    $("#btn_uploadMaterial").bind({
        click: function(){                        
            $('#txt_upload_mat').uploadify('upload','*');
        }
    });
    

 $("#txt_upload_mat").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'cursosdocente/materialUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Archivo',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.rar; *.doc; *.docx; *.pdf;*.ppt;*.pptx;*.xls;*.xlsx',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#txt_upload_mat').uploadify('settings','formData',{  
                'hid_upload_idSesion' : $("#cbo_sesiones").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){
                mensaje("Se ha subido el material correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });   
    
});

function mostrarMateriales(valor){
    var idSesion = valor.options[valor.selectedIndex].value;
    if(idSesion != ""){
        msgLoading("#preload");
        get_page('cursosdocente/load_listar_view_listaMateriales/'+idSesion,'mostrarMateriales');
    }
    else{
        alert("Seleccione una Sesión valida.");
    }
}

//function mostrarMaterialesAlumno(valor){
//    var idSesion = valor.options[valor.selectedIndex].value;
//    if(idSesion != ""){
//        msgLoading("#preload");
//        get_page('alumno/load_listar_view_listaMateriales/'+idSesion,'mostrarMateriales');
//    }
//    else{
//        alert("Seleccione una Sesión valida.");
//    }
//}

function descargarMaterial(valor){
    window.open("../uploads/campus_virtual/"+valor.id, "Material", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=600, height=600");
//    window.location.href="../uploads/cip/"+valor.id;
}

function eliminarMaterial(idMaterial){
    if(confirm("Desea eliminar el material?")){
        var rdn=Math.random()*11;
        $.post('cursosdocente/eliminarMaterial/'+idMaterial.id, {
            rdn:rdn
        }, function(data){
            if(data.trim()==1){
                mensaje("Se ha eliminado el material correctamente!","e");
                get_page('cursosdocente/load_listar_view_listaMateriales/'+$("#cbo_sesiones").val(),'mostrarMateriales');

            }else{
                mensaje("Error inesperado, no se ha podido cambiar estado de curso!","r");
            }                        
        });
    }
}