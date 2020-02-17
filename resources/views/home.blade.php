{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <title>Dashboard 4</title>

    <!--google font-->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/lobicard/css/lobicard.css" rel="stylesheet">
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
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

<!--===========header start===========-->
<header class="app-header navbar">

    <!--brand start-->
    <div class="navbar-brand navbar-brand-dark">
        <a class="" href="index.html">
            <img src="assets/img/logo.png" srcset="assets/img/logo@2x.png 2x" alt="">
        </a>
    </div>
    <!--brand end-->

    <!--left side nav toggle start-->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item d-lg-none">
            <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
        </li>
        <li class="nav-item d-md-down-none-">
            <!--search start-->
            <a class="nav-link search-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-search"></i>
            </a>
            <div class="search-container">
                <div class="outer-close search-toggle">
                    <a class="close"><span></span></a>
                </div>

                <div class="container search-wrap">
                    <div class="row">
                        <div class="col text-left">
                            <a class="" href="#">
                                <img src="assets/img/logo.png" srcset="assets/img/logo@2x.png 2x" alt="">
                            </a>
                            <form class="mt-3">
                                <div class="form-row align-items-center">
                                    <input type="text" class="form-control custom-search" placeholder="Search">
                                </div>
                            </form>

                            <div class="search-list">
                                <h5 class="text-white mb-4">Search Results</h5>
                                <ul class="list-unstyled ">
                                    <li>
                                        <a href="#" class="text-white">
                                                <span class="bg-danger">
                                                    S
                                                </span>
                                            Simply dummy text of the printing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">
                                                <span class="bg-success">
                                                    C
                                                </span>
                                            Contrary Ipsum is not simply random text
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">
                                                <span class="bg-info">
                                                    <i class="icon-basket-loaded "></i>
                                                </span>
                                            Ipsum has been industry's standard dummy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--search end-->
        </li>
    </ul>
    <!--left side nav toggle end-->

    <!--right side nav start-->
    <ul class="nav navbar-nav ml-auto">


        <li class="nav-item dropdown dropdown-slide d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-alarm"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header pb-3">
                    <strong>You have 6 Notifications</strong>
                </div>

                <a href="#" class="dropdown-item">
                    <i class="icon-basket-loaded text-primary"></i> New order
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-user-follow text-success"></i> New registered member
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-layers text-danger"></i> Server error report
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-note text-warning"></i> Database report
                </a>

                <a href="#" class="dropdown-item">
                    <i class=" icon-present text-info"></i> Order confirmation
                </a>

            </div>
        </li>

        <li class="nav-item dropdown dropdown-slide">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="assets/img/user.png" alt="John Doe">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                <div class="dropdown-header pb-3">
                    <div class="media d-user">
                        <img class="align-self-center mr-3" src="assets/img/user.png" alt="John Doe">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">John Doe</h5>
                            <span>john@gmail.com</span>
                        </div>
                    </div>
                </div>

                <a class="dropdown-item" href="#"><i class=" ti-reload"></i> Activity</a>
                <a class="dropdown-item" href="#"><i class=" ti-email"></i> Message</a>
                <a class="dropdown-item" href="#"><i class=" ti-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class=" ti-layers-alt"></i> Projects <span class="badge badge-primary">4</span> </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><i class=" ti-lock"></i> Lock Account</a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                <a class="dropdown-item" href="#"><i class=" ti-unlock"></i> Logout</a>
            </div>
        </li>

    </ul>

    <!--right side nav end-->
</header>
<!--===========header end===========-->

<!--===========app body start===========-->
<div class="app-body">

    <!--left sidebar start-->
@include('_partials.sidebar')
    <!--left sidebar end-->

    <!--main contents start-->
    <main class="main-content">

        <div class="container-fluid">

            <!--page title start-->
            <div class="page-title pl-0">
                <h4 class="mb-0"> Dashboard 4
                    <small>start your new page</small>
                </h4>
                <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Layout Box Container</li>
                </ol>
            </div>
            <!--page title end-->

            <!--state widget start-->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                        <span class="bg-primary rounded-circle text-center wb-icon-box">
                                            <i class="icon-people text-light f24"></i>
                                        </span>
                                </div>
                                <div class="col-9">
                                    <h6 class="mt-1 mb-0">New Users</h6>
                                    <p class="f12 mb-0">32 New Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                        <span class="bg-warning rounded-circle text-center wb-icon-box">
                                            <i class="icon-basket-loaded text-light f24"></i>
                                        </span>
                                </div>
                                <div class="col-9">
                                    <h6 class="mt-1 mb-0">Order Placed</h6>
                                    <p class="f12 mb-0">123 New Order Placed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                        <span class="bg-danger rounded-circle text-center wb-icon-box">
                                            <i class="icon-badge text-light f24"></i>
                                        </span>
                                </div>
                                <div class="col-9">
                                    <h6 class="mt-1 mb-0">Monthly Profits</h6>
                                    <p class="f12 mb-0">$9887 This Month Profit
                                        <span class="float-right text-success"> </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--state widget end-->

            <div class="row">
                <!--Report widget start-->
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="card-title">
                                Page Visit
                                <div class="btn-group float-right task-list-action">
                                    <div class="dropdown ">
                                        <a href="#" class="btn btn-transparent default-color dropdown-hover p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class=" icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right ">
                                            <a class="dropdown-item" href="#"> <i class="fa fa-calendar-o text-info pr-2"></i> Daily</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-calendar-check-o text-danger pr-2"></i> Weekly</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-calculator text-warning pr-2"></i> Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vertical-middle">
                                <thead>
                                <tr>
                                    <th class="border-0">Page</th>
                                    <th class="border-0 text-right">Pageviews</th>
                                    <th class="border-0 text-right">Page Value </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        /dashboard/home/
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /dashboard/charts/nice_charts
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /profile/edit/
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /dashboard/datatables/responsive
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /dashboard/charts/nice_charts
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /profile/edit/
                                    </td>
                                    <td class="text-right">
                                        2345
                                    </td>
                                    <td class="text-right">
                                        $ 0.00
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Report widget end-->

            </div>

        </div>
    </main>
    <!--main contents end-->

</div>
<!--===========app body end===========-->

<!--===========footer start===========-->
<footer class="app-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                2018 © Diverse Admin by MHS
            </div>
            <div class="col-4">
                <a href="#" class="float-right back-top">
                    <i class=" ti-arrow-circle-up"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<!--===========footer end===========-->


<!-- Placed js at the end of the page so the pages load faster -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
<script src="assets/vendor/lobicard/js/lobicard.js"></script>
<script class="include" type="text/javascript" src="assets/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/vendor/jquery.scrollTo.min.js"></script>

<!--echarts-->
<script type="text/javascript" src="assets/vendor/echarts/echarts-all-3.js"></script>
<!--init echarts-->
<script type="text/javascript" src="assets/vendor/dashboard4-echarts-init.js"></script>



<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--init scripts-->
<script src="assets/js/scripts.js"></script>

</body>
</html>

