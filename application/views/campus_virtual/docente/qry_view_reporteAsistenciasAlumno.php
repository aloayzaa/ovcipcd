<?php
if($asistencias != null){
?>

<table border="1" bordercolor="#cacaca">
    <?php 
        $i = 0;
        foreach($asistencias as $fila){
            if($i == 0){
                ?>
    <tr>        
        <td colspan="3" style="padding: 10px 10px 10px 10px; width: 500px; font-size: 18px; background-color: #6d6d6d; color: #ffffff">Alumno: <?php echo $fila->Persona; ?></td>
    </tr>
    <tr>        
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">SESIÓN</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">FECHA</td>
        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">ESTADO</td>
    </tr>
    <?php
            }
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
    <?php $i++;
    }?>
</table>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No hay asistencias para esta asignatura.</div>";
}
?>