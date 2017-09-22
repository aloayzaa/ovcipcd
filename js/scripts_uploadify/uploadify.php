<?php

include_once('../../conexion.php');
$cn = conectarse();

$tipo = $_REQUEST['tipo_updload'];

if ($tipo == 'tipo_prod') {
    $txt_ins_nombre = $_REQUEST['txt_ins_nombre'];
    if (!empty($_FILES)) {
        $limpiador = array("-", "/", " ", ",", ";", "%", "*", "+", "=", "$", "#", "!", "?", "¿", "¡", "º", "ª", "á", "é", "í", "ó", "ú", "à", "è", "ì", "ò", "ù", "@", "ñ", "Ñ", "Á", "É", "Í", "Ó", "Ú", "À", "È", "Ì", "Ò", "Ù", "`", "´");
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $mime = dameMime($_FILES['Filedata']['name']);
        $ruta = $_SERVER['DOCUMENT_ROOT'] . "/uploadifyPHP/images/productos" . '/'; //ubicacion donde se va a guardar el archivo
        $archivox = md5(mt_rand(2147483647, 4294967294)) . "_" . $_FILES['Filedata']['name'];
        $archivox = str_replace($limpiador, '', $archivox);
        $archivo = str_replace('//', '/', $ruta) . utf8_decode($archivox);
        $tamano = $_FILES["Filedata"]["size"];
        $kb = substr($tamano / 1024, 0, 5);

        if ($tamano > 1000 * 1024) {
            echo 1;
        } else {
            move_uploaded_file($tempFile, $archivo);
            $s_prod_ins = "INSERT INTO producto(" .
                    "producto," .
                    "foto," .
                    "tamano," .
                    "tipo" .
                    ")VALUES(" .
                    "'$txt_ins_nombre'," .
                    "'$archivo'," .
                    "'" . $kb . " KB'," .
                    "'$mime'" .
                    ")";
            $result_prod_ins = mysql_query($s_prod_ins);

            $s_prod_del = "DELETE FROM producto WHERE tamano='0 KB'";
            $result_prod_del = mysql_query($s_prod_del);
            
            echo 2;
        }
    }
} else {
    echo 3;
}

function dameMime($filename) {
    preg_match("|\.([a-z0-9]{2,4})$|i", $filename, $fileSuffix);

    switch (strtolower($fileSuffix[1])) {
        case "js" :
            return "application/x-javascript";

        case "json" :
            return "application/json";

        case "jpg" :
        case "jpeg" :
        case "jpe" :
            return "image/jpg";

        case "png" :
        case "gif" :
        case "bmp" :
        case "tiff" :
            return "image/" . strtolower($fileSuffix[1]);

        case "css" :
            return "text/css";

        case "xml" :
            return "application/xml";

        case "doc" :
        case "docx" :
            return "application/msword";

        case "xls" :
        case "xlt" :
        case "xlm" :
        case "xld" :
        case "xla" :
        case "xlc" :
        case "xlw" :
        case "xll" :
            return "application/vnd.ms-excel";

        case "ppt" :
        case "pps" :
            return "application/vnd.ms-powerpoint";

        case "rtf" :
            return "application/rtf";

        case "pdf" :
            return "application/pdf";

        case "html" :
        case "htm" :
        case "php" :
            return "text/html";

        case "txt" :
            return "text/plain";

        case "mpeg" :
        case "mpg" :
        case "mpe" :
            return "video/mpeg";

        case "mp3" :
            return "audio/mpeg3";

        case "wav" :
            return "audio/wav";

        case "aiff" :
        case "aif" :
            return "audio/aiff";

        case "avi" :
            return "video/msvideo";

        case "wmv" :
            return "video/x-ms-wmv";

        case "mov" :
            return "video/quicktime";

        case "exe" :
            return "application/exe";

        case "zip" :
            return "application/zip";

        case "tar" :
            return "application/x-tar";

        case "swf" :
            return "application/x-shockwave-flash";

        default :
            if (function_exists("mime_content_type")) {
                $fileSuffix = mime_content_type($filename);
            }

            return "unknown/" . trim($fileSuffix[0], ".");
    }
}

?>