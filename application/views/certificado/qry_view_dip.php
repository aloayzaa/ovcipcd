<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        $( "#accordion" ).accordion();
        $(".fechainicio").datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 0,
            isRTL: false,
            yearRange: '2014:2025',
            showMonthAfterYear: false,
            yearSuffix: ''
        });
          $(".fechafin").datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yy/mm/dd',
            firstDay: 0,
            isRTL: false,
            yearRange: '2014:2025',
            showMonthAfterYear: false,
            yearSuffix: ''
        });
        
        
        
        var dataTable = {
            tabla: "ListadoInscripcion",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);                       
    });
    function detalleDiplomado(nPerId){
        var horario_diplomado=$("#cbo_horario_listar_dip").val();
        set_popup("certificados/detalleDiplomado/"+nPerId+"/"+horario_diplomado,"Generacion de Diplomas",650,550,'','');
    }
    function actualizarFechas(conceptoDiplomadoId){
        
        var fechainicio=$("#fechainicio"+conceptoDiplomadoId).val();
        var fechafin=$("#fechafin"+conceptoDiplomadoId).val();
        var horas=$("#horas"+conceptoDiplomadoId).val();
        var data={fechainicio:fechainicio,fechafin:fechafin,horas:horas,modulo:conceptoDiplomadoId};
       $.ajax({
                data:  data,
                url:   'certificados/actualizarConceptoDiplomado/',//+fechainicio+'/'+fechafin+'/'+horas+'/'+conceptoDiplomadoId,
                type:  'post',
                success:  function (response) {
                  if(response.trim()==1){
                        mensaje("Se ah actualizados los campos Correctamente","e");
                           
                   } else{
                              
                      mensaje("Se ah generado un error actualizando los modulos","r");      
                                   
                    }
                },
                error:function(){
                     mensaje("Se ah generado un error actualizando los modulos","r");
                }
        
             });
        
        
    }
 </script>
<br>

<div id="inscripciones_actuales">
    <div id="accordion">
         <?php foreach ($modulos as $modulo){?>
         <h3><center> <?php echo $modulo->cConDipTitulo ?></center></h3>
        <div>
            <label style="width: auto"><?php echo $modulo->cConDipSumilla ?></label>
            <input class="fechainicio" placeholder="Fecha de Inicio" style="width: 150px" type="text" id="fechainicio<?php echo $modulo->nConDipId?>" value="<?php echo $modulo->cFechaInicio?>">
            <input class="fechafin" placeholder="Fecha Fin"style="width: 150px" type="text" id="fechafin<?php echo $modulo->nConDipId?>" value="<?php echo $modulo->cFechaFin?>">
            <input style="width: 30px" type="text" id="horas<?php echo $modulo->nConDipId?>" value="<?php echo $modulo->nHoras?>">
                        <button class="btn btn-primary" id="actualizar" onclick="actualizarFechas(<?php echo $modulo->nConDipId ?>)">Actualizar</button>  
          
        </div>
             <?php } ?>
    </div>
        
    <div class="form" style="width: 100%">
        <?php if ($matriculas > 0) { ?>
             <!-- <div>
                <button class="btn btn-primary" id="generar">Generar</button>
                <div id="preload"></div>
             </div> -->
             <br>
             <table id="ListadoInscripcion"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Monto a Pagar</th>
                        <th>Monto Pagado</th>
                        <th>Nota</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($matriculas as $matriculas) { ?>
                        
                            <?php if (($matriculas["montopagado"] >= $matriculas["Montoapagar"])&&($matriculas["Promedio"]>=10.5)){ ?>
                                 <?php if($matriculas['emisionCertificado']==4)  { ?>
                                     <tr style="background-color:#FF7F50">
                                          
                                 <?php }else{ ?>
                                      <tr style="background-color:#90EE90">  
                                      
                                         
                                 <?php }?>        
                                
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["nPerId"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Nombre"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Montoapagar"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["montopagado"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Promedio"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><strong>Habil</strong></td>
                                    <td>  <img style=" cursor: pointer;"src="../uploads/campus_virtual/ver.png" width="20" height="20" onclick="detalleDiplomado(<?php echo $matriculas ["nPerId"];?>);" style="padding: 10px;">
                                </td>
                                </tr>

                            <?php } else { ?>
                                <tr style="background-color:#CD5C5C">    
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["nPerId"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Nombre"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Montoapagar"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["montopagado"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Promedio"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><strong>No Habil</strong></td>

                                </tr>
                            <?php } ?>

                    <?php } ?>
                </tbody>
            </table>
                    
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Importante!!</h4>No Existen matriculas para emisión de diplomas.. </div>";
        }
        ?>

    </div>  
   
</div>