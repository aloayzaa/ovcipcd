
<?php
$this->load->view('dashboard/header');
?>

<script type="text/javascript" src="<?php echo URL_JS ?>sistram/historico/jsHistorico.js"></script>


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Expedientes </h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Decanato">
                    <ul>
                        <li><a href="#Historial" id="HistoricoListar">Historial de Expedientes <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/recargar.png" width="20" height="20"></a></li>
                    </ul>
                    <div id="Historial">
                          <div>
                            <select class="chzn-select" id="listadeanios">
                          <?php $anio=date("Y");
                             for($i=2015;$i<$anio+10;$i++){ 
                                if($i==$anio){?>
                            <option selected value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  }else { ?>
                              <option value="<?php echo  $i?>"><?php echo $i?></option>
                             <?php  } ?>
                           <?php  } ?>
                             </select>
                            <button onclick="listaremitidosporanios()" style="margin-top: -20px;" class="btn-danger" id="btn_buscar_anio">Buscar</button>
                            </div>
                        <div align="center" id="qry_historico" style="width: auto">
                               <?php //$this->load->view('sistram/decanato/qry_view_derivados'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







