<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body {
        margin-top:50px;
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
            echo '<br><br>';
            }
             ?>
    <center><p style="font-size:16px"><strong>PARTICIPANTE: <?php echo $certificado['nombres'][$i]; ?></strong></p></center> 
      <br>
      <br>
     
      
      <p style="width:50%;margin: 0 auto;text-align: center;font-weight: bold; font-size:16px"><?php echo   $certificado['nombre_curso'][$i];?> </p>
      <br> 
      <p style="width:50%;margin: 0 auto;text-align: center;font-weight: bold; font-size:16px"><?php echo   $certificado['descripcion'][$i];?> </p>
      <br> 
       
      <table border="1" style="margin: 0 auto;">
           <tr >
               <td>
                   <center><p style=" padding-bottom: 0.5em;padding-right:1em;padding-left:1em;text-align: center;font-weight: bold; font-size:16px"> Promedio Final </p> </center>
               </td>
               <td>
                    <center><p style=" padding-bottom: 0.5em;padding-right:2em;padding-left:2em;font-weight: bold; font-size:16px"> <?php echo   $certificado['promedio'][$i];?>  </p></center>
               </td>
           </tr>
      </table>
        
      <br>
      <br>
         
      <div id="div_imagen">   
          <center>
            <img  width="85" height="85" src="<?php echo './uploads/certificados/qr/infocip/'.$certificado['qr'][$i].".png"; ?>" />
          </center>
      </div>
      
           

</body>
   <?php $i++; } ?>   

</html>
