<?php

// CREA UN SELECT SIMPLE (COMBO)
function creaCombo($query) {
    $array = toArrayNumerico($query);
    foreach ($array as $fila) {
        $data[utf8_encode($fila[0])] = mb_convert_encoding($fila[1], "UTF-8");
    }

    return $data;
}

// CREA UN SELECT (COMBO) CON:  Seleccionar 
function creaComboCSO($query) {
    $array = toArrayNumerico($query);
    $data[''] = 'Seleccionar';
    foreach ($array as $fila) {
        $data[utf8_encode($fila[0])] = mb_convert_encoding($fila[1], "UTF-8");
    }

    return $data;
}

// CREA UN SELECT (COMBO) CON PRIMERA OPCION EN BLANCO (con data-placeholder)
function creaComboCPH($query) {
    $array = toArrayNumerico($query);
    $data[''] = '';
    foreach ($array as $fila) {
        $data[utf8_encode($fila[0])] = mb_convert_encoding($fila[1], "UTF-8");
    }

    return $data;
}

// CREA UN SELECT (COMBO) NUMERICO ASCENDENTE 
function comboNumAsc($liminf, $limsup, $atributos) {
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $liminf; $i <= $limsup; $i++) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// CREA UN SELECT (COMBO) NUMERICO DESCENDENTE
function comboNumDesc($limsup, $liminf, $atributos) {
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $limsup; $i >= $liminf; $i--) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// CREA UN SELECT (COMBO) NUMERICO DESCENDENTE CON OPCION SELECCIONADA
function comboNumDescCOS($limsup, $liminf, $selected, $atributos) {
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $limsup; $i >= $liminf; $i--) {
        if ($i == $selected) {
            $result .= "<option selected='' value=$i>" . $i . "</option>";
        } else {
            $result .= "<option value=$i>" . $i . "</option>";
        }
    }

    $result .= "</select>";

    return $result;
}

// CREA UN SELECT (COMBO) NUMERICO ASCENDENTE (LIMITE INFERIOR HASTA AÑO ACTUAL: LIAA) 
function comboNumLIAA($liminf, $atributos) {
    $anioactual = date("Y");
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $liminf; $i <= $anioactual; $i++) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// CREA UN SELECT (COMBO) NUMERICO DESCENDENTE (AÑO ACTUAL HASTA LIMITE INFERIOR: AALI) 
function comboNumAALI($liminf, $atributos) {
    $anioactual = date("Y");
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $anioactual; $i >= $liminf; $i--) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// CREA UN SELECT (COMBO) NUMERICO DESCENDENTE (AÑO ACTUAL HASTA LIMITE INFERIOR: AALI)  (CON OPCION SELECCIONADA)
function comboNumAALICOS($liminf, $atributos, $selected) {
    $anioactual = date("Y");
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $anioactual; $i >= $liminf; $i--) {
        if ($i == $selected) {
            $result .= "<option selected value=$i>" . $i . "</option>";
        } else {
            $result .= "<option value=$i>" . $i . "</option>";
        }
    }

    $result .= "</select>";

    return $result;
}

// CREA UNA TABLA SENCILLA 
function creaTabla($query, $header, $atributos) {
    $array = toArrayNumerico($query);
    $result = "";
    $result .= '<table  ' . $atributos . '>';
    $result .= '<thead>';
    $result .='<tr>';
    foreach ($header as $title => $valor) {
        $result .='<th>' . utf8_encode($valor) . '</th>';
    }
    $result .='</tr>';
    $result .= '</thead>';
    $result .= '<tbody>';
    foreach ($array as $fila => $row) {
        $result.='<tr>';
        foreach ($row as $key => $value) {
            $campo = $value; // sin adampt: utf8_encode($value)
            $result.='<td>';
            if ($campo == null) {
                $result.='&nbsp;';
            } else {
                $result.=htmlspecialchars($campo);
            }
            $result.='</td>';
        }
        $result.='</tr>';
        unset($row);
    }
    $result.='</tbody>';
    $result .= '</table>';

    return $result;
}

// CONVIERTE UN ARRAY A NUMERICO (PSEUDO-EQUIVALENTE A mysql_fetch_row)
function toArrayNumerico($query) {
    $array = array();
    $fila = $col = 0;

    foreach ($query as $row) {
        $col = 0;
        foreach ($row as $key => $value) {
            $array[$fila][$col] = $value;
            $col++;
        }
        $fila++;
    }
    return $array;
}

?>
