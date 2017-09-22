<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "ReservasAdmExternos-Lista",
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
                   echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:80px;text-align:center;vertical-align: middle;'><img id='btn_cargar' title='Actualizar' src='" . base_url() . "img/refresh3.png' width='48' height='48' onClick=Actualizarext()></td>"; 
                    echo "<td><span id='preload2'></span></td>"; 
                   echo "</tr>";
                   echo "</table>";
  ?>
                    <div id="Tabs_Reserva_Ext_Adm">

                        
                        <div class="form" style="width: 75%">
                            <?php if ($historial_adm_ext > 0) { ?>
                                <table id="ReservasAdmExternos-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
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
                                        <?php foreach ($historial_adm_ext as $historial_adm_ext) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $historial_adm_ext["Nombres"]; ?></td>
<!--                                                 <td style="width: 180px;text-align: center;"><?php // echo $historial_adm_ext["nPerId"]; ?></td>-->
                                                      <td style="width: 380px;text-align: center;"><?php echo $historial_adm_ext["Codigo"]; ?></td>
                                                 <td style="width: 180px;text-align: center;">
                                                      <?php if($historial_adm_ext["cMatTipoR"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                              <td style="width: 380px;text-align: center;"><?php echo $historial_adm_ext["Titulo"]; ?></td>                                      
                                             <td style="width: 200px;text-align: center;"><?php echo $historial_adm_ext["dFechaInicio"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $historial_adm_ext["dFechaFin"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $historial_adm_ext["cHoraFin"]; ?></td>
                                            <td style="width: 200px;text-align: center;" >
                                        <?php
                                               date_default_timezone_set("Etc/GMT+5");
                                         if( $historial_adm_ext["dFechaFin"]<=date("d/m/Y")&&$historial_adm_ext["cHoraFin"]<=date("H:i")){
                                                     echo "<img title='No puede Activar' src='" . base_url() . "img/cancelled2.png' width='20' height='20'>"; 
                                         }
                                         else{ echo "<img style='text-align:center;vertical-align: middle;cursor:pointer;' title='Activar Reserva' src='" . base_url() . "img/activar.png' width='20' height='20' onClick=MaterialActivarext(" . "\"" . $historial_adm_ext["nResId"]. "\"" . "," . "\"" . str_replace(" ", "_", $historial_adm_ext["cMatTipoR"]). "\"," . $historial_adm_ext["nMatId"] . ")>";  }
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
                                
//                                  echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Activar Reserva' src='" . base_url() . "img/activar.png' width='20' height='20' onClick=MaterialActivarext(" . "\"" . $historial_adm_ext["nResId"]. "\"" . "," . "\"" . str_replace(" ", "_", $historial_adm_ext["cMatTipoR"]). "\"," . $historial_adm_ext["nMatId"] . ")>"; 
                            }
                            ?>

                        </div>  
                    </div>
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</div>



