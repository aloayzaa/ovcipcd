<?php
$parametros = $this->input->post('json');
//$metodo_close='NoticiasEmpresarialQry()';
//$parametros = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametro['criterio'], 'UTF-8')));
$funciones = array(
    'Editar' => 'initEvtUpd("bolsa_trabajo/popupBolsaTrabajo/","EDITAR BOLSA DE TRABAJO",600,100)',
    'Eliminar' => 'initEvtDel("BolsaTrabajoDel")',
    'Vista Previa' => 'initEvtOpcPopupId("newwin","bolsa_trabajo/popupVistaPrevia/","Vista Previa - Bolsa de Trabajo","550","350")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed","bolsa_trabajo/popupUpload/","Archivos Multimedia Bolsa de Trabajo","550","300")',
);
$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'nNotCodigo', 'width' => 50, 'size' => '60', 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Titulo', 'name' => 'cNotTitulo', 'width' => 220, 'size' => '120', 'align' => 'left'),
        array('label' => 'Sumilla', 'name' => 'cNotSumilla', 'width' => 370, 'size' => '120', 'align' => 'left'),
        array('label' => 'Fecha', 'name' => 'cNotFechaFinal', 'width' => 60, 'size' => '300', 'align' => 'left'),
        array('label' => 'opciones', 'name' => 'opcion', 'width' => 70, 'size' => '10', 'align' => 'center'),
    ),
    'sort_name' => 'nNotCodigo',
    'caption' => 'Listado de Bolsa de Trabajo',
    'div_name' => 'grid_bolsa_trabajo',
    'source' => 'portal/bolsa_trabajo/BolsaTrabajoQry/' . $parametros['criterio'],
//        'source' => 'empresas/noticiasempresariales/NoticiasEmpresarialQry/' . $cPerNombres . '/' . $Ruc . '/' . $Rubro,
    'loadOnce' => true,
    'pager' => 'pager',
    'gridComplete' => $funciones,
    'primary_key' => 'nNotCodigo',
    'grid_height' => 300
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid_bolsa_trabajo" ></table>
<div id="pager"></div>
