<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class TerminalController extends Controller
{
    //
    function index()
    {
    	$data= DB::table('terminal')->get();
    	return view('terminal', ['data'=>$data]);
    }
    
    
    
     function addterm(Request $request)
    {
        $name = $request->get('name');
        $address = $request->get('address');
        $contact = $request->get('contact');
        
         $insertBus = [
            'terminal_name' => $name,
            'terminal_address' => $address,
            'terminal_contact' => $contact,
            'terminal_created_date' => \Carbon\carbon::now(),
        ];
        
         DB::table('terminal')->insert( $insertBus);
         Session::flash('msg', 'Bus Register Successfully!');
        return redirect()->back();
         return view('terminal');
    }
    
        
     function editterm(Request $request)
    {
        $name = $request->get('name');
        $address = $request->get('address');
        $contact = $request->get('contact');
        $id = $request->get('id');
        
        
         $insertBus = [
            'terminal_name' => $name,
            'terminal_address' => $address,
            'terminal_contact' => $contact,
            'terminal_created_date' => \Carbon\carbon::now(),
        ];
        
        DB::update('update terminal set terminal_name= ?,terminal_address=?,terminal_contact=? where terminal_id = ?',[$name,$address,$contact,$id]);
         Session::flash('msg', 'Bus Register Successfully!');
        return redirect()->back();
         return view('terminal');
    }
     function deleteterm(Request $request)
    {
         $id = $request->get('term-id');
         DB::delete('delete from terminal where terminal_id = ?',[$id]);
         Session::flash('msg', 'Deleted Successfully!');
         return redirect()->back();
    }
    
}
