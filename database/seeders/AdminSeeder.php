<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Address;
use App\Models\Account;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'agency_number' => '0001',
            'account_number' => '########-#',
            'account_balance' => 2,
            'transfer_limit' => 2,
        ]);

        Address::create([
            'country' => 'fake()->country()',
            'state' => 'fake()->state()',
            'city' => 'fake()->city()',
            'street' => 'fake()->streetName()',
            'building_number' => 'fake()->buildingNumber()',
            'postcode' => 'fake()->postcode()',  
        ]);

        Admin::factory(10)->create()->each(function ($admin){

            /** 
             * Associating an address with an admin.
             */

            $address = Address::create([
                'country' => fake()->country(),
                'state' => fake()->state(),
                'city' => fake()->city(),
                'street' => fake()->streetName(),
                'building_number' => fake()->buildingNumber(),
                'postcode' => fake()->postcode(),
            ]);

            $admin->address_id = $address->id;
            $admin->save(); 
        });
    }
}
