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
        $contractors = DB::table('contractors')->select('*')->get();
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
//        $request->validate([
//            'contractor_number' => 'required',
//            'date' => 'required',
//            'port' => 'required',
//            'supplier' => 'required',
//            'etd' => 'required',
//            'eta' => 'required',
//            'buyer' => 'required',
//            'latest_shipment_date' => 'required',
//            'quantity' => 'required',
//            'price_per_kg' => 'required',
//            'total_amount' => 'required',
//            'containers' => 'required',
//            'lc_number' => 'required',
//            'invoice_number' => 'required',
//            'commission' => 'required',
//            'bl_number' => 'required',
//            'contractor_status' => 'required',
//            'documents' => 'required',
//        ]);

//        dd($request->all());

        $contractor = new Contractor;

        $contractor->contractor_number = $request->get('contractor_number');
        $contractor->date = $request->get('date');
        $contractor->port = $request->get('port');
        $contractor->supplier = $request->get('supplier');
        $contractor->etd = $request->get('etd');
        $contractor->eta = $request->get('eta');
        $contractor->buyer = $request->get('buyer');
        $contractor->latest_shipment_date = $request->get('latest_shipment_date');
        $contractor->quantity = $request->get('quantity');
        $contractor->price_per_kg = $request->get('price_per_kg');
        $contractor->total_amount = $request->get('total_amount');
        $contractor->containers = $request->get('containers');
        $contractor->lc_number = $request->get('lc_number');
        $contractor->invoice_number = $request->get('invoice_number');
        $contractor->commission = $request->get('commission');
        $contractor->bl_number = $request->get('bl_number');
        $contractor->contractor_status = $request->get('contractor_status');
        $contractor->documents = 'test';

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
