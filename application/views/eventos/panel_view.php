
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>eventos/jsEventos.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Eventos </i> CIP-CDLL</h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Eventos">
                    <ul>
                        <li><a href="#Eventosl" id="EventosRegistrar">Nuevo</a></li>
                        <li><a href="#Eventos2" id="EventosListar">Listado</a></li>
                    </ul>
                    <div id="Eventosl">
                        <div id="RegistrarEmpresa">
                            <?php $this->load->view('eventos/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="Eventos2">
                        <div align="center" id="qry_eventos" style="width: auto">
                      
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







