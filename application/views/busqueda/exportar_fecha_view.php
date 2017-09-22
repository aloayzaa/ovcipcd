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
        
        echo '<center><h1 style="color:#6e6e6e;">COLEGIO DE INGENIEROS DEL PERU CDDL</h1></center><img src="http://www.cip-trujillo.org/img/logo_cip.png" style>';
        echo '<br>';
        echo '<br>';
        
        echo $tabla;
       
                
?>
