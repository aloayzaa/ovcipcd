<?php $this->load->view('dashboard/header');?>
<?php
// CREACIÓN DE FORMULARIO DE BUSQUEDA DE COLEGIADO MEDIANTE SU CIP
$txt_fnd_doc_dni = array('id' => 'txt_fnd_doc_dni',
    'name' => 'txt_fnd_doc_dni',
    'style' => 'resize:none;width:100px;',
    'class' => 'cajassearch',
    'maxlength' => '8',
    'required' => 'required',
    'data-original-title' => 'Escriba un D.N.I.');
$btn_fnd_doc = form_button('btn_fnd_doc', 
                           'Buscar', 
                           'id="btn_fnd_doc" class="btn btn-primary"');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>campus_virtual/docente/jsDocente.js'></script>
    <div id="Tabs_Docente" >
        <ul>
            <li><a href="#pr" id="tab_docenteregistrar">Persona</a></li>
            <li><a href="#pl" id="tab_docentelistar">Listado</a></li>
        </ul>
        <div id="pr">
            <div id="div_ins">
                <div class="content">      
                    <div class="row-fluid">
                        <div class="box">
                            <div class="box-head">
                                <h3>Módulo de <i>Confirmación de Docente</i></h3>
                            </div>
                            <div class="box-content">
                                <div style="min-width: 500px;">
                                    <div class="form-horizontal">
                                        <legend>Buscar Persona</legend>                        
                                        <fieldset>    
                                            <div class="control-group">  
                                                <table>
                                                    <tr>
                                                        <td style="vertical-align: top;padding-top: 7px;padding-right: 10px;"><label for="txt_fnd_doc_dni">Nro de DNI</label></td>
                                                        <td style="padding-right: 10px;"><?php echo form_input($txt_fnd_doc_dni); ?></td>
                                                        <td><?php echo $btn_fnd_doc; ?></td>
                                                        <td><span id="preload"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="c_list_data_persona" style="margin-top: 10px;"></div>
                                        </fieldset>
                                    </div>
                                    <!-- Cargamos el formulario de Registro CHC o CHCOB --> 
                                    <br />
                                    <div id="c_frm_chc_ins"></div>
                                    <!-- -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pl" style="width:100%;">
            <div id="div_qry"></div>
        </div>
    </div>  
<?php $this->load->view('dashboard/footer');?>