$(function(){     

  ListarArchivoMult($("#hid_upload_nMatId").val());
    $("#btn_cancel").bind({
        click: function(){                        
            $('#txt_upload_tesis').uploadify('cancel','*');
        }
    });
//    
    $("#btn_upload").bind({
        click: function(){                        
        var cPerOpcion  = $("#cTipoMult").val();
        if(cPerOpcion=='0'){
         $('#txt_upload_tesis').uploadify('upload','*');
            return true;
        }else{
        $('#txt_upload_abstract').uploadify('upload','*');
        } 
        }
    });
    

 $("#txt_upload_tesis").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'material/materialUpload',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Archivo PDF',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.pdf; ',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
              $('#txt_upload_tesis').uploadify('settings','formData',{  
                'hid_upload_nMatId' : $("#hid_upload_nMatId").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){

                mensaje("Se subio el archivo correctamente!","e");   
                 ListarArchivoMult($("#hid_upload_nMatId").val());


            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    });   
    
    
     $("#txt_upload_abstract").uploadify({	      
        'method'           : 'post',
        'swf'              : '../js/scripts_uploadify/uploadify.swf',                    
        'uploader'         : 'material/material_multpdfAbstract',
        'cancelImg'        : '../js/scripts_uploadify/images/cancel.png',
        'buttonText'       : 'Buscar Archivo PDF',
        'multi'            : false,
        'fileTypeDesc'     : 'Archivos de texto...',
        'fileTypeExts'     : '*.pdf; ',  
        'auto'             : false,                 
        'onUploadStart' : function(file) {
              $('#txt_upload_abstract').uploadify('settings','formData',{  
                'hid_upload_nMatId' : $("#hid_upload_nMatId").val()
            });
        },

        'onUploadSuccess' : function(file,data,response) {
            if (data.trim()==1){

                mensaje("Se subio el archivo correctamente!","e");   
                 ListarArchivoMult($("#hid_upload_nMatId").val());


            }
            else{
                mensaje("Error inesperado al subir archivo multimedia!","r");
            }
        }
    }); 
    
});

$("#cTipoMult").change(function(){
        Tipomult();
    }) 
    function Tipomult(){
        var cPerOpcion  = $("#cTipoMult").val();

        if(cPerOpcion=='0'){
            var contenedor = document.getElementById("Abstract");
            contenedor.style.display = "none";
            var contenedor = document.getElementById("txt_upload_tesis");
            contenedor.style.display = "block";
            return true;
        }else{
            var contenedor = document.getElementById("Abstract");
            contenedor.style.display = "block";
            var contenedor = document.getElementById("txt_upload_tesis");
            contenedor.style.display = "none";
        }
    }
    function ListarArchivoMult(nMatId){
    $.ajax({
        type: "POST",
        url: 'material/load_listar_view_MaterialMultimedia/'+nMatId,
        cache: false,
        data: {
            nMatId:nMatId   
        },
             success: function(data){
             $("#c_qry_mult").html(data);               
                },
                error: function(data){ 
            alert(data);
        }        
}
)}