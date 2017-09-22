<?php
$parametros = $this->input->post('json');
//echo $parametros['criterio'];
$funciones = array(
    'Descargar Material' => 'initEvtOpcPopupId("circle-arrow-s","cursosdocente/popupListaMateriales/","Lista de Materiales",400,400)'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'id', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'Nombre', 'width' => 200, 'align' => 'left'),
        array('label' => 'Horario', 'name' => 'Horario', 'width' => 130, 'align' => 'center'),
        array('label' => 'Fecha Inicio', 'name' => 'FechaInicio', 'width' => 80, 'align' => 'center'),
        array('label' => 'Fecha Fin', 'name' => 'FechaFin', 'width' => 80, 'align' => 'center'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 70, 'align' => 'center'),
    ),
    'sort_name' => 'id',
    'caption' => 'Lista de Cursos',
    'div_name' => 'grid',
    'source' => 'campus_virtual/cursosdocente/cursosDocente/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'id',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>