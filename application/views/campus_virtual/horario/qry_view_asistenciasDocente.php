<?php
    if($sesiones != null){
?>
<table border="1" bordercolor="#cacaca">
    <?php 
        $i = 0;
        foreach($sesiones as $fila){
            if($i == 0){
    ?>
        <tr>        
        <td colspan="3" style="padding: 10px 10px 10px 10px; width: 500px; font-size: 16px; background-color: #6d6d6d; color: #ffffff">Docente: <?php echo $fila->Docente; ?></td>
        </tr>
        <tr>        
            <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">FECHA</td>
            <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">ESTADO</td>
        </tr>
        <tr>
    <?php
            }
            if($asistencias != null){
                foreach($asistencias as $filaA){
                if($fila->FechaSesion){
    ?>
                    <td><?php echo $fila->FechaSesion; ?></td>
                    <td>
                        <?php 
                            if($fila->EstadoH == "AS"){
                                echo "ASISTENCIA";
                            }
                            else{
                                echo "FALTA";
                            }
                        ?>
                    </td>
    <?php    
                    break;
                }
                }
            }?>
        </tr>
    <?php
        $i++;
    }?>
</table>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> El horario no ha sido activado.</div>";
}
?>