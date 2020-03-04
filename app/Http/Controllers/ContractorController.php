<?php

namespace App\Http\Controllers;
use App\Contractor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
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
         $request->validate([
             'date' => 'required',
            'contractor_number' => 'required',
             'count' => 'required',
             'seller_name' => 'required',
             'seller_address' => 'required',
             'seller_country' => 'required',
             'buyer_name' => 'required',
             'buyer_address' => 'required',
             'buyer_country' => 'required',
             'lc_opener_name' => 'required',
             'lc_opener_address' => 'required',
             'lc_opener_country' => 'required',
            'fcls' => 'required',
             'price_per_kg' => 'required',
             'total_amount' => 'required',
             'lsd' => 'required',
             'lc_type' => 'required',
             'lc_number' => 'required',
             'invoice_number' => 'required',
             'bl_number' => 'required',
             'etd' => 'required',
             'etd_fcls' => 'required',
             'eta' => 'required',
             'eta_fcls' => 'required',
             'awb' => 'required',
             'document' => 'required',
             'shipment_status' => 'required',
             'commission' => 'required',


        ]);

        $contractor = new Contractor;

        $contractor->date = $request->get('date');
        $contractor->contractor_number = $request->get('contractor_number');
        $contractor->count = $request->get('count');
        $contractor->seller_name = $request->get('seller_name');
        $contractor->seller_address = $request->get('seller_address');
        $contractor->seller_country = $request->get('seller_country');
        $contractor->buyer_name = $request->get('buyer_name');
        $contractor->buyer_address = $request->get('buyer_address');
        $contractor->buyer_country = $request->get('buyer_country');
        $contractor->lc_opener_name = $request->get('lc_opener_name');
        $contractor->lc_opener_address = $request->get('lc_opener_address');
        $contractor->lc_opener_country = $request->get('lc_opener_country');
        $contractor->fcls = $request->get('fcls');
        $contractor->price_per_kg = $request->get('price_per_kg');
        $contractor->total_amount = $request->get('total_amount');
        $contractor->lsd = $request->get('lsd');
        $contractor->lc_type = $request->get('lc_type');
        $contractor->lc_number = $request->get('lc_number');
        $contractor->invoice_number = $request->get('invoice_number');
        $contractor->bl_number = $request->get('bl_number');
        $contractor->etd = $request->get('etd');
        $contractor->etd_fcls = $request->get('etd_fcls');
        $contractor->etd_rest = $request->get('fcls') - $request->get('etd_fcls');

        $contractor->eta = $request->get('eta');
        $contractor->eta_fcls = $request->get('eta_fcls');
        $contractor->eta_rest = $request->get('fcls') - $request->get('eta_fcls');

        $contractor->awb = $request->get('awb');
        $contractor->document = $request->get('document');
        $contractor->shipment_status = $request->get('shipment_status');
        $contractor->commission = $request->get('commission');
        $contractor->kg = $request->get('kg');
        $contractor->percent = $request->get('percent');

        if($contractor->commission == 'kg'){
            $contractor_kg_comm = $contractor->total_amount / 100;
            $contractor->commission_percentage = $contractor_kg_comm * $contractor->kg;
        }
        else{
            $contractor_percent_comm = $contractor->total_amount / 100;
            $contractor->commission_percentage = $contractor_percent_comm * $contractor->percent;
        }



        $make_contractor_comm_dd = new \Carbon\Carbon($request->get('etd'));
        $make_contractor_comm_dd = $make_contractor_comm_dd->addDays(60);
        $contractor->comm_dd = $make_contractor_comm_dd;

        $contractor->status = 'status';


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

        $contractor = Contractor::findOrFail($id);

        $request->validate([
            'date' => 'required',
            'contractor_number' => 'required',
            'count' => 'required',
            'seller_name' => 'required',
            'seller_address' => 'required',
            'seller_country' => 'required',
            'buyer_name' => 'required',
            'buyer_address' => 'required',
            'buyer_country' => 'required',
            'lc_opener_name' => 'required',
            'lc_opener_address' => 'required',
            'lc_opener_country' => 'required',
            'fcls' => 'required',
            'price_per_kg' => 'required',
            'total_amount' => 'required',
            'lsd' => 'required',
            'lc_type' => 'required',
            'lc_number' => 'required',
            'invoice_number' => 'required',
            'bl_number' => 'required',
            'etd' => 'required',
            'etd_fcls' => 'required',
            'eta' => 'required',
            'eta_fcls' => 'required',
            'awb' => 'required',
            'document' => 'required',
            'shipment_status' => 'required',
            'commission' => 'required',


        ]);

        $contractor->date = $request->get('date');
        $contractor->contractor_number = $request->get('contractor_number');
        $contractor->count = $request->get('count');
        $contractor->seller_name = $request->get('seller_name');
        $contractor->seller_address = $request->get('seller_address');
        $contractor->seller_country = $request->get('seller_country');
        $contractor->buyer_name = $request->get('buyer_name');
        $contractor->buyer_address = $request->get('buyer_address');
        $contractor->buyer_country = $request->get('buyer_country');
        $contractor->lc_opener_name = $request->get('lc_opener_name');
        $contractor->lc_opener_address = $request->get('lc_opener_address');
        $contractor->lc_opener_country = $request->get('lc_opener_country');
        $contractor->fcls = $request->get('fcls');
        $contractor->price_per_kg = $request->get('price_per_kg');
        $contractor->total_amount = $request->get('total_amount');
        $contractor->lsd = $request->get('lsd');
        $contractor->lc_type = $request->get('lc_type');
        $contractor->lc_number = $request->get('lc_number');
        $contractor->invoice_number = $request->get('invoice_number');
        $contractor->bl_number = $request->get('bl_number');
        $contractor->etd = $request->get('etd');
        $contractor->etd_fcls = $request->get('etd_fcls');
        $contractor->etd_rest = $request->get('fcls') - $request->get('etd_fcls');

        $contractor->eta = $request->get('eta');
        $contractor->eta_fcls = $request->get('eta_fcls');
        $contractor->eta_rest = $request->get('fcls') - $request->get('eta_fcls');

        $contractor->awb = $request->get('awb');
        $contractor->document = $request->get('document');
        $contractor->shipment_status = $request->get('shipment_status');
        $contractor->commission = $request->get('commission');
        $contractor->kg = $request->get('kg');
        $contractor->percent = $request->get('percent');

        if($contractor->commission == 'kg'){
            $contractor_kg_comm = $contractor->total_amount / 100;
            $contractor->commission_percentage = $contractor_kg_comm * $contractor->kg;
        }
        else{
            $contractor_percent_comm = $contractor->total_amount / 100;
            $contractor->commission_percentage = $contractor_percent_comm * $contractor->percent;
        }

        $make_contractor_comm_dd = new \Carbon\Carbon($request->get('etd'));
        $make_contractor_comm_dd = $make_contractor_comm_dd->addDays(60);
        $contractor->comm_dd = $make_contractor_comm_dd;

        $contractor->status = 'status';


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

}
