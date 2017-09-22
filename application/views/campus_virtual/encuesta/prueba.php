<fieldset>
    <div class="alert alert-info">
    Los Valores son <strong>1</strong> es Muy Malo, <strong>2</strong> es Malo, <strong>3</strong> es Regular, <strong>4</strong> es Bueno y <strong>5</strong> es Muy Bueno 
    </div>
    
    <div name="Grafica">
	<?php
  foreach ($activity_chart as $object) {
    $url[] = "['".$object->Colores."', ".$object->Numero."]"; // in this line I tried to simulate chart format.

  }
     // echo implode(",", $url);
	?>

    <!--Load the AJAX API-->
    <script type="text/javascript" src='<?php echo URL_JS; ?>jsapi.js'></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
  var data = google.visualization.arrayToDataTable([
       <?php echo implode(",", $url); 
       ?>                  
        ]);
         var options = {
          title: 'GRAFICA DE RESULTADOS',
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);

      }
    </script>
    <div id="piechart_3d" style="width: 800px; height: 600px;"></div>
  </div>

</fieldset>

