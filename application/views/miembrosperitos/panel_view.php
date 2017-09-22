<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript">
    $(function(){

$('#Tabs_Miembros').tabs();
get_page('miembrosperitos/load_search_view_peritos/','BuscarPeritos');

 $("#MiembrosListado").bind({
        click: function(){ 
            get_page('miembrosperitos/load_qry_miembros/','ListaMiembros');
        }
        });
        
        $("#PeritoRenovacion").bind({
        click: function(){ 
            $("#RenovacionPeritos").css("display", "block");
            get_page('miembrosperitos/reload_renovacion/','RenovacionPeritos');
        }
        });
        
        $("#btn_fnd_peritos").bind('click', function(){                       
        get_page('miembrosperitos/load_qry_miembros/','ListaMiembros',{
       'apellidos':$('#txt_fnd_peritos').val()
    }); 
 }); 


 
});
    </script>

 <?php
$txt_fnd_peritos = array('name' => 'txt_fnd_peritos', 'id' => 'txt_fnd_peritos','class' => 'cajassearch', "style" => "width:280px;");
$boton = form_submit('btn_fnd_peritos', 'Buscar', 'id="btn_fnd_peritos" class="btn btn-primary"');

    ?>
<div class="content">
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de <i>Miembros de Peritaje</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Miembros">
                    <ul>
                        <li><a href="#MiembrosTab1" id="MiembrosBuscar">Buscar</a></li>
                        <li><a href="#MiembrosTab2" id="MiembrosListado">Listado</a></li>
                        <li><a href="#MiembrosTab3" id="PeritoRenovacion">Renovación</a></li>
                    </ul>
                
                    <div id="MiembrosTab1">
                        <div id="BuscarPeritos">
                        </div>
                        <div id="mensaje"></div>
                    </div>
                    <div id="MiembrosTab2">
                        <table align="center">
                            <tbody>
                                <tr>
                                    <td>
                                             <table>
                                                 <div>
                                            <tbody>
                                                <tr align="center">
                                                    <td style="padding-top: 5px;"><strong>BUSCAR POR APELLIDO:&nbsp;</strong> </td>
                                                  <td>&nbsp;</td>                                  
                                            </tbody>
                                            
                                        </table>	
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr id="buscador">
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_peritos); ?>  </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><?php echo $boton; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
        
                        <div aling="center" id="ListaMiembros">
                            
                        </div>
                    </div>
                        <div id="MiembrosTab3">
                            
                        <div id="RenovacionPeritos">
                            
                        </div>
                    </div>
                </div>   
                
                
              </div>  
            </div>
            </div>
        </div> 
<?php $this->load->view('dashboard/footer'); ?>