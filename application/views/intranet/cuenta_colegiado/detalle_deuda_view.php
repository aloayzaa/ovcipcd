<script type="text/javascript" src="<?php echo URL_JS; ?>intranet/jsDeudaColegiado.js" charset=UTF-8"></script>
<div class="control-group" >  
    <div class="box">
        <div class="box-content box-nomargin">
            <div class="tab-content">
                <div id="Tabs_RegistroDeuda">

                    <div class="form" style="width: 100%">
                        <h3>Detalle de Deuda CIP-CDLL</h3>
                        <?php if ($coldeuda > 0) { ?>
                            <table id="BandejaDeuda-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Monto Cuota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $cont=1; 
                                   foreach ($coldeuda as $coldeuda) {//1      
                                        ?>        
                                        <tr>
                                                <td style="width: 10px;text-align: center;">
                                            <?php echo $cont++;?>
                                        </td>
                                            <td style="width: 10px;text-align: center;"><?php echo $coldeuda["año"]; ?></td>
                                            <td style="width: 10px;text-align: center;"><?php echo $coldeuda["mes"]; ?></td>
                                            <td style="width: 10px;text-align: center;"><?php echo $coldeuda["cuota"]; ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "No se encontraron registros";
                        }
                        ?>

                    </div>      </div> 
            </div>
        </div>
    </div>  </div>