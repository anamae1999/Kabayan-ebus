<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Buses;
use App\User;
use Auth;

class DriverController extends Controller
{
         public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
   
    public function index()
    {
    	Auth::user()->id;
    	if(Auth::user()->role == 'Driver'){
    	$buseslist = Buses::where('assign_driver', Auth::user()->id)->first();
    	}else{
    	$buseslist = Buses::where('assignn_codoctor', Auth::user()->id)->first();  
    	}
        $data= DB::table('buses')->get();
        $stops= DB::table('stops')->get();
        $distance = self::distance($buseslist->bus_origin_lat ?? '0', $buseslist->bus_origin_lang ?? '0', $buseslist->bus_destination_lat ?? '0', $buseslist->bus_destination_long ?? '0', 'K');
    	return view('driver', ['data'=>$data,'stops'=>$stops],compact('distance'));
    }


    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return round(($miles * 1.609344), 1);
        } else if ($unit == "N") {
            return round(($miles * 0.8684), 1);
        } else {
            return round($miles, 1);
        }
    }


    public function addarrival(Request $request)
    {
    	 $bus_id = $request->input('bus_id_new');
    	 $current_date = \Carbon\carbon::now();
    	 $current_time =\Carbon\carbon::now();
    	 $arrivalstatus = 1;
    	 DB::update('update buses set arrival_time= ?,arrival_date=?,bus_arrival_trigger=? where bus_id = ?',[$current_time,$current_date,$arrivalstatus,$bus_id]);
             Session::flash('msg', 'Bus Have Arrived!');
         return redirect()->back();
         return view('drivers');
    }
    
    
     public function savestop(Request $request)
    {
        $id = $request->input('id');
         $s1h = $request->get('s1h');
         $s1m = $request->get('s1m');
         $s2h = $request->get('s2h');
         $s2m = $request->get('s2m');
         $s3h = $request->get('s3h');
         $s3m = $request->get('s3m');
         $s4h = $request->get('s4h');
         $s4m = $request->get('s4m');
         $s5h = $request->get('s5h');
         $s5m = $request->get('s5m');
         $s6h = $request->get('s6h');
         $s6m = $request->get('s6m');
         $s7h = $request->get('s7h');
         $s7m = $request->get('s7m');
         $s8h = $request->get('s8h');
         $s8m = $request->get('s8m');
         $s9h = $request->get('s9h');
         $s9m = $request->get('s9m');
         $s10h = $request->get('s10h');
         $s10m = $request->get('s10m');
         $sdh = $request->get('sdh');
         $sdm = $request->get('sdm');
         
          $insertstops = [
            'bus_id' => $id,
            's1' => $s1h.':'.$s1m,
            's2' => $s2h.':'.$s2m,
            's3' => $s3h.':'.$s3m,
            's4' => $s4h.':'.$s4m,
            's5' => $s5h.':'.$s5m,
            's6' => $s6h.':'.$s6m,
            's7' => $s7h.':'.$s7m,
            's8' => $s8h.':'.$s8m,
            's9' => $s9h.':'.$s9m,
            's10' => $s10h.':'.$s10m,
            'sd' => $sdh.':'.$sdm,
        ];
         $bustrigger = 1;
         DB::table('stops')->insert( $insertstops);
         DB::update('update buses set bus_stop_trigger= ? where bus_id = ?',[$bustrigger,$id]);
         Session::flash('msg', 'Bus Stop Successfully Added!');
        return redirect()->back();
         
    }
    
}
