<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminIds = Admin::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'cpf' => fake()->unique()->numerify('###.###.###-##'),
            'birth_date' => fake()->dateTimeBetween('-60 years', '-28 years'),
            'phone' => fake()->unique()->phoneNumber(),
            'photo' => fake()->imageUrl(),
            'admin_id' => empty($adminIds) ? 1 : fake()->randomElement($adminIds),
            'address_id' => 1,
        ];
    }
}
