<style>
#header {
    background: url(../img/logo-cip.jpg) top left no-repeat;
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
<div id="header">
 <h1><a href ="..." title ="...">
 <span>Colegio de Ingenieros del Perú <br>Consejo Departamental La Libertad</span></a></h1>
</div>
<br>

<table aling="center" border="1" bordercolor="#cacaca">
            <tr><?php
                    foreach($tabla as $horario){?>
            <th colspan=<?php echo count($horario)+3;?> scope="col">Lista de Alumnos del Curso de: <?php echo $curso; ?> - Horario Inicio: <?php echo $inicio; ?> | Horario Fin: <?php echo $fin; ?></th>

   <?php      break;}?>
    </tr>
    <tr>    
   <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Id</td>  
       <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Nombres</td>
            <?php    
        foreach($tabla as $nota){
            for($i=1; $i < count($nota);$i++){ ?>

        <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;"><?php echo 'Nota '.$i; ?></td>
        <?php }
        break;
    }?>
       <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Promedio Final</td>
          <td style="padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Estado</td>
    </tr>
    <?php 
$count=0;
        foreach($tabla as $tabla){
            $count++;
                     $suma=0;
        	echo '<tr>';
            echo  '<td>'.$count.'</td>';
        	echo  '<td>'.$tabla[count($tabla)-1].'</td>';
        	for($i=0; $i< count($tabla)-1;$i++){ 
        		?>
        <td><?php $suma=$suma+$tabla[$i]['cNotValor'];
        echo $tabla[$i]['cNotValor']; ?></td>
    <?php 
    }
    if ((count($tabla)-1)==0){
        $valor = 1;
    }else{
        $valor= (count($tabla)-1);
    }
        echo  '<td style="color:black;"><strong>'.round($suma/$valor).'</strong></td>';
        if (round($suma/$valor) >= '14'){
                    echo  '<td style="color:blue;"><strong>Aprobado (Certificado)</strong></td>';
        }
else{
echo  '<td style="color:red;"><strong>Desaprobado</strong></td>';
}
   echo'</tr>';
}
    ?>
</table> 
 <footer> <div class='define'> <p>GENERADO POR EL ING. <?php echo $docente; ?></p> </div> </footer>


