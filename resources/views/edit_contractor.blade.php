<!DOCTYPE html>
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
        <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/lobicard/css/lobicard.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">

    <!--custom css-->
    <link href="{{url('assets/css/main.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{url('assets/vendor/html5shiv.js')}}"></script>
    <script src="{{url('assets/vendor/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

<!--===========header start===========-->
<header class="app-header navbar">

    <!--brand start-->
    <div class="navbar-brand">
        <a class="" href="index.html">
            <img src="{{url('assets/img/logo-dark.png')}}" srcset="assets/img/logo-dark@2x.png 2x" alt="">
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
                                <img src="{{url('assets/img/logo.png')}}" srcset="assets/img/logo@2x.png 2x" alt="">
                            </a>
                            <form class="mt-3">
                                <div class="form-row align-items-center">
                                    <input type="text" class="form-control custom-search"  placeholder="Search">
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


@include('_partials.navbar')

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
        <!--page title start-->
        <div class="page-title">
            <h4 class="mb-0"> Add Contractor
                {{--                <small>basic input examples</small>--}}
            </h4>
            <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Contractor</li>
            </ol>
        </div>
        <!--page title end-->


        <div class="container-fluid">

            <!-- state start-->
            <div class="row">
                <div class=" col-md-12">

                    <div class="card card-shadow mb-4">
                        <div class="card-header">
                            <div class="card-title">
                                Add Contractor
                            </div>
                        </div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif

                            <form class="container" action="{{url('/update-contractor/'.$contractor->id)}}" method="POST" id="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Date</label>
                                        <input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->date}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Date.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Contractor Number</label>
                                        <input type="text" name="contractor_number" class="form-control {{ $errors->has('contractor_number') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->contractor_number}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Contractor Number.
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Count</label>
                                        <input type="text" name="count" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->count}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Count.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Seller Name</label>
                                        <input type="text" name="seller_name" class="form-control {{ $errors->has('seller_name') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->seller_name}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Seller Name.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Seller Address</label>
                                        <input type="text" name="seller_address" class="form-control {{ $errors->has('seller_address') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->seller_address}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Seller Address.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Seller Country</label>
                                        <input type="text" name="seller_country" class="form-control {{ $errors->has('seller_country') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->seller_country}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Seller Country.
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Buyer Name</label>
                                        <input type="text" name="buyer_name" class="form-control {{ $errors->has('buyer_name') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->buyer_name}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Buyer Name
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Buyer Address</label>
                                        <input type="text" name="buyer_address" class="form-control {{ $errors->has('buyer_address') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->buyer_address}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Buyer Address.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">Buyer Country</label>
                                        <input type="text" name="buyer_country" class="form-control {{ $errors->has('buyer_country') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->buyer_country}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Buyer Country.
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">LC Opener Name</label>
                                        <input type="text" name="lc_opener_name" class="form-control {{ $errors->has('lc_opener_name') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->lc_opener_name}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a LC Opener Name.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">LC Opener Address</label>
                                        <input type="text" name="lc_opener_address" class="form-control {{ $errors->has('lc_opener_address') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->lc_opener_address}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a LC Opener Address.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">LC Opener Country</label>
                                        <input type="text" name="lc_opener_country" class="form-control {{ $errors->has('lc_opener_country') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->lc_opener_country}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a LC Opener Country.
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">FCLS</label>
                                        <input type="text" name="fcls" class="form-control {{ $errors->has('fcls') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->fcls}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a FCLS.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">Price Per KG ($)</label>
                                        <input type="text" name="price_per_kg" class="form-control {{ $errors->has('price_per_kg') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->price_per_kg}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Price Per Kg.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">KG's</label>
                                        <input type="text" name="kg" class="form-control {{ $errors->has('kg') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->kg}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a KG's.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Total Amount</label>
                                        <input type="text" name="total_amount" class="form-control {{ $errors->has('total_amount') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->total_amount}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Total Amount.
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">LSD</label>
                                        <input type="text" name="lsd" class="form-control {{ $errors->has('lsd') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->lsd}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a LSD.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="lc_type">LC Type</label>
                                        <select class="form-control" id="sel1" name="lc_type">
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
                                            <option value="60">60</option>
                                            <option value="90">60</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">LC Number</label>
                                        <input type="text" name="lc_number" class="form-control {{ $errors->has('lc_number') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{$contractor->lc_number}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a LC Number.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Invoice Number</label>
                                        <input type="text" name="invoice_number" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->invoice_number}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Invoice Number.
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">ETD</label>
                                        <input type="date" name="etd" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->etd}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a ETD.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">ETD FCLS</label>
                                        <input type="text" name="etd_fcls" class="form-control {{ $errors->has('etd_fcls') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{$contractor->etd_fcls}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a ETA.
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">ETD Rest</label>
                                        <input type="text" name="etd_rest" class="form-control" value="Rest Value will appear later" disabled>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">ETA</label>
                                        <input type="date" name="eta" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->eta}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a ETD.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">ETA FCLS</label>
                                        <input type="text" name="eta_fcls" class="form-control {{ $errors->has('eta_fcls') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{$contractor->eta_fcls}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a ETA.
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">ETA Rest</label>
                                        <input type="text" name="eta_rest" class="form-control" value="Rest Value will appear later" disabled>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">BL Number</label>
                                        <input type="text" name="bl_number" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->bl_number}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a BL Number.
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">AWB</label>
                                        <input type="text" name="awb" class="form-control {{ $errors->has('awb') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{$contractor->awb}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a AWB.
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Document</label>
                                        <input type="text" name="document" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{$contractor->document}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Document.
                                        </div>
                                    </div>


                                </div>


                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label for="lc_type">Shipment Status</label>
                                        <select class="form-control" id="sel1" name="shipment_status">
                                            <option value="pending">Pending</option>
                                            <option value="done">Done</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a Shipment Status.
                                        </div>
                                    </div>



                                    <div class="col-md-4 mb-3">
                                        <label for="commission">Commission</label>
                                        <select class="form-control" id="sel1" name="commission">
                                            <option value="kg">kilogram kg</option>
                                            <option value="percentage">percentage %</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom05">Commission Percent</label>
                                        <input type="text" name="commission_percentage" class="form-control {{ $errors->has('commission_percentage') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{$contractor->commission_percentage}}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Commission Percent.
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>

                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';

                                    window.addEventListener('load', function() {
                                        var form = document.getElementById('needs-validation');
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    }, false);
                                })();
                            </script>
                        </div>
                    </div>

                </div>
            </div>

            <!-- state end-->

        </div>
    </main>
    <!--main contents end-->

    <!--right sidebar start-->
    <aside class="right-sidebar">

        <!--notification widget start-->
        <div class="widget">
            <h3 class="mb-4 widget-title">Notification</h3>

            <div class="notification-list">
                <ul class="list-unstyled">
                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n1.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Diverse Ltd.</a>
                            <small class="text-muted">2 days ago</small>
                            <p><a href="#">www.diverse-test.com</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n3.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Black Friday Discount Offer</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Nam libero tempore cum soluta nobis est eligendi.</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n2.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Task Failed</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Error: Invalid command found ... after [this class]</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n4.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">John Doe</a>
                            <small class="text-muted">3 days ago</small>
                            <p>Send you a contact request.</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!--notification widget end-->

        <!--Active log widget start-->
        <div class="widget">
            <h3 class="mb-4 widget-title">Activity Log</h3>
            <div class="baseline baseline-border">
                <div class="baseline-list">
                    <div class="baseline-info">
                        <div><a href="#" class="default-color"><strong>John Tasi</strong></a> Prepare for the Meeting <span class="badge badge-pill badge-success">status</span></div>
                        <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                    </div>
                </div>
                <div class="baseline-list baseline-border baseline-primary">
                    <div class="baseline-info">
                        <div>Video conference to client</div>
                        <span class="text-muted">05:00 PM Sun, 02 Feb 2018</span>
                    </div>
                </div>
                <div class="baseline-list  baseline-border baseline-success">
                    <div class="baseline-info">
                        <div><a href="#" class="default-color"><strong>Tnisha</strong></a> Submit a blog post <a href="#" class="">best admin template in 2018.</a></div>
                        <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                    </div>
                </div>
                <div class="baseline-list  baseline-border baseline-warning">
                    <div class="baseline-info">
                        <div><a href="#" class="default-color"><strong>New Request</strong></a> 10 user request to approve or remove</div>
                        <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                    </div>
                </div>
                <div class="baseline-list  baseline-border baseline-info">
                    <div class="baseline-info">
                        <div><a href="#" class="default-color"><strong>Mark Henry</strong></a> added your friend list now</div>
                        <span class="text-muted">10:00 PM Sat, 10 Jan 2018</span>
                    </div>
                </div>
            </div>
        </div>
        <!--Active log widget end-->

        <!--stock widget start-->
        <div class="widget">
            <h3 class="mb-4 widget-title">Stocks</h3>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>DOW</td>
                        <td>1999</td>
                        <td>
                            <span class="badge badge-pill badge-primary">+ 0.10%</span>
                        </td>
                    </tr>
                    <tr>
                        <td>AAPL</td>
                        <td>1299</td>
                        <td>
                            <span class="badge badge-pill badge-success">- 0.50%</span>
                        </td>
                    </tr>
                    <tr>
                        <td>SBUX</td>
                        <td>1099</td>
                        <td>
                            <span class="badge badge-pill badge-danger">+ 0.20%</span>
                        </td>
                    </tr>
                    <tr>
                        <td>NKE</td>
                        <td>2199</td>
                        <td>
                            <span class="badge badge-pill badge-warning">+ 1.25%</span>
                        </td>
                    </tr>
                    <tr>
                        <td>YOO</td>
                        <td>999</td>
                        <td>
                            <span class="badge badge-pill badge-info">+ 3.00%</span>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!--stock widget end-->

    </aside>
    <!--right sidebar end-->

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
<script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script src="{{url('assets/vendor/popper.min.js')}}"></script>
<script src="{{url('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js')}}"></script>
<script src="{{url('assets/vendor/lobicard/js/lobicard.js')}}"></script>
<script class="include" type="text/javascript" src="{{url('assets/vendor/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{url('assets/vendor/jquery.scrollTo.min.js')}}"></script>



<!--[if lt IE 9]>
<script src="{{url('assets/vendor/modernizr.js')}}"></script>
<![endif]-->

<!--init scripts-->
<script src="{{url('assets/js/scripts.js')}}"></script>

</body>
</html>