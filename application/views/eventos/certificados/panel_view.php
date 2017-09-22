<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>scripts_uploadify/jquery.uploadify-3.1.min.js'></script>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script> 

<title><?php echo $titulo?></title>

<script type="text/javascript" src='<?php echo URL_JS; ?>eventos/certificados/jsCertificado.js'></script>   
<div class="content">      
    <div class="row-fluid">    
      <div class="box">
            <div class="box-head">
                <h3>Módulo de <i>Certificados de Eventos Capitulares y Externos </i> CIP-CDLL</h3>
            </div>
           <div class="box-content" >

                <div id="Tabs_Certificado" >
                    <ul>
                          <li><a href="#pl" id="tab_certificadolistar">Listado</a></li>
                    </ul>
                    <div id="pl" style="height:380px;">
                        <table> 
                            <tr> 
                                <td><label id="lbl" class="control-label" for="c_cbo_evento_listar"><b>Eventos :</b></label></td>
                                <td><div id="c_cbo_evento_listar"></div></td>
                                <td>&nbsp&nbsp<button class="btn btn-primary" id="busqueda_certificado" onclick="listarCertificados()">Buscar</button></td>
                            </tr>  
                        </table>
                                                                       
                    </div>  
                      <div id="div_qry" style="margin-top:-300px;"></div>    
                </div>
               
           </div>
      </div>
        
    </div>
</div>
     
<?php $this->load->view('dashboard/footer');?>


