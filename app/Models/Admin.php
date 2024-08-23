<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
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
        'address_id',
    ];

    protected $hidden = [
        'password',
    ];
        
    public function address(){
        return $this->belongsTo(Address::class);
    }
    
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function managers(){
        return $this->hasMany(Manager::class);
    }
}
