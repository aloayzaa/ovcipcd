<script type="text/javascript" src="<?php echo URL_JS; ?>biblioteca/jsRevUpload.js"></script>
<script>
 $(document).ready(function(){
        var dataTable = {
            tabla           : "BandejaPendiente-Lista",
            ordenaPor       : new Array([0, "asc" ])
        };
        paginaDataTable(dataTable);
    })
 </script>
<?php
$atributosForm = array('id ' => 'frm_upload_revista', 'name ' => 'frm_upload_revista', 'class' => 'form-horizontal');
echo form_open('', $atributosForm);
$hid_upload_nMatId_rev = array('name' => 'hid_upload_nMatId_rev', 'id' => 'hid_upload_nMatId_rev', 'value' => $nMatId, 'type' => 'hidden');
$txt_upload_revista = form_upload("txt_upload_revista", "", 'id="txt_upload_revista"');

$btn_upload_revista = form_button('btn_upload_revista', 'Adjuntar Archivo', 'id="btn_upload_revista" class="btn btn-primary"');
$btn_cancel_revista = form_button('btn_cancel_revista', 'Cancelar', 'id="btn_cancel_revista" class="btn btn-primary"');
?>
<br/>
<div style="width: 400px"> 
    <div class="control-group">  
        <table style="width: 100%;">
            <tbody>
                <tr>            
                    
                
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td><?php echo $txt_upload_revista; ?> </td>
                                </tr>
                                <tr>

                                    <td>

                               
                                         <?php echo form_input($hid_upload_nMatId_rev); ?>
                                        <?php echo $btn_upload_revista; ?> <?php  echo $btn_cancel_revista; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>


            </tbody>
        </table>
        <div align="center" id="c_qry_emp"></div>
    </div>

    <?php echo form_close(); ?>
</div>
