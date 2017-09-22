$(function(){     
    $("#fotoempadronado").prettyPhoto({
        overlay_gallery:false
    });    
    $("#btn_cancelMult_noticia").bind({
        click: function(){                        
            $('#txt_upload_archivo_mult').uploadify('cancel','*');
        }
    });
    
    $("#btn_uploadMult_noticia").bind({
        click: function(){                        
            $('#txt_upload_archivo_mult').uploadify('upload','*');
        }
    });
    

 $("#txt_upload_archivo_mult").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'noticiasempresariales/noticiasempresarialUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Subir Foto',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.gif; *.jpg; *.png',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#txt_upload_archivo_mult').uploadify('settings','formData',{  
                'hid_upload_nNotCodigo' : $("#hid_upload_nNotCodigo").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){
                alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                get_page('noticiasempresariales/load_listar_view_noticias/','c_qry_emp');
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
//                timer=setTimeout("getUploadUpd('"+$("#hid_upload_nNotCodigo").val()+"')",1000);
                     $('.popedit').dialog('close');
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });   
    
});

function getUploadUpd(nNotCodigo){
    $.ajax({
        type: "POST",
        url: "noticiasempresariales/empadronadoUpdMultimedia",
        cache: false,
        data: {
            nNotCodigo:nNotCodigo   
        },
             success: function(data){
             $("#updFotoEmpadronado").html(data);
            $("#updFotoEmpadronado").hide().fadeIn(250);                  
                },
                error: function(data){ 
            alert(data);
        }        
}
)}
