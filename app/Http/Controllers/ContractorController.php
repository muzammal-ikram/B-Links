<?php

namespace App\Http\Controllers;
use App\Contractor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use NumberToWords\NumberToWords;
class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_contractor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice_details = [];

        $invoice_number_add     = $request->invoice_number_add;
        $bl_number_add          = $request->bl_number_add;
        $invoice_fcls_add       = $request->invoice_fcls_add;
        $etd_date_add           = $request->etd_date_add;
        $eta_date_add           = $request->eta_date_add;
        $invoice_date_add       = $request->invoice_date_add;
        $invoice_amount_add     = $request->invoice_amount_add;

        if(isset($request->invoice_number_add)){

            foreach($request->invoice_number_add as $key => $details){
                $arr = [];
                $etd_arr = [];
                $arr['invoice']     = $invoice_number_add[$key];
                $arr['bl_number']   = $bl_number_add[$key];
                $arr['fcls']        = $invoice_fcls_add[$key];
                $arr['etd_date']     = $etd_date_add[$key];
                $arr['eta_date']      = $eta_date_add[$key];
                $arr['invoice_date']     = $invoice_date_add[$key];
                $arr['invoice_amount']      = $invoice_amount_add[$key];

                if(is_null($arr['invoice']) && is_null($arr['bl_number']) && is_null($arr['etd_date']) && is_null($arr['eta_date']) && is_null($arr['fcls']) && is_null($arr['invoice_date']) && is_null($arr['invoice_amount'])) {
                    continue;
                }

                array_push($invoice_details, $arr);
            }
        }
        // find total amount
        $price_per_dollar   = $request->get('price_per_dollar');
        $qty                = $request->get('qty');
        $total_amount       = $request->get('total_amount');

        // find commission in kg's
        $commission_type    = $request->get('commission_type');
        $kg                 = $request->get('kg');
        $percent            = $request->get('percent');
        $commission_amount  = $request->get('commission_amount');
//        $invoice_amount     = number_format($request->get('invoice_amount'), 2);

        // if($commission_type == 'kg'){
        //     $commission_amount =  $qty * $kg;
        // }
        // if($commission_type == 'percent'){
        //     $commission_amount =  $total_amount * $percent;
        // }

        // find etd rest
        $fcls               = $request->get('fcls');
        // find commission deadline
        $commission_deadline                = new \Carbon\Carbon($request->get('etd'));
        $commission_deadline                = $commission_deadline->addDays($request->get('lc_type'));

        // insert Data
        $contractor = new Contractor;
        // Basic Details
        $contractor->date                   = $request->get('date');
        $contractor->contractor_number      = $request->get('contract_number');
        $contractor->item                  = $request->get('item');

        // for more than 1 item inputs

        $contractor->item_2                = $request->get('item_2');
        $contractor->item_2_fcls           = $request->get('item_2_fcls');
        $contractor->item_2_price_per_dollar          = $request->get('item_2_price_per_dollar');
        $contractor->item_2_qty               = $request->get('item_2_qty');
        $contractor->item_2_total_amount       = $request->get('item_2_total_amount');

        // Seller
        $contractor->seller_name            = $request->get('seller_name');

        // Buyer
        $contractor->buyer_name             = $request->get('buyer_name');
        // Lc Opener
        $contractor->lc_opener_name         = $request->get('lc_opener_name');

        // Contract Details
        $contractor->fcls                   = $fcls;
        $contractor->lsd                    = $request->get('lsd');
        $contractor->lc_type                = $request->get('lc_type');
        $contractor->lc_number              = $request->get('lc_number');

        // Payment Details
        $contractor->price_per_dollar       = $price_per_dollar;
        $contractor->qty                    = $qty;
        $contractor->total_amount           = $total_amount;
        $contractor->commission_type        = $commission_type;
        $contractor->percent                = $percent;
        $contractor->kg                     = $kg;

        $contractor->both_kg                = $request->get('both_kg');
        $contractor->both_percent           = $request->get('both_percent');

        $contractor->commission_amount      = $commission_amount;

        // Invoice Details
        $contractor->invoice_number         = $request->get('invoice_number');
        $contractor->bl_number              = $request->get('bl_number');
        $contractor->invoice_container         = $request->get('invoice_container');
        $contractor->invoice_fcls              = $request->get('invoice_fcls');
        $contractor->invoice_date              = $request->get('invoice_date');
        $contractor->invoice_amount              = $request->get('invoice_amount');

        // invoice more data here
        $contractor->invoice_details        = json_encode($invoice_details);


        // ETD/ETA Details
        $contractor->etd                    = $request->get('etd');
        $contractor->eta                    = $request->get('eta');



        // Documents Details
        $contractor->awb                    = $request->get('awb');
        $contractor->document               = $request->get('document');
        $contractor->shipment_status        = $request->get('shipment_status');
        $contractor->commission_status        = $request->get('commission_status');

        $contractor->comm_deadline          = $commission_deadline;
        $contractor->status                 = 'status';

        $contractor->save();

        return redirect()->back()->with('success' , 'Contract Added Successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $contractor = Contractor::findOrFail($id);
       return view('show_contractor', compact('contractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contractor = Contractor::findOrFail($id);

        return view('edit_contractor', compact('contractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice_details = [];

        $invoice_number_add     = $request->invoice_number_add;
        $bl_number_add          = $request->bl_number_add;
        $invoice_fcls_add       = $request->invoice_fcls_add;
        $etd_date_add           = $request->etd_date_add;
        $eta_date_add           = $request->eta_date_add;
        $invoice_date_add       = $request->invoice_date_add;
        $invoice_amount_add     = $request->invoice_amount_add;

        if(isset($request->invoice_number_add)){

            foreach($request->invoice_number_add as $key => $details){
                $arr = [];
                $etd_arr = [];
                $arr['invoice']     = $invoice_number_add[$key];
                $arr['bl_number']   = $bl_number_add[$key];
                $arr['fcls']        = $invoice_fcls_add[$key];
                $arr['etd_date']     = $etd_date_add[$key];
                $arr['eta_date']      = $eta_date_add[$key];
                $arr['invoice_date']     = $invoice_date_add[$key];

                if(is_null($arr['invoice']) && is_null($arr['bl_number']) && is_null($arr['etd_date']) && is_null($arr['eta_date']) && is_null($arr['fcls']) && is_null($arr['invoice_date']) && is_null($invoice_amount_add[$key])) {
                    continue;
                }
                $invoice_amount   = number_format($invoice_amount_add[$key] ,2);
                $arr['invoice_amount'] = str_replace(',', '', $invoice_amount);

                array_push($invoice_details, $arr);
            }

        }
        // dd($invoice_details);
        // find total amount
        $price_per_dollar   = $request->get('price_per_dollar');
        $qty                = $request->get('qty');
        $total_amount       = $request->get('total_amount');

        // find commission in kg's
        $commission_type    = $request->get('commission_type');
        $kg                 = $request->get('kg');
        $percent            = $request->get('percent');
        $commission_amount  = $request->get('commission_amount');
//        $invoice_amount     = number_format($request->get('invoice_amount'), 2);
        // if($commission_type == 'kg'){
        //     $commission_amount =  $qty * $kg;
        // }
        // if($commission_type == 'percent'){
        //     $commission_amount =  $total_amount * $percent;
        // }

        // find etd rest
        $fcls               = $request->get('fcls');


        // find commission deadline
        $commission_deadline                = new \Carbon\Carbon($request->get('etd'));
        $commission_deadline                = $commission_deadline->addDays($request->get('lc_type'));

        // update Data
        $contractor = Contractor::find($id);
        // Basic Details
        $contractor->date                   = $request->get('date');
        $contractor->contractor_number      = $request->get('contract_number');
        $contractor->item                  = $request->get('item');

        // for more than 1 item inputs

        $contractor->item_2                = $request->get('item_2');
        $contractor->item_2_fcls           = $request->get('item_2_fcls');
        $contractor->item_2_price_per_dollar          = $request->get('item_2_price_per_dollar');
        $contractor->item_2_qty               = $request->get('item_2_qty');
        $contractor->item_2_total_amount       = $request->get('item_2_total_amount');

        // Seller
        $contractor->seller_name            = $request->get('seller_name');
        $contractor->buyer_name             = $request->get('buyer_name');
        $contractor->lc_opener_name         = $request->get('lc_opener_name');
        // Contract Details
        $contractor->fcls                   = $fcls;
        $contractor->lsd                    = $request->get('lsd');
        $contractor->lc_type                = $request->get('lc_type');
        $contractor->lc_number              = $request->get('lc_number');

        // Payment Details
        $contractor->price_per_dollar       = $price_per_dollar;
        $contractor->qty                    = $qty;
        $contractor->total_amount           = $total_amount;
        $contractor->commission_type        = $commission_type;
        $contractor->percent                = $percent;
        $contractor->kg                     = $kg;

        $contractor->both_kg                = $request->get('both_kg');
        $contractor->both_percent           = $request->get('both_percent');

        $contractor->commission_amount      = $commission_amount;

        // Invoice Details
        $contractor->invoice_number         = $request->get('invoice_number');
        $contractor->bl_number              = $request->get('bl_number');
        $contractor->invoice_container         = $request->get('invoice_container');
        $contractor->invoice_fcls              = $request->get('invoice_fcls');
        $contractor->invoice_date              = $request->get('invoice_date');
        $contractor->invoice_amount              = $request->get('invoice_amount');
//        $contractor->invoice_amount              = $invoice_amount;

        // invoice more data here
        $contractor->invoice_details        = json_encode($invoice_details);

        // ETD/ETA Details
        $contractor->etd                    = $request->get('etd');
        $contractor->eta                    = $request->get('eta');
        // Documents Details
        $contractor->awb                    = $request->get('awb');
        $contractor->document               = $request->get('document');
        $contractor->shipment_status        = $request->get('shipment_status');
        $contractor->commission_status        = $request->get('commission_status');

        $contractor->comm_deadline          = $commission_deadline;
        $contractor->status                 = 'status';

        $contractor->save();

        return redirect()->back()->with('success' , 'Contract Updated Successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $contractor = Contractor::findOrFail($id);
       $contractor->delete();
       return redirect('/home')->with('success', 'contract deleted successfully');
    }
    public function getSeller(Request $request){

        \DB::statement("SET SQL_MODE=''");
        $data = Contractor::where('seller_name', 'like', $request->get('seller').'%')->groupBy('seller_name')->get();

        $output = '<ul class="dropdown-menu" style="display: block;cursor:pointer;  width: 100%; margin-top: -5px;">';
        foreach ($data as $row) {
            $output .= '<li style="margin-left: 10px; border-bottom: 1px solid lightgrey;">' . $row->seller_name . '<input style="display: none" value="' . $row->id . '" class="userId"></input></li>';

        }
        $output .= '</ul>';

        echo $output;
    }
    public function getSellerInfo(Request $request){
        $sellerInfo = Contractor::where('id', $request->seller_id)->first();
        return $sellerInfo;
    }
    public function getBuyer(Request $request){

        \DB::statement("SET SQL_MODE=''");
        $data = Contractor::where('buyer_name', 'like', $request->get('buyer').'%')->groupBy('buyer_name')->get();
        $output = '';
       if(count($data) > 0){
            $output = '<ul class="dropdown-menu" style="display: block;cursor:pointer;  width: 100%; margin-top: -5px;">';
            foreach ($data as $row) {
                $output .= '<li style="margin-left: 10px; border-bottom: 1px solid lightgrey;">' . $row->buyer_name . '<input style="display: none" value="' . $row->id . '" class="userId"></input></li>';
            }

            $output .= '</ul>';
       }

        echo $output;
    }
    public function getBuyerInfo(Request $request){
        $buyerInfo = Contractor::where('id', $request->buyer_id)->first();
        return $buyerInfo;
    }
    public function getLcOpener(Request $request){

        \DB::statement("SET SQL_MODE=''");
        $data = Contractor::where('lc_opener_name', 'like', $request->get('opener').'%')->groupBy('buyer_name')->get();
        $output = '';
       if(count($data) > 0){
            $output = '<ul class="dropdown-menu" style="display: block;cursor:pointer;  width: 100%; margin-top: -5px;">';
            foreach ($data as $row) {
                $output .= '<li style="margin-left: 10px; border-bottom: 1px solid lightgrey;">' . $row->lc_opener_name . '<input style="display: none" value="' . $row->id . '" class="userId"></input></li>';
            }

            $output .= '</ul>';
       }

        echo $output;
    }

    public function getOpenerInfo(Request $request){
        $openerInfo = Contractor::where('id', $request->opener_id)->first();
        return $openerInfo;
    }

    public function debitNote ($id, $status){
        // $status == 1('common')
        // $status == 0('download')

        $contract           = Contractor::where('id', $id)->first();

        $date               = $contract->date;
        $invoice_number     = $contract->invoice_number;
        $bl_number          = $contract->bl_number;
        $total_amount       = $contract->total_amount;
        $invoice_details    = json_decode($contract->invoice_details);
        $invoice_amount     = $contract->invoice_amount ? $contract->invoice_amount : 0;

        $calculate_amount = 0;
        foreach($invoice_details as $detail){
            if($detail->invoice_amount != ""){

                $amount = isset($detail->invoice_amount) ? $detail->invoice_amount : 0;
                $amount = str_replace(',', '', $amount);
                $calculate_amount += $amount;
            }
        }
        $invoice_amount = str_replace(',', '', $invoice_amount);
        $calculate_amount += $invoice_amount;
        $calculate_amount = number_format($calculate_amount, 2);
        $calculate_amount = str_replace(',', '', $calculate_amount);

        $word_amount =  $this->convertNumber($contract->commission_amount);
        // invoice More details
        $invoice_details    = json_decode($contract->invoice_details);
        $invoice_count      = count($invoice_details)+1;

        return view('debit_note', compact('contract', 'invoice_details', 'invoice_count', 'date', 'invoice_number', 'bl_number', 'total_amount', 'calculate_amount','word_amount', 'status'));
    }

    public function downloadDebitNote ($id, $status){

        $contract           = Contractor::where('id', $id)->first();

        $date               = $contract->date;
        $invoice_number     = $contract->invoice_number;
        $bl_number          = $contract->bl_number;
        $total_amount       = $contract->total_amount;
        $invoice_amount     = $contract->invoice_amount ? $contract->invoice_amount : 0;
        $invoice_details    = json_decode($contract->invoice_details);
        $calculate_amount = 0;
        foreach($invoice_details as $detail) {
            if ($detail->invoice_amount != "") {

                $amount = isset($detail->invoice_amount) ? $detail->invoice_amount : 0;
                $amount = str_replace(',', '', $amount);
                $calculate_amount += $amount;
            }
        }
        $invoice_amount = str_replace(',', '', $invoice_amount);
        $calculate_amount += $invoice_amount;
        $calculate_amount = number_format($calculate_amount, 2);
        $calculate_amount = str_replace(',', '', $calculate_amount);
        $word_amount =  $this->convertNumber($contract->commission_amount);
        
        // invoice More details
        $invoice_count      = count($invoice_details)+1;

        $pdf = PDF::loadView('pdf_debit_note', compact('contract', 'invoice_details', 'invoice_count', 'date', 'invoice_number', 'bl_number', 'total_amount', 'calculate_amount', 'word_amount', 'status'));
        return $pdf->download($contract->contractor_number.'-debit_note.pdf');
    }

    public function showBuyer(){
        $total_buyers = Contractor::get()->groupBy('buyer_name');
        return view('all_buyers', compact('total_buyers'));
    }

    public function showSeller(){
        $total_sellers = Contractor::get()->groupBy('seller_name');
        return view('all_sellers', compact('total_sellers'));
    }
    public function convertNumber($num){

        $ones = array(
        0 =>"ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
        );
        $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
        ); 
        $hundreds = array( 
        "HUNDRED", 
        "THOUSAND", 
        "MILLION", 
        "BILLION", 
        "TRILLION", 
        "QUARDRILLION" 
        ); /*limit t quadrillion */
        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr,1); 
        $rettxt = ""; 
        foreach($whole_arr as $key => $i){
            
        while(substr($i,0,1)=="0")
                $i=substr($i,1,5);
        if($i < 20){ 
        /* echo "getting:".$i; */
        $rettxt .= $ones[$i]; 
        }elseif($i < 100){ 
        if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
        if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
        }else{ 
        if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
        if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
        if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
        $rettxt .= " ".$hundreds[$key]." "; 
        }
        } 
        $rettxt .= ' Dollars';
        if($decnum > 0){
        $rettxt .= " and ";
        if($decnum < 20){
        $rettxt .= $ones[$decnum]. " Cents";
        }elseif($decnum < 100){
        $rettxt .= $tens[substr($decnum,0,1)];
        $rettxt .= " ".$ones[substr($decnum,1,1)].' Cents';
        }
        }
        return $rettxt;

        }
        // extract($_POST);
        // if(isset($convert))
        // {
        // echo "<p align='center' style='color:blue'>".numberTowords("$num")."</p>";
        // }
    // }

}
