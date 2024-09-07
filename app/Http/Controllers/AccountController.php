<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Pendency;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function transactionsViewManager(){

        $user = Auth::guard('manager')->user();

        return view('transaction', compact('user'));
    }

    public function transactionsViewUser(){

        $user = Auth::guard('web')->user();

        return view('transaction', compact('user'));
    }

    public function depositAndWithdraw(Request $request){
        if($request->amount <= 0 || ($request->title == 'withdraw' && $request->amount > $request->balance)){
            return redirect()->back()->with('Error', 'Valor inválido');
        }

        Transaction::create([
            'title' => $request->title,
            'value' => $request->amount,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->sender_id,
        ]);

        if($request->title == 'withdraw'){
            $request->amount *= -1;
        }

        $account = Account::find($request->account_id);
        // echo $account->account_balance . " + " . $request->deposit_amount;
        $account->account_balance += $request->amount;
        // echo " = " . $account->account_balance;
        $account->save();

        return redirect()->back();
    }

    public function transfer(){
        
    }
}
