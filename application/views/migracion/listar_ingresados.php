
<center><h3>LISTADO USUARIOS (YA EXISTEN EN CIPBDINTEGRADA)</h3>
                            	<input type="button" class="btn btn-success" onClick="marcar(':checkbox')" value="Seleccionar Todos">
	<input type="button" class="btn btn-success"  onClick="desmarcar(':checkbox')" value="Deseleccionar Todos">
</center>
<br>
<center>
    <div id="ok">
        <table border="1" cellspacing="10%" width="50%">
              <tbody align="center">
                                                                <th>CIP</th>
                                                  <th>DNI</th>
            <?php if ($ingresados > 0) { ?>
                    <?php $cont=1;?>
                        <?php foreach ($ingresados as $ingresados) {
                            ?>
                    <tr>
                              <td> <input type="checkbox" class="opcionesIngresados" name="usuariosIngresados" id="usuariosIngresados" value="<?php echo $ingresados->regcol ?>">

                              <?php echo $ingresados->regcol ?></td>
                                    <td><?php echo $ingresados->lecol ?></td>
                               </tr>   
                        <?php 
                        
                        } ?>
                    <?php
                            } else {
                                echo "<h3><center>No se encontraron colegiados</center></h3>";
                            }
                            ?>
                
                <td colspan="2" align="center" style="height: 50px">
                    <input type="button" class="btn btn-red1" id="botonform" value="Migrar Restantes" onclick="migrar_restantes()"/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</center>