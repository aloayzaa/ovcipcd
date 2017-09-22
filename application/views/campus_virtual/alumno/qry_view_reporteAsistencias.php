<?php

?>

<table border="1" bordercolor="#cacaca">
    <tr>        
        <td colspan="3" style="padding: 10px 10px 10px 10px; width: 500px; font-size: 18px; background-color: #6d6d6d; color: #ffffff">Asignatura: <?php echo $horario['Curso']; ?></td>
    </tr>
    <tr>        
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">SESIÓN</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">FECHA</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">ESTADO</td>
    </tr>
    <?php 
        foreach($asistencias as $fila){
    ?>
    <tr>
        <td><?php echo $fila->Titulo; ?></td>
        <td><?php echo $fila->Fecha; ?></td>
        <td>
            <?php 
                if($fila->Estado == "AS"){
                    echo "ASISTENCIA";
                }
                else{
                    echo "FALTA";
                } 
            ?>
        </td>
    </tr>
    <?php 
    }?>
</table>