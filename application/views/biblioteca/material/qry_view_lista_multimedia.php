 <script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista2",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
	
</script>
 
<div id="ContenedorGeneralPendientes">
    
                          <?php 
                  echo "<table>";
                  echo "<tr>";   
                    echo "<td><span id='preload2'></span></td>"; 
                   echo "</tr>";
                   echo "</table>";
  ?>
    
  
                    <div id="Tabs_sinmultes">

                        
                        <div class="form" style="width: 75%">
                            <?php if ($sinmultimedia > 0) { ?>
                                <table id="BandejaPendiente-Lista2"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Codigo</th>
                                           <th>Titulo</th>
                                            <th>Autor</th><!--
-->                                            <th>Año</th>
                                            <th>Especialidad</th> 
                                            <th>Universidad</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sinmultimedia as $sinmultimedia) {//1
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $sinmultimedia["cMatcodigo"]; ?></td>
                                              <td style="width: 380px;text-align: center;"><?php echo $sinmultimedia["cMatTitulo"]; ?></td><!--
-->                                             <td style="width: 200px;text-align: center;"><?php echo $sinmultimedia["cMatAutor"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $sinmultimedia["cMataño"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $sinmultimedia["descesp"]; ?></td>
                                           <td style="width: 200px;text-align: center;"><?php echo $sinmultimedia["razsocinsacad"]; ?></td>
                                        <?php 
                                       
                                       echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Subir Archivo' src='" . base_url() . "img/upload2.png' width='20' height='20' onClick=uploadmult(" . "\"" . $sinmultimedia["nMatId"]  . "\"" . ")></td>"; 
                                        
                                        ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                              No hay Tesis sin multimedia..
                                              </div>";
                            }
                            ?>

                        </div>  
                    </div>
          
</div>
