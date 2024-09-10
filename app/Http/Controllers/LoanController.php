<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendency;
use App\Models\Loan;
use App\Models\Account;
use App\Models\Manager;

class LoanController extends Controller
{
    public function loanViewManager(){

        $user = Auth::guard('manager')->user();

        return view('loan', compact('user'));
    }

    public function loanViewUser(){

        $user = Auth::guard('web')->user();

        return view('loan', compact('user'));
    }

    public function store(Request $request){

        if($request->loan_amount <= 0){
            return redirect()->back()->with('Error', 'Valor inválido.');
        }
        
        $senderAccount = Account::find($request->sender_id);

        if(Auth::guard('web')->check()){
            Pendency::create([
                'title' => 'loan',
                'value' => $request->loan_amount,
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->sender_id,
            ]);
            
            return redirect()->back()->with('Sucess', 'Uma pendência foi realizada com sucesso, procure o gerente responsável para saber mais.');
        }

        Loan::create([
            'title' => 'Loan',
            'loan_value' => $request->loan_amount,
            'amount_to_pay' => $request->loan_amount,
            'account_id' => $request->sender_id,
        ]);

        $senderAccount->account_balance += $request->loan_amount;

        $senderAccount->save();

        return redirect()->back()->with('Sucess', 'Empréstimo realizado.');
    }

    public function pay(Request $request){
        
        $senderAccount = Account::find($request->sender_id);
        $loan = Loan::where('account_id', $request->sender_id)->get()->last();

        if($senderAccount->account_balance < $request->pay){
            return redirect()->back()->with('Error', 'Saldo insuficiente.');
        }

        if($request->pay > $loan->amount_to_pay){
            $request->pay = $loan->amount_to_pay;
        }

        $message = 'Você pagou uma parcela no total de: ' . $request->pay;

        $senderAccount->account_balance -= $request->pay;
        $loan->amount_to_pay -= $request->pay;

        $senderAccount->save();
        
        if($loan->amount_to_pay == 0){
            $loan->isApproved = true;
            $message = 'O empréstimo foi pago com sucesso.';
        }
        $loan->save();

        return redirect()->back()->with('Success', $message);
    }
}
