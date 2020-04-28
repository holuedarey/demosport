<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>Login</title>

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

    <!--custom scrollbar-->
    <link href="{{ asset('assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.html') }}" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="{{ asset('assets/vendor/jquery-dropdown-master/jquery.dropdown.html') }}" rel="stylesheet">

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

<body class="signin-up-bg">

    <div class="leftHalf" style="background-image: url('assets/img/login-bg.jpg')">
        <div class="login-promo-txt">
            <h2>Let’s Start The Journey</h2>
            <p>Enter the most beautiful admin ever</p>
        </div>
    </div>

    <div class="rightHalf">
        <div class="position-relative">
            <!--login form-->
            <div class="login-form">
                <h2 class="text-center mb-4">
                    <img src="{{ asset('assets/img/logo.png') }}" srcset="assets/img/logo@2x.jpg 2x" alt="CodeLab">
                </h2>
                <h4 class="text-uppercase- text-purple text-center mb-5">Login to Admin</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-purple btn-pill float-right">LOGIN</button>
                    </div>

                </form>
            </div>
            <!--/login form-->
        </div>
    </div>

    <!--basic scripts-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-dropdown-master/jquery.dropdown-2.html') }}"></script>
    <script src="{{ asset('assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.html') }}"></script>
    <script src="{{ asset('assets/vendor/icheck/skins/icheck.min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <!--<script src="assets/js/scripts.js"></script>-->
</body>

</html>

