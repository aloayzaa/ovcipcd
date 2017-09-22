<style>
#header {
    background: url(./img/logo_cip.jpg) top left no-repeat;
    width: 400px;
    height: 100px;
    margin: 0px;
    padding: 0px;
    margin-top: -22px;
}
#header h1 {
 margin-left: 120px;
 margin-top: -120px;
 font-size: 30px;
}

#header a span {
 visibility: hidden;
}
#header a {
    width: 600px;
    height: 100px;
    display: block;
    padding: 0px;
    margin: 0px;
    color:#800000;
    text-decoration: none;
}
#pie{
height: 40px;
background-color: #333;
color: #fff;
text-align: center;
clear: both;
        .define { width:960px; margin:0 auto; }
</style>
        <title><?php echo $titulo; ?></title>
<div id="header">
 <h1><a href ="..." title ="...">
 <span>Colegio de Ingenieros del Perú <br>Consejo Departamental La Libertad</span></a></h1>
</div>
<br>
        <?php if ($evento > 0) { ?>
<table aling="center" border="0.1px" bordercolor="#cacaca">
            
    <thead>
        <tr>
                  
            <th colspan="7" scope="col">Lista de Alumnos de <?php echo $nombre; ?></th>
    </tr>            
        <tr>
                        <th>N°</th>
                        <th>FECHA_REGISTRO</th>
                        <th>DNI</th>
                        <th>NOMBRES</th>
                        <th>TELEFONO_CONTACTO</th>
                        <th>CORREO</th>
                        <th>ASISTENCIA</th>
                                           
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;  
                    foreach ($evento as $evento) { ?>
                        <tr style="background-color:#FBF7AA;">                                  
                            <td style="width:auto;text-align: center;"><?php echo $i++; ?></td>
                            <td style="width: auto;text-align: center;"><?php echo $evento["FechaRegistro"]; ?></td>
                            <td style="width: auto;text-align: center;"><?php echo $evento["DNI"]; ?></td>
                            <td style="width: auto;text-align: center;"><?php echo $evento ["NOMBRES"]; ?></td>
                            <td style="width: auto;text-align: center;"><?php echo $evento ["TELEFONO"]; ?></td>
                            <td style="width: auto;text-align: center;"><?php echo $evento ["CORREO"]; ?></td>
                                 <td style="width: auto;text-align: center;"></td>

                        </tr>
                    <?php } ?>
                    <?php for ($j = $i; $j < 20; $j++) { ?>
          <tr style="background-color:#FBF7AA;">   
                        <td style="width:auto;height:20px;text-align: center;"></td>
                            <td style="width: auto;text-align: center;"></td>
                            <td style="width: auto;text-align: center;"></td>
                            <td style="width: auto;text-align: center;"></td>
                            <td style="width: auto;text-align: center;"></td>
                                 <td style="width: auto;text-align: center;"></td>
                                     </tr> <?php }?>
                </tbody>    
</table>
            <?php
        } else {
            echo "<div class='alert alert-block'><h4 class='alert-heading'>Informacion1!!</h4>No Existen Inscripciones para dicho evento.. </div>";
        }
             ?>
 <footer> <div class='define'> <p>GENERADO POR EL AREA DE CAPITULOS DEL CIP-CDLL.</p> </div> </footer>


