<?php $this->load->view('dashboard/header');?>
<script type="text/javascript" src='<?php echo URL_JS; ?>portal_infocip/jsSugerencialista.js'></script> 
<script src="<?php echo URL_JS ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo URL_JS ?>ckeditor/adapters/jquery.js" type="text/javascript"></script>
   
<div class="content" style="width: 600px">      
    <div class="row-fluid">
        <div class="box">
            <div class="box-head">
                <h3>Modulo de Listar sugerencias</h3>
            </div>
            <div class="box-content">

<div id="Tabs_Sugerencias" >
        <div id="pr">
            <center><div id="div_qry">
                <?php $this->load->view('portal_infocip/sugerencialista/qry_view'); ?>
            </div></center>
        </div>
</div>
                       </div>
        </div>
    </div>
</div> 

 <?php $this->load->view('dashboard/footer');?>