<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />
    <title>
        Pulse24
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset ('public/images/favicon.png')); ?>" />
    <!-- Pignose Calender -->
    <link href="<?php echo e(asset('public/plugins/pg-calendar/css/pignose.calendar.min.css')); ?>" rel="stylesheet" />
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo e(asset ('public/plugins/chartist/css/chartist.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset ('public/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')); ?>" />
    <!-- Custom Stylesheet -->
    <link href="<?php echo e(asset ('public/css/style.css')); ?>" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    



    <?php echo $__env->yieldPushContent('css'); ?>


     
   


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
                <a href="<?php echo e(url('dash')); ?>">
                    <b class="logo-abbr"><img src="<?php echo e(asset ('public/images/logo.png')); ?>" alt="" />
                    </b>
                    <span class="logo-compact"><img src="<?php echo e(asset ('public/images/logo-compact.png')); ?>" alt="" /></span>
                    <h1>Pulse24</h1>
                    
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
         ***********************************-->

        <!--**********************************
            Header start
         ***********************************-->
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--**********************************
            Header end ti-comment-alt
         ***********************************-->

        <!--**********************************
            Sidebar start
         ***********************************-->
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--**********************************
            Sidebar end
         ***********************************-->

        <!--**********************************
             Content body start
         ***********************************-->


        <div class="content-body">
            <div class="container-fluid mt-3">

                <?php echo $__env->yieldContent('content'); ?>


            </div>
            <!-- #/ container -->
        </div>


        <!--**********************************
            Content body end
         ***********************************-->

        <!--**********************************
            Footer start
         ***********************************-->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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




    <script src="<?php echo e(asset ('public/plugins/common/common.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/gleek.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/js/styleSwitcher.js')); ?>"></script>

    <!-- Chartjs -->
    <script src="<?php echo e(asset ('public/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>
    <!-- Circle progress -->
    <script src="<?php echo e(asset ('public/plugins/circle-progress/circle-progress.min.js')); ?>"></script>
    <!-- Datamap -->
    <script src="<?php echo e(asset ('public/plugins/d3v3/index.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/plugins/topojson/topojson.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/plugins/datamaps/datamaps.world.min.js')); ?>"></script>
    <!-- Morrisjs -->
    <script src="<?php echo e(asset ('public/plugins/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/plugins/morris/morris.min.js')); ?>"></script>
    <!-- Pignose Calender -->
    <script src="<?php echo e(asset ('public/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/plugins/pg-calendar/js/pignose.calendar.min.js')); ?>"></script>
    <!-- ChartistJS -->
    <script src="<?php echo e(asset ('public/plugins/chartist/js/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('public/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')); ?>"></script>

    <script src="<?php echo e(asset ('public/js/dashboard/dashboard-1.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <?php echo $__env->yieldPushContent('js'); ?>


</body>

</html><?php /**PATH C:\xampp\htdocs\axconnect\resources\views/layouts/main.blade.php ENDPATH**/ ?>