
<?php
$this->load->view('dashboard/header');
?>

<link rel="stylesheet" href='<?php echo URL_CSS; ?>multiple-select.css'>       
<script type="text/javascript" src='<?php echo URL_JS;?>jquery.multiple.select.js'></script>


<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/administrador/jsAdministrador.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Expedientes </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Administrador">
                    <ul>
                         <li><a href="#Administrador1" id="AdministradorListar">Expedientes a Derivar <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/recargar.png" width="20" height="20"></a></li>
                           <li><a href="#Administrador2" id="DerivadosListar">Expedientes Derivados <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/recargar.png" width="20" height="20"></a></li>
                    </ul>
         
                    <div id="Administrador1">
                        <div align="center" id="qry_expedientes" style="width: auto">
                            <?php $this->load->view('sistram/administrador/qry_view'); ?>
                        </div>

                    </div>
                     <div id="Administrador2">
                           <div>
                            <select class="chzn-select" id="listarXanios">
                          <?php $anio=date("Y");
                             for($i=2015;$i<$anio+10;$i++){ 
                                if($i==$anio){?>
                            <option selected value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  }else { ?>
                              <option value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  } ?>
                           <?php  } ?>
                             </select>
                            <button onclick="listarderivadosporanios()" style="margin-top: -20px;" class="btn-danger" id="btn_buscar_anio">Buscar</button>
                            </div>
                        <div align="center" id="qry_derivados" style="width: auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







