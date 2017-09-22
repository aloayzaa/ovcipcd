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
<?php for($i=0;$i<1;$i++){ ?>
<body>
    <div id="diplomado_izquierda">
        <p id="diplomanombre"><strong><?php echo $datos[4]?></strong></p>
       
            <p id="contenido_diplomado"> Contenido </p>
        
        <?php foreach($datos[7]as $modulo){ ?>
             <p class="modulo"><?php echo $modulo->cConDipTitulo ?></p>
            <ul class="nombre_modulo"> 
                <li ><?php echo $modulo->cConDipSumilla ?></li>
            </ul>
            
        <?php } ?>    
       
       
       
        <br>
        <br>
        <br>
        
          <div id="div_imagen">   
                <center>
                  <img width="90" height="90" src="<?php echo './uploads/certificados/qr/infocip/'.$datos[10].".png" ?>" />
                </center>
          </div>   
        
    </div>    
    
    <div id="diplomado_derecha">
        <br><br><br><br><br><br><br><br><br><br>
        <p id="diploma"><strong>DIPLOMA </strong></p>
             <p id="otorgado"> Otorgado a </p>

             <?php if(strlen($datos[1])<=40) {?>
                <p id="persona" style="    font-style: italic;font-family: serif;text-align: center;font-size: 22px;">
                    <strong><?php echo $datos[1]; ?></strong>
                </p> 
                <?php } else {  ?>
                  <p id="persona" style="    font-style: italic; font-family: serif;text-align: center;font-size: 18px;"><strong><?php echo $datos[1]; ?></strong></p> 
                <?php }  ?>


           <p id="contenido">En mérito de haber aprobado el Diplomado en <strong><?php echo  $datos[4];?></strong>, desarrrollado en el Centro de Informática 
             <strong>@infoCIP</strong> del Consejo Departamental de La Libertad del <?php echo $datos[5]  ?> al 
           <?php echo $datos[6]  ?>, con una duración de <?php echo $datos[8]  ?> horas.

           </p>
            <p id="fecha">Trujillo,<?php echo $fechahoy?></p>
            
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
                        
           
    </div>
                     <!--<img style="position:absolute;top:580px;left:650px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>-->
     <p id="nombres">Ing. LUIS MESONES ODAR</p>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                
                <!--   &nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; -->
      <p id="nombres1">Ing. TITO BURGOS SARMIENTO</p>           
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
                Director Secretario </p>
     
     
         <br>
         <br>
         <br>
         <br>
             
         
    
         
     
      
     
     
     
</body>
<?php } ?>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
     <center><p style="font-size:16px"><strong>PARTICIPANTE: <?php echo $datos[1]; ?></strong></p></center> 
      <br>
      <br>
      
      <p style="width:50%;margin: 0 auto;  text-align:center;font-weight: bold; font-size:16px"><?php echo  $datos[4];?> </p>
          <br>        
       <table border="1" style="margin: 0 auto;">
           <tr >
               <td >
                   <center><p style="padding-right:1em;padding-left:1em;text-align: center;font-weight: bold; font-size:16px"> Promedio Final </p> </center>
               </td>
               <td  >
                   <center><p style="padding-right:2em;padding-left:2em;font-weight: bold; font-size:16px"> <?php echo $datos[9]; ?><p></center>
               </td>
           </tr>
      </table>
        
      <br>
      <br>
</body>

</html>
