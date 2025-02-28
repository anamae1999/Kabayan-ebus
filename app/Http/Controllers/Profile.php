<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Buses;
use App\Passenger;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    //
    function index()
    {
    	$data= DB::table('users')->get();
        $operators= DB::table('operators')->get();
        $terminal= DB::table('terminal')->get();
    	return view('user', ['data'=>$data,'operators'=>$operators,'terminal'=>$terminal]);
    }


    function addpass(Request $request)
    {

    	$fname = $request->get('fname');
        $lname = $request->get('lname');
        // $bdate = $request->get('bdate');
        // $gender =$request->get('gender');
        $address =$request->get('address');
        $contact =$request->get('contact');
        $busid =$request->get('busid');
        $email =$request->get('email');
        $gender =$request->get('gender');
        $bdate =$request->get('bdate');
        $age =$request->get('age');
        $lstatus =$request->get('lstatus');
        $seatnumber =$request->get('seatnumber');
        $total =$request->get('total');
        $mode =$request->get('mode');
        $terid =$request->get('terid');
        $busname =$request->get('busname');
        
        


    	 $insertBooking= [
            'passenger_lname' => $fname,
            'passenger_fname' => $lname,
            'passenger_address' => $address,
            'passenger_contact' => $contact,
            'passenger_bus_id' => $busid,
            'passenger_email' => $email,
            'passenger_bday' => $bdate,
            'passenger_age' => $age,
            'passenger_lstat' => $lstatus,
            'passenger_seat_id' => $seatnumber,
             'passenger_total' => $total,
             'passenger_mode' => $mode,
             'passenger_terminal' => $terid,
             'passenger_ticket' => strtoupper($busname).$seatnumber.'A' ,
             
            'passenger_created_date' => \Carbon\carbon::now(),
            
            
           ];

                 DB::table('passenger')->insert( $insertBooking);
             DB::update('update seats set seat_status= ? where id = ?',[1,$seatnumber]);
             $data= DB::table('passenger')->limit(1)->orderBy('passenger_id', 'desc')->get();
             $bus= DB::table('buses')->get();
             $seat= DB::table('seats')->get();
             $slight= DB::table('stops')->where('bus_id', $busid)->get();
             return view('reciept', ['data'=>$data,'bus'=>$bus,'seat'=>$seat,'slight'=>$slight]);

            // 'status' => $status,
            // 'created_at' => \Carbon\carbon::now(),
            // 'updated_at' => \Carbon\carbon::now(),
    
    }
    
    


    function adduser(Request $request)
    {

        $name = $request->get('name');
        $email = $request->get('email');
        $password =$request->get('password');
        $role =$request->get('role');
        $operator_id =$request->get('operator_id');
        $terminal_id =$request->get('terminal_id');

         $insertUsers= [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'remember_token' => ' ',
            'role' => $role,
            'operator_id' => $operator_id,
            'terminal_id' => $terminal_id,
            'created_at' => \Carbon\carbon::now(),
           ];
           DB::table('users')->insert( $insertUsers);
            Session::flash('msg', 'You Have Successfully Added the user!');
              return redirect()->back();
    }

    function edituser(Request $request)
    {

        $name = $request->get('name');
        $id = $request->get('id');
        $email = $request->get('email');
        $password =$request->get('password');
        if(!empty($password)){
          $passworden = Hash::make($password);  
        }else{
          $passworden = $request->get('password1');    
        }
        
        $role =$request->get('role');
        $operator_id =$request->get('operator_id');
        $terminal_id =$request->get('terminal_id');

         $insertUsers= [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'remember_token' => ' ',
            'role' => $role,
            'operator_id' => $operator_id,
            'terminal_id' => $terminal_id,
            'created_at' => \Carbon\carbon::now(),
           ];

          DB::update('update users set name= ?,terminal_id=?,email=?,password=?,role=?,operator_id=? where id = ?',[$name,$terminal_id,$email,$passworden,$role,$operator_id,$id]);
          Session::flash('msg', 'You Have Successfully Added the user!');
          return redirect()->back();
    }

      public function deleteuser(Request $request)
    {
        $id = $request->get('did');
         DB::delete('delete from users where id = ?',[$id]);
         Session::flash('msg', 'User Deleted Successfully!');
         return redirect()->back();
    }

    public function getLastUser(){
        $lastUser = DB::table('passenger')->latest()->first();
    }
}
