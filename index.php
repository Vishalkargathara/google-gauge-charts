<?php 
$conn = mysqli_connect("localhost", "root", "", "pzem");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
  
// sql query to fetch all the data 
$query = "SELECT voltage, current, power1, energy, frequency, pf FROM pzemdata"; 
$query_run = mysqli_query($conn, $query);
?> 
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
  </head>
  <body>
  <?php
if($query_run)
{
	while($row = mysqli_fetch_array($query_run))
	{
		?>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['voltage in V', <?php echo $row['voltage']; ?>]
         
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['current in A', <?php echo $row['current']; ?>]
         
        ]);

        var data3 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['power in W', <?php echo $row['power1'];  ?>]
         
        ]);

        var data4 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Energy in Wh', <?php echo $row['energy'];  ?>]
         
        ]);

        var data5 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Frequency', <?php echo $row['frequency'];  ?>]
         
        ]);

        var data6 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['power factor', <?php echo $row['pf'];  ?>]
         
        ]);

        var options = {
          width: 250, height: 250,
          redFrom: 250, redTo: 300,
          yellowFrom:230, yellowTo: 250,
          max: 300, min: 0,
          minorTicks: 5,
        };
        var options2 = {
          width: 250, height: 250,
          redFrom: 100, redTo: 150,
          yellowFrom:70, yellowTo: 100,
          max: 150, min: 0,
          minorTicks: 5,
        };
        var options3 = {
          width: 250, height: 250,
          redFrom: 400, redTo: 500,
          yellowFrom:300, yellowTo: 400,
          max: 500, min: 0,
          minorTicks: 5,
        };
        var options4 = {
          width: 250, height: 250,
          redFrom: 400, redTo: 500,
          yellowFrom:300, yellowTo: 400,
          max: 500, min: 0,
          minorTicks: 5,
        };
        var options5 = {
          width: 250, height: 250,
          redFrom: 0, redTo: 40,
          yellowFrom:40, yellowTo: 45,
          max: 55, min: 0,
          minorTicks: 5,
        };
        var options6 = {
          width: 250, height: 250,
          redFrom: 0, redTo: 0.4,
          yellowFrom:0.4, yellowTo: 0.7,
          max: 1, min: 0,
          minorTicks: 5,
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
        var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));
        var chart4 = new google.visualization.Gauge(document.getElementById('chart_div4'));
        var chart5 = new google.visualization.Gauge(document.getElementById('chart_div5'));
        var chart6 = new google.visualization.Gauge(document.getElementById('chart_div6'));

        chart.draw(data, options);
        chart2.draw(data2, options2);
        chart3.draw(data3, options3);
        chart4.draw(data4, options4);
        chart5.draw(data5, options5);
        chart6.draw(data6, options6);

      }
    </script>
    <div id="chart_div" style="width: 250px; height: 250px; margin-top: 100px;"></div>
    <div id="chart_div2" style="width: 250px; height: 250px; margin-top: -250px; margin-left: 250px;"></div>
    <div id="chart_div3" style="width: 250px; height: 250px; margin-top: -250px; margin-left: 500px;"></div>
    <div id="chart_div4" style="width: 250px; height: 250px; margin-top: -250px; margin-left: 750px;"></div>
    <div id="chart_div5" style="width: 250px; height: 250px; margin-top: -250px; margin-left: 1000px;"></div>
    <div id="chart_div6" style="width: 250px; height: 250px; margin-top: -250px; margin-left: 1250px;"></div>

    <?php
        }
    }
    else
    {
        echo "No Record Found";
    }
?>
  </body>
</html>
