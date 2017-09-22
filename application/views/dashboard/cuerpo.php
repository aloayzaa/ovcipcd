<style>
    /* -- estilos article -- */
    article.post {
        margin: 0;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        border-top: 1px solid #aaa;
        width: 400px;
        overflow: hidden;
    }
    article.post figure {
        float: left;
        margin: 10px 10px 0 0;
        width: 120px;
    }
    article.post a img {
        border: 8px solid #ccc;
    }
    article.post a:hover img {
        border: 8px solid #de4912;
    }
    article.post h2 {
        font-family: Arial, Helvetica, sans-serif;
    }
    article.post h2 a {
        color: #888888;
        font-family: Arial,Helvetica,sans-serif;
        font-size: 28px;
        font-weight: bold;
        margin: 5px;
        text-decoration: none;
    }
    article.post .meta {
        float: left;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    article.post p.meta {
        display: block;
        background: #fafafa;
        margin: 10px 0;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 1px 2px 2px #ccc;
    }
    article.post p.meta a {
        color: #888;
        text-decoration: none;
        font-style: italic;
    }
    article.post p.meta a:hover {
        color: #DE4912;
    }
    article.post p {
        float: left;
        width: 250px;
    }
    article.post div.leermas {
        float: left;
        margin: 23px 1px 0;
    }
    article.post div.leermas a{
        color: white;
        text-decoration:none;
        font-style:italic;
        background: none repeat scroll 0 0 #ccc;
        border-radius: 10px 10px 10px 10px;
        margin: 5px 0;
        padding: 10px;
    }
    article.post div.leermas a:hover {
        background: none repeat scroll 0 0 #DE4912;
    }


    article {
        display: block;
    }

    #sombra-contenido {
        background: url("imagenes/conten-bg.png") no-repeat scroll 0 0 transparent;
        overflow: hidden;
        padding: 10px 30px;
        width: 970px;
    }

    section.articulos {
        width: 630px;
        float: left;
    }
    
    
    
		#contenedor {
     width:500px;
	 margin:0 auto;
	 padding-top:20px;
}
#miTabla{
	border-collapse:collapse;
	width:100%;
}
#miTabla td{
	padding:6px;
}
#miTabla tr:nth-child(odd) {
   background-color: #DDD;
   color:#777
}

#miTabla tr:nth-child(even) {
   background-color: #666;
   color:#FFF;
	

</style>

<table >
    <tr>
        <td> 
            <div class="box" style="width:430px;">
                <div class="box-head">
                    <h3>Ultimas Tesis</h3>
                </div>
                <div class="box-content">
                    <div class="row-fluid no-margin">
                        <div class="span12">
                            <!-- comienzo de la seccion principal -->
                            <?php if ($ver1 > 0) { ?>
                                <section class="articulos">
                                    <!-- comienzo del articulo-->
                                    <?php foreach ($ver1 as $ver1) {
                                        ?>
                                        <article class="post">
                                            <figure>
                                                <a href="#">
                                                
                                                  <?php echo  anchor( 'biblioteca/reserva_principal/mostrar',"<img style='width: 100px;height: 100px;' src='../../ovcipcdll/img/graduation.png' alt='img-post' />")  ?>
                                                   
                                                </a>
                                            </figure>
                                            <p class="meta">Autor: <?php echo $ver1->Autor; ?> Capitulo: <?php echo $ver1->Capitulo; ?></p>
                                            <p><?php echo $ver1->Titulo; ?></p>

                                        </article>

                                    <?php } ?>
                                    <!-- fin del articulo-->

                                </section>

                            <?php } ?>
                            <!-- fin de la seccion-->
                        </div></div>
                </div>
            </div>
        </td>

        <td>
            <div class="box" style="width:430px;">
                <div class="box-head">
                    <h3>Ultimo libro y revista</h3>
                </div>

                <div class="box-content">
                    <div class="row-fluid no-margin">
                        <div class="span12">
                            <!-- comienzo de la seccion principal -->
                            <?php if ($ver2 > 0) { ?>
                                <section class="articulos">
                                    <!-- comienzo del articulo-->
                                    <?php foreach ($ver2 as $ver2) {
                                        ?>
                                        <article class="post">
                                            <figure>
                                                <a href="">
                                                    <?php
                                                    if ($ver2->Tipo == 'R') {
                                                        echo  anchor( 'biblioteca/reserva_principal/mostrar',"<img style='width: 100px;height: 100px;' src='../../ovcipcdll/img/revistausu.png' alt='img-post' />");  
                                                     
                                                    } else {
                                                       echo  anchor( 'biblioteca/reserva_principal/mostrar',"<img style='width: 100px;height: 100px;' src='../../ovcipcdll/img/book_1.png' alt='img-post' />") ;  
                                                      
                                                    }
                                                    ?>
                                                </a>
                                            </figure>
                                            <p class="meta">Autor: <?php echo $ver2->Autor; ?> Categoria: <?php echo $ver2->Categoria; ?></p>
                                            <p><?php echo $ver2->Titulo; ?></p>

                                        </article>

                                    <?php } ?>
                                    <!-- fin del articulo-->

                                </section>

                            <?php } ?>
                            <!-- fin de la seccion-->
                        </div></div>
                </div>
            </div>

        </td>
    </tr>
    <tr>
        <td>
            <div class="box" style="width:430px;">
                <div class="box-head">
                    <h3>Ultimas reservas</h3>
                </div>

                <div class="box-content">
                    <div class="row-fluid no-margin">
                        <div class="span12">
                            <!-- comienzo de la seccion principal -->
                            <?php if ($ver3 > 0) { ?>
                                <section class="articulos">
                                    <!-- comienzo del articulo-->
                                    <?php foreach ($ver3 as $ver3) {
                                        ?>
                                        <article class="post">
                                            <figure>           
                                                <a href="#">
                                                    
                                                    <?php echo  anchor( 'biblioteca/reserva_principal/mostrar',"<img style='width: 100px;height: 100px;' src='../../ovcipcdll/img/graduation.png' alt='img-post' />")  ?>
                                                    
                                                </a>

                                            </figure>
                                            <p class="meta">Nombre: <?php echo $ver3->Nombres; ?> Capitulo: <?php echo $ver3->Capitulo; ?></p>
                                            <p><?php echo $ver3->Titulo; ?></p>

                                        </article>

                                    <?php } ?>
                                    <!-- fin del articulo-->

                                </section>

                            <?php } 
                            else {
                                    echo"  <div class='alert alert-block alert-info'>";
                                    echo "<h4 class='alert-heading'> Info!!! </h4>";
                                    echo "No se encontraron las ultimas reservas";
                                    echo "</div>";

                                }
                            ?>
                            <!-- fin de la seccion-->
                        </div>
                    </div>
                </div>
            </div>

        </td>

        <td>
            <div class="box" style="width:430px;">
                <div class="box-head">
                    <h3>Nuestras Tesis</h3>
                </div>

                <div class="box-content">
                    <div class="row-fluid no-margin">
                        <div class="span12">
                            <?php if ($ver > 0) {//1 ?>
                            <table id="miTabla">
                                    <tr>
                                        <td><b><center>Capitulo</center></b></td>
                                        <td><b><center>N° de tesis</center></b></td>
                                        
                                    </tr>
                                    <?php foreach ($ver as $ver) {//1 ?>
                                        <tr>
                                            <td>
                                                <?php echo $ver->Capitulo; ?> 
                                            </td>
                                            <td><center>
                                                <?php echo $ver->Tesis; ?> 
                                                </center>
                                            </td>



                                        </tr>

                                    <?php } ?>

                                </table>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </td> 
    </tr>
</table>
    





