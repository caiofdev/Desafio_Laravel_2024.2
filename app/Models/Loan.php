<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_value',
        'amount_to_pay',
        'isApproved',
        'account_id',
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
