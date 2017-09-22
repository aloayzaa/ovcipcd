<?php
if($materiales != null){
?>
<table border="1" bordercolor="#cacaca">
    <tr>        
        <td style="text-align: center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">ID</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">MATERIAL</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">OPCION</td>
    </tr>
    <?php 
        $i = 0;
        foreach($materiales as $fila){
    ?>
    <tr>
        <td style="width: 50px; text-align: center;"><?php echo $fila->nMcuId; ?></td>
        <td style="width: 300px;"><?php echo $fila->cMcuUbicacion; ?></td>
        <td style="width: 50px; text-align:center;vertical-align: middle;">
            <img id="<?php echo $fila->cMcuUbicacion; ?>" style="cursor:pointer;" onclick="descargarMaterial(this)" title="Descargar" src="<?php echo base_url();?>img/download.png" width="20" height="20"/>
        </td>
    </tr>
    <?php
    }?>
</table>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No hay material para esta sesión.</div>";
}
?>