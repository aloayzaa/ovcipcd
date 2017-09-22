<legend>Reporte de Matriculas</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("matricula/popupEditarMatricula/","Editar Matricula",700,500)',
    'Eliminar' => 'initEvtDel ("matriculaDel")'
);
$Tabla = array('set_columns' => array(array('label' => 'ID', 'name' => 'ID', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Alumno', 'name' => 'Alumno', 'width' => 200, 'align' => 'left'),
                                      array('label' => 'Curso', 'name' => 'Curso', 'width' => 150, 'align' => 'left'),
                                      array('label' => 'Correo', 'name' => 'Correo', 'width' => 150, 'align' => 'left'),
                                      array('label' => 'Celular', 'name' => 'Celular', 'width' => 80, 'align' => 'left'),
                                      array('label' => 'Dni', 'name' => 'Dni', 'width' => 80, 'align' => 'left'),
                                      array('label' => 'Fecha Matricula', 'name' => 'Fecha_Matricula', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Fecha Curso', 'name' => 'Fecha_Curso', 'width' => 75, 'align' => 'left'),
                                     ),
               'sort_name' => 'nPerId',
               'caption' => 'Reporte de Matriculas',
               'div_name' => 'grid_matriculas',
               'source' => 'campus_virtual/reportes1/reportesMQry/'.$parametros['criterio'][0].'_'.$parametros['criterio'][1],
               'loadOnce' => true,
               // 'add_url' => 'customer/exec/add',   
               'gridComplete' => $funciones,
               'pager' => 'pager',
               'primary_key' => 'nPerId',
               'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);


?>    
<div><input type="button" value="Exportar" name="btn_exp_excel" id="btn_exp_excel" class="btn btn-primary" onClick="exportar(cbo_filtro_tipo)"/></div>
<p></p>
<table id="grid_matriculas" ></table>
<div id="pager"></div>
