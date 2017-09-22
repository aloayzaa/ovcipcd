$(function(){
    msjAviso("#message_upload_user_perfil","Solo se admiten archivos de imagen hasta de 500 KB");
    $(".message_upload_user_perfil").css({
        padding:"5px 0 5px 0px"
    });
    $("#message_upload_user_perfil").hide().fadeIn(500);
        
        
    $("#uploadify_user_perfil").uploadify({	      
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
            $('#uploadify_user_perfil').uploadify('settings','formData',{  
                'id' : $("#id_upload_user_perfil").val()
            });
        },
        'onUploadSuccess' : function(file, data) {
            if (data==1){
                    
                msjError("#message_upload_user_perfil","Tamaño debe ser menor a 1MB.");
                $("#message_upload_user_perfil").hide().fadeIn(500);

            }else if (data==2){
                            
                    $("#dialog_upload_perfil_user").dialog("close");
                    report_uploads_perfil_user();
                    
            }else{
                $("#message_upload_user_perfil").html("<span id='msg_up' style='color:red'>Solicitud no Definida</span>");                        
            }
        }
    });
})