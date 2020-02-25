<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
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
    public function index(Request $request)
    {
        // $contractors = Contractor::get();
        // dd($contractors);
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
