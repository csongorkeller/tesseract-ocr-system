@extends('layouts.adminLayout.admin_design')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->  

<!--Chart-box--> 
<div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Served Job ID-s by time</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <div  id="generateJobIdTimeline"></div>
            </div>


            
        </div>
    </div>
  </div>
</div>
</div>


<div class="container-fluid">
<div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Job ID-s </h5>
          </div>
          <div class="widget-content">

            <div class="pie" id="pie_chart"></div>

          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Most popular numbers by average calltime</h5>
          </div>
          <div class="widget-content">
            <div class="pie" id="sankeychart"></div>
          </div>
        </div>
      </div>
  </div>
</div>


<div class="row-fluid"></div>
    <div class="widget-box widget-plain">
      <div class="center" style="text-align: center;">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,8,9,7,12,10,12</span>
              <canvas width="50" height="24"></canvas>
              </span >+10%</div>
            <div class="right" > <strong>15598</strong> Visits </div>
          </li>
          <li>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="50" height="24"></canvas>
              </span>10%</div>
            <div class="right"> <strong>150</strong> New Users </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="50" height="24"></canvas>
              </span>-40%</div>
            <div class="right"> <strong>4560</strong> Orders</div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="50" height="24"></canvas>
              </span>+60%</div>
            <div class="right"> <strong>5672</strong> Active Users </div>
          </li>
          <li>
            <div class="left peity_bar_good"><span>12,6,9,23,14,10,13</span>+30%</div>
            <div class="right"> <strong>2560</strong> Register</div>
          </li>
        </ul>
      </div>
    </div>


<div class="container-fluid">
<div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Average numbers by Job ID</h5>
          </div>
          <div class="widget-content">

            <div class="pie" id="jobIdDialtoneTime"></div>

          </div>
        </div>
      </div>

      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Average numbers by "A" numbers</h5>
          </div>
          <div class="widget-content">
            <div class="pie" id="callDataByNumber"></div>
          </div>
        </div>
      </div>
  </div>
</div>



<div id="sumplength"> </div>








<div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Dialtone time, Dialtime and Calltime</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <div class="sankeychart" id="linechart"></div>
            </div>


            
        </div>
    </div>
  </div>
</div>
</div>




    
  

  </div>
</div>


@endsection
<!--end-main-container-part-->

