
<?php
$parametros=$this->input->post('json');
$codigo = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['codigo'], 'UTF-8')));
$autor = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['autor'], 'UTF-8')));
$titulo = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['titulo'], 'UTF-8')));
$metodo_close='materialQry()';

$funciones = array(
    'Editar' => 'initEvtUpd("material/popupEditarMaterial/","Editar Tesis",800,500)',
    'Vista Previa' => 'initEvtOpcPopupId("newwin","material/popupVistaPreviaTesis/","Vista Previa - Tesis","550","350")',
     'Eliminar' => 'initEvtDel ("tesisDel")',
    'Multimedia' => 'initEvtOpcPopupId("folder-collapsed","material/popupUpload/","Archivos Multimedia Tesis","500","200")',
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'Tipo', 'name' => 'cMatTipo', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Codigo', 'name' => 'cMatcodigo', 'width' => 60, 'align' => 'left'),
        array('label' => 'Titulo', 'name' => 'cMatTitulo', 'width' => 250, 'align' => 'left'),
         array('label' => 'Especialidad', 'name' => 'descesp', 'width' => 150, 'align' => 'left'),
        array('label' => 'Autor', 'name' => 'cMatAutor', 'width' => 150, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 80, 'align' => 'center'),
    ),
    'sort_name' => 'nMatId',
    'caption' => 'Lista de Materiales',
    'div_name' => 'grid',
    'source' => 'biblioteca/material/materialQry/' . $codigo . '/' . $autor . '/' . $titulo,
    
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nMatId',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>
