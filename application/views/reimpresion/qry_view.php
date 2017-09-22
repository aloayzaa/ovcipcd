<legend>Listado de Certificados Emitidos CIP-CDLL</legend>
<script type="text/javascript">
     $(document).ready(function () {
          var dataTable = {
            tabla: "ListadoCertificados",
            ordenaPor: new Array([0, "asc"])
        };
        paginaDataTable2(dataTable);
         
      });
    function vercertificado(pdf){
 var win = window.open('http://www.cip-trujillo.org/ovcipcdll/uploads/certificados/'+pdf,'_blank');
    win.focus();   
}
</script>
 <?php  if(count($certificados) > 0){ ?>
 <table id="ListadoCertificados"  class="display" cellpadding="0" cellspacing="0" border="0">
   
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Especialidad</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                     </tr>
                </thead>
                <tbody> 
                    <?php foreach ($certificados as $certificado) { ?>
                        
                            <tr>  
                                <td style="width: auto;text-align: center;"><?php echo $certificado ["codcertificados"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $certificado ["datos"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $certificado ["cCurNombre"]; ?></td>
                                <td style="width: auto;text-align: center;"><?php echo $certificado ["fecha_emision"]; ?></td>
                                <td><img style="text-align: center; cursor: pointer;" src="../uploads/campus_virtual/ver.png" width="20" height="20" onclick="vercertificado(<?php echo "'".$certificado['pdf']."'";?>)">
                                    
                                    
                                  <!--  <button class="btn btn-primary" onclick="vercertificado(<?php //echo "'".$certificado['pdf']."'";?>)">Ver</button> </td> -->
                            </tr>
                    <?php } ?>
                </tbody>
</table>
 <?php }else { ?>
    <div class='alert alert-block'><h4 class='alert-heading'>Información</h4>No Existen Certificados generados en esas fechas</div>
 <?php }