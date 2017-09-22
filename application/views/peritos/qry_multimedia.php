<style>
    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
    .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 5px solid #000000; -webkit-border-radius: 9px; -moz-border-radius: 9px; border-radius: 9px; }
    .datagrid table td, .datagrid table th { padding: 10px 9px; }
    .datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 14px; font-weight: bold; border-left: 1px solid #A3A3A3; } 
    .datagrid table thead th:first-child {
	border: none;
	font-size: 16px;
}.datagrid table tbody td { color: #212121; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }
    .datagrid table tbody .alt td { background: #EBEBEB; color: #0D0000; }.datagrid table tbody td:first-child { border-left: none; }
    .datagrid table tbody tr:last-child td { border-bottom: none; }
    .datagrid table tfoot td div { border-top: 1px solid #000000;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } 
    .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }
    .datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; }
    .datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #7D7D7D; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>

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
<center>

   <div aling="center" class="datagrid" style="width: 100%;margin-left: 100px;position: relative">
                            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bandeja as $bandeja) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $bandeja["nSolId"]; ?></td>
                                          <?php  if ($bandeja['tipo'] == 1) {
                                              echo " <td style='width: 20px;text-align: center;'><center><a  title='Foto actual' href='../uploads/cip/" . $bandeja["nSolArchivo"] . "' class='fancybox'><img style='max-width:95%;' src='../images/lupa_solicitud.png' width='80' height='50'></a></center></td>";
                                              } else {
                                              echo " <td style='width: 20px;text-align: center;'><center><a  href='../uploads/cip/" . $bandeja["nSolArchivo"] . "' target='_blank'><img style='max-width:95%;' src='../images/pdf_solicitud.png' width='80' height='50'></a></center></td>";
                                                   } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                

</div> 
</center>