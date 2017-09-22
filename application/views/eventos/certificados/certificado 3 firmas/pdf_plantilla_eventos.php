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
            font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;
           // margin-left: 100px;
            text-align: justify;
            font-size: 23px;
            line-height: 1.2em;
            /*     margin: 0 auto; */
        

         }
          #contenido1{
             font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;
            text-align: justify;
            font-size: 21px;
             line-height: 1.2em;
             /*     margin: 0 auto; */
          }
         #fecha{
             font-size:18px;
            text-align: right; 
            padding-top: -15px;  
         }
         #decano{
             text-align: center;
             font-size: 18px;
           //  margin-top: 1em;
         }
         #docente{
           //  margin-top: 1em;
             text-align: center;
             font-size: 18px;
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
<body><?php
                $sub=substr($evento, 0, 4);
                if($tipocertificado=='Participante'){
 if($sub=='Cert'||$sub=='Conf'||$sub=='CONF'||$sub=='Capa'||$sub=='Expo'||$sub=='Pone'){
                   $conjuntor="a la";
                }
                else {
                   $conjuntor="del";
                } 
                }else{
         if($sub=='Cert'||$sub=='Conf'||$sub=='CONF'||$sub=='Capa'||$sub=='Expo'||$sub=='Pone'){
                   $conjuntor="de la";
                }
                else {
                   $conjuntor="del";
                } 
                }
                ?>
     <br><br><br><br><br><br><br><br><br><br> 
     <p id="certificado"><strong>CERTIFICADO </strong></p>
          <p id="otorgado"> Otorgado a </p>
          
          <?php if(strlen($persona)<=40) {?>
            <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
             text-align: center;
             font-size: 30px;"><strong><?php echo $persona; ?></strong></p> 
             <?php } else {  ?>
                <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
             text-align: center;
             font-size: 22px;"><strong><?php echo $persona; ?></strong></p> 
             <?php }  ?>

                   <?php if(strlen($evento)<=40 || $horas!=0){?>
              <p id="contenido">Por su participación como <strong><?php echo $tipocertificado ?></strong> <?php echo $conjuntor; ?> <strong><?php echo  $evento;?></strong>, organizado por 
             <?php echo $tipoevento?>,
             <?php  if ($horas!=0){?>
                    con una duración de <?php echo $horas  ?> horas académicas, realizado  el  03  y  04 de setiembre.
                
                    
             <?php } }else { ?>
                  <p id="contenido1">Por su participación como <strong><?php echo $tipocertificado ?></strong> <?php echo $conjuntor; ?> <strong><?php echo  $evento;?></strong>, organizado por 
             <?php echo $tipoevento?>, 
             <?php  if ($horas!=0){?>
                    con una duración de <?php echo $horas  ?> horas académicas, realizado  el  03  y  04 de setiembre.
                              
             <?php } }?>
     
        <p id="fecha">Trujillo, 04 de setiembre 2016</p>
        
        <?php if(strlen($evento)<=40){?>
                <br>
                 <br>
                 
         <?php } else {?>
              <br>
                <br>
            
         <?php }?>            
         <!--<img style="position:absolute;top:539px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>-->
           
                       <?php if ($firma == 'civiles.png') {
                       $cantidad = '700px';
                       }else if ($firma == 'sistemas.png'){
                         $cantidad = '690px';
                       }else if ($firma == 'secretario.png'){
                         $cantidad = '735px';
                     } else if ($firma == 'agronomica.png'){
                         $cantidad = '700px';
                         } else if ($firma == 'zootecnia.png'){
                         $cantidad = '690px';
                       
                     }else if ($firma == 'agricola.png'){
                         $cantidad = '670px';
                       
                     }
                     else if ($firma == 'electronica.png'){
                         $cantidad = '720px';
                       
                     }else if ($firma == 'industrial.png'){
                         $cantidad = '670px';
                       
                     }else if ($firma == 'quimica.png'){
                         $cantidad = '670px';
                       
                     }else if ($firma == 'minas.png'){
                         $cantidad = '700px';
                       
                     }else{
                         $cantidad = '650px';
                       }?>

            <!-- <img style="position:absolute;top:555px;left:<?php echo $cantidad;?>;" id="firma_cap" src="./uploads/certificados/firma/<?php echo $firma;?>"/>-->
               <div id="div_decano" style="position:absolute;top:587px;left:-30px;"> 
          <p id="decano">Ing. Luis Mesones Odar<br>
            Decano</p></p>
      </div>
           <div id="div_decano" style="position:absolute;top:587px;left:300px;"> 
                  <p id="docente" >Ing. Angel Raúl Montesinos Echenique</p><br>
               <center>Expositor</center>
      </div>     
      <div id="div_docente" style="position:absolute;top:587px;left:430px;">
         <p id="decano">Ing. <?php echo $presidente; ?><br>
            <?php echo $cargo; ?></p>
      </div> 
         
       <div id="div_imagen">   
        <center>
          <img style="position:absolute;top:230px;left:700px;" width="90" height="85" src="<?php echo './uploads/certificados/qr/eventos/'.$image.'.png' ?>" />
        </center>
      </div>   
     
</body>
</html>
