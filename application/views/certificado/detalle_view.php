<script type="text/javascript">
    $(document).ready(function () {
        //$(".chzn-select").chosen();
       $("#generar2").on("click",generarCertificado2);
       /* $("#checktodo").on("click",checar);
        $("#verasistidos").on("click",abrirAsistidos);*/
        $("#verCertificados").on("click",verCertificados);
        $("#verDiploma").on("click",verDiploma);
               
    });
    function verDiploma(){
          var fecha = new Date();
        var anio = fecha.getFullYear();
        var nPerId=$("#alumnoId").val();
        var nCurId=$("#CursoId").val();
        
        var pdf='INFOCIP-'+anio+"-"+nCurId+"-"+nPerId;;
        
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+pdf+".pdf",'_blank');
         win.focus();
    }
    function verCertificados(){
         var fecha = new Date();
        var anio = fecha.getFullYear();  
        var pdf='INFOCIP-'+anio+'_G-Modulos';;
         var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/pdf/infocip/'+pdf+".pdf",'_blank');
         win.focus();
    }
    
    function generarCertificado2() {

	var alumno=$("#alumnoId").val();
        var horario=$("#horarioId").val();
        var nromodulo=$("#cbo_modulos").val();
        var data={alumno:alumno,horario:horario,nromodulo:nromodulo};
        $.ajax({
                data:  data,
                url:   'certificados/generarCertificadoDip/',
                type:  'post',
                beforeSend: function () {
                      msgLoading("#preload2");
                   
                },
                success:  function (response) {
                    $("#preload2").html("");
                   
                        if(response.trim()==1){
                              mensaje("Certificados generados correctamente!","e");
                         }
                         else{
                              mensaje("Se ah generado un error al generar certificado!","r"); 
                       //   get_page('certificados/load_listar_view_certificados/'+horario,'div_qry');
                       //$("#prueba2").html(response);
                         }
                },
                error:function(){
                     mensaje("Se ah generado un error al generar certificado!","r");
                }
        
             });
        }
</script>
<fieldset>
     <legend>Detalle de Diplomado</legend>
     <div class="control-group">
         <table border="1" bordercolor="#cacaca" >
             <tr>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><label style=" font-weight: bold;"  id="label" class="control-label">Total Sesiones: </label></td>        
                 <td>  
                    <center>  <label>  <strong><?php echo $data['nrosesiones']?> </strong> </label>  </center> 
                 </td> 
             </tr>
             <tr>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><label style=" font-weight: bold;" id="label" class="control-label">N° Asistencias: </label></td>        
                 <td>  
                   <center>    <label>  <strong><?php echo $data['nroasistencias']?> </strong> </label>   </center> 
                 </td> 
             </tr>
             <tr>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><label style=" font-weight: bold;" id="label" class="control-label">N° Faltas: </label></td>        
                 <td>  
             <center>   <label>  <strong><?php echo $data['nrofaltas']?> </strong> </label> </center> 
                 </td> 
             </tr>
             <tr>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><label style=" font-weight: bold;" id="label" class="control-label">Porcentaje de Asistencias: </label></td>        
                 <td>
                     <center>   <label>  <strong><?php echo round($data['porcentaje_asistencias'],2)."%"?> </strong> </label>  </center>  
                 </td> 
             </tr>
             <tr>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5;"><label style=" font-weight: bold;" id="label" class="control-label">Modulos: </label></td>        
                 <td style="text-align:center; padding: 10px 5px 5px 5px;">
                     <select id="cbo_modulos">
                         <?php foreach ($modulos as $modulo) { ?>
                            <option value="<?php echo $modulo->nConDipId ?>"><?php echo $modulo->cConDipTitulo?></option>
                        
                         <?php } ?>
                        </select>
                 
                 </td> 
             </tr>
             
             
         </table>
      </div>
    <div class="control-group">
         <label id="label" class="control-label">Notas </label>
         <table border="1" bordercolor="#cacaca" >
             <thead>
                 <tr>
                     <?php for($i=1;$i<=count($notas);$i++){?>
                      <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><?php echo "N".$i; ?></td>
                 
                     <?php } ?>
                      <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><strong><?php  echo "Promedio" ?></strong></td> 
                 </tr>
             </thead>
             <tbody>          
             
             <tr>
              <?php $suma=0;$i=0; foreach($notas as $notas){ ?>
                 <td style="text-align: center;"><?php $suma=$suma+$notas->cNotValor;$i++; echo $notas->cNotValor; ?></td>
                 
            <?php } ?>
                <td style="text-align: center;"><strong><?php  echo round(($suma/$i),2); ?></strong></td> 
             </tr>
             </tbody>
         </table>
    </div> 
     
    <div class="control-group">
         <label id="label" class="control-label">Asistencias </label>
         <table border="1" bordercolor="#cacaca">
             <thead>
             <tr>
              <?php foreach($asistencias as $asistencia){ ?>
                 <td style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><?php echo $asistencia->cAsiFecha ?></td>
                 
            <?php } ?>
             </tr>
             </thead>
             <tr>
              <?php foreach($asistencias as $asistencia){ ?>
                 <td style="text-align: center;"><?php echo $asistencia->cAsiValor ?></td>
                 
            <?php } ?>
             </tr>
         </table>
    </div>
     <div>     
        <button class="btn btn-primary" id="generar2">Generar</button>
        <div id="preload2"></div>
     </div>
     <br>
         
      <div align="left">     
        <button class="btn btn-info" id="verDiploma">Ver Diploma</button>
        <button class="btn btn-warning" id="verCertificados">Ver Certificados</button>
     </div>
     <input type="hidden" id="alumnoId" value="<?php echo $nPerId?>">
      <input type="hidden" id="horarioId" value="<?php echo $horario?>">
        <input type="hidden" id="CursoId" value="<?php echo $cursoId?>">
        
        <br ><br >
     
</fieldset>


    
           
             
   
