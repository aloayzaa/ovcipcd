
<script>
    $(document).ready(function(){
        var dataTable = {
            tabla           : "BandejaPendiente-Lista",
            ordenaPor       : new Array([0, "asc" ])
        };
        paginaDataTable(dataTable);
    })  
</script>
<div class="control-group" >   

    <select name="cbo_capitulo" id="cbo_capitulo" class="input-medium tip" style="width:340px;" required="required" data-original-title="Selecione un Capitulo" data-placement="right"  onchange="Capitulo()">
        <option value="">Seleccione Capitulo</option>
        <?php
        foreach ($capitulos as $fila) {
            ?>
            <option value="<?php echo $fila->codcap ?>"><?php echo $fila->desccap ?></option>
        <?php } ?>
    </select>      
       <select name="cbo_edicion_libro" id="cbo_edicion_libro"  style="display:none" onchange="filtroCapitulo(this)">
             <option value="">Seleccione Año</option>
				<?php
				for($cbo_edicion_libro=(date("Y")); 2004<=$cbo_edicion_libro; $cbo_edicion_libro--) {
				echo "<option value=".$cbo_edicion_libro.">".$cbo_edicion_libro."</option>";
						}	
				?>
			</select> 
</div>   <span id='preload'></span>

<!--style="display:none"-->
<center>
    <div id="ContenedorGeneralPendientes">

        <div class="content" style="width: 95%">      
           
            <div class="row-fluid">
                <div class="box">
                    <div class="box-head">
                        <h3>Listado de <i>Biblioteca Tesis</i></h3>
                    </div>
                    <div class="box-content">
                        <div id="Tabs_RegistroNuevo">

                            <div class="form" style="width: 100%">
                                <?php if ($tesis > 0) { ?>
                                    <table id="BandejaPendiente-Lista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Titulo</th>
                                                <th>Autor</th>
                                                <th>Año</th>
                                                <th>Ver detalle</th>
                                                <th>Vizualizar Pdf</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tesis as $tesis) {
                                                ?>
                                                <tr>
                                                      <td style="width: 380px;text-align: center;"> <?php echo $tesis["cMatcodigo"]; ?></td>
                                                    <td style="width: 380px;text-align: center;"> <?php echo $tesis["cMatTitulo"]; ?></td>
                                                    <td style="width: 120px;text-align: center;"><?php echo $tesis["cMatAutor"]; ?></td>
                                                    <td style="width: 50px;text-align: center;"><?php echo $tesis["cMataño"]; ?></td>                               

                                       <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Ver Detalle' src='" . base_url() . "img/detalle.png' width='20' height='20' onClick=MaterialDetalle(" . "\"" . $tesis["nMatId"] . "\"" . ")></td>"; ?>
                                                    <?php 
                                                    $valor = $this->session->userdata('nUsuTipo');
                                                    $nick = $this->session->userdata('nick');
                                                    if ($valor == '7' or $nick=='Admin') { ?> 
                                                        <td style="text-align:center;vertical-align: middle;cursor:pointer;" style="width:50px;text-align:center;vertical-align: middle;"><a target="_blank" href="<?php echo base_url('uploads/biblioteca/abstract/' . $tesis['cMatLink']); ?>" ><img title="Vizualizar Pdf" src="<?php echo base_url() . ('img/visualizarpdf.png'); ?>" width="20" height="20"></a></td>
                                                    <?php } else { ?> 
                                                        <td style="text-align:center;vertical-align: middle;cursor:pointer;" style="width:50px;text-align:center;vertical-align: middle;"><a><img title="Vizualizar Pdf" src="<?php echo base_url() . ('img/bloqueo.png'); ?>" width="40" height="40"></a></td>
                                                    <?php } ?>
                                                </tr>
                                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo"  <div class='alert alert-block alert-info'>";
                                    echo "<h4 class='alert-heading'> Info!!! </h4>";
                                    echo "No se encontraron registros...O...Eliga un capitulo";
                                    echo "</div>";

                                }
                                ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div></div></center>
