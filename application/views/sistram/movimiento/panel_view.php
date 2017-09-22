
<?php
$this->load->view('dashboard/header');
?>
<link rel="stylesheet" href='<?php echo URL_CSS; ?>multiple-select.css'>       
<script type="text/javascript" src='<?php echo URL_JS;?>jquery.multiple.select.js'></script>


<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>sistram/movimiento/jsMovimiento.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Movimientos </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Movimiento">
                    <ul>
                         <li><a href="#Movimiento1" id="MovimientoListar">Expedientes Recibidos <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/recargar.png" width="20" height="20"></a></li>
                           <li><a href="#Movimiento2" id="MovimientoProcesados">Expedientes Procesados <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/recargar.png" width="20" height="20"></a></li>
                    </ul>
         
                    <div id="Movimiento1">
                        <div align="center" id="qry_movimiento" style="width: auto">
                            <?php $this->load->view('sistram/movimiento/qry_view'); ?>
                        </div>

                    </div>
                        <div id="Movimiento2">
                            <div>
                            <select class="chzn-select" id="anios">
                          <?php $anio=date("Y");
                             for($i=2015;$i<$anio+10;$i++){ 
                                if($i==$anio){?>
                            <option selected value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  }else { ?>
                              <option value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  } ?>
                           <?php  } ?>
                             </select>
                            <button onclick="listarporanios()" style="margin-top: -20px;" class="btn-danger" id="btn_buscar_anio">Buscar</button>
                            </div>
                            <br>
                        <div align="center" id="qry_procesados" style="width: auto">
                            
                        </div>

                    </div>
                          <!-- Dialogo expediente generado -->
                      <div id="c_div_multimedia" class="modal hide" style="width:600px;height: 500px">
                          <div class="modal-header">

                              <button data-dismiss="modal" class="close" type="button">×</button>
                              <h3>Detalle Multimedia</h3>
                          </div>
                          <div class="modal-body">

                              <input type="hidden" id="hid_expedienteId_mov" value="">
                               <center><div id="contenidomodalmov" style="background: rgba(200, 195, 195, 0.26);width: 500px;border:1px solid #777">
                                 <?php //$this->load->view('sistram/expediente/upload_view'); ?>
                                  </div></center>
                              <div id="tablamultimediamov">
                              </div>
                          </div>                  
                      </div>
                              <!--  Fin Dialogo expediente generado -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







