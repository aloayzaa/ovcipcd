<legend>Mis Cursos</legend>   
<?php
//$parametros = $this->input->post('json');


$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'idCurso', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Curso', 'name' => 'Nombre', 'width' => 500, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 100, 'align' => 'center'),
    ),
    'sort_name' => 'idCurso',
    'caption' => 'Lista de Cursos',
    'div_name' => 'grid',
    'source' => 'campus_virtual/curso/cursoQry/',
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'idCurso',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
