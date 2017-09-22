<legend>Lista de Horario</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Iniciar Horario' => 'initEvtOpcPopupId("check","horario/popupActivarHorario/","Activar Horario",500,300)',
    'Editar' => 'initEvtUpd("horario/popupEditarHorario/","Editar Horario",700,500)',
    'Prorroga' => 'initEvtOpcPopupId("plus","horario/popupProrroga/","Prorroga para editar Notas",530,300)',
    'Asistencia' => 'initEvtOpcPopupId("clipboard","horario/popupAsistenciasDocente/","Asistencias del Docente",500,300)',
    'Inasistencia' => 'initEvtOpcPopupId("note","horario/popupInasistenciaSesion/","Justificación de Inasistencias del Docente",650,300)',
    'Promedios' => 'initEvtOpcPopupId("star","horario/popupReportePromediosFinales/","Lista de Promedios Finales",430,300)',
     'Reportes' => 'initEvtOpcPopupId("search","horario/popupReporteAlumno/","Reporte de Notas y Asistencias",650,300)',
    'Eliminar' => 'initEvtDel ("horarioDel")'
);

$Tabla = array(
    'set_columns' => array(
        array('label' => 'ID', 'name' => 'ID', 'width' => 40, 'align' => 'center', 'sorttype' => 'int'),
        array('label' => 'Docente', 'name' => 'Docente', 'width' => 240, 'align' => 'left'),
        array('label' => 'Horario', 'name' => 'Horario', 'width' => 260, 'align' => 'left'),
        array('label' => 'Ambiente', 'name' => 'Ambiente', 'width' => 100, 'align' => 'left'),
        array('label' => 'Opciones', 'name' => 'opcion', 'width' => 130, 'align' => 'center'),
        ),
    'sort_name' => 'ID',
    'caption' => 'Lista de Horario',
    'div_name' => 'grid',
    'source' => 'campus_virtual/horario/horarioQry/'.$parametros['criterio'],
    'loadOnce' => true,
    // 'add_url' => 'customer/exec/add',   
    'gridComplete' => $funciones,
    'pager' => 'pager',
    'primary_key' => 'ID',
    'grid_height' => 300
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>
</div>