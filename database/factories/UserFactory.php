<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => 'Agent User',
                'username' => 'agent',
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'photo' => fake()->imageUrl('50', '60'),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'role' =>  fake()->randomElement(['admin','agent', 'user']),
                'status' => fake()->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' =>Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
