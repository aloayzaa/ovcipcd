<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/sesion/jsSesion.js'></script>

<?php

$frm_ins_sesion = array('id' => 'frm_ins_sesion',
    'name' => 'frm_ins_sesion',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/sesion/sesionIns/', $frm_ins_sesion);

echo "<input type='hidden' name='hid_idhorario' id='hid_idhorario' value='" . $idHorario . "'>";

if($sesiones == null){
    echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> No tiene ninguna Sesión para activar.</div>";
}
else{
    if($alumnos == null){
        echo "<div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> No tiene alumnos para crear activar la sesión.</div>";
    }
    else{

?>

<table>
    <tr style="height: 300px">
        <td valign="top" style="width: 220px">
            <?php
            foreach ($sesiones as $fila) {
                ?>
                    <table>
                        <tr>
                            <td valign="middle">
                                Sesion de 
                            </td>
                            <td style="padding-left: 10px">
                                <?php
                                    if($fechaHoy == $fila->Fecha){
                                ?>      
                                <input type="button" id="<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>" name="<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>" value="<?php echo $fila->Fecha ?>" onclick="activarSesion('<?php echo $fila->idSesion ?>','<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>')" class="btn btn-primary"/>
                                <?php    
                                }
                                else{
                                ?>
                                <input disabled type="button" id="<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>" name="<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>" value="<?php echo $fila->Fecha ?>" onclick="activarSesion('<?php echo $fila->idSesion ?>','<?php echo $fila->Fecha ?>_<?php echo $fila->id ?>')" class="btn btn-primary"/>
                                <?php 
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
            <?php } ?>
        </td>
        <td valign="top" style="padding-left: 10px; width: 400px">
            <div id="sesionMostrar">
            </div>
        </td>
    </tr>
</table>
<?php
        }
    }
?>

<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>