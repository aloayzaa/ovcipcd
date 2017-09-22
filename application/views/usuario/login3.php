<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>CIP-CDLL - SERVICIOS VIRTUALES 2014</title>

        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="shortcut icon" href='<?php echo URL_IMG; ?>favicon.ico'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css' />

        <link rel="stylesheet" href='<?php echo URL_CSS_LOG; ?>style.css'>

        <!-- Scripts are at the bottom of the page -->

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>

        <!-- BACKGROUND -->
        <img src='<?php echo URL_MAIN; ?>img/login/background-1.jpg' class="background" alt="" />
        <!-- /BACKGROUND -->

        <!-- LOGO -->
        <div class="header">
            <h1>
                <img src='<?php echo URL_MAIN; ?>img/login/logo-cip_88x88.png' class="header-logo" alt="" />
                CIP-CD LA LIBERTAD
            </h1>
        </div>
        <!-- /LOGO -->

        <!-- MAIN CONTENT SECTION -->
        <section id="content">
            <br>      <br>
            <!-- SECTION -->
            <section class="clearfix section" id="start">

                <!-- SECTION TITLE -->
                <h3 class="block-title">Bienvenidos a la Oficina Virtual CIP-CDLL</h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile turquoise w2 h1 title-horizontalcenter icon-scaleuprotate360cw">
                    <a class="link" href="http://www.cip-trujillo.org/" target="_blank">
                        <i class="icon-tasks icon-4x"></i>
                        <p class="title">Portal Institucional CIP-CDLL</p>
                    </a>
                </div>

                <div class="tile orange w2 h1 icon-featurecw title-fadeout">
                    <a class="link" href="">
                        <i class="icon-user icon-4x"></i>
                        <p class="title">Registrar Usuario</p>
                    </a>
                </div>

                <div class="tile blue title-verticalcenter icon-flip w2 h1">
                    <a class="link" data-scroll="scrollto" href="">
                        <i class="icon-picture icon-4x"></i>
                        <p class="title">Portfolio</p>
                    </a>
                </div>

                <div class="tile purple title-scaleup icon-scaledownrotate360cw w2 h1">
                    <a class="link" data-scroll="scrollto" href="">
                        <i class="icon-envelope icon-4x"></i>
                        <p class="title">Chat en Vivo</p>
                    </a>
                </div>

                <div class="tile blue icon-featurefade w1 h1">
                    <a class="link" href="http://www.cip-trujillo.org/portal_infocip/" target="_blank">
                        <i class="icon-weibo icon-4x"></i>
                        <p class="title">Portal Infocip</p>
                    </a>
                </div>

                <div class="tile red w1 h1 title-fadeout icon-scaleuprotate360cw">
                    <a class="link" href="" target="_blank">
                        <i class="icon-table icon-4x"></i>
                        <p class="title">Acceso Mobil</p>
                    </a>
                </div>

            </section>

            <section class="clearfix section" id="services">
                <h3 class="block-title">Ingreso de Usuario CIP-CDLL</h3>
                <div class="tile htmltile w5">
                    <div class="tilecontent">
                        <div class="content">
                            <div class="login-header bordered">
                                <h2>Oficina Virtual</h2>
                            </div>
                            <?php {
                                $atributosForm = array('id ' => 'loginForm', 'class' => "form-horizontal");
                                echo form_open('usuario/autenticar', $atributosForm);
                                $cajaNick = array('name' => 'user', 'id' => 'user', 'value' => set_value('user'), 'placeholder' => "Ej. icervantes", 'required' => 'required');
                                $cajaPsw = array('name' => 'pw', 'id' => 'pw', 'type' => 'password', 'value' => '', 'placeholder' => 'Ej. Cerdf!90Ec', 'required' => 'required');
                            }
                            ?>
                            <!--<form>-->
                            <div class="login-field">
                                <label for="username">Username</label>
                                <?php echo form_input($cajaNick); ?>
                                <i class="icon-user"></i>
                            </div>
                            <div class="login-field">
                                <label for="password">Password</label>
                                <?php echo form_input($cajaPsw); ?>
                                <i class="icon-lock"></i>
                            </div>
                            <div class="login-field">
                                <label for="password">Tipo de Usuario:</label>

                                <select id="cbo_usu_tipo" style="width: 195px"  name="cbo_usu_tipo">
                                    <option value="7">Colegiado</option>
                                    <option value="2">Administrador</option>
                                    <option value="5">Externo</option>
                                </select>
                            </div>
                            <div class="login-button clearfix">
                                <label class="checkbox pull-left">
                                    <input type="checkbox" class="uniform" name="checkbox1"> Recordar
                                </label>
                                <button type="submit" class="pull-right">INGRESAR <i class="icon-arrow-right"></i></button>
                            </div>
                            <div class="forgot-password">
                                <a href="#forgot-pw" role="button" data-toggle="modal">Recuperar contraseña?</a>
                            </div>
                            <!--</form>-->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /SECTION -->

            <!-- SECTION -->
             <section class="clearfix section" id="articles">

                <!-- SECTION TITLE -->
                <h3 class="block-title">Blog - Redes Sociales</h3>
                <!-- /SECTION TITLE -->

                <!-- SECTION TILES -->
                <div class="tile white title-scaleup imagetile w2 h1">
                    <div class="caption white">
                        <a class="link" data-href="https://www.facebook.com/CipLaLibertad" href="https://www.facebook.com/CipLaLibertad" target="_blank" >
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text twoline">
                                Acceso Directo "Facebook" !
                            </div>
                        </a>
                    </div>
                    <img src='<?php echo URL_MAIN; ?>img/login/blogpost-1.jpg' alt="" />
                </div>
                <div class="tile red title-scaleup imagetile w2 h1">
                    <div class="caption red">
                        <a class="link" data-href="https://www.gmail.com" href="https://www.gmail.com" target="_blank" >
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                 Acceso "Correo CIP-CDLL"!
                            </div>
                        </a>
                    </div>
                     <img src='<?php echo URL_MAIN; ?>img/login/Correo-gmail.jpg' alt="" />
                </div>
                <div class="tile brown title-scaleup imagetile w2 h1">
                    <div class="caption brown">
                        <a class="link" data-href="https://twitter.com/cipcdll" href="https://twitter.com/cipcdll" target="_blank">
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                               Acceso Directo "Twitter" !
                            </div>
                        </a>
                    </div>
                    <img src='<?php echo URL_MAIN; ?>img/login/twitter.jpg' alt="" />
                </div>
                <div class="tile turquoise title-scaleup imagetile w2 h1">
                    <div class="caption turquoise">
                        <a class="link" data-href="http://www.cip-trujillo.org/portal_infocip/pre_inscripcion/" href="http://www.cip-trujillo.org/portal_infocip/pre_inscripcion/" target="_blank" >
                            <div class="title"><i class="icon-file-text icon-2x"></i></div>
                            <div class="caption-text">
                                Reserva Cursos Online
                            </div>
                        </a>
                    </div>
                     <img src='<?php echo URL_MAIN; ?>img/login/infocip.jpg' alt="" />
                </div>
                <!-- /SECTION TILES -->

            </section>
            <!-- /SECTION -->


        </section> 
        <!-- /MAIN CONTENT SECTION -->

        <!-- LOCKSCREEN -->
        <section class="mlightbox" id="lockscreen">
            <div id="lockscreen-content">
                <img src='<?php echo URL_MAIN; ?>img/login/logo.png' height="109" width="140" id="locklogo" alt="Metromega" />
                <br /><br />
                <img src='<?php echo URL_MAIN; ?>img/login/preloader.gif' id="lockloader" alt="Loading.." />
            </div>
        </section>
        <!-- /LOCKSCREEN -->


        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> <!-- jQuery Library -->
        <script src='<?php echo URL_JS_LOG; ?>respond.min.js.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>jquery.isotope.min.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>jquery.mousewheel.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>jquery.mCustomScrollbar.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>tileshow.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>mlightbox.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>jquery.fitVids.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>lockscreen.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>bootstrap.min.js' type="text/javascript"></script>
        <script src='<?php echo URL_JS_LOG; ?>script.js' type="text/javascript"></script>



    </body>
</html>