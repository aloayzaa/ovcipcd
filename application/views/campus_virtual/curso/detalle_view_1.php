 <?php if(isset($detalles)) {  ?>
                 <table id="listadoModulos"  class="display" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Titulo</th>
                                <th>Sumilla</th>
                                <th style="text-align: left;">Opciones</th>
                             </tr>
                        </thead>
                        <tbody> 

                                
                         <?php $i=0;$ultimo=end($detalles); foreach ($detalles as $detalle) { $i=$i+1; 
                                
                                if($ultimo==$detalle){?>
                                
                                <tr >    
                                        <td style="width: 380px;text-align: center;"><?php echo $detalle->nConDipId ?></td>
                                        <td style="width: 380px;text-align: center;"><?php echo $detalle->cConDipTitulo ?></td>
                                        <td style="width: 380px;text-align: center;"><input type="text" id="detalle<?php echo  $detalle->nConDipId ?>" value="<?php echo mb_convert_encoding($detalle->cConDipSumilla, 'UTF-8')?>"></td>
                                        <td style="width: 850px; text-align: left;cursor: pointer;">
                                            <img src="../uploads/campus_virtual/editar.png" width="15" height="15" onclick="editarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                            <img src="../uploads/campus_virtual/eliminar.png" width="15" height="15" onclick="eliminarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                   
                                        </td>
                                    
                                </tr>
                                <?php }else { ?>
                                 <tr >    
                                        <td style="width: 380px;text-align: center;"><?php echo $detalle->nConDipId ?></td>
                                        <td style="width: 380px;text-align: center;"><?php echo $detalle->cConDipTitulo ?></td>
                                        <td style="width: 380px;text-align: center;"><input type="text" id="detalle<?php echo  $detalle->nConDipId ?>" value="<?php echo mb_convert_encoding($detalle->cConDipSumilla, 'UTF-8')?>"></td>
                                        <td style="width: 850px;text-align: left; cursor: pointer;">
                                            <img  src="../uploads/campus_virtual/editar.png" width="15" height="15" onclick="editarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                            
                                        </td>
                                    
                                </tr>
                                    
                               <?php  } } ?>  
                          </tbody>
                 </table>  
                <input type='hidden' value="<?php echo $i ?>" id="nromodulos" > 
                <img src="../uploads/campus_virtual/agregar.png" width="25" height="25" onclick="agregarModulo();">
                <div id="formularioagregar"></div>
             <?php  }?>

          
