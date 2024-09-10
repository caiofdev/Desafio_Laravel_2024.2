<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Address;
use App\Models\Account;
use Tests\TestCase;

class ManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_create_manager(): void
    {
        $address = Address::create([
            'country' => 'Brazil',
            'state' => 'Example',
            'city' => 'Juiz de Fora',
            'street' => 'Example',
            'building_number' => 170,
            'postcode' => '29683-4198',
        ]);

        $admin = Admin::factory()->create();
        Auth::login($admin);

        $response = $this->actingAs($admin)->post('/admin/manage/managers/create', [
            'name' => 'Webson',
            'email' => 'webson@gmail.com',
            'password' => Hash::make('password'),
            'cpf' => '123.456.789-10',
            'birth_date' => '2000-08-01',
            'phone' => '3299999999',
            'photo' => 'photo.jpeg',
            'country' => 'Brazil',
            'state' => 'Example',
            'city' => 'Juiz de Fora',
            'street' => 'Example',
            'building_number' => 169,
            'postcode' => '29683-4198',
        ]);

        $response->assertStatus(302);
    }
}
