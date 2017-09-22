
<style>
    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
    .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 4px solid #36752D; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
    .datagrid table td, .datagrid table th { padding: 6px 8px; }
    .datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; color:#FFFFFF; font-size: 14px; font-weight: bold; border-left: 1px solid #36752D; } 
    .datagrid table thead th:first-child { border: none; }
    .datagrid table tbody td { color: #275420; border-left: 1px solid #C6FFC2;font-size: 15px;font-weight: normal; }
    .datagrid table tbody .alt td { background: #DFFFDE; color: #275420; }
    .datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #36752D;background: #DFFFDE;} 
    .datagrid table tfoot td { padding: 0; font-size: 11px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }
    .datagrid table tfoot  li { display: inline; }
    .datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #36752D;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; }
    .datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #275420; color: #FFFFFF; background: none; background-color:#36752D;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>

<div class="datagrid">
<table>
    <thead>
        <th style="width: 50px">ID</th>
        <th style="width: 350px">Perito</th>
        <th>Opción</th>
    </thead>
<tbody>
    
        <?php if ($registros > 0) { ?>
                                        <?php $cont=1;?>
                                        <?php foreach ($registros as $registros) {//1
                                            ?>
                                           <tr> 
                                               <td style="display:none"><?php echo $registros->nSdelId ?></td>

                                                <td style="width: 10px;text-align: center;"> <?php echo $cont++ ?></td>
                                                <td style="width: 20px;text-align: center; "><?php echo $registros->cPeritoDatos ?></td>
                                                <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Remover Perito' src='" . base_url() . "img/eliminar.png' width='20' height='20' onClick=RemoverPerito(" . "\"" . $registros->nSdelId . "\"" . ")></td>"; ?>
                                           </tr>
    
                                        <?php } ?>
                                    
                                <?php
                            } else {
                                echo "<h3><center>No se encontraron peritos asignados</center></h3>";
                            }
                            ?>
                                               
</tbody>
</table>
</div>