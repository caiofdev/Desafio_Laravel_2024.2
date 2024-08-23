<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'birth_date',
        'phone',
        'photo',
        'admin_id',
        'account_id',
        'address_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
    
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
