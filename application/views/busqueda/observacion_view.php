<?php ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <style type="text/css">
            #contenedor {
                width:300px;
                margin:0 auto;
                padding-top:20px;

            }
            #miTabla{
                border-collapse:collapse;
                width:100%;
                border-color: #0099FF;
            }
            #miTabla td{
                padding:6px;

            }
            #miTabla tr:nth-child(odd) {
                background-color: #DDD;
                color:#777
            }

            #miTabla tr:nth-child(even) {
                background-color: #666;
                color:#FFF;
            }
        </style>
    </head>

    <body>

        <div id="contenedor">
            <table id="miTabla">

                <td>Observacion</td>
                <tr>
                    <td style="border-bottom-color:#0000CC;">Tipo de Comprobante:</td>
                    <td> <?php echo form_label(mb_convert_encoding($comprobante, "UTF-8"), ''); ?></td>      
                </tr>
                <tr>
                    <td>Detalle Observacion:</td>
                    <td> <?php echo form_label(mb_convert_encoding($observacion1, "UTF-8"), ''); ?></td>      
                </tr>
                <tr>
                    <td>Monto:</td>
                    <td> <?php echo form_label(mb_convert_encoding($monto, "UTF-8"), ''); ?></td>
                </tr>
                <tr>
                    <td>Importante</td>
                    <?php
                    $restante = ($cuenta_ingreso - $monto);
                    if ($monto >= $cuenta_ingreso) {
                        echo '<td>Monto cancelado</td>';
                    } else {
                        echo "<td>Usted adeuda el Monto de: .$restante</td>";
                    }
                    ?>
                </tr>

            </table>
        </div>

    </body>
</html>

</div>
<?php echo form_close(); ?>