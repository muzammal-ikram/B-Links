@extends('layouts.app')
@section('content')
 @include('_partials.navbar')

    <div class="app-body">

        @include('_partials.sidebar')
        <main class="main-content">
            <div class="container">
             
             
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


  <table id="users" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Created At</th>
            {{-- <th>Actions</th> --}}
        </tr>
    </thead>
  </table>

            </div>
        </main>
    </div>
    <!--===========login end===========-->

    @include('_partials.footer')

@endsection
@push('scripts')

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {

    Table = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
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
        ]
    });
});
</script>


@endpush