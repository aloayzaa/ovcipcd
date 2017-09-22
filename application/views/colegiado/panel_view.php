<?php $this->load->view('dashboard/header'); ?>
<?php
// CREACIÓN DE FORMULARIO DE BUSQUEDA DE COLEGIADO MEDIANTE SU CIP
$txtDNI = array('name' => 'txt_ins_empa_dni', 'id' => 'txt_ins_empa_dni', 'maxlength' => '6', "class" => "cajassearch", "style" => "width:100px;", 'required' => 'required');
$botonEmpa = form_button('btn_fnd_empadronados', 'Buscar', 'id="btn_fnd_empadronados" class="btn btn-primary"');
?>
<script type="text/javascript" src="<?php echo URL_JS; ?>colegiado/jsColegiado.js"></script>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Actualización de Datos</i></h3>
            </div>
            <div class="box-content">

                <div id="Tabs_Actualizacion">
                    <ul>
                        <li><a href="#Actualizacion" id="ActualizarDatos">Actualización</a></li>
                        <li><a href="#Actualizacion1" id="Listarpersona">Listado</a></li>
                    </ul>
                     <div  id="Actualizacion"> 
                    <div style="min-width: 885px;">
                        <div class="form-horizontal">
                                <div id="ActualizarDatos">
                                    <legend><strong>Buscar Persona</strong></legend>                        
                                    <fieldset> 
                                        <table>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <label class="control-label" for="cbo_ins_per_tipo"><b>Tipo Documento:</b></label>
                                                        <div class="controls">
                                                            <select id="cbo_ins_per_tipo" name="cbo_ins_per_tipo" style="width: 100px;">
                                                                <option value="0">CIP</option>
                                                                <option value="1">DNI</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>  
                                                        <table>
                                                            <tr>
                                                                <td style="vertical-align: top;padding-top: 7px;"><label class="control-label" for="txt_ins_empa_dni"><div id="tipo_doc" style="padding-right:30px"><strong>Nro de CIP:</strong></div></label></td>
                                                                <td style="padding-right: 10px;"><?php echo form_input($txtDNI); ?></td>
                                                                <td><?php echo $botonEmpa; ?></td>
                                                                <td><span id="preload"></span></td>
                                                            </tr>
                                                        </table>
                                                        
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                         <div id="c_list_data_empadronado" style="margin-top: 10px;"></div>

                                </fieldset>
                                </div>
                                </div>
                             </div>
                               <div id="c_frm_chc_ins"></div>
                            
                            <!-- Cargamos el formulario de Registro CHC o CHCOB --> 

                            <!-- -->
                        </div>
                        <div id="Actualizacion1">
                            <div align="center" id="qry_persona" style="width: auto">

                            </div>

                        </div>

                   

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>