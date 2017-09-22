
<?php if($ver>0) {?>
<table border="1">
    <tr>
        <td>Capitulos</td>
        <td>Cantidad</td>
    </tr>
    <?php foreach ($ver as $ver) {
                                            ?>
     <tr>
        <td><?php echo $ver->Capitulo; ?></td>
        <td><?php echo $ver->Tesis; ?></td>
        <!--<td><?php // echo $ver["cMatTitulo"]; ?></td>-->
    </tr>
    
    
    <?php } ?>
</table>
<?php }
else{
    echo"  <div class='alert alert-block alert-info'>";
    echo "<h4 class='alert-heading'> Info!!! </h4>";
echo "No se encontraron registros...O...Eliga un capitulo";							
echo "</div>";
}?>