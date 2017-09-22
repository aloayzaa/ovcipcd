<!--<script type="text/javascript" src='<?php echo URL_JS; ?>biblioteca/jsReservas_usuario.js'></script>-->
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
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 75%">
                            <?php if ($favoritos > 0) { ?>
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                           <th>Nombres</th>
                                           <th>Tipo</th>
                                            <th>Titulo Material</th>
                                            <th>Fecha </th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($favoritos as $favoritos) {
                                            ?>
                                            <tr>                                  
                                                 <td style="width: 180px;text-align: center;"><?php echo $favoritos["Nombres"]; ?></td>
                                                     <td style="width: 180px;text-align: center;">
                                                      <?php if($favoritos["cFavTipo"]=='T'){ 
                                                      echo "<img src='" . base_url() . "img/tesiss.png' width='20' height='20'>";
                                                              
                                                      }
                                                      else{ echo "<img src='" . base_url() . "img/book.png' width='20' height='20'>";}
                                                   ?>
                                                  </td>
                                                 
                                              <td style="width: 380px;text-align: center;"><?php echo $favoritos["Titulo"]; ?></td>
                                              <td style="width: 200px;text-align: center;"><?php echo $favoritos["dFavFecha"]; ?></td>
                                            
                                        <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Eliminar' src='" . base_url() . "img/eliminar.png' width='20' height='20' onClick=FavoritosDel(" . "\"" . $favoritos["nFavId"] . "\"" .  ")></td>"; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "No se encontraron registros";
                            }
                            ?>

                        </div>  
                    </div>
</div>
