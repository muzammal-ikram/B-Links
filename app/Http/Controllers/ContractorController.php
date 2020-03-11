<?php

namespace App\Http\Controllers;
use App\Contractor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
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
        // dd($request->all());
        $invoice_details = [];
        $invoice_number_add     = $request->invoice_number_add;
        $bl_number_add          = $request->bl_number_add;
        $invoice_date_add       = $request->invoice_date_add;
        $invoice_ammount_add    = $request->invoice_ammount_add;
        
        foreach($request->invoice_number_add as $key => $details){
            $arr = [];
            $arr['invoice']     = $invoice_number_add[$key];
            $arr['bl_number']   = $bl_number_add[$key];
            $arr['date']        = $invoice_date_add[$key];
            $arr['amount']      = $invoice_ammount_add[$key];
            if(is_null($arr['invoice']) && is_null($arr['bl_number']) && is_null($arr['date']) && is_null($arr['amount'])){
                continue;
            }
            array_push($invoice_details, $arr);
        }
        

        // find total amount
        $price_per_dollar   = $request->get('price_per_dollar');
        $qty                = $request->get('qty');
        $total_amount       = $price_per_dollar * $qty;

        // find commission in kg's
        $commission_type    = $request->get('commission_type');
        $kg                 = $request->get('kg');
        $percent            = $request->get('percent');
        if($commission_type == 'kg'){
            $commission_amount =  $qty * $kg;
        }
        if($commission_type == 'percent'){
            $commission_amount =  $total_amount * $percent;
        }

        // find etd rest
        $fcls               = $request->get('fcls');
        $etd_fcls           = $request->get('etd_fcls');
        $etd_rest           = $fcls - $etd_fcls;

        // find eta rest
        $eta_fcls           = $request->get('eta_fcls');
        $eta_rest           = $fcls - $eta_fcls;

        // find commission deadline
        $commission_deadline                = new \Carbon\Carbon($request->get('etd'));
        $commission_deadline                = $commission_deadline->addDays(60);

        // insert Data
        $contractor = new Contractor;
        // Basic Details
        $contractor->date                   = $request->get('date');
        $contractor->contractor_number      = $request->get('contract_number');
        $contractor->item                  = $request->get('item');

        // Seller
        $contractor->seller_name            = $request->get('seller_name');
        $contractor->seller_address         = $request->get('seller_address');
        $contractor->seller_country         = $request->get('seller_country');

        // Buyer
        $contractor->buyer_name             = $request->get('buyer_name');
        $contractor->buyer_address          = $request->get('buyer_address');
        $contractor->buyer_country          = $request->get('buyer_country');

        // Lc Opener
        $contractor->lc_opener_name         = $request->get('lc_opener_name');
        $contractor->lc_opener_address      = $request->get('lc_opener_address');
        $contractor->lc_opener_country      = $request->get('lc_opener_country');

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
        $contractor->commission_amount      = $commission_amount;

        // Invoice Details
        $contractor->invoice_number         = $request->get('invoice_number');
        $contractor->bl_number              = $request->get('bl_number');

        // invoice more data here
        $contractor->invoice_details        = json_encode($invoice_details);
 

        // ETD/ETA Details
        $contractor->etd                    = $request->get('etd');
        $contractor->etd_fcls               = $etd_fcls;
        $contractor->etd_rest               = $etd_rest;

        $contractor->eta                    = $request->get('eta');
        $contractor->eta_fcls               = $eta_fcls;
        $contractor->eta_rest               = $eta_rest;

        // Documents Details
        $contractor->awb                    = $request->get('awb');
        $contractor->document               = $request->get('document');
        $contractor->shipment_status        = $request->get('shipment_status');

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
        // dd($request->all());

        // $contractor = Contractor::findOrFail($id);

        // $request->validate([

        // ]);

        // $contractor->date = $request->get('date');
        // $contractor->contractor_number = $request->get('contractor_number');
        // $contractor->count = $request->get('count');
        // $contractor->seller_name = $request->get('seller_name');
        // $contractor->seller_address = $request->get('seller_address');
        // $contractor->seller_country = $request->get('seller_country');
        // $contractor->buyer_name = $request->get('buyer_name');
        // $contractor->buyer_address = $request->get('buyer_address');
        // $contractor->buyer_country = $request->get('buyer_country');
        // $contractor->lc_opener_name = $request->get('lc_opener_name');
        // $contractor->lc_opener_address = $request->get('lc_opener_address');
        // $contractor->lc_opener_country = $request->get('lc_opener_country');
        // $contractor->fcls = $request->get('fcls');
        // $contractor->price_per_kg = $request->get('price_per_kg');
        // $contractor->total_amount = $request->get('total_amount');
        // $contractor->lsd = $request->get('lsd');
        // $contractor->lc_type = $request->get('lc_type');
        // $contractor->lc_number = $request->get('lc_number');
        // $contractor->invoice_number = $request->get('invoice_number');
        // $contractor->bl_number = $request->get('bl_number');
        // $contractor->etd = $request->get('etd');
        // $contractor->etd_fcls = $request->get('etd_fcls');
        // $contractor->etd_rest = $request->get('fcls') - $request->get('etd_fcls');

        // $contractor->eta = $request->get('eta');
        // $contractor->eta_fcls = $request->get('eta_fcls');
        // $contractor->eta_rest = $request->get('fcls') - $request->get('eta_fcls');

        // $contractor->awb = $request->get('awb');
        // $contractor->document = $request->get('document');
        // $contractor->shipment_status = $request->get('shipment_status');
        // $contractor->commission = $request->get('commission');
        // $contractor->kg = $request->get('kg');
        // $contractor->percent = $request->get('percent');

        // if($contractor->commission == 'kg'){
        //     $contractor_kg_comm = $contractor->total_amount / 100;
        //     $contractor->commission_percentage = $contractor_kg_comm * $contractor->kg;
        // }
        // else{
        //     $contractor_percent_comm = $contractor->total_amount / 100;
        //     $contractor->commission_percentage = $contractor_percent_comm * $contractor->percent;
        // }

        // $make_contractor_comm_dd = new \Carbon\Carbon($request->get('etd'));
        // $make_contractor_comm_dd = $make_contractor_comm_dd->addDays(60);
        // $contractor->comm_dd = $make_contractor_comm_dd;

        // $contractor->status = 'status';


        // $contractor->save();


        // return redirect()->back()->with('success' , 'Contract Updated Successfully');

        $invoice_details = [];
        $invoice_number_add     = $request->invoice_number_add;
        $bl_number_add          = $request->bl_number_add;
        $invoice_date_add       = $request->invoice_date_add;
        $invoice_ammount_add    = $request->invoice_ammount_add;
        
        foreach($request->invoice_number_add as $key => $details){
            $arr = [];
            $arr['invoice']     = $invoice_number_add[$key];
            $arr['bl_number']   = $bl_number_add[$key];
            $arr['date']        = $invoice_date_add[$key];
            $arr['amount']      = $invoice_ammount_add[$key];
            if(is_null($arr['invoice']) && is_null($arr['bl_number']) && is_null($arr['date']) && is_null($arr['amount'])){
                continue;
            }
            array_push($invoice_details, $arr);
        }
         

        // find total amount
        $price_per_dollar   = $request->get('price_per_dollar');
        $qty                = $request->get('qty');
        $total_amount       = $price_per_dollar * $qty;

        // find commission in kg's
        $commission_type    = $request->get('commission_type');
        $kg                 = $request->get('kg');
        $percent            = $request->get('percent');
        if($commission_type == 'kg'){
            $commission_amount =  $qty * $kg;
        }
        if($commission_type == 'percent'){
            $commission_amount =  $total_amount * $percent; 
        }

        // find etd rest
        $fcls               = $request->get('fcls');
        $etd_fcls           = $request->get('etd_fcls');
        $etd_rest           = $fcls - $etd_fcls;

        // find eta rest
        $eta_fcls           = $request->get('eta_fcls');
        $eta_rest           = $fcls - $eta_fcls;

        // find commission deadline
        $commission_deadline                = new \Carbon\Carbon($request->get('etd'));
        $commission_deadline                = $commission_deadline->addDays(60);

        // update Data
        $contractor = Contractor::find($id);
        // Basic Details
        $contractor->date                   = $request->get('date');
        $contractor->contractor_number      = $request->get('contract_number');
        $contractor->item                  = $request->get('item');
        
        // Seller
        $contractor->seller_name            = $request->get('seller_name');
        $contractor->seller_address         = $request->get('seller_address');
        $contractor->seller_country         = $request->get('seller_country');
        
        // Buyer
        $contractor->buyer_name             = $request->get('buyer_name');
        $contractor->buyer_address          = $request->get('buyer_address');
        $contractor->buyer_country          = $request->get('buyer_country');
        
        // Lc Opener
        $contractor->lc_opener_name         = $request->get('lc_opener_name');
        $contractor->lc_opener_address      = $request->get('lc_opener_address');
        $contractor->lc_opener_country      = $request->get('lc_opener_country');
        
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
        $contractor->commission_amount      = $commission_amount;

        // Invoice Details
        $contractor->invoice_number         = $request->get('invoice_number');
        $contractor->bl_number              = $request->get('bl_number');

        // invoice more data here
        $contractor->invoice_details        = json_encode($invoice_details);

        // ETD/ETA Details
        $contractor->etd                    = $request->get('etd');
        $contractor->etd_fcls               = $etd_fcls;
        $contractor->etd_rest               = $etd_rest;

        $contractor->eta                    = $request->get('eta');
        $contractor->eta_fcls               = $eta_fcls;
        $contractor->eta_rest               = $eta_rest;

        // Documents Details
        $contractor->awb                    = $request->get('awb');
        $contractor->document               = $request->get('document');
        $contractor->shipment_status        = $request->get('shipment_status');

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
       return redirect('/add-contractor')->with('success', 'contract deleted successfully');
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

    public function debitNote ($id){

        $contract = Contractor::where('id', $id)->first();
        $loops = ['name'=>'muzammal', 'class'=>'bs', 'sname'=>'smuzammal', 'sclass'=>'bss', ];
       
        return view('debit_note', compact('contract', 'loops'));

       $pdf = PDF::loadView('debit_note',compact('contract'));
       return $pdf->download('debit_note.pdf');
    }

}
