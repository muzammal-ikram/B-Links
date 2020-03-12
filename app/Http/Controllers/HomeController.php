<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\DataTables\ContractorsDataTable;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ContractorsDataTable $dataTable)
    {
         $contractors = Contractor::all();
         $total_buyers = Contractor::all()->groupBy('buyer_name')->count();
        $total_sellers = Contractor::all()->groupBy('seller_name')->count();
        return $dataTable->render('home', compact('contractors' , 'total_buyers' , 'total_sellers'));
        if($request->ajax()){
            $contractors = Contractor::get();
            return \Datatables::of($contractors)
                    ->addColumn('date', function ($user) {
                        $date = $user->date->format('M-d-Y');
                    return $date;
                })
                ->rawColumns(['date'=>'date'])
                ->make(true);
                // 'action' => 'action', 
        }
        return view('home');
    }
}
