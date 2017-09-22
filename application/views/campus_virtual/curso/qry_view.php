<legend>Lista de Asignaturas</legend>                                                                                            
<?php
$parametros = $this->input->post('json');

/*if($parametros['criterio']=="CURSO-IEPI"){
    $funciones = array(
    'Editar' => 'initEvtUpd("curso/popupEditarCurso/","Editar Curso",500,400)',
    'Eliminar' => 'initEvtDel ("cursoEstado")',
    'Asignar'=>'initEvtAsig("curso/popupAsignarCuenta/","Asignar Cuenta",500,400)',
    'Detallar' => 'initEvtDet("curso/popupDetallarDatos/","Detalle Curso",500,400)',   
    );
}
else {*/
   $funciones = array(
    'Editar' => 'initEvtUpd("curso/popupEditarCurso/","Editar Curso",480,270)',
    'Eliminar' => 'initEvtDel ("cursoEstado")',
    'Asignar'=>'initEvtAsig("curso/popupAsignarCuenta/","Asignar Cuenta",500,270)',
    'Detallar' => 'initEvtDet("curso/popupDetallarDatos/","Detalle Curso",550,480)',
    ); 
//}

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nCurId', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'cCurNombre', 'width' => 150, 'align' => 'left'),
        array('label' => 'Descripcion', 'name' => 'cCurDescripcion', 'width' => 200, 'align' => 'left'),
        array('label' => 'Tipo', 'name' => 'cCurTipo', 'width' => 100, 'align' => 'left'),
        array('label' => 'Cuenta', 'name' => 'nCurCuentaIngreso', 'width' => 100, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 80, 'align' => 'center'),
    ),
    'sort_name' => 'nCurId',
    'caption' => 'Asignaturas',
    'div_name' => 'gridCursos',
    'source' => 'campus_virtual/curso/cursoQry/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nCurId',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="gridCursos" ></table>
<div id="pager"></div>
</div>


