<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- <meta name="csrf_token" content="{{ csrf_token() }}" /> -->
    <title> Dashboard Axconnect
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('public/images/favicon.png') }}" />
    <!-- Pignose Calender -->
    <link href="{{ asset('public/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet" />
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset ('public/plugins/chartist/css/chartist.min.css') }}" />
    <link rel="stylesheet" href="{{asset ('public/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}" />
    <!-- Custom Stylesheet -->
    <link href="{{asset ('public/css/style.css') }}" rel="stylesheet" />



    @stack('css')


</head>

<body>
    <!--*******************
        Preloader start
     ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
     ********************-->

    <!--**********************************
        Main wrapper start
     ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
         ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{asset ('public/images/logo.png') }}" alt="" />
                    </b>
                    <span class="logo-compact"><img src="{{asset ('public/images/logo-compact.png') }}" alt="" /></span>
                    <span class="brand-title">
                        <img src="{{asset ('public/images/logo-text.png') }}" alt="" />
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
         ***********************************-->

        <!--**********************************
            Header start
         ***********************************-->
        @include('employees.layouts.header')
        <!--**********************************
            Header end ti-comment-alt
         ***********************************-->

        <!--**********************************
            Sidebar start
         ***********************************-->
        @include('employees.layouts.sidebar')
        <!--**********************************
            Sidebar end
         ***********************************-->

        <!--**********************************
             Content body start
         ***********************************-->


        <div class="content-body">
            <div class="container-fluid mt-3">

                @yield('content')


            </div>
            <!-- #/ container -->
        </div>


        <!--**********************************
            Content body end
         ***********************************-->

        <!--**********************************
            Footer start
         ***********************************-->
        @include('employees.layouts.footer')
        <!--**********************************
            Footer end
         ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->




    <script src="{{asset ('public/plugins/common/common.min.js') }}"></script>
    <script src="{{asset ('public/js/custom.min.js') }}"></script>
    <script src="{{asset ('public/js/settings.js') }}"></script>
    <script src="{{asset ('public/js/gleek.js') }}"></script>
    <script src="{{asset ('public/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{asset ('public/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{asset ('public/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{asset ('public/plugins/d3v3/index.js') }}"></script>
    <script src="{{asset ('public/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{asset ('public/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{asset ('public/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{asset ('public/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset ('public/plugins/moment/moment.min.js') }}"></script>
    <script src="{{asset ('public/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{asset ('public/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{asset ('public/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    <script src="{{asset ('public/js/dashboard/dashboard-1.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    @stack('js')


</body>

</html>