<?php

$parametros = $this->input->post('json');
$funciones = array(
    'Ver Asistencias' => 'initEvtOpcPopupId("clipboard","alumno/popupReporteAsistencias/","Tus Asistencias",520,500)',
    'Ver Notas' => 'initEvtOpcPopupId("note","alumno/popupReporteNotas/","Tus Notas",520,500)',
    'Descargar Material' => 'initEvtOpcPopupId("circle-arrow-s","alumno/popupListaMateriales/","Lista de Materiales",400,400)',
    'Encuesta' => 'initEvtOpcPopupId("document","alumno/popupReporteEncuesta/","Encuesta",600,600)'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'id', 'width' => 40, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Docente', 'name' => 'Docente', 'width' => 180, 'align' => 'left'),
        array('label' => 'Horario', 'name' => 'Horario', 'width' => 300, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 80, 'align' => 'center'),
    ),
    'sort_name' => 'id',
    'caption' => 'Lista de Cursos',
    'div_name' => 'gridCursosAlumno',
    'source' => 'campus_virtual/alumno/alumnoCursosQry/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'id',
    'grid_height' => 220
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="gridCursosAlumno" ></table>
<div id="pager"></div>
</div>


