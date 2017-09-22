
<?php
$this->load->view('dashboard/header');
?>
<link rel="stylesheet" href='<?php echo URL_CSS; ?>multiple-select.css'>       

<script type="text/javascript" src='<?php echo URL_JS;?>jquery.multiple.select.js'></script>

<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/tramite/jsTramite.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Registro de Tramites </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Tramite">
                    <ul>
                        <li><a href="#Tramitel" id="TramiteRegistrar">Nuevo</a></li>
                        <li><a href="#Tramite2" id="TramiteListar">Listado</a></li>
                    </ul>
                    <div id="Tramitel">
                        <div id="RegistrarEmpresa">
                            <?php $this->load->view('sistram/tramite/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="Tramite2">
                        <div align="center" id="qry_tramite" style="width: auto">
                      
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







