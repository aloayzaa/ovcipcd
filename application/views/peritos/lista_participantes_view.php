<div class="span12" >
    <div class="box">
        <div class="box-head tabs">
            <h3>Lista de Participantes</h3> 
        </div>
        <div class="box-content box-nomargin">
            <div class="tab-content">
                <div class="tab-pane active" id="nohead">
                    <table class='table table-striped dataTable dataTable-noheader table-bordered'>
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del Participante</th>
                                <th>Nro. Documento</th>
                                <th>Tipo de Relacion</th> 
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>										
                            <?php
                            $cont = 1;
                            if(count($registros)){
                                foreach ($registros as $row) {
                                ?>
                                <?php $nPerId = $row["nPerId"]; ?>
                                <?php $tiporelacion = $row["tiporelacion"]; ?>
                                <?php $email = (isset($row["emailVAL"])?$row["emailVAL"]:"No se le ha asignado un email"); ?>
                                <?php $direccion = (isset($row["direccionVAL"])?$row["direccionVAL"]:"No se le ha asignado una dirección"); ?>
                                <?php $telefono = (isset($row["telefonoVAL"])?$row["telefonoVAL"]:"No se le ha asignado un teléfono"); ?>
                                <tr>
                                    <td><center><?php echo $cont++; ?></center></td>
                                    <td><?php echo $row["cPerNombresRS"]; ?></td>
                                    <td><?php echo $row["cPdeValor"]; ?></td>
                                    <td><?php echo $row["nombrerelacion"]; ?></td> 									
                                    <td class='actions_big' style="width:170px;">
                                        <div class="btn-group">
                                            <center> 
                                            <a pid="<?php echo $this->loaders->encrypt($row["nPerId"]); ?>" class='btn btn-mini tip pover email-par' data-placement="top" data-title="Email" data-content="<?php echo '<center>'.$email.'</center>'; ?>">
                                                <img src="<?php echo URL_IMG_DASH; ?>icons/essen/16/email.png" alt="">
                                            </a>
                                            &nbsp;
                                            <a pid="<?php echo $this->loaders->encrypt($row["nPerId"]); ?>" class='btn btn-mini tip pover direccion-par' data-placement="top" data-title="Direccion" data-content="<?php echo '<center>'.$direccion.'</center>'; ?>">
                                                <img src="<?php echo URL_IMG_DASH; ?>icons/essen/16/home.png" alt="">
                                            </a>
                                            &nbsp;
                                            <a pid="<?php echo $this->loaders->encrypt($row["nPerId"]); ?>" class='btn btn-mini tip pover telefono-par' data-placement="top" data-title="Telefono" data-content="<?php echo '<center>'.$telefono.'</center>'; ?>">
                                                <img src="<?php echo URL_IMG_DASH; ?>icons/essen/16/phone.png" alt="">
                                            </a>
                                            &nbsp;
                                            <a pid="<?php echo $this->loaders->encrypt($row["nPerId"]); ?>" class='btn btn-mini tip deleter-par' title="Eliminar">
                                                <img src="<?php echo URL_IMG_DASH; ?>icons/fugue/cross.png" alt="">
                                            </a>
                                            </center>
                                        </div>
                                    </td>
                                </tr> 
                            <?php
                                }
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="5">
                                        <center><i>No se encontraron Registros</i></center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <?php
                            exit();
                            }
                        ?>
                        </tbody>
                    </table>
                    <input type="text" name='txtnPerId' id='txtnPerId' rows='3' cols='20' style='display: none' value="<?php echo $nPerId ?>">
                    <input type="text" name='txttiporelacion' id='txttiporelacion' rows='3' cols='20' style='display: none' value="<?php echo $tiporelacion ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".pover").popover();
        $(".pover").click(function(e){
            e.preventDefault();
            if($(this).data('trigger') == "manual"){
                $(this).popover('toggle');
            }
        });

        $(".deleter-par").click(function(){
            $("#table_lista_participantes").hide("slow");
            pid = $(this).attr("pid");
            $.ajax({
                type: "POST",
                url: "nuevotramite/delete_participante",
                cache: false,
                data: { 
                    pid: pid       
                },
                 success: function(data) {              
                    if(data == "vacio"){                       
                        alert("No se encontraron registros");
                    }
                    else{
                        $("#table_lista_participantes").html(data);
                        $("#info_persona").html("");
                        $("#c_cbo_tipo_relacion").html(""); 
                    }  
                },
                error: function() { 
                    alert("HORROR!!!");
                }              
            });
            $("#table_lista_participantes").show("slow");
            return false; 
        });

        $(".email-par").click(function(){
            pid = $(this).attr("pid"); 
            $.ajax({
                type: "POST",
                url: "nuevotramite/get_agregar_email",
                cache: false,
                data: { 
                     pid: pid       
                },
                 success: function(data) {              
                    if(data == "vacio"){                       
                        alert("No se encontraron registros");
                    }
                    else{
                        $("#email_modal_body").html(data);
                        $("#dialog_custom").show();
                        $("#email_modal").show("drop");
                    }  
                },
                error: function() { 
                    alert("HORROR!!!");
                }              
            });
            
        }); 

        $(".direccion-par").click(function(){
            pid = $(this).attr("pid"); 
            $.ajax({
                type: "POST",
                url: "nuevotramite/get_agregar_direccion",
                cache: false,
                data: { 
                     pid: pid       
                },
                 success: function(data) {              
                    if(data == "vacio"){                       
                        alert("No se encontraron registros");
                    }
                    else{
                        $("#direccion_modal_body").html(data);
                        $("#dialog_custom").show();
                        $("#direccion_modal").show("drop");
                    }  
                },
                error: function() { 
                    alert("HORROR!!!");
                }              
            });
            
        }); 

        $(".telefono-par").click(function(){
            pid = $(this).attr("pid"); 
            $.ajax({
                type: "POST",
                url: "nuevotramite/get_agregar_telefono",
                cache: false,
                data: { 
                     pid: pid       
                },
                 success: function(data) {              
                    if(data == "vacio"){                       
                        alert("No se encontraron registros");
                    }
                    else{
                        $("#telefono_modal_body").html(data);
                        $("#dialog_custom").show();
                        $("#telefono_modal").show("drop");
                    }  
                },
                error: function() { 
                    alert("HORROR!!!");
                }              
            });
            
        }); 
    });
</script>