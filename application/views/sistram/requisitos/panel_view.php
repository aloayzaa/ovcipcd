
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/requisitos/jsRequisitos.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Registro de Requisitos </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Requisitos">
                    <ul>
                        <li><a href="#Requisitol" id="RequisitosRegistrar">Nuevo</a></li>
                        <li><a href="#Requisito2" id="RequisitosListar">Listado</a></li>
                    </ul>
                    <div id="Requisitol">
                        <div id="RegistrarEmpresa">
                            <?php $this->load->view('sistram/requisitos/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="Requisito2">
                        <div align="center" id="qry_requisitos" style="width: auto">
                      
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







