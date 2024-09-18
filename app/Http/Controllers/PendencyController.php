<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendency;
use App\Models\Loan;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Manager;
use App\Models\User;

class PendencyController extends Controller
{
    public function index(){

        $manager = Auth::guard('manager')->user();

        $users = $manager->users()->pluck('account_id');
        $pendencies = Pendency::whereIn('sender_id', $users)->paginate(5);

        return view('manager.pendencies', compact('pendencies'));
    }

    public function accept(int $id){

        $pendency = Pendency::where('id', $id)->first();

        $senderAccount = Account::where('id', $pendency->sender_id)->first();
        $receiverAccount = Account::where('id', $pendency->receiver_id)->first();

        if($pendency->title == 'loan'){

            $senderAccount->account_balance += $pendency->value;
            $senderAccount->save();

            Loan::create([
                'title' => 'Loan',
                'loan_value' => $pendency->value,
                'amount_to_pay' => $pendency->value,
                'account_id' => $pendency->sender_id,
            ]);

            Pendency::where('id', $id)->first()->delete();

            return redirect()->back()->with('Success', 'Empréstimo aprovado.');
        }
        
        Transaction::create([
            'title' => $pendency->title,
            'value' => $pendency->value,
            'sender_id' => $pendency->sender_id,
            'receiver_id' => $pendency->receiver_id,
        ]);

        $senderAccount->account_balance -= $pendency->value;
        $receiverAccount->account_balance += $pendency->value;

        $senderAccount->save();
        $receiverAccount->save();

        Pendency::where('id', $id)->first()->delete();

        return redirect()->back()->with('Success', 'Transferência aprovada.');
    }

    public function deny(int $id){

        Pendency::where('id', $id)->first()->delete();

        return redirect()->back();
    }
}
