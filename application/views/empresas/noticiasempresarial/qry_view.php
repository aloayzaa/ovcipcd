<?php
$parametros = $this->input->post('json');
//$metodo_close='NoticiasEmpresarialQry()';
//$cPerNombres = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['cPerNombres'], 'UTF-8')));
//$Ruc = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['Ruc'], 'UTF-8')));
//$Rubro = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['Rubro'], 'UTF-8')));
$funciones = array(
    'Editar' => 'initEvtUpd("noticiasempresariales/popupNoticiasEmpresarial/","EDITAR NOTICIA EMPRESARIAL",600,100)',
    'Eliminar' => 'initEvtDel("NoticiasEmpresarialDel")',
    'Vista Previa' => 'initEvtOpcPopupId("newwin","directorio/popupDirectorio/","Asignar Directorio a Empresa","610","520")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed","noticiasempresariales/popupUpload/","Asignar Archivo Multimedia","430","200")',
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
    'caption' => 'Listar Noticias Empresariales',
    'div_name' => 'grid_not_empresarial',
    'source' => 'empresas/noticiasempresariales/NoticiasEmpresarialQry/' . $parametros['criterio'],
//        'source' => 'empresas/noticiasempresariales/NoticiasEmpresarialQry/' . $cPerNombres . '/' . $Ruc . '/' . $Rubro,
    'loadOnce' => true,
    'pager' => 'pager',
    'gridComplete' => $funciones,
    'primary_key' => 'nNotCodigo',
    'grid_height' => 300
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid_not_empresarial" ></table>
<div id="pager"></div>
