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
                    <li class="breadcrumb-item"><a href="{{ route('allUsers') }}" class="default-color">Users</a></li>
                    <li class="breadcrumb-item active">All Users</li>
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
                                    Select 2
                                </div>
                            </div>
                            <div class="card-body">  
            @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                  <div class="table-responsive">
            {!! $dataTable->table(['class'=>'table']) !!}
                    </div>
                                {{-- <table id="users" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table> --}}
                                {{-- Model --}}


                                    
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

        {!! $dataTable->scripts() !!}
@endpush

{{-- @push('scripts') --}}
{{--   buttons: [
           'print'
        ],
         dom: 'Bfrtip', --}}
         {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
{{-- <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script> --}}
{{-- 
<script type="text/javascript">
$(document).ready(function() {

    Table = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
      buttons: [
           'print'
        ],
        "ajax": "{{ route('allUsers') }}",
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
             {data: 'action', name: 'action'}
        ]
    });
});
</script> --}}


{{-- @endpush --}}