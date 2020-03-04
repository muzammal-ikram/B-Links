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
        // $contractors = Contractor::get();
        // dd($contractors);
        return $dataTable->render('home');
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
