<?php
	include 'dbconnect.php';
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
         ['name', 'ratings'],
             <?php 
          $query = "SELECT count(ratings) AS totalrating, name FROM programming_languages GROUP BY ratings";
 
          $exec = mysqli_query($db_handle,$query);
          while($row = mysqli_fetch_array($exec)){
 
          echo "['".$row['name']."',".$row['ratings']."],";
          }
    ?>
        ]);
 
        var options = {
          title: 'ratings..'
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
        chart.draw(data, options);
      }
    </script>
</head>
<body>
   <h3>Pie Chart</h3>
   <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>