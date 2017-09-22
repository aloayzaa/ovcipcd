<legend>Lista de Miembros</legend>
<?php
$parametros = $this->input->post('json');
$apellidos = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['apellidos'], 'UTF-8')));
$funciones = array('Editar'=>'initEvtUpd("miembrosperitos/popupEditar/","Editar Perito",540,370)',
    'Vista Previa' => 'initEvtOpcPopupId("newwin",
        "miembrosperitos/popupVistaPrevia/",
        "Vista Previa - Perito",
        "550","350")',
    'Eliminar'=>'initEvtDel("MiembrosDel")'
        );
$tabla= array(
    'set_columns'=>array(
        array('label'=>'ID','name'=>'nPeritoId','width'=>60,'align'=>'center','sorttype'=>'int'),
        array('label'=>'N° CIP','name'=>'nCip','width'=>60,'align'=>'left'),
        array('label'=>'Datos','name'=>'cPeritoDatos','width'=>190,'align'=>'left'),
        array('label'=>'Especialidad','name'=>'cEspecialidad','width'=>70,'align'=>'left'),
        array('label'=>'Adscrito','name'=>'cPeritoAdscrito','width'=>90,'align'=>'left'),
        array('label'=>'Contacto','name'=>'cPeritoFijo','width'=>70,'align'=>'left'),
        array('label'=>'Email','name'=>'email','width'=>130,'align'=>'left'),
        array('label'=>'Fecha Inscripción','name'=>'cFechaInscripcion','width'=>100,'align'=>'left'),
        array('label'=>'Fecha Caducidad','name'=>'fechafin','width'=>100,'align'=>'left'),
        array('label'=>'Estado','name'=>'cPeritoRenovacion','width'=>80,'align'=>'left'),
        array('label'=>'opciones','name'=>'opcion','width'=>55,'align'=>'center'),
    ),
    'sort_name'=>'nPeritoId',
    'caption'=>'Lista de los Miembros Peritos',
    'div_name'=>'grid_miembros',
    'source'=>'miembrosperitos/miembrosperitos/miembrosQry/'.$apellidos,
    'loadOnce'=>TRUE,
    'gridComplete'=>$funciones,
    'pager'=>'pager',
    'primary_key'=>'nPeritoId',
    'grid_width'=>400,
    'grid_height'=>300
    );
echo $this->jqgrid->set_CrearGrid($tabla);
?>
<table id="grid_miembros"></table>
<div id="pager"></div>