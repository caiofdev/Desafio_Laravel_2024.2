<?php

use App\Models\Manager;

if(!function_exists('chooseNewManager')){
    function chooseNewManager(int $id){

        $faker = \Faker\Factory::create();
        $managers = Manager::pluck('id')->toArray();
        $chooseId = $faker->randomElement($managers);

        if($chooseId == $id){
            return chooseNewManager($id);
        } 

        return $chooseId;
    }
}