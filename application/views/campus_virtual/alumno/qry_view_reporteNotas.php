<?php
if($respuesta == null){
if($notas != null){
?>

<table border="1" bordercolor="#cacaca">
    <tr>        
        <td colspan="2" style="padding: 10px 10px 10px 10px; width: 500px; font-size: 24px; background-color: #6d6d6d; color: #ffffff">Asignatura: <?php echo$horario['Curso']; ?></td>
    </tr>
    <tr>        
        <td style="width: 425px; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">SESIÓN</td>
        <td style="width: 75px; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">NOTA</td>
    </tr>
    <?php 
        $suma = 0;
        $cantidad = 0;
        foreach($notas as $fila){
    ?>
    <tr>
        <td><?php echo $fila->Titulo; ?></td>
        <td>
            <?php 
                if($fila->Nota > 15){
            ?>
                    <div style="color: #0010ff; font-weight: bold;">
                        <img src="<?php echo base_url()?>img/16a20.gif"/> <?php echo $fila->Nota; ?>
                    </div>
                    <?php
                }
                else{
                     if($fila->Nota > 10 && $fila->Nota < 16){
                         ?>
                        <div style="color: #0010ff; font-weight: bold;">
                            <img src="<?php echo base_url() ?>img/11a15.gif"/> <?php echo $fila->Nota; ?>
                        </div>   
               <?php }
                     else{
                            if($fila->Nota > 05 && $fila->Nota < 11){
                              ?>
                                <div style="color: #ff0000; font-weight: bold;">
                                    <img src="<?php echo base_url() ?>img/06a10.gif"/> <?php echo $fila->Nota; ?>
                                </div> 
                   <?php
                            }
                            else{
                                 ?>
                                    <div style="color: #ff0000; font-weight: bold;">
                                        <img src="<?php echo base_url() ?>img/00a05.gif"/> <?php echo $fila->Nota; ?>
                                    </div>
                   <?php
                                }
                        }
                   ?>
            <?php }?>
        </td>
    </tr>
    <?php 
        $suma = $suma + $fila->Nota;
        $cantidad++;
    }
    $promedio = $suma/$cantidad;
    ?>
</table>
<div style="padding-bottom: 25px;"></div>
<table border="1" bordercolor="#cacaca">
    <tr>        
        <td style="width: 416px; padding: 5px 5px 5px 5px; background-color: #416ce9; font-weight: bold; color: #ffffff;">PROMEDIO FINAL</td>
        <td style="width: 84px;">
            <?php 
                if($promedio > 15){
            ?>
                    <div style="color: #0010ff; font-weight: bold;">
                        <img src="<?php echo base_url()?>img/16a20.gif"/> <?php echo round($promedio); ?>
                    </div>
                    <?php
                }
                else{
                     if($promedio > 10 && $promedio < 16){
                         ?>
                        <div style="color: #0010ff; font-weight: bold;">
                            <img src="<?php echo base_url() ?>img/11a15.gif"/> <?php echo round($promedio); ?>
                        </div>   
               <?php }
                     else{
                            if($promedio > 05 && $promedio < 11){
                              ?>
                                <div style="color: #ff0000; font-weight: bold;">
                                    <img src="<?php echo base_url() ?>img/06a10.gif"/> <?php echo "0".round($promedio); ?>
                                </div> 
                   <?php
                            }
                            else{
                                 ?>
                                    <div style="color: #ff0000; font-weight: bold;">
                                        <img src="<?php echo base_url() ?>img/00a05.gif"/> <?php echo "0".round($promedio); ?>
                                    </div>
                   <?php
                                }
                        }
                   ?>
            <?php }?>
        </td>
    </tr>
</table>

<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> Responde la encuesta.</div>";
}}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> No hay notas para esta asignatura.</div>";
}
?>