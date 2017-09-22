<script type="text/javascript" src='<?php echo URL_JS;?>peritos/jsAsignacion.js'></script>
<?php 
$frm_ins_asignacion= array('id'=>'frm_ins_asignacion',
    'name'=>'frm_ins_asignacion',
    'class'=>'form-horizontal'
    );
echo form_open('peritos/peritos/Asignacion_peritos_ins',$frm_ins_asignacion);
$numerosolicitud=array('name'=>'numerosolicitud',
    'id'=>'numerosolicitud',
    'style'=>"resize:none;",
    'maxlength' => '80',
    'class'=>'input-prepend',
    'value'=>  mb_convert_encoding($valor, 'UTF-8'));

$btn_ins_asignacion = array('id'=>'btn_ins_asignacion',
    'name'=>'btn_ins_asignacion',
    'type'=>'submit',
    'value'=>'Asignar Perito',
    'class'=>'btn btn-success' 
        );
?>

<center><h2><p style="color:#0D7C27">ASIGNACION DE PERITOS</p></h2></center>
<div style="display: none">
<?php echo form_input($numerosolicitud)?>
</div>
<div id="datos">
<center>
    <div>
        <table>
            <tr style="height:50px">
                <td style="height: 50px">
                    &nbsp;&nbsp;&nbsp;&nbsp;<select id="Perito" name="Perito" class="chzn-select" style="width:300px;">
                        <?php foreach ($peritos as $peritos) {
                            ?><option  value="<?php echo $peritos->nPeritoId ?>"><?php echo $peritos->cPeritoDatos ?></option>>
                        <?php 
                        
                        } ?>
                    </select>
                </td> 
                <td style="height: 50px">
                    &nbsp;<?php echo form_input($btn_ins_asignacion)?>
                </td>
            <tr>
        </table>
    </div>
</center>
</div>
<br>
<div id="tabla_asignacion"></div>




