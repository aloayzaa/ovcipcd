<html>
  <head>
      <meta charset="utf-8">
  <script type="text/javascript" src='<?php echo URL_JS; ?>jsapi.js'></script>
    <?php $i=1;
  foreach ($eventos_reporte as $evento) {
   $url[]="['Evento".$i."', ".$evento->inscripciones.", ".$evento->asistentes.", ".$evento->certificado."]";
   $i++;
  }  
	?>
    <script type="text/javascript">
        
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Eventos', 'Inscritos', 'Asistentes', 'Certificados'],
     <?php echo implode(",", $url); 
       ?>       
  ]);

  var options = {
    title : 'REPORTE GRAFICO DE EVENTO POR MES',
    vAxis: {title: "Cantidad"},
    hAxis: {title: "Eventos Capitulares CIP-CDLL"},
    seriesType: "bars",
    series: {5: {type: "line"}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: auto; height: 400px;"></div>
  </body>
</html>