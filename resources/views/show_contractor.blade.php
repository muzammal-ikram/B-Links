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
            <div class="container">
 
                        <div class="card ">
                            <div class="card-header">
                                <div class="card-title">Contract Details</div>
                            </div>
                            <div class="card-body">
                                <table id="bs4-table" class="table table-bordered table-striped table-responsive" style="overflow:scroll;">
                                    <tr>
                                        <th class="text-nowrap" scope="row">Contract No</th>
                                        <th class="text-nowrap" scope="row">Contract Date</th>
                                        <th class="text-nowrap" scope="row">Item</th>
                                        <th class="text-nowrap" scope="row">Seller</th>
                                        <th class="text-nowrap" scope="row">Buyer</th>
                                        <th class="text-nowrap" scope="row">Lc Opener</th>
                                        <th class="text-nowrap" scope="row">Fcls</th>
                                        <th class="text-nowrap" scope="row">LSD</th>
                                        <th class="text-nowrap" scope="row">LC type</th>
                                        <th class="text-nowrap" scope="row">Lc Number</th>
                                        <th class="text-nowrap" scope="row">Price per $</th>
                                        <th class="text-nowrap" scope="row">Quantity</th>
                                        <th class="text-nowrap" scope="row">Total Amount</th>
                                        <th class="text-nowrap" scope="row">Commission Type</th>
                                        @if($contractor->commission_type == 'kg')
                                        <th class="text-nowrap" scope="row">KG</th>
                                        @else
                                        <th class="text-nowrap" scope="row">Percent</th>
                                        @endif
                                        <th class="text-nowrap" scope="row">Commission Amount</th>
                                        <th class="text-nowrap" scope="row">Invoice Number</th>
                                        <th class="text-nowrap" scope="row">BL Number</th>
                                        <th class="text-nowrap" scope="row">Invoice FCLS</th>
                                        <th class="text-nowrap" scope="row">ETD</th>
                                        <th class="text-nowrap" scope="row">ETA</th>
                                        <th class="text-nowrap" scope="row">AWB</th>
                                        <th class="text-nowrap" scope="row">Document</th>
                                        <th class="text-nowrap" scope="row">Shipment Status</th>
                                        <th class="text-nowrap" scope="row">Commission Deadline</th>
                                        <th class="text-nowrap" scope="row">Status</th>
                                    </tr>
                                    <tr>
                                        <td>{{$contractor->contractor_number}}</td>
                                        <td>{{$contractor->date ? $contractor->date->format('d/m/y') : ''}}</td>
                                        <td>{{$contractor->item}}</td>
                                        <td>{{$contractor->seller_name}}</td>
                                        <td>{{$contractor->buyer_name}}</td>
                                        <td>{{$contractor->lc_opener_name}}</td>
                                        <td>{{$contractor->fcls}}</td>
                                        <td>{{$contractor->lsd ? $contractor->lsd->format('d/m/y'): ''}}</td>
                                        <td>{{$contractor->lc_type}}</td>
                                        <td>{{$contractor->lc_number}}</td>
                                        <td>{{$contractor->price_per_dollar}}</td>
                                        <td>{{$contractor->qty}}</td>
                                        <td>{{$contractor->total_amount}}</td>
                                        <td>{{$contractor->commission_type}}</td>
                                        @if($contractor->commission_type == 'kg')
                                            <td>{{$contractor->kg}}</td>
                                        @else
                                            <td>{{$contractor->percent}}</td>
                                        @endif
                                        <td>{{$contractor->commission_amount}}</td>
                                        <td>{{$contractor->invoice_number}}</td>
                                        <td>{{$contractor->bl_number}}</td>
                                        <td>{{$contractor->invoice_fcls}}</td>
                                        <td>{{$contractor->etd? $contractor->etd->format('d/m/y'): ''}}</td>
                                        <td>{{$contractor->eta ? $contractor->eta->format('d/m/y'): ''}}</td>
                                        <td>{{$contractor->awb}}</td>
                                        <td>{{$contractor->document}}</td>
                                        <td>{{$contractor->shipment_status}}</td>
                                        <td>{{$contractor->comm_deadline ? $contractor->comm_deadline->format('d/m/y') : ''}}</td>
                                        <td>
                                            @php
                                                $nowDate        =  Carbon\Carbon::now();
                                                $last7Days      = $contractor->comm_deadline->subDays(7);
                                                $comm_deadline  = $contractor->comm_deadline;
                                            @endphp
                                            @if($nowDate >= $last7Days && $nowDate <= $comm_deadline)
                                                last 7 days
                                            @elseif($nowDate > $comm_deadline)
                                                Completed
                                            @else
                                                Pending
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                                    @if($contractor->invoice_details)
                                        <div class="text-center">
                                            <h3>Extra Invoice</h3>
                                        </div>
                                    <table class="table table-bordered table-striped table-responsive-sm">
                                        <tr>
                                            <th class="text-nowrap" scope="row">Invoice Number</th>
                                            <th class="text-nowrap" scope="row">BL Number</th>
                                            <th class="text-nowrap" scope="row">Fcls</th>
                                            <th class="text-nowrap" scope="row">ETD</th>
                                            <th class="text-nowrap" scope="row">ETA</th>
                                            <th class="text-nowrap" scope="row">Date</th>
                                            <th class="text-nowrap" scope="row">Amount</th>
                                        </tr>

                                        @foreach(json_decode($contractor->invoice_details) as $key=>$invoice_detail)

                                            <tr>
                                                 <td>{{isset($invoice_detail->invoice) ? $invoice_detail->invoice : null }}</td>
                                                 <td>{{isset($invoice_detail->bl_number) ? $invoice_detail->bl_number : null }}</td>
                                                <td>{{isset($invoice_detail->fcls) ? $invoice_detail->fcls : null }}</td>
                                                <td>{{isset($invoice_detail->etd_date) ? Carbon\Carbon::parse($invoice_detail->etd_date)->format('d/m/y') : null }}</td>
                                                <td>{{isset($invoice_detail->eta_date) ? Carbon\Carbon::parse($invoice_detail->eta_date)->format('d/m/y') : null }}</td>
                                                <td>{{isset($invoice_detail->invoice_date) ? Carbon\Carbon::parse($invoice_detail->invoice_date)->format('d/m/y') : null }}</td>
                                                <td>{{isset($invoice_detail->invoice_amount) ? $invoice_detail->invoice_amount : null }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    @endif



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
        </main>

    </div>
@endsection

@push('scripts')

    @include('_partials.scripts')

@endpush


