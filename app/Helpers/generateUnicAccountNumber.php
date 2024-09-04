<?php

use App\Models\Account;

if(!function_exists('generateUnicAccountNumber')){
    function generateUnicAccountNumber(){
        $faker = \Faker\Factory::create();

        $randomNumber = $faker->numerify('########-#');

        $accounts = Account::get();
        foreach($accounts as $account){
            if($randomNumber == $account->account_number)
                $randomNumber = generateUnicAccountNumber();
        }
        return $randomNumber;
    }
}