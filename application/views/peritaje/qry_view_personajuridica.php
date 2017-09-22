<legend>Listado Personas Juridicas</legend>
<?php
$parametros = $this->input->post('json');
$apellidos = trim(preg_replace("/ +/", " ", mb_convert_encoding($parametros['apellidos'], 'UTF-8')));
$funciones = array('Editar'=>'initEvtUpd("persona/popupEditar_personajuridica/","Editar Persona",440,370)',
    'Eliminar'=>'initEvtDel("personajuridicaDel")'
        );
$tabla= array(
    'set_columns'=>array(
        array('label'=>'ID','name'=>'nPerId','width'=>60,'align'=>'center','sorttype'=>'int'),
        array('label'=>'Razon Social','name'=>'cPerNombres','width'=>100,'align'=>'left'),
        array('label'=>'Ruc','name'=>'Ruc','width'=>80,'align'=>'left'),
        array('label'=>'Rubro','name'=>'Rubro','width'=>100,'align'=>'left'),
        array('label'=>'Telefono','name'=>'Tel','width'=>100,'align'=>'left'),
        array('label'=>'Fax','name'=>'Fax','width'=>100,'align'=>'left'),
        array('label'=>'Email','name'=>'Email','width'=>100,'align'=>'left'),
        array('label'=>'opciones','name'=>'opcion','width'=>60,'align'=>'center'),
    ),
    'sort_name'=>'nPerId',
    'caption'=>'Lista Persona Juridica',
    'div_name'=>'grid_persona_juridica',
    'source'=>'peritaje/persona/personajuridicaQry/'.$apellidos,
    'loadOnce'=>TRUE,
    'gridComplete'=>$funciones,
    'pager'=>'pager',
    'primary_key'=>'nPerId',
    'grid_height'=>200
    );
echo $this->jqgrid->set_CrearGrid($tabla);
?>
<table id="grid_persona_juridica"></table>
<div id="pager"></div>