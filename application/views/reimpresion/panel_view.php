
<?php
$this->load->view('dashboard/header');
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>reimpresion/jsReimpresion.js"></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 


<div class="content">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Certificados Emitidos </i> CIP-CDLL</h3>
            </div>
            <div class="box-content">
                <div id="Tabs_Eventos">
                    <ul>
                        <li><a href="#Eventos2" id="EventosListar">Listado</a></li>
                    </ul>
                    <div id="Eventos2">
                        <table>
                            <tr>
                                <td>Tipo Certificado: </td>
                                <td>
                                    <select id="tipoCertificado">
                                        <option value="infocip" >INFOCIP</option>
                                        <option value="iepi">IEPI</option>
                                        <option value="evento">EVENTO</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Entre: </td>
                                <td><input id="fechainicio" name="fechainicio" type="text" placeholder="Fecha Inicio"></td>
                                <td><input id="fechafin" name="fecchafin" type="text" placeholder="Fecha Fin"></td>
                            </tr>
                            <tr>
                                <td><button  class="btn btn-primary" id="listarCertificados">Listar</button></td>
                                
                            </tr>
                                
                        </table>
                        <div align="center" id="qry_certificados" style="width: auto">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>







