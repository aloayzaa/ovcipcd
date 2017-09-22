<legend>Lista de Preguntas</legend>                                                                                           
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("encuesta/popupEditarPregunta/","Editar Pregunta",500,300)',
    'Eliminar' => 'initEvtDel ("preguntaEstado")'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nPreId', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Pregunta', 'name' => 'cPreEnunciado', 'width' => 450, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
    ),
    'sort_name' => 'nPreId',
    'caption' => 'Lista de Pregunta',
    'div_name' => 'grid',
    'source' => 'campus_virtual/encuesta/encuestaQry/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nPreId',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
<!--</div>-->


