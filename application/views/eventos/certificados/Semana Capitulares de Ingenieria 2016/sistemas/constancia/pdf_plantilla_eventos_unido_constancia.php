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
            #constancia{
                font-size: 55px;
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
                text-align: justify;
                font-size: 16px;
                /*     margin: 0 auto; */


            }
            #contenido1{
                font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;
                text-align: justify;
                font-size: 16px;
                line-height: 1.2em;
                /*     margin: 0 auto; */
            }
            #fecha{
                font-size:18px;
                text-align: right; 
                padding-top: 5px;  
            }
            #decano{
                text-align: center;
                font-size: 18px;
            }
            #docente{
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
    <?php $i = 0;
    foreach ($listado as $certificado) { ?> 
        <body>
            <?php
            $sub = substr($certificado['titulo_evento'][$i], 0, 4);
            if ($certificado['tipocertificado'][$i] == 'Asistente') {
                if ($sub == 'Cert' || $sub == 'Conf' || $sub == 'Capa' || $sub == 'Expo' || $sub == 'Pone') {
                    $conjuntor = "a la";
                } else {
                    $conjuntor = "del";
                }
            } else {
                if ($sub == 'Cert' || $sub == 'Conf' || $sub == 'Capa' || $sub == 'Expo' || $sub == 'Pone') {
                    $conjuntor = "de la";
                } else {
                    $conjuntor = "del";
                }
            }
            ?>
            <?php
            if ($certificado['firma'][$i] == 'civiles.png') {
                $cantidad = '700px';
            } else if ($certificado['firma'][$i] == 'sistemas.png') {
                $cantidad = '690px';
            } else if ($certificado['firma'][$i] == 'secretario.png') {
                $cantidad = '735px';
            } else if ($certificado['firma'][$i] == 'agronomica.png') {
                $cantidad = '700px';
            } else if ($certificado['firma'][$i] == 'zootecnia.png') {
                $cantidad = '690px';
            } else if ($certificado['firma'][$i] == 'agricola.png') {
                $cantidad = '670px';
            } else if ($certificado['firma'][$i] == 'electronica.png') {
                $cantidad = '720px';
            } else if ($certificado['firma'][$i] == 'industrial.png') {
                $cantidad = '670px';
            } else if ($certificado['firma'][$i] == 'quimica.png') {
                $cantidad = '670px';
            } else if ($certificado['firma'][$i] == 'minas.png') {
                $cantidad = '700px';
            } else {
                $cantidad = '650px';
            }
            ?>
            <?php if ($i >= 1) { ?>
                         <!--<img style="position:absolute;top:577px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>
                      <img style="position:absolute;top:593px;left:<?php echo $cantidad; ?>;" id="firma_cap" src="./uploads/certificados/firma/<?php echo $certificado['firma'][$i]; ?>"/>-->
            <div id="div_docente" style="position:absolute;top:890px;left:180px;">
                <p id="docente" >Ing. <?php echo $certificado['presidente'][$i]; ?></p><br>
              <center><?php echo $certificado['cargo'][$i]; ?></center>
            </div>
            <div id="div_imagen">   
                <center>
                    <img style="position:absolute;top:850px;left:100px;border: black 5px solid;border-radius: 20px;" width="110" height="105" src="<?php echo './uploads/certificados/qr/eventos/' . $certificado['image'][$i] . '.png'; ?>" />
                </center>
            </div> 
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php } else { ?>
        <!-- <img style="position:absolute;top:539px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>
        <img style="position:absolute;top:555px;left:<?php echo $cantidad; ?>;" id="firma_cap" src="./uploads/certificados/firma/<?php echo $certificado['firma'][$i]; ?>"/>--> 
           <div id="div_docente" style="position:absolute;top:860px;left:180px;">
            <p id="docente" >Ing. <?php echo $certificado['presidente'][$i]; ?></p><br>
            <center><?php echo $certificado['cargo'][$i]; ?></center>

        </div>
        <div id="div_imagen">   
            <center>
                <img style="position:absolute;top:820px;left:100px;border: black 5px solid;border-radius: 20px;" width="110" height="105" src="<?php echo './uploads/certificados/qr/eventos/' . $certificado['image'][$i] . '.png'; ?>" />
            </center>
        </div> 
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php } ?>

    <p id="constancia" style="line-height:12px;">
            <strong>CONSTANCIA</strong>
    </p>
     <center><img src="./uploads/certificados/lineas.png" /></center>
 <p id="contenido1"> El que suscribe, Presidente del Capítulo de Ingeniería de Sistemas, Computación e Informática del Colegio de Ingenieros del Perú - Consejo Departamental de La Libertad, emite la presente constancia al Ingeniero:</p>
        <?php if (strlen($certificado['nombres'][$i]) <= 40) { ?>
        <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
           text-align: center;
           font-size: 25px;"><strong><?php echo $certificado['nombres'][$i]; ?></strong></p> 
    <?php } else { ?>
        <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
           text-align: center;
           font-size: 22px;"><strong><?php echo $certificado['nombres'][$i]; ?></strong></p> 
       <?php } ?>

        <p id="contenido1">por participar en calidad de <strong><?php echo $tipocertificado ?></strong> de la Semana Capitular de Ingeniería de Sistemas, Computación e Informática, en la cual se expusieron las conferencias magistrales:
<style type="text/css">
   ul {
     list-style-image:url(../Fotos/list-marker.gif);}
</style>
 <ul>
    <li id="contenido">Tendencias de infraestructura física unificada de comunicaciones.</li>
     <li id="contenido">Gestión de procesos de TI.</li>
     <li id="contenido">Gobierno de TI como ventaja competitiva del negocio.</li>
     <li id="contenido">Gestión de proyectos tecnológicos: alineamiento a la estrategia del negocio.</li>
     <li id="contenido">Seguridad en base de datos corporativas.</li>
     <li id="contenido">Las tecnologías de Información en la Ingeniería.</li>
 </ul><br>
<p id="contenido1">organizado por el Capítulo, del 02 al 04 de noviembre del año en curso.</p>
    </p>

    </p>
    <p id="fecha">Trujillo, <?php echo $certificado['fecha_evento'][$i] ?></p>
    <?php if (strlen($certificado['titulo_evento'][$i]) <= 40) { ?>
        <br>
        <br>
    <?php } else { ?>
        <br>
        <br>
    <?php } ?>

    </body>


    <?php $i++;
} ?>
</html>
