<script type="text/javascript">
    $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoExpedientes",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
        $(".pover").popover();
        $(".pover").click(function (e) {
            e.preventDefault();
            if ($(this).data('trigger') == "manual") {
                $(this).popover('toggle');
            }
        });

        $("#checktodo").on("click",checar);
        $("#habilitarusuario").on("click",habilitar);
        $("#enviar").on("click",enviarVB);
    });
    function checar(){
        
        if($("#checktodo").is(':checked')) {
              $('input[name="orderBox[]"]').prop("checked", "checked"); 
        } 
	 else {  
             $('input[name="orderBox[]"]').prop("checked", "");
	}  
    }          
    function enviarVB(){
        var checkboxValues = "";
    $('input[name="orderBox[]"]:checked').each(function() {
          var input=$(this).val();
          checkboxValues += $(this).val() + ",";
        });
        var usuario=$("#usuarioderivar").val();
    
       if(checkboxValues!=""){
            var data={expedientes:checkboxValues,usuario:usuario};
            
            $.ajax({
                data:  data,
                url:   'decanato/enviarVB/',
                type:  'post',
                beforeSend: function () {
                      msgLoading("#preload");
                },
                success:  function (response) {
                    $("#preload").html("");
                        if(response.trim()==1){
                           
                             mensaje("Se ha enviado los expedientes correctamente!","e");
                             $('input[name="orderBox[]"]:checked').attr('checked', false);
                             get_page('decanato/load_listar_view_decanato/','qry_expedientes');
  
                         }
                         else{
                            mensaje("Se ah generado un error al enviar expedientes!","r");
                          
                         }
                },
                error:function(){
                     mensaje("Se ah generado un error al enviar expedientes!","r");
                }
             });
        }
        else {
            alert("Seleccione al menos un registro");
        }
        
        
    }
    
    
     function habilitar(){
        
        if($("#habilitarusuario").is(':checked')) {
              $('#usuarioderivar').removeAttr('disabled');
              
        } 
	 else {  
          $("#usuarioderivar option[value=1]").attr("selected",true);
           $("#usuarioderivar").attr('disabled', 'disabled');
	}  
    }
    function abrirpdf(pdf1){
        if(pdf1!==''){
            var new_text = pdf1.split(',');
            var i=0; 
            for(i=0;i<new_text.length;i++){
               new_text[i];
            window.open('http://www.cip-trujillo.org/ovcipcdll/'+new_text[i],'_blank');                

            }
        }
        else {
            bootbox.alert("<h3>El expediente no tiene archivos adjuntos</h3>");
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
     
  <div id="Expedientes">
    <br>
    <input type="hidden" value="<?php echo $this->session->userdata('IDPer');?>" id="hid_area_id">
    <div class="form" style="width: 100%">
        
        <?php  $var="";if ($expedientes > 0) {
             ?>
            
            <table id="ListadoExpedientes"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><!--<input id="checktodo" type="checkbox" />--></th>
                        <th>Expediente</th>
                        <th>Fecha de Registro</th>
                         <th>Tipo Expediente</th>
                        <th>Sumilla</th>
                        <th>Solicitante</th>
                         
                        <th>Estado</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($expedientes as $expediente) { ?>
                           <!--     <?php //if($expediente->nEstadoProveido==1){ ?>
                                <tr>
                                      <td style="width: 380px;text-align: center;">
                                          <input id="check" name="orderBox[]" value=<?php echo $expediente->nExpedienteId;?> type="checkbox"/>
                                      </td>
                                     <?php //} else if($expediente->nEstadoProveido==2){ ?>
                                <tr style="background-color:#FF7F50">
                                      <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $expediente->nExpedienteId;?> type="checkbox" disabled/></td>
                                     <?php //}else if($expediente->nEstadoProveido==3){ ?>  -->
                                        <tr style="background-color:#90EE90">
                                            <td style="width: 380px;text-align: center;"> 
                                                <!--
                                                <input id="check" name="orderBox1[]" value=<?php //echo $expediente->nExpedienteId;?> type="checkbox" disabled/> -->
                                                <?php if($expediente->notificaciones!=null){ ?>
                                                <a class="pover btn" style="border: none; background-color: #90EE90; background-image: none;" 
                                                data-placement="top" data-title="Expediente: <?php echo $expediente->nExpedienteCodigo; ?>" data-content="
                                                   <table>
                                                    <tr>
                                                        <td class='controls'>
                                                         
                                                           <h4><b>Solicitante: <?php echo $expediente->solicitante ?></b></h4><br>
                                                           
                                                           <h4><b>Notificaciones: <?php  $i=0;foreach($expediente->notificaciones as $noti){ ?></b></h4><br>
                                                              <?php 
                                                                      // var_dump($areasnotificacion);
                                                                      $i++;
                                                                      foreach($areasnotificacion as $areanoti){
                                                                         
                                                                         if($noti->nAreaEmisornotiId==$areanoti->nAreasId){
                                                                           echo "<b>".$i.".- ".$areanoti->cAreasDescripcion."</b>: ".$noti->cNotificacion.'';  
                                                                           $var=$var.$noti->nAreaEmisornotiId.",";
                                                                           
                                                                         }
                                                                         $prioridad=$noti->nExpedientePrioridadnoti;
                                                                      }
                                                               }?>
                                                           
                                                        </td> 
                                                                
                                                      </tr>

                                                      </table>"> 
                                                    <input type="hidden" id="areasno<?php echo $expediente->nExpedienteId?>" value="<?php echo $expediente->movimientos.$var;?>">
                                                  <!--  <input type="hidden" id="prioridad<?php //echo $expediente->nExpedienteId?>" value="<?php //echo $prioridad;?>"> -->
                                                    <span  id="rebote" class="label label-important" style="top: 6px;"><?php echo count($expediente->notificaciones)?></span>
                                                </a>
                                                    <?php } ?>
                                                    
                                             </td>
                                     <?php //} ?>                             
                               
                                   
                                    <td style="width: 280px;text-align: center;"><?php echo $expediente->nExpedienteCodigo; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteFechaRegistro; ?></td>
                                    <td style="width: 50px;text-align: center;"><?php echo $expediente->cTipexpedienteDescripcion; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->cExpedienteSumilla; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $expediente->solicitante; ?></td>
                                   
                                   
                                    <td style="width: 380px;text-align: center;font-weight: bold;">
                                        <?php if($expediente->cExpedienteEstado!=''){ ?>                                        
                                        <a class="pover btn" style="border: none; background-image: none;" 
                                                data-placement="top" data-title="Expediente: <?php echo $expediente->nExpedienteCodigo; ?>" data-content="
                                                   <table>
                                                    <tr>
                                                        <td class='controls'>
                                                         
                                                           <h4><b>Observacion: <?php echo $expediente->cExpedienteObservacion ?></b></h4><br>
                                                                                                      
                                                        </td> 
                                                                
                                                      </tr>

                                                      </table>"> 
                                           <span><?php echo $expediente->cExpedienteEstado; ?></span>   
                                        </a>
                                        <?php  } ?>
                                    </td>
                                 
                                    <?php //if($expediente->nEstadoProveido==3){ ?>
                                        <td style="width: 380px;text-align: center;">
                                          <!-- <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/procesar3.png" width="20" height="20" onclick="verDetalle(<?php //echo $expediente->nExpedienteId;?>)"> -->
                                           <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/derivar.png" width="20" height="20" onclick="verDetalle(<?php echo $expediente->nExpedienteId;?>)">
                                              <?php if($expediente->notificaciones!=null){ ?>
                                               
                                             <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/eliminar.png" width="20" height="20" onclick="darBajaNotificacion(<?php echo $expediente->nExpedienteId;?>)">
                                                <?php } ?>  
                                            <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/pdf-icon.png" width="20" height="20" onclick="abrirpdf('<?php echo $expediente->multimedia?>')">
                                        
                                        </td>
                                         
                                    <?php// }else { ?>
                                       <!-- <td style="width: 380px;text-align: center;">
                                            <?php// if($expediente->cExpedienteEstado=='Observado'){ ?>
                                              <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/devolver.png" width="20" height="20" onclick="enviarMesaPartes(<?php echo $expediente->nExpedienteId;?>)">
                                            <?php //} ?>
                                             <img id="img" style="text-align: center; cursor: pointer;" src="../uploads/pdf-icon.png" width="20" height="20" onclick="abrirpdf('<?php echo  $expediente->multimedia;?>')">
                                       
                                        </td> -->
                                     <?php// } ?>                             
                                </tr>
                              
                                
                    <?php } ?>
                </tbody>
            </table> 
            <br><br>
             <div id="div_detalle" class="panel panel-info" style="display:none" >
                <div class="panel-heading">
                    <h3 class="panel-title">Derivar de Expediente <span onclick="ocultar('#div_detalle')" style="float: right; cursor: pointer;" aria-hidden="true"><b>X</b></span></h3>
                    
                </div>
                <div id="detalle_exp" class="panel-body">
                      
                </div>
             </div>
            
            <!--
              <table>
                <tr>
                  <td style="padding-right:  1em;"><div style=" width: 50px; height: 20px; background-color:#FF7F50"></div><p> V°B° Directivo </p></td>
                   <td style="padding-right:  1em;"><div style="width: 50px; height: 20px; background-color:#90EE90"></div><p> Proceder a derivación</p> </td>
                 </tr>
              </table> -->
                                            
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion!!</h4>No existen expedientes recibidos</div>";
        }
        ?>
    
            
            
    </div> 
    
   
   
</div>
