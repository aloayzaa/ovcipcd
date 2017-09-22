<legend>Lista de Asignaturas Temporales</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Activar Asignatura' => 'initEvtOpcPopupId("check","curso/popupActivarCursoTemporal/","Activar Horario",500,300)'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nCurId', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'cCurNombre', 'width' => 150, 'align' => 'left'),
        array('label' => 'Descripcion', 'name' => 'cCurDescripcion', 'width' => 200, 'align' => 'left'),
        array('label' => 'Tipo', 'name' => 'cCurTipo', 'width' => 100, 'align' => 'left'),
//        array('label' => 'Descuento', 'name' => 'nCurDescuento', 'width' => 70, 'align' => 'center'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
    ),
    'sort_name' => 'nCurId',
    'caption' => 'Asignaturas',
    'div_name' => 'gridCursosTemporales',
    'source' => 'campus_virtual/curso/cursoQryTemporales/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nCurId',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="gridCursosTemporales" ></table>
<div id="pager"></div>
</div>
