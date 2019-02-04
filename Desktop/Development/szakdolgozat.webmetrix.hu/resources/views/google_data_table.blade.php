<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    


    <script type="text/javascript">
      var chartdata = <?php echo $visitor; ?>;


      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(chartdata);

      function drawTable() {
        var data = new google.visualization.DataTable();

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>


    
  </head>
  <body>
    <div id="table_div"></div>
  </body>
</html>