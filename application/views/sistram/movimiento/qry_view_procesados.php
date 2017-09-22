<script type="text/javascript">
    $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoProcesados",
            ordenaPor: new Array([0, "desc"])
        };
        paginaDataTable(dataTable);
        $(".pover").popover();
        $(".pover").click(function (e) {
            e.preventDefault();
            if ($(this).data('trigger') == "manual") {
                $(this).popover('toggle');
            }
        });
     

    });
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
    
     
     
        #mensajes_{

        position: fixed;
        overflow: hidden;
        bottom:  40px;
        right: 0;
        margin-right: 5px;
        padding: 5px;
        z-index:1;
        }
        #mensajes_ li{

        color: white;
        margin: 2px;
        background-color: green !important;
        border-radius: 5px;
        padding: 1px 10px 5px 10px;
        }
        #mensajes_ li h6{
                margin-bottom: -4;
                border-bottom:  1px solid #FFF;
               overflow: hidden;
                padding: 2px 5px;
               color: #E5F044;
        }
        #mensajes_ li h6 input{
                float: right;
                border: none;
                background-color: rgb(56, 56, 56);
                color: white;
                font-size: 10px;
                padding: 2px 8px;
                margin-left:5px;
        }
        #mensajes_ li h6 input:hover{
                background-color: white;
                color: black;
        }
        
         #rebote{
         position: relative;
         -webkit-animation: 0.5s rebotar infinite;
         -moz-animation: 0.5s nombre_animacion infinite;
         
      }
      
       @-moz-keyframes rebotar{
         10% {
           -moz-transform:  translateY(0);
        }
        20%{
              translateY(-4px); 
        }
        40%{
            -moz-transform: translateY(-7px); 
        } 
        60%{
             -moz-transform:  translateY(-5px); 
        }
        80% {
            -moz-transform: translateY(-3px);
        }
      }
         @-webkit-keyframes rebotar{
         10% {
           -webkit-transform:  translateY(0);
        }
        20%{
            -webkit-transform:  translateY(-4px); 
        }
        40%{
            -webkit-transform:  translateY(-7px); 
        } 
        60%{
            -webkit-transform:  translateY(-5px); 
        }
        80% {
           -webkit-transform:  translateY(-3px);
        }
      }
        
        
        
        
        

  </style>
   
  <input type="hidden" value="<?php echo $nAreaId; ?>" id="hid_area_id">
  <ul style="display:none" id = "mensajes_"></ul>
  <h3>Area: <?php echo $AreaNombre;?></h3>
  
  <div id="ExpedientesProcesados">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($procesados > 0) { ?>
             
            <table id="ListadoProcesados"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Expediente</th>
                        <th>Fecha de Proceso</th>
                        <th>Solicitante</th>
                        <th>Area Origen</th>
                        <th>Estado</th>
                        <th>Tramite</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php $var=""; foreach ($procesados as $procesado) { ?>
                             
                    
                    
                       
                                <tr >
                                     <td style="width: 380px;text-align: center;" class="controls" >
                                            <a class="pover btn" style="border: none; background-color: none; background-image: none;" 
                                               data-placement="top" data-title="Expediente: <?php echo $procesado->nExpedienteCodigo; ?>" data-content="
                                                 <table>
                                                 <tr>
                                                    <td class='controls'>
                                                      <h4><b>Solicitante: <?php echo $procesado->solicitante; ?></b></h4><br>
                                                      <h4><b>Tipo Expediente: <?php echo $procesado->cTipexpedienteDescripcion ; ?></b></h4><br>
                                                      <h4><b>Observacion de <?php echo $procesado->areaemisor; ?>: <?php echo $procesado->cMovimientoObservacion ; ?></b></h4><br>
                                                       <h4><b>Contenido: <?php echo $procesado->cExpedienteAsunto; ?></b></h4><br>
                                                      
                                                     </td> 
                                                  
                                                 </tr>
                                                 
                                                 </table>">  <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/vermas.png" width="20" height="20">
                                    </a>
                                   
                                    </td>
                                
                                    
                                    <td style="width: 280px;text-align: center;"><?php echo $procesado->nExpedienteCodigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $procesado->dMovimientoFechaAtencion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $procesado->solicitante; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $procesado->areaemisor; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $procesado->cMovimientoEstado; ?></td>
                                    <td  style="width: 380px;text-align: center;"><?php echo $procesado->cTramiteTitulo; ?></td>
                                    
                                    <td style="width: 380px;text-align: center;">
                                     
                                         <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/ver.png" width="20" height="20" onclick="documentacionExpediente(<?php echo $procesado->nExpedienteId;?>)">
                                       
                                    </td>
                                    
                                                                 
                                </tr>
                              
                                
                    <?php } ?>
                </tbody>
            </table>
            <br>    
            <br>
            <div id="div_detalle" class="panel panel-info" style="display:none">
                <div class="panel-heading">
                    <h3 class="panel-title">Derivar de Expediente <span onclick="ocultar('#div_detalle')" style="float: right; cursor: pointer;" aria-hidden="true"><b>X</b></span></h3>
                    
                </div>
                <div id="detalle_exp" class="panel-body">
                      
                </div>
              
            </div>
                  
        
        
        
                                
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No existen expedientes en su bandeja</div>";
        }
        ?>

    </div>  
   
</div>
