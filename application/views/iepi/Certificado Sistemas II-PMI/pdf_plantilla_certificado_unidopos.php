<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body {
        margin-top:-10px;
        margin-right: 50px;
        margin-left: 50px;
        margin-bottom: -100px;  
        color: black;
          position:absolute; 
        }
                
                
        </style>
</head>
 <?php 
       $i=0;
       foreach ($listado as $certificado) {   ?>
<body>
     <?php if($i>=1){  
            echo    '<br><br>';
            }
            else {
               echo '<br>'; 
            }
             ?>
      <center><p style="font-size:18px"><strong>PARTICIPANTE:</strong> Ing. <?php echo $certificado['nombres'][$i]; ?></p></center> 
      <br>
      <br>
      
      <p style="width:60%;margin: 0 auto;  text-align:center;font-weight: bold; font-size:20px"><?php echo $certificado['nombre_curso'][$i];?> </p>
          <br>  <br>   
            <!--<br>-->       
       <table border="1" style="margin: 0 auto;">
           <tr >
               <td >
                   <center><p style="padding-right:1em;padding-left:1em;text-align: center;font-weight: bold; font-size:17px"> Promedio Final </p> </center>
               </td>
               <td  >
                   <center><p style="padding-right:2em;padding-left:2em;font-weight: bold; font-size:16px"> <?php echo $certificado['promedio'][$i]; ?><p></center>
               </td>
           </tr>
      </table>
        <br>
          <center><p style="font-size:18px;"><strong>CONTENIDO</strong></p></center> 
                <!--<br>-->    
       <table border="1" style="margin: 0 auto;">
           <tr >
               <td >
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;">  <b>Sesión 1:</b> Marco de Referencia para la Dirección de Proyectos.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 2:</b> Gestión de Integración.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 3:</b> Gestión del Alcance.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 4:</b> Gestión del Tiempo.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 5:</b> Gestión del Costo.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 6:</b> Gestión de Riesgos.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 7:</b> Gestión de Comunicaciones - Gestión de Recursos Humanos.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 8:</b> Gestión de Calidad - Gestión de Adquisiciones.  </p> </center>
                   <center><p style="text-align:center;font-size:15px;margin: 4 auto;"> <b>Sesión 9:</b> Gestión de Interesados - Lineamientos para las Certificaciones CAPM/PMP.  </p> </center>
               </td>
           </tr>
      </table>
      <br>
      <br>
         
      <div id="div_imagen">   
    
        <center>
           <img  width="130" height="130" src="<?php echo './uploads/certificados/qr/iepi/'.$certificado['qr'][$i].".png";  ?>" />
          </center>
      </div>
      
           

</body>
   <?php $i++; } ?>   

</html>
