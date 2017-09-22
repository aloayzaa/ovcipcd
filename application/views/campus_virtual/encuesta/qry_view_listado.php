<legend>Listado de Encuestas</legend>

<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Activar' => 'initEvtOpcPopupId("check","encuestacursos/popupActivarEncuesta/","Activar Encuesta",500,400)',
    'Eliminar' => 'initEvtDel ("encuestaelim")',
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'ID', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Curso', 'name' => 'Curso', 'width' => 150, 'align' => 'left'),
        array('label' => 'Docente', 'name' => 'Docente', 'width' => 150, 'align' => 'left'),
        array('label' => 'Horario', 'name' => 'Horario', 'width' => 200, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
    ),
    'sort_name' => 'ID',
    'caption' => 'Asignaturas',
    'div_name' => 'gridCursos',
    'source' => 'campus_virtual/encuestacursos/listadoEncuestaQry/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'ID',
    'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>
<table id="gridCursos" ></table>
<div id="pager"></div>