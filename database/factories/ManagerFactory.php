<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
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
            'birth_date' => fake()->dateTimeBetween('-60 years', '-27 years'),
            'phone' => fake()->unique()->phoneNumber(),
            'photo' => fake()->imageUrl(),
            'admin_id' => fake()->randomElement($adminIds),
            'account_id' => 1,
            'address_id' => 1,
        ];
    }
}
