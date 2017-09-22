<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista4",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
	
</script>
 
<div id="ContenedorGeneralPendientes">
    
                          <?php 
                  echo "<table>";
                  echo "<tr>";   
                    echo "<td><span id='preload3'></span></td>"; 
                   echo "</tr>";
                   echo "</table>";
  ?>
    
  
                    <div id="Tabs_sinmultrev">

                        
                        <div class="form" style="width: 75%">
                            <?php if ($sinmultimediarev > 0) { ?>
                                <table id="BandejaPendiente-Lista4"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                          <th>Titulo</th>
                                            <th>Autor</th><!--
-->                                       <th>Editorial</th>
                                            <th>Edicion</th> 
                                            <th>Categoria</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sinmultimediarev as $sinmultimediarev) {//1
                                            ?>
                                            <tr>                                  
                                               <td style="width: 180px;text-align: center;"><?php echo $sinmultimediarev["cMatTitulo"]; ?></td>
                                              <td style="width: 380px;text-align: center;"><?php echo $sinmultimediarev["cMatAutor"]; ?></td><!--
-->                                             <td style="width: 200px;text-align: center;"><?php echo $sinmultimediarev["cMatCategoria"]; ?></td>
                                            <td style="width: 200px;text-align: center;"><?php echo $sinmultimediarev["cMatEditorial"]; ?></td> 
                                            <td style="width: 200px;text-align: center;"><?php echo $sinmultimediarev["cMatEdicion"]; ?></td>
                                        <?php 
                                       
                                       echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Subir Archivo' src='" . base_url() . "img/upload2.png' width='20' height='20' onClick=uploadmultrev(" . "\"" . $sinmultimediarev["nMatId"]  . "\"" . ")></td>"; 
                                        
                                        ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo " <div class='alert alert-block '>
                                              <h4 class='alert-heading'> Informacion!!! </h4>
                                                 No hay Revistas sin multimedia..
                                              </div>";
                            }
                            ?>

                        </div>  
                    </div>
          
</div>
