$(function(){
//        $("#"+ID2).css("display","");
    //updtBolsa($("#hid_upload_nNotCodigo").val());
//    get_page('bolsa_trabajo/load_listar_view_bolsaMultimedia/','c_qry_emp',{
//            nNotCodigo:$("#hid_upload_nNotCodigo").val() 
//    });  
//    $("#multimedia").prettyPhoto({
//        overlay_gallery:false
//    });    
//    $("#btn_cancelMult_noticia").bind({
//        click: function(){                        
//            $('#txt_upload_archivo_mult').uploadify('cancel','*');
//        }
//    });
    $("#btn_ins_doc").bind({
        click: function(){ 
            $('#txt_ins_doc_uploadFoto').uploadify('upload','*');

            $('#txt_ins_doc_uploadCurriculum').uploadify('upload','*');
        }
    });


 $("#txt_ins_doc_uploadFoto").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'docente/docenteFotoUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Imagen',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.gif; *.jpg; *.png',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
            $('#txt_ins_doc_uploadFoto').uploadify('settings','formData',{  
                'hid_upload_nNotCodigo' : $("#hid_upload_nNotCodigo").val()
            });
        }
//
//        'onUploadSuccess' : function(file,data,response) {
//            if (data.trim()==1){
////              alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
//                get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa');
//                updtBolsa($("#hid_upload_nNotCodigo").val());
//                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
//            }
//            else{
//                mensaje("Error inesperado al subir archivo multimedia!","r");
//            }
//        }
    });
    
//     $("#txt_ins_doc_uploadCurriculum").uploadify({	      
//        'method'           : 'post',
//        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
//        'uploader'         : 'docente/docenteCurriculumUpload',
//        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
//        'buttonText'       : 'Buscar Curriculum',
//        'multi'            : false,
//        'fileTypeDesc'     : 'Archivos de texto...',
//        'fileTypeExts'     : '*.pdf;*.doc; *.docx;',  
//        'auto'             : false,                 
//        'onUploadStart' : function(file) {
//            $('#txt_ins_doc_uploadCurriculum').uploadify('settings','formData',{  
//                'hid_upload_nNotCodigo' : $("#hid_upload_nNotCodigo").val()
//            });
//        }

//        'onUploadSuccess' : function(file,data,response) {
//            if (data.trim()==1){
//                get_page('bolsa_trabajo/load_listar_view_bolsa/','c_qry_bolsa');
//                updtBolsa($("#hid_upload_nNotCodigo").val());
//                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
//            }
//            else{
//                mensaje("Error inesperado al subir archivo multimedia!","r");
//            }
//        }
//    }); 
    
});