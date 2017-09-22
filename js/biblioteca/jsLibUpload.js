$(function(){     
    $("#fotoempadronado").prettyPhoto({
        overlay_gallery:false
    });    
    $("#btn_cancel_libro").bind({
        click: function(){                        
            $('#txt_upload_libro').uploadify('cancel','*');
        }
    });
//    
    $("#btn_upload_libro").bind({
        click: function(){                        
            $('#txt_upload_libro').uploadify('upload','*');
        }
    });
    

 $("#txt_upload_libro").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'material/libroUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Imagen',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
         'fileTypeExts'     : '*.gif; *.jpg; *.png', 
        'auto'             : false,                 
        'onUploadStart' : function(file) {
              $('#txt_upload_libro').uploadify('settings','formData',{  
                'hid_upload_nMatId_lib' : $("#hid_upload_nMatId_lib").val()
            });
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

