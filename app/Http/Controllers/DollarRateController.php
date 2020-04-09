<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DollarRateController extends Controller
{

    public function saveDollarRate(Request $request , $dollar_rate){
       $save_dollar_rate =  DB::table('dollar_rate')->insert([
            'dollar_rate' => $dollar_rate,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
       $get_latest_dollar_rate = DB::table('dollar_rate')->latest()->first();
       if($save_dollar_rate){
         return response()->json([
            'dollar_rate' => $get_latest_dollar_rate->dollar_rate,
            'created_at' => $get_latest_dollar_rate->created_at,

        ]);
       }
       else{
        return 'false';
       }
       
    }

    // public function getDollarRate(){
    //     $dollar_rate = \DB::table('dollar_rate')->first();
        
    //     $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2020-3-3 3:30:34');
    //     // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 9:30:34');
    //     $to = \Carbon\Carbon::now();

    //     $diff_in_days = $to->diffInDays();

    //     dd($diff_in_days); // Output: 1

    //     include(public_path() . '/simplehtmldom_1_9_1/simple_html_dom.php');
    //     $html = file_get_html('https://www.google.com/search?sxsrf=ALeKk03A_Tl9ORx6xVOBV5HwKGk4JAlCxA%3A1583259899353&source=hp&ei=-6BeXvWHE5GsUuCojtgG&q=dollar+rate+today&oq=dollar+rate+today&gs_l=psy-ab.3...60.2854..3216...0.0..0.0.0.......0....1..gws-wiz.R3oqooGl3Vc&ved=0ahUKEwi18Yrf9v7nAhURlhQKHWCUA2sQ4dUDCAY&uact=5');
    //     // dd($html);
    //     // $html->find('div.foo');
    //     $div = $html->find('span.MWvIVe');
    //     dd($div);
    // }
}
