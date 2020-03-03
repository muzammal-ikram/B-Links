@extends('layouts.app')
@section('content')

<!--===========header start===========-->
    @include('_partials.navbar')

    <!--===========app body start===========-->
    <div class="app-body">

        <!--left sidebar start-->
    @include('_partials.sidebar')
        <!--left sidebar end-->

        <!--main contents start-->
        <main class="main-content main_area_width">

            <div class="container-fluid">

                <!--page title start-->
                <div class="page-title pl-0">
                    <h4 class="mb-0"> Home
                    </h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item active">/home</li>
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
                                        <h6 class="mt-1 mb-0">Total Contracts</h6>
                                        <p class="f12 mb-0">32 </p>
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
                                        <h6 class="mt-1 mb-0">Total Buyers</h6>
                                        <p class="f12 mb-0">123</p>
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
                                        <h6 class="mt-1 mb-0">Total Suppliers</h6>
                                        <p class="f12 mb-0">988
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
                                    All contractors

{{--                                    <form action="/contract-filter" method="get">--}}
{{--                                        @csrf--}}
{{--                                        <input type="text" name="supplier">--}}
{{--                                        <input type="text" name="buyer">--}}
{{--                                        <input type="submit" value="submit">--}}

{{--                                    </form>--}}
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
                                {!! $dataTable->table(['class'=>'table']) !!}
                              {{-- <table id="myContractors" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Contractor Number</th>
                                            <th>Supplier</th>
                                            <th>Buyer</th>
                                            <th>ETD</th>
                                            <th>ETA</th>
                                            <th>Port</th>
                                            <th>Quantity</th>
                                            <th>Price Per KG</th>
                                            <th>Amount</th>
                                            <th>Containers</th>
                                            <th>LC Number</th>
                                            <th>Invoice Number</th>
                                            <th>Commission %</th>
                                            <th>BL Number</th>
                                            <th>Contractor Status</th>
                                            <th>Documents</th>
                                            <th>Latest Shipment Date</th>
                                             <th>Date</th>
                                             <th>Actions</th>
                                        </tr>
                                    </thead>

                                </table> --}}
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
{{--
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>


<script type="text/javascript">
$(document).ready(function() {
    Table = $('#myContractors').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('home') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'contractor_number', name: 'contractor_number'},


            {data: 'supplier', name: 'supplier'},
            {data: 'buyer', name: 'buyer'},
            {data: 'etd', name: 'etd'},
            {data: 'eta', name: 'eta'},


            {data: 'port', name: 'port'},
            {data: 'quantity', name: 'quantity'},
             {data: 'price_per_kg', name: 'price_per_kg'},
            {data: 'total_amount', name: 'total_amount'},



            {data: 'containers', name: 'containers'},
            {data: 'lc_number', name: 'lc_number'},
            {data: 'invoice_number', name: 'invoice_number'},
            {data: 'commission', name: 'commission'},



            {data: 'bl_number', name: 'bl_number'},
            {data: 'contractor_status', name: 'contractor_status'},
            {data: 'documents', name: 'documents'},

            {data: 'latest_shipment_date', name: 'latest_shipment_date'},
            {data: 'date', name: 'date'}
        ]
    });
});
</script> --}}

        {!! $dataTable->scripts() !!}

@endpush
