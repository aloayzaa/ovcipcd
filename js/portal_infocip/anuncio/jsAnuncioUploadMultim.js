
$(function(){

    updtBolsa($("#hid_upload_nNotCodigo").val());
   
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
        'uploader'         : 'anuncio/anuncio_trabajoUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Image',
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

                get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio');
                updtBolsa($("#hid_upload_nNotCodigo").val());
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });
    
     $("#txt_upload_archivo_multPdf").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'anuncio/anuncio_trabajoUploadPdf',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar PDF',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.pdf;',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#txt_upload_archivo_multPdf').uploadify('settings','formData',{  
                'hid_upload_nNotCodigo' : $("#hid_upload_nNotCodigo").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){
                get_page('anuncio/load_listar_view_anuncio/','c_qry_anuncio');
                updtBolsa($("#hid_upload_nNotCodigo").val());
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    }); 
    
});

function MultimediaDel(nMultCodigo){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('anuncio/MultimediaDel/'+nMultCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("se ha eliminado el archivo correctamente!","e");
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });

    
    }
}

function updtBolsa(nNotCodigo){
    $.ajax({
        type: "POST",
        url: 'anuncio/load_listar_view_anuncioMultimedia/'+nNotCodigo,
        cache: false,
        data: {
            nNotCodigo:nNotCodigo   
        },
             success: function(data){
             $("#c_qry_emp").html(data);               
                },
                error: function(data){ 
            alert(data);
        }        
}
)}


