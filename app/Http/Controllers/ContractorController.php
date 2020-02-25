<?php

namespace App\Http\Controllers;
use App\Contractor;
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
    public function allContractor(Request $request)
    {
        $contractors = Contractor::get();
        dd($contractors);
        if($request->ajax()){
            $contractors = DB::table('contractors')->select('*');
            dd($contractors);
            return \Datatables::of($contractors)
                ->make(true);
        }
        return view('allContractor');
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
             'kg' => 'required',
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
             'commission_percentage' => 'required',


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
        $contractor->kg = $request->get('kg');
        $contractor->total_amount = $request->get('total_amount');
        $contractor->lsd = $request->get('lsd');
        $contractor->lc_type = $request->get('lc_type');
        $contractor->lc_number = $request->get('lc_number');
        $contractor->invoice_number = $request->get('invoice_number');
        $contractor->bl_number = $request->get('bl_number');
        $contractor->etd = $request->get('etd');
        $contractor->etd_fcls = $request->get('etd_fcls');

        $contractor->etd_rest = 'etd_rest';

        $contractor->eta = $request->get('eta');
        $contractor->eta_fcls = $request->get('eta_fcls');

        $contractor->eta_rest = 'eta_rest';

        $contractor->awb = $request->get('awb');
        $contractor->document = $request->get('document');
        $contractor->shipment_status = $request->get('shipment_status');
        $contractor->commission = $request->get('commission');
        $contractor->commission_percentage = $request->get('commission_percentage');

        $contractor->comm_dd = 'comm_dd';
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
            'kg' => 'required',
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
            'commission_percentage' => 'required',


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
        $contractor->kg = $request->get('kg');
        $contractor->total_amount = $request->get('total_amount');
        $contractor->lsd = $request->get('lsd');
        $contractor->lc_type = $request->get('lc_type');
        $contractor->lc_number = $request->get('lc_number');
        $contractor->invoice_number = $request->get('invoice_number');
        $contractor->bl_number = $request->get('bl_number');
        $contractor->etd = $request->get('etd');
        $contractor->etd_fcls = $request->get('etd_fcls');

        $contractor->etd_rest = 'etd_rest';

        $contractor->eta = $request->get('eta');
        $contractor->eta_fcls = $request->get('eta_fcls');

        $contractor->eta_rest = 'eta_rest';

        $contractor->awb = $request->get('awb');
        $contractor->document = $request->get('document');
        $contractor->shipment_status = $request->get('shipment_status');
        $contractor->commission = $request->get('commission');
        $contractor->commission_percentage = $request->get('commission_percentage');

        $contractor->comm_dd = 'comm_dd';
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


    public function filtered_contract(Request $request){

        $contracts = Contractor::where('supplier' , 'like' , '%'.$request->get('supplier').'%')->orWhere('buyer' , 'like' , '%'.$request->get('buyer').'%')->get();
        dd($contracts);

    }

}
