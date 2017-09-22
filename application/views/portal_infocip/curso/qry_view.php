<legend>Lista de Cursos</legend>                                                                                            
<?php

$funciones = array(
    'Editar' => 'initEvtUpd("curso/popupEditarCurso/","Editar Curso",700,500)',
    'Eliminar' => 'initEvtDel ("cursoEstado")'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nCurId', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'cCurNombre', 'width' => 100, 'align' => 'left'),
        array('label' => 'Descripcion', 'name' => 'cCurDescripcion', 'width' => 250, 'align' => 'left'),
        array('label' => 'Tipo', 'name' => 'cCurTipo', 'width' => 70, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
    ),
    'sort_name' => 'nCurId',
    'caption' => 'Lista de Cursos',
    'div_name' => 'grid',
    'source' => 'portal_infocip/curso/cursoQry/',
    'loadOnce' => true,
      
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nCurId',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>

