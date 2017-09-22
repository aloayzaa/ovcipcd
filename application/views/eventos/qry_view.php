<legend>Listado de Eventos CIP-CDLL</legend>
<?php
$funciones = array('Editar'=>'initEvtUpd("eventos/popupEditar/","Editar Evento","610","520")',
    'Eliminar'=>'initEvtDel("eventosDel")'
        );
$tabla= array(
    'set_columns'=>array(
        array('label'=>'ID','name'=>'nEveId','width'=>40,'size' => '40','align'=>'center','sorttype'=>'int'),
        array('label'=>'N° Cuenta','name'=>'cEveCuentaIngreso','width'=>60,'size' => '60','align'=>'left'),
        array('label'=>'Titulo','name'=>'cEveTitulo','width'=>200,'size' => '150','align'=>'left'),
        array('label'=>'Fecha Ini ','name'=>'cFechaEven','width'=>80,'size' => '90','align'=>'left'),
        array('label'=>'Fecha Fin','name'=>'cFechaEven','width'=>80,'size' => '90','align'=>'left'),
        array('label'=>'Tipo','name'=>'nEveTipoEvento','width'=>90,'size' => '80','align'=>'center'),
        array('label'=>'opciones','name'=>'opcion','width'=>60,'size' => '80','align'=>'center'),
    ),
    'sort_name'=>'nEveId',
    'caption'=>'Lista Eventos',
    'div_name'=>'grid_eventos',
    'source'=>'eventos/eventos/eventosQry',
    'loadOnce'=>TRUE,
    'gridComplete'=>$funciones,
    'pager'=>'pager',
    'primary_key'=>'nEveId',
    'grid_height'=>300
    );
echo $this->jqgrid->set_CrearGrid($tabla);
?>
<table id="grid_eventos"></table>
<div id="pager"></div>