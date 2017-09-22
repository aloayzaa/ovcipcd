<?php

       header("Content-type: application/octet-stream");

//        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename=promediosFinales.xls');
        header("Pragma: no-cache");
        header("Expires: 0");
        
        
        echo $tabla;

?>