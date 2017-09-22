<html>
    <head>
        <style>
            html {
                background-color: #EEE;
            }
            body {
                color: #666;
                margin: 0;
                padding: 0;
                font-family: Verdana, Helvetica, sans-serif;
                font-size: 12px;
                line-height: 140%;
            }
            p {
                text-align: left;
            }

            h1 {
                font-size: 22px;
                line-height: 110%;
                font-weight: normal;
                font-style: normal;
                text-align: left;
                font-family: Verdana;
                margin-top: 0px;
            }
            h2 {
                font-size: 18px;
                line-height: 110%;
                text-align: left;
                margin-top: 2px;
                margin-bottom: 5px;
                font-family: Verdana;
            }
            h3 {
                font-size: 16px;
                line-height: 110%;
                text-align: left;
                margin-top: 2px;
                margin-bottom: 5px;
                font-family:  Verdana;
            }
            h4 {
                font-size: 14px;
                line-height: 110%;
                text-align: left;
                margin-top: 2px;
                margin-bottom: 5px;
                font-family:  Verdana;
            }
            h5 {
                font-size: 12px;
                line-height: 110%;
                text-align: left;
                margin-top: 2px;
                margin-bottom: 5px;
            }
            h6 {
                font-size: 11px;
                line-height: 110%;
                text-align: left;
                margin-top: 2px;
                margin-bottom: 5px;
                font-weight: normal;
            }
            img {
                border-style: none;
            }
            header, footer, section, nav, aside, hgroup {
                display: block;
            }

            .block {
                display: block;
            }
            .none {
                display: none;
            }
            /* Estilos para las cajas */
            header#top {
                width: 990px;
                position: relative;
                height: 70px;
                margin-top: 0;
                margin-right: auto;
                margin-bottom: 0;
                margin-left: auto;
            }
            header#top h1.logo {
                width: 300px;
                height: 180px;
                position: absolute;
                top: 0;
                z-index: 100;
                margin: 0;
            }
            header#top h1.logo a {
                display: block;
                width: 300px;
                height: 180px;
                outline: 0 none;
            }
            header#top div#tools {
                width: 690px;
                height: 125px;
                position: absolute;
                top: -1px;
                padding-top: 0px;
                left: 301px;
            }
            header#top #tools .call {
                display: block;
                float: right;
                padding: 0px;
                width: 228px;
                text-align: right;
                margin-top: 40px;
                margin-right: 20px;
                margin-bottom: 0px;
                margin-left: 0px;
            }
            header#top #tools .call img{
                padding: 0px;
                margin: 0px;
            }
            header#top #tools .call h2{
                text-align: right;
                margin: 0px;
                padding: 0px;
            }
            header#top #tools img {
                float: left;
                margin-top: 45px;
            }
            header div#ribbon {
                height: 30px;
                position: relative;
                float: right;
            }
            #ribbon {
                position: absolute;
                width: 50px;
                height: 10px;
                background: url('./uploads/ribbon.png')no-repeat;

                top: 0px;
                left: 600px;
            }
            section#top {
                width: 100%;
                height: 30px;
                margin: 0;
                padding: 0;
                height: 30px;
            }
            section#main {
                width: 990px;
                height: auto;
                text-align: left;
                margin: 0 auto;
                background-color: #FFF;
            }
            /* home */
            section#contenthome {
                width: 680px;
                overflow: hidden;
                float: none;
                clear: both;
                margin-top: 20px;
                margin: 0px;
                padding: 10px;
                background-color: #F1F1F1;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
            }
            section#contenthome .titulo{
                font-size: 13px;
                font-weight: bold;
                color: #006CB7;
                display: block;
                margin-bottom: 10px;
                margin-top: 10px;
            }
            section#contenthome #ingreso {
                border: 1px solid #CCC;
                border-collapse: collapse;
                float: left;
                margin-top: 0px;
                margin-right: 40px;
                margin-bottom: 10px;
                margin-left: 0px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                background-color: #FFFFFF;
/*           //     width: 37%;*/
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                padding-left: 20px;
            }
            section#contenthome #expediente {
                border: 1px solid #CCC;
                border-collapse: collapse;
                float: left;
                margin-top: 0px;
                margin-right: 20px;
                margin-bottom: 10px;
                margin-left: 0px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                background-color: #FFFFFF;
                width: 600px;
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                padding-left: 40px;
            }
            section#contenthome #registro {
                padding: 10px;
                border: 1px solid #CCC;
                border-collapse: collapse;
                float: left;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 10px;
                margin-left: 0px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                background-color: #FFFFFF;
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                padding-left: 20px;
            }
            /*contenido paginas interiores*/
            section#content {
                width: 948px;
                overflow: hidden;
                padding: 0px;
                margin-right: auto;
                margin-bottom: 40px;
                margin-left: auto;
                float: none;
                clear: both;
                margin-top: 0px;
                background-color: #FFF;
                border: 1px solid #E0E0E0;
            }

            /* estilos para el footer */
            section#main footer {
                clear: both;
                margin: 0 auto;
                overflow: hidden;
                margin-top: 20px !important;
            }
            /*tablas*/
            table {
                padding: 0px;
                margin: 0px;
            }
            table tr {
                padding: -5px;
            }

            #table-doc th {
                background-color: #EFEFEF;
                padding: 3px;
                border-right-width: 1px;
                border-right-style: solid;
                border-right-color: #CCC;
            }
            #table-doc thead {
                color: #666;
                font-size: 12px;
            }
            #table-doc td {
                color: #666;
                border-top-width: 1px;
                border-top-style: solid;
                border-top-color: #CCC;
                border-right-width: 1px;
                border-right-style: solid;
                border-right-color: #CCC;
                padding-top: 3px;
                padding-right: 7px;
                padding-bottom: 3px;
                padding-left: 7px;
            }
            #table-doc tbody tr:hover td {
                color: #333;
                background-color: #F2F2F2;
            }/* Mensajes y alertas */
            .info, .warning, .error, .success {
                color: #2b2b2b;
                /*corner*/
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
            }
            .info h4, .warning h4, .error h4, .success h4 {
                font-size: 1em;
                line-height: 1em;
                letter-spacing: -.02em;
                padding: 0;
                margin: 0 0 .3em 0;
            }
            .info {
                border-color: #bcdfef;
                background-color: #d1ecf7;
                background-repeat: no-repeat;
                background-position: 12px 10px;
            }
            .warning {
                border-color: #fceb77;
                background-color: #fff6bf;
                background-repeat: no-repeat;
                background-position: 12px 10px;
            }
            .error {
                border-color: #f6abab;
                background-color: #fad0d0;
                background-repeat: no-repeat;
                background-position: 12px 10px;
            }
            .success {
                border-color: #d0f1a6;
                background-color: #e5f8ce;

                background-repeat: no-repeat;
                background-position: 12px 10px;
            }
            .success strong, .success a {
                color: #62b548;
            }
            .info strong, .info a {
                color: #11689e;
            }
            .warning strong, .warning a {
                color: #957210;
            }
            .error strong, .error a {
                color: #b01717;
            }
            .info, .warning, .error, .success {
                border: 1px solid #ccc;
                display: block;
                height: auto;
                clear: both;
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                padding-left: 38px;
                margin-top: 10px;
                margin-right: 0;
                margin-bottom: 10px;
                margin-left: 0;
            }
            .info li, .warning li, .error li, .success li {
                padding: 0;
                margin-bottom: .4%;
                font-size: 0.8em;
                line-height: 1.1em;
                vertical-align: top;
            }
            /*formularios*/
            fieldset {
                background: #fff;
                /*corner*/
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                border: 1px solid #d4d4d4;
                position: relative;
                height: 100%;
                margin-top: 1em;
                margin-right: 0;
                margin-bottom: 1em;
                margin-left: 0;
                padding-top: 1.2em;
                padding-right: 0;
                padding-bottom: 1.2em;
                padding-left: 0;
            }
            /* Form legend and titles */
            legend {
                font-size: 1.2em;
                line-height: 1em;
                letter-spacing: -.035em;
                color: #666666;
                font-weight: bold;
                margin-left: 1%;
                margin-right: 1%;
                padding: 0.5% 0.5% 0.8%;
            }
            /* form elements */
            label {
                color: #666666;
                font-size: 1.2em;
                line-height: 7px;
                display: block;
            }
            .linea {
                font-size: 12px;
                display: block;
                width: 2px;
                float: left;
                padding-top: 5px;
                padding-right: 2px;
                padding-bottom: 2px;
                padding-left: 2px;
                margin-right: 5px;
            }
            .boton {
                padding: 4px;
                cursor: pointer;
                text-align: center;
                display: inline-block;
                border: 1px solid #D4D4D4;
                font-size: 1.1em;
                line-height: 1.3em;
                font-weight: bolder;
                letter-spacing: -.015em;
                color: #fff;
                border-color: #3a77a4;
                background: #5393c2;
                /* gradient */
                background: -moz-linear-gradient(top, #5393c2 40%, #3a77a4);
                background: -webkit-linear-gradient(top, #5393c2 40%, #3a77a4);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5393c2', endColorstr='#3a77a4');
                /* corner */
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                border-radius: 4px;
                /* shadow */
                -moz-box-shadow: inset 0 1px 0 0 rgba(255,255,255,.4);
                -webkit-box-shadow: inset 0 1px 0 0 rgba(255,255,255,.4);
                box-shadow: inset 0 1px 0 0 rgba(255,255,255,.4);
                width:230px;
            }
            #input{
                border:0.5px solid gainsboro;
                border-radius:10px ;
                padding:3px;
                background:whitesmoke;
                width:100px;
                color: chocolate;
                font-weight: bold;
            }
            .textarea{border:0.5px solid gainsboro;border-radius:10px ;padding:4px;background:whitesmoke;width:230px;color: chocolate;height:50px;font-weight: bold;}
            .textareaExp{border:0.5px solid gainsboro;border-radius:10px ;padding:4px;background:whitesmoke;width:500px;color: chocolate;height:30px;font-weight: bold;}
           
            ul {
                width: 760px;
                margin-bottom: 20px;
                overflow: hidden;
                list-style-type: square;
            }

            li {
                line-height: 1.5em;
                float: left;
                display: inline;
                margin-right: 30px;
            }
            span{
                font-size: 12px;
            }
        </style></head>
    <body>
      
   
        <img style="position: absolute;left:450px;" width="260" height="70" alt="Sistema Sistram Web" src="./uploads/sistram.png" />
        <h1 style="position: absolute;left:100px;color: dimgray">Colegio de Ingenieros del Perù</h1>
        <h2 style="position: absolute;left:100px;color: dimgray;padding-top: 30px;">Consejo Departamental de La Libertad</h2>
        <section class="default" id="main">

            <header id="top">
                <img width="70" height="70" src="./uploads/logo_cip.png">
            </header>
            <section id="contenthome">
                <div class="titulo">Comprobante de Solicitud de Tràmite</div>
                <br>
                <div class="info">Sistema de Tràmite Documentario CIP-CDLL <b>Codigo: </b><span style="color:red;font-size: 13px;"><b><?php echo $tabla->nExpedienteCodigo; ?></b></span>, nùmero de expediente de consulta favor ingresar a <b style="color:#CC0000">www.cip-trujillo.org/consultar</b></div><br>
                <div  class="titulo">Datos Personales: Solicitante / Apoderado</div>
                <div id="registro">
                 
                           

                            <?php if (($tabla->dni == null) && ($tabla->carnet == null)) { ?>
                                    <label for="run" style="padding-bottom: 15px;">
                                            <span style="font-weight: bold">Razón Social:</span> <span><?php echo $tabla->cPerNombres; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">RUC:</span> <span><?php echo $tabla->ruc; ?></span>
                                    </label>
                                    <br>
                                    <label for="run"><span style="font-weight: bold">Correo Empresa:</span> <span><?php echo $tabla->correo; ?></span></label>
                                     <br>
                                                             
                                   
                            <?php } else if(($tabla->ruc == null) && ($tabla->carnet == null)){ ?>
                                        <label for="run" style="padding-bottom: 15px;">
                                                                                        <span style="font-weight: bold">Nombres:</span> <span><?php echo $tabla->cPerNombres; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">Apellidos:</span> <span><?php echo $tabla->apellidos; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">DNI:</span> <span><?php echo $tabla->dni; ?></span>
                                        </label>
                                        <br>
                                         
                                        <label for="run"><span style="font-weight: bold">Correo:</span> <span><?php echo $tabla->correo; ?></span></label>
                                        <br>
                            <?php } 
                            else { ?>
                                        <label for="run" style="padding-bottom: 15px;">
                                            <span style="font-weight: bold">Apellidos:</span> <span><?php echo $tabla->apellidos; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">Nombres:</span> <span><?php echo $tabla->cPerNombres; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">Carnet de Ext.:</span> <span><?php echo $tabla->carnet; ?></span>
                                        </label>
                                        <br>
                                         
                                        <label for="run"><span style="font-weight: bold">Correo:</span> <span><?php echo $tabla->correo; ?></span></label>
                                        <br>
                            <?php } ?>

                          
                      
                    
                </div>

                <div  class="titulo">Datos de Expediente: </div>
                <div id="registro">
                            <label for="run" style="padding-bottom: 15px;">
                                            <span style="font-weight: bold">Expediente:</span> <span><?php echo $tabla->nExpedienteCodigo; ?></span>
                            </label>
                            <br>
                            <label  for="run" style="padding-bottom: 15px;">
                                            <span style="font-weight: bold">Fecha de Registro:</span> <span ><?php echo $tabla->cExpedienteFechaRegistro; ?></span>
                            </label>
                            <br>
                            <label for="run" style="padding-bottom: 15px;">
                                            <span style="font-weight: bold">Sumilla:</span> <span><?php echo $tabla->cExpedienteSumilla; ?></span>
                            </label>
                            <br> 
                            <label style="line-height: 15px;" for="run" style="padding-bottom: 25px;">
                                            <span style="font-weight: bold">Asunto:</span> <span ><?php echo $tabla->cExpedienteAsunto; ?></span>
                            </label>
                            <br> 
                        
                            <label for="run"><span style="font-weight: bold">Requisitos Adjuntos:</span></label>
                                        <br>
                                    <ul>
                                        <?php
                                        If($requisitos>0){
                                          $var = 0;
                                        foreach ($requisitos as $requisitos) {
                                            if ($var == 3) {
                                                echo '<br>';
                                                $var = 0;
                                            }
                                            ?>
                                            <li>- <?php echo $requisitos ["cRequisitosDescripcion"] . '.'; ?></li>

                                            <?php
                                            $var++;
                                        }  
                                        }else{
                                              echo "<div class='alert alert-block'><h4 class='alert-heading'>Información!!</h4>No existe documentación adjunta.</div>";
                                        }
                                        
                                        ?>        
                                    </ul> 
                                
                           
                </div>
            </section>

            <?php if($movimientos!=''){  ?>
   
             <div id="firmas" style="background-color:#F1F1F1;margin-top:20px;padding:10px;width:680px;margin:0px;">
                 <h4> V°B° Involucrados: </h4><br><br>
                    <?php $i=1;foreach ($movimientos as $movimiento){ ?>
                 
                    <div style="display:inline-block;width: 220px;height: 130px;padding-bottom:15px;padding-right:10px;">
                        <div style="border:1px solid black;width: 220px;height: 105px;padding-top:5px;">
                            <?php if($movimiento->cMovimientoEstado=='Procesado'){ ?>
                            <center>
                                <img width="80" height="80" src="./uploads/sistram/firmas/sello1.jpg" /><br>
                                <span><?php echo $movimiento->dMovimientoFechaAtencion ?></span>
                            </center>
                        <?php }?>
                        </div>
                         <div style="border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black;width: 220px;height: 20px;text-align: center"><?php echo $movimiento->cDescripcionCargo?></div>
                    </div>
                    
                
              
                    <?php 
                      $fechaderivacion=$movimiento->dMovimientoFechaRecepcion;
                      $usuarioemisor=$movimiento->nAreasIdEmisor;
                      if($i%3==0){
                         echo '<br>';
                     }
                    
                    $i++;} ?>
            </div> 
<br>
            <?php } ?>
                      <div class="warning" style="width:650px;">Cualquier acceso o uso indebido de la informacion contenida en este sistema, sera sancionado de acuerdo a lo establecido en la Ley Nro. 19.223 que tipifica figuras penales relativo a delitos informaticos.</div>
            
                <?php if ($visto=='vb'){ // estatico para VB de los directivo y/o administrador
                    if($usuarioemisor=='7'){?>
                        <center><img style="position: absolute;top:380px;left:520px;transform: rotate(-30deg);" src="./uploads/sistram/firmas/administrador.png" /></center>
                        <center><p style="position: absolute;top:460px;left:565px;transform: rotate(-30deg);color: black;"><?php echo $fechaderivacion;?></p></center>
                <?php }else if($usuarioemisor=='4'){
                        echo'<img id="secretario" style="position: absolute;top:380px;left:530px;transform: rotate(-30deg);" src="./uploads/sistram/firmas/secretario.png">'; 
                       echo '<center><p style="position: absolute;top:460px;left:565px;transform: rotate(-30deg);color: black;">'. $fechaderivacion .'</p></center>';  
                    }else if($usuarioemisor=='3'){
                        echo'<img id="decano" style="position: absolute;top:380px;left:530px;transform: rotate(-30deg);" src="./uploads/sistram/firmas/decano.png">'; 
                       echo '<center><p style="position: absolute;top:460px;left:565px;transform: rotate(-30deg);color: black;">'. $fechaderivacion .'</p></center>';  
                    }
                    else if($usuarioemisor=='5'){
                        echo'<img id="pro-secretario" style="position: absolute;top:380px;left:530px;transform: rotate(-30deg);" src="./uploads/sistram/firmas/pro-secretario.png">'; 
                       echo '<center><p style="position: absolute;top:460px;left:565px;transform: rotate(-30deg);color: black;">'. $fechaderivacion .'</p></center>';  
                    }
                }?>
            <footer>
                <div style="margin-left: 95px;">
                    <h6><b>Colegio de Ingenieros del Perú CD. La Libertad -- Francisco Borja Nro 250 Urb. La Merced - Trujillo</b></h6>
                </div>
                <div style="margin-left: 200px;">
                    <h6><b>Correo:<span style="color: dodgerblue">informescdll@cip.org.pe </span> / Teléfono: <span style="color: indianred">(044)608395</span></b></h6>
                </div>
            </footer>
        </section>
         <br>
             

</body>
</html>