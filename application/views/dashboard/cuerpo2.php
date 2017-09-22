      <link rel="stylesheet" href="<?php echo URL_MAIN; ?>navigation/css/style.css" type="text/css" media="screen"/>
<style>
            *{
                margin:0;
                padding:0;
            }
            body{
                font-family:Arial;
                background:#fff url('<?php echo URL_MAIN; ?>navigation/images/bg.png') no-repeat top left;
               height: 130%;
            }
            .title{
                width:548px;
                height:119px;
                position:absolute;
                top:340px;
                left:150px;
                background:transparent url('<?php echo URL_MAIN; ?>navigation/title.png') no-repeat top left;
            }
            a.back{
                background:transparent url('<?php echo URL_MAIN; ?>navigation/back.png') no-repeat top left;
                position:fixed;
                width:150px;
                height:27px;
                outline:none;
                bottom:0px;
                left:0px;
            }
            #content{
                margin:0 auto;
            }


        </style>

 <body>
        <div id="content">
            <a class="back" href="http://tympanus.net/codrops/2010/04/29/awesome-bubble-navigation-with-jquery"></a>
            <div class="title"></div>

            <div class="navigation" id="nav">
                <div class="item user">
                    <img src="<?php echo URL_MAIN; ?>navigation/images/bg_user.png" alt="" width="199" height="199" class="circle"/>
                    <a class="icon"></a>
                    <h2>Usuario</h2>
                    <ul>
					<?php 
					$valor = $this->session->userdata('nUsuTipo');
					if ($valor == '7'){
					  echo '<li><a href="http://localhost/ovcipcdll/intranet/actualizacion_colegiado">Datos</a></li>';
					} else{
					 echo '<li><a href="http://localhost/ovcipcdll/intranet/actualizacion_usuarioexterno">Datos</a></li>';
					}
					?> 

                        <li><a href="http://localhost/ovcipcdll/intranet/cambiar_clave">Contraseña</a></li>
                    </ul>
                </div>
                <div class="item home">
                    <img src="<?php echo URL_MAIN; ?>navigation/images/bg_home.png" alt="" width="199" height="199" class="circle"/>
                    <a class="icon"></a>
                    <h2>Habilidad</h2>
                    <ul>
                        <li><a href="http://localhost/ovcipcdll/intranet/habilidad_colegiado">Consultar</a></li>
                    </ul>
                </div>
                <div class="item shop">
                    <img src="<?php echo URL_MAIN; ?>navigation/images/bg_shop.png" alt="" width="199" height="199" class="circle"/>
                    <a class="icon"></a>
                    <h2>Enlaces</h2>
                    <ul>
                        <li><a target="_blank" href="http://localhost/">Portal Web</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/CipLaLibertad">Facebook</a></li>
                        <li><a target="_blank" href="https://twitter.com/cipcdll">Twitter</a></li>
                    </ul>
                </div>
<!--                <div class="item camera">
                    <img src="<?php echo URL_MAIN; ?>navigation/images/bg_camera.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Photos</h2>
                    <ul>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Prints</a></li>
                        <li><a href="#">Submit</a></li>
                    </ul>
                </div>-->
<!--                <div class="item fav">
                    <img src="<?php echo URL_MAIN; ?>navigation/images/bg_fav.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Love</h2>
                    <ul>
                        <li><a href="#">Social</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Comments</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
        <!-- The JavaScript -->
        <script type="text/javascript" src="http://localhost/oficinavirtualcip/navigation/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#nav > div').hover(
                function () {
                    var $this = $(this);
                    $this.find('img').stop().animate({
                        'width'     :'199px',
                        'height'    :'199px',
                        'top'       :'-25px',
                        'left'      :'-25px',
                        'opacity'   :'1.0'
                    },500,'easeOutBack',function(){
                        $(this).parent().find('ul').fadeIn(700);
                    });

                    $this.find('a:first,h2').addClass('active');
                },
                function () {
                    var $this = $(this);
                    $this.find('ul').fadeOut(500);
                    $this.find('img').stop().animate({
                        'width'     :'52px',
                        'height'    :'52px',
                        'top'       :'0px',
                        'left'      :'0px',
                        'opacity'   :'0.1'
                    },5000,'easeOutBack');

                    $this.find('a:first,h2').removeClass('active');
                }
            );
            });
        </script>
    </body>





