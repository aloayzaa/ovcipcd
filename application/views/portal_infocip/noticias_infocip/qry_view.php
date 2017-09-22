<?php
$parametros = $this->input->post('json');

$funciones = array(
    'Editar' => 'initEvtUpd("noticias_infocip/popupNoticiasInfocip/",
        "EDITAR NOTICIA INFOCIP",
        600,100)',
    'Eliminar' => 'initEvtDel("NoticiasInfocipDel")',
    'Vista Previa' => 'initEvtOpcPopupId("newwin",
        "noticias_infocip/popupVistaPrevia/",
        "Vista Previa - Noticias Infocip",
        "550","350")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed",
        "noticias_infocip/popupUpload/",
        "Archivos Multimedia Noticias Infocip",
        "550","300")',
);
$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nNotCodigo','width' => 50, 'size' => '60', 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Titulo', 'name' => 'cNotTitulo', 'width' => 220, 'size' => '120', 'align' => 'left'),
        array('label' => 'Sumilla', 'name' => 'cNotSumilla', 'width' => 200, 'size' => '120', 'align' => 'left'),
        array('label' => 'Fecha Inicial', 'name' => 'cNotFechaInicial', 'width' => 110, 'size' => '300', 'align' => 'left'),
        array('label' => 'Fecha de caducidad', 'name' => 'cNotFechaFinal', 'width' => 110, 'size' => '300', 'align' => 'left'),
        array('label' => 'opciones', 'name' => 'opcion', 'width' => 70, 'size' => '10', 'align' => 'center'),
    ),
    'sort_name' => 'nNotCodigo',
    'caption' => 'Listado de Noticias Infocip',
    'div_name' => 'grid_noticias',
    'source' => 'portal_infocip/noticias_infocip/NoticiasInfocipQry/' . $parametros['criterio'],
    'loadOnce' => true,
    'pager' => 'pager',
    'gridComplete' => $funciones,
    'primary_key' => 'nNotCodigo',
    'grid_height' => 200
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid_noticias" ></table>
<div id="pager"></div>
