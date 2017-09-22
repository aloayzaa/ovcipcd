<legend>Reporte de Pagos por Cursos</legend>                                                                                            
<?php
$parametros = $this->input->post('json');
$funciones = array(
    'Editar' => 'initEvtUpd("matricula/popupEditarMatricula/","Editar Matricula",700,500)',
    'Eliminar' => 'initEvtDel ("matriculaDel")'
);
$Tabla = array('set_columns' => array(array('label' => 'Id', 'name' => 'Id', 'width' => 50, 'align' => 'left'),
                                      array('label' => 'Alumno', 'name' => 'Alumno', 'width' => 200, 'align' => 'left'),
                                      array('label' => 'Nro_Voucher', 'name' => 'Nro_Voucher', 'width' => 150, 'align' => 'left'),
                                      array('label' => 'Monto', 'name' => 'Monto', 'width' => 75, 'align' => 'left'),
                                      array('label' => 'Fecha_Pago', 'name' => 'Fecha_Pago', 'width' => 75, 'align' => 'left'),
                                     ),
               'sort_name' => 'nPagId',
               'caption' => 'Reporte de Pagos por Horario',
               'div_name' => 'grid_pagos',
               'source' => 'campus_virtual/reportes1/reportesPQry/'.$parametros['criterio'],
               'loadOnce' => true,
               // 'add_url' => 'customer/exec/add',   
               'gridComplete' => $funciones,
               'pager' => 'pager',
               'primary_key' => 'nPagId',
               'grid_height' => 250
);

echo $this->jqgrid->set_CrearGrid($Tabla);
?>
<div><input type="button" value="Exportar" name="btn_exp_excel" id="btn_exp_excel" class="btn btn-primary" onClick="exportar1()"/></div>
<p></p>
<table id="grid_pagos" ></table>
<div id="pager"></div>