<?php
$txt_perito_fecha_fin  = array('name' => 'txt_perito_fecha_fin', 'id' => 'txt_perito_fecha_fin', 'style' => 'width:150px', 'class' => 'cajascalendar','placeholder' => 'Fecha Final', 'data-original-title' => 'Seleccione la fecha','readonly'=>true);
?>
<script type="text/javascript" src="<?php echo URL_JS; ?>miembrosperitos/renovacion.js"></script> 
<center><h3>LISTA DE PERITOS EN ACTIVIDAD</h3>
                                <input type="button" id="btn_seleccionar" class="btn btn-success" value="Seleccionar Todos">&nbsp;
                                <input type="button" id="btn_deseleccionador" class="btn btn-success" value="Deseleccionar Todos">
                            </center>
</br>

<center>
    <div id="ok">
        <table>
            <?php echo form_input($txt_perito_fecha_fin); ?>
            <?php if ($peritos > 0) { ?>
                    <?php $cont=1;?>
                        <?php foreach ($peritos as $peritos) {
                            ?>
                    <tr>
                              <td> <input type="checkbox" class="opciones" name="peritos" id="peritos" value="<?php echo $peritos->nPeritoId ?>">
                               
                                   <?php echo $peritos->cPeritoDatos ?></td>
                                   
                               </tr>   
                        <?php 
                        
                        } ?>
                    <?php
                            } else {
                                echo "<h3><center>No se encontraron peritos Inactivos</center></h3>";
                            }
                            ?>
                
                <td align="center" style="height: 50px">
                    <input type="button" class="btn btn-primary" id="botonform" value="Renovar Plantilla" onclick="actualizarplantilla()"/>
                </td>
            </tr>
        </table>
    </div>
</center>
