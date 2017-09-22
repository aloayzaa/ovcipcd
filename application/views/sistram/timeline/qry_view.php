<link href="<?php echo URL_TIMELINE; ?>font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_TIMELINE; ?>animate.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_TIMELINE; ?>estilo_timeline.css" rel="stylesheet" type="text/css"/>

<script>
    function exportar(){
        var codigo=$("#txt_codigoexpediente").val();
        var data={codigo:codigo};
        msgLoading("#preload");
        $.ajax({
            data:  data,
            url:   "timeline/exportar_pdf",
            type:  'POST',
            
            success:  function (response) {
                $("#preload").html("");
             window.open('http://localhost/ovcipcdll/uploads/sistram/reporte/'+response,'_blank')                
 
            },
            error: function(msg){                
                    mensaje("r","Error!, vuelva a intentarlo");  

            }
            
       });
    }
    
    
</script>  
<style>
  .h1,.h2,.h3,.h4,.h5,.h6{
        font-family:inherit;
        font-weight:500;
        line-height:1.1;
        color:inherit;
       margin: 10px 0;
  font-family: 'Open Sans';
  font-weight: 300;
  color: #505458;
  
  }
    
    .h1,.h2,.h3,.h4,.h5,.h6{
  margin: 10px 0;
  font-family: 'Open Sans';
  font-weight: 300;
  color: #505458;
}

.cbp_tmlabel{
    width: 65%;
    right: 29px;
}
/*estilo para cerca de*/
.m-b-5 {
  margin-bottom: 5px;
}
.inline {
  display: inline-block !important;
}
.muted {
  color: #b6bfc5;
}
/*estilo para nombre de area*/
.text-success {
  color: #0aa699 !important;
}
.semi-bold {
  font-weight: 600;
}
.h4 {
  font-size: 18px;
}
.h3 {
  font-size: 24px;
font-family: 'Open Sans';
        line-height: 30px;
}
   


</style>
<div>
<button style="margin-left:500px;margin-bottom: 9px;" onclick="exportar()"  name="btn_exportar" type="button" id="btn_exportar" class="btn btn-primary" >Exportar</button>       
<div style="margin-left:400px;margin-bottom: 9px;" id="preload"></div>   
</div>

 <?php  $var="";if (count($directivo) > 0) {
            ?>

<!-- BEGIN CONTAINER -->
 <!-- BEGIN PAGE CONTAINER-->
  <div  style="min-height: 0px ;height:  100%" class="page-content1">
    
    <div style="background: #e5e9ec;" >
        
      <div class="row">
       
          <ul class="cbp_tmtimeline" style="margin-left: 25px;">
                   
            <?php if($movimientos>0){
                 $i=0; foreach ($movimientos as $movimiento){ ?>
                    <li> 
                    <?php $i++;if($i==1){
                            $fecha_envio=$movimiento->dMovimientoFechaRecepcion;
                            }
                          
                            if($movimiento->dMovimientoFechaAtencion!=NULL){
                                $fecha_movimiento= $movimiento->dMovimientoFechaAtencion;
                        
                            }
                            else {
                           
                                $fecha_movimiento= $movimiento->dMovimientoFechaRecepcion;
                        
                            }
                            
                            $date = date_create($fecha_movimiento);
                          $segundos=strtotime(date_format($date,'Y-m-d'))- strtotime(date("Y-m-d"));
                          $diferencia_dias=intval($segundos/60/60/24);
                          $diferencia_dias=abs($diferencia_dias);
                          $diferencia_dias=round($diferencia_dias,0);

                            ?>
                        <time class="cbp_tmtime" datetime="2013-04-10 18:30">

                          <span class="date">
                              <?php 
                                  if($diferencia_dias<=0){
                                      echo "Hoy";
                                  }else if($diferencia_dias==1){
                                      echo "Ayer";
                                  } 
                                  else if($diferencia_dias==7) {
                                      echo "Hace una semana atras";
                                  }
                                  else if($diferencia_dias==14) {
                                      echo "Hace dos semana atras";
                                  }
                                  else if($diferencia_dias==21) {
                                      echo "Hace tres semana atras";
                                  }
                                   else if($diferencia_dias==28) {
                                      echo "Hace cuatro semana atras";
                                  }
                                  else {
                                      echo "Hace ".$diferencia_dias." dias atras";
                                  }
                                
                                  ?> 
                          </span>
                          <span class="time semi-bold"><?php echo substr($fecha_movimiento,11,5)?></span>
                        </time>
                          <?php 
                                 $estilo="success"; 
                                    $icono="fa fa-check-circle";
                          
                                 if($movimiento->cMovimientoEstado=='Procesado'){
                                  $estilo="success"; 
                                    $icono="fa fa-check-circle";
                                }
                                 else if($movimiento->cMovimientoEstado=='En Tramite'){
                                  $estilo="info";  
                                    $icono="fa fa-ban";
                                }
                          ?>
                        <div class="cbp_tmicon <?php echo $estilo?> animated bounceIn"> <i class="<?php echo $icono;?>"></i> </div>
                        <div class="cbp_tmlabel">
                          <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                           <h4 class="inline muted semi-bold m-b-5">El expediente se encuentra en </h4> <h4 class="h4 inline m-b-5"><span class="text-success semi-bold"><?php echo $movimiento->receptor?></span> </h4>
                             
                            <div class="muted"><?php echo $fecha_movimiento?></div>
                            <div class="m-t-5 dark-text">
                            <h3 class="h3" > <span class="semi-bold"><?php echo $movimiento->cMovimientoEstado;?></span> </h3>
                                 <p class="m-t-5 dark-text"><?php echo $movimiento->cMovimientoResumen;?> </p>
                            </div>
                          </div>
                          <div class="clearfix"></div>

                        </div>
                      </li>
            
                      
                 <?php } ?>
                      
                        

            <?php } ?>          
           
            <!-- Expediente esta en proceso de derivación o en directivo o administrador-->
               <?php if($directivo->nEstadoProveido>0){ ?>
            <li> 
                
                  <?php 
                $segundos=strtotime($directivo->fecha)- strtotime(date("Y-m-d"));
                $diferencia_dias=intval($segundos/60/60/24);
                $diferencia_dias=abs($diferencia_dias);
                $diferencia_dias=round($diferencia_dias,0);

                  ?>
              <time class="cbp_tmtime" datetime="2013-04-10 18:30">
                
                <span class="date">
                    <?php 
                        if($directivo->cExpedienteEstado!=''){
                        
                        if($diferencia_dias<=0){
                            echo "Hoy";
                        }else if($diferencia_dias==1){
                            echo "Ayer";
                        } 
                        else if($diferencia_dias==7) {
                            echo "Hace una semana atras";
                        }
                        else if($diferencia_dias==14) {
                            echo "Hace dos semana atras";
                        }
                        else if($diferencia_dias==21) {
                            echo "Hace tres semana atras";
                        }
                         else if($diferencia_dias==28) {
                            echo "Hace cuatro semana atras";
                        }
                        else {
                            echo "Hace ".$diferencia_dias." dias atras";
                        }
                       }
                        ?> 
                </span>
                <span class="time semi-bold"><?php echo substr($directivo->tiempo,0,-3)?></span>
              </time>
                <?php if($directivo->cExpedienteEstado=='Observado'){
                        $estilo="warning";
                        $icono="fa fa-exclamation-triangle";
                
                      }
                      else if($directivo->cExpedienteEstado=='Rechazado'){
                        $estilo="danger";  
                        $icono="fa fa-times-circle";
                      }
                      else if($directivo->cExpedienteEstado=='Habilitado'){
                        $estilo="success"; 
                          $icono="fa fa-check-circle";
                      }
                       else if($directivo->cExpedienteEstado==''){
                        $estilo="info";  
                          $icono="fa fa-ban";
                      }
                ?>
              <div class="cbp_tmicon <?php echo $estilo?> animated bounceIn"> <i class="<?php echo $icono;?>"></i> </div>
              <div class="cbp_tmlabel">
                <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                 <h4 class="h4 inline m-b-5"><span class="text-success semi-bold">V°B° <?php if($directivo->nEstadoProveido==1){echo "Directivo";}else {echo "Administrador";}?></span> </h4>
                
                  <div class="muted"><?php echo $directivo->cFechaCambio;?></div>
                  <div class="m-t-5 dark-text">
                  <h3 class="h3" > <span class="semi-bold"><?php if($directivo->cExpedienteEstado== ''){echo "No Procesado";}else {echo $directivo->cExpedienteEstado;}?></span> </h3>
                       <p class="m-t-5 dark-text"><?php echo $directivo->cExpedienteObservacion;?> </p>
                  </div>
                </div>
                <div class="clearfix"></div>
               
              </div>
            </li>
               <?php } ?>
            <!-- Expediente Registrado en Mesa de Partes -->
            <li> 
                  <?php 
                $date = date_create($directivo->cExpedienteFechaRegistro);
                $segundos=strtotime(date_format($date,'Y-m-d'))- strtotime(date("Y-m-d"));
                $diferencia_dias=intval($segundos/60/60/24);
                $diferencia_dias=abs($diferencia_dias);
                $diferencia_dias=round($diferencia_dias,0);

                  ?>
              <time class="cbp_tmtime" datetime="2013-04-10 18:30">
                
                <span class="date">
                    <?php
                  
                     
                        if($diferencia_dias<=0){
                            echo "Hoy";
                        }else if($diferencia_dias==1){
                            echo "Ayer";
                        } 
                        else if($diferencia_dias==7) {
                            echo "Hace una semana atras";
                        }
                        else if($diferencia_dias==14) {
                            echo "Hace dos semana atras";
                        }
                        else if($diferencia_dias==21) {
                            echo "Hace tres semana atras";
                        }
                         else if($diferencia_dias==28) {
                            echo "Hace cuatro semana atras";
                        }
                        else {
                            echo "Hace ".$diferencia_dias." dias atras";
                        }
                    
                        
                        ?> 
                </span>
                <span class="time semi-bold"><?php echo substr($directivo->cExpedienteFechaRegistro,11,5)?></span>
              </time>
               
              <div class="cbp_tmicon success animated bounceIn"> <i style="font-size:20px;" class="fa fa-archive"></i> </div>
              <div class="cbp_tmlabel">
                <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                    <h4 class="inline muted semi-bold m-b-5">El Expediente se encuentra en,&nbsp;  </h4><h4 class="h4 inline m-b-5"><span class="text-success semi-bold"> Mesa de Partes</span> </h4>
                   
                  <div class="muted"><?php echo $directivo->cExpedienteFechaRegistro;?></div>
                  <div class="m-t-5 dark-text">
                  <h3 class="h3">
                      <span class="semi-bold"> Registrado
                      </span> 
                  </h3>
                     
                  </div>
                </div>
                <div class="clearfix"></div>
               
              </div>
            </li>
            
            
            
          </ul>
        </div>

      <!-- END PAGE -->
    </div>
  </div>
 <?php }else { ?>
    <div class='alert alert-block'><h4 class='alert-heading'>Información!</h4>No existen expediente</div>
 
  <?php }?>

<!-- END CONTAINER -->