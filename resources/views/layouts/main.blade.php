<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.html') }}">

    <title>Home</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dashlab-icon/dashlab-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">
    
    <!--data table-->
    <link href="{{ asset('assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!--jquery ui-->
    <link href="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">

    <!--iCheck-->
    <link href="{{ asset('assets/vendor/icheck/skins/all.css') }}" rel="stylesheet">

    <!--custom styles-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="left-sidebar-fixed">
    <!--header start-->
    <header class="app-header">
        <div class="branding-wrap">
            <!--left nav toggler start-->
            <a class="nav-link mt-2 float-left js_left-nav-toggler pos-fixez"  href="javaScript:;">
                <i class=" ti-align-right"></i>
            </a>
            <!--left nav toggler end-->

            <!--brand start-->
            <div class="navbar-brand pos-fixed">
                <a class="" href="/admin/home">
                <img src="{{ asset('assets/img/demob.png') }}" width="100" height="25" alt="CodeLab">
                </a>
            </div>
            <!--brand end-->
        </div>

        <!--header rightside links-->
        <ul class="header-links hide-arrow navbar">
           
           
            <li class="nav-item dropdown ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
            </li>
            
        </ul>
        <!--/header rightside links-->
    </header>
    <!--search modal start-->
    <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--search modal start-->
    <!--header end-->

    <div class="app-body">

        <!--left sidebar start-->
        <div style='display:non'>
            @include('layouts.sidebar')
        </div>
        
        <!--left sidebar end-->


        @yield('content')



    </div>
    <!--footer-->
    {{-- <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright &copy; VectorLab 2018</small>
            </div>
        </div>
    </footer> --}}
    <!--/footer-->
</div>
<!--main content wrapper end-->
</div>

<!--basic scripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script src="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.dcjqaccordion.2.7.js') }}"></script>

<!--chartjs-->
<script src="{{ asset('assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<!--chartjs initialization-->
<script src="{{ asset('assets/vendor/js-init/chartjs/init-sales-overview-chart.js') }}"></script>
<script src="{{ asset('assets/vendor/js-init/chartjs/init-area-chart.js') }}"></script>
<script src="{{ asset('assets/vendor/js-init/chartjs/init-line-chart.js') }}"></script>

<!--========== DATA TABLE  ================-->
   <!--datatables-->
   <script src="{{ asset('assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
   <!--init datatable-->
   <script src="{{ asset('assets/vendor/js-init/init-datatable.js') }}"></script>
   
<!--============  ===================-->
<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--basic scripts initialization-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>