
<!doctype html>
<html>
<head>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/biblioteca/turn.min.js"></script>
<style type="text/css">
body{
	background:#ccc;
}
#magazine{
	width:1000px;
	height:600px;
}
#magazine .turn-page{
	background-color:#ccc;
	background-size:100% 100%;
}
</style>
</head>
<body>

<div id="magazine">
    <?php if ($bandeja > 0) { ?>
        <?php foreach ($bandeja as $bandeja) {//1
             ?>
              
    <IMG SRC="<?php echo "../../../uploads/cip/".$bandeja["cMatMultimedia"] ?>">
             


        <?php } ?>
    
    
                
    <?php
       } else {
               echo "No se encontraron registros";
              }
      ?>


</div>

<script type="text/javascript">

	$(window).ready(function() {
		$('#magazine').turn({
							display: 'double',
							acceleration: true,
							gradients: !$.isTouch,
							elevation:50,
							when: {
								turned: function(e, page) {
									/*console.log('Current view: ', $(this).turn('view'));*/
								}
							}
						});
	});
	
	
	$(window).bind('keydown', function(e){
		
		if (e.keyCode==37)
			$('#magazine').turn('previous');
		else if (e.keyCode==39)
			$('#magazine').turn('next');
			
	});

</script>

</body>
</html>







