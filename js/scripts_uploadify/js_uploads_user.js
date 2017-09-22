$(function(){
    msjAviso("#message_upload_user","Solo se admiten archivos de imagen hasta de 500 KB");
    $(".message_upload_user").css({
        padding:"5px 0 5px 0px"
    });
    $("#message_upload_user").hide().fadeIn(500);
        
    $("#uploadify_user").uploadify({	      
        'method'           : 'post',
        'swf'              : 'scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'uploadify.php',
        'cancelImg'        : 'scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Agregar Foto',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de imagen...',
        'fileTypeExts'     : '*.gif; *.jpg; *.png',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#uploadify_user').uploadify('settings','formData',{  
                'id' : $("#id_upload_user").val()
            });
        },

        'onUploadSuccess' : function(file, data) {
            if (data==1){
                    
                msjError("#message_upload_user","Tamaño debe ser menor a 1MB.");
                $("#message_upload_user").hide().fadeIn(500);

            }else if (data==2){
                            
                msjExito2("#message_upload_user","El archivo fue subido satisfatoriamente.");
                $(".exito").css({
                    padding:"5px 0 5px 0px"
                });
    
                $("#message_upload_user").hide().fadeIn(500);
                    
                report_uploads();
                    
            }else{
                $("#message_upload_user").html("<span id='msg_up' style='color:red'>Solicitud no Definida</span>");                        
            }
        }
    });

})
    
    

    
 
                