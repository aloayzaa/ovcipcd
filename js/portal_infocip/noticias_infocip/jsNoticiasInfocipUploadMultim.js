
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
        'uploader'         : 'noticias_infocip/noticiasUpload',
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

                updtBolsa($("#hid_upload_nNotCodigo").val());
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
            
            $(document).ready(function() {
    var valor = $("#tipos").val();
        get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
           criterio : valor
        });
    });   
    return false;
        }
    });
    
     $("#txt_upload_archivo_multPdf").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'noticias_infocip/noticiasUploadPdf',
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
                //get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip');
                updtBolsa($("#hid_upload_nNotCodigo").val());
                mensaje("Se ha actualizado el archivo multimedia correctamente!","e");   
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
            
            $(document).ready(function() {
    var valor = $("#tipos").val();
        get_page('noticias_infocip/load_listar_view_noticias/','c_qry_noticiasinfocip',{
           criterio : valor
        });
    });   
    return false;
            
        }
    }); 
    
});

function MultimediaDel(nMultCodigo){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('noticias_infocip/MultimediaDel/'+nMultCodigo, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            updtBolsa($("#hid_upload_nNotCodigo").val());
            mensaje("se ha eliminado el archivo correctamente!","e");
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}

function updtBolsa(nNotCodigo){
    $.ajax({
        type: "POST",
        url: 'noticias_infocip/load_listar_view_noticiasMultimedia/'+nNotCodigo,
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


