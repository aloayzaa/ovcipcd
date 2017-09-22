<legend>Lista de Reservas</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("matricula/popupEditarReserva/","EDITAR RESERVA",470,500)',
    'Eliminar' => 'initEvtDel ("matriculaDel")'
);

$Tabla = array('set_columns' => array(array('label' => 'Alumno', 'name' => 'Alumno', 'width' => 200, 'align' => 'left'),
  array('label' => 'Dni', 'name' => 'Dni', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Curso', 'name' => 'Curso', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Correo', 'name' => 'Correo', 'width' => 100, 'align' => 'left'),
                                      array('label' => 'Celular', 'name' => 'Celular', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Fecha Inicio', 'name' => 'Fecha_Inicio', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Dia', 'name' => 'Dia', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Hora Inicio', 'name' => 'Hora_Inicio', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Hora Fin', 'name' => 'Hora_Fin', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Ambiente', 'name' => 'Ambiente', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center'),
                                     ),
               'sort_name' => 'nMatEstado',
               'caption' => 'Lista de Matriculas',
               'div_name' => 'grid',
               'source' => 'campus_virtual/matricula/matriculaQry/'.$parametros['criterio'].'-'.$parametros['hor'],
               'loadOnce' => true,
               // 'add_url' => 'customer/exec/add',   
               'gridComplete' => $funciones,
               'pager' => 'pager',
               'primary_key' => 'IdCombinado',
               'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>    
<table id="grid" ></table>
<div id="pager"></div>