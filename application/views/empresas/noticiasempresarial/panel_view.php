
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>empresas/jsNoticiasEmpresarial.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_NoticiasEmpresarial').tabs();
    })
</script>
<?php
$radio_emp1 = array('name' => 'rdbtipbus', 'id' => 'radio_emp1', 'checked' => TRUE);
$radio_emp2 = array('name' => 'rdbtipbus', 'id' => 'radio_emp2');
$radio_emp3 = array('name' => 'rdbtipbus', 'id' => 'radio_emp3');
$txt_fnd_emp_desc = array('name' => 'txt_fnd_emp_desc', 'id' => 'txt_fnd_emp_desc', 'maxlength' => '50', 'class' => 'input-medium tip', "style" => "width:310px;");
$boton = form_submit('btn_fnd_empresas', 'Buscar', 'id="btn_fnd_empresas" class="btn btn-primary"');
?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Noticias Empresariales</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_NoticiasEmpresarial">
                    <ul>
                        <li><a href="#NoticiasEmpresariall" id="NoticiasEmpresarialRegistrar">Nuevo</a></li>
                        <li><a href="#NoticiasEmpresarial2" id="NoticiasEmpresarialListar">Listado</a></li>
                    </ul>
                    <div id="NoticiasEmpresariall">
                        <div id="RegistrarEmpresa">
                            <?php $this->load->view('empresas/noticiasempresarial/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="NoticiasEmpresarial2">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="radios_empresa" class="controls">
                                            <?php echo form_radio($radio_emp1) ?> <label for="radio_emp1">Empresa</label>			
                                            <?php echo form_radio($radio_emp2); ?> <label for="radio_emp2">R.U.C</label>
                                            <?php echo form_radio($radio_emp3); ?> <label for="radio_emp3">Rubro</label>

                                        </div> 
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_emp_desc); ?>  </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><?php echo $boton; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <br>
                        <div align="center" id="c_qry_emp"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







