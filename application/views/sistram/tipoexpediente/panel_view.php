
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/tipoexpediente/jsTipoexpediente.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Tipos de Expedientes </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_TipoExpediente">
                    <ul>
                        <li><a href="#Tipoexpedientel" id="TipoexpedienteRegistrar">Nuevo</a></li>
                        <li><a href="#Tipoexpediente2" id="TipoexpedienteListar">Listado</a></li>
                    </ul>
                    <div id="Tipoexpedientel">
                        <div id="RegistrarEmpresa">
                            <?php $this->load->view('sistram/tipoexpediente/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="Tipoexpediente2">
                        <div align="center" id="qry_tipoexpediente" style="width: auto">
                      
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







