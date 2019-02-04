<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/matrix-media.css')}}" />
<link href="{{ asset ('fonts/backend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset ('css/backend_css/jquery.gritter.css')}}" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    var visitor = <?php echo $visitor; ?>;  

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawLineChart);
    
    function drawLineChart() {
      var data = google.visualization.arrayToDataTable(visitor);
      var options = {

        height:480,
        width:1150,
        curveType: 'function',
        legend: { position: 'bottom' },
        crosshair: { trigger: 'both' }

      };

      var chart = new google.visualization.LineChart(document.getElementById('linechart'));
      chart.draw(data, options);
    }
  </script>



  <script type="text/javascript">
   var analytics = <?php echo $jobid; ?>


   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawPieChart);

   function drawPieChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     
     sliceVisibilityThreshold: 0.000000001,
     pieHole: 0.4

    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));

    chart.draw(data, options);

   }
  </script>



  <script type="text/javascript">
      
      var chartdata = <?php echo $callroute; ?>;
      

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



    <script type="text/javascript">
      var sumdata = <?php echo $sumplength; ?>;
      var output = document.getElementById('sumplength');


      //output.innerHTML=sumdata;
      document.write(sumdata);
      //console.log(sumdata);


    </script>

    


    <script type="text/javascript">
      
    var jobIdDialtoneTime = <?php echo $jobIdDialtoneTime; ?>;  

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawBarChart);
    
    function drawBarChart() {
      var data = google.visualization.arrayToDataTable(jobIdDialtoneTime);
      var options = {

        curveType: 'function',
        legend: { position: 'bottom' },
        crosshair: { trigger: 'both' }

      };

      var chart = new google.visualization.ColumnChart(document.getElementById('jobIdDialtoneTime'));
      chart.draw(data, options);
    }
    </script>


    <script type="text/javascript">
      
    var callDataByNumber = <?php echo $callDataByNumber; ?>;  

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawBarChart);
    
    function drawBarChart() {
      var data = google.visualization.arrayToDataTable(callDataByNumber);
      var options = {

        curveType: 'function',
        legend: { position: 'bottom' },
        crosshair: { trigger: 'both' }

      };

      var chart = new google.visualization.ColumnChart(document.getElementById('callDataByNumber'));
      chart.draw(data, options);
    }
    </script>



    <script type="text/javascript">
      
    var generateJobIdTimeline = <?php echo $generateJobIdTimeline; ?>;  

    google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawBarChart);
    
    function drawBarChart() {
      var data = google.visualization.arrayToDataTable(generateJobIdTimeline);
      var options = {
                     'width':1150,
                     'height':230};

      var chart = new google.visualization.Timeline(document.getElementById('generateJobIdTimeline'));
      chart.draw(data, options);
    }
    </script>



</head>
<body>



@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')
@yield('content')


@include('layouts.adminLayout.admin_footer')





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="{{ asset ('js/backend_js/dashboard_counted_numbers.js')}}"></script> 




<script src="{{ asset ('js/backend_js/excanvas.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/bootstrap.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.flot.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.flot.resize.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.flot.pie.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.peity.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/fullcalendar.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.dashboard.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.gritter.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.interface.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.chat.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.validate.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.form_validation.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.wizard.js')}}"></script> 
<script src="{{ asset ('js/backend_js/jquery.uniform.js')}}"></script> 
<script src="{{ asset ('js/backend_js/select2.min.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.popover.js')}}"></script> 
<script src="{{ asset ('js/backend_js/matrix.tables.js')}}"></script> 



<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>

</body>
</html>
