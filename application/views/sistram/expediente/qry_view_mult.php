
<script>
    $(document).ready(function(){
      
    // pretty photo //
    $("a.fancybox").fancybox({ 
        'overlayColor':	'#000'
    });
    $("a[rel^='prettyPhoto']").prettyPhoto();
    });	
</script>

<div id="ContenedorGeneralPendientes">
    <div class="content" style="width: 500px">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Listado de <i>Archivos Multimedia</i></h3>
                </div>
                <div class="box-content">
                  
                        <div class="form" style="width: 100%">
                            <?php if ($bandeja > 0) { ?>
                                <table id="Bandeja-Multimedia"  class="display table" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Fecha</th>
                                            <th>Eliminar</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bandeja as $banmultimedia) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $banmultimedia["nMultimediaId"]; ?></td>
                                                <?php
                                                $cadena_de_texto = $banmultimedia["cMultimediaLink"];
                                                $cadena_buscada = 'adjuntos';
                                                $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                                                if ($posicion_coincidencia === false) {
                                                    $bandera = 1;
                                                } else {
                                                    $bandera = 0;
                                                }

                                                $tipo = substr($banmultimedia["cMultimediaLink"], -3);
                                                if ($bandera == 1) {
                                                    echo " <td style='text-align: center;'><center><a target='_blank' href='../" . $banmultimedia["cMultimediaLink"] . "'><img src='" . base_url() . "uploads/documento.png' width='40' height='40'></a></center></td>";
                                                } else {
                                                    if ($tipo=='pdf') {
                                                         echo " <td style='text-align: center;'><center><a target='_blank' href='../" . $banmultimedia["cMultimediaLink"] . "'><img src='" . base_url() . "uploads/pdf-icon.png' width='40' height='40'></a></center></td>";
                                                    } else if($tipo=='png'||$tipo=='jpg'||$tipo=='gif'||$tipo=='peg') {
                                                         echo " <td style='text-align: center;'><center><a target='_blank' title='Foto actual' href='../" . $banmultimedia["cMultimediaLink"] . "' class='fancybox'><img  src='../" . $banmultimedia["cMultimediaLink"] . "' width='40' height='40'></a></center></td>";
                                                    }else {
                                                         echo " <td style='text-align: center;'><center><a target='_blank' title='Foto actual' href='../" . $banmultimedia["cMultimediaLink"] . "' class='fancybox'><img  src='" . base_url() . "uploads/docx-icon.png' width='40' height='40'></a></center></td>";
                                                   
                                                    }
                                                }
                                                                                             
                                                ?>
                                                <td style="text-align: center;"><?php echo $banmultimedia["dFechaGeneracion"]; ?></td>
                                                <?php
                                                if ($bandera == 1) {
                                                    echo "<td style='text-align:center;vertical-align: middle;' style='width:50px;text-align:center;vertical-align: middle;'><img  src='" . base_url() . "uploads/candado.png' width='30' height='30'></td>";
                                                } else {
                                                    echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Eliminar Archivo' src='" . base_url() . "img/eliminar.png' width='30' height='30' onClick=MultimediaDel(" . "\"" . $banmultimedia["nMultimediaId"] . "\"" . ")></td>";
                                                }
                                                ?>

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
    </div></div>