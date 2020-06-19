@extends('layouts.app')
@section('content')
@include('_partials.navbar')

<style>
.card-body {
    padding: 0rem;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
 .btn-primary{
     background-color: lightblue;
 }

</style>


<div class="app-body">

    <!--left sidebar start-->
{{--    @include('_partials.sidebar')--}}
    <!--left sidebar end-->

    <!--main contents start-->
    <main class="main-content">

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
                            <form class="container-fluid" action="/create-contractor" method="POST" id="needs-validation" novalidate>
                                @csrf
                                <div class="container-fluid" style="padding-top: 20px">

                                    <div class="card">
{{--                                        <h5 class="card-header h5">Basic Details</h5>--}}
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <h6>Date</h6>
                                                    <input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('date')}}" autocomplete="off">
                                                  </div>

                                                <div class="col-md-3 mb-3">
                                                    <h6>Contract #</h6>
                                                    <input type="text" name="contract_number" class="form-control {{ $errors->has('contract_number') ? ' is-invalid' : '' }}" id="contract_number"  value="{{old('contract_number')}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Contractor Number.
                                                    </div>
                                                </div>

                                                <div class="col-md-2 mb-3">
                                                    <h6>Item</h6>
                                                    <input type="text" name="item" class="form-control {{ $errors->has('item') ? ' is-invalid' : '' }}" id="item" value="{{old('item')}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Count.
                                                    </div>
                                                </div>

                                                <div class="col-md-2 mb-3" id="item-2-input" style="display: none">
                                                    <h6>Item 2</h6>
                                                    <input type="text" name="item_2" class="form-control {{ $errors->has('item_2') ? ' is-invalid' : '' }}" id="item_2" value="{{old('item_2')}}" autocomplete="off">
                                                    <div class="invalid-feedback">
                                                        Please provide a Count.
                                                    </div>
                                                </div>

                                                <div class="col-md-1 mb-3" id="add-item-btn">
                                                    <label for="qty_show">Add Item</label>
                                                    <button class="btn btn-primary form-control" type="button" onclick="addItem()">+</button>
                                                </div>

                                                <div class="col-md-1 mb-3" id="delete-item-btn" style="display: none">
                                                    <label for="qty_show">Delete Item</label>
                                                    <button class="btn btn-danger form-control" type="button" onclick="deleteItem()">-</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <div class="card">
{{--                                        <h5 class="card-header h5">Names</h5>--}}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <h6>Seller Name</h6>
                                                    <input type="text" name="seller_name" class="form-control {{ $errors->has('seller_name') ? ' is-invalid' : '' }}" id="sellers_name" value="{{old('seller_name')}}" autocomplete="off">
                                                    <input type="hidden" name="seller_id" id="seller-id">
                                                    <div id='sellersSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Seller Name
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>Buyer Name</h6>
                                                    <input type="text" name="buyer_name" class="form-control {{ $errors->has('buyer_name') ? ' is-invalid' : '' }}" id="buyer_name" value="{{old('buyer_name')}}" autocomplete="off">
                                                    <input type="hidden" id="buyer-id">
                                                    <div id='buyerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a Buyer Name
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <h6>LC Opener Name</h6>
                                                    <input type="text" name="lc_opener_name" class="form-control {{ $errors->has('lc_opener_name') ? ' is-invalid' : '' }}" id="lc_opener_name" value="{{old('lc_opener_name')}}" autocomplete="off">
                                                    <input type="hidden" id="opener-id">
                                                    <div id='openerSuggestion'></div>
                                                    <div class="invalid-feedback">
                                                        Please provide a LC Opener Name.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                      </div>


                                    <br>

                                        <div class="card">
{{--                                            <h5 class="card-header h5">Contract Details</h5>--}}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2 mb-3">
                                                        <h6>FCLS</h6>
                                                        <input type="number" step="any" name="fcls" class="form-control {{ $errors->has('fcls') ? ' is-invalid' : '' }}" value="{{old('fcls')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a FCLS.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 mb-3" id="fcls-2-input" style="display: none">
                                                        <h6>Item 2 FCLS </h6>
                                                        <input type="number" step="any" name="item_2_fcls" class="form-control {{ $errors->has('item_2_fcls') ? ' is-invalid' : '' }}" value="{{old('item_2_fcls')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a FCLS.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mb-3">
                                                        <h6>LSD</h6>
                                                        <input type="date" name="lsd" class="form-control {{ $errors->has('lsd') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('lsd')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a LSD.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <h6>LC Type</h6>
                                                        <select class="form-control" id="sel1" name="lc_type">
                                                            <option value="15">15</option>
                                                            <option value="30">30</option>
                                                            <option value="45">45</option>
                                                            <option value="60">60</option>
                                                            <option value="90">90</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <h6>LC Number</h6>
                                                        <input type="text" name="lc_number" class="form-control {{ $errors->has('lc_number') ? ' is-invalid' : '' }}" id="validationCustom01"  value="{{old('lc_number')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a LC Number.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="card">
{{--                                              <h5 class="card-header h5">Payment Details</h5>--}}
                                              <div class="card-body">
                                                  <div class="row">

                                                      <div class="col-md-3 mb-3">
                                                          <h6>Price</h6>
                                                          <input type="number" step="any" name="price_per_dollar" class="form-control {{ $errors->has('price_per_dollar') ? ' is-invalid' : '' }}" id="price_per_dollar" value="{{old('price_per_dollar')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Price Per Kg.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3">
                                                        <h6>Qty</h6>
                                                        <input type="number" step="any" class="form-control" name="qty" id="qty_show" value="" autocomplete="off" >

                                                      </div>
                                                      <div class="col-md-1 mb-3">
                                                        <h6>Total</h6>
                                                        <button class="btn btn-primary form-control" type="button" onclick="totalAmount()">=</button>
                                                      </div>

                                                      <div class="col-md-4 mb-3">
                                                        <h6>Total Amount</h6>
                                                        <input type="text" class="form-control {{ $errors->has('total_amount') ? ' is-invalid' : '' }}" id="total_amount_show" value="" autocomplete="off" disabled>
                                                        <input type="text" name="total_amount" id="total_amount_hide" value="" autocomplete="off" style="display:none;" >

                                                        <div class="invalid-feedback">
                                                            Please provide a Total Amount.
                                                        </div>

                                                      </div>
                                                  </div>

                                                  <div class="row" id="payment-2-input" style="display: none">

                                                      <div class="col-md-3 mb-3">
                                                          <h6>Item 2 Price</h6>
                                                          <input type="number" step="any" name="item_2_price_per_dollar" class="form-control {{ $errors->has('item_2_price_per_dollar') ? ' is-invalid' : '' }}" id="item_2_price_per_dollar" value="{{old('item_2_price_per_dollar')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Price Per Kg.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3">
                                                          <h6>Item 2 Qty</h6>
                                                          <input type="number" step="any" class="form-control" name="item_2_qty" id="item_2_qty" value="" autocomplete="off" >

                                                      </div>
                                                      <div class="col-md-1 mb-3">
                                                          <h6>Total</h6>
                                                          <button class="btn btn-primary form-control" type="button" onclick="item_2_totalAmount()">=</button>
                                                      </div>

                                                      <div class="col-md-4 mb-3">
                                                          <h6>Item 2 Total Amount</h6>
                                                          <input type="text" class="form-control {{ $errors->has('item_2_total_amount') ? ' is-invalid' : '' }}" id="item_2_total_amount_show" value="" autocomplete="off" disabled>
                                                          <input type="text" name="item_2_total_amount" id="item_2_total_amount_hide" value="" autocomplete="off" style="display:none;" >

                                                          <div class="invalid-feedback">
                                                              Please provide a Total Amount.
                                                          </div>

                                                      </div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-3  mb-3">
                                                          <h6>Commission Type</h6>
                                                          <select class="form-control" id="select-commission" name="commission_type" autocomplete="off">
                                                              <option value="kg">kilogram kg</option>
                                                              <option value="percent">percentage %</option>
                                                              <option value="kg-percent">kg + percent</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-3 mb-3" id="kg-input">
                                                          <h6>KG's</h6>
                                                          <input type="number" step="any"  class="form-control {{ $errors->has('kg') ? ' is-invalid' : '' }}" name="kg" id="kgs_commission" value="{{old('kg')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a KG's.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3" id="percent-input" style="display:none">
                                                          <h6>Percent %</h6>
                                                          <input type="number" step="any" name="percent" class="form-control {{ $errors->has('percent') ? ' is-invalid' : '' }}" id="percent_commission" value="{{old('percent')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Percent.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-2 mb-3" id="both-kg-input" style="display:none">
                                                          <h6>kgs</h6>
                                                          <input type="number" step="any" name="both_kg" class="form-control {{ $errors->has('both_kg') ? ' is-invalid' : '' }}" id="both_kg" value="{{old('both_kg')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a kg.
                                                          </div>
                                                      </div>
                                                      <div class="col-md-2 mb-3" id="both-percent-input" style="display:none">
                                                          <h6>Percent</h6>
                                                          <input type="number" step="any" name="both_percent" class="form-control {{ $errors->has('both_percent') ? ' is-invalid' : '' }}" id="both_percent" value="{{old('both_percent')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a Percent.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-1 mb-3">
                                                        <h6>Total</h6>
                                                        <button class="btn btn-primary form-control" type="button" onclick="totalCommission()">=</button>
                                                      </div>
                                                      <div class="col-md-4  mb-3">
                                                        <h6>Commission</h6>
                                                        <input type="text" class="form-control {{ $errors->has('commission_amount') ? ' is-invalid' : '' }}" id="commission_amount_show" value="{{old('commission_amount')}}" autocomplete="off" disabled>
                                                        <input type="text" name="commission_amount" id="commission_amount_hide" value="" autocomplete="off"  style="display:none;">
                                                    </div>

                                                  </div>
                                              </div>
                                            </div>

                                          <br>
                                          <div class="card">
{{--                                              <h5 class="card-header h5">Invoice Details</h5>--}}
                                              <div class="card-body">
                                                  <div class="row">

                                                    <div class="col-md-2 mb-3">
                                                        <h6>Invoice Number</h6>
                                                        <input type="text" name="invoice_number" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('invoice_number')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a Invoice Number.
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 mb-3">
                                                        <h6>BL Number</h6>
                                                        <input type="text" name="bl_number" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{old('bl_number')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a BL Number.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <h6>No Of FCLS:</h6>
                                                        <input type="number" step="any" name="invoice_fcls" id="fcls" class="form-control" value="" autocomplete="off">

                                                    </div>

                                                      <div class="col-md-3 mb-3">
                                                          <h6>ETD</h6>
                                                          <input type="date" name="etd" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('etd')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a ETD.
                                                          </div>
                                                      </div>
                                                      <div class="col-md-3 mb-3">
                                                          <h6>ETA</h6>
                                                          <input type="date" name="eta" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('eta')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a ETA.
                                                          </div>
                                                      </div>

                                                      <div class="col-md-3 mb-3">
                                                          <h6>Date</h6>
                                                          <input type="date" name="invoice_date" class="form-control " value="{{old('invoice_date')}}" autocomplete="off">
                                                          <div class="invalid-feedback">
                                                              Please provide a ETA.
                                                          </div>
                                                      </div>

                                                    <div class="col-md-3 mb-3">
                                                        <h6>Amount</h6>
                                                        <input type="number" step="any" name="invoice_amount" class="form-control" value="{{old('invoice_amount')}}" autocomplete="off">
                                                        <div class="invalid-feedback">
                                                            Please provide a ETA.
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2 mb-3">
                                                        <h6>Add</h6>
                                                        <div class="input-group control-group after-add-more">
                                                            <div class="input-group-btn">
                                                               <button class="btn btn-success add-more" onclick="Clone()" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                                             </div>
                                                         </div>
                                                    </div>

                                                  </div>


                                              </div>
                                            </div>
<br>

<div id="showHere"></div>
                                    <div id="add-more-invoice" style="display:none;">
                                        <div class="copy clone" id="thediv"  >
                                           <div class="card control-group clone_divs">
{{--                                            <h5 class="card-header h5">Extra invoice</h5>--}}
                                            <div class="card-body">
                                                <div >

                                                    <div >
                                                        <div class="row ">

                                                            <div class="col-md-2 mb-3">
                                                                <h6>Invoice Number</h6>
                                                                <input type="text" name="invoice_number_add[]" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('invoice_number')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a Invoice Number.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 mb-3">
                                                                <h6>BL Number</h6>
                                                                <input type="text" name="bl_number_add[]" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{old('bl_number')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a BL Number.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                                <h6>No Of FCLS:</h6>
                                                                <input type="number" step="any" name="invoice_fcls_add[]" class="form-control" value="" autocomplete="off">

                                                            </div>

                                                            <div class="col-md-3 mb-3">
                                                                <h6>ETD</h6>
                                                                <input type="date" name="etd_date_add[]" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a ETD.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 mb-3">
                                                                <h6>ETA</h6>
                                                                <input type="date" name="eta_date_add[]" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('eta')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a ETA.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>Date</h6>
                                                                <input type="date" name="invoice_date_add[]" class="form-control " value="{{old('invoice_date_add')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a ETA.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <h6>Amount</h6>
                                                                <input type="number" step="any" name="invoice_amount_add[]" class="form-control " value="{{old('invoice_amount_add')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a ETA.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                                <div class="copy hide">
                                                                    <label for="validationCustom01"></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-btn">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                  </div>
                                                </div>
                                            </div>
                                             <button class="btn btn-danger " type="button" onclick="Delete(this) " style="width:100%;"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>

                                        </div>


                                                <div class="card">
{{--                                                    <h5 class="card-header h5">Documents Details</h5>--}}
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-3 mb-3">
                                                                <h6>AWB</h6>
                                                                <input type="text" name="awb" class="form-control {{ $errors->has('awb') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{old('awb')}}" autocomplete="off">
                                                                <div class="invalid-feedback">
                                                                    Please provide a AWB.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 mb-3">
                                                                <h6>Document</h6>
{{--                                                                <input type="text" name="document" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="validationCustom05" value="{{old('document')}}" autocomplete="off">--}}
                                                                <select class="form-control" id="sel1" name="document">
                                                                    <option value="recieved">Recieved</option>
                                                                    <option value="not_recieved">Not Recieved</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a Document.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 mb-3">
                                                                <h6>Shipment Status</h6>
                                                                <select class="form-control" id="sel1" name="shipment_status">
                                                                    <option value="pending">Pending</option>
                                                                    <option value="done">Done</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a Shipment Status.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3 mb-3">
                                                                <h6>Commission Status</h6>
                                                                <select class="form-control" id="commission_status" name="commission_status">
                                                                    <option value="Claimed">Claimed</option>
                                                                    <option value="Recieved">Recieved</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please provide a Commission Status.
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
                            <img src="assets/img/n1.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Diverse Ltd.</a>
                            <small class="text-muted">2 days ago</small>
                            <p><a href="#">www.diverse-test.com</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n3.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Black Friday Discount Offer</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Nam libero tempore cum soluta nobis est eligendi.</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n2.png" alt=""/>
                        </div>
                        <div class="nt-info">
                            <a href="#"  class="nt-title">Task Failed</a>
                            <small class="text-muted">2 days ago</small>
                            <p>Error: Invalid command found ... after [this class]</p>
                        </div>
                    </li>

                    <li>
                        <div class="nt-thumb mr-3">
                            <img src="assets/img/n4.png" alt=""/>
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

 @include('_partials.scripts')

{{-- <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
<!--init-->

 @endpush
