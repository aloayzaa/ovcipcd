<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("matricula/popupEditarMatricula/","Editar Matricula",700,500)',
    'Eliminar' => 'initEvtDel ("matriculaDel")'
);
$Tabla = array('set_columns' => array(array('label' => 'ID', 'name' => 'ID', 'width' => 25, 'align' => 'left'),
                                      array('label' => 'Alumno', 'name' => 'Alumno', 'width' => 150, 'align' => 'left'),
                                      array('label' => 'Curso', 'name' => 'Curso', 'width' => 150, 'align' => 'left'),
                                      array('label' => 'Fechas', 'name' => 'Fecha', 'width' => 100, 'align' => 'left'),
                                      array('label' => 'Promedio', 'name' => 'Promedio', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Certificado', 'name' => 'Certificado', 'width' => 150, 'align' => 'left'),
                                     ),
               'sort_name' => 'nPerId',
               'caption' => 'Record Academico',
               'div_name' => 'grid_record',
               'source' => 'campus_virtual/reportes1/reportesRQry/'.$parametros['criterio'],
               'loadOnce' => true,
               // 'add_url' => 'customer/exec/add',   
               'gridComplete' => $funciones,
               'pager' => 'pager',
               'primary_key' => 'nPerId',
               'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid_record" ></table>
<div id="pager"></div>