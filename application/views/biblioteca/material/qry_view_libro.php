<?php
$parametros=$this->input->post('json');
$titulo = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['titulo'], 'UTF-8')));
$autor = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['autor'], 'UTF-8')));

$metodo_close='libroQry()';

$funcioness = array(
    'Editar' => 'initEvtUpd("material/popupEditarLibro/","Editar Libro",700,500)',
    'Vita Previa' => 'initEvtOpcPopupId("newwin","material/popupVistaPrevia_libro/","Vista Previa - Libro","550","350")',
    'Eliminar' => 'initEvtDel ("libroDel")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed","material/popupUpload_libro/","Archivos Multimedia Libro","500","200")'
    
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'Titulo', 'name' => 'cMatTitulo', 'width' => 250, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Autor', 'name' => 'cMatAutor', 'width' => 100, 'align' => 'left'),
        array('label' => 'Editorial', 'name' => 'cMatEditorial', 'width' => 60, 'align' => 'left'),
        array('label' => 'Edicion', 'name' => 'cMatEdicion', 'width' => 60, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 100, 'align' => 'center'),
    ),
    'sort_name' => 'nMatId',
    'caption' => 'Lista de Libros',
    'div_name' => 'griLibro',
    'source' => 'biblioteca/material/libroQry/' . $titulo . '/' . $autor,
    
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funcioness,
    'pager' => 'pager',
    'primary_key' => 'nMatId',
    'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="griLibro" ></table>
<div id="pager"></div>
</div>

