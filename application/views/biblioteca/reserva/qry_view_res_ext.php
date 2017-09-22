<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "ReservaExt-Lista",
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
                  <?php 
                  echo "<table>";
                  echo "<tr>";
                  echo "<td><strong>Actualizar:</strong></td>";
                   echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:80px;text-align:center;vertical-align: middle;'><img id='btn_cargar' title='Actualizar' src='" . base_url() . "img/refresh3.png' width='48' height='48' onClick=Actualizar_ext()></td>"; 
                    echo "<td><span id='preload2'></span></td>"; 
                   echo "</tr>";
                   echo "</table>";
  ?>
                    <div id="Tabs_ReservaExt">

                        
                        <div class="form" style="width: 75%">
                            <?php if ($reservas_ext > 0) { ?>
                                <table id="ReservaExt-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Nombres</th>
<!--                                           <th>Codigo Cip</th>-->
                                            <th>Codigo Material</th>
                                           <th>Tipo</th>
                                            <th>Titulo Material</th>    
                                           <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th> 
                                            <th>Hora Fin</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservas_ext as $reservas_ext) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $reservas_ext["Nombres"]; ?></td>
<!--                                                  <td style="width: 180px;text-align: center;"><?php // echo $reservas_ext["nPerId"]; ?></td>-->
                                                      <td style="width: 380px;text-align: center;"><?php echo $reservas_ext["Codigo"]; ?></td>
                                                 <td style="width: 180px;text-align: center;">
                                                      <?php if($reservas_ext["cMatTipoR"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                              <td style="width: 380px;text-align: center;"><?php echo $reservas_ext["Titulo"]; ?></td>                                      
                                             <td style="width: 200px;text-align: center;"><?php echo $reservas_ext["dFechaInicio"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $reservas_ext["dFechaFin"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $reservas_ext["cHoraFin"]; ?></td>
                                        <?php 
                                       
                                       echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Devolver Material' src='" . base_url() . "img/devolver2.png' width='20' height='20' onClick=MaterialDelExt(" . "\"" . $reservas_ext["nResId"]. "\"" . "," . "\"" . str_replace(" ", "_", $reservas_ext["cMatTipoR"]). "\"," . $reservas_ext["nMatId"] . ")>"; 
                                        
                                        ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                              En estos momentos no hay reservas activas... pulse boton actualizar...
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


