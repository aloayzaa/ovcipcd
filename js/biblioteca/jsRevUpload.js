$(function(){  
    
     updtBolsa($("#hid_upload_nMatId_rev").val());
     
    $("#fotoempadronado").prettyPhoto({
        overlay_gallery:false
    });    
    $("#btn_cancel_revista").bind({
        click: function(){                        
            $('#txt_upload_revista').uploadify('cancel','*');
        }
    });
//    
    $("#btn_upload_revista").bind({
        click: function(){                        
            $('#txt_upload_revista').uploadify('upload','*');
        }
    });
    

 $("#txt_upload_revista").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'material/revistaUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Imagen',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
         'fileTypeExts'     : '*.gif; *.jpg; *.png', 
        'auto'             : false,                 
        'onUploadStart' : function(file) {
              $('#txt_upload_revista').uploadify('settings','formData',{  
                'hid_upload_nMatId_rev' : $("#hid_upload_nMatId_rev").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){

                get_page('material/load_list_revista/','list_view_revista');
                updtBolsa($("#hid_upload_nMatId_rev").val());
                mensaje("Se subio el archivo correctamente!","e");   

                    
            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });   
    
});

function updtBolsa(nMatId){
    $.ajax({
        type: "POST",
        url: 'material/load_listar_view_revistaMultimedia/'+nMatId,
        cache: false,
        data: {
            nMatId:nMatId   
        },
             success: function(data){
             $("#c_qry_emp").html(data);               
                },
                error: function(data){ 
            alert(data);
        }        
}
)}

function MultimediaDel(nMatId){
    
    var rdn=Math.random()*11;
      var msg = confirm("¿Esta seguro de realizar la operacion?");
          if (msg) {
    $.post('material/MultimediaDel/'+nMatId, {
        rdn:rdn
    }, function(data){
        if(data.trim()==1){
            updtBolsa($("#hid_upload_nMatId_rev").val());
            mensaje("se ha eliminado el archivo correctamente!","e");
        }else{
            mensaje("Error inesperado, no se ha podido eliminar la empresa!","r");
        }                        
    });
//    return false;
    
    }
}
