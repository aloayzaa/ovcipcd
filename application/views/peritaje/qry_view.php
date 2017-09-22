<legend>Listado Personas Naturales</legend>
<?php
$parametros = $this->input->post('json');
$apellidos = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['apellidos'], 'UTF-8')));
$funciones = array('Editar'=>'initEvtUpd("persona/popupEditar/","Editar Persona",440,370)',
    'Eliminar'=>'initEvtDel("personaDel")'
        );
$tabla= array(
    'set_columns'=>array(
        array('label'=>'ID','name'=>'id','width'=>60,'align'=>'center','sorttype'=>'int'),
        array('label'=>'Nombres','name'=>'nombre','width'=>120,'align'=>'left'),
        array('label'=>'Apellido Paterno','name'=>'apellidopat','width'=>100,'align'=>'left'),
        array('label'=>'Apellido Materno','name'=>'apellidomat','width'=>100,'align'=>'left'),
        array('label'=>'DNI','name'=>'dni','width'=>100,'align'=>'left'),
        array('label'=>'Correo','name'=>'correo','width'=>100,'align'=>'left'),
        array('label'=>'Telefono','name'=>'telefono','width'=>100,'align'=>'left'),
	 array('label'=>'Celular','name'=>'celular','width'=>100,'align'=>'left'),
        array('label'=>'opciones','name'=>'opcion','width'=>60,'align'=>'center'),
    ),
    'sort_name'=>'id',
    'caption'=>'Lista Persona',
    'div_name'=>'grid_persona',
    'source'=>'peritaje/persona/personaQry/'.$apellidos,
    'loadOnce'=>TRUE,
    'gridComplete'=>$funciones,
    'pager'=>'pager',
    'primary_key'=>'id',
    'grid_height'=>200
    );
echo $this->jqgrid->set_CrearGrid($tabla);
?>
<table id="grid_persona"></table>
<div id="pager"></div>