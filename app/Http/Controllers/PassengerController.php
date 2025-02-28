<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Buses;
use App\Terminal;
use App\Passenger;

class PassengerController extends Controller
{
    //
        function index()
    {
    	$data= DB::table('passenger')->get();
    	$bus= DB::table('buses')->get();
    	$seat= DB::table('seats')->get();
    	return view('passenger', ['data'=>$data,'bus'=>$bus,'seat'=>$seat]);
    }

     function indexnew()
    {
    	$data= DB::table('passenger')->limit(1)->orderBy('passenger_id', 'desc')->get();
    		$bus= DB::table('buses')->get();
    	$seat= DB::table('seats')->get();
    	$slight= DB::table('stops')->get();
    	    	return view('reciept', ['slight'=>$slight,'data'=>$data,'bus'=>$bus,'seat'=>$seat]);
    }
    
    function search(Request $request)
    {
        $id = $request->input('search');
    	$data= DB::table('passenger')->where('passenger_ticket', $id)->get();
    	$bus= DB::table('buses')->get();
    	$seat= DB::table('seats')->get();
    	$user= DB::table('users')->get();
    	$stops= DB::table('stops')->get();
    	return view('recieptsearch', ['data'=>$data,'bus'=>$bus,'seat'=>$seat,'user'=>$user,'stops'=>$stops]);
    }
    
    

        public function editpayment(Request $request)
    {
    	 $id = $request->input('did');
    	 $pay = $request->input('pay');
    	 DB::update('update passenger set passenger_payment= ? where passenger_id = ?',[$pay,$id]);
             Session::flash('msg', 'Successfully Saved!');
         return redirect()->back();
    }
    
    function book(Request $request)
    {
        $id = $request->bus_id;
    	$data = Buses::where('bus', $id)->first(); 
    	return view('booking'.$id, ['data'=>$data]);
    }
    
         public function deletepass(Request $request)
    {
        $id = $request->get('didd');
        $seat = $request->get('seat');
        $seato = 0;
         DB::delete('delete from passenger where passenger_id = ?',[$id]);
         DB::update('update seats set seat_status= ? where id = ?',[$seato,$seat]);
         Session::flash('msg', 'User Deleted Successfully!');
         return redirect()->back();
    }
}
