<?php

use App\Models\Account;

if(!function_exists('generateTransferLimit')){
    function generateTransferLimit(){
        
        $faker = \Faker\Factory::create();
        $randomLimit = $faker->randomFloat(2, 1000, 3500);

        return $randomLimit;
    }
}