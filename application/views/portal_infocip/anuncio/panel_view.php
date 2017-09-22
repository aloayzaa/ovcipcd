
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>portal_infocip/anuncio/jsAnuncio.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_Anuncio').tabs();
    })
</script>
<?php
$txt_fnd_anuncio_desc = array('name' => 'txt_fnd_anuncio_desc', 'id' => 'txt_fnd_anuncio_desc', 'maxlength' => '50', 'class' => 'input-medium tip', "style" => "width:310px;");
$boton = form_submit('btn_fnd_anuncio', 'Buscar', 'id="btn_fnd_anuncio" class="btn btn-primary"');
?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Anuncios</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Anuncio">
                    <ul>
                        <li><a href="#BolsaTabl" id="AnuncioRegistrar">Nuevo</a></li>
                        <li><a href="#BolsaTab2" id="AnuncioListar">Listado</a></li>
                    </ul>
                    <div id="BolsaTabl">
                        <div id="RegistrarAnuncio">
                            <?php $this->load->view('portal_infocip/anuncio/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="BolsaTab2">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                             <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><img src="<?php echo URL_IMG; ?>dashboard/icons/essen/32/search.png">&nbsp; </td>
                                                    <td>&nbsp;</td>
                                                    <td style="padding-bottom: 6px;"><strong><span style="color: #08c">Titulo</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top: 5px;"><?php echo form_input($txt_fnd_anuncio_desc); ?>  </td>
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
                        <div align="center" id="c_qry_anuncio"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







