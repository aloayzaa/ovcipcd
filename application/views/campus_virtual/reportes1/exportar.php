<?php
        // esto le indica al navegador que muestre el diálogo de descarga aún sin haber descargado todo el contenido
        header("Content-type: application/octet-stream");
        //header("ContentType: application/xsl");
        //indicamos al navegador que se está devolviendo un archivo
        header("Content-Disposition: attachment; filename=reporte.xls");
        //con esto evitamos que el navegador lo grabe en su caché
        header("Pragma: no-cache");
        header("Expires: 0");
        //damos salida a la tabla
        
//        $paises = array(0=>'Mexico','Venezuela','Colombia','Belice','Guatemala',
//                 'Peru','Brasil','Panama');
//$tbHtml = "<table>
//             <header>
//                <tr>
//                  <th>ID</th>
//                  <th>País</th>
//                </tr>
//            </header>";
// 
//foreach($paises as $indice=>$valor)
//  $tbHtml .= "<tr><td>$indice</td><td>$valor</td></tr>";
//$tbHtml .= "</html>";
//echo $tbHtml;

        echo $tabla;
        
        
?>
