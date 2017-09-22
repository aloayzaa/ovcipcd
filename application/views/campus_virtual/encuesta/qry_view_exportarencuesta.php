<?php

        header('Content-type: application/vnd.ms-excel');
//        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename=Reporte_de_encuesta.xls');
        header("Pragma: no-cache");
        header("Expires: 0");
        
        
        echo $tabla;

?>