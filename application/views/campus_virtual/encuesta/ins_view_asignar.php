

<style type="text/css">
        *{ font-family: sans-serif; margin: 0;}
        dl{ margin: 0px auto; width: 350px; }
        dt, dd{ padding: 5px; }
        dt{ background: #F5F5F5; color: #0174DF; border-top: 5px solid #FFFFFF; cursor: pointer; }
        dd{ background: #F5F5F5; line-height: 1.6em; }
        dt.activo, dt:hover{ background: #81BEF7; }

        dt:before{ content: "▸"; margin-right: 20px; }
        dt.activo:before{ content: "▾"; }
    </style>

<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/encuesta/jsEncuestaAsignar.js'></script>    
    
<?php

$btn_ins_encuestahorarioIns = form_submit('btn_ins_encuestahorarioIns',
    'Registrar Encuesta', 
    'id="btn_ins_encuestahorarioIns" class="btn btn-primary" ');

$idCurso[''] = 'Seleccione un Curso';
foreach ($curso as $curso) {
    $idCurso[$curso->nCurId] = $curso->cCurNombre;}

?>

<fieldset>
    <legend>Asignar Preguntas al Curso</legend>
    <table>
        <tr>
            <td>
                    <?php echo form_dropdown('cbo_ins_enc_curso',$idCurso,
                                             'id="cbo_ins_enc_curso"
                                             class="input-medium tip"
                                             style="width:260px;"
                                             required="required"
                                             data-original-title="Selecione Curso"
                                             data-placement="right"',
                                             'onchange="filtroCurso(this)"');
                    ?>
            
            <div style="padding-top: 10px;" >
                     <?php $idHorario = array('');
                     echo form_dropdown('cbo_ins_enc_horario',$idHorario,'',
                                        'id="cbo_ins_enc_horario"
                                        class="input-medium tip"
                                        style="width:260px;"
                                        required="required"
                                        data-original-title="Selecione Horario"
                                        data-placement="right"
                                        onchange="mostrarCheckBox()"');
                                        
                     ?>

            </div>
            </td>
            <td>
                <div style="padding-left: 20px;">
                    <div id="div_checkbox" class="control-group" style="display:none;">
                        <h3>Seleccione Pregunta</h3>
                        <dl>
                            <dt>Al Docente </dt>
                            <dd>
                                <div style="padding-bottom: 10px">
                                    <div class="row-fluid">
                                                <div class="span12">
                                                        <div class="box">
                                                                <div class="box-content box-nomargin">
                                                                        <table class='table table-striped table-bordered'>
                                                                                <tbody>
                                                                                        <?php foreach ($pregunta as $pre){ if($pre -> nPreBloque == 1){?><tr>
                                                                                                
                                                                                            <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox' name="txt_ins_enc_pregunta" id="txt_ins_enc_pregunta" value="<?php echo $pre->nPreId ?>" onclick="inseli(this)"></td>
                                                                                                <td>
                                                                                                    <?php
                                                                                                    echo $pre->cPreEnunciado;}}
                                                                                                    ?>
                                                                                                </td>
                                                                                         </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>	
                                </div>
                            </dd>
                            
                            <dt>Al Curso</dt>
                            <dd><div style="padding-bottom: 10px">
                                    <div class="row-fluid">
                                                <div class="span12">
                                                        <div class="box">
                                                                <div class="box-content box-nomargin">
                                                                        <table class='table table-striped table-bordered'>
                                     
                                                                                <tbody>
                                                                                        <?php foreach ($pregunta as $pre){ if($pre -> nPreBloque == 2){?><tr>
                                                                                            <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox' name="txt_ins_enc_pregunta" id="txt_ins_enc_pregunta" value="<?php echo $pre->nPreId ?>" onclick="inseli(this)"></td>
                                                                                            <td>
                                                                                                    <?php
                                                                                                    echo$pre->cPreEnunciado;}}?></td>

                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>	
                                </div>
                            </dd>
                            <dt>A los Materiales</dt>
                            <dd><div style="padding-bottom: 10px">
                                    <div class="row-fluid">
                                                <div class="span12">
                                                        <div class="box">
                                                                <div class="box-content box-nomargin">
                                                                        <table class='table table-striped table-bordered'>
                                                      
                                                                                <tbody>
                                                                                        <?php foreach ($pregunta as $pre){ if($pre -> nPreBloque == 3){?><tr>
                                                                                          <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox' name="txt_ins_enc_pregunta" id="txt_ins_enc_pregunta" value="<?php echo $pre->nPreId ?>" onclick="inseli(this)"></td>
                                                                                          <td>
                                                                                                    <?php
                                                                                                    echo$pre->cPreEnunciado;}}?></td>

                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>	
                                </div>
                            </dd>
                            <dt>A la Infraestructura</dt>
                            <dd><div style="padding-bottom: 10px">
                                    <div class="row-fluid">
                                                <div class="span12">
                                                        <div class="box">
                                                                <div class="box-content box-nomargin">
                                                                        <table class='table table-striped table-bordered'>
                                                              
                                                                                <tbody>
                                                                                        <?php foreach ($pregunta as $pre){ if($pre -> nPreBloque == 4){?><tr>
                                                                                          <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox' name="txt_ins_enc_pregunta" id="txt_ins_enc_pregunta" value="<?php echo $pre->nPreId ?>" onclick="inseli(this)"></td>
                                                                                          <td>
                                                                                                    <?php 
                                                                                                    echo$pre->cPreEnunciado;}}?></td>

                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>	
                                </div>
                            </dd>                          
                            <dt>A los Servicio Complementarios</dt>
                            <dd><div style="padding-bottom: 10px">
                                    <div class="row-fluid">
                                                <div class="span12">
                                                        <div class="box">
                                                                <div class="box-content box-nomargin">
                                                                        <table class='table table-striped table-bordered'>
                                       
                                                                                <tbody>
                                                                                        <?php foreach ($pregunta as $pre){ if($pre -> nPreBloque == 5){?><tr>
                                                                                         <td class='table-checkbox'><input type="checkbox" class='selectable-checkbox' name="txt_ins_enc_pregunta" id="txt_ins_enc_pregunta" value="<?php echo $pre->nPreId ?>" onclick="inseli(this)"></td>
                                                                                         <td>
                                                                                                    <?php
                                                                                                    echo$pre->cPreEnunciado;}}?></td>

                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>	
                                </div>
                            </dd>                         
                        </dl>
                        
                        <script type="text/javascript">
                          $('dl dd').not('dt.activo + dd').hide();
                           $('dl dt').click(function(){
                              if ($(this).hasClass('activo')) {
                                   $(this).removeClass('activo');
                                   $(this).next().slideUp();
                              } else {
                                   $('dl dt').removeClass('activo');
                                   $(this).addClass('activo');
                                   $('dl dd').slideUp();
                                   $(this).next().slideDown();
                              }
                           });
                        </script>
                        
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <div class = "controls" onclick="boton()">
        <?php
                echo $btn_ins_encuestahorarioIns;
        ?>
    </div>
    
</fieldset>
<!--        </form>-->
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>

