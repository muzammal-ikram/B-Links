
@extends('layouts.app')

@section('content')

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="MHS">

        <!--favicon icon-->
        <link rel="icon" type="image/png" href="assets/img/favicon.png">

        <title>Login Page</title>

        <!--google font-->
        <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


        <!--common style-->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
        <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
        <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

        <!--custom css-->
        <link href="assets/css/main.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/vendor/html5shiv.js"></script>
        <script src="assets/vendor/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">

    <!--===========login start===========-->

    <div class="container">

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <a href="index.html" class="brand text-center">
                <img src="assets/img/logo-dark.png" srcset="assets/img/logo-dark@2x.png 2x" alt=""/>
            </a>
            <h2 class="form-signin-heading">Please sign in</h2>
            <div class="form-group">
                <label for="email" class="sr-only">Email address</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="checkbox mb-4 mt-4">
                {{--            <label class="custom-control custom-checkbox">--}}
                {{--                <input type="checkbox" class="custom-control-input">--}}
                {{--                <span class="custom-control-indicator"></span>--}}
                {{--                <span class="custom-control-description">--}}
                {{--                        Remember me--}}
                {{--                    </span>--}}
                {{--            </label>--}}
                @if (Route::has('password.request'))
                    <a class="float-right text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

{{--                <a href="forgot-password.html"  class="float-right text-muted">Forgot Password ?</a>--}}
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <div class="mt-4">
                <span>
                    Don't have an account yet ?
                </span>
                <a href="signup.html" class="text-primary">Sign Up</a>
            </div>
        </form>

    </div>
    <!--===========login end===========-->


    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
    <script class="include" type="text/javascript" src="assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/vendor/jquery.scrollTo.min.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->


    </body>
    </html>


@endsection
