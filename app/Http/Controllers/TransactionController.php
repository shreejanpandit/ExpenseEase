<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Get only the transactions belonging to the authenticated user, ordered by created_at DESC
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();


        // Pass transactions and user to the view
        return view('transaction.index', ['transactions' => $transactions, 'user' => $user]);
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
        $trans->user_id = Auth::id();
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
        // echo($id);
        $transaction = Transaction::findOrFail($id);
        // dump($transaction);
        return view("transaction.edit", ['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trans = Transaction::findOrFail($id);

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
            return redirect()->route('transaction.edit', $id)->withInput()->withErrors($validator);
        }

        //updating data into database
        $trans->amount = $request->amount;
        $trans->description = $request->description;
        $trans->type = $request->transc;
        $trans->save();
        return redirect()->route('transaction.index')->with('sucess', "Transaction updated sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trans = Transaction::findOrFail($id);
        $trans->delete();
        return redirect()->route('transaction.index')->with('sucess', "Transaction deleted sucessfully");

    }
}
