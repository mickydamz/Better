<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$accounts = account::latest()->paginate(5);
        $accounts = Account::where('user_id', Auth::user()->id)->get();
        return view('accounts.index',compact('accounts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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
            // 'payment_way' => 'required',
            // 'amount_paid' => 'required',
        ]);
        $userId = auth()->id();
        $request['user_id'] = $userId;
        Account::create($request->all());
   
        return redirect()->route('accounts.index')
         ->with('success','account linked successfull');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        return view('Accounts.show',compact('account'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        return view('Accounts.edit',compact('account'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        $request->validate([
         
        ]);
  
        $account->update($request->all());
  
        return redirect()->route('accounts.index')
                        ->with('success','account updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        $account->delete();
  
        return redirect()->route('accounts.index')
                        ->with('success','account deleted successfully');
    }
}