@extends('layouts.app')
@section('content')
    <style>
    .btn-primary{
    background-color: lightblue;
    border-color: lightblue;
    }
</style>

<!--===========header start===========-->
    @include('_partials.navbar')

    <!--===========app body start===========-->
    <div class="app-body">

        <!--left sidebar start-->
{{--    @include('_partials.sidebar')--}}
        <!--left sidebar end-->

        <!--main contents start-->
        <main class="main-content main_area_width">

            <div class="container-fluid">

                <!--page title start-->
{{--                <div class="page-title pl-0">--}}
{{--                    <h4 class="mb-0"> Home--}}
{{--                    </h4>--}}
{{--                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">--}}
{{--                        <li class="breadcrumb-item active">/home</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
                <!--page title end-->

                <!--state widget start-->
                <div class="row">
                 <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>USD Rate:</h6>
                                        <p class="mt-1 mb-0">Last Updated:</p>
                                    </div>
                                    <div class="col-8">
                                        <h5 id="latest-usd-rate">
                                            @if($latest_db_dollar_rate)
                                                {{$latest_db_dollar_rate->dollar_rate}}
                                            @else
                                                Press Refresh
                                            @endif
                                        </h5>

                                        <p class="mt-1 mb-0" id="last-updated-time"></p>
                                        <!-- <h6 class="f12 mb-0"></p> -->
                                        <button class="btn btn-primary btn-sm" id="refresh">Refresh</button>
                                        &nbsp;&nbsp;&nbsp;
                                        @if($latest_db_dollar_rate)
{{--                                          <p class="mt-1 mb-0" id="last-updated">--}}
                                            {{$latest_db_dollar_rate->created_at}}
{{--                                        </p>--}}
                                        @else
                                         <p class="mt-1 mb-0" id="last-updated">

                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        <h6 class="mt-1 mb-0">Total Contracts</h6>
                                        <p class="f12 mb-0">{{$contractors->count()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                            <span class="bg-warning rounded-circle text-center wb-icon-box">
                                                <i class="icon-basket-loaded text-light f24"></i>
                                            </span>
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mt-1 mb-0">Total Buyers</h6>
                                        <p class="f12 mb-0"><a href="{{url('show-buyers')}}">{{$total_buyers}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-3">
                                            <span class="bg-warning rounded-circle text-center wb-icon-box">
                                                <i class="icon-basket-loaded text-light f24"></i>
                                            </span>
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mt-1 mb-0">Total Sellers</h6>
                                        <p class="f12 mb-0"><a href="{{url('show-sellers')}}">{{$total_sellers}}</a></p>
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
                                    All contractors

{{--                                    <form action="/contract-filter" method="get">--}}
{{--                                        @csrf--}}
{{--                                        <input type="text" name="supplier">--}}
{{--                                        <input type="text" name="buyer">--}}
{{--                                        <input type="submit" value="submit">--}}

{{--                                    </form>--}}
{{--                                    <div class="btn-group float-right task-list-action">--}}
{{--                                        <div class="dropdown ">--}}
{{--                                            <a href="#" class="btn btn-transparent default-color dropdown-hover p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                <i class=" icon-options"></i>--}}
{{--                                            </a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-right ">--}}
{{--                                                <a class="dropdown-item" href="#"> <i class="fa fa-calendar-o text-info pr-2"></i> Daily</a>--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-calendar-check-o text-danger pr-2"></i> Weekly</a>--}}
{{--                                                <a class="dropdown-item" href="#"><i class="fa fa-calculator text-warning pr-2"></i> Monthly</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <div class="container-fluid">

                                    {!! $dataTable->table(['class'=>'table']) !!}
                                </div>
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
    @include('_partials.footer')
@endsection
@push('scripts')
        {!! $dataTable->scripts() !!}

@endpush


<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready(function() {

$('#refresh').click(function() {

 $.ajax({
    url: "http://apilayer.net/api/live?access_key=264a557583b2812cbcc9945735959246&currencies=PKR&source=USD&format=1",
    type: 'GET',
    success: function(res) {
        var dollar_rate = res.quotes.USDPKR;
    $.ajax({
    url: "/save-dollar-rate/"+dollar_rate,
    type: 'GET',
    success: function(res) {

        document.getElementById('latest-usd-rate').innerHTML = res.dollar_rate;
       document.getElementById('last-updated').innerHTML = res.created_at;
    },
    error: function(err) {
        console.log(err);
    }
});

    },

    error: function(err) {
         console.log(err);
    }

});


})

})
</script>

<!-- Request to get usd rate in pkr-->

<!-- http://apilayer.net/api/live?access_key=264a557583b2812cbcc9945735959246&currencies=PKR&source=USD&format=1 -->

<!-- response -->

<!-- {
  "success":true,
  "terms":"https:\/\/currencylayer.com\/terms",
  "privacy":"https:\/\/currencylayer.com\/privacy",
  "timestamp":1586363706,
  "source":"USD",
  "quotes":{
    "USDPKR":167.529774
  }
} -->
