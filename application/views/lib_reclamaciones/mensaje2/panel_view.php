<?php $this->load->view('dashboard/header');?>
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>

<script type="text/javascript" src='<?php echo URL_JS; ?>lib_reclamaciones/jsBuzonEntrada.js'></script>
    <div id="Tabs_Mensaje" >
        <ul>
           
            <li><a href="#pl" id="tab_mensajelistar">Buzones</a></li>
        </ul>
       
       
        
        
        
        <div id="pl" >
            <div id="tab_Mensajes" >
                
            <ul>
              <li><a href="#pl1" id="tab_buzonReclamo">Buzon Reclamo</a></li>
              <li><a href="#pl2" id="tab_buzonSugerencia">Buzon Sugerencia</a></li>
              <li><a href="#pl3" id="tab_buzonOpinion">Buzon Comentario</a></li>
           </ul>
    
            <div id="pl1" style="width:125%;">        
            <div id="div_qry"></div>
            </div>
            
             <div id="pl2" style="width:125%;">        
            <div id="div_qry1"></div>
        </div>
            
             <div id="pl3" style="width:125%;">        
            <div id="div_qry2"></div>
        </div>
              </div>
          </div>
</div> 
<?php $this->load->view('dashboard/footer');?>