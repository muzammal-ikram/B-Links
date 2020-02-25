<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="MHS">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="http://www.blinksgroup.net/wp-content/uploads/2017/05/links-new-logo-1.png">

    <title>B-Links</title>

    <!--google font-->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


    <!--common style-->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/lobicard/css/lobicard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">
    <!--custom css-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
<style>
    .main_area_width{
        width: 50%;
        overflow-y: scroll;
    }
</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

        {{-- <main class="py-4"> --}}
            @yield('content')
            @stack('scripts')
        {{-- </main> --}}
        
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<!--echarts-->
<script type="text/javascript" src="{{ asset('assets/vendor/echarts/echarts-all-3.js') }}"></script>
<!--init echarts-->
<script type="text/javascript" src="{{ asset('assets/vendor/dashboard4-echarts-init.js') }}"></script>



<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--init scripts-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>
</html>


