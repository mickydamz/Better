<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\User;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(5);
  
        return view('transactions.index',compact('transactions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users = DB::table('users')->get()->pluck('name', 'id');

        $investments = DB::table('investments')->get()->pluck('id');
        $withdraws = DB::table('withdraws')->get()->pluck('id');
        return view('transactions.create')
        ->with([
            'investments' => $investments,
            'withdraws' =>  $withdraws, 

             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {
        $request->validate([
           
        ]);


        // // Handle File Upload
        // if($request->hasFile('payer1_upload_pop')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('payer1_upload_pop')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('payer1_upload_pop')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('payer1_upload_pop')->storeAs('public/payer1_upload_pops', $fileNameToStore);
	   
		
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }
        

        // if($request->hasFile('payer1_upload_pop')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('payer1_upload_pop')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('payer1_upload_pop')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('payer1_upload_pop')->storeAs('public/payer1_upload_pops', $fileNameToStore);
	   
		
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }


        // if($request->hasFile('payer2_upload_pop')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('payer2_upload_pop')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('payer2_upload_pop')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('payer2_upload_pop')->storeAs('public/payer2_upload_pops', $fileNameToStore);
	   
		
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }


        // if($request->hasFile('payer3_upload_pop')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('payer3_upload_pop')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('payer3_upload_pop')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('payer3_upload_pop')->storeAs('public/payer3_upload_pops', $fileNameToStore);
	   
		
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }
        // // Create transaction
        // $transaction = new Transaction;
        // $transaction->receiver_name = $request->input('receiver_name');
        // $transaction->receiver_amount = $request->input('receiver_amount');
        // $transaction->receiver_confirmation = $request->input('receiver_confirmation');

        // $transaction->payer1_name = $request->input('payer1_name');
        // $transaction->payer1_amount = $request->input('payer1_amount');
        // $transaction->payer1_upload_pop = $fileNameToStore;

        // $transaction->payer2_name = $request->input('payer2_name');
        // $transaction->payer2_amount = $request->input('payer2_amount');
        // $transaction->payer2_upload_pop = $fileNameToStore;

        // $transaction->payer3_name = $request->input('payer3_name');
        // $transaction->payer3_amount = $request->input('payer3_amount');
        // $transaction->payer3_upload_pop = $fileNameToStore;
        

        // $transaction->start_time = $request->input('start_name');
        // $transaction->end_time = $request->input('end_time');
        //$transaction->save();

        
        
    
         //Transaction::create($request->all());
   
        return redirect()->route('transactions.index')
                        ->with('success','transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show',compact('transaction'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit',compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            //'name' => 'required',
            //'detail' => 'required',
        ]);
  
        $transaction->update($request->all());
  
        return redirect()->route('transactions.index')
                        ->with('success','transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
  
        return redirect()->route('transactions.index')
                        ->with('success','transaction deleted successfully');
    }
}
