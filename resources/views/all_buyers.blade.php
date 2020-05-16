@extends('layouts.app')
@section('content')
    @include('_partials.navbar')
    <style>
        .table td, .table th{
            padding: 0.4rem 1rem;
        }
    </style>

    <div class="app-body">

        <!--left sidebar start-->
    {{--    @include('_partials.sidebar')--}}
    <!--left sidebar end-->
        <main class="main-content">
            {{--            <div class="page-title">--}}
            {{--                <div class="row">--}}
            {{--                    <h4 class="mb-0 mr-auto ml-3">Contract No: {{$contractor->contractor_number}}</h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Buyers Details</div>
                    </div>
                    <div class="card-body">
                        <table id="bs4-table" class="table table-bordered table-striped table-responsive">
                            <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row" style="">Buyers Name</th>
                            </tr>
                            @foreach($total_buyers as $key => $buyer)
                            <tr>
                                <td><h4>{{$buyer[0]['buyer_name']}}</h4></td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>



                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a href="{{ URL::previous() }}" role="button"
                                   class="btn btn-info">Back</a>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </main>

    </div>
@endsection

@push('scripts')

    @include('_partials.scripts')

@endpush


