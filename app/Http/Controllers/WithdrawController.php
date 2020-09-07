<?php

namespace App\Http\Controllers;

use App\withdraw;
use Illuminate\Http\Request;
use Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$withdraws = withdraw::latest()->get();
        
    $withdraws = Withdraw::where('user_id', Auth::user()->id)->get();

       //$investments = Withdraw::with('investments')->get();
    //$withdraws = Withdraw::with('investments.user')->get()->pluck('user.name');
    //echo $withdraws;
    

    // $withdraws->map(function ($withdraws, $key){
    //     return $withdraws->name;
    // });

    // foreach($withdraws as $withdraw){
    //    echo "{$withdraw->investments}";
    // }

    //foreach($withdraws as $withdraws){

        // echo "{$withdraws->investments}" ;
        // return view('withdraws.index');
    // }
        return view('withdraws.index',compact('withdraws'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('withdraws.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          
        ]);
        $userId = auth()->id();

        $request['user_id'] = $userId;
  
        withdraw::create($request->all());
   
        return redirect()->route('withdraws.index')
                        ->with('success','withdraw created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(withdraw $withdraw)
    {
        return view('withdraws.show',compact('withdraw'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(withdraw $withdraw)
    {
        return view('withdraws.edit',compact('withdraw'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, withdraw $withdraw)
    {
        $request->validate([
            'withdraw_amount' => 'required',
            'receiver_name' => 'required',
            'user_bitcoin_address'=> 'required',
            'receiver_email' => 'required',
        ]);
  
        $withdraw->update($request->all());
  
        return redirect()->route('withdraws.index')
                        ->with('success','withdraw updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(withdraw $withdraw)
    {
        $withdraw->delete();
  
        return redirect()->route('withdraws.index')
                        ->with('success','withdraw deleted successfully');
    }
}