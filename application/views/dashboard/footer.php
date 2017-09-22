 </div>
</div>
</div>
<div id="mensajecarga" style="top:0px;left:0px;width:100%;height:100%;position:fixed;z-index:9999;display:table;"></div> 
<!--
<script>
    $(function(){   
    	$("#radios").buttonset();
    });
</script>
-->
<script>
       $("#fotografia").prettyPhoto({
        overlay_gallery:false
    });
</script>    
 
<link rel="stylesheet" href='<?php echo URL_CSS; ?>css_pretyfoto/prettyPhoto.css'>  
<div class="footbar">
	<div class="container-fluid">
		<a id="fotografia" href="<?php echo URL_IMG; ?>dashboard/icons/essen/32/user.png"  class="company" style="font-size:20px;">
			<img src="<?php echo URL_IMG; ?>dashboard/icons/essen/32/user.png"  >&nbsp;
			<?php echo $this->session->userdata('Nombres');?></a> 
		<ul class="mini">
			<li class="dropdown dropdown-noclose supportContainer">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Todos los derechos reservados - Colegio de Ingenieros del Peru CDLL - <?php echo date('Y');?></a>				
			</li>			
		</ul>
	</div>
</div>
</body>
</html>