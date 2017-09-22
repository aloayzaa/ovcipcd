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
 
        a {
         color: #003399;
         background-color: transparent;
         font-weight: normal;
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
         #persona{
             /*font-family: serif;
             text-align: center;
             font-size: 32px;*/
         }
         #contenido{
             
          
           // margin-left: 100px;
            text-align: justify;
            font-size: 24px;
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
<body>
  
   <br><br><br><br><br><br><br>
   <p id="certificado"><strong>CERTIFICADO </strong></p>
          <p id="otorgado"> Otorgado a </p>
          
          <?php if(strlen($datos[0])<=40) {?>
             <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 30px;"><strong><?php echo $datos[0]; ?></strong></p> 
             <?php } else {  ?>
               <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 22px;"><strong><?php echo $datos[0]; ?></strong></p> 
             <?php }  ?>
             
         
              <p id="contenido">Por haber asistido al <?php echo $datos[1]?>, <strong><?php echo $datos[2]?></strong>, del Diplomado en <?php echo $datos[8]?>, desarrollado en 
            el Centro de Capacitación <strong>info@CIP</strong> del Consejo Departamental de La Libertad del <?php echo $datos[3]  ?> al 
        <?php echo $datos[4] ?>, con una duración de <?php echo $datos[5] ?> horas.
        
        </p>
         
        <p id="fecha">Trujillo,<?php echo $fechahoy?></p>
         <br>
         <br>
         <br>
             
            <!--<img style="position:absolute;top:515px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>-->
      <div id="div_decano" > 
          <p id="decano">Ing. LUIS MESONES ODAR<br>
            Decano</p></p>
      </div>  
      <div id="div_docente">
          <p id="docente" >Ing. <?php echo $datos[6] ?><br>
              Docente
          </p>
           
      </div>   
         
         
       <div id="div_imagen">   
        <center>
          <img style="margin-top: -5em;" width="95" height="85" src="<?php echo './uploads/certificados/qr/infocip/'.$datos[7].".png"  ?>" />
        </center>
      </div>   
     
</body>


</html>
