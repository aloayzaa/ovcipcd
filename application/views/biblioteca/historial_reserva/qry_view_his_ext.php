<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "HistorialResExt-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
	
</script>

<div id="ContenedorGeneralPendientes">
                    <div id="Tabs_HisResExt">

                        <div class="form" style="width: 75%">
                            <?php if ($historial_ext > 0) { ?>
                                <table id="HistorialResExt-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Nombres</th>
<!--                                             <th>Codigo Cip</th>-->
                                           <th>Codigo Material</th>
                                           <th> Tipo</th>
                                            <th>Titulo Material</th>                                           
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th> 
                                            <th>Hora Fin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($historial_ext as $historial_ext) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $historial_ext["Nombres"]; ?></td>
<!--                                                 <td style="width: 180px;text-align: center;"><?php // echo $historial_ext["nPerId"]; ?></td>-->
                                                  <td style="width: 180px;text-align: center;"><?php echo $historial_ext["Codigo"]; ?></td>
                                                     <td style="width: 180px;text-align: center;">
                                                      <?php if($historial_ext["cMatTipoR"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                                 
                                                 
                                              <td style="width: 380px;text-align: center;"><?php echo $historial_ext["Titulo"]; ?></td><!--
-->                                             <td style="width: 200px;text-align: center;"><?php echo $historial_ext["dFechaInicio"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $historial_ext["dFechaFin"]; ?></td> 
                                             <td style="width: 200px;text-align: center;"><?php echo $historial_ext["cHoraFin"]; ?></td>
                                     
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                               echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                              En estos momentos no hay reservas!!!
                                              </div>";
                            }
                            ?>

                        </div>  
                    </div>
         </div>


