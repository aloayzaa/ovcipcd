<?php
$frm_ins_estado= array('id'=>'frm_ins_estado',
    'name'=>'frm_ins_estado',
    'class'=>'form-horizontal'
    );
echo form_open('peritos/peritos/Estado_solicitud_ins',$frm_ins_estado);
$numerosolicitud=array('name'=>'numerosolicitud',
    'id'=>'numerosolicitud',
    'style'=>"resize:none;",
    'maxlength' => '80',
    'class'=>'input-prepend',
    'value'=>  mb_convert_encoding($valor, 'UTF-8'));
$boton = form_submit('btn_fnd_persona', 'Guardar', 'id="btn_fnd_persona" class="btn btn-primary"');
?>
<div style="display: none">
<?php echo form_input($numerosolicitud)?>
</div>
<center><h3>ESTADO DE LA SOLICITUD</h3></center>
</br>
<table align="center">
    <tr>
        <td>
            <select  name="estados_solicitud" id="estados_solicitud" class="input-prepend" style="width:180px;" required="required" data-original-title="Selecciona un Estado" data-placement="right" >
                <option value="1" selected="selected">Pendiente</option>
                <option value="2">Tramitando</option>
                <option value="3">Finalizado</option>
            </select>
        </td>
    </tr>
</table>
<p>
<center><?php echo $boton; ?></center>