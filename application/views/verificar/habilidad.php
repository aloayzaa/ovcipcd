
<?php
function HabilidadStr($habilidad) {
    if ($habilidad == 0) {
        echo "2";
    } else if ($habilidad == 1) {
        echo "1";
    }else if ($habilidad == 4) {
        echo "COLEGIADO INHABILITADO";
    } else if ($habilidad == 2)  {
        echo "COLEGIADO HABILITADO";
    } else {
	echo '0';
	}
}
?>

<?php echo HabilidadStr($habilidad) ?>
