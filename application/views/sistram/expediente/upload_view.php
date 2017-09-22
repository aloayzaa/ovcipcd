<link href="<?php echo URL_PLUG;?>dropzone/dropzone.css" type="text/css" rel="stylesheet" > 
<script src="<?php echo URL_PLUG; ?>dropzone/dropzone.js"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>sistram/expediente/jsMultimediaUpload.js'></script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        Dropzone.autoDiscover = false;
        var expedienteId = $('#hid_expedienteId').val();

        $("#dropzone").dropzone({
            url: "expediente/upload/" + expedienteId,
            addRemoveLinks: true,
            maxFileSize: 1000,
            dictResponseError: "Ha ocurrido un error en el server",
            acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.docx,.pdf',
            complete: function (file)
            {
                if (file.status == "success")
                {
                    mensaje("El archivo se ha subido correctamente!", "e");
                    get_page('expediente/popupMultimediaExpediente/' + expedienteId, 'tablamultimedia');
                    //alert("El siguiente archivo ha subido correctamente: " + file.name);
                }
            },
            error: function (file)
            {
                alert("Error subiendo el archivo " + file.name);
            }
            ,
             removedfile: function(file, serverFileName)
             {
                 var name = file.name;
                  mensaje("Eliminar directamente en la tabla!", "a");
                  
             }
        });
    });

</script>
<style>
    #dropzone{
        background: url('../uploads/upload.png') center no-repeat ;

    }

</style>
<div  id="dropzone" class="dropzone">
    <h4>Coloca los archivos aquí</h4>
</div>





