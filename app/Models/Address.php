<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'state',
        'city',
        'street',
        'building_number',
        'postcode'
    ];

    public function admin(){
        return $this->hasOne(Admin::class);
    }
    
    public function manager(){
        return $this->hasOne(Manager::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
