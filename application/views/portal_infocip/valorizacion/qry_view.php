<legend>Lista de Valorizacion</legend>                                                                                            
<?php
$funciones = array(
    'Editar' => 'initEvtUpd("valorizacion/popupEditarValorizacion/","Editar Valorizacion",400,200)',
    'Eliminar' => 'initEvtDel ("valorizacionDel")'

);
$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'n_ValId', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
          array('label' => 'Nombre del curso', 'name' => 'n_ValCodcurso', 'width' => 100, 'align' => 'left'),
        array('label' => 'Descripcion', 'name' => 'c_ValDesripcionCurso', 'width' => 250, 'align' => 'left'),
        array('label' => 'Fecha de caducidad', 'name' => 'c_ValFechaCaducidad', 'width' => 70, 'align' => 'left'),
        //aca modifique       
        array('label' => 'Votos', 'name' => 'n_ValVot', 'width' => 50, 'align' => 'center'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 70, 'align' => 'center'),
    ),
    'sort_name' => 'n_ValId',
    'caption' => 'Lista de valorizaciones',
    'div_name' => 'grid',

     'source' => 'portal_infocip/valorizacion/valorizacionQry/',
    'loadOnce' => true,
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'n_ValId',
    'grid_height' => 300
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>


