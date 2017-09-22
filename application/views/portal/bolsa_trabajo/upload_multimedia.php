<script type="text/javascript" src="<?php echo URL_JS; ?>portal/jsBolsaTrabajoUploadMultim.js"></script>

<script>
    $(document).ready(function(){
        var dataTable = {
            tabla           : "BandejaPendiente-Lista",
            ordenaPor       : new Array([0, "asc" ])
        };
        paginaDataTable(dataTable);
    })
    $("#nTMultCodigo").change(function(){
        ActivarCampoOtroTema();
    }) 
    function ActivarCampoOtroTema(){
        var cPerOpcion  = $("#nTMultCodigo").val();

        if(cPerOpcion=='4'){
            var contenedor = document.getElementById("txt_upload_archivo_mult");
            contenedor.style.display = "none";
            var contenedor = document.getElementById("Pdf");
            contenedor.style.display = "block";
            return true;
        }else{
            var contenedor = document.getElementById("txt_upload_archivo_mult");
            contenedor.style.display = "block";
            var contenedor = document.getElementById("Pdf");
            contenedor.style.display = "none";
        }
    }

</script>
<?php
$atributosForm = array('id ' => 'frm_upload_noticiamulti', 'name ' => 'frm_upload_noticiamulti', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$hid_upload_nNotCodigo = array('name' => 'hid_upload_nNotCodigo', 'id' => 'hid_upload_nNotCodigo', 'value' => $nNotCodigo, 'type' => 'hidden');
$txt_upload_archivo_mult = form_upload("txt_upload_archivo_mult", "", 'id="txt_upload_archivo_mult"');
$txt_upload_archivo_multPdf = form_upload("txt_upload_archivo_multPdf", "", 'id="txt_upload_archivo_multPdf"');
$boton = form_button('btn_uploadMult_noticia', 'Adjuntar Archivo', 'id="btn_uploadMult_noticia" class="btn btn-primary"');

$boton_cancel = form_button('btn_cancelMult_noticia', 'Cancelar', 'id="btn_cancelMult_noticia" class="btn btn-primary"');

foreach ($TMultimedia as $TMultimedia) {
    $nTMultCodigo[$TMultimedia->nTMultCodigo] = $TMultimedia->cTMultDescripcion;
};
?>
<br/>
<div style="width: 350px">      
    <div class="control-group">  
        <center><table style="width: 100%;position:relative;margin-left:100px;">
                <tbody>
                    <tr>
                <div class="controls">
                    <label>Tipo Multimedia:</label>
                    <?php echo form_dropdown('nTMultCodigo', $nTMultCodigo, '', 'id="nTMultCodigo" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione un Tipo" data-placement="right"'); ?>
                </div>
                </tr>
                <br>
                <tr>
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_archivo_mult; ?> </td>
                                </tr>
                                      <tr id="Pdf" style="display:none;">
                                    <td><?php echo $txt_upload_archivo_multPdf; ?> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo form_input($hid_upload_nNotCodigo); ?>
                                        <?php echo $boton; ?> <span id="sms_upd_empadronamiento"></span><?php echo $boton_cancel; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table></center>
    </div> 
    <br>
    <div align="center" id="c_qry_emp"></div>
    <?php echo form_close(); ?>
</div>