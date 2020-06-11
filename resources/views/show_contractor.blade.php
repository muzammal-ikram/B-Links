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

                        <div class="card ">
                            <div class="card-header">
                                <div class="card-title">Contract Details</div>
                            </div>
                            <div class="card-body">
                                <table id="bs4-table" class="table table-bordered table-striped table-responsive">
                                    <tr>
                                        <th class="text-nowrap" scope="row" style="">Contract No</th>
                                        <td>{{$contractor->contractor_number}}</td>
                                        <th class="text-nowrap" scope="row">Contract Date</th>
                                        <td>{{$contractor->date ? Carbon\Carbon::parse($contractor->date)->format('d/m/y') : ''}}</td>
                                        <th class="text-nowrap" scope="row">Item</th>
                                        <td>{{$contractor->item}}</td>
                                        <th class="text-nowrap" scope="row">Fcls</th>
                                        <td>{{$contractor->fcls}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Seller</th>
                                        <td>
                                            @if($contractor->seller_name != Null)
                                                {{--                                                @if(strlen($contractor->seller_name) > 20)--}}
                                                {{--                                                    <div id="more{{$contractor->id}}" name = "more">--}}
                                                {{--                                                        {{ \Illuminate\Support\Str::limit($contractor->seller_name, 20, '...') }}--}}
                                                {{--                                                        <p href = "" onclick="showmore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                    <div id="less{{$contractor->id}}" name = "less" style="display:none;">--}}
                                                {{--                                                        {{$contractor->seller_name}}--}}
                                                {{--                                                        <p href = "" onclick="showless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @else--}}
                                                {{--                                                    <div>--}}
                                                {{--                                                        {{$contractor->seller_name}}--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                @endif--}}
                                                <div>
                                                    {{$contractor->seller_name}}
                                                </div>
                                            @endif
                                        </td>

                                        <th class="text-nowrap" scope="row">Buyer</th>
                                        <td>
                                            @if($contractor->buyer_name != Null)
{{--                                                @if(strlen($contractor->buyer_name) > 20)--}}
{{--                                                    <div id="buyer_more{{$contractor->id}}" name = "buyer_more">--}}
{{--                                                        {{ \Illuminate\Support\Str::limit($contractor->buyer_name, 20, '...') }}--}}
{{--                                                        <p href = "" onclick="showBuyermore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="buyer_less{{$contractor->id}}" name = "buyer_less" style="display:none;">--}}
{{--                                                        {{$contractor->buyer_name}}--}}
{{--                                                        <p href = "" onclick="showBuyerless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>--}}
{{--                                                    </div>--}}
{{--                                                @else--}}
{{--                                                    <div>--}}
{{--                                                        {{$contractor->buyer_name}}--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
                                                <div>
                                                    {{$contractor->buyer_name}}
                                                </div>
                                            @endif
                                        </td>
                                        <th class="text-nowrap" scope="row">Lc Opener</th>
                                        <td>
                                            @if($contractor->lc_opener_name != Null)
{{--                                                @if(strlen($contractor->lc_opener_name) > 20)--}}
{{--                                                    <div id="opener_more{{$contractor->id}}" name = "opener_more">--}}
{{--                                                        {{ \Illuminate\Support\Str::limit($contractor->lc_opener_name, 20, '...') }}--}}
{{--                                                        <p href = "" onclick="showOpenermore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="opener_less{{$contractor->id}}" name = "opener_less" style="display:none;">--}}
{{--                                                        {{$contractor->lc_opener_name}}--}}
{{--                                                        <p href = "" onclick="showOpenerless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>--}}
{{--                                                    </div>--}}
{{--                                                @else--}}
{{--                                                    <div>--}}
{{--                                                        {{$contractor->lc_opener_name}}--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
                                                    <div>
                                                        {{$contractor->lc_opener_name}}
                                                    </div>
                                            @endif
                                        </td>
                                        <th class="text-nowrap" scope="row">LSD</th>
                                        <td>{{$contractor->lsd ? Carbon\Carbon::parse($contractor->lsd)->format('d/m/y') : ''}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">LC type</th>
                                        <td>{{$contractor->lc_type}}</td>
                                        <th class="text-nowrap" scope="row">Lc Number</th>
                                        <td>{{$contractor->lc_number}}</td>
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
                                        @if($contractor->commission_type == 'kg')
                                        <th class="text-nowrap" scope="row">KG</th>
                                            <td>{{$contractor->kg}}</td>
                                        @elseif($contractor->commission_type == 'percent')
                                        <th class="text-nowrap" scope="row">Percent</th>
                                            <td>{{$contractor->percent}}</td>
                                        @else
                                            <th class="text-nowrap" scope="row">kg</th>
                                            <td>{{$contractor->both_kg}}</td>
                                            <th class="text-nowrap" scope="row">Percent</th>
                                            <td>{{$contractor->both_percent}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th class="text-nowrap" scope="row">Commission Amount</th>
                                        <td>{{$contractor->commission_amount}}</td>
                                        <th class="text-nowrap" scope="row">AWB</th>
                                        <td>{{$contractor->awb}}</td>
                                        <th class="text-nowrap" scope="row">Document</th>
                                        <td>{{$contractor->document}}</td>
                                        <th class="text-nowrap" scope="row">Shipment Status</th>
                                        <td>{{$contractor->shipment_status}}</td>
                                    </tr>
                                    @if($contractor->item_2 != '')
                                    <tr>
                                        <th class="text-nowrap" scope="row">Item 2</th>
                                        <td>{{$contractor->item_2}}</td>
                                        <th class="text-nowrap" scope="row">Item 2 FCLS</th>
                                        <td>{{$contractor->item_2_fcls}}</td>
                                        <th class="text-nowrap" scope="row">Item 2 Price per $</th>
                                        <td>{{$contractor->item_2_price_per_dollar}}</td>
                                        <th class="text-nowrap" scope="row">Item 2 Qty</th>
                                        <td>{{$contractor->item_2_qty}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        @if($contractor->item_2 != '')
                                        <th class="text-nowrap" scope="row">Item 2 Total Amount</th>
                                            <td>{{$contractor->item_2_total_amount}}</td>
                                        @endif
                                        <th class="text-nowrap" scope="row">Commission Deadline</th>
                                        <td>{{$contractor->comm_deadline ? Carbon\Carbon::parse($contractor->comm_deadline)->format('d/m/y') : ''}}</td>

                                        <th class="text-nowrap" scope="row">Status</th>
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
                                            <th class="text-nowrap" scope="row">Commission Status</th>
                                            <td>{{$contractor->commission_status}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                                @if($contractor->invoice_number || $contractor->bl_number || $contractor->invoice_fcls || $contractor->invoice_amount || $contractor->etd || $contractor->eta || $contractor->invoice_date )
                                
                                <div class="text-center">
                                    <h3>Invoices</h3>
                                </div>

                                <table class="table table-bordered table-striped table-responsive-sm">
                                    <tr>
                                        <th class="text-nowrap" scope="row">Invoice Number</th>
                                        <th class="text-nowrap" scope="row">BL Number</th>
                                        <th class="text-nowrap" scope="row">Invoice FCLS</th>
                                        <th class="text-nowrap" scope="row">Invoice Amount</th>
                                        <th class="text-nowrap" scope="row">ETD</th>
                                        <th class="text-nowrap" scope="row">ETA</th>
                                        <th class="text-nowrap" scope="row">Invoice Date</th>
                                    </tr>

                                    <tr>
                                        <td>{{$contractor->invoice_number}}</td>
                                        <td>{{$contractor->bl_number}}</td>
                                        <td>{{$contractor->invoice_fcls}}</td>
                                        <td>{{$contractor->invoice_amount}}</td>
                                        <td>{{$contractor->etd ? Carbon\Carbon::parse($contractor->etd)->format('d/m/y') : ''}}</td>
                                        <td>{{$contractor->eta ? Carbon\Carbon::parse($contractor->eta)->format('d/m/y') : ''}}</td>
                                        <td>{{$contractor->invoice_date ? Carbon\Carbon::parse($contractor->invoice_date)->format('d/m/y') : ''}}</td>
                                    </tr>
                                </table>
                                @endif

                                    @if(!empty(json_decode($contractor->invoice_details)))
                                    
                                    <table class="table table-bordered table-striped table-responsive-sm">
                                        <tr>
                                            <th class="text-nowrap" scope="row">Invoice Numberdd</th>
                                            <th class="text-nowrap" scope="row">BL Number</th>
                                            <th class="text-nowrap" scope="row">Invoice FCLS</th>
                                            <th class="text-nowrap" scope="row">Invoice Amount</th>
                                            <th class="text-nowrap" scope="row">ETD</th>
                                            <th class="text-nowrap" scope="row">ETA</th>
                                            <th class="text-nowrap" scope="row">Invoice Date</th>
                                        </tr>

                                        @foreach(json_decode($contractor->invoice_details) as $key=>$invoice_detail)

                                            <tr>
                                                 <td>{{isset($invoice_detail->invoice) ? $invoice_detail->invoice : null }}</td>
                                                 <td>{{isset($invoice_detail->bl_number) ? $invoice_detail->bl_number : null }}</td>
                                                <td>{{isset($invoice_detail->fcls) ? $invoice_detail->fcls : null }}</td>
                                                <td>{{isset($invoice_detail->invoice_amount) ? $invoice_detail->invoice_amount : null }}</td>
                                                <td>{{isset($invoice_detail->etd_date) ? Carbon\Carbon::parse($invoice_detail->etd_date)->format('d/m/y') : null }}</td>
                                                <td>{{isset($invoice_detail->eta_date) ? Carbon\Carbon::parse($invoice_detail->eta_date)->format('d/m/y') : null }}</td>
                                                <td>{{isset($invoice_detail->invoice_date) ? Carbon\Carbon::parse($invoice_detail->invoice_date)->format('d/m/y') : null }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    @endif



                                <br>
                                <br>
                                {{-- <div class="btn-demo">
                                    <a href="{{ URL::previous() }}" role="button"
                                       class="col-1 btn btn-info" style="float:left;">Back</a>
                                       <div class="dropdown show" >
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Show Debit Note
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="{{ url('/debit-note', $contractor->id) }}">Simple Debit Note</a>
                                              <a class="dropdown-item" href="#">Chinese Debit Note</a>
                                            </div>
                                          </div>

                                      <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Download Debit Note
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <a class="dropdown-item" href="{{ url('/debit-note', $contractor->id) }}">Simple Debit Note</a>
                                          <a class="dropdown-item" href="#">Chinese Debit Note</a>
                                        </div>
                                      </div>
                                </div> --}}


                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{ URL::previous() }}" role="button"
                                       class="btn btn-info">Back</a>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <div class="dropdown show" >
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Show Debit Note
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="{{ url('/debit-note/'.$contractor->id.'/1') }}">Simple Debit Note</a>
                                              <a class="dropdown-item" href="{{ url('/debit-note/'.$contractor->id.'/0') }}">Chinese Debit Note</a>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                     <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Download Debit Note
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <a class="dropdown-item" href="{{ url('/download-debit-note/'.$contractor->id.'/1') }}">Simple Debit Note</a>
                                          <a class="dropdown-item" href="{{ url('/download-debit-note/'.$contractor->id.'/0') }}">Chinese Debit Note</a>
                                        </div>
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

    <script>

    function showmore($getId){
        document.getElementById("more"+$getId).style.display = 'none';
        document.getElementById("less"+$getId).style.display = 'inline';
    }
    function showless($getId){
        document.getElementById("less"+$getId).style.display = 'none';
        document.getElementById("more"+$getId).style.display = 'inline';
    }


    function showBuyermore($getId){
        document.getElementById("buyer_more"+$getId).style.display = 'none';
        document.getElementById("buyer_less"+$getId).style.display = 'inline';
    }
    function showBuyerless($getId){
        document.getElementById("buyer_less"+$getId).style.display = 'none';
        document.getElementById("buyer_more"+$getId).style.display = 'inline';
    }

    function showOpenermore($getId){
        document.getElementById("opener_more"+$getId).style.display = 'none';
        document.getElementById("opener_less"+$getId).style.display = 'inline';
    }
    function showOpenerless($getId){
        document.getElementById("opener_less"+$getId).style.display = 'none';
        document.getElementById("opener_more"+$getId).style.display = 'inline';
    }

    </script>

@endpush


