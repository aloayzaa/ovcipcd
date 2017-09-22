
<script>
$(document).ready(function(){
    var dataTable = {
        tabla           : "listaLibro",
        ordenaPor       : new Array([0, "asc" ])
    };
    paginaDataTable(dataTable);
})  
</script>

<div class="control-group">
                           



<?php
$categoria = array(
    "VARIOS","AGRICOLA","AGROINDUSTRIAL",
                "AGRONOMOS","AMBIENTAL","CIVIL",
                "ELECTRONICA","GEOLOGOS","INDUSTRIAL","MECANICA","MINAS, METALURICA",
                "PESQUERO","QUIMICOS","SANITARIA","SISTEMAS","ZOOTECNIA"
);
//            echo form_dropdown('cbo_lib_categoria',$categoria,'','id="cbo_lib_categoria" class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione Tipo" data-placement="right"') 
?>
                                        <select name="cbo_categoria_lib" id="cbo_categoria_lib" class="input-medium tip" style="width:340px;"required="required" data-original-title="Selecione un Capitulo" data-placement="right" onchange="filtroCapituloLibro(this)"> 
                                             <option value="">Seleccione Categoria</option>
                                        <?php foreach ($categoria as $categoria) { ?> 
                                                <option value="<?php echo $categoria ?>"><?php echo $categoria ?></option> 
                                            <?php } ?> 
                                        </select>


</div>
                       <span id='preload2'></span>
<center>
<div id="ContenedorGeneralPendientes2">
    <div class="content" style="width: 95%">      
        <!-- Contenido en tabs : adanyc-->
        <div class="row-fluid">
            <div class="box">
                <div class="box-head">
                    <h3>Listado de <i>Biblioteca Libros</i></h3>
                </div>
                <div class="box-content">
                    <div id="Tabs_RegistroNuevo">

                        <div class="form" style="width: 100%">
                            <?php if ($libro > 0) { ?>
                                <table id="listaLibro"  class="display" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Editorial</th>
                                            <th>Ver detalle</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($libro as $libro) {
                                            ?>
                                            <tr>
                                                <td style="width: 380px;text-align: center;"> <?php echo $libro["cMatTitulo"]; ?></td>
                                                <td style="width: 120px;text-align: center;"><?php echo $libro["cMatAutor"]; ?></td>
                                                <td style="width: 50px;text-align: center;"><?php echo $libro["cMatEditorial"]; ?></td>                               
                                                
                                             <?php echo "<td style='text-align:center;vertical-align: middle;cursor:pointer;' style='width:50px;text-align:center;vertical-align: middle;'><img title='Ver Detalle' src='" . base_url() . "img/detalle.png' width='20' height='20' onClick=LibroDetalle(" . "\"" . $libro["nMatId"]  . "\"" . ")></td>"; ?>
                                                
                                            
                                                
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