<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manager;
use App\Models\Account;
use App\Models\Address;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::factory(10)->create()->each(function ($manager){

            /**
             * Associating an account and address with a manager.
             */

            $account = Account::create([
                'agency_number' => '0001',
                'account_number' => fake()->unique()->numerify('########-#'),
                'account_balance' => fake()->randomFloat(2, 1000, 20000),
                'transfer_limit' => fake()->randomFloat(2, 1000, 3500),
            ]);

            $address = Address::create([
                'country' => fake()->country(),
                'state' => fake()->state(),
                'city' => fake()->city(),
                'street' => fake()->streetName(),
                'building_number' => fake()->buildingNumber(),
                'postcode' => fake()->postcode(),  
            ]);

            $manager->account_id = $account->id; 
            $manager->address_id = $address->id;
            $manager->save();
        });
    }
}
