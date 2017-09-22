<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <style type="text/css">
        body {
             
        margin-right: -3em;
        margin-left: 0px;
        margin-top: 0px;
       
       // border:1px solid red;
        color: black;
        position:absolute; 
         margin-bottom:-20px;
        }
       #diplomanombre{
            font-size: 26px;
            font-style: 'Bookman Old Style';
            text-align: center;
            margin-left: 2em;
            margin-top: 0em;
            width: 80%;
        }
         #contenido_diplomado{
            font-size: 28px;
            text-align: center;
            font-weight: bold;
        }
        #diploma{
            font-size: 30px;
            margin-top:0.5em;
             font-style: 'Bookman Old Style';
          //  font-family: "Arial Black",Gadget,sans-serif;
            text-align: center;
            
        }
       
        #otorgado{
                text-align: center;
                font-weight: bold;
                font-style: italic;
                font-size: 24px;
                margin: 0;

         }
         #contenido{
            // margin-left: 100px;
            text-align: justify;
            font-size: 19px;
            line-height: 1.5em;

         }
         #fecha{
             font-size:16px;
            text-align: right; 
         }
         #nombres{
             margin:0;
             padding: 0;
             font-size:12px;
             position:absolute;
             top:56em;
             left:50em;
         }
          #nombres1{
           
             margin:0;
             padding: 0;
             font-size:12px;
             position:absolute;
             top:56em;
             left:70em;
         }
         #cargos{
             position:absolute;
             top: 57em;
             left:50em;
             text-align: center;
             padding: 0;
             font-size:12px;
         }
         #diplomado_derecha{
           //  border:1px solid black;
           //  margin-left: 8.8em;
             margin-left: 9.8em;
             width: 40%;
         }
         #diplomado_izquierda{
          //      border:1px solid green;
             width: 50%;
             margin-left: -4.5em;
            
         }
         #diplomado_derecha,#diplomado_izquierda{
             display:inline-block;
         }
         .modulo{
           
             padding-left: 4em;
              font-size:18px;
              font-weight: bold;
              bottom: -1em;
         }
         #div_imagen{
            // position:absolute;
            // top:41.5em;
            // right: 8.5em;
         }
        
         .nombre_modulo{
             margin-left: 5em;
             margin-right: 3em;
             font-size: 17px;
         }
      </style>
</head>
<?php  $i=0;foreach ($listado as $certificado) {   ?>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
     <center><p style="font-size:16px"><strong>PARTICIPANTE: <?php echo $certificado['nombres'][$i]; ?></strong></p></center> 
      <br>
      <br>

      <p style="width:50%;margin: 0 auto;  text-align:center;font-weight: bold; font-size:16px"><?php echo  $certificado['nombre_curso'][$i];?> </p>
          <br> <br>      
       <table border="1" style="margin: 0 auto;">
           <tr >
               <td >
                   <center><p style="padding-right:1em;padding-left:1em;text-align: center;font-weight: bold; font-size:16px"> Promedio Final </p> </center>
               </td>
               <td  >
                   <center><p style="padding-right:2em;padding-left:2em;font-weight: bold; font-size:16px"> <?php echo $certificado['promedio'][$i]; ?><p></center>
               </td>
           </tr>
      </table>
  

</body>
<?php $i++; } ?>
</html>
