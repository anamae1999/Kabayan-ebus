<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Buses;
use App\User;
use App\Terminal;
use App\Terminalname;
use Session;
use DB;
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::get();
        $terminal = Terminal::all();
        $buses = Buses::get();
        $user = User::all();

        return view('admin.buses.bus-list', compact('operators', 'buses','terminal','user'));
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
        // so here we will call the validation function okay
        $this->bus_validation($request);
        $bus_name = $request->get('bus_name');
        $bus_code = $request->get('bus_code');
        $total_seats = $request->get('total_seats');
        $operator_id = $request->get('operator_id');
        $terminal_id = $request->get('terminal_id');
        $bus_departuretime = $request->get('bus_departuretime');
        $bus_departuredate = $request->get('bus_departuredate');
        $bus_origin = $request->get('bus_origin');
        $bus_price = $request->get('bus_price');
        $driver_id = $request->get('driver_id');
        $bus_origin_lat = $request->get('bus_origin_lat');
        $bus_origin_long = $request->get('bus_origin_long');
        $bus_destination = $request->get('bus_destination');
        $bus_des_lat = $request->get('bus_des_lat');
        $bus_des_long = $request->get('bus_des_long');
        $condoctor_id = $request->get('condoctor_id');
        
        
        
        // $status = $request->get('status');
            
        $insertBus = [
            'bus_destination_lat' => $bus_des_lat,
            'bus_destination_long' => $bus_des_long,
            'bus_destination' => $bus_destination,
            'bus_origin_lang' => $bus_origin_long,
            'bus_origin_lat' => $bus_origin_lat,
            'bus_name' => $bus_name,
            'bus_code' => $bus_code,
            'total_seats' => $total_seats,
            'operator_id' => $operator_id,
            'bus_terminal_id' => $terminal_id,
            'bus_departuretime' => $bus_departuretime,
            'bus_departuredate' => $bus_departuredate,
            'bus_origin' => $bus_origin,
            'bus_price' => $bus_price,
            'assign_driver' => $driver_id,
            'assignn_codoctor' => $condoctor_id,
            'created_at' => \Carbon\carbon::now(),
            'updated_at' => \Carbon\carbon::now(),
        ];
        // dd($insertBus); // we will check okay if we are having all the data okay
        DB::table('buses')->insert( $insertBus);
        for ($x = 1; $x <= $total_seats; $x++) {
            $stat = 0;
            $insertSeat = [
            'bus_seat_code' => $bus_code,
            'seat_number' => $x,
            'seat_status' => $stat,
            'sit_created_at' => \Carbon\carbon::now(),
            
        ];
          DB::table('seats')->insert( $insertSeat);
        }
        Session::flash('msg', 'Bus Register Successfully!');
        return redirect()->back();

        return view('admin.buses.bus-list');
    }

    public function bus_validation(){
        $rules = [  // this array okay to validate our buses input before insertation to our database
            'bus_name' => 'required',
            'bus_code' => 'required',
            'total_seats' => 'required',
            'opeartor_id' => 'required',
        ];

    }
    // we can use anther validation if we want but i will show you how to work on that also okay
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
    public function edit(Request $request)
    {

    $bus_id = $request->input('bus_id');
    $date = $request->input('date');
    $time = $request->input('time');
    


    DB::update('update buses set bus_departuretime= ?,bus_departuredate=? where bus_id = ?',[$time,$date,$bus_id]);
             Session::flash('msg', 'Bus Updated Successfully!');
         return redirect()->back();
         return view('admin.buses.bus-list');
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
    public function destroy(Request $request)
    {
        $id = $request->input('bus_idd');
         DB::delete('delete from buses where bus_id = ?',[$id]);
         Session::flash('msg', 'Bus Deleted Successfully!');
         return redirect()->back();
         return view('admin.buses.bus-list');
    }
}
