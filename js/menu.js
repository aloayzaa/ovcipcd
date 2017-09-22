$(document).ready(function() {
	document.getElementById("mensajecarga").style.visibility="hidden";
	estilito();
	// Probando
	$(".collapsed-nav > li > a").click(function(e){
		// alert('¿Eres sapo o sapa?');
	});

	$(".style-toggler2").click(function(e){
		if($('.style-switcher2').position().left < -1){
			$(this).animate({
				left:'+=230'
			});
			$('#contenidogen').animate({
				left:'+=230',
				width:'-=230'
			});
			// $('.container-fluid').attr('width','500px');
			$('.style-switcher2').animate({
				left:'-1px'
			},400);
		} else {
			$(this).animate({
					left:'-=230'
				});
			$('#contenidogen').animate({
				left:'-=230',
				width:'+=230'
			});
			$('.style-switcher2').animate({
				left:'-233px'
			},400);
		}
	});
	var $style2 = $(".style-toggler2");
	var $styleswitcher2 = $('.style-switcher2');

	$("#optciudadano").click(function(e){
		$(this).addClass('active');
		$("#optadmin").removeClass('active');
		$("#opttrab").removeClass('active'); 

		msjCargando();
		 
		$.ajax({
	        url : 'index.php/dashboard/creaMenu/2',
	        success : function (data){ 
	            $("#prueba2").fadeIn(1000).html(data);
	             estilito();
	             document.getElementById("mensajecarga").style.visibility="hidden";
	        }
	    });
	});

	$("#optadmin").click(function(e){
		$(this).addClass('active');
		$("#optciudadano").removeClass('active');
		$("#opttrab").removeClass('active');

		// $.post('index.php/dashboard/creaMenu/2',{},function(data){
		// 	$("#prueba2").fadeIn(1000).html(data);
		// 	estilito();
		// });
		msjCargando();

		$.ajax({ 
	        url : 'index.php/dashboard/creaMenu/1',
	        success : function (data){
	             $("#prueba2").fadeIn(1000).html(data);
	             estilito();
	             document.getElementById("mensajecarga").style.visibility="hidden";
	        }
	    });
	});
	$("#opttrab").click(function(e){
		$(this).addClass('active');
		$("#optadmin").removeClass('active');
		$("#optciudadano").removeClass('active');
		msjCargando();

		$.ajax({
	        url : 'index.php/dashboard/creaMenu/2',
	        success : function (data){
	             $("#prueba2").fadeIn(1000).html(data);
	             estilito();
	             document.getElementById("mensajecarga").style.visibility="hidden";
	        }
	    });
	});

	// INICIO AGREGADO
	function estilito(){
		$('.toggle-collapsed').click(function(e){
			e.preventDefault();
		if($(this).parent().find('.collapsed-nav').is(":visible")){
			$(this).parent().removeClass("active open");
			$(this).parent().find('.collapsed-nav').slideUp();
			$(this).find('img').attr("src", 'http://www.cip-trujillo.org/ovcipcdll/img/dashboard/toggle-subnav-down.png');
		} else {
			$(this).parent().addClass("active open");
			$(this).parent().find('.collapsed-nav').slideDown();
			$(this).find('img').attr("src", 'http://www.cip-trujillo.org/ovcipcdll/img/dashboard/toggle-subnav-up-white.png');
		}
		});
	};
	// FIN AGREGADO
})