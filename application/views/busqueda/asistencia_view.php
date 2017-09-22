<html>
    <head>
        <title>Asistencia</title>
    </head>
    <body>
    <center>
<table>
            <tbody>
                <tr>
             <?php if ($valor=='Si') { ?>
            <?php echo "<div class='alert alert-block'><h4 class='alert-heading'>Información!</h4>El Participante Tiene Asistencia..  </div>";?>
            <br>
            <input id="id_asistencia" name="id_asistencia" type="hidden" value="<?php echo $asistencia; ?>">
            <td style="padding-bottom: 6px;"><button id="btn_fnd_asistio" name="btn_fnd_asistio" type="button" class="btn btn-primary" value="Si" onclick="asistencias('Si');">Si</button></td>
            <td style="padding-bottom: 6px;"><button id="btn_fnd_noasistio" name="btn_fnd_noasistio" type="button" class="btn btn-danger" value="No" onclick="asistencias('No');">No</button></td>
            </tr>
               
        <?php              
        } else { ?>
        <?php echo "<div class='alert alert-danger'><h4 class='alert-heading'>Información!!</h4>El Participante No Asistió..  </div>"; ?>
        <br>
           <tr> <input id="id_asistencia" name="id_asistencia" type="hidden" value="<?php echo $asistencia; ?>">
            <td style="padding-bottom: 6px;"><button id="btn_fnd_asistio" name="btn_fnd_asistio" type="button" class="btn btn-primary" value="Si" onclick="asistencias('Si');">Si</button></td>
            <td style="padding-bottom: 6px;"><button id="btn_fnd_noasistio" name="btn_fnd_noasistio" type="button" class="btn btn-danger" value="No" onclick="asistencias('No');">No</button></td>
            </tr>
            
       <?php }
        
        ?>
    </tbody>
        </table>
    </center>

</body>


</html>
