<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_number',
        'account_number',
        'account_balance',
        'transfer_limit',
    ];
    
    public function loan(){
        return $this->hasOne(Loan::class);
    }

    public function manager(){
        return $this->hasOne(Manager::class);
    }

    public function pendency(){
        return $this->hasMany(Pendency::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }    
}
