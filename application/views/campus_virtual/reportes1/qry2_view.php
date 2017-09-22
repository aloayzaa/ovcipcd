<legend>Reporte de Cursos</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("matricula/popupEditarMatricula/","Editar Matricula",700,500)',
    'Eliminar' => 'initEvtDel ("matriculaDel")'
);
$Tabla = array('set_columns' => array(array('label' => 'Horario', 'name' => 'Horario', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Curso', 'name' => 'Curso', 'width' => 100, 'align' => 'left'),
                                      array('label' => 'Docente', 'name' => 'Dia', 'width' => 200, 'align' => 'left'),
                                      array('label' => 'Fecha Inicio', 'name' => 'Fecha_Inicio', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Fecha Fin', 'name' => 'Fecha_Fin', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Cantidad Inscritos', 'name' => 'Cantidad_Inscritos', 'width' => 50, 'align' => 'center'),
                                     ),
               'sort_name' => 'nHorId',
               'caption' => 'Reporte de Cursos',
               'div_name' => 'grid_cursos',
               'source' => 'campus_virtual/reportes1/reportesCQry/'.$parametros['criterio'][0].'_'.$parametros['criterio'][1],
               'loadOnce' => true,
               // 'add_url' => 'customer/exec/add',   
               'gridComplete' => $funciones,
               'pager' => 'pager',
               'primary_key' => 'nHorId',
               'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<div><input type="button" value="Exportar" name="btn_exp_excel" id="btn_exp_excel" class="btn btn-primary" onClick="exportar(cbo_filtro_tipo)"/></div>
<p></p>
<table id="grid_cursos" ></table>
<div id="pager"></div>