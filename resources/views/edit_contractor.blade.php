@extends('layouts.app')
@section('content')
@include('_partials.navbar')

<style>
    .display_block{
        display: block;
    }
    .display_none{
        display: none;
    }
</style>
<div class="app-body">

    <!--left sidebar start-->
    @include('_partials.sidebar')
    <!--left sidebar end-->

    <!--main contents start-->
    <main class="main-content">
        <!--page title start-->
        <div class="page-title">
            <h4 class="mb-0"> Add Contract
{{--                <small>basic input examples</small>--}}
            </h4>
            <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                <li class="breadcrumb-item"><a href="#" class="default-color">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Contract</li>
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
                                Add Contract
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
                            <form class="container" action="{{ url('update-contractor/'.$contractor->id)}}" method="POST" id="needs-validation" novalidate>
                                @csrf
                                <div class="container">

                                    <div class="card">
                                        <h5 class="card-header h5">Basic Details</h5>
                                        <div class="card-body">
                                            {{-- {{ dd($contractor->date)}} --}}
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="Date">Date</label>
                                                    <input type="date" name="date" class="form-control" id="Date" value="{{ $contractor->date ? $contractor->date->format('Y-m-d') : "my"}}" autocomplete="off">
                                                  </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="contract_number">Contract #</label>
                                                    <input type="text" name="contract_number" class="form-control" value="{{ $contractor->contractor_number}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Contractor Number.
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="item">Item</label>
                                                    <input type="text" name="item" class="form-control" value="{{ $contractor->item }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Count.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <div class="card">
                                        <h5 class="card-header h5">Names</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Seller Name</label>
                                                    <input type="text" name="seller_name" class="form-control" value="{{ $contractor->seller_name }}" autocomplete="off" id="sellers_name">
                                                    <input type="hidden" name="seller_id" id="seller-id">
                                                    <div id='sellersSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Seller Name
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Buyer Name</label>
                                                    <input type="text" name="buyer_name" class="form-control" value="{{ $contractor->buyer_name}}" autocomplete="off" id="buyer_name">
                                                    <input type="hidden" id="buyer-id">
                                                    <div id='buyerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Buyer Name
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">LC Opener Name</label>
                                                    <input type="text" name="lc_opener_name" class="form-control" value="{{ $contractor->lc_opener_name}}" autocomplete="off" id="lc_opener_name">
                                                    <input type="hidden" id="opener-id">
                                                    <div id='openerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a LC Opener Name.
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Address</label>
                                                    <input type="text" name="seller_address" class="form-control" value="{{ $contractor->seller_address }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Seller Address.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Region</label>
                                                    <input type="text" name="seller_country" class="form-control" value="{{ $contractor->seller_country }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Seller Country.
                                                    </div>
                                                </div> --}}

                                            </div>
                                        </div>
                                      </div>


                                    <br>
                                    {{-- <div class="card">
                                        <h5 class="card-header h5">Buyer</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Name</label>
                                                    <input type="text" name="buyer_name" class="form-control" value="{{ $contractor->buyer_number}}" autocomplete="off" id="buyer_name">
                                                    <input type="hidden" id="buyer-id">
                                                    <div id='buyerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Buyer Name
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Address</label>
                                                    <input type="text" name="buyer_address" class="form-control" value="{{ $contractor->seller_address }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Buyer Address.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Region</label>
                                                    <input type="text" name="buyer_country" class="form-control" value="{{ $contractor->seller_region }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Buyer Country.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="card">
                                          <h5 class="card-header h5">Lc Opener</h5>
                                          <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Name</label>
                                                    <input type="text" name="lc_opener_name" class="form-control" value="{{ $contractor->lc_opener_name}}" autocomplete="off" id="lc_opener_name">
                                                    <input type="hidden" id="opener-id">
                                                    <div id='openerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a LC Opener Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Address</label>
                                                    <input type="text" name="lc_opener_address" class="form-control" value="{{ $contractor->lc_opener_address }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a LC Opener Address.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Region</label>
                                                    <input type="text" name="lc_opener_country" class="form-control"  value="{{ $contractor->lc_opener_country}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a LC Opener Country.
                                                    </div>
                                                </div>

                                            </div>
                                          </div>
                                        </div>

                                        <br> --}}
                                        <div class="card">
                                            <h5 class="card-header h5">Contract Details</h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom01">FCLS</label>
                                                        <input type="number" step="any" name="fcls" class="form-control" value="{{ $contractor->fcls }}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a FCLS.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom01">LSD</label>
                                                        <input type="date" name="lsd" class="form-control" value="{{ $contractor->lsd ? $contractor->lsd : null }}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a LSD.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="lc_type">LC Type</label>
                                                        <select class="form-control" id="sel1" name="lc_type">
                                                            <option value="15" {{ ($contractor->lc_type==15) ? "selected" : "" }}>15</option>
                                                            <option value="30" {{ ($contractor->lc_type==30) ? "selected" : "" }}>30</option>
                                                            <option value="45" {{ ($contractor->lc_type==45) ? "selected" : "" }}>45</option>
                                                            <option value="60" {{ ($contractor->lc_type==60) ? "selected" : "" }}>60</option>
                                                            <option value="90" {{ ($contractor->lc_type==90) ? "selected" : "" }}>90</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom01">LC Number</label>
                                                    <input type="text" name="lc_number" class="form-control" value="{{ $contractor->lc_number }}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a LC Number.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="card">
                                              <h5 class="card-header h5">Payment Details</h5>
                                              <div class="card-body">
                                                  <div class="row">

                                                      <div class="col-md-3 mb-3">
                                                          <label for="price_per_dollar">Price Per $</label>
                                                          <input type="number" step="any" name="price_per_dollar" class="form-control" value="{{$contractor->price_per_dollar}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Price Per Kg.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3">
                                                        <label for="qty_show">Qty</label>
                                                        <input type="number" step="any" class="form-control" name="qty" id="qty_show" value="{{$contractor->qty}}" autocomplete="off" >

                                                      </div>
                                                      <div class="col-md-1 mb-3">
                                                        <label for="qty_show">Total</label>
                                                        <button class="btn btn-primary form-control" type="button" onclick="totalAmount()">=</button>
                                                      </div>

                                                      <div class="col-md-4 mb-3">
                                                        <label for="validationCustom04">Total Amount</label>
                                                        <input type="text" class="form-control" value="{{$contractor->total_amount}}" autocomplete="off" disabled>
                                                        <input type="text" name="total_amount" id="total_amount_hide" value="{{$contractor->total_amount}}" autocomplete="off" style="display:none;">

                                                        <div class="invalid-feedback">
                                                            Please provide a Total Amount.
                                                        </div>

                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-3  mb-3">
                                                          <label for="commission">Commission Type</label>
                                                          <select class="form-control" id="select-commission" name="commission_type" autocomplete="off">
                                                              <option value="kg" {{ ($contractor->commission_type == "kg") ? "selected" : "" }}>kilogram kg</option>
                                                              <option value="percent" {{ ($contractor->commission_type == "percent") ? "selected" : "" }}>percentage %</option>
                                                          </select>
                                                      </div>

                                                      <div class="col-md-3 mb-3 {{ ($contractor->commission_type == 'kg') ? 'display_block' : 'display_none'}}" id="kg-input">
                                                          <label for="validationCustom01">KG's</label>
                                                          <input type="number" step="any" class="form-control" name="kg" id="kgs_commission" value="{{ $contractor->kg }}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a KG's.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3 {{ ($contractor->commission_type == 'percent') ? 'display_block' : 'display_none'}}" id="percent-input">
                                                          <label for="validationCustom01">Percent %</label>
                                                          <input type="number" step="any" name="percent" class="form-control" id="percent_commission" value="{{ $contractor->percent }}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Percent.
                                                          </div>
                                                      </div>
                                                      <div class="col-md-1 mb-3">
                                                        <label for="qty_show">Total</label>
                                                        <button class="btn btn-primary form-control" type="button" onclick="totalCommission()">=</button>
                                                      </div>
                                                      <div class="col-md-4  mb-3">
                                                        <label for="commission_amount">Commission</label>
                                                        <input type="text" class="form-control {{ $errors->has('commission_amount') ? ' is-invalid' : '' }}" id="commission_amount_show" value="{{ $contractor->commission_amount }}" autocomplete="off" disabled>
                                                        <input type="text" name="commission_amount" id="commission_amount_hide" value="{{ $contractor->commission_amount }}" autocomplete="off" style="display:none;">
                                                    </div>

                                                  </div>
                                              </div>
                                            </div>

                                          <br>
                                          <div class="card">
                                              <h5 class="card-header h5">Invoice Details</h5>
                                              <div class="card-body">
                                                  <div class="row">

                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom04">Invoice Number</label>
                                                        <input type="text" name="invoice_number" class="form-control" value="{{ $contractor->invoice_number }}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a Invoice Number.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationCustom01">BL Number</label>
                                                        <input type="text" name="bl_number" class="form-control" value="{{ $contractor->bl_number }}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a BL Number.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 mb-3">
                                                        <label for="validationCustom01">Containers:</label>
                                                        <input type="number" step="any" name="invoice_container" class="form-control" value="{{ $contractor->invoice_container }}" autocomplete="off">

                                                    </div>

                                                    <div class="col-md-2 mb-3">
                                                        <label for="validationCustom01">No Of FCLS:</label>
                                                        <input type="number" step="any" name="invoice_fcls" class="form-control" id="fcls" value="{{ $contractor->invoice_fcls }}" autocomplete="off">

                                                    </div>

                                                    <div class="col-md-2 mb-3">
                                                        <label for="validationCustom01">Add</label>
                                                        <div class="input-group control-group after-add-more">
                                                            <div class="input-group-btn">
                                                               <button class="btn btn-success edit-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                                             </div>
                                                         </div>
                                                    </div>

                                                  </div>
                                                {{-- @if($contractor->invoice_details)
                                                    @foreach (json_decode($contractor->invoice_details) as $key=>$invoice_detail)

                                                            <div class="row control-group">

                                                                <div class="col-md-3 mb-3">
                                                                <label for="validationCustom04">Invoice Number</label>
                                                                <input type="text" name="invoice_number_add[]" class="form-control" value="{{ $invoice_detail->invoice }}" autocomplete="off">
                                                                    <div class="invalid-feedback">
                                                                        Please provide a Invoice Number.
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">BL Number</label>
                                                                    <input type="text" name="bl_number_add[]" class="form-control" value="{{ $invoice_detail->bl_number }}" autocomplete="off">
                                                                    <div class="invalid-feedback">
                                                                        Please provide a BL Number.
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom04">Date</label>
                                                                    <input type="date" name="invoice_date_add[]" class="form-control" value="{{ $invoice_detail->date }}" autocomplete="off">
                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">Amount</label>
                                                                    <input type="number" step="any" name="invoice_ammount_add[]" class="form-control" value="{{ $invoice_detail->amount }}" autocomplete="off">

                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">No Of Containers:</label>
                                                                    <input type="number" step="any" name="invoice_container_add[]" class="form-control" value="{{isset($invoice_detail->containers) ? $invoice_detail->containers : null}}" autocomplete="off">

                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label for="validationCustom01">No Of FCLS:</label>
                                                                    <input type="number" step="any" name="invoice_fcls_add[]" class="form-control" value="{{isset($invoice_detail->fcls) ? $invoice_detail->fcls : null}}" autocomplete="off">

                                                                </div>

                                                                <div class="col-md-2 mb-3">
                                                                    <div class="copy hide">
                                                                        <label for="validationCustom01"></label>
                                                                        <div class="input-group"  >
                                                                            <div class="input-group-btn">
                                                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    @endforeach
                                                @endif --}}

                                                {{-- <div class="copy" id="copy-area" style="display:none;">
                                                    <div class="row control-group">

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom04">Invoice Number</label>
                                                            <input type="text" name="invoice_number_add[]" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->invoice_number}}" autocomplete="off">
                                                            <div class="invalid-feedback">
                                                                Please provide a Invoice Number.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom01">BL Number</label>
                                                            <input type="text" name="bl_number_add[]" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{$contractor->bl_number}}" autocomplete="off">
                                                            <div class="invalid-feedback">
                                                                Please provide a BL Number.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom04">Date</label>
                                                            <input type="date" name="invoice_date_add[]" class="form-control" value="" autocomplete="off">
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom01">Amount</label>
                                                            <input type="number" step="any" name="invoice_ammount_add[]" class="form-control" value="" autocomplete="off">

                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom01">No Of Containers:</label>
                                                            <input type="number" step="any" name="invoice_container_add[]" class="form-control" value="" autocomplete="off">

                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label for="validationCustom01">No Of FCLS:</label>
                                                            <input type="number" step="any" name="invoice_fcls_add[]" class="form-control" value="" autocomplete="off">

                                                        </div>

                                                        <div class="col-md-2 mb-3">
                                                            <div class="copy hide">
                                                                <label for="validationCustom01"></label>
                                                                <div class="input-group"  >
                                                                  <div class="input-group-btn">
                                                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                              </div>
                                            </div>


                                            <br>
                                            {{-- {{dd(json_decode($contractor->invoice_details))}} --}}
                                            <div id="add-more-invoice">
                                            @if($contractor->invoice_details)
                                            @foreach (json_decode($contractor->invoice_details) as $key=>$invoice_detail)
                                                <div class="copy" id="copy-area"   >
                                                   <div class="card control-group " >
                                                    <h5 class="card-header h5">Extra invoice</h5>
                                                    <div class="card-body">
                                                        <div >

                                                            <div >
                                                                <div class="row ">

                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom04">Invoice Number</label>
                                                                        <input type="text" name="invoice_number_add[]" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{ $invoice_detail->invoice }}" autocomplete="off">
                                                                        <div class="invalid-feedback">
                                                                            Please provide a Invoice Number.
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom01">BL Number</label>
                                                                        <input type="text" name="bl_number_add[]" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{ $invoice_detail->bl_number }}" autocomplete="off">
                                                                        <div class="invalid-feedback">
                                                                            Please provide a BL Number.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom04">Date</label>
                                                                        <input type="date" name="invoice_date_add[]" class="form-control" value="{{ $invoice_detail->date ? $invoice_detail->date : null  }}" autocomplete="off">
                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom01">Amount</label>
                                                                    <input type="number" step="any" name="invoice_ammount_add[]" class="form-control" value="{{  $invoice_detail->amount }}" autocomplete="off">

                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom01">No Of Containers:</label>
                                                                        <input type="number" step="any" name="invoice_container_add[]" class="form-control" value="{{  $invoice_detail->containers }}" autocomplete="off">

                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="validationCustom01">No Of FCLS:</label>
                                                                        <input type="number" step="any" name="invoice_fcls_add[]" class="form-control" value="{{  $invoice_detail->fcls }}" autocomplete="off">

                                                                    </div>
                                                                    {{-- eta/etd --}}
                                                                </div>
                                                                            <div class="row">

                                                                                    <div class="col-md-3 mb-3">
                                                                                        <label for="validationCustom04">ETD</label>
                                                                                        <input type="date" name="etd_date_add[]" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{  $invoice_detail->etd_date ? $invoice_detail->etd_date  : null  }}" autocomplete="off">
                                                                                        <div class="invalid-feedback">
                                                                                            Please provide a ETD.
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3 mb-3">
                                                                                        <label for="validationCustom05">ETD FCLS</label>
                                                                                        <input type="number" step="any" name="etd_fcls_add[]" class="form-control "  value="{{  $invoice_detail->etd_fcls }}" autocomplete="off">
                                                                                        <div class="invalid-feedback">
                                                                                            Please provide a ETD Fcls.
                                                                                        </div>
                                                                                    </div>



                                                                            <div class="col-md-3 mb-3">
                                                                                <label for="validationCustom04">ETA</label>
                                                                                <input type="date" name="eta_date_add[]" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{  $invoice_detail->eta_date ? $invoice_detail->eta_date : null }}" autocomplete="off">
                                                                                <div class="invalid-feedback">
                                                                                    Please provide a ETA.
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for="validationCustom05">ETA FCLS</label>
                                                                                <input type="number" step="any" name="eta_fcls_add[]" class="form-control {{ $errors->has('eta_fcls') ? ' is-invalid' : '' }}"  value="{{  $invoice_detail->eta_fcls }}" autocomplete="off">
                                                                                <div class="invalid-feedback">
                                                                                    Please provide a ETA Fcls.
                                                                                </div>
                                                                            </div>

                                                                    {{-- eta/etd end --}}
                                                                    <div class="col-md-2 mb-3">
                                                                        <div class="copy hide">
                                                                            <label for="validationCustom01"></label>
                                                                            <div class="input-group"  >
                                                                              <div class="input-group-btn">
                                                                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                                </div>


                                              <br>
                                              <div class="card">
                                                  <h5 class="card-header h5">ETD/ETA Details</h5>
                                                  <div class="card-body">

                                                     <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom04">ETD</label>
                                                            <input type="date" name="etd" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->etd ? $contractor->etd->format('Y-m-d') : null}}" autocomplete="off">
                                                            <div class="invalid-feedback">
                                                                Please provide a ETD.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom05">ETD FCLS</label>
                                                            <input type="number" step="any" name="etd_fcls" class="form-control" id="etd_fcls" value="{{ $contractor->etd_fcls }}" autocomplete="off">
                                                            <div class="invalid-feedback">
                                                                Please provide a ETD Fcls.
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationCustom05">ETD Rest</label>
                                                            <input type="text" id="etd_rest_show" class="form-control" value="{{ $contractor->etd_rest }}" disabled autocomplete="off">
                                                            <input type="text" name="etd_rest" id="etd_rest_hide" class="form-control" value="{{ $contractor->etd_rest }}" autocomplete="off" style="display:none;">
                                                        </div>


                                                    </div>


                                            <div class="row">

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom04">ETA</label>
                                                    <input type="date" name="eta" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{$contractor->eta ? $contractor->eta->format('Y-m-d') : null}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a ETA.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom05">ETA FCLS</label>
                                                    <input type="number" step="any" name="eta_fcls" class="form-control" id="eta_fcls" value="{{ $contractor->eta_fcls }}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a ETA Fcls.
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom05">ETA Rest</label>
                                                    <input type="text" class="form-control" value="{{ $contractor->eta_rest }}"  id="eta_rest_show" disabled autocomplete="off">
                                                    <input type="text" name="eta_rest" class="form-control" value="{{ $contractor->eta_rest }}"  id="eta_rest_hide" autocomplete="off" style="display:none;">
                                                </div>


                                            </div>


                                                  </div>
                                                </div>


                                                <br>
                                                <div class="card">
                                                    <h5 class="card-header h5">Documents Details</h5>
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom05">AWB</label>
                                                                <input type="text" name="awb" class="form-control" value="{{ $contractor->awb }}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a AWB.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationCustom05">Document</label>
                                                                <input type="text" name="document" class="form-control" value="{{ $contractor->document }}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a Document.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="lc_type">Shipment Status</label>
                                                                <select class="form-control" id="sel1" name="shipment_status">
                                                                    <option value="pending" {{ ($contractor->shipment_status == 'pending') ? "selected" : "" }}>Pending</option>
                                                                    <option value="done" {{ ($contractor->shipment_status == 'done') ? "selected" : "" }}>Done</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a Shipment Status.
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                  </div>




                                    {{--  Container Div End --}}
                                </div>

                                <br>

                                <button class="btn btn-success" type="submit" >Submit form</button>

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
                            <img src="{{ asset('assets/img/n1.png') }}" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Diverse Ltd.</a>
                            <small class="text-muted">2 days ago</small>
                            <p><a href="#">www.diverse-test.com</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="{{ asset('assets/img/n3.png') }}" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Black Friday Discount Offer</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Nam libero tempore cum soluta nobis est eligendi.</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="{{ asset('assets/img/n2.png') }}" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Task Failed</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Error: Invalid command found ... after [this class]</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="{{ asset('assets/img/n4.png') }}" alt=""/>
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

@include('_partials.footer')

@endsection

 @push('scripts')
{{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}


@include('_partials.scripts')
{{-- <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
<!--init-->

 @endpush
