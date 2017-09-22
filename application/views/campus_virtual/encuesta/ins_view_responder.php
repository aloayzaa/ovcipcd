

<?php

$frm_ins_respuesta = array('id' => 'frm_ins_respuesta',
    'name' => 'frm_ins_respuesta',
    'class' => 'form-horizontal');
echo form_open('campus_virtual/encuesta/encuestaIns', $frm_ins_respuesta);

$radio_ins_valor= array('id' => 'radio_ins_valor',
    'name' => 'radio_ins_valor',
    'style' => 'resize:none;width:250px;',
    'class' => 'input-medium input-prepend tip',
    'required' => 'required',
    'data-original-title' => 'Escoja Alternativa',
    'placeholder' => 'Alternativa');

$btn_ins_respuesta = form_submit('btn_ins_respuesta',
    'Acepta',
    'id="btn_ins_encuesta" class="btn btn-green4"');

//foreach ($pregunta as $pregunta){
//   
//   echo $pregunta->cPreEnunciado;
//}

?>

<fieldset>
    <div class="alert alert-info">
	<strong>Nota !</strong> Conteste las respuestas seleccionando una opción donde <strong>1</strong> es muy malo y <strong>5</strong> es muy bueno 
    </div><br>
    <table style="width: 600px;" border="0" >
        <thead>
                <tr>
                    <th style="width: 500px;">Pregunta</th>
                    <th>Opcion</th>
                </tr>
        </thead>
        <tbody>
        <?php foreach ($pregunta as $pregunta){?><tr>
            
            <td>
                  <?php
                    echo $pregunta->cPreEnunciado;
                  ?>
            </td>
            <td>
                <input name="<?php echo $pregunta->nPreId;?>-radio_ins_valor" type="radio" value="1">
                <input name="<?php echo $pregunta->nPreId;?>-radio_ins_valor" type="radio" value="2">
                <input name="<?php echo $pregunta->nPreId;?>-radio_ins_valor" type="radio" value="3">
                <input name="<?php echo $pregunta->nPreId;?>-radio_ins_valor" type="radio" value="4">
                <input name="<?php echo $pregunta->nPreId;?>-radio_ins_valor" type="radio" value="5">
            </td>
        </tr><?php }?>
        </tbody>
    </table>
    <br>
    
    <div class = "controls">
        <?php
                echo $btn_ins_respuesta;
        ?>
    </div>
</fieldset>


<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
