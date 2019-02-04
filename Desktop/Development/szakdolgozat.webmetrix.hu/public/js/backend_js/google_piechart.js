
   var analytics = <?php echo $jobid; ?>


   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Lorem Ipsum',
     sliceVisibilityThreshold: 0.000000001
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));


    console.log(data);



    chart.draw(data, options);

   }
 