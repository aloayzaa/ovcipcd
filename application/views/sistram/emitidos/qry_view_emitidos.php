<script type="text/javascript">
    $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoDerivados",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
        $("#checktodo").on("click",checar);
    });
    function checar(){
        
        if($("#checktodo").is(':checked')) {
              $('input[name="orderBox[]"]').prop("checked", "checked"); 
        } 
	 else {  
             $('input[name="orderBox[]"]').prop("checked", "");
	}  
    }
</script>
  
  <style>
     .panel{margin-bottom:20px;background-color:#fff;border:1px solid transparent;border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}
     .panel-body{padding:15px}
     .panel-heading{padding:10px 15px;border-bottom:1px solid transparent;border-top-left-radius:3px;border-top-right-radius:3px}
     .panel-title{margin-top:0;margin-bottom:0;font-size:16px;color:inherit}

     .panel-info{border-color:#bce8f1}
     .panel-info>.panel-heading{color:#31708f;background-color:#d9edf7;border-color:#bce8f1}
     .panel-info>.panel-footer+.panel-collapse>.panel-body{border-bottom-color:#bce8f1}
     
     .panel-success{border-color:#d6e9c6}
     .panel-success>.panel-heading{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}
     .panel-success>.panel-heading+.panel-collapse>.panel-body{border-top-color:#d6e9c6}
      
     .panel-warning{border-color:#faebcc}
     .panel-warning>.panel-heading{color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc}
     .panel-warning>.panel-heading+.panel-collapse>.panel-body{border-top-color:#faebcc}
    
     </style>
  <div id="Expedientes">
    <br>
    <input type="hidden" value="2" id="hid_area_id">
   
    <div class="form" style="width: 100%">
        
        <?php if ($emitidos > 0) { ?>
            <table id="ListadoDerivados"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Expediente</th>
                        <th>Fecha de Registro</th>
                         <th>Tipo Expediente</th>
                        <th>Sumilla</th>
                        <th>Folios</th>
                          <th>Detalle</th> 
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($emitidos as $emitido) { ?>
                                
                                 <tr>
                                                          
                                    <td style="width: 100px;text-align: center;"><?php echo $emitido->nExpedienteId; ?></td>
                                    <td style="width: 280px;text-align: center;"><?php echo $emitido->nExpedienteCodigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $emitido->cExpedienteFechaRegistro; ?></td>
                                    <td style="width: 50px;text-align: center;"><?php echo $emitido->cTipexpedienteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $emitido->cExpedienteSumilla; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $emitido->cExpedienteFolios; ?></td>
                                    <td style="width: 380px;text-align: center;">
                                           <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/ver.png" width="20" height="20" onclick="expedienteDetalle(<?php echo $emitido->nExpedienteId;?>)">
                                        </td>
                                    
                                                       
                                </tr>
                              
                                
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
             <div id="div_detalle_emitidos" class="panel panel-info" style="display:none" >
                <div class="panel-heading">
                    <h3 class="panel-title">Detalle de Expediente <span onclick="ocultar('#div_detalle_emitidos')" style="float: right; cursor: pointer;" aria-hidden="true"><b>X</b></span></h3>
                    
                </div>
                <div id="detalle_emitidos" class="panel-body">
                      
                </div>
              
            </div>
                                            
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No existen expedientes derivados</div>";
        }
        ?>

    </div> 
    
    
</div>

