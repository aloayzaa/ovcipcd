<script type="text/javascript">
    $(document).ready(function() {
     $(".chzn-select").chosen();
    });
</script>

<div class="control-group">
            <label class="control-label" for="requisitos_tramite">Requisitos: </label>
            <div class="controls">
                 <?php if (count($requisitos) > 0) { ?>
                <table>
                    <tbody>
                      <?php foreach ($requisitos as $requisito){ ?>
                        <tr>
                            <td><?php echo $requisito->cRequisitosDescripcion;?></td>                              
                             <td>
                                <img style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="requisitotramiteDel(<?php echo $requisito->nRequisitosId;?>);">
                             </td>
                        </tr>
                      <?php } ?> 
                        
                    </tbody>
                    
                </table>
                  <?php }else {
                      echo "No Existen Requisitos para este Tramite";
                  } ?>
                
            </div>
</div>
<div  class="control-group">
      <div class="control-group">
            <label class="control-label" for="cbo_ins_tramite_requisitos">Agregar</label>
            <div class="controls">
                <select class="chzn-select" id="cbo_ins_tramite_listarequisitos" name="cbo_ins_tramite_listarequisitos[]">
                    <?php foreach($listadorequisitos as $listadorequisito){?>
                    <option value="<?php echo $listadorequisito->nRequisitosId;?>"><?php echo $listadorequisito->cRequisitosDescripcion;?></option>
                    
                    <?php }?>
                </select>
                  <img style="text-align: center; cursor: pointer;" src="../uploads/agregar.png" width="20" height="20" onclick="requisitotramiteIns();">
                             
            </div>
        </div>
    
</div>
    