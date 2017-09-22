<?php

$funciones = array(
    'Editar' => 'initEvtUpd("anuncio/popupAnuncio/",
        "EDITAR ANUNCIO",
        600,100)',
    'Eliminar' => 'initEvtDel("AnuncioDel")',
    'Vista Previa' => 'initEvtOpcPopupId("newwin",
        "anuncio/popupVistaPrevia/",
        "Vista Previa - Anuncio",
        "550","350")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed",
        "anuncio/popupUpload/",
        "Archivos Multimedia Anuncio",
        "550","300")',
);
$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nNotCodigo','width' => 50, 'size' => '60', 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'cNotTitulo', 'width' => 200, 'size' => '120', 'align' => 'left'),
       array('label' => 'Link', 'name' => 'cNotSumilla', 'width' => 200, 'size' => '120', 'align' => 'left'),
        array('label' => 'Tipo', 'name' => 'cTipoPortal', 'width' => 50, 'size' => '10', 'align' => 'left'),
        array('label' => 'Fecha caducidad', 'name' => 'cNotFechaFinal', 'width' => 100, 'size' => '300', 'align' => 'left'),
        array('label' => 'opciones', 'name' => 'opcion', 'width' => 70, 'size' => '10', 'align' => 'center'),
    ),
    'sort_name' => 'nNotCodigo',
    'caption' => 'Listado de Anuncios',
    'div_name' => 'grid_anuncio_trabajo',
    'source' => 'portal_infocip/anuncio/AnuncioQry/' ,
    'loadOnce' => true,
    'pager' => 'pager',
    'gridComplete' => $funciones,
    'primary_key' => 'nNotCodigo',
    'grid_height' => 300
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid_anuncio_trabajo" ></table>
<div id="pager"></div>
