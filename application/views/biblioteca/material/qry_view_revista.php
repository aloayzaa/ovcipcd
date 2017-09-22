<?php
$parametros=$this->input->post('json');
$titulo = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['titulo'], 'UTF-8')));
$editorial = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['editorial'], 'UTF-8')));
$categoria = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['categoria'], 'UTF-8')));
$metodo_close='revistaQry()';

$funcioness = array(
    'Editar' => 'initEvtUpd("material/popupEditarRevista/","Editar Revista",700,500)',
    'Vita Previa' => 'initEvtOpcPopupId("newwin","material/popupVistaPreviaRevista/","Vista Previa - Revista","550","350")',
    'Eliminar' => 'initEvtDel ("revistaDel")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed","material/popupUpload_revista/","Archivos Multimedia Revista","500","200")',
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'Titulo', 'name' => 'cMatTitulo', 'width' => 250, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Autor', 'name' => 'cMatAutor', 'width' => 60, 'align' => 'left'),
        array('label' => 'Editorial', 'name' => 'cMatEditorial', 'width' => 60, 'align' => 'left'),
        array('label' => 'Edicion', 'name' => 'cMatEdicion', 'width' => 60, 'align' => 'left'),
        array('label' => 'Categoria', 'name' => 'cMatCategoria', 'width' => 150, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 80, 'align' => 'center'),
    ),
    'sort_name' => 'nMatId',
    'caption' => 'Lista de Revistas',
    'div_name' => 'griRevista',
    'source' => 'biblioteca/material/revistaQry/' . $titulo . '/' . $editorial. '/' . $categoria,
    
    'loadOnce' => true, 
    'gridComplete' => $funcioness,
    'pager' => 'pager',
    'primary_key' => 'nMatId',
    'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="griRevista" ></table>
<div id="pager"></div>
</div>


