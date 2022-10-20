@extends('layouts.main')
@section('content')


               {{-- THIS IS SUPER ADMIN DASHBOARD --}}
@if(Auth()->user()->role_id == 11)


<div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Pending Company Request</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $pending }}</h2>
                                <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                            </div> <span class="float-right display-5 opacity-5">
        <i class="fa fa-bullhorn"></i>
        <i class="fa fa-spinner" aria-hidden="true"></i> </span> </div>
                        </div>
            </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Active Company</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $active }}</h2>
                        <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                    </div> <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span> </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Company</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $all }}</h2>
                        <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                    </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
            </div>
        </div>
    </div>
       
    <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Assign Leads</h3>
                                    <div class="d-inline-block">
                                        <h2>
                                            
            <a href="{{url('assigned')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Leads History</h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('history')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">See Hierarchy</h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('hierarchy')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Upload Leads </h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('upload')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-8 col-sm-12">
                    <h2 style="text-align:center;">User's Lead Details </h2>
                    <div class="panel panel-primary" style="background: #ff8a83;">
                        <div class="panel-heading" style="background: #cd4e7b;">Chart</div>
                        <div class="panel-body">
                            <div id="bar-chart">
                                
                            </div>
                        </div>
                    </div>
                </div> --}}
    </div>

                  {{-- MEETING STATUS --}}

 {{-- <div class="row">

     <div class="col-lg-12 col-sm-12">
        <h2 style="text-align:center;">User's Meeting Graph </h2>
        <div class="panel panel-primary" style="background: #ff8a83;">
        <div class="panel-heading" style="background: #cd4e7b;">Chart</div>
        <div class="panel-body">
            <canvas id="myChart" style="width:100%;max-width:100%"></canvas>
        </div>

        </div>
</div> --}}
</div>
    <br>




               {{-- END OF SUPERADMIN DASHBOARD --}}
 



@else

    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Leads In Process</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $process_leads }}</h2>
                                <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                            </div> <span class="float-right display-5 opacity-5">
        <i class="fa fa-bullhorn"></i>
        <i class="fa fa-spinner" aria-hidden="true"></i> </span> </div>
                        </div>
            </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Employees</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_emp }}</h2>
                        <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                    </div> <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span> </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Leads Till Date</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $total_leads }}</h2>
                        <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                    </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
            </div>
        </div>
    </div>
       <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Assign Leads</h3>
                                    <div class="d-inline-block">
                                        <h2>
                                            
            <a href="{{url('assigned')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Leads History</h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('history')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">See Hierarchy</h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('hierarchy')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Upload Leads </h3>
                                    <div class="d-inline-block">
                                        <h2>
            <a href="{{url('upload')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
            </h2> </div> <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span> </div>
                            </div>
                        </div>
                    </div>
    <div class="row">
                
                <div class="col-lg-12 col-sm-12">
                    <h2 style="text-align:center;">Data Processing Graph </h2>
                    <div class="panel panel-primary" style="background: #ff8a83;">
                        <div class="panel-heading" style="background: #00B0EF;">Chart</div>
                        <div class="panel-body">
                            <div id="bar-chart">
                                
                            </div>
                        </div>
                    </div>
                </div>
    </div>

                  {{-- MEETING STATUS --}}

 <div class="row">

     <div class="col-lg-12 col-sm-12">
        <h2 style="text-align:center;">User's Meeting Graph </h2>
        <div class="panel panel-primary" style="background: #ff8a83;">
        <div class="panel-heading" style="background: #00B0EF;">Chart</div>
        <div class="panel-body">
            <canvas id="myChart" style="width:100%;max-width:100%"></canvas>
        </div>

        </div>
</div>
</div>
    <br>

   



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function(){
        Highcharts.chart('bar-chart', {
        chart: {
        type: 'column'
        },
        title: {
        text: ''
        },
        xAxis: {
        categories: <?= $terms ?>,
        crosshair: true
        },
        yAxis: {
        min: 0,
        title: {
        text: ''
        }
        },
        tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key} Marks</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
        },
        plotOptions: {
        column: {
        pointPadding: 0.2,
        borderWidth: 0
        }
        },
        series: <?= $data ?>
        });
        });
    </script>
    <script type="text/javascript">
        

        // meeting chart
       var xValues = <?= $name;?>;
       var yValues = <?= $count;?>;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(255,255,255,1.0)",
      borderColor: "rgba(255,255,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    
  }
});
</script>

@endif
 @endsection