
<center><h3>LISTADO USUARIO MIGRACION (BDCOLEGIO A CIPBD.)</h3>
                            	<input type="button" class="btn btn-success" onClick="marcar(':checkbox')" value="Seleccionar Todos">
	<input type="button" class="btn btn-success"  onClick="desmarcar(':checkbox')" value="Deseleccionar Todos">
</center>
<br>
<center>
    <div id="ok">
          <table border="1" cellspacing="10%" width="100%">
                 <tbody align="center">
                                          <th>CIP</th>
                                                  <th>CLAVE MD5</th>
            <?php if ($usuarios > 0) { ?>
                    <?php $cont=1;?>
                        <?php foreach ($usuarios as $usuarios) {
                            ?>
                    <tr>
                              <td> <input type="checkbox" class="opciones" name="usuarios" id="usuarios" value="<?php echo $usuarios->regcol ?>">

                              <?php echo $usuarios->regcol ?></td>
                                    <td><?php echo $usuarios->clave ?></td>
                               </tr>   
                        <?php 
                        
                        } ?>
                    <?php
                            } else {
                                echo "<h3><center>No se encontraron colegiados</center></h3>";
                            }
                            ?>
                
                <td align="center" style="height: 50px" colspan="2">
                    <input type="button" class="btn btn-red1" id="botonform" value="Migrar Usuarios" onclick="migracion_usuarios()"/>
                </td>
            </tr>
             </tbody>
        </table>
    </div>
</center>