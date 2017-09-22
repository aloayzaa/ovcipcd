<style>
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
<center><div class="box" style="margin-left:70px;position: relative;">
                <div class="box-head">
                    <h3>Listado de <i>Popup Anuncios</i></h3>
                </div>
<table id="miTabla">
                                    <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                        
                                    </tr>
                                      <?php foreach ($bandeja as $bandeja) {//1
                                            ?>
                                            <tr>
                                                <td style="width: 10px;text-align: center;"> <?php echo $bandeja["nNotCodigo"]; ?></td>
                                          <?php  
                                              echo " <td style='width: 20px;text-align: center;'><center><a  target='_blank' title='Foto actual' href='../uploads/portal_infocip/" . $bandeja["cMultLinkMiniatura"] . "' class='fancybox'><img style='max-width:95%;' src='../uploads/portal_infocip/" . $bandeja["cMultLinkMiniatura"] . "' width='80' height='50'></a></center></td>";
       ?>
                                            </tr>

                                    <?php } ?>

                                </table></div></center>


