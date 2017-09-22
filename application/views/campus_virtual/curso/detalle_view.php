 <script>
$(function() {
$( "#accordion" ).accordion();

});
</script> 
<?php if(isset($detalles)) {  ?>
        <div id="accordion">
               <?php $i=0;$ultimo=end($detalles); 
                       foreach ($detalles as $detalle) { $i=$i+1; 
                          if($ultimo==$detalle){?>
                                 <h3><center> <?php echo $detalle->cConDipTitulo ?></center></h3>
                                <div>
                                    <div class="control-group">
                                        <label id="label" class="control-label">Titulo </label>
                                            <div class = "controls">
                                                 <input type="text" id="detalle<?php echo  $detalle->nConDipId ?>" value="<?php echo mb_convert_encoding($detalle->cConDipSumilla, 'UTF-8')?>">
                                             </div>
                                    </div>
                                    <div class="control-group">
                                        <label id="label" class="control-label">Docente </label>
                                            <div class = "controls">
                                                <select class="chzn-select" id="cbo_doc<?php echo  $detalle->nConDipId ?>" >
                                                    <option>Asigne Docente al Modulo</option>
                                                    <?php foreach ($docentes as $docente) {
                                                        if($docente->nPerId==$detalle->nPerId){ ?>
                                                            <option value="<?php echo $docente->nPerId ?>" selected><?php echo $docente->Docente ?></option>   
                                                  
                                                       <?php }else{ ?>
                                                         <option value="<?php echo $docente->nPerId ?>"><?php echo $docente->Docente?></option>   
                                                 
                                                       <?php } ?>
                                                        
                                                    <?php } ?>
                                                </select>
                                             </div>
                                    </div>
                                    <!--<label style="width: 380px;text-align: center;"><?php /*echo $detalle->nConDipId*/ ?></label> -->
                                   <!-- <label style="width: 380px;text-align: center;"><?php /*echo $detalle->cConDipTitulo*/ ?></label> -->
                                   
                                    <center> <img style="cursor: pointer;" src="../uploads/campus_virtual/editar.png" width="20" height="20" onclick="editarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                    <img style=" cursor: pointer;"src="../uploads/campus_virtual/eliminar.png" width="20" height="20" onclick="eliminarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                    </center>
                                </div>
            
                           <?php }else { ?> 
                                <h3><center> <?php echo $detalle->cConDipTitulo ?></center></h3>
                                <div>
                                   <div class="control-group">
                                        <label id="label" class="control-label">Titulo </label>
                                            <div class = "controls">
                                                 <input type="text" id="detalle<?php echo  $detalle->nConDipId ?>" value="<?php echo mb_convert_encoding($detalle->cConDipSumilla, 'UTF-8')?>">
                                             </div>
                                    </div>
                                    <div class="control-group">
                                        <label id="label" class="control-label">Docente </label>
                                            <div class = "controls">
                                                <select class="chzn-select" id="cbo_doc<?php echo  $detalle->nConDipId ?>" >
                                                    <option>Asigne Docente al Modulo</option>
                                                    <?php foreach ($docentes as $docente) { 
                                                       
                                                        if($docente->nPerId==$detalle->nPerId){ ?>
                                                            <option value="<?php echo $docente->nPerId ?>" selected><?php echo $docente->Docente ?></option>   
                                                  
                                                       <?php }else{ ?>
                                                         <option value="<?php echo $docente->nPerId ?>"><?php echo $docente->Docente?></option>   
                                                 
                                                       <?php } ?>
                                                        
                                                    <?php } ?>
                                                </select>
                                             </div>
                                    </div>
                                    <!--<label style="width: 380px;text-align: center;"><?php /*echo $detalle->nConDipId*/ ?></label> -->
                                   <!-- <label style="width: 380px;text-align: center;"><?php /*echo $detalle->cConDipTitulo*/ ?></label> -->
                                   <center> 
                                       <img style="text-align: center; cursor: pointer;" src="../uploads/campus_virtual/editar.png" width="20" height="20" onclick="editarModulo(<?php echo  $detalle->nConDipId ?>);" style="padding: 10px;">
                                    </center>
                                </div>
                                         
            
            
            
                           <?php  } } ?>             
         </div>
          <input type='hidden' value="<?php echo $i ?>" id="nromodulos" > 
          <br>
          <img  style="cursor:pointer;" src="../uploads/campus_virtual/agregar.png" width="25" height="25" onclick="agregarModulo();">
          <div id="formularioagregar"></div>









         <!--        <table id="listadoModulos"  class="display" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Titulo</th>
                                <th>Sumilla</th>
                                <th style="text-align: left;">Opciones</th>
                             </tr>
                        </thead>
             
                        <tbody> 

                             
                            <?php /*$i=0;$ultimo=end($detalles); 
                                   foreach ($detalles as $detalle) { $i=$i+1; 

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

                                  <?php  } }*/ ?>  
                                   
                        </tbody>
                      
                 </table>  
                <input type='hidden' value="<?php echo $i ?>" id="nromodulos" > 
                <img src="../uploads/campus_virtual/agregar.png" width="25" height="25" onclick="agregarModulo();">
                <div id="formularioagregar"></div>
                
          -->      
                
<?php  }?>

          
