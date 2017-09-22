<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS;?>peritaje/jsPersona.js'>

</script>

    <?php
    $radio_mat1 = array('name' => 'rdbmatbus', 'id' => 'radio_mat1', 'value' => 'Persona Natural', 'checked' =>  'checked');
$radio_mat2 = array('name' => 'rdbmatbus', 'id' => 'radio_mat2', 'value' => 'Persona Juridica');

$txt_fnd_personas = array('name' => 'txt_fnd_personas', 'id' => 'txt_fnd_personas','class' => 'cajassearch', "style" => "width:280px;");

$boton = form_submit('btn_fnd_persona', 'Buscar', 'id="btn_fnd_persona" class="btn btn-primary"');

    ?>


<div id="Tabs_Persona">
        
        <ul>
            <li><a href="#pr" id="tab_personaregistrar">Nuevo</a></li>
            <li><a href="#pl" id="tab_personalistar">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="radios_persona" class="controls">
                                            <?php echo form_radio($radio_mat1); ?> <label for="radio_mat1">Persona Natural</label>			
                                            <?php echo form_radio($radio_mat2); ?> <label for="radio_mat2">Persona Juridica</label>                                                                           
              </div> 
            <div id="div_ins">
                
            </div>
            
        </div>
        <div id="pl"style="width:100%;">
            <table>
                <tr>
                    <td>
                        <select  name="Lista_Personas" id="Lista_Personas" class="input-prepend" style="width:280px;" required="required" data-original-title="Selecciona un Listado" data-placement="right" >
                    <option value="0" selected="selected">Seleccione un Listado</option>
                    <option value="1">Listado Personas Naturales</option>
                    <option value="2">Listado Personas Juridicas</option>
                </select>
                    </td>
                </tr>
            </table>
               <table align="center">
                            <tbody>
                                <tr>
                                    <td>
                                             <table>
                                                 <div>
                                            <tbody>
                                                <tr align="center" style="display: none" id="persona_natural">
                                                    <td style="padding-top: 5px;"><strong>BUSCAR POR APELLIDO:&nbsp;</strong> </td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr align="center" style="display: none" id="persona_juridica">
                                                    <td style="padding-top: 5px"><strong>BUSCAR POR RAZON SOCIAL:&nbsp;</strong> </td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>	
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr style="display: none" id="buscador">
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_personas); ?>  </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><?php echo $boton; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
        
            <div id="div_qry"></div>
            
        </div>
        
    </div>  
<?php $this->load->view('dashboard/footer');?>


