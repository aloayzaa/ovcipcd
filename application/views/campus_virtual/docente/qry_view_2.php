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
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                                <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>Datos Personales</th>
                                            <th>Opciones</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datos as $datos) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $datos["id"]; ?></td>
                                                <td style='width: 20px;text-align: center;'><center><a  href='../uploads/cip/Koala.jpg' target='_blank'><img style='max-width:95%;' src='../uploads/cip/Koala.jpg' width='100' height='100'></a></center></td>
                                <!--<td style='width: 20px;text-align: center;'><center><a  href='../uploads/cip/' <?php $datos["Foto"]; ?> target='_blank'><img style='max-width:95%;' src='../uploads/cip/'<?php $datos["Foto"]; ?> width='80' height='50'></a></center></td>-->
                                                <td style="width: 200px;text-align: center; font-size: 20px;"><?php echo $datos["DatosPersonales"]; ?></td>
                                                <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'>
                                                            <img title='Editar Docente' src='" . base_url() . "img/eliminar.png' width='20' height='20' onClick=initEvtUpd(".'"docente/popupEditarDocente/","Editar Docente"'.",700,500)>
                                                            <img title='Ver Documento' src='" . base_url() . "img/eliminar.png' width='20' height='20' onClick=MultimediaDel(" . "\"" . $datos["id"] . "\"" . ")>
                                                            </td>"; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                        </div>  
                    </div>
                </div>
        </div>
    </div>
</div>