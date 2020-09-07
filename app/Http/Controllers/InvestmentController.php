<?php

namespace App\Http\Controllers;

use App\Investment;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Withdraw;
class investmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$investments = investment::latest()->get();
        
    $investments = DB::table('investments')->where('user_id', Auth::user()->id)->get();
        return view('investments.index',compact('investments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $withdraws = DB::table('withdraws')->get()->pluck('id');
        return view('investments.create') ->with([
            'withdraws' =>  $withdraws
             ]);
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
  
        

        

  
        Investment::create($request->all());
   
        return redirect()->route('investments.index')
                        ->with('success','investment created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(investment $investment)
    {
        return view('investments.show',compact('investment'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(investment $investment)
    {
        $withdraws = Withdraw::get();
        return view('investments.edit',compact('investment'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, investment $investment)
    {
        $request->validate([
           
        ]);



        $request['withdraw_id'] = $investment->withdraw_id;

        $investment->update($request->all());
  
        return redirect()->route('investments.index')
                        ->with('success','investment updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(investment $investment)
    {
        $investment->delete();
  
        return redirect()->route('investments.index')
                        ->with('success','investment deleted successfully');
    }
}