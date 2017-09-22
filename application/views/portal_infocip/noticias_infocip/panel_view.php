
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>portal_infocip/noticias_infocip/jsNoticiasInfocip.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('#Tabs_NoticiasInfocip').tabs();
    })
</script>
<?php
$txt_fnd_noticiasinfocip_desc = array('name' => 'txt_fnd_noticiasinfocip_desc', 'id' => 'txt_fnd_noticiasinfocip_desc', 'maxlength' => '50', 'class' => 'input-medium tip', "style" => "width:310px;");
$boton = form_submit('btn_fnd_noticiasinfocip', 'Buscar', 'id="btn_fnd_noticiasinfocip" class="btn btn-primary"');
?>
<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Noticias INFOCIP</i></h3>
            </div>
            <div class="box-content">
                <div id="Tabs_NoticiasInfocip">
                    <ul>
                        <li><a href="#BolsaTabl" id="NoticiasInfocipRegistrar">Nuevo</a></li>
                        <li><a href="#BolsaTab2" id="NoticiasInfocipListar">Listado</a></li>
                    </ul>
                    <div id="BolsaTabl">
                        <div id="RegistrarNoticiasInfocip">
                            <?php $this->load->view('portal_infocip/noticias_infocip/ins_view'); ?>

                        </div>  
                    </div>
                    <div id="BolsaTab2">
                        
                                           <div class="control-group">                 
        <div class = "controls">
            <legend>Lista de Noticias INFOCIP</legend> 
            <label for="tipos" class="control-label">Seleccione:</label>
            <select name="tipos" id="tipos" onchange="filtroTipo(this)"  class="input-medium tip" style="width:260px;" required="required" data-original-title="Selecione el tipo de noticia" data-placement="right">           
                         <option value="">Tipo de Noticias</option>
                    <?php
                    foreach($Curso as $Curso) {
                    ?>
                         <option value="<?php echo $Curso -> nTNotCodigo ?>"><?php echo $Curso -> nTNotDescripcion ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
                        
                        
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                             <table>
                                            <tbody>
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>	
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div align="center" id="c_qry_noticiasinfocip"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







