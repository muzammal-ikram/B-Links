@extends('layouts.app')
@section('content')
 @include('_partials.navbar')

    <!--===========app body start===========-->
    <div class="app-body">
        @include('_partials.sidebar')
        <!--main contents start-->
        <main class="main-content">
            <!--page title start-->
            <div class="page-title">
                <h4 class="mb-0"> All Users
                </h4>
                <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('allContractor') }}" class="default-color">Contractor</a></li>
                    <li class="breadcrumb-item active">All Contractor</li>
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
                                    All Contractor
                                </div>
                            </div>
                            <div class="card-body">   
                             <div class="table-responsive">
                                {!! $dataTable->table(['class'=>'table']) !!}
                            </div>        
                                {{-- <table id="contractors" class="table table-hover table-condensed table-responsive" style="width:100%">
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
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                </table> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- state end-->

            </div>
        </main>
        <!--main contents end-->
    </div>
    <!--===========app body end===========-->
 
    @include('_partials.footer')

@endsection
@push('scripts')
{{-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> --}}
{{-- <script type="text/javascript">
$(document).ready(function() {

    Table = $('#contractors').DataTable({
        "processing": true,
        "serverSide": true,
        buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         dom: 'Bfrtip',
        "ajax": "{{ route('allContractor') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'is_admin', name: 'is_admin',
              "render": function (data, type, row) {
                if (data == 1) {
                    return 'Admin';}
                    else {
                    return 'Assistant';
                }
            }
        },
            {data: 'created_at', name: 'created_at'},
        ]
    });
});
</script>
--}}


        {!! $dataTable->scripts() !!}

@endpush 