 <script type="text/javascript">
                    var dni = document.getElementById('txt_nrodni').value;
                    $("#txt_ins_dni").attr("disabled", "disabled");
                    document.getElementById('txt_ins_dni').value = dni;
                      $("#txt_ins_per_telefono").mask('999 999999');
                </script>
                <center>
                    <?php
                    $txt_ins_per_nombres = array('name' => 'txt_ins_per_nombres', 'id' => 'txt_ins_per_nombres', 'maxlength' => '150', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba sus Nombres', 'data-placement' => 'right');
                    $txt_ins_per_apellidop = array('name' => 'txt_ins_per_apellidop', 'id' => 'txt_ins_per_apellidop', 'maxlength' => '200', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Apellido Paterno', 'data-placement' => 'right', 'required' => 'required');
                    $txt_ins_per_apellidom = array('name' => 'txt_ins_per_apellidom', 'id' => 'txt_ins_per_apellidom', 'maxlength' => '200', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip', 'data-original-title' => 'Esriba su Apellido Materno', 'data-placement' => 'right');
                    $txt_ins_per_correo = array('name' => 'txt_ins_per_correo', 'id' => 'txt_ins_per_correo', 'maxlength' => '200', "style" => "resize:none;width:350px;", 'class' => 'input-medium input-prepend tip');
                    $txt_ins_per_telefono = array('name' => 'txt_ins_per_telefono', 'id' => 'txt_ins_per_telefono', 'maxlength' => '10', "style" => "resize:none;width:80px;margin-right:270px;");
                    $txt_ins_per_celular = array('name' => 'txt_ins_per_celular', 'id' => 'txt_ins_per_celular', 'maxlength' => '9', "style" => "resize:none;width:80px;margin-right:270px;");
                    $txt_ins_dni = array('name' => 'txt_ins_dni', 'id' => 'txt_ins_dni', 'maxlength' => '8', "style" => "resize:none;width:80px;margin-right:270px;");

                    ?>
                    <div class="row-fluid no-margin" style="margin:auto;width:auto;">
                        <legend><b>!Registrar Nueva Persona Externa!</b></legend> 
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">Nombres:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_nombres); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido Paterno:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_apellidop); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido Materno:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_apellidom); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DNI:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_dni); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Correo:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_correo); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefono:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_telefono); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Celular:</label>
                                <div class="controls">
                                    <?php echo form_input($txt_ins_per_celular); ?>
                                </div>
                            </div>
                            
                            <input id="txt_tipo" name="txt_tipo" type="hidden" value="3">
                          </fieldset>
                    </div>
                </center>
