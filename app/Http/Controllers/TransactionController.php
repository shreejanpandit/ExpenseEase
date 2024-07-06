<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all item using transaction model and send it for ui 
        $transaction = Transaction::OrderBy('transaction_date','DESC')->get();

        return view("transaction.index", ['transaction'=>$transaction]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("transaction.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($request);
        // rules for validation
        $rules = [
            'amount' => 'required|numeric',
            'description' => 'required',

        ];
        $validator =   Validator::make(
            $request->all(),
            $rules
        );

        //check if validation pass
        if ($validator->fails()) {
            return redirect()->route('transaction.create')->withInput()->withErrors($validator);
        }

        //inserting data into database
        $trans = new Transaction();
        $trans->amount = $request->amount;
        $trans->description = $request->description;
        $trans->type = $request->transc;
        $trans->transaction_date = date("Y-m-d");
        $trans->save();
        return redirect()->route('transaction.index')->with('sucess', "Transaction added sucessfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
