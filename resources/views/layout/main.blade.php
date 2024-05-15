<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TI - PROTOCOLO</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('/assets/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/pickadate/themes/default.date.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        .btn-primary{
            background-color: #0d6efd !important;
            border-color:  #0d6efd !important;
        }
    </style>

    @yield('css')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
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
            <a href="index.html" class="brand-logo">
                {{-- <img class="logo-abbr" src="" alt=""> --}}
                <div class="log-abbr"></div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->


        @include('components.header')


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('components.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->




		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            @yield('content')

        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        @include('components.footer')

        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->



    <!-- Required vendors -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>



    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/dlabnav-init.js')}}"></script>

    <!-- Chart Morris plugin files -->
    <script src="{{asset('assets/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/vendor/morris/morris.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins-init/morris-init.js')}}"></script>


    <!-- Svganimation scripts -->
    <script src="{{asset('assets/vendor/svganimation/vivus.min.js')}}"></script>
    <script src="{{asset('assets/vendor/svganimation/svg.animation.js')}}"></script>

    <script src="{{asset('assets/vendor/jqueryui/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>

    <script src="{{asset('/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins-init/datatables.init.js')}}"></script>





    <!-- Chart Morris plugin files -->
    <script src="{{asset('assets/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/chartist-init.js')}}"></script>

    <script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}} "></script>


	<!-- Chart piety plugin files -->
    <script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>

		<!-- Demo scripts -->
    <script src="{{asset('assets/js/dashboard/dashboard-2.js')}}"></script>



    <!-- pickdate -->
    <script src="{{asset('/assets/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('/assets/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('/assets/vendor/pickadate/picker.date.js')}}"></script>

    <!-- Pickdate -->
    <script src="{{asset('/assets/js/plugins-init/pickadate-init.js')}}"></script>


    <!-- Chart ChartJS plugin files -->
    <script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/chartjs-init.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='{{asset('assets/js/core/locales-all.global.min.js')}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {!! Toastr::message() !!}
    @yield('scripts')
</body>
</html>
