<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
        var dataTable = {
            tabla: "ListadoInscripcion",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
        $("#checktodo").on("click",checar);
          $("#generar").on("click",generarCertificado);
           $("#verCertificados").on("click",verCertificados);
            $("#generarDocente1").on("click",generarDocente1);
  
    });
    function generarDocente1(){
       var organizadopor=$("#cursoorganizadopor").val();
       var curso=$("#cbo_evento").val();
       var grado=$("#grado1").val();
       var data={organizadopor:organizadopor,curso:curso,grado:grado};
       
       $.ajax({
                data:  data,
                url:   'iepi/generarCertificadoDocente/',
                type:  'post',
                beforeSend: function () {
                   // $("#preload_dip").html("Procesando Espere Por favor....");
                     msgLoading("#preload_doc1");
                },
                success:  function (response) {
                    $("#preload_doc1").html("");
                      mensaje("Certificados generados correctamente!","e");
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
         
         var curso=$("#cbo_evento").val();
         var pdfant='IEPI-'+anio+'_G-'+curso+'ant';
         var pdfpos='IEPI-'+anio+'_G-'+curso+'pos';;
         
        
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+pdfant+'.pdf','_blank');
         win.focus();
           var win1= window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/iepi/'+pdfpos+'.pdf','_blank'); 
           win1.focus();
       
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
         
	var checkboxValues = "";
	$('input[name="orderBox[]"]:checked').each(function() {
        var input=$(this).val();
              checkboxValues += $(this).val() + ",";
        });
         var  curso=$("#cbo_evento").val();
         var organizadopor=$("#cursoorganizadopor").val();
         
                
    
        if(checkboxValues!=""){
          var data={curso:curso,organizadopor:organizadopor,inscripcion:checkboxValues}; 
            
            $.ajax({
                data:  data,
                url:   'iepi/generarCertificadoCur/',
                type:  'post',
                beforeSend: function () {
                    //$("#preload").html("Procesando Espere Por favor....");
                    msgLoading("#preload1");
                },
                success:  function (response) {
                    $("#preload1").html("");
                   
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
     function editarNotas(event,obj,nPerId){
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
<script type="text/javascript"></script>

<div id="inscripciones_actuales">
    <br>
    <div class="form" style="width: 100%">
        <?php if ($evento > 0) { ?>
               <div align="left">
                   <select id="grado1" style="width: 80px">
                       <option value="Ing.">Ing.</option>
                       <option value="Dr.">Dr.</option>
                       <option value="Lic.">Lic.</option>
                       <option value="PhD.">PhD.</option>
                       <option value="CPC.">CPC.</option>
                   </select>
                <button class="btn btn-primary" id="generarDocente1">Generar Docente</button>
                <div id="preload_doc1"></div>
             </div>
              <br>
              <div align="left">
                <button class="btn btn-primary" id="generar">Generar Certificados</button>
                <div id="preload1"></div>
             </div>
              
             <div class="control-group">
                <label class="control-label" for="txt_organizado_por">Organizado por: </label>
                <div class="controls">
                   <input type='text' id='cursoorganizadopor'> 

                </div>
             </div>
              
              
            <div align="right">
                 <button class="btn btn-success" id="verCertificados">Ver Certificados</button>
            </div>
       <!-- <select id="tipoCertificado" >
            <option value="Alumno">Alumno</option>
            <option value="Docente">Docente</option>
        </select> -->
            <table id="ListadoInscripcion"  class="display" cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th><input id="checktodo" type="checkbox" /></th>
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
                                        <td style="width: auto;text-align: center;"> <input id="check" name="orderBox[]" value=<?php echo $evento ["nPerId"]?> type="checkbox" /></td>
                                      
                                         
                                 <?php }?> 
                                                  
                                <td style="width: auto;text-align: center;"><?php echo $evento ["nPerId"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $evento ["dni"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $evento ["Nombre"]; ?></td>
                      
  <td style="width: auto;text-align: center;"><?php echo '<input onKeyDown="editarNotas(event,this,'.$evento ["nPerId"].')" style="width:35px" type="text" value='.$evento ["nIepiNota"].'>' ?></td>
                                <td style="width: auto;text-align: center;cursor: pointer;"> <img src="../uploads/campus_virtual/eliminar.png" width="15" height="15" onclick="InscripcionDel(<?php echo  $evento ["nPerId"]; ?>);" style="padding: 10px;"> </td>
                                   
                            </tr>
                            
                            
                        <?php } ?>
                </tbody>
            </table>
          <?php } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Importante!!</h4>No Existen Matriculas para dicho curso.. </div>";
        }
        ?>

    </div>  
</div>