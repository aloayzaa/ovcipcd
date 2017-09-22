<?php $this->load->view('dashboard/header'); ?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript">
$(function(){

$('#Tabs_Peritos').tabs();
get_page('peritos/load_ins_view_peritos/','RegistrarPeritos');
   $("#PeritosListado").bind({
        click: function(){ 
            get_page('peritos/load_qry_peritos/','qry_peritos');
        }
        });
        
        
          $("#btn_fnd_solicitud").bind('click', function(){                       
        get_page('peritos/load_qry_peritos/','qry_peritos',{
       'remitente':$('#txt_fnd_solicitud').val()
    }); 
 });
 
});
</script>
<?php
$txt_fnd_solicitud = array('name' => 'txt_fnd_solicitud', 'id' => 'txt_fnd_solicitud','class' => 'cajassearch', "style" => "width:280px;");
$boton = form_submit('btn_fnd_solicitud', 'Buscar', 'id="btn_fnd_solicitud" class="btn btn-primary"');

    ?>
<div class="content">
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de <i>Registro de Solicitudes & Asignacion de Peritos</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Peritos">
                    <ul>
                        <li><a href="#PeritosTab1" id="PeritosRegistrar">Nuevo</a></li>
                        <li><a href="#PeritosTab2" id="PeritosListado">Listado</a></li>
                        
                    </ul>
                        
                    <div id="PeritosTab1">

                        <div id="RegistrarPeritos">
                        </div>
                    </div>
                    <div id="PeritosTab2">
                        <table align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table>
                                            <div>
                                                <tbody>
                                                    <tr align="center">
                                                        <td style="padding-top: 5px;"><strong>BUSCAR POR REMITENTE:&nbsp;</strong> </td>
                                                        <td>&nbsp;</td>                                  
                                                </tbody>
                                                
                                        </table>	
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr id="buscador">
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_solicitud); ?>  </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><?php echo $boton; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            
                            <div id="qry_peritos" >
                            
                        </div>
                    </div>
                    
                </div>   
                
                
              </div>  
            </div>
            </div>
        </div> 

<?php $this->load->view('dashboard/footer'); ?>


