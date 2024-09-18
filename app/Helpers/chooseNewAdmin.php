<?php

use App\Models\Admin;

if(!function_exists('chooseNewAdmin')){

    function chooseNewAdmin(int $id){
        
        $faker = \Faker\Factory::create();

        $admins = Admin::pluck('id')->toArray();

        $chooseId = $faker->randomElement($admins);

        if($chooseId == $id){
            return chooseNewAdmin($id);
        } 

        return $chooseId;
    }
}