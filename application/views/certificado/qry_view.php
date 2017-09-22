<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoInscripcion",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
        $("#generar").on("click",generarCertificado);
        $("#checktodo").on("click",checar);
        $("#verasistidos").on("click",abrirAsistidos);
        $("#veraprobadosA").on("click",abrirAprobadosA);
        $("#veraprobadosP").on("click",abrirAprobadosP);
               
    });
    function abrirAsistidos(){
        var fecha = new Date();
        var anio = fecha.getFullYear();  
        var nCurId=$("#cbo_curso_listar").val();
         
        var pdf='INFOCIP-'+anio+'_G-'+nCurId+"-As";
         var horario=$("#cbo_horario_listar").val();
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+pdf+'.pdf','_blank');
         win.focus();
    }
    function abrirAprobadosA(){
          var fecha = new Date();
        var anio = fecha.getFullYear();  
        var nCurId=$("#cbo_curso_listar").val();
        var pdf='INFOCIP-'+anio+'_G-'+nCurId+"-ApAnt";
        
         var horario=$("#cbo_horario_listar").val();
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+pdf+'.pdf','_blank');
         win.focus();
    }    
    
    function abrirAprobadosP(horario){
        
          var fecha = new Date();
          var anio = fecha.getFullYear();  
          var nCurId=$("#cbo_curso_listar").val();
          var pdf='INFOCIP-'+anio+'_G-'+nCurId+"-ApPos";
        
         var horario=$("#cbo_horario_listar").val();
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+pdf+'.pdf','_blank');
         win.focus();
    }
  /*  function ver(){
        var idevento = $("#cbo_evento").val();
        window.open('busqueda/exportar/'+idevento,'_blank');
    }*/
    function checar(){
        
        if($("#checktodo").is(':checked')) {
              $('input[name="orderBox[]"]').prop("checked", "checked"); 
        } 
	 else {  
             $('input[name="orderBox[]"]').prop("checked", "");
	}  
    }
    function generarCertificado() {
        // estoy modificando aquiiii .......... 
	var checkboxValues = "";
	$('input[name="orderBox[]"]:checked').each(function() {
          var input=$(this).val();
          checkboxValues += $(this).val() + ",";
        });
        var horario=$("#cbo_horario_listar").val();
    
        if(checkboxValues!=""){
            var data={inscripcion:checkboxValues,horario:horario};
            
            $.ajax({
                data:  data,
                url:   'certificados/generarCertificado/',
                type:  'post',
                beforeSend: function () {
                    //$("#preload").html("Procesando Espere Por favor....");
                      msgLoading("#preload");
                },
                success:  function (response) {
                    $("#preload").html("");
                        if(response.trim()==1){
                           
                             mensaje("Certificados generados correctamente!","e");
                             $('input[name="orderBox[]"]:checked').attr('checked', false);
                          get_page('certificados/load_listar_view_certificados/'+horario,'div_qry');
                         }
                         else{
                            mensaje("Se ah generado un error al generar certificado!","r");
                          
                       //$("#prueba2").html(response);
                         }
                },
                error:function(){
                     mensaje("Se ah generado un error al generar certificado!","r");
                }
             });
        }
        else {
            alert("Seleccione al menos un registro");
        }
        
        
    }
</script>

<div id="inscripciones_actuales">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($matriculas > 0) { ?>
             <div>
                <button class="btn btn-primary" id="generar">Generar Certificados</button>
                <div id="preload"></div>
             </div>
             <div style="margin-top: -2em;" align="right">
                 <button class="btn btn-success" id="verasistidos">Ver Asistidos</button>
                 <button class="btn btn-warning" id="veraprobadosA">Ver Aprobado Anterior</button>
                 <button class="btn btn-info" id="veraprobadosP">Ver Aprobado Posterior</button>
             </div>
            <table id="ListadoInscripcion"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="checktodo" type="checkbox" /></th>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Monto a Pagar</th>
                        <th>Monto Pagado</th>
                        <th>Nota</th>
                        <th>Estado</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($matriculas as $matriculas) { ?>
                        
                            <?php if (($matriculas["montopagado"] >= $matriculas["Montoapagar"])&&($matriculas["Promedio"]>=10.5)){ ?>
                                 <?php if($matriculas['emisionCertificado']==4)  { ?>
                                     <tr style="background-color:#FF7F50">
                                       <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $matriculas ["nPerId"]?> type="checkbox" disabled /></td>
                                      
                                 <?php }else{ ?>
                                      <tr style="background-color:#90EE90">  
                                        <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox[]" value=<?php echo $matriculas ["nPerId"]?> type="checkbox" /></td>
                                      
                                         
                                 <?php }?>        
                                
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["nPerId"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Nombre"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Montoapagar"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["montopagado"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><?php echo $matriculas ["Promedio"]; ?></td>
                                    <td style="width: 380px;text-align: center;"><strong>Habil</strong></td>

                                </tr>

                            <?php } else { ?>
                                <tr style="background-color:#CD5C5C">    
                                    <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $matriculas ["nPerId"]?> type="checkbox" disabled /></td>
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
              <br> 
              <table>
                  <tr>
                      <td style="padding-right:  1em;"><div style=" width: 50px; height: 20px; background-color:#FF7F50"></div><p> Generacion Maxima </p></td>
                      <td style="padding-right:  1em;"><div style="width: 50px; height: 20px; background-color:#CD5C5C"></div><p> No se puede realizar Generacion</p> </td>
                      <td style="padding-right:  1em;"><div style="width: 50px; height: 20px; background-color:#90EE90"></div><p> Generacion Habilitada </p></td>
                  </tr>
              </table>
                    
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Importante!!</h4>No Existen matriculas para emisión de certificados.. </div>";
        }
        ?>

    </div>  
   
</div>