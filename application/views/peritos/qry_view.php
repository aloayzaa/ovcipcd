<legend>Listado de Solicitudes</legend>
<?php
$parametros = $this->input->post('json');
$remitente = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['remitente'], 'UTF-8')));
$funciones = array('Editar'=>'initEvtUpd("peritos/popupEditar/","Editar Solicitud",540,370)',
    'Vista Previa' => 'initEvtOpcPopupId("newwin",
        "peritos/popupVistaPrevia/",
        "Vista Previa - Solicitud",
        "550","750")',
    'Asignar' => 'initEvtOpcPopupId("circle-plus",
        "peritos/popupAsignar/",
        "Asignar Peritos - Solicitud",
        "555","350")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed",
        "peritos/popupUpload/",
        "Archivo Multimedia de Solicitud-Peritaje",
        "550","300")',
    'Eliminar'=>'initEvtDel("SolicitudDel")'
        );
$tabla= array(
    'set_columns'=>array(
        array('label'=>'ID','name'=>'nSolId','width'=>50,'align'=>'center','sorttype'=>'int'),
        array('label'=>'Remitente','name'=>'Remitente','width'=>210,'align'=>'left'),
        array('label'=>'Asunto','name'=>'nSolAsunto','width'=>210,'align'=>'left'),
        array('label'=>'Fecha Emitida','name'=>'fecha','width'=>70,'align'=>'left'),
        array('label'=>'Fecha Final','name'=>'fechafin','width'=>70,'align'=>'left'), 
        array('label'=>'Estado','name'=>'estado','width'=>70,'align'=>'left'), 
        array('label'=>'opciones','name'=>'opcion','width'=>85,'align'=>'center'),
    ),
    'sort_name'=>'nSolId',
    'caption'=>'Lista de Solicitudes',
    'div_name'=>'grid_peritos',
    'source'=>'peritos/peritos/peritosQry/'.$remitente,
    'loadOnce'=>TRUE,
    'gridComplete'=>$funciones,
    'pager'=>'pager',
    'primary_key'=>'nSolId',
    'grid_width'=>700,
    'grid_height'=>300
    );
echo $this->jqgrid->set_CrearGrid($tabla);
?>
<table id="grid_peritos"></table>
<div id="pager"></div>