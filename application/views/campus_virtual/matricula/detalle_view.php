   <?php
  //  $btn_upd_matricula = form_button('btn_upd_matricula','Actualizar Matricula')
    /*form_submit('btn_upd_matricula', 
    'Modificar Matricula', 
    'id="btn_upd_matricula" class="btn btn-warning"')*/;

//$btn_act_pago = form_button('btn_act_pago','Actualizar Pago');
/* form_submit('btn_act_pago', 
    'Actualizar Pago', 
    'id="btn_act_pago" class="btn btn-primary"');*/

/*$data = array(
'name' => 'button',
'id' => 'btn_upd_matricula',
'value' => 'true',
'content' => 'Actualizar Matricula'
);
 $btn_upd_matricula =form_button($data);

$data2 = array(
'name' => 'button',
'id' => 'btn_act_pago',
'value' => 'true',
'content' => 'Actualizar Pago'
);
$btn_act_pago = form_button($data2);*/

   ?>


    <div id="montoCurso" class="control-group">
        <label class="control-label">Monto Total del Curso: <strong><?php echo $montoCurso ?></strong></label>
      
            
       
    </div>
    <div id="alertadePago">
      <strong>
      <?php if($pagosCurso==$montoCurso){
            echo '<div class="alert alert-success">Pago Completo</div>';
           }
            else if($pagosCurso<$montoCurso){
              echo '<div class="alert alert-danger">Pago Incompleto. Su deuda es '.($montoCurso-$pagosCurso).' </div>';
            }
            else if($pagosCurso>$montoCurso)
               echo '<div class="alert alert-warning">Quiere colaborar con el colegio</div>';
        ?>
      </strong>
    </div>
    <div id="div_btn_upd_matricula" style="display:none" class="control-group">
         <label class="control-label"></label>
        <div class="control-label">
          <button id="btn_upd_matricula" class="btn btn-warning" onclick="actualizarMatricula()">Actualizar Matricula</button>
          <div id="actualizandoMatricula"></div>
        </div>

    </div>

    <div id="div_listar_pagos_tesoreria" class="control-group">
        <legend>Pagos en Tesoreria</legend>
        <div id="pagosTesoreria">
         <?php if($tesoreria!=NULL){ ?>
            <table border="1" bordercolor="#cacaca" id="listar_pagos_tesoreria" >
                  <thead>
                  <tr>
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">N° Comprobante</th>
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Concepto</th>
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Monto</th>  
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Tipo</th>      
                  </tr>
                   </thead>
                       <tbody>
                     <?php foreach ($tesoreria as $tesoreria) {//1 ?>
            <tr>                                  
                <td style="text-align:center; padding: 5px 5px 5px 5px;"><?php echo $tesoreria->codbol; ?></td>
                <td style="text-align:center; padding: 5px 5px 5px 5px;"><?php echo $tesoreria->descripcion; ?></td>
                <td style="text-align:center; padding: 5px 5px 5px 5px;"><?php echo $tesoreria->preciobol; ?></td>
                <td style="text-align:center; padding: 5px 5px 5px 5px;"><?php echo $tesoreria->tipo; ?></td>
            </tr>

                <?php } ?>
                        </tbody>
            </table>
            
             <div class="control-group">
                <label class="control-label"></label>
                <div class="control-label">
                   <button id="btn_upd_pago" class="btn btn-primary" onclick="actualizarPago()">Actualizar Pago</button>
                   <div id="actualizandoPago"></div>
                </div>
            </div>

        <?php  } else {
            echo "<span class='alert alert-info'>No se ha efectuado ningun Pago</span>";
        }?>
        </div>
    </div>
    <div id="div_listar_pagos_campus" class="control-group">
         <legend>Pagos en Campus Virtual</legend>
         <div id="pagosCampus">
          <?php if($campus!=NULL){ ?>
            <table border="1" bordercolor="#cacaca" id="listar_pagos_campus">
                  <thead>
                  <tr>
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">N° Comprobante</th>
                   <!--   <th>Concepto</th> -->
                      <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Monto</th>  
                       <th style="text-align:center; padding: 5px 5px 5px 5px; background-color: #d5d5d5; font-weight: bold;">Tipo</th>      
                  </tr>
                   </thead>
                       <tbody>
                     <?php foreach ($campus as $campus) {//1 ?>
            <tr>                                  
                <td style="width: 380px;text-align: center;"><?php echo $campus->nPagNumeroVoucher; ?></td>
           <!-- <td style="width: 180px;text-align: center;"><?php /*echo $campus->cPagObservacion; */?></td> -->
                <td style="width: 380px;text-align: center;"><?php echo $campus->nPagAcuenta; ?></td>
                  <td style="width: 380px;text-align: center;"><?php echo $campus->tipoComprobante; ?></td>
            </tr>

                <?php } ?>
                        </tbody>
            </table>
          <?php  } else {
                echo "<span class='alert alert-info'>No se ha efectuado ningun Pago</span>";
        }?> 
        </div>         
    </div>


