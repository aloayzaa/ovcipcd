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
    <body><?php
$sub = substr($evento, 0, 4);
if ($tipocertificado == 'Asistente') {
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
        <br><br><br><br><br><br><br><br><br>
        <p id="constancia" style="line-height:12px;"><strong>CONSTANCIA</strong></p><br><br><br><br>
    <center><img src="./uploads/certificados/lineas.png" /></center>
    <p id="contenido1"> El que suscribe, Presidente del Capítulo de Ingeniería de Mecánica, Eléctrica y Mecatrónica del Colegio de Ingenieros del Perú - Consejo Departamental de La Libertad, entrega la presente constancia a:</p>
    <?php if (strlen($persona) <= 40) { ?>
        <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
           text-align: center;
           font-size: 25px;"><strong><?php echo $persona; ?></strong></p> 
    <?php } else { ?>
        <?php echo $persona; ?>
        <p id="persona" style="  font-family: 'Arial Black',Gadget,sans-serif;
           text-align: center;
           font-size: 22px;"><strong><?php echo $persona; ?></strong></p> 
    <?php } ?>
        <p id="contenido1">por participar en calidad de <strong><?php echo $tipocertificado ?></strong> en el Ciclo de Conferencias por el Día Mundial de la Eficiencia Energética, en donde se expuso las conferencias detalladas:
<style type="text/css">
   ul {
     list-style-image:url(../Fotos/list-marker.gif);}
</style>
 <ul>
    <li id="contenido">Diseño Energético en turbinas de viento.</li>
     <li id="contenido">Motores eléctricos de alta eficiencia.</li>
     <li id="contenido">Factibilidad de mejoramiento Energético en Plantas Industriales.</li>
     <li id="contenido">Cogeneración Industrial.</li>
 </ul><br>
<p id="contenido1">organizado por el Capítulo, el 04 de marzo del año en curso.</p>
    </p>

    <p id="fecha">Trujillo, marzo de 2017</p>

<?php if (strlen($evento) <= 40) { ?>
        <br>
        <br>

<?php } else { ?>
        <br>
        <br>

    <?php } ?>            
<!--<img style="position:absolute;top:539px;left:120px;" id="firma_dec" src="./uploads/certificados/firma/decano.png"/>-->

    <?php
    if ($firma == 'civiles.png') {
        $cantidad = '700px';
    } else if ($firma == 'sistemas.png') {
        $cantidad = '690px';
    } else if ($firma == 'secretario.png') {
        $cantidad = '735px';
    } else if ($firma == 'agronomica.png') {
        $cantidad = '700px';
    } else if ($firma == 'zootecnia.png') {
        $cantidad = '690px';
    } else if ($firma == 'agricola.png') {
        $cantidad = '670px';
    } else if ($firma == 'electronica.png') {
        $cantidad = '720px';
    } else if ($firma == 'industrial.png') {
        $cantidad = '670px';
    } else if ($firma == 'quimica.png') {
        $cantidad = '670px';
    } else if ($firma == 'minas.png') {
        $cantidad = '700px';
    } else {
        $cantidad = '650px';
    }
    ?>

            <!-- <img style="position:absolute;top:555px;left:<?php echo $cantidad; ?>;" id="firma_cap" src="./uploads/certificados/firma/<?php echo $firma; ?>"/>-->
    <div id="div_docente" style="position:absolute;top:860px;left:180px;">
        <p id="docente" >Ing. <?php echo $presidente; ?></p><br>
        <center><?php echo $cargo ?></center>

    </div>   
    <div id="div_imagen">   
        <center>
            <img style="position:absolute;top:820px;left:100px;border: black 5px solid;border-radius: 20px;" width="110" height="105" src="<?php echo './uploads/certificados/qr/eventos/' . $image . '.png' ?>" />
        </center>
    </div> 

</body>
</html>
