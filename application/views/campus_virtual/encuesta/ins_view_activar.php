<?php

$btn_ins_activar = form_submit('btn_ins_activar',
    'Activar',
    'id="btn_ins_activar" class="btn btn-primary" '); 

if($encuestas != null){
?>

<fieldset>
    
   <table style="width:480px;" class="table table-striped dataTable dataTable-noheader dataTable-nofooter table-bordered">
        <thead>
                <tr>
                    <th><h2>Pregunta</h2></th>
                    
                </tr>
                
        </thead>
        <tbody>
        <?php foreach ($encuestas as $encuestas){?><tr>

            <td>
                  <?php
                    echo $encuestas->cPreEnunciado;
                    
                  ?>

            </td>
            
        </tr><?php } 
        ?>
        <input id="idHor" type="text" name="idHor" readonly style="visibility:hidden;"value="<?php echo $encuestas->nHorId; ?>">
        </tbody>
    </table>
    <br>


    <div class = "controls" onclick="activarencuesta()" >
        <?php
                echo $btn_ins_activar;
        ?>
    </div>
</fieldset>
<?php
}
else{
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> Encuesta Activada.</div>";
}
?>

<?php echo form_close(); ?>
<?php echo validation_errors(); ?>