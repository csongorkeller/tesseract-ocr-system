<!DOCTYPE html>
<html>
 <head>
  <title>Lorem Ipsum</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>

  
  <script type="text/javascript">
      
      var chartdata = <?php echo $callroute; ?>;
      
     //console.log(callroute);
      

      google.charts.load('current', {'packages':['sankey']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable(chartdata);
        var options = {
          title: 'Sankey Chart',
          sankey: { node: { nodePadding: 80 } },
          sankey: { node: { width: 3 } }

        };

        var chart = new google.visualization.Sankey(document.getElementById('sankeychart'));
        chart.draw(data, options);
      }
    </script>


</head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Lorem Ipsum</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Lorem Ipsum</h3>
    </div>
    <div class="panel-body" align="center">
     <div id="sankeychart" style="width:1050px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
 </body>
</html>