@extends('employees.layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Leads In Process</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $emp_process_leads }}</h2>
                                <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5">
                                <i class="fa fa-bullhorn"></i>
                                <i class="fa fa-spinner" aria-hidden="true"></i> </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Employees</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"> {{$emp_total_emp}} </h2>
                                <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Leads Till Date</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$emp_total_leads}}</h2>
                                <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d-M-y') }}</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-3">


                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">

                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Assign Leads</h3>
                                <div class="d-inline-block">
                                    <h2>
                                        <a href="{{route('user.assign')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
                                    </h2>

                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">

                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Leads History</h3>
                                <div class="d-inline-block">
                                    <h2>
                                        <a href="{{route('user.leads_history')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
                                    </h2>

                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">

                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">See Hierarchy</h3>
                                <div class="d-inline-block">
                                    <h2>
                                        <a href="{{route('user.hierarchy')}}"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
                                    </h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="col-md-6 col-sm-12 col-xs-12">

                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Upload Leads </h3>
                                <div class="d-inline-block">
                                    <h2>
                                        <a href=""><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
                                    </h2>

                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div> -->



                </div>

            </div>
            <div class="col-lg-8 col-sm-3">
                <h2 style="text-align:center;">Lead Details </h2>
                <div class="panel panel-primary" style="background: #ff8a83;">
                    <div class="panel-heading" style="background: #cd4e7b;">Chart</div>
                    <div class="panel-body">

                        <div id="bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>




<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(function() {
        Highcharts.chart('bar-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Your Lead Details'
            },
            xAxis: {
                categories: <?= $terms ?>,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Leads'
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

</html>


@endsection