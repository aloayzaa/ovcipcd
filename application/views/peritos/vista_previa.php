<?php
$atributosForm = array('id ' => 'frm_vista_previa_sol', 'name ' => 'frm_vista_previa_sol', 'class' => 'form-horizontal');
echo form_open('peritos/peritos/get_VistaPrevia', $atributosForm);
$txt_Remitente = array('name' => 'txt_Remitente', 'id' => 'txt_Remitente',"style"=>"text-align: center;font-size: 15px;");
$txt_Asunto = array('name' => 'txt_Asunto', 'id' => 'txt_Asunto',"style"=>"text-align: center;font-size: 18px; font-weight: bold;");
$txt_Fecha = array('name' => 'txt_Fecha', 'id' => 'txt_Fecha',"style"=>"text-align: center;font-size: 15px; font-weight: bold;");
$txt_Descripcion = array('name' => 'txt_Descripcion', 'id' => 'txt_Descripcion',"style"=>"text-align: center;font-size: 15px; font-weight: bold;");
$txt_Direccion = array('name' => 'txt_Direccion', 'id' => 'txt_Direccion',"style"=>"text-align: center;font-size: 15px; font-weight: bold;");
$txt_FRespuesta = array('name' => 'txt_FRespuesta', 'id' => 'txt_FRespuesta',"style"=>"text-align: center;font-size: 15px; font-weight: bold;");
?>
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
<div class="datagrid">
    <table>
        <thead>
            <tr>
                <th align="center">
                    <img src="<?php echo URL_IMAGES; ?>logo_cip_solicitud.png">
                    
					SOLICITUD DE PERITAJE
                </th>  
            </tr>
        </thead>
    </table>
    
    <table>
        <tbody>
            <tr>
                <td><h4>Solicitud <?php echo $nsolicitud ?></h4></td>
            </tr>
            <tr>
                <td align="left" valign="top"><strong><?php echo "Asunto: ".$nSolAsunto?></strong></td>
            </tr>
            <tr>
                <td> 
                    <?php echo "<strong>Remitente: </strong>" . $Remitente . "</br>" ?>
                    <?php echo "<strong>Fecha de Emisión: </strong>" . $cSolFechaSolicitud . "</br>" ?>
                    <?php echo "<strong>Fecha de Respuesta: </strong>" . $cSolFechaRespuesta ?>
                </td>
            </tr>

            <tr>
                <td valign="top" aling="justify"><?php echo "<h4>Descripción</h4>" . $nSolDescripcionPert ?></td>
            </tr>
            <tr>
                <td height="39" valign="top"><?php echo "<h4>Dirección: </h4>" . $nSolDireccionPert ?></td>
            </tr>
            
            <tr>

                <?php  if ($estado == 'Finalizado') {
                                              echo "<td style='color:#FC0505'> <h3>"."Estado ".$estado."</h4><td>";
                                              } else {
                                              echo "<td style='color:#20B602'><h3>"."Estado ".$estado."</h3></td>";
                                                   } ?>  
            </tr>  
        </tbody>
    </table>
</div>

                <div class="datagrid">
<table>
    <center><h4>PERITOS ASIGNADOS:</h4></center>
    <thead>
        <th style="width: 50px">ID</th>
        <th style="width: 350px" aling="center">Perito</th>
        
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
          
