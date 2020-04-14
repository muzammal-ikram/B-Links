@extends('layouts.app')
@section('content')
    @include('_partials.navbar')

    <div class="app-body">

        <!--left sidebar start-->
    @include('_partials.sidebar')
    <!--left sidebar end-->
        <main class="main-content">
            <div class="page-title">
                <div class="row">
                    <h4 class="mb-0 mr-auto ml-3">Contract No: {{$contractor->contractor_number}}</h4>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 mb-4 ui-sortable">
                        <div class="card ">
                            <div class="card-header">
                                <div class="card-title">Contract Details</div>
                            </div>
                            <div class="card-body">
                                <table id="bs4-table" class="table table-bordered table-striped table-responsive-sm">
                                    <tbody>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Contract No</th>
                                        <td>{{$contractor->contractor_number}}</td>
                                        <th class="text-nowrap" scope="row">Contract Date</th>
                                        <td>{{$contractor->date}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Item</th>
                                        <td>{{$contractor->item}}</td>
                                        <th class="text-nowrap" scope="row">Seller Name</th>
                                        <td>{{$contractor->seller_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Buyer Name</th>
                                        <td>{{$contractor->buyer_name}}</td>
                                        <th class="text-nowrap" scope="row">Lc Opener Name</th>
                                        <td>{{$contractor->lc_opener_name}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Fcls</th>
                                        <td>{{$contractor->fcls}}</td>
                                        <th class="text-nowrap" scope="row">LSD</th>
                                        <td>{{$contractor->lsd}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">LC type</th>
                                        <td>{{$contractor->lc_type}}</td>
                                        <th class="text-nowrap" scope="row">Lc Number</th>
                                        <td>{{$contractor->lc_number}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Price per $</th>
                                        <td>{{$contractor->price_per_dollar}}</td>
                                        <th class="text-nowrap" scope="row">Quantity</th>
                                        <td>{{$contractor->qty}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Total Amount</th>
                                        <td>{{$contractor->total_amount}}</td>
                                        <th class="text-nowrap" scope="row">Commission Type</th>
                                        <td>{{$contractor->commission_type}}</td>
                                    </tr>
                                    <tr>
                                        @if($contractor->commission_type == 'kg')
                                        <th class="text-nowrap" scope="row">KG</th>
                                        <td>{{$contractor->kg}}</td>
                                        @else
                                        <th class="text-nowrap" scope="row">Percent</th>
                                        <td>{{$contractor->percent}}</td>
                                        @endif
                                        <th class="text-nowrap" scope="row">Quantity</th>
                                        <td>{{$contractor->qty}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Commission Amount</th>
                                        <td>{{$contractor->commission_amount}}</td>
                                        <th class="text-nowrap" scope="row">Invoice Number</th>
                                        <td>{{$contractor->invoice_number}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">BL Number</th>
                                        <td>{{$contractor->bl_number}}</td>
                                        <th class="text-nowrap" scope="row">ETD</th>
                                        <td>{{$contractor->etd}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">ETD FCLS</th>
                                        <td>{{$contractor->etd_fcls}}</td>
                                        <th class="text-nowrap" scope="row">ETD Rest</th>
                                        <td>{{$contractor->etd_rest}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">ETA</th>
                                        <td>{{$contractor->eta}}</td>
                                        <th class="text-nowrap" scope="row">ETA FCLS</th>
                                        <td>{{$contractor->eta_fcls}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">ETA Rest</th>
                                        <td>{{$contractor->eta_rest}}</td>
                                        <th class="text-nowrap" scope="row">AWB</th>
                                        <td>{{$contractor->awb}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Document</th>
                                        <td>{{$contractor->document}}</td>
                                        <th class="text-nowrap" scope="row">Shipment Status</th>
                                        <td>{{$contractor->shipment_status}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Commission Deadline</th>
                                        <td>{{$contractor->comm_deadline}}</td>
                                        <th class="text-nowrap" scope="row">Status</th>
                                        <td>{{$contractor->status}}</td>
                                    </tr>


                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <div class="btn-demo">
                                    <a href="{{ URL::previous() }}" role="button"
                                       class="col-1 btn btn-info">Back</a>
                                    <a href="{{ url('/debit-note', $contractor->id) }}"
                                       class="col-2 btn btn-warning">Show Debit Note</a>
                                    <a href="{{ url('/download-debit-note', $contractor->id) }}"
                                       class="col-2 btn btn-primary">Download Debit Note</a>
                                </div>
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


