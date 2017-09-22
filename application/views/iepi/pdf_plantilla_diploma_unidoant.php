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
            font-size: 24px;
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
            line-height: 1.3em;

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
              font-size:19px;
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
<?php 
       $i=0;
       foreach ($listado as $certificado) {   ?>
<body>
       
    <div id="diplomado_izquierda">
        <p id="diplomanombre"><strong><?php echo $datos[3]?></strong></p>
       
            <p id="contenido_diplomado"> Contenido </p>
        
        <?php foreach($certificado['modulos'] as $modulo){ ?>
             <p class="modulo"><?php echo $modulo->cConDipTitulo ?></p>
            <ul class="nombre_modulo"> 
                <li ><?php echo $modulo->cConDipSumilla ?></li>
            </ul>
            
        <?php } ?>    

        <br>
              <!--<br>-->
        <!--<br>-->
                <div id="div_imagen">   
                <center>
                  <img width="100" height="100" src="<?php echo './uploads/certificados/qr/iepi/'.$certificado['qr'][$i].".png" ?>" />
                </center>
          </div> 
        
    </div>    
    
    <div id="diplomado_derecha">
        <br><br><br><br><br><br><br><br><br><br>
        <p id="diploma"><strong>DIPLOMA </strong></p>
             <p id="otorgado"> Otorgado a </p>

             <?php if(strlen($certificado['nombres'][$i])<=40) {?>
                <p id="persona" style="    font-style: italic;font-family: serif;text-align: center;font-size: 22px;">
                    <strong><?php echo $certificado['nombres'][$i]; ?></strong>
                </p> 
                <?php } else {  ?>
                  <p id="persona" style="    font-style: italic; font-family: serif;text-align: center;font-size: 18px;"><strong><?php echo $certificado['nombres'][$i]; ?></strong></p> 
                <?php }  ?>


           <p id="contenido">En mérito de haber aprobado el <strong><?php echo   $certificado['nombre_curso'][$i];?></strong>, desarrrollado por 
                la Comisión <strong>IEPI</strong> del Consejo Departamental de La Libertad <?php echo $certificado['organizadopor'][$i];   ?> del <?php echo $certificado['fecha_inicio'][$i];   ?> al 
           <?php echo $certificado['fecha_fin'][$i];   ?>, con una duración de <?php echo $certificado['horas'][$i];  ?> horas.

           </p>
            <p id="fecha">Trujillo, 12 de junio, 2015</p>
            
            <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
                        
           
    </div>
    <img style="position:absolute;top:580px;left:650px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>
          <img style="position:absolute;top:620px;left:855px;" id="firma_dec" src="./uploads/certificados/firma/iepi.png"/>
     <p id="nombres">Ing. MARCO CABRERA HUAMAN</p>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                
                <!--   &nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; -->
      <p id="nombres1">&nbsp;&nbsp;&nbsp;&nbsp;Ing. ROGER LEON DIAZ</p>           
     <p id="cargos">&nbsp;&nbsp;&nbsp;&nbsp;
                Decano 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                Presidente IEPI </p>
     
     
         <br>
         <br>
         <br>
         <br>

</body>
<?php $i++; } ?>
</html>
