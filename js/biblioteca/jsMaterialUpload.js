$(function(){     

    $("#btn_ins_mat").bind({
        click: function(){                        
            $('#txt_upload_mat').uploadify('upload','*');
        }
    });
    

 $("#txt_upload_mat").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'material/material_multpdf',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Archivo PDF',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.pdf; ',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#txt_upload_mat').uploadify('settings','formData');
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){

                mensaje("Se subio el archivo correctamente!","e");   

                     $('.popedit').dialog('close');
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });   
    
});