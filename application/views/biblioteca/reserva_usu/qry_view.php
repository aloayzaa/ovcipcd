<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
	
</script>

<div id="ContenedorGeneralPendientes">
    <!--<div class="content" style="width: 700px">-->      
         <!--Contenido en tabs : adanyc-->
        <!--<div class="row-fluid">-->
            <!--<div class="box">-->
<!--                <div class="box-head">
                    <h3>Reservas Activas</h3>
                </div>-->
                <!--<div class="box-content">-->
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 75%">
                            <?php if ($reservas > 0) { ?>
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Nombres</th>
                                                <th>Codigo Material</th>
                                           <th>Tipo</th>
                                            <th>Titulo Material</th><!--
-->                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>  
                                            <th>Hora Fin</th>
                                            <th>Opciones</th>
<!--                                            <th>Opciones</th>-->
<!--                                            <img title='Agregar Favoritos' src='" . base_url() . "img/favoritos.png' width='20' height='20'>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservas as $reservas) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $reservas["Nombres"]; ?></td>
                                                  <td style="width: 180px;text-align: center;"><?php echo $reservas["Codigo"]; ?></td>
                                                  <td style="width: 180px;text-align: center;">
                                                      <?php if($reservas["cMatTipoR"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                                  
                                                  
                                              <td style="width: 380px;text-align: center;"><?php echo $reservas["Titulo"]; ?></td><!--
-->                                             <td style="width: 200px;text-align: center;"><?php echo $reservas["dFechaInicio"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $reservas["dFechaFin"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $reservas["cHoraFin"]; ?></td>
                                        <?php 
                                        
                                        echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Agregar Favoritos' src='" . base_url() . "img/favoritos.png' width='20' height='20' onClick=FavoritosAdd(" . "\"" . $reservas["nMatId"]. "\"" . "," . "\"" . str_replace(" ", "_", $reservas["cMatTipoR"]). "\"," . $reservas["nPerId"] . ")>";
                                        echo   "<img title='Cancelar Reserva' src='" . base_url() . "img/cancel.png' width='20' height='20' onClick=ReservaCancel(" . "\"" . $reservas["nResId"]. "\"" . "," . "\"" . str_replace(" ", "_", $reservas["cMatTipoR"]). "\"," . $reservas["nMatId"] . ")></td>"; 
                                        
                                        ?>
                                            <?php // echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Cancelar Reserva' src='" . base_url() . "img/cancel.png' width='20' height='20' onClick=MaterialDel(" . "\"" . $reservas["nResId"] . "\"" . "," . $reservas["nMatId"] . ")></td>"; ?>
                                                                             <?php // echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Ver Documento' src='" . base_url() . "img/tramint/ver.png' width='20' height='20' onClick=verDocumento(" . "\"" . $bandeja. "\"" . "," . "\"" . str_replace(" ", "_", $bandeja["receptor"]) . "\"," . $bandeja["nMinId"] . ")></td>"; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                               echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                              En estos momentos no tiene ninguna Reserva...
                                              </div>";
                            }
                            ?>

                        </div>  
                    </div>
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</div>



