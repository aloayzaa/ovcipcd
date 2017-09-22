<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
      
        var dataTable = {
            tabla: "ListadoInscripcion",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable(dataTable);
        $("#generar").on("click",generarCertificado);
        $("#verCertificados").on("click",verCertificados);
        $("#checktodo").on("click",checar);
        
        
    });
    function verCertificados(){
      var fecha = new Date();
      var anio = fecha.getFullYear();    
        
      var evento=$("#cbo_evento_listar").val();
      var nombrepdf='EVE-'+anio+"_G-"+evento+".pdf";
                
      var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/eventos/'+nombrepdf,'_blank');
         win.focus();
    }
    function checar(){
        
        if($("#checktodo").is(':checked')) {
              $('input[name="orderBox[]"]').prop("checked", "checked"); 
        } 
	 else {  
             $('input[name="orderBox[]"]').prop("checked", "");
	}  
    }
    function generarCertificado() {
        var tipoevento=($("#tipoevento").val());
        var organizadopor="";
        if(tipoevento==0 || tipoevento==100 || tipoevento==101 || tipoevento==105){
       organizadopor=$("#organizadopor").val();
        }else {
                      organizadopor="";
        }
	var checkboxValues = "";
	$('input[name="orderBox[]"]:checked').each(function() {
        var input=$(this).val();
            checkboxValues += $(this).val() + ",";
        });
        var data={inscripcion:checkboxValues,organizadopor:organizadopor};
        if(checkboxValues!=""){
            $.ajax({
                data:  data,
                url:   'certificados/generarCertificado/',
                type:  'post',
                beforeSend: function () {
                    msgLoading("#preload");
                    //$("#preload").html("Procesando Espere Por favor....");
                },
                success:  function (response) {
                    $("#preload").html("");
                        if(response.trim()==0){
                             mensaje("Se ha generado un error al generar certificado!","r");
                         }
                         else{
                           mensaje("Certificados generados correctamente!","e");
                           $('input[name="orderBox[]"]:checked').attr('checked', false);
                           get_page('certificados/load_listar_view_certificados/'+$("#cbo_evento_listar").val(),'div_qry');
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
     <?php if($tipoEvento==0 || $tipoEvento==100 || $tipoEvento==101 || $tipoEvento==105){  ?>
   
        <div class="control-group">
            <table> 
                <tr><td> <label class="control-label" for="organizado por">Organizado por: </label> </td>
             
                    <td><div class="controls">
                        <input type='text' id='organizadopor' required='required' value='la Comisión del Instituto de Estudios Profesionales de Ingeniería - IEPI' /> 
                 
                        </div></td>
             </table>   
        </div>
                       
            
        <?php } ?>
    <div class="form" style="width: 100%">
       
         <input type="hidden" id="tipoevento" value="<?php echo $tipoEvento; ?>" required:required >
        
        <?php if ($evento > 0) { ?>
             <div style="width: 50%">
                <button class="btn btn-primary" id="generar">Generar Certificados</button>
             </div>
            <div style="width: 50%" id="preload"></div>
             <div style="float:right" >
                <button style="margin-top:-3em;" class="btn btn-info" id="verCertificados">Ver Certificados</button>
             </div>
             <table id="ListadoInscripcion"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="checktodo" type="checkbox" /></th>
                        <th>Codigo</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Fecha</th>
                        <th>Monto Evento</th>
                        <th>Pago</th>
                        <th>Comprobante</th>
                        <th>Tipo de Comprobante</th>
                        <th>Cuenta Ingreso</th>
                        <th>Estado</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($evento as $evento) { ?>
                        <?php if ($evento ["PAGO"] >= $evento ["monto_evento"] || $evento['ctipoCertificado']!='PAR') { ?>
                                <?php if($evento['cemisionCertificado']==4)  { ?>
                                     <tr style="background-color:#FF7F50">
                                      <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $evento["CODIGO"];?> type="checkbox" disabled /></td>
                                      
                                 <?php }else if($evento['cemisionCertificado']<4 && $evento['cemisionCertificado']>0) {?>
                                          <tr style="background-color:#FFFF99">
                                      <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox[]" value=<?php echo $evento["CODIGO"];?> type="checkbox" /></td>
                                      
                                <?php }else{ ?>
                                      <tr style="background-color:#90EE90">  
                                        <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox[]" value=<?php echo $evento["CODIGO"];?> type="checkbox" /></td>

                                 <?php }?>  
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CODIGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["DNI"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["NOMBRES"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["FECHA_DE_REGISTRO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["monto_evento"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["PAGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CUENTA_DE_INGRESO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><strong>Pagado</strong></td>
                           
                            </tr>
                            
                        <?php } else { ?>
                            <tr style="background-color:#CD5C5C" >  
                                <td style="width: 380px;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $evento ["CODIGO"]?> type="checkbox" disabled/></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CODIGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["DNI"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["NOMBRES"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["FECHA_DE_REGISTRO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["monto_evento"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["PAGO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["TIPO_DE_COMPROBANTE"]; ?></td>
                                <td style="width: 380px;text-align: center;"><?php echo $evento ["CUENTA_DE_INGRESO"]; ?></td>
                                <td style="width: 380px;text-align: center;"><strong>Pago Incompleto</strong></td>
                           
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
                                    <td style="padding-right:  1em;"><div style="width: 50px; height: 20px; background-color:#FFFF99"></div><p> Primera Gneración </p></td>
                  </tr>
              </table>
                    
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion1!!</h4>No Existen Inscripciones para dicho evento.. </div>";
        }
        ?>

    </div>  
   
</div>