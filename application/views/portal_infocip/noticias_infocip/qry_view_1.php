
<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "BandejaPendiente-Lista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
// pretty photo //
	$("a.fancybox").fancybox({ 
		'overlayColor':	'#000'
	});
	$("a[rel^='prettyPhoto']").prettyPhoto();	
</script>

<div id="ContenedorGeneralPendientes">
    <div class="content" style="width: 500px">      
     
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Listado de <i>Archivos Multimedia</i></h3>
                </div>
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <?php if ($bandeja > 0) { ?>
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Fecha</th>
                                            <th>Eliminar</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bandeja as $bandeja) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $bandeja["nMultCodigo"]; ?></td>
                                          <?php  if ($bandeja['nTMultCodigo'] == 2) {
                                              echo " <td style='width: 20px;text-align: center;'><center><a  title='Foto actual' href='../uploads/portal_infocip/" . $bandeja["cMultLinkMiniatura"] . "' class='fancybox'><img style='max-width:95%;' src='../uploads/portal_infocip/" . $bandeja["cMultLinkMiniatura"] . "' width='80' height='50'></a></center></td>";
                                              } else {
                                              echo " <td style='width: 20px;text-align: center;'><center><a  href='../uploads/portal_infocip/" . $bandeja["cMultLink"] . "' target='_blank'><img style='max-width:95%;' src='../uploads/portal_infocip/" . $bandeja["cMultLinkMiniatura"] . "' width='80' height='50'></a></center></td>";
                                                   } ?>
                                                <td style="width: 20px;text-align: center;"><?php echo $bandeja["cMultFecha"]; ?></td>
                                                <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Ver Documento' src='" . base_url() . "img/eliminar.png' width='20' height='20' onClick=MultimediaDel(" . "\"" . $bandeja["nMultCodigo"] . "\"" . ")></td>"; ?>
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
            </div>
        </div>
    </div></div>