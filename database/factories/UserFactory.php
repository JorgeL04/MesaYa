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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password es el ejemplo de contraseña
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicar que el email no está verificado.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Agregar un estado con datos ficticios opcionales.
     */
    public function withAdditionalData(): static
    {
        return $this->state(fn (array $attributes) => [
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ]);
    }
}
