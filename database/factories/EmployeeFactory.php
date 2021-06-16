<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'personalId' => $this->faker->unique()->numberBetween(10000000000, 100000000000),
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phoneNumber' => $this->faker->unique()->phoneNumber,
            'joinDate' => now(),
            'leaveDate' => null,
            'position' => $this->faker->optional()->randomElement(),
            'pay' => $this->faker->randomFloat(2, 5, 20),
        ];
    }
}
