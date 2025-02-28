<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use DB;
use Session;
use App\Terminal;
class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::get();
        $terminal = Terminal::get();
        return view('admin.operators.operator-list', compact('operators','terminal'));
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
        // we are validating our inputs okay to avoid having error when inserting okay.
        $this->validate($request,[
            'operator_name' => 'required',
             'operator_email' => 'required',
             'operator_address' => 'required',
             'operator_phone' => 'required',
            //  'operator_logo' => 'image|max:2048',
        ]);

            $image =  $request->file('operator_logo');

            // $image_name = rand() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('operator_images'), $image_name);

            $operators = new Operator;
            $operators->operator_name = $request->operator_name;
            $operators->operator_email = $request->operator_email;
            $operators->operator_address = $request->operator_address;
            $operators->operator_phone = $request->operator_phone;
            $operators->terminal_id = $request->terminal_id;
            $operators->operator_logo = " ";

                // dd($operators);
            $operators->save(); // THIS SAVE FUNCTION WILL SAVE THE DATA OKAY

            Session::flash('msg', 'Operator Adde
d Successfully!');
         return redirect()->back();
         return view('admin.operators.operator-list', compact('operators'));
// WE NEED TO GENERATE THIS CUSTOM FLASH MESSAGE OKAY. SO LET'S ADD THAT FIRST BEFORE INSERTING OKAY.
            $id = $request::get('operator_id');
            $operators = Operator::where('operator_id', $id);

            return view('admin.operators.operator-list', compact('operators'));
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
 public function editoperator(Request $request)
    {

     $this->validate($request,[
            'operator_name' => 'required',
             'operator_email' => 'required',
             'operator_address' => 'required',
             'operator_phone' => 'required',
     ]);

    $operator_name = $request->input('operator_name');
    $operator_email = $request->input('operator_email');
    $operator_address = $request->input('operator_address');
    $operator_phone = $request->input('operator_phone');
     $terminal_id = $request->input('terminal_id');
     $id = $request->input('id');
     
    


    DB::update('update operators set operator_name= ?,terminal_id=?,operator_email=?,operator_address=?,operator_phone=? where operator_id = ?',[$operator_name,$terminal_id,$operator_email,$operator_address,$operator_phone,$id]);
             Session::flash('msg', 'Operator Updated Successfully!');
         return redirect()->back();
         return view('admin.operators.operator-list', compact('operators'));
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
    public function deleteoperator(Request $request)
    {
        $id = $request->input('did');
        DB::delete('delete from operators where operator_id = ?',[$id]);
         Session::flash('msg', 'Operator Deleted Successfully!');
         return redirect()->back();
         return view('admin.operators.operator-list', compact('operators'));
    }
}
