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
        #certificado{
            font-size: 38px;
            font-family: "Arial Black",Gadget,sans-serif;
            text-align: center;
            
        }
        #otorgado{
                text-align: center;
                font-weight: bold;
                font-size: 30px;
                margin: 0;
         }
         #contenido{
           // margin-left: 100px;
            text-align: justify;
            font-size: 22px;
            line-height: 1.3em;

         }
         #fecha{
             font-size:20px;
            text-align: right; 
         }
         #decano{
             text-align: center;
             font-size: 20px;
           //  margin-top: 1em;
         }
         #docente{
           //  margin-top: 1em;
             text-align: center;
             font-size: 20px;
         }
         #div_decano{
            width: 45%;
            padding-left: -2.5em;
         }
         #div_docente{
            width: 45%;
            padding-left: 10.5em;
         }
         
         #div_decano,#div_docente{
             display:inline-block;
         }
         #div_imagen{
             
         }
         
                
        </style>
</head>
 <?php 
       $i=0;
       foreach ($listado as $certificado) {   ?>
<body>
    
     <?php if($i>=1){  
            echo '<br><br><br><br><br><br><br><br><br><br><br><br>';
     //echo '<img style="position:absolute;top:555px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>';
            }
            else {
            echo '<br><br><br><br><br><br><br><br><br><br>';
                //echo '<img style="position:absolute;top:518px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>';
     
            } ?>
    <!--<br><br><br><br><br><br><br><br><br><br><br>  -->
    <p id="certificado"><strong>CERTIFICADO </strong></p>
          <p id="otorgado"> Otorgado a </p>
          
          <?php if(strlen($certificado['nombres'][$i])<=40) {?>
             <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 30px;"><strong><?php echo $certificado['nombres'][$i]; ?></strong></p> 
             <?php } else {  ?>
               <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 22px;"><strong><?php echo $certificado['nombres'][$i]; ?></strong></p> 
             <?php }  ?>
             
         
              <p id="contenido">Por haber aprobado el curso de <strong><?php echo  $certificado['nombre_curso'][$i];?></strong>, desarrollado en 
             el Centro de Capacitación <strong>info@CIP</strong> del Consejo Departamental de La Libertad del <?php echo $certificado['fecha_inicio'][$i];  ?> al 
        <?php echo $certificado['fecha_fin'][$i]; ?>, con una duración de <?php echo $certificado['horas'][$i] ?> horas.
        
        </p>
         
        <p id="fecha">Trujillo, <?php echo $fechahoy?></p>
         <br>
         <br>

            <div id="div_decano" > 
                <p id="decano">Ing. LUIS MESONES ODAR<br>Decano</p>
            </div>  
            <div id="div_docente">
                <p id="docente" >Ing. <?php echo $certificado['docente_curso'][$i]; ?><br>Docente</p>
            </div>   
  
 
      
           

</body>
   <?php $i++; } ?>   

</html>
