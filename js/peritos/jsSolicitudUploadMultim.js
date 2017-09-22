
$(function(){

    updtBolsa($("#hid_upload_nNotCodigo").val());

    $("#btn_cancelMult_noticia").bind({
        click: function(){                        
            $('#txt_upload_archivo_mult').uploadify('cancel','*');
        }
    });
    $("#btn_uploadMult_noticia").bind({
        click: function(){ 
         var cPerOpcion  = $("#nTMultCodigo").val();
        if(cPerOpcion=='4'){
        $('#txt_upload_archivo_multPdf').uploadify('upload','*');
            return true;
        }else{
        $('#txt_upload_archivo_mult').uploadify('upload','*');
        } 
        }
    });


 $("#txt_upload_archivo_mult").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'peritos/SolicitudUpload',
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
//              alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
               get_page('peritos/load_listar_view_Multimedia/','c_qry_bolsa');
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
        'uploader'         : 'peritos/SolicitudUpload',
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
                get_page('peritos/load_listar_view_Multimedia/','c_qry_bolsa');
                updtBolsa($("#hid_upload_nNotCodigo").val());
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    }); 
    
});

function updtBolsa(nSolId){
    $.ajax({
        type: "POST",
        url: 'peritos/load_listar_view_Multimedia/'+nSolId,
        cache: false,
        data: {
            nSolId:nSolId   
        },
             success: function(data){
             $("#c_qry_emp").html(data);               
                },
                error: function(data){ 
            alert(data);
        }        
}
)}


