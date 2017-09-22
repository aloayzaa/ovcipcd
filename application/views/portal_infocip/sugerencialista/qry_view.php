<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/jsSugerencialista.js'></script>                     
<legend>Lista de Sugerencias</legend>                                                                                            
<?php

$funciones = array(

    'Eliminar' => 'initEvtDel ("sugerenciaDel")'
);
$Tabla = array(
    'set_columns' => array(
        array('label' => 'Id', 'name' => 'Id', 'width' => 60, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Nombre', 'name' => 'nombre', 'width' => 100, 'align' => 'left'),
        array('label' => 'Email', 'name' => 'email', 'width' => 100, 'align' => 'left'),     
         array('label' => 'Sugerencia', 'name' => 'sugerencia', 'width' => 200, 'align' => 'left'),  
       array('label' => 'Opciones', 'name' => 'opciones', 'width' => 52, 'align' => 'left'),     
    ),
    'sort_name' => 'nSugerenciaId',
    'caption' => '',
    'div_name' => 'grid',
     'source' => 'portal_infocip/sugerencialista/sugerenciaQry/',
    'loadOnce' => true,
  
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'nSugerenciaId',
    'grid_height' => 300
);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>


