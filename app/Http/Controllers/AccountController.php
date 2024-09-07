<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Pendency;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    // Manager views

    public function transactionsViewManager(){

        $user = Auth::guard('manager')->user();

        $latestTransaction = Transaction::where('sender_id', $user->id)->latest()->take(3)->get();

        return view('transaction', compact('user', 'latestTransaction'));
    }

    public function transferViewManager(){

        $user = Auth::guard('manager')->user();

        return view('transfer', compact('user'));
    }

    // User views

    public function transactionsViewUser(){

        $user = Auth::guard('web')->user();

        $latestTransaction = Transaction::where('sender_id', $user->id)->latest()->take(3)->get();

        return view('transaction', compact('user', 'latestTransaction'));
    }

    public function transferViewUser(){

        $user = Auth::guard('web')->user();

        return view('transfer', compact('user'));
    }


    // Operations

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

    public function transfer(Request $request){

        if($request->balance < $request->amount || $request->amount <= 0){
            return redirect()->back()->with('Error', 'Valor inválido ou saldo insuficiente');
        }
        
        $receiverAccount = Account::where('agency_number', $request->agency_number)->where('account_number', $request->account_number)->first();

        $senderAccount = Account::find($request->sender_id);

        if($senderAccount->transfer_limit < $request->amount){

            Pendency::create([
                'title' => $request->title,
                'value' => $request->amount,
                'sender_id' => $request->sender_id,
                'receiver_id' => $receiverAccount->id,
            ]);
            return redirect()->back()->with('Error', 'Limite de transferência é inferior ao valor.');
        }

        Transaction::create([
            'title' => $request->title,
            'value' => $request->amount,
            'sender_id' => $request->sender_id,
            'receiver_id' => $receiverAccount->id,
            ]);

        $senderAccount->account_balance -= $request->amount;
        $receiverAccount->account_balance += $request->amount;

        $senderAccount->save();
        $receiverAccount->save();

        return redirect()->back()->with('Sucess', 'Transferência realizada');
    }
}
