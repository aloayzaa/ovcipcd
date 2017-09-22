<html>
  <head>
      <meta charset="utf-8">
  <script type="text/javascript" src='<?php echo URL_JS; ?>jsapi.js'></script>
    <?php $i=1;
     $a = $menor;
     $b = $mayor;
     $contador= 0;
     $t_cuotas = 0;
     $t_multas= 0; 
  foreach ($reporte_grafico as $grafico)   
    if((($grafico[4]+$grafico[5])>=$a && ($grafico[4]+$grafico[5])<=$b)){
        $m_total = ($grafico[4]+$grafico[5]);

      $url[]="['CIP: ".$grafico[0]."', ".$grafico[4].", ".$grafico[5].", ".$m_total."]";
      $i++;
      
      $cuotas = $grafico[4];
      $multas = $grafico[5];
      $t_cuotas = $t_cuotas + $cuotas;
      $t_multas = $t_multas + $multas;
      $contador++;
}  
	?>
    <script type="text/javascript">
        
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Masas', 'Cuotas', 'Multas', 'Deuda'],
     <?php echo implode(",", $url); 
       ?>       
  ]);

  var options = {
    title : 'REPORTE GRAFICO ECONÓMICO V.2016',
    vAxis: {title: "Cantidad"},
    hAxis: {title: "Cuadro Económico CIP-CDLL V.2016"},
    seriesType: "bars",
    series: {5: {type: "line"}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
    </script>
    <script type="text/javascript">
        
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
   var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Total Cuotas: S/. <?php echo number_format($t_cuotas); ?>', <?php echo $t_cuotas; ?>],
          ['Total Multas: S/. <?php echo number_format($t_multas); ?>',      <?php echo $t_multas; ?>]
        ]);
  var options = {
          title: 'Reporte Gráfico Deuda Totales',
          is3D: true,
        };
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);

}
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: auto; height: 400px;"></div>
    <div id="chart_div" style="width: auto; height: 400px;"></div>
  </body>
</html>