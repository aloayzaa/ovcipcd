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
            font-size: 35px;
            font-family: "Arial Black",Gadget,sans-serif;
            text-align: center;
            
        }
        #otorgado{
                text-align: center;
                font-weight: bold;
                font-size: 26px;
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
            font-size: 22px;
            line-height: 1.3em;
        }
         #contenido1{
            // margin-left: 100px;
            text-align: justify;
            font-size: 20px;
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
            echo '<br><br><br><br><br><br><br><br><br><br><br>';

            $top= '580px';
            }
            else {
            echo '<br><br><br><br><br><br><br><br><br>';

             $top= '550px';
            } ?>
   
     <p id="certificado"><strong>CERTIFICADO </strong></p>
          <p id="otorgado"> Otorgado a </p>
          
          <?php if(strlen($certificado['nombres'][$i])<=40) {?>
             <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 29px;"><strong>Ing. <?php echo $certificado['nombres'][$i]; ?></strong></p> 
             <?php } else {  ?>
               <p id="persona" style=" font-family: serif;
             text-align: center;
             font-size: 21px;"><strong>Ing. <?php echo $certificado['nombres'][$i]; ?></strong></p> 
             <?php }  ?>
             
                             <?php 
if($certificado['promedio'][$i]>=11){
$tenor = 'aprobado';
}else{
$tenor = 'participado en';
}
               ?>
        <?php if(strlen($certificado['nombre_curso'][$i])<=60){ ?>       
        <p id="contenido">Por haber <?php echo $tenor; ?> el <strong><?php echo  $certificado['nombre_curso'][$i];?></strong> desarrollado por la
             <strong>Comisión del Instituto de Estudios Profesionales de Ingeniería - IEPI</strong> del Consejo Departamental de La Libertad <?php echo $certificado['organizadopor'][$i];?> del <?php echo $certificado['fecha_inicio'][$i];  ?> al 
        <?php echo $certificado['fecha_fin'][$i];  ?>, con una duración de <?php echo $certificado['horas'][$i]  ?> horas.
        
        </p>
        <?php } else { ?>
         <p id="contenido1">Por haber <?php echo $tenor; ?> el <strong><?php echo  $certificado['nombre_curso'][$i];?></strong> desarrollado por la
             <strong>Comisión del Instituto de Estudios Profesionales de Ingeniería - IEPI</strong> del Consejo Departamental de La Libertad <?php echo $certificado['organizadopor'][$i];?> del <?php echo $certificado['fecha_inicio'][$i];  ?> al 
        <?php echo $certificado['fecha_fin'][$i];  ?>, con una duración de <?php echo $certificado['horas'][$i]  ?> horas.
        
        </p>
        
        
         <?php }  ?>
        
        
        <p id="fecha">Trujillo,<?php echo $fechahoy?></p>
        
         <?php if(strlen($certificado['nombre_curso'][$i])<=60){ ?>    
         <br>
         <br>


      
           <?php } else { ?>
         <br>


        
          <?php }  ?>
         
      <!--<div id="div_decano" > 
          <p id="decano">Ing. MARCO CABRERA HUAMAN<br>
            Decano</p>
      </div>  
      <div id="div_docente">
          <p id="docente" >Ing. <?php echo $certificado['docente_curso'][$i]; ?><br>
              Docente
          </p>
           
      </div>-->   
 
                 <div id="div_decano" style="position:absolute;top:587px;left:-10px;"> 
          <p id="decano">Ing. Luis Mesones Odar<br>
            Decano</p></p>
      </div>
       <div id="div_decano" style="position:absolute;top:587px;left:330px;"> 
                   <p id="docente">Ing. Aldo Torres López<br>
            Director Académico IPC Perú S.A.C</p>
      </div>    
    <div id="div_docente" style="position:absolute;top:587px;left:430px;">
         <p id="decano">Ing. Roger León Díaz<br>
            Presidente IEPI</p>
      </div>     

     
</body>
  <?php $i++; } ?> 
</html>