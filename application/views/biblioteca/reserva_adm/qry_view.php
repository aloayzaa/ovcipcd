<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "ReservasAdm-Lista",
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
                   echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:80px;text-align:center;vertical-align: middle;'><img id='btn_cargar' title='Actualizar' src='" . base_url() . "img/refresh3.png' width='48' height='48' onClick=Actualizar()></td>"; 
                    echo "<td><span id='preload'></span></td>"; 
                   echo "</tr>";
                   echo "</table>";
  ?>
                    <div id="Tabs_Reserva_Adm">

                        
                        <div class="form" style="width: 75%">
                            <?php if ($historial_adm > 0) { ?>
                                <table id="ReservasAdm-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Nombres</th>
<!--                                             <th>Codigo Cip</th>-->
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
                                        <?php foreach ($historial_adm as $historial_adm) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $historial_adm["Nombres"]; ?></td>
<!--                                                 <td style="width: 180px;text-align: center;"><?php // echo $historial_adm["nPerId"]; ?></td>-->
                                                      <td style="width: 380px;text-align: center;"><?php echo $historial_adm["Codigo"]; ?></td>
                                                 <td style="width: 180px;text-align: center;">
                                                      <?php if($historial_adm["cMatTipoR"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                              <td style="width: 380px;text-align: center;"><?php echo $historial_adm["Titulo"]; ?></td>                                      
                                             <td style="width: 200px;text-align: center;"><?php echo $historial_adm["dFechaInicio"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $historial_adm["dFechaFin"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $historial_adm["cHoraFin"]; ?></td>
                                      <td style="width: 200px;text-align: center;" >
                                        <?php 
                                      
                                         date_default_timezone_set("Etc/GMT+5");
                                         if( $historial_adm["dFechaFin"]<=date("d/m/Y")&&$historial_adm["cHoraFin"]<=date("H:i")){
                                                     echo "<img title='No puede Activar' src='" . base_url() . "img/cancelled2.png' width='20' height='20'>"; 
                                            
                                         }
                                         else{ echo "<img style='text-align:center;vertical-align: middle;cursor:pointer;' title='Activar Reserva' src='" . base_url() . "img/activar.png' width='20' height='20' onClick=MaterialActivar(" . "\"" . $historial_adm["nResId"]. "\"" . "," . "\"" . str_replace(" ", "_", $historial_adm["cMatTipoR"]). "\"," . $historial_adm["nMatId"] . ")>";  }
                                        
                                        ?>
                                            </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                            No hay Reservas en el historial... pulse boton actualizar...
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


