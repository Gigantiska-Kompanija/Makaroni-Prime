<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'registerDate' => now(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'phoneNumber' => $this->faker->unique()->phoneNumber,
            'remember_token' => Str::random(10),
        ];
    }
}
