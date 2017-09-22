<legend>Lista de Docentes</legend>                                                                                            
<?php
//$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("docente/popupEditarDocente/","Editar Docente",500,400)',
    'Eliminar' => 'initEvtDel ("docenteDel")'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'id', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Datos Personales', 'name' => 'DatosPersonales', 'width' => 200, 'align' => 'left'),
        //array('label' => 'Foto', 'name' => 'Foto', 'width' => 100, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
    ),
    'sort_name' => 'id',
    'caption' => 'Lista de Docentes',
    'div_name' => 'grid',
    'source' => 'campus_virtual/docente/docenteQry/',
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