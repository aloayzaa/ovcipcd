<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "listaRevista",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
</script>

<div class="control-group">    
                                
                               
                                    <?php
                                   $categoria=array(
                                       "AGRICULTURA Y CIENCIAS BIOLOGICAS","ARTE Y HUMANIDADES","NEGOCIO ADMINISTRACION Y CONTABILIDAD",
                                       "INGENIERIA QUIMICA","CIENCIAS DE LA COMPUTACION","ECONOMIA.ECONOMETRIA Y FINANZAS",
                                       "INGENIERIA","CIENCIAS AMBIENTALES","INDUSTRIAL","CIVIL","MINAS","PUBLICIDAD","OTROS"
                                       );
                       //            echo form_dropdown('cbo_lib_categoria',$categoria,'','id="cbo_lib_categoria" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione Tipo" data-placement="right"') 
                                   ?>
                                      <select name="cbo_categoria_rev" id="cbo_categoria_rev" class="input-medium tip" style="width: 340px" required="required" data-original-title="Selecione un Capitulo" data-placement="right" onchange="filtroCapituloRevista(this)"> 
                                               <option value="">Seleccione Categoria</option>
                                               <?php foreach($categoria as $categoria){ ?> 
                                               <option value="<?php  echo $categoria?>"><?php echo $categoria ?></option> 
                                               <?php } ?> 
                                           </select>
                              
                           </div>
                         <span id='preload3'></span>

<center>
<div id="ContenedorGeneralPendientes3">
    <div class="content"  style="width: 95%">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Listado de <i>Biblioteca Libros</i></h3>
                </div>
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <?php if ($revista > 0) { ?>
                                <table id="listaRevista"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Editorial</th>
                                            <th>Vizualizar</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($revista as $revista) {
                                            ?>
                                            <tr>
                                                <td style="width: 380px;text-align: center;"> <?php echo $revista["cMatTitulo"]; ?></td>
                                                <td style="width: 120px;text-align: center;"><?php echo $revista["cMatAutor"]; ?></td>
                                                <td style="width: 50px;text-align: center;"><?php echo $revista["cMatEditorial"]; ?></td>                               
                                                
                                            <td style="text-align:center;vertical-align: middle;cursor:pointer;" style="width:50px;text-align:center;vertical-align: middle;"><a target="_blank" href="<?php echo site_url('biblioteca/reserva_usuario/leerrevista/' . $revista['nMatId']);?>" ><img title="leer revista" src="<?php echo base_url() .('img/magazine.png');?>" width="20" height="20"></a></td>
                 
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
//                                echo "No se encontraron registros";
                            }
                            ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div></div>
</center>