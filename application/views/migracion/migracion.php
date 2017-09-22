
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src="<?php echo URL_JS; ?>migracion/jsMigracion.js"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_ListaMigracion').tabs();
get_page('migracion/reload_migracion/','ListaMigrada');
     
        $("#ListarMigracion").bind({
        click: function(){ 
            $("#ListaMigrada").css("display", "block");
                       msgLoading2("#ListaMigrada");
            get_page('migracion/reload_migracion/','ListaMigrada');
        }
        });
    $("#VerMigracion").bind({
        click: function(){ 
             msgLoading2("#ListaIngresados");
            get_page('migracion/dame_ingresados/','ListaIngresados');
        }
        });
     $("#btn_reporte").bind({
        click: function(){ 
                        var capitulo=$("#cbo_capitulo").val();       
         var menor=$("#txt_menor").val(); 
                        var mayor=$("#txt_mayor").val();
         if(menor=='' || mayor==''){
             var menor='0';
                var mayor='100000';
         }
        if(capitulo!=='0'){
                         msgLoading2("#ListaDeudaColegiados");
            get_page('migracion/dame_deuda_colegiados/'+capitulo+'/'+menor+'/'+mayor+'','ListaDeudaColegiados');
        }else{
            bootbox.alert("<h3>Por favor,seleccione un capítulo</h3>");
        }
        }
        });
    })
</script>
<?php

?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Migración de Usuarios</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_ListaMigracion">
                    <ul>
                        <li><a href="#Listadol" id="ListarMigracion">Migracion</a></li>
                        <li><a href="#Listado2" id="VerMigracion">Lista de Ingresados</a></li>
                           <li><a href="#Listado3" id="VerDeudaColegiado">Deuda Colegiados</a></li>
                    </ul>
                    <div id="Listadol">
                       <div id="ListaMigrada">
                            
                        </div>
                    </div>
                    <div id="Listado2">
  <div id="ListaIngresados">
     
                        </div>
                    </div>
                                        <div id="Listado3">
                                            <center><h3>DETALLE ECONOMICO CIP-CDLL (TOMA DE DECISIONES)</h3>
</center>
                                                         <table id="todos">
                            <tbody>
                                <tr>
                                    <td>
                                             <select id="cbo_capitulo" name="cbo_capitulo" style="width:200px;">
                                            <option value="0">Seleccione Capitulo </option>
                                            <?php
                                            foreach ($capitulo as $capitulo) {
                                                ?>
                                                <option value="<?php echo $capitulo["codcap"] ?>"><?php echo mb_convert_encoding($capitulo["desccap"], 'UTF-8') ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>  
                                    </td>
                                     <td> <label class="control-label"><b>&nbsp;&nbsp;Rango:&nbsp;&nbsp;</b></label></td>
                                         <td>
                                            
                                  <?php echo form_input(array('name' => 'txt_menor', 'id' => 'txt_menor', 'type' => 'text', 'required' => 'required', 'style' => 'margin-bottom:9px;width:40px;', 'maxlength' => '5')); ?>
                                    </td>
                                              <td> <label class="control-label"><b>&nbsp;&nbsp;Y&nbsp;&nbsp;</b></label></td>
                                         <td>
                                            
                                  <?php echo form_input(array('name' => 'txt_mayor', 'id' => 'txt_mayor', 'type' => 'text', 'required' => 'required', 'style' => 'margin-bottom:9px;width:40px;', 'maxlength' => '5')); ?>
                                    </td>
                            <br>
                            <br>
                            <td style="padding-bottom: 7px;">&nbsp;&nbsp;<button id="btn_reporte" name="btn_reporte" type="button" class="btn btn-danger">Mostrar</button></td>
                            </tr> 
                            </tbody>                    
                        </table>
  <div id="ListaDeudaColegiados">
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>



