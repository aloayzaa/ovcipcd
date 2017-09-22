<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        MostrarfechaActual("txt_upd_cur_fecha_inicio","NA");
        var dataTable = {
            tabla: "ListadoDiplomas",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
        $("#checktodo1").on("click",checar1);
        $("#conModulos").on("click",ocultar_modulos);
        $("#generar1").on("click",generacion);
        $("#generarDocente").on("click",generarDocente);
     
        $("#verCertificados").on("click",verCertificados);
        $("#verDiplomas").on("click",verDiplomas);
         
  
    });
    function generarDocente(){
       var organizadopor=$("#organizadopor").val();
       var diplomado=$("#cbo_diplomado").val();
        var grado=$("#grado").val();
       
       var data={organizadopor:organizadopor,diplomado:diplomado,grado:grado};
       $.ajax({
                data:  data,
                url:   'iepi/generarDiplomaDocente/',
                type:  'post',
                beforeSend: function () {
                   // $("#preload_dip").html("Procesando Espere Por favor....");
                     msgLoading("#preload_doc");
                },
                success:  function (response) {
                    $("#preload_doc").html("");
                     var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+response+'.pdf');
                    win.focus();  
                  },
                error:function(){
                     mensaje("Se ah generado un error al generar certificado!","r");
                }
             });
    }
    function verCertificados(){
         var fecha = new Date();
         var anio = fecha.getFullYear(); 
                 
         var  modulos=$("#cbo_modulos").val();
         
         var diplomado=$("#cbo_diplomado").val();
         var pdf='IEPI-'+anio+"_G-"+diplomado+'-'+modulos;
         
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+pdf+'.pdf','_blank');
         win.focus();
       
    }
    function verDiplomas(){
            var fecha = new Date();
         var anio = fecha.getFullYear();  
 
         var diplomado=$("#cbo_diplomado").val();
         var pdfant='IEPI-'+anio+'_G-'+diplomado+'Dipant';
         var pdfpos='IEPI-'+anio+'_G-'+diplomado+'Dippos';
        
        
        
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+pdfant+'.pdf','_blank');
         win.focus();
         var win1 = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+pdfpos+'.pdf','_blank');
         win1.focus();
        
    }
     function ocultar_modulos(){
          if($("#conModulos").is(':checked')) {
              //$("#modulos").show(); 
              $("#modulos").fadeIn(); 
        } 
	 else {  
             $("#modulos").fadeOut();
	} 
     }
     function checar1(){
        if($("#checktodo1").is(':checked')) {
              $('input[name="order[]"]').prop("checked", "checked"); 
   
        } 
	 else { 
     
             $('input[name="order[]"]').prop("checked", "");
	}  
    }
    function generacionModulos(){
         var organizadopor=$("#organizadopor").val();
        
        
        var checkboxValues = "";
	$('input[name="order[]"]:checked').each(function() {
        var input=$(this).val();
              checkboxValues += $(this).val() + ",";
        });
         var  modulos=$("#cbo_modulos").val();
         var fechainicio=$("#fechainicio").val();
         var fechafin=$("#fechafin").val();
         var horas=$("#horas").val();
        // var tipo=$("#tipoCertificado").val().
        var data={organizadopor:organizadopor,inscripcion:checkboxValues,modulo:modulos,fechainicio:fechainicio,fechafin:fechafin,horas:horas};
    
        
        if(checkboxValues!=""){
            $.ajax({
                data:  data,
                url:   'iepi/generarCertificadoModulo/',
                type:  'post',
                beforeSend: function () {
                    //$("#preload_dip").html("Procesando Espere Por favor....");
                      msgLoading("#preload_dip");
                },
                success:  function (response) {
                    $("#preload_dip").html("");
                    if(response.trim()==1){
                        mensaje("Certificados generados correctamente!","e");
                         $('input[name="order[]"]:checked').attr('checked', false);
                          $('#checktodo1').attr('checked', false);
                    }
                    else{
                      mensaje("Se ah generado un error al generar certificado!","r");
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
    function generacionDiplomas(){
              
   	var checkboxValues = "";
	$('input[name="order[]"]:checked').each(function() {
        var input=$(this).val();
              checkboxValues += $(this).val() + ",";
        });
         var  diplomado=$("#cbo_diplomado").val();
          var organizadopor=$("#organizadopor").val();
            
    
        if(checkboxValues!=""){
            var data={curso:diplomado,organizadopor:organizadopor,inscripcion:checkboxValues}; 
            $.ajax({
                data:  data,
                url:   'iepi/generarCertificadoCur/',
                type:  'post',
                beforeSend: function () {
                   // $("#preload_dip").html("Procesando Espere Por favor....");
                     msgLoading("#preload_dip");
                },
                success:  function (response) {
                    $("#preload_dip").html("");
                   
                         if(response.trim()==1){
                             mensaje("Certificados generados correctamente!","e");
                            $('input[name="orderBox[]"]:checked').attr('checked', false);
                            $('#checktodo').attr('checked', false);
                         }
                         else{
                          mensaje("Se ah generado un error al generar certificado!","r");
                          // get_page('certificados/load_listar_view_certificados/'+curso,'div_qry');
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
    function generacion() {
         
        if($("#conModulos").is(':checked')&&$("#diplomas").is(':checked')){
            alert("Seleccione solo un modo de generacion");
        } 
        else if($("#conModulos").is(':checked')) {
              generacionModulos();
        } 
	 else if($("#diplomas").is(':checked')){  
             generacionDiplomas();
	} 
        else {
             alert("Seleccione un modo de generacion");
        }
    }
      
    
    function InscripcionDel(nPerId){
        
        var agree=confirm("Desea Eliminar el modulo? ");
         var  curso=$("#cbo_evento").val();
        if (agree){
         $.ajax({
                type: "POST",
                url: "iepi/InscripcionDel/"+curso+"/"+nPerId,
                data: "",
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha eliminado el registro correctamente!","e");
                        get_page('iepi/listar_inscripciones/' + $("#cbo_evento").val(), 'c_qry_inscripcion');
                    }else{
                        mensaje("Error Inesperando eliminando el registro!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando eliminando el registro!, vuelva a intentarlo");                        ;
                }
            });       
       }
    }
       function editarNotasDip(event,obj,nPerId){
       var  curso=$("#cbo_evento").val();
       if(event.keyCode == 13){
           var data={nPerId:nPerId,curso:curso,nota:obj.value};
          $.ajax({
                type: "POST",
                url: "iepi/notasUpd/",
                data: data,
                success: function(msg){
                    //console.log(msg);
                    if(msg.trim()==1){
                        mensaje("se ha modificado la nota correctamente!","e");
                      //  get_page('iepi/listar_inscripciones/' + $("#cbo_evento").val(), 'c_qry_inscripcion');
                    }else{
                        mensaje("Error Inesperando eliminando el registro!, vuelva a intentarlo.","r");
                    }
                },
                error: function(msg){
                    mensaje("r","Error Inesperando eliminando el registro!, vuelva a intentarlo");                        ;
                }
            }); 
       }

              
    }
</script>
<div id="inscripciones_actuales">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($evento > 0) { ?>
             <div align="left">
                   <select id="grado" style="width: 80px">
                       <option value="Ing.">Ing.</option>
                       <option value="Dr.">Dr.</option>
                       <option value="Lic.">Lic.</option>
                       <option value="PhD.">PhD.</option>
                       <option value="CPC.">CPC.</option>
                   </select>
                <button class="btn btn-primary" id="generarDocente">Generar Docente</button>
                <div id="preload_doc"></div>
             </div>
              <div id="configuracion_certificado">
                    <label> <input id="conModulos" type="checkbox"> Generar Certificados de los modulos </label>
                    <div id="modulos" style="display:none">
                        <select id="cbo_modulos">
                         <?php foreach ($modulos as $modulo) { ?>
                            <option value="<?php echo $modulo->nConDipId ?>"><?php echo $modulo->cConDipTitulo?></option>
                        
                         <?php } ?>
                        </select>
                        <div class="control-group">
                            <label id="label" class="control-label">Fecha Inicio: </label>
                            <div class = "controls">
                                <input type="text" name="fechainicio" id="fechainicio"  data-original-title="Fecha Inicio"> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="label" class="control-label">Fecha Fin: </label>
                            <div class = "controls">
                                <input type="text" name="fechafin" id="fechafin"  data-original-title="Fecha Fin"> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label id="label" class="control-label">Horas </label>
                            <div class = "controls">
                                <input type="text" name="horas" id="horas" data-original-title="Horas"> 
                            </div>
                        </div>
                        
                    </div>
                    <label> <input id="diplomas" type="checkbox"> Generar Diplomas </label>

              </div>  
              <br>
              <div align="left">
                <button class="btn btn-primary" id="generar1">Generar</button>
                <div id="preload_dip"></div>
             </div>
              
             <div class="control-group">
                <label class="control-label" for="txt_organizado_por">Organizado por: </label>
                <div class="controls">
                   <input type='text' id='organizadopor'/> 

                </div>
             </div>
              
             
             <div align="right">
                 <button class="btn btn-success" id="verCertificados">Ver Certificados</button>
                 <button class="btn btn-warning" id="verDiplomas">Ver Diplomas</button>
             </div>
       
            <table id="ListadoDiplomas"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="checktodo1" type="checkbox" /></th>
                        <th>Codigo</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Nota</th>
                        <th>Opciones</th>
                      
                    </tr>
                </thead>
                <tbody> 
                    
                       <?php foreach ($evento as $evento) { ?>
                             <?php if($evento['emisionCertificado']==2)  { ?>
                                     <tr style="background-color:#FF7F50">
                                       <td style="width: auto;text-align: center;"> <input id="check" name="orderBox1[]" value=<?php echo $evento ["nPerId"]?> type="checkbox" disabled /></td>
                                      
                                 <?php }else{ ?>
                                      <tr style="background-color:#90EE90">  
                                        <td style="width: auto;text-align: center;"> <input id="check" name="order[]" value=<?php echo $evento ["nPerId"]?> type="checkbox" /></td>
                                      
                                         
                                 <?php }?> 
                                                  
                                <td style="width: auto;text-align: center;"><?php echo $evento ["nPerId"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $evento ["dni"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $evento ["Nombre"]; ?></td>
                           <td style="width: auto;text-align: center;"><?php echo '<input onKeyDown="editarNotasDip(event,this,'.$evento ["nPerId"].')" style="width:35px" type="text" value='.$evento ["nIepiNota"].'>' ?></td>
                                <td style="width: auto;text-align: center;cursor: pointer;"> <img src="../uploads/campus_virtual/eliminar.png" width="15" height="15" onclick="InscripcionDel(<?php echo  $evento ["nPerId"]; ?>);" style="padding: 10px;"> </td>
                                   
                            </tr>
                            
                            
                        <?php } ?>
                </tbody>
            </table>
          <?php } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion1!!</h4>No Existen Inscripciones para dicho evento.. </div>";
        }
        ?>

    </div>  
</div>